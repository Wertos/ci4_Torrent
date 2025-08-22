<?php

namespace App\Controllers;

use CodeIgniter\Files\File;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\I18n\Time;
use App\Libraries\BBCode\BBCodeParser;
use App\Models\TorrentModel;
use App\Models\CommentModel;
use App\Models\GlobalModel;
use App\Models\BookmarkModel;
use App\Models\ReportModel;

class TorrentController extends BaseController
{
    public $GlobalModel;
    public $TorrentModel;
    public $CommentModel;
    public $BookmarkModel;
    public $ReportModel;
	public $siteTitle;

    function __construct()
    {
        $this->GlobalModel = model(GlobalModel::class);
        $this->TorrentModel = model(TorrentModel::class);
        $this->CommentModel = model(CommentModel::class);
        $this->BookmarkModel = model(BookmarkModel::class);
        $this->ReportModel = model(ReportModel::class);
		}

/************************************************************/
/*                                                          */
/*             Torrent detail view                          */
/*                                                          */
/*                                                          */
/************************************************************/
    public function TorrentView(?int $tId = null)
    {
      helper('tree');
      helper('number');
      helper('form');
      helper('torrent');
	  helper('smiley');

			$torrentData = $this->TorrentModel->getDetail($tId);

			if(! $torrentData)
								throw PageNotFoundException::forPageNotFound();

			if($torrentData->deleted_at != null)
								return redirect()->back()->with('error', lang('Torrent.deleted'));

			$owner = ($this->userData->id == $torrentData->owner);

	   	$can_edit = 
		    			($owner && $this->userData->can('tor.ownededit'))
		    			|| ($owner && $this->userData->is_uploader)
	    				|| $this->userData->is_moderator
    					|| $this->userData->is_admin
    					|| $this->userData->is_superadmin;
    	
    	$can_moderate = 
						    $this->userData->is_moderator
    						|| $this->userData->is_admin
    						|| $this->userData->is_superadmin;
      
      $this->TorrentModel->updateViews($tId);

			if ($can_moderate)
							$cats = $this->GlobalModel->getCats();

			if( $torrentData === null )
								return redirect()->back()->with('error', lang('Torrent.notfound'));

			$torrentFile = $this->TorrentModel->torrLoad(setting('Torrent.TorrentFilesPath'), $torrentData->file_name);
			
    	$data = [];
		
			$pager = service('pager');
			
			if (setting('Torrent.commenEnable'))
			{
					$comments = $this->CommentModel->asObject()->where('fid', $tId)->orderBy('created_at', 'DESC')->getPagination(setting('Torrent.commentPerPage'));
			}
	   	
	   	$status = getDataTorrStatus($torrentData->modded, 'fs-2');
	   	$table = new \CodeIgniter\View\Table();

	   	$smilies_array = get_clickable_smileys('/uploads/smileys/', 'floatingTextInput');
	   	$col_array = $table->makeColumns($smilies_array, 8);

	   	$annList = [];
		$ann = $this->TorrentModel->getAnnounceList()->toArray();
		array_walk_recursive($ann, function ($item) use (&$annList) {
		    $annList[] = $item;    
		});
	   	$annList[] = $this->TorrentModel->getAnnounce();
		$annList = array_unique($annList);

	   	$data = [
	   			'hash_v1' => $this->TorrentModel->hashToString($torrentData->infohash_v1),
	   			'hash_v2' => $this->TorrentModel->hashToString($torrentData->infohash_v2),
	   			'ogimage' => $torrentData->poster,
	   			'bbcode' => new BBCodeParser(),
      			'icon' => $status['icon'],
      			'title' => $status['title'],
      			'class' => $status['class'],
      			'details' => $torrentData,
		      	'poster' => img($torrentData->poster),
		      	'can_delete' => ($can_moderate || $can_edit),
				'can_edit' => $can_edit,
				'moderate' => $can_moderate,
				'download' => (setting('Torrent.allowUploadTorrent') === true) && in_array((int) $torrentData->modded, setting('Torrent.statusAllowDownload')),
				'allowmagnet' => ($torrentData->modded === "1" || $torrentData->modded === "0"),
				'allowreport' => (setting('Torrent.allowreport') === true),
				'allowFileList' => (setting('Torrent.allowFileList') === true),
				'filestree' => (setting('Torrent.allowFileList') === true) ? $torrentFile->toTree() : null,
				'cats' => ($can_moderate) ? $cats : null,
				'comments' => $comments['comments'] ?? null,
				'paginate' => $this->CommentModel->pager,
				'canCommentEdit' => ($this->userData->logged_in && $this->userData->can('comment.ownededit')),
				'canCommentDelete' => ($this->userData->logged_in && $this->userData->can('comment.owneddelete')),
				'smilies' => $table->generate($col_array),
				'announceList' => count($annList) > 0 ? $annList : ['No tracker'],
				'bookmark' => $this->BookmarkModel->where(['user_id' => $this->userData->id, 't_id' => $torrentData->id])->first(),
			];

			$siteTitle = $this->TorrConfig->siteTitle . ' | ' . $torrentData->name;

      $this->breadcrumb->append(lang('Browse.allview'), 'browse');
      $this->breadcrumb->append($torrentData->catname, $torrentData->caturl);
      $this->breadcrumb->append($torrentData->name);      
      $data['breadcrumb'] = $this->breadcrumb->output();
	  $data['page_title'] = $siteTitle;

			$this->themes::render('torrent_view', $data);
    }

/************************************************************/
/*                                                          */
/*             Torrent add view                             */
/*                                                          */
/*                                                          */
/************************************************************/
    public function TorrentAddShow()
    {

      helper('torrent');
			helper('smiley');
    	helper('form');
    	
    	if(!$this->userData->can_upload)
    						return redirect()->to('/')->with('error', lang('Torrent.uploadforbidden'));
    	
			$this->catList = $this->GlobalModel->getCats();

			$siteTitle = $this->TorrConfig->siteTitle . ' | ' . lang('Torrent.addTorrent');
			$this->breadcrumb->append(lang('Torrent.addTorrent'));

	   	$table = new \CodeIgniter\View\Table();
	   	$smilies_array = get_clickable_smileys('/uploads/smileys/', 'floatingDescInput');
	   	$col_array = $table->makeColumns($smilies_array, 8);

      $data = [
      		'breadcrumb' => $this->breadcrumb->output(),
					'page_title' => $siteTitle,
					'cats' => $this->catList,
					'posterRequired' => setting('Torrent.posterRequired') ? ' required ' : '',
					'smilies' => $table->generate($col_array),
			];			

			$this->themes::render('torrent_add', $data);
    }


/************************************************************/
/*                                                          */
/*             Torrent edit view                            */
/*                                                          */
/*                                                          */
/************************************************************/
    public function TorrentEditShow($tId)
    {
    	
    	helper('form');
      helper('torrent');
			helper('smiley');

      $torrentData = $this->TorrentModel->getDetail($tId);

			if(! $torrentData)
								throw PageNotFoundException::forPageNotFound();

    	//if(!$this->userData->can_upload)
    	//					return redirect()->to('/')->with('error', lang('Torrent.editforbidden'));
    	
			$owner = ($this->userData->id == $torrentData->owner);

    	$can_edit = 
		    			($owner && $this->userData->can('tor.ownededit'))
		    			|| ($owner && $this->userData->is_uploader)
						  || $this->userData->is_moderator
    					|| $this->userData->is_admin
    					|| $this->userData->is_superadmin;

			if(! $can_edit)
				    	return redirect()->to('/')->with('error', lang('Torrent.notowner'));

			$catList = $this->GlobalModel->getCatHome();
      
			if( $torrentData === null )
								return redirect()->back()->with('error', lang('Torrent.notfound'));

			$siteTitle = $this->TorrConfig->siteTitle . ' | ' . lang('Torrent.editTorrent');
			$this->breadcrumb->append(lang('Torrent.editTorrent'));

	   	$table = new \CodeIgniter\View\Table();
	   	$smilies_array = get_clickable_smileys('/uploads/smileys/', 'floatingDescInput');
	   	$col_array = $table->makeColumns($smilies_array, 8);

      $data = [
      		'catlist' => $catList,
      		'details' => $torrentData,
      		'breadcrumb' => $this->breadcrumb->output(),
					'page_title' => $siteTitle,
					'posterRequired' => setting('Torrent.posterRequired') ? ' required ' : '',
					'smilies' => $table->generate($col_array),
			];			

			$this->themes::render('torrent_edit', $data);
    }



/************************************************************/
/*                                                          */
/*             Torrent edit action                          */
/*                                                          */
/*                                                          */
/************************************************************/
    public function TorrentEditAction($tId)
    {

    	if(!$this->userData->can_upload)
    						return redirect()->to('/')->with('error', lang('Torrent.editforbidden'));
    	
			$torrentData = $this->TorrentModel->getDetail($tId);
			
			$owner = ($this->userData->id == $torrentData->owner);

    	$can_edit = 
		    			($owner && $this->userData->can('tor.ownededit'))
		    			|| ($owner && $this->userData->is_uploader)
						  || $this->userData->is_moderator
    					|| $this->userData->is_admin
    					|| $this->userData->is_superadmin;

			if(! $can_edit)
				    	return redirect()->to('/')->with('error', lang('Torrent.editforbidden'));
			
			$validation = service('validation');

			$rules = $this->TorrentModel->validationRules;
			
			unset($rules['torrentfile']);

			$postData = $this->request->getPost();
			
			$postData['can_comment'] = ($postData['can_comment'] == "on") ? 1 : 0;

			if (isset($postData['csrf_test_name']))
						unset($postData['csrf_test_name']);
			
			if(! setting('Torrent.posterRequired')) {
					unset($rules['poster']);
			}
			
			if (! $this->validateData($postData, $rules)) {
         		return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
      }

 			$postData['url'] = url_title($this->translit->transliterate($postData['name']), '-', true);

 			$this->TorrentModel->update($tId, $postData, true);
			return redirect()->to('torrent/'.$tId)->with('message', lang('Torrent.editsuccess'));

	}

/************************************************************/
/*                                                          */
/*             Torrent add action                           */
/*                                                          */
/*                                                          */
/************************************************************/
    public function TorrentAddAction()
    {

//    	helper('debug');
    	if(!$this->userData->can_upload)	{
    			return redirect()->to('/')->with('error', lang('Torrent.uploadforbidden'));
    	}

    	$can_moderate = 
						    ($this->userData->is_moderator
    						|| $this->userData->is_admin
    						|| $this->userData->is_superadmin);

			$tId = null;

			$validation = service('validation');

			$rules = $this->TorrentModel->validationRules;

			$postData = $this->request->getPost();
			
			$postData['can_comment'] = ($postData['can_comment'] == "on") ? 1 : 0;

			if (isset($postData['csrf_test_name']))
						unset($postData['csrf_test_name']);

			if(! setting('Torrent.posterRequired')) {
					unset($rules['poster']);
			}
			
//			var_dump($_FILES);
//			die();
			if (! $this->validateData($postData, $rules)) {
         		return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
			}
			
	   	$torrFile = $this->request->getFile('torrentfile');
		$torrName = $torrFile->getRandomName();
		$torrPath = $torrFile->store(setting('Torrent.TorrentUploadPath'), $torrName);

    	$this->torrent = $this->TorrentModel->torrLoad(setting('Torrent.TorrentFilesPath'), $torrName);

    	$torrHashes = $this->torrent->getInfoHashes();
		$torrVersion = $this->torrent->getVersion();

      	$data = [
      		'owner'	=>	$this->userData->id,
      		'numfiles'	=>	$this->torrent->getFilesCount(),
      		'size'	=>	$this->torrent->getSize(),
      		'type'	=>	$this->torrent->isPrivate() ? 1 : 0,
      		'name'	=>	$postData['name'],
      		'descr'	=>	$postData['descr'],
      		'category'	=>	(int) $postData['category'],
      		'poster'	=>	$postData['poster'],
      		'magnet'	=>	$this->torrent->getMagnet(),
      		'url'	=>	url_title($this->translit->transliterate($postData['name']), '-', true),
      		'file'	=> ((setting('Torrent.allowUploadTorrent') === true) && $torrPath) ? 1 : 0,
      		'can_comment'	=>	($postData['can_comment']) ? 1 : 0,
      		'modded'	=>	($can_moderate) ? 1 : 0,
      		'file_name'	=>	$torrName,
      		'version'	=>	$torrVersion,
      		'created_at' => Time::now(setting('App.appTimezone'))->toDateTimeString(),
      ];

      $arr = $this->TorrentModel->torrCheck($torrVersion, isset($torrHashes[1]) ? $torrHashes[1] : null, isset($torrHashes[2]) ? $torrHashes[2] : null);

      if($torrVersion == 1)
      {
      		$data['infohash_v1'] = $arr['hash1'];
      		$data['infohash_v2'] = null;
      		if(! isset($arr['tid']) )
      		{
      			$id = $this->TorrentModel->insert($data);
				return redirect()->to('torrent/'.$id)->with('message', lang('Torrent.uploadsuccess_v1'));
			}
      }
      elseif($torrVersion == 2)
      {
      		$data['infohash_v2'] = $arr['hash2'];
      		$data['infohash_v1'] = null;
      		if(! isset($arr['tid']) )
			{
      			$id = $this->TorrentModel->insert($data, true);
				return redirect()->to('torrent/'.$id)->with('message', lang('Torrent.uploadsuccess_v2'));
			}

      }
      elseif($torrVersion == 3)
      {
      		$data['infohash_v1'] = $arr['hash1'];
      		$data['infohash_v2'] = $arr['hash2'];

      		if(! isset($arr['tid']) )
			{
      			$id = $this->TorrentModel->insert($data, true);
				return redirect()->to('torrent/'.$id)->with('message', lang('Torrent.uploadsuccess_v3'));
			}
      }

	  return redirect()->back()->with('error', lang('Torrent.uploaderror', ["id => {$arr['tid']['id']}"]));  		
    }

/************************************************************/
/*                                                          */
/*             Torrent download                             */
/*                                                          */
/*                                                          */
/************************************************************/
		public function TorrentSend($tId)
		{
      $torrentData = $this->TorrentModel->getFileName($tId);
			
			if( $torrentData === null )
								return redirect()->back()->with('error', lang('Torrent.notfound'));

			$torrentFile = setting('Torrent.TorrentFilesPath') . $torrentData->file_name;

			if ( !file_exists($torrentFile) )
			          return redirect()->back()->with('error', lang('Torrent.notfound'));

			$torrentFile = $this->TorrentModel->torrLoad(setting('Torrent.TorrentFilesPath'), $torrentData->file_name);

			$this->TorrentModel->updateDownloaded($tId);
			
			$torrString = $torrentFile->toString();

			return $this->response->download($tId . '.torrent', $torrString);
		}

/************************************************************/
/*                                                          */
/*             Torrent delete                               */
/*                                                          */
/*                                                          */
/************************************************************/
		public function TorrentDelete(int $tId)
		{

      $torrentData = $this->TorrentModel->getFileName($tId);
			$storeFiles = $this->TorrentModel->useSoftDeletes;
			
			if( $torrentData === null )
								return redirect()->back()->with('error', lang('Torrent.notfound'));

			$owner = ($this->userData->id == $torrentData->owner);

    	$can_delete = 
		    			($owner && $this->userData->can('tor.ownededit'))
		    			|| ($owner && $this->userData->is_uploader)
						  || $this->userData->is_moderator
    					|| $this->userData->is_admin
    					|| $this->userData->is_superadmin;

			if(! $can_delete)
				    	return redirect()->to('/')->with('error', lang('Torrent.deleteforbidden'));

			$torrentFile = setting('Torrent.TorrentFilesPath') . $torrentData->file_name;

			$this->CommentModel->where('fid', $tId)->delete();
			$this->ReportModel->where('fid', $tId)->delete();
			$this->BookmarkModel->where('t_id', $tId)->delete();
			$this->TorrentModel->delete($tId);
			
			if ( file_exists($torrentFile) && ! $storeFiles)
								unlink($torrentFile);
			
			return redirect()->to('/')->with('message', lang('Torrent.deletesucess'));
		}

}
