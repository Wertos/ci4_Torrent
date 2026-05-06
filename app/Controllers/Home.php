<?php
declare(strict_types=1);

namespace App\Controllers;

use CodeIgniter\I18n\Time;

class Home extends BaseController
{
	public $siteTitle;

	function __construct()
	{
	}
	
	public function index()
	{
		helper('number');
		helper('torrent');
		helper('kinopoisk');
		$no_torrents = true;
		$no_cats = $this->catHome ? true : false;
		$torList = [];
		foreach ($this->catHome as $catList)
		{
			$torList[$catList->id] = [];
			if (intval($catList->count) > 0)
			{
				if ( !($torList[$catList->id] = cache( 'TorrentByCatOnIndex_' . $catList->id, )) )
				{
					$torList[$catList->id] = $this->GlobalModel->getTorrentByCat( (int)$catList->id, setting('Torrent.torrentsPerCatOnIndex') );
					cache()->save( 'TorrentByCatOnIndex_' . $catList->id, $torList[$catList->id] );
				}
				$no_torrents = false;
			}
		}
		$siteTitle = $this->TorrConfig->siteTitle . ' | ' . lang('Site.SiteHome');
		$this->breadcrumb->append( $this->TorrConfig->siteName . ' - ' . $this->TorrConfig->siteDescr );
		$data = [
			'breadcrumb' => $this->breadcrumb->output(),
			'page_title' => $siteTitle,
			'torList' => $torList,
			'cats' => $no_cats,
			'torrents' => $no_torrents
		];
		$this->themes::render('home', $data);
	}
}