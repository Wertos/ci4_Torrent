<?php                 

namespace App\Controllers\Admin;

use \CodeIgniter\Model\Admin;
use \CodeIgniter\AdminController;
use \CodeIgniter\Shield\Entities\User;
use \CodeIgniter\Shield\Exceptions\ValidationException;
use \CodeIgniter\Shield\Validation\ValidationRules;
use \CodeIgniter\HTTP\IncomingRequest;
use \CodeIgniter\HTTP\RequestInterface;
use \CodeIgniter\HTTP\ResponseInterface;
use \CodeIgniter\HTTP\Message;
use \CodeIgniter\Exceptions\PageNotFoundException;
use \App\Models\Admin\AdminModel;
use \App\Models\UserModel;


class UserController extends \App\Controllers\AdminController
{
    private $userModel;
    private $adminModel;
    private $siteTitle;

	  function __construct()
  	{
      $this->userModel = model(UserModel::class);
      $this->adminModel = model(AdminModel::class);
    }

    public function UserList()
    {

     		$pager = service('pager');
     		
     		$where = ['id >' => 0];
				
				$only = ($this->request->getGet('only') ?? 'all');

		    if($only == 'banned') {
				    $where = ['status' => 'banned'];
		 		}

		    if($only == 'notactive') {
				    $where = ['active' => 0];
		 		}

				$countUsers = $this->userModel->where($where)->withDeleted(true)->CountAllResults();

        $page = (int) ($this->request->getGet('page') ?? 1);
        
        $limit = 20;//setting('Torrent.reportPerPage');
		    $offset = ($page - 1) * $limit;
		    
		    $pager_links = $pager->makeLinks($page, $limit, $countUsers);
				
				// Get the User Provider (UserModel by default)
				$users = auth()->getProvider();

				$usersList = $users
							->where($where)
    					->withIdentities()
					    ->withGroups()
						  ->withPermissions()
						  ->withDeleted(true)
						  ->orderBy('created_at', 'DESC')
					    ->findAll($limit, $offset);

  			$usersData = [];
  			
  			foreach ( $usersList as $u ) {
  			      
  			      $usersData[$u->id] = [
  			      				'id' => $u->id,
  			      				'name' => $u->username,
  			      				'email' => $u->email,
  			      				'firstname' => $u->first_name,
  			      				'lastname' => $u->last_name,
  			      				'birthdate' => $u->birthdate,
  			      				'active' => $u->isActivated(),
  			      				'banned' => $u->isBanned(),
  			      				'created' => $u->created_at,
  			      				'updated' => $u->updated_at,
  			      				'deleted' => $u->deleted_at,
  			      				'id' => $u->id,
  			      	];
 			
  			}
  			$this->siteTitle = $this->TorrConfig->siteTitle . ' | ' . lang('Admin.UsersTitle');
			  
				$data['page_title'] = $this->siteTitle;
			
				$data['usersList'] = $usersData;

				$data['pager_links'] = $pager_links;

				$this->themes::render('user_list', $data);
    }

    public function UserEditShow(int $id)
    {
        helper('form');
				
				// Get the User Provider (UserModel by default)
				$users = auth()->getProvider();

				$user = $users
    								->withIdentities()
					    			->withGroups()
						  			->withPermissions()
					    			->withDeleted(true)
					    			->findById($id);

  			$this->groupConfig = config('AuthGroups');

        $data['allGroup'] =  $this->groupConfig->groups;
        $data['defaultGroup'] =  $this->groupConfig->defaultGroup;

  			$this->siteTitle = $this->TorrConfig->siteTitle . ' | ' . lang('Admin.UsersTitle') . ' ' . $user->username;
			  
				$data['page_title'] = $this->siteTitle;
			
				$data['user'] = $user;

				$this->themes::render('user_edit', $data);
    }

    public function UserEditAction(int $id)
    {
				
		  	$this->allowedFields = ['username', 'email', 'password', 'password_confirm', 'first_name', 'last_name', 'birthdate'];

		  	if (! auth()->user()->inGroup('superadmin', 'admin')) {
		  		throw PageNotFoundException::forPageNotFound();
	  		}	
	
		  	$this->postData = $this->request->getPost();
		  	
		  	if ( $id != (int) $this->postData['userid']) {
	  			throw PageNotFoundException::forPageNotFound();
	  		}	

				// Get the User Provider (UserModel by default)
				$users = auth()->getProvider();
				$user = $users->withDeleted(true)->findById((int) $id);

		  	if ( $user->inGroup('superadmin') ) {
		  		return redirect()->back()->withInput()->with('errors', lang('Admin.UserAct.usersuperadmin'));
	  		}	

  			$this->groupConfig = config('AuthGroups');

        // Validate here first, since some things,
        // like the password, can only be validated properly here.
        $rules = $this->getValidationRules();

  			$this->newUserData = [];
        foreach ($this->postData as $key => $value)
        {
 					if (!$value || !in_array($key, $this->allowedFields) || $value == $user->{$key}) 
 					{
 							if($key == 'password' || $key == 'password_confirm') continue;

 							unset($rules[$key]);
 							continue;
 					}
 					
 					$this->newUserData[$key] = $value;
	      }
        
        if(! isset($this->newUserData['password']) && ! isset($this->newUserData['password_confirm']))
        {
          unset($rules['password_confirm'], $rules['password'], $this->newUserData['password_confirm'], $this->newUserData['password']);
        }
        
        if($this->newUserData || isset($this->postData['groups']))
        {
        		
        		if ($this->newUserData)
        		{
        				if (! $this->validateData($this->newUserData, $rules, [], config('Auth')->DBGroup)) {
            				return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        				}	

        				$user->fill($this->newUserData);
				
								$users->save($user);
						}

            if (isset($this->postData['groups']))
            {
    		        $groupPostData = array_keys($this->postData['groups']);
		            $groupPostData[] = $this->groupConfig->defaultGroup;
        		
        				$user->syncGroups(...$groupPostData);
        		}
		
						return redirect()->to('admin/user/edit/'.$user->id)->with('message', lang('Admin.UserEdit.usereditsuccess', [$user->username]));

				}

/*                
        if(isset($this->postData['groups']))
        {
            $groups = [$this->groupConfig->defaultGroup];

        		foreach ($this->postData['groups'] as $gName => $v)
        		{
        			$groups[] = $gName;
        		}
        		
        		$user->syncGroups(...$groups);
        }
        
*/
				return redirect()->to('admin/user/edit/'.$user->id)->with('error', lang('Admin.UserEdit.notedited'));
    }


    /**
     * Returns the rules that should be used for validation.
     *
     * @return array<string, array<string, list<string>|string>>
     */
    protected function getValidationRules(): array
    {
        $rules = new ValidationRules();

        return $rules->getRegistrationRules();
    }

}
