<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\NewsModel;

class NewsController extends BaseController
{

    public $NewsModel;

    function __construct()
    {
        $this->NewsModel = model(NewsModel::class);
	}

    public function NewsView(?int $id = null)
    {
    	  helper('number');
    	  helper('torrent');
				helper('form');

	    	if(! $id)
  	  	     throw PageNotFoundException::forPageNotFound();

    		$news = $this->NewsModel->asObject()->find($id);

				$siteTitle = $this->TorrConfig->siteTitle . ' | ' . $news->title;
	      $this->breadcrumb->append(lang('News.news'), '');
  	    $this->breadcrumb->append($news->title);      
			
				$data = [
						'page_title' => $siteTitle,
						'newsData' => $news,
						'breadcrumb' => $this->breadcrumb->output(),
				];
			
				$this->themes::render('news_view', $data);
		
		}

}