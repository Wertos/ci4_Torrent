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
		//$config = setting('Torrent');
		$config = config('Torrent');
		foreach ($config as $key => $val)
		{
			if (is_array($val))
			{
		        $text = '';
				foreach ($val as $v)
				{
					$text .= $v."<br>";
				}
				$val = $text;
				unset($text);
			}
			echo lang('Config.'.$key)."    ".$val."<br />";
			//var_dump(service('settings')->get('Torrent.legalAnnouncer'));
//		$this->db->table("setting")->insert($object);
		}
	}
}