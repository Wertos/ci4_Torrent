<?php                 

namespace App\Controllers\Admin;

use \CodeIgniter\Model\Admin;
use \CodeIgniter\AdminController;
use \App\Models\Admin\AdminModel;

class Home extends \App\Controllers\AdminController
{
    private $adminModel;
    public $siteTitle;

    public function index()
    {
      $this->adminModel = model(AdminModel::class);

			$data['newUsers'] = $this->adminModel->getCountUsersOnDay();
			$data['countUsers'] = $this->adminModel->getCountUsers();

			$data['newTorrents'] = $this->adminModel->getTorrentsOnDay();
			$data['countTorrents'] = $this->adminModel->getCountTorrents();
			
			$data['newComments'] = $this->adminModel->getCommentsOnDay();
			$data['countComments'] = $this->adminModel->getCountComments();

			$data['newReports'] = $this->adminModel->getReportsOnDay();
			$data['countReports'] = $this->adminModel->getCountReports();

			$this->siteTitle = $this->TorrConfig->siteTitle . ' | ' . lang('Admin.AdminHome');
			
			$data['page_title'] = $this->siteTitle;
			
			$this->themes::render('home', $data);
    }
}
