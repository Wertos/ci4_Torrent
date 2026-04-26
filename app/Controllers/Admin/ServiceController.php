<?php                 

namespace App\Controllers\Admin;

use \CodeIgniter\Model\Admin;
use \CodeIgniter\AdminController;
use \App\Models\Admin\AdminModel;

class ServiceController extends \App\Controllers\AdminController
{

    function __construct()
    {
//		parent::initialize();
		$this->db = \Config\Database::connect();
	}

	public function OrphanedTorrents (?int $limit = 1)
	{
//		$result = mysqli_query($mysqli, "SELECT file_name FROM torrents");
		$result = $this->db->table('torrents')->select('file_name')
				->limit($limit)->orderBy('id', 'DESC')->get()->getResult();
		var_dump($result);
	
	}

	private function ReadTorrDir()
	{
		$filePath = setting()->get('Torrent.TorrentFilesPath');
		if ($dh = opendir($path)) {
			while (($file = readdir($dh)) !== false) {
				if($file == 'index.html' or $file == '.' or $file == '..') continue;
				if(in_array($file, $fff)) continue;
     		}
		}
		closedir($dh);
	}
	
}
