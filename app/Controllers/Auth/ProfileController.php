<?php

namespace App\Controllers\Auth;

use \CodeIgniter\BaseController;
use \CodeIgniter\HTTP\RedirectResponse;
use \CodeIgniter\HTTP\IncomingRequest;
use \CodeIgniter\Shield\Exceptions\ValidationException;
use \CodeIgniter\Shield\Validation\ValidationRules;
use \CodeIgniter\Exceptions\PageNotFoundException;
use \Arifrh\Themes\Themes;
use \App\Models\UserModel;
use \App\Models\TorrentModel;
use \App\Models\GlobalModel;
use \App\Models\CommentModel;
use \App\Models\BookmarkModel;
use \CodeIgniter\I18n\Time;

class ProfileController extends \App\Controllers\BaseController
{

    public $GlobalModel;
    public $TorrentModel;
    public $CommentModel;
    public $BookmarkModel;
	public $siteTitle;

    function __construct()
    {
        $this->GlobalModel = model(GlobalModel::class);
        $this->TorrentModel = model(TorrentModel::class);
        $this->CommentModel = model(CommentModel::class);
        $this->BookmarkModel = model(BookmarkModel::class);
	}

    public function ProfileView(?int $id = null)
    {
    	  helper('number');
    	  helper('torrent');
    	  $pager = service('pager');
	  		
    		$no_torrents = false;

				if (!$id)
				{
        		$id = $this->userData->id;
        }
    		
				// Get the User Provider (UserModel by default)
				$users = auth()->getProvider();
				$data['user'] = $users->findById((int) $id);

        if (!$this->userData->logged_in)
				                  return redirect()->to('user/login')->with('error', lang('Login.needLogin'));

        if (!$data['user'])
				                  return redirect()->back()->with('error', lang('Login.errorViewProfile'));

    		$data['torrcount'] = $this->TorrentModel->where('owner', $data['user']->id)->where('deleted_at', null)->countAllResults();
        $data['commcount'] = $this->CommentModel->where('user_id', $data['user']->id)->where('deleted_at', null)->countAllResults();
        $data['bookcount'] = $this->BookmarkModel->where('user_id', $data['user']->id)->where('deleted_at', null)->countAllResults();

        $data['age'] = ($data['user']->birthdate) ? Time::parse($data['user']->birthdate)->getAge() : '';
        $data['page_title'] = $this->TorrConfig->siteTitle . ' | ' . lang('Profile.profile');
				
				$this->breadcrumb->append(lang('Profile.profile_view', [$data['user']->username]));
  	    
  	    $data['breadcrumb'] = $this->breadcrumb->output();
        
        $this->themes::render('profile_view', $data);
    }

    public function ProfileEditView()
    {
        helper('form');
        
        if (!$this->userData->logged_in)
													return redirect()->to('user/login')->with('error', lang('login.errorEditProfile'));

        if ($this->request->isAJAX()) { }

				$this->breadcrumb->append(lang('Profile.profile'), 'user/profile');
				$this->breadcrumb->append(lang('Profile.editprofile'));
  	    
  	    $data['breadcrumb'] = $this->breadcrumb->output();

  	    $data['page_title'] = $this->TorrConfig->siteTitle . ' | ' . lang('Profile.editprofile');
        
        $data['user'] = $this->userData;
        
        $this->themes::render('profile_edit', $data);
    }

    public function ProfileEditAction()
    {
    	helper('file');
        
        $this->userModel = model(UserModel::class);

 		$this->allowedFields = ['password', 'password_confirm', 'first_name', 'last_name', 'birthdate', 'avatar'];
        
		// Get the User Provider (UserModel by default)
		$users = auth()->getProvider();
		$user = $users->findById((int) $this->userData->id);
		
		$newUserData = [];
        
        $rules = $this->getValidationRules();
        $postData = $this->request->getPost();

        $postData['first_name'] = $this->request->getPost('first_name') ?? $user->first_name;
        $postData['last_name'] = $this->request->getPost('last_name') ?? $user->userData->last_name;
        $postData['birthdate'] = $this->request->getPost('birthdate') ?? $user->userData->birthdate;

        if (!empty($_FILES['avatar']['name']))
        {
	        
	      $validationAvatarRule = setting('Auth.validationAvatarRule');

      	  if (!$this->validateData([], $validationAvatarRule)) {
        	    $error = $this->validator->getErrors();
          	  	$err = is_array($this->validator->getErrors()) ? 'errors' : 'error';
            	return redirect()->to('user/edit')->with($err, $error);
	      }
  	      else
    	  {
      			$avatar = $this->request->getFile('avatar');
    	  	  	$fileExt = $avatar->guessExtension();
	 			$newUserData['avatar'] = $user->id . '.' . $avatar->guessExtension();
		 		
				if (file_exists($this->TorrConfig->AvatarUploadPath . $newUserData['avatar']))
 			    		 unlink($this->TorrConfig->AvatarUploadPath . $newUserData['avatar']);
	      		
	      		if (! $avatar->hasMoved()) {
  	  	  	      		$avatar->move($this->TorrConfig->AvatarUploadPath, $newUserData['avatar']);
    			}
   	  		}
	    }

        foreach ($postData as $key => $value)
        {
 			if (!$value || !in_array($key, $this->allowedFields) || $value == $user->{$key})
 			{
 					if($key == 'password' || $key == 'password_confirm') continue;
 					unset($rules[$key]);
 					continue;
 			}
 			
 			$newUserData[$key] = $value;
	     }

        if(! isset($newUserData['password']) && ! isset($newUserData['password_confirm']))
        {
          unset($rules['password_confirm'], $rules['password'], $newUserData['password_confirm'], $newUserData['password']);
        }
        
        if(! isset($newUserData['email']))
        {
          unset($rules['email'], $newUserData['email']);
        }
        
		if(! isset($newUserData['username']))
        {
          unset($rules['username'], $newUserData['username']);
        }
        
        if($newUserData)
        {
//        	var_dump($rules);die();
     		if (! $this->validateData($newUserData, $rules)) {
        		return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
     		}	
//            var_dump($newUserData);die();
     		$user->fill($newUserData);
			$users->save($user);
		}

        return redirect()->to('user/profile')->with('message', lang('Profile.updatedsuccess'));
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