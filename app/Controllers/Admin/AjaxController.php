<?php                 

namespace App\Controllers\Admin;

use CodeIgniter\Model\Admin;
use \CodeIgniter\AdminController;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\Message;
use CodeIgniter\Exceptions\PageNotFoundException;
use Arifrh\Themes\Themes;
use \App\Models\Admin\AdminModel;
use \App\Models\Admin\CategoryModel;
use \App\Models\Admin\TorrentModel;
use \App\Models\UserModel;        

class AjaxController extends \App\Controllers\AdminController
{

  function __construct()
  {
      //parent::__construct();
      
      $this->request = request();
      $this->adminModel = model(AdminModel::class);//new \App\Models\Admin\AdminModel();

	  	if ($this->request->isAJAX() === FALSE) {
				throw PageNotFoundException::forPageNotFound();
	  	}
	  	if (! auth()->user()->inGroup('superadmin', 'admin')) {
	  		throw PageNotFoundException::forPageNotFound();
	  	}	
      //$this->output->enable_profiler(FALSE);
    	$this->ajax = new \stdClass();
    	$this->ajax->action = $this->request->getPost('action');
      
    	switch ($this->ajax->action) {
				case 'UserDelete':
				case 'UserHardDelete':
				case 'UserRestore':
				case 'UserByName':
      				$this->db = \Config\Database::connect();
                	$this->userModel = model(UserModel::class);
      			break;
				case 'UserAct':
      					
      			break;
				case 'UserBan':

      			break;
				case 'CatDelete':
				case 'CatOnOff':
      				$this->CatModel = model(CategoryModel::class);//new \App\Models\Admin\CategoryModel();	
      			break;
				case 'TorrManage':
      				$this->TorrModel = model(CategoryModel::class);//new \App\Models\Admin\CategoryModel();	
      			break;

      		default: 
      			throw PageNotFoundException::forPageNotFound();
      }
  }

  private function _AjaxSend($data) 
  {
			return $this->response->setJSON($data);
  }
  public function UserByName($name)
  {
	$this->data = [];
	$html = '';

	$users = $this->db->table('users')->select('username, id')
				->like('username', $name)->get()->getResult();

	foreach($users as $user)
	{
		$html .= '<li><a onclick="CI4_Admin.NameIns('.$user->id.', \''.$user->username.'\');" data-name="'.$user->username.'" data-id="'.$user->id.'" class="dropdown-item username" href="javascript:void(0);">'.$user->username.'</a></li>';
	}
	if($html == '')
		$html = '<li><a class="dropdown-item" href="#">'.lang('Admin.userNotFound').'</a></li>';

	$this->data = [
		'error' => '',
		'html'	=> $html,
	];
	return $this->_AjaxSend($this->data); die ();
  }

  public function UserDelete($id)
  {
      $users = auth()->getProvider();
      $this->deletedUser = $users->withDeleted(true)->findById(intval($id));
      $this->data = [];

      if(! $this->deletedUser ) {
					
					$this->data = [
									'error' => lang('Admin.UserDelete.notfound'),
									'id'	=> $id,
							 ];
					
					return $this->_AjaxSend($this->data); die ();
      }
      
      if( $this->deletedUser->inGroup('superadmin') === true ) {
					
					$this->data = [
									'error' => lang('Admin.UserDelete.usersuperadmin'),
									'id'	=> $id,
							 ];
					
					return $this->_AjaxSend($this->data); die ();
      }
      
      $users->delete(intval($id));

			$this->eventData = [
								'user'	=> 1,
			];

			return $this->_AjaxSend($this->data);
  }

  public function UserHardDelete($id)
  {
      $users = auth()->getProvider();
      $this->deletedUser = $users->withDeleted(true)->findById(intval($id));
      $this->data = [];

      if(! $this->deletedUser ) {
					
					$this->data = [
									'error' => lang('Admin.UserDelete.notfound'),
									'id'	=> $id,
							 ];
					
					return $this->_AjaxSend($this->data); die ();
      }
      
      if( $this->deletedUser->inGroup('superadmin') === true ) {
					
					$this->data = [
									'error' => lang('Admin.UserDelete.usersuperadmin'),
									'id'	=> $id,
							 ];
					
					return $this->_AjaxSend($this->data); die ();
      }
      
      $users->delete(intval($id), true);

			$this->data = [
							'error' => '',
							'id'	=> $id,
					];
			
			return $this->_AjaxSend($this->data);
  }

  public function UserRestore($id)
  {
      $users = auth()->getProvider();
      $this->restoredUser = $users->withDeleted(true)->findById(intval($id));
      $this->data = [];

      if(! $this->restoredUser ) {
					
					$this->data = [
									'error' => lang('Admin.UserDelete.notfound'),
									'id'	=> $id,
							 ];
					
					return $this->_AjaxSend($this->data); die ();
      }
      
      //$users->delete(intval($id));
      $this->db->table('users')->set('deleted_at', null)->where('id', $id)->update();
			
			$this->data = [
							'error' => '',
							'id'	=> $id,
					];
			
			return $this->_AjaxSend($this->data);
  }

  public function UserAct($id)
  {
      $this->actUser = auth()->getProvider()->findById($id);
      $this->data = [];

      if(! $this->actUser ) {
						$this->data = [
									'error' => lang('Admin.UserAct.notfound'),
									'id' => $id,
							 ];
						
						return $this->_AjaxSend($this->data); die ();
      }
      
      if( $this->actUser->inGroup('superadmin') === true ) {
						$this->data = [
									'error' => lang('Admin.UserAct.usersuperadmin'),
									'id' => $id,
								];	
						
						return $this->_AjaxSend($this->data); die ();
      }

			if ($this->actUser->isActivated())
			{
						$this->actUser->deactivate();
			
						$this->data = [
									'error' => '',
									'id' => $id,
									'action' => 'deactivate',
									'username' => '<i id="act_icon_' . $id . '" data-bs-toggle="tooltip" data-bs-title="' . lang('Admin.UserAct.notactivated') .'" class="fa-solid fa-triangle-exclamation me-2 text-danger"></i>',
									'icon' => '<i class="fa-solid fa-check text-success cursor-pointer"></i>',
									'title' => lang('Admin.UserAct.activate'),
								];
						
						return $this->_AjaxSend($this->data); die();
			}
			
			if ($this->actUser->isNotActivated())
			{
						$this->actUser->activate();

						$this->data = [
									'error' => '',
									'id' => $id,
									'action' => 'activate',
									'username' => '',//$this->actUser->username,
									'icon' => '<i class="fa-solid fa-xmark text-danger cursor-pointer"></i>',
									'title' => lang('Admin.UserAct.deactivate'),
								];
						
						return $this->_AjaxSend($this->data); die();
			}
			
			return true;
  }

  public function UserBan($id)
  {
      $this->banUser = auth()->getProvider()->findById($id);
      $this->reason =  $this->request->getPost('reason') ?? '';
      $this->data = [];

      if(! $this->banUser ) {
						$this->data = [
									'error' => lang('Admin.Ban.notfound'),
									'id' => $id,
							 ];
						
						return $this->_AjaxSend($this->data); die ();
      }
      
      if( $this->banUser->inGroup('superadmin') === true ) {
						$this->data = [
									'error' => lang('Admin.Ban.usersuperadmin'),
									'id' => $id,
								];	

						return $this->_AjaxSend($this->data); die ();
      }

			if ($this->banUser->isBanned())
			{
						$this->banUser->unBan();

						$this->data = [
									'error' => '',
									'id' => $id,
									'action' => 'unban',
									'username' => '',//$this->banUser->username,
									'icon' => '<i class="fa-solid fa-ban text-danger cursor-pointer"></i>',
									'title' => lang('Admin.Ban.ban'),
								];
						
						return $this->_AjaxSend($this->data); die();
			}
			
			else

			{
						$this->banUser->ban($this->reason);
			
						$this->data = [
									'error' => '',
									'id' => $id,
									'action' => 'ban',
									'username' => '<i id="ban_icon_' . $id . '" data-bs-toggle="tooltip" data-bs-title="' . lang('Admin.Ban.ban') .'" class="fa-solid fa-ban me-2 text-danger"></i>',
									'icon' => '<i class="fa-solid fa-ban text-success cursor-pointer"></i>',
									'title' => lang('Admin.Ban.unban'),
								];
						
						return $this->_AjaxSend($this->data); die();
			}
			
			return true;
  }

  public function CatDelete(int $id)
  {
			$this->CatModel->CatDelete($id);
			return $this->_AjaxSend(['id' => $id]); die();
  }

  public function CatOnOff($id)
  {
			$id = intval($id);

			$catData = $this->CatModel->getCatById($id);

			if ($catData->enabled == 1)
			{
				$this->CatModel->update($id, ['enabled' => 0]);
				$icon = '<i class="fa-solid fa-eye-slash text-secondary cursor-pointer"></i>';
				$title = lang('Category.Disabled');
			} 
			elseif ($catData->enabled == 0)
			{
				$this->CatModel->update($id, ['enabled' => 1]);
				$icon = '<i class="fa-solid fa-eye text-success	cursor-pointer"></i>';
				$title = lang('Category.Enabled');
			}
			else
			{
				return;
			}

			return $this->_AjaxSend(['id' => $id, 'icon' => $icon, 'title' => $title]); die();
  }

  public function TorrManage()
  {
			$data = $this->request->getPost();
			$ids = $data['ids'];
			$event = $data['event'];
			if ($event == 'delete') {
				foreach ($ids as $id)
				{
//					$this->TorrModel->delTorrent(int $id);
				}
			}
			else if ($event == 'move') {
				foreach ($ids as $id)
				{
//					$this->TorrModel->moveTorrent(int $id);
				}
			}
			else { die(); }

			return $this->_AjaxSend($data); die();
  }

}
