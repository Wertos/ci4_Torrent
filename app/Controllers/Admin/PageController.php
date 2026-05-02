<?php                 

namespace App\Controllers\Admin;

use \CodeIgniter\Model\Admin;
use \CodeIgniter\AdminController;
use \App\Models\Admin\AdminModel;

class PageController extends \App\Controllers\AdminController
{
	protected function initialize(): void
	{
		parent::initialize();
		$this->db = \Config\Database::connect();
		$this->NewsModel = model(NewsModel::class);
	}

	public function pageAddView()
	{
		helper('form');
		$siteTitle = $this->TorrConfig->siteTitle . ' | ' . lang('Page.addnews');
		$data = ['page_title' => $siteTitle];
		$this->themes::render('page_add', $data);

	}
	public function pageAddAction()
	{
	}

	public function pageEditView()
	{
	}
	public function pageEditAction()
	{
	}
}