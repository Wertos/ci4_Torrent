<?php

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

class BrowseController extends BaseController
{

    public $GlobalModel;
    public $TorrentModel;
    public $SearchModel;
    public $siteTitle;

    function __construct()
    {
        $this->GlobalModel = model(GlobalModel::class);
        $this->TorrentModel = model(TorrentModel::class);
        $this->SearchModel = model(SearchModel::class);
		}

/************************************************************/
/*                                                          */
/*             Torrents view                                */
/*                                                          */
/*                                                          */
/************************************************************/
    public function BrowseView(?string $url = null)
    {
    	  helper('number');
    	  helper('torrent');
    	  $pager = service('pager');
	  		
    		$no_torrents = false;
    		if($url)
    		{

						if (! $cat = cache('CatFromUrl_' . $url)) {

								$cat = $this->GlobalModel->getCatFromUrl($url);
						
								cache()->save('CatFromUrl_' . $url, $cat);
						}
				
					if(! $cat)
							throw PageNotFoundException::forPageNotFound();
					
					$data['cat'] = $cat;

				}
				$catId = isset($cat->id) ? $cat->id : null;
				$catName = isset($cat->name) ? $cat->name : lang('Browse.allview');
				$torCount = $this->GlobalModel->getTorrentCount($catId);
        
        $page = (int) ($this->request->getGet('page') ?? 1);
        $perPage = setting('Torrent.torrentsPerPage');
		    $offset = ($page - 1) * $perPage;

				if (! $this->catHome = cache('CatHome')) {
						$this->catHome = $this->GlobalModel->getCatHome();
						cache()->save('CatHome', $this->catHome);
				}
		    
		    if($catId) {
						if (! $torrents = cache('TorrentByCat_' . $catId . '_' . $page)) {
					    	$torrents = $this->GlobalModel->getTorrentByCat($cat->id, $perPage, $offset);
					    	cache()->save('TorrentByCat_' . $catId . '_' . $page, $torrents);
		    		}
		    } else {
						if (! $torrents = cache('TorrentByCat_' . $page)) {
					    	$torrents = $this->GlobalModel->getAllTorrent($perPage, $offset);
					    	cache()->save('TorrentByCat_' . $page, $torrents);
		    		}
		    }
		    
		    $pager_links = $pager->makeLinks($page, $perPage, $torCount);

		    if(!$torrents)
		    {
		    	$no_torrents = true;
		    }
				
				$siteTitle = $this->TorrConfig->siteTitle . ' | ' . $catName;

			  $this->breadcrumb->append(lang('Browse.allview'), 'browse');
				
				if ($url) $this->breadcrumb->append($cat->name);

      	$data = [
      		'breadcrumb' => $this->breadcrumb->output(),
					'page_title' => $siteTitle,
					'torList' => $torrents,
					'no_torrents' => $no_torrents,
					'pager_links' => $pager_links,
				];			

				$this->themes::render('browse_view', $data);

		}

		public function SearchView (string $str)
		{
		  
   	  helper('number');
   	  helper('torrent');
			$pager = service('pager');
			$where = '';

		  $str = $this->request->getGet('text');
		  $catId = (int) $this->request->getGet('cat');

		  if ($catId)
		  			$where = ' AND category = ' . $catId . ' ';

			if ($str == '' || ! $str)
								return redirect()->back()->with('error', lang('Browse.nullstr'));

			$sstr = $this->SearchModel->cleanString($str);
			$arr = $this->SearchModel->StringToArray($sstr);
			$where1 = $this->SearchModel->ArrayToSql($arr, ['name']);
			$where2 = $this->SearchModel->ArrayToSql($arr, ['descr']);

		  if ($catId) {
		  			$where = ' AND category = ' . $catId . ' ';
						$sql = '(' . $where1 . $where . ')' . ' OR (' . $where2 . $where . ')';
			} else {
						$sql = $where1 . ' OR ' . $where2;
			}
			
			$no_torrents = true;
			$torr = [];
			$obj = new \StdClass;

//			var_dump($sql); die();
			$torrents = $this->SearchModel->asObject()
								->where(new RawSql($sql))
								->orderBy('created_at', 'DESC')->paginate(setting('Torrent.torrentsPerPage'));
			
			if ($torrents)
					$no_torrents = false;

			$siteTitle = $this->TorrConfig->siteTitle . ' | ' . lang('Browse.search');
		  $this->breadcrumb->append(lang('Browse.searchwhen') . ' "' . $str . '"');

		  foreach ($torrents as $arrkey => $value) {
				foreach ($torrents[$arrkey] as $key => $val) {
		  		if ($key == 'name') {
              $obj->name = $this->highlightKeywords($val, $str);
		  				continue;
		  		}
				  $obj->{$key} = $val;
				}
	  		$torr[$arrkey] = $obj;
	  		unset($obj);
	  		$obj = new \StdClass;
		  }

     	$data = [
      		'breadcrumb' => $this->breadcrumb->output(),
					'page_title' => $siteTitle,
					'torList' => $torr,
					'no_torrents' => $no_torrents,
					'pager_links' => $this->SearchModel->pager->only(['text', 'order'])->links(),
					'catId'	=> $catId,
					'searchString' => $str,
				];			

			$this->themes::render('search_view', $data);
		}

//		private function highlight_keywords($keyword, $string) {
//    	return preg_replace("/\p{L}*?".preg_quote($keyword)."\p{L}*/ui", "<b class='text-danger'>$0</b>", $string);
//		}

		private function highlightKeywords($text, $keyword)
		{
			//$keyword = str_replace(['+','-'], '', $keyword);
			$keyword = preg_replace('/[^a-zA-Zа-яёА-ЯЁ0-9\s]/iu', '', $keyword);
			$wordsAry = explode(" ", $keyword);

			$filteredArray = array_filter($wordsAry, function($value) {
    			return mb_strlen($value) >= 3;
			});
      $filteredArray = array_values($filteredArray);

			$wordsCount = count($filteredArray);
			
			for($i=0;$i<$wordsCount;$i++) {
				$highlighted_text = "<i class='text-danger'>$filteredArray[$i]</i>";
				$text = str_ireplace($filteredArray[$i], $highlighted_text, $text);
			}

			return $text;
		}

}