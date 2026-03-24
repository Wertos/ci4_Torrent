<?php                 

namespace App\Controllers\Admin;

use \CodeIgniter\Model\Admin;
use \CodeIgniter\AdminController;
use \App\Models\Admin\AdminModel;

class ConfigController extends \App\Controllers\AdminController
{
    protected function initialize(): void
    {
        parent::initialize();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
    	helper('setting');
		$config = config('Torrent');
		$settings = [];

		foreach ($config as $key => $val)
		{
			if(gettype($val) == "array") continue;
			$settings[$key] = $val;
		}

		$siteTitle = $this->TorrConfig->siteTitle . ' | ' . lang('Config.settingManager');
		$data = [
			'page_title' => $siteTitle,
			'settings'	=> $settings,
		];
		$this->themes::render('setting', $data);
	}
}