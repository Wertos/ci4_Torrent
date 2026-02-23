<?php                 

namespace App\Controllers\Admin;

use CodeIgniter\Model\Admin;
use \CodeIgniter\AdminController;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\Message;
use CodeIgniter\Exceptions\PageNotFoundException;


class TorrentController extends \App\Controllers\AdminController
{
    
    function __construct()
    {
        $this->CatModel = new \App\Models\Admin\CategoryModel();
		$this->TorrModel = new \App\Models\Admin\TorrentModel();
	}

    public function TorrList()
    {

		$limit = 50;
		$offset = 0;

        $getData = $this->request->getGet();

        $catId = isset($getData['catId']) ? $getData['catId'] : null;
        $statusId = isset($getData['statusId']) ? $getData['statusId'] : null;
        $poster = isset($getData['poster']) ? $getData['poster'] : null;

		if ($catId) {
			$this->TorrModel->where('category', $catId);
		}

		if ($statusId) {
			$this->TorrModel->where('modded', $statusId);
		}

		if ($poster) {
			$this->TorrModel->where('owner', $poster);
		}

		$this->TorrModel->join('categories', 'categories.id = torrents.category', 'left');
		$torrents = $this->TorrModel->findAll($limit, $offset);
		
		var_dump($torrents);

		foreach ($torrents as $tor)
		{
			var_dump($tor['name']); echo "<br />";
		}

	}


}