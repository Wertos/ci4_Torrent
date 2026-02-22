<?php
declare(strict_types=1);

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\Database\RawSql;
use App\Models\TorrentModel;
use App\Models\SearchModel;
use App\Models\GlobalModel;

class ModController extends BaseController
{

    public $GlobalModel;
    public $TorrentModel;
    public $SearchModel;
    public $siteTitle;
    private $DBDriver;

    function __construct()
    {
        $this->GlobalModel = model(GlobalModel::class);
        $this->TorrentModel = model(TorrentModel::class);
        $this->SearchModel = model(SearchModel::class);
        $this->DBDriver = \Config\Database::connect()->DBDriver;
	}

/************************************************************/
/*                                                          */
/*             Torrents view                                */
/*                                                          */
/*                                                          */
/************************************************************/
    public function UncheckView()
    {
    	  helper('number');
    	  helper('torrent');
    	  $pager = service('pager');
	  		
		  $no_torrents = false;
    
          if(! $this->isMod)
					throw PageNotFoundException::forPageNotFound();
		  
		 $torrents = $this->TorrentModel->asObject()->select('c.url as caturl, c.id, c.name as catname, torrents.*, u.username')
            ->join('categories c', 'c.id = torrents.category', 'left')
            ->join('users u', 'u.id = torrents.owner', 'left')
		 	->where('torrents.modded', 0)
		 	->where('torrents.deleted_at', null)
		 	->paginate(setting('Torrent.torrentsPerPage'));

//		 var_dump($torrents); die();
		 if(!$torrents)
		 {
		   	$no_torrents = true;
		 }
				
		 $siteTitle = $this->TorrConfig->siteTitle . ' | ' . lang('Admin.unchecked');
         $this->breadcrumb->append(lang('Admin.unchecked'), '');

      	 $data = [
      		'breadcrumb' => $this->breadcrumb->output(),
			'page_title' => $siteTitle,
			'torList' => $torrents,
			'no_torrents' => $no_torrents,
			'pager_links' => $this->TorrentModel->pager->links(),
		 ];

		$this->themes::render('browse_view', $data);
    }
}