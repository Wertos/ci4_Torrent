<?php
declare(strict_types=1);

namespace App\Controllers;

use CodeIgniter\Model;
use App\Models\Admin\AdminModel;
use App\Models\TorrentModel;
use App\Models\CommentModel;
use App\Models\ReportModel;
use App\Models\BookmarkModel;
use App\Models\Admin\CategoryModel;
use CodeIgniter\BaseController;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\Message;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\I18n\Time;
use Arifrh\Themes\Themes;
use Scrapeer\Scraper;
use App\Libraries\BBCode\BBCodeParser;
use \App\Libraries\Captcha\Image;

class AjaxController extends \App\Controllers\BaseController
{
  public $request;
  public $ajax;
  public $scraper;
  public $GlobalModel;
  public $TorrentModel;
  public $CommentModel;
  public $BookmarkModel;
  public $AdminModel;
  public $ReportModel;
  public $adminModel;
  public $eventData;

  function __construct()
  {
      //parent::__construct();
      
      $this->request = request();

	  	if ($this->request->isAJAX() === FALSE) {
				throw PageNotFoundException::forPageNotFound();
	  	}

      //$this->output->enable_profiler(FALSE);
    	$this->ajax = new \stdClass();

    	$this->ajax->action = $this->request->getVar('action');

    	switch ($this->ajax->action) {
				case 'torstatus':
      				$this->adminModel = model(AdminModel::class);
      				$this->TorrentModel = model(TorrentModel::class);	
      			break;
				case 'tormove':
      				$this->adminModel = model(AdminModel::class);
      				$this->TorrentModel = model(TorrentModel::class);
      			break;
				case 'updatepeers':
      				$this->scraper = new Scraper();
      				$this->TorrentModel = model(TorrentModel::class);
      			break;
				case 'commentedit':
				case 'commentdelete':
      				$this->CommentModel = model(CommentModel::class);
      			break;
				case 'ajaxpag':
      				$this->TorrentModel = model(TorrentModel::class);
      			break;
				case 'addreport':
      				$this->ReportModel = model(ReportModel::class);
      			break;
				case 'posterupload':
				case 'posterurlupload':
				case 'torrupload':
      				$this->TorrentModel = model(TorrentModel::class);
      			break;
				case 'userdata':
      				$this->TorrentModel = model(TorrentModel::class);
      				$this->CommentModel = model(CommentModel::class);
      				$this->BookmarkModel = model(BookmarkModel::class);
      				$this->GlobalModel = model(GlobalModel::class);
      			break;
                case 'delavatar':
		      	break;
                case 'torrpreview':
		      	break;
		      	case 'updatecaptcha':
			        $this->captcha = new Image();
					$this->captcha->imageWidth = 250;
					$this->captcha->imageHeight = 100;
					$this->session = service('session', config('Session'));
      			break;
      		default: 
      			throw PageNotFoundException::forPageNotFound();
      }
  }

  private function _AjaxSend($data) 
  {
		return $this->response->setJSON($data);
  }

  public function delAvatar()
  {
		if (! $this->userData->logged_in)
			throw PageNotFoundException::forPageNotFound();

		$users = auth()->getProvider();
		$user = $users->findById($this->userData->id);
		$user->fill([
    		'avatar' => ''
		]);
		$users->save($user);
		unlink(setting('Torrent.AvatarHtmlPath') . $this->userData->avatar);
		$data = [
			'src'	=>	'/' . setting('Torrent.AvatarHtmlPath') . 'default_avatar.jpg',
			'error'	=>	'',
		];
		return $this->_AjaxSend($data);
  }
  
  public function TorrentStatus(int $id)
  {
      helper('torrent');

	  	if (! auth()->user()->inGroup('superadmin', 'admin', 'moderator')) {
	  		throw PageNotFoundException::forPageNotFound();
	  	}	

		$data['modded'] = '';
		$data['icon'] = '';
		$data['class'] = '';
		$data['status_text'] = '';

	  	$status = (int) $this->request->getPost('status');
	  	$id = (int) $this->request->getPost('id');
	  	$action = (string) $this->request->getPost('action');
 	    if (! $id) return;
 	    $stdata = getDataTorrStatus($status, 'fs-1');

 		$data['modded'] = $status;
		$data['icon'] = $stdata['icon'];
		$data['class'] = $stdata['class'];
		$data['status_text'] = $stdata['title'];
//		var_dump($id); die();
	  	$st = $this->TorrentModel->update($id, ['modded' => $status]);

		$data['action']	=	$action;
		$data['id']	=	$id;
		$data['error'] = ($st == true) ? '' : 'error';
		$data['status'] = $status;
			
		return $this->_AjaxSend($data); die();
  }

  public function TorrentMove($id)
  {
	  	if (! auth()->user()->inGroup('superadmin', 'admin', 'moderator')) {
	  		throw PageNotFoundException::forPageNotFound();
	  	}	

	  	$id = (int) $this->request->getPost('id');
	  	if (! $id) return;
	  	$action = (string) $this->request->getPost('action');
	  	$newId = (int) $this->request->getPost('newid');
		  
	  	$st = $this->TorrentModel->update($id, ['category' => $newId]);

			$data['action']	=	$action;
			$data['id']	=	$id;
			$data['newId']	=	$newId;
			$data['error'] = ($st == true) ? '' : lang('Torrent.torrmoveNot');
			$data['success'] = ($st == true) ? lang('Torrent.torrmoveOk') : '';
			
			return $this->_AjaxSend($data); die();
	}

  public function TorrentScrape(?int $id = null)
  {
	  	if (! auth()->user()->inGroup('superadmin', 'admin', 'moderator')) {
	  		throw PageNotFoundException::forPageNotFound();
	  	}	

	  	if (! $id || $id != (int) $this->request->getPost('id')) {
	  		throw PageNotFoundException::forPageNotFound();
	  	}	

			$torrentData = $this->TorrentModel->getDetail($id);
			
			//$torrentFile = $this->TorrentModel->torrLoad(setting('Dirpath.TorrentFilesPath'), $torrentData->file_name);
			
			$errors = [];
			$info = [];
			$seed = 0;
			$leech = 0;
			$completed = 0;

			$announcer = setting('Torrent.legalAnnouncer');
			$maxTimeOnAnnouncer = setting('Torrent.maxTimeOnAnnouncer');
			$useTorrentAnnouncer = setting('Torrent.useTorrentAnnouncer');
			
			$infoHash_V1 = isset($torrentData->infohash_v1) ? $this->TorrentModel->hashToString($torrentData->infohash_v1) : null;
			$infoHash_V2 = isset($torrentData->infohash_v2) ? mb_substr($this->TorrentModel->hashToString($torrentData->infohash_v2), 0, 40) : null;

			if($infoHash_V1 && !$infoHash_V2)
			{
				$hash = [$infoHash_V1];
			}
			if(!$infoHash_V1 && $infoHash_V2)
			{
				$hash = [$infoHash_V2];
			}
			if($infoHash_V1 && $infoHash_V2)
			{
				$hash = [$infoHash_V1, $infoHash_V2];
			}
//			var_dump($infoHash_V1); die();			
			$info[$infoHash_V1 ?? '']['seeders'] = 0;
			$info[$infoHash_V2 ?? '']['seeders'] = 0;
			$info[$infoHash_V1 ?? '']['leechers'] = 0;
			$info[$infoHash_V2 ?? '']['leechers'] = 0;
			$info[$infoHash_V1 ?? '']['completed'] = 0;
			$info[$infoHash_V2 ?? '']['completed'] = 0;

			$iii = $this->scraper->scrape( $hash, $announcer, count($announcer), $maxTimeOnAnnouncer);

			if($iii) $info = array_replace_recursive($info, $iii);

			if ( $this->scraper->has_errors() ) {
				 $errors = $this->scraper->get_errors() ;
			}

			if($useTorrentAnnouncer)
			{
			
			}

			if($infoHash_V1 && !$infoHash_V2)
			{
				$seed = $info[$infoHash_V1]['seeders'];
				$leech = $info[$infoHash_V1]['leechers'];
				$completed = $info[$infoHash_V1]['completed'];
			}
			if(!$infoHash_V1 && $infoHash_V2)
			{
				$seed = $info[$infoHash_V2]['seeders'];
				$leech = $info[$infoHash_V2]['leechers'];
				$completed = $info[$infoHash_V2]['completed'];
			}
			if($infoHash_V1 && $infoHash_V2)
			{
				$seed = $info[$infoHash_V1]['seeders'] + $info[$infoHash_V2]['seeders'];
				$leech = $info[$infoHash_V1]['leechers'] + $info[$infoHash_V2]['leechers'];
				$completed = $info[$infoHash_V1]['completed'] + $info[$infoHash_V2]['completed'];
			}
//			var_dump($seed."  ".$leech."  ".$completed); die();
			$updated_peer = Time::now(setting('App.appTimezone'))->toDateTimeString();
			$this->TorrentModel->update($id, ['seed' => $seed, 'leech' => $leech, 'completed' => $completed, 'updated_peer' => $updated_peer]);

			$data['id']	=	$id;
			$data['error'] = '';//$errors;
			$data['seeders'] = number_format($seed);
			$data['completed'] = number_format($completed);
			$data['leechers'] = number_format($leech);
			
			return $this->_AjaxSend($data); die();
	}

  public function CommentEditView(?int $id = null)
  {
  	
  	if(! $this->userData->logged_in)
  					throw PageNotFoundException::forPageNotFound();

  	$comment = $this->CommentModel->where('id', $id)->first();
  	return $this->_AjaxSend($comment); die();
  }

  public function CommentEditAction(?int $id = null)
  {
      $postData = $this->request->getPost();
      
      $text = $postData['text'];
			
			$validation = service('validation');

			$rules = $this->CommentModel->validationRules;
			
			if(!$text || $text === '')
								return $this->_AjaxSend(['error' => lang('Comment.notext')]);

			if (! $this->validateData($postData, $rules)) {
         				return $this->_AjaxSend(['error' => $this->validator->getErrors()]); die();
      }
			
			$bbcode = new BBCodeParser();
			$rendered_text = $bbcode->parse($text);

  		$this->CommentModel->update($id, ['text' => $text]);

  		return $this->_AjaxSend(['id' => $id, 'html' => $rendered_text, 'error' => '']); die();
  }

  public function CommentDelete(?int $id = null)
  {
      $postData = $this->request->getPost();

			if (!($this->userData->logged_in && $this->userData->can('comment.owneddelete')) || !$this->userData->can('comment.delete'))
									throw PageNotFoundException::forPageNotFound();

			$this->CommentModel->delete($id);
			
			return $this->_AjaxSend(['id' => $id, 'error' => '']); die();
	}

  public function AjaxPag()
  {
			helper('number');
			helper('torrent');

  		$catId = (int) $this->request->getPost('catid');
  		$event = (string) $this->request->getPost('event');
  		$action = (string) $this->request->getPost('action');
  		$offset = (int) $this->request->getPost('offset');
      if ($event == 'forward') {
      	$offset = $offset + setting('Torrent.torrentsPerCatOnIndex');
      }
      elseif ($event == 'backward') {
      	$offset = $offset - setting('Torrent.torrentsPerCatOnIndex');
      }
      $offset = ($offset <= 0) ? 0 : $offset;

      $torrCount = $this->TorrentModel->where('category', $catId)->countAllResults();

      $torList = $this->GlobalModel->getTorrentByCat($catId, setting('Torrent.torrentsPerCatOnIndex'), $offset);
      
      //var_dump($torList); die();
      $data = [
      		'torList' => $torList,
      		'catId' => $catId,
      		'event' => $event,
      		'offset' => $offset,
      		'action' => $action,
      		'torrcount' => $torrCount,
      		'perpage' => (int) setting('Torrent.torrentsPerCatOnIndex'),
      ];
      
      $html = $this->themes::render('ajax_templates/ajaxpag.php', $data);
			
			$data['html'] = $html;

			return $this->_AjaxSend($data); die();
  }

	public function AddReport()
	{
	
	  	if(! $this->userData->logged_in)
  					throw PageNotFoundException::forPageNotFound();
  		
  		$data['tid'] = (int) $this->request->getPost('id');
  		$data['location'] = (string) $this->request->getPost('type');
  		$data['comment'] = (string) $this->request->getPost('comment');
  		$data['sender'] = $this->userData->id;
  		$data['ip'] = $this->request->getIPAddress();
		$data['category'] = (int) $this->request->getPost('category');
		$act = false;
  		
  		$checkReport = $this->ReportModel->where(['tid' => $data['tid'], 'modded_by' => 0, 'location' => $data['location']])->first();

  		if(! $checkReport)
  				$act = $this->ReportModel->insert($data);
  		
  		$data['error'] = ($act) ? false : true;
  		$data['error_text'] = (!$act) ? lang('Report.adderror') : '';
  		$data['success_text'] = ($act) ? lang('Report.addsuccess') : '';
  		$data['action'] = (string) $this->request->getPost('action');
  		
  		return $this->_AjaxSend($data); die();
	}

	public function TorrUpload()
	{
	  	if(! $this->userData->logged_in)
  					throw PageNotFoundException::forPageNotFound();

		$validation = service("validation");
		$rules = $this->TorrentModel->validationRules['torrentfile'];
		unset($rules['label']);
        $file = $this->request->getFile('torrentfile'); // 'userfile' is the name attribute of your input file field
        $tId = (int) $this->request->getPost('tid');
        $path = setting('Torrent.TorrentFilesPath');
		if(! $file) {
        	$data = ['error' => lang('Torrent.filenotfound')];
            return $this->_AjaxSend($data); die();
		}
        if($tId > 0)
	        $oldtName = $this->TorrentModel->getFileName($tId);
        if(! $oldtName) {
        	$data = ['error' => lang('Torrent.notfound')];
            return $this->_AjaxSend($data); die();
        }
        if(! $this->userData->can_upload) {
        	$data = ['error' => lang('Torrent.uploadforbidden')];
            return $this->_AjaxSend($data); die();
        }
		if (!$this->validateData([$file], $rules))
		{
//			var_dump($this->validator->getErrors());
        	$data = ['error' => lang('Torrent.nottorrent')];
            return $this->_AjaxSend($data); die();
		}
		unset($data);
		$torrName = $file->getRandomName();
		$torrPath = $file->store(setting("Torrent.TorrentUploadPath"), $torrName);
		if (file_exists(setting("Torrent.TorrentFilesPath").$torrName)) {
			//unlink(setting("Torrent.TorrentFilesPath").$oldtName->file_name);
		}
		$torrent = $this->TorrentModel->torrLoad(setting("Torrent.TorrentFilesPath"), $torrName);
		$torrHashes = $torrent->getInfoHashes(TRUE);
		$torrVersion = $torrent->getVersion();
		$data = [
			"numfiles" => $torrent->getFilesCount(),
			"size" => $torrent->getSize(),
			"type" => $torrent->isPrivate() ? 1 : 0,
			"magnet" => $torrent->getMagnet(),
			"file" => setting("Torrent.allowUploadTorrent") === true && $torrPath ? 1 : 0,
			"file_name" => $torrName,
			"version" => $torrVersion,
			"updated_at" => Time::now( setting("App.appTimezone"), )->toDateTimeString(),
			"modded" => ($this->userData->is_superadmin || $this->userData->is_admin || $this->userData->is_moderator) ? 1 : 0,
			"views" => 0,
			"downloaded" => 0,
			"seed" => 0,
			"leech" => 0,
			"completed" => 0,
			"updated_peer" => NULL
		];
		if ($torrVersion == 1)
		{
			$data["infohash_v1"] = $torrHashes[1];
			$data["infohash_v2"] = null;
			$id = $this->TorrentModel->update($tId, $data);
		}
		elseif ($torrVersion == 2)
		{
			$data["infohash_v2"] = $torrHashes[2];
			$data["infohash_v1"] = null;
			$id = $this->TorrentModel->update($tId, $data);
		}
		elseif ($torrVersion == 3)
		{
			$data["infohash_v1"] = $torrHashes[1];
			$data["infohash_v2"] = $torrHashes[2];
			$id = $this->TorrentModel->update($tId, $data);
		}
		unset($data["infohash_v1"], $data["infohash_v2"]);
		$data["inf"] = lang('Torrent.NewFileUpload');
		return $this->_AjaxSend($data); die();
	}

	public function PosterUrlUpload()
	{
	  	if(! $this->userData->logged_in)
  					throw PageNotFoundException::forPageNotFound();

		$validation = service("validation");
        $urlImg = $this->request->getPost('imgurl');
        $path = setting('Torrent.posterUploadPath');
        $image = service('image');
		$options = [
			'user_agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36 OPR/130.0.0.0',
			'timeout' => 5,
		];
        
        $client = service('curlrequest', $options);

        if(! $this->userData->can_upload) {
        	$data = ['error' => lang('Torrent.cannotuploadposter')];
            return $this->_AjaxSend($data); die();
        }

		if (filter_var($urlImg, FILTER_VALIDATE_URL) === FALSE) {
        	$data = ['error' => lang('Torrent.notValidPosterUrl')];
            return $this->_AjaxSend($data); die();
		}
		
		$response = $client->get($urlImg);
       	
       	if ( $response->getStatusCode() !== 200 ) {
        	$data = ['error' => lang('Torrent.notConnect')];
            return $this->_AjaxSend($data); die();
       	}
        
		$imgSize = $response->getHeaderLine('Content-Length');
		$imgType = $response->getHeaderLine('Content-Type');

		$ext = mb_strtolower(pathinfo($urlImg, PATHINFO_EXTENSION));
		$name = mb_strtolower(pathinfo($urlImg, PATHINFO_FILENAME));

		if (mb_strpos($imgType, 'image/') !== 0) {
        	$data = ['error' => lang('Torrent.falseExt')];
            return $this->_AjaxSend($data); die();
		}

		if ( $imgSize > 512000 ) {
        	$data = ['error' => lang('Torrent.imgTooBig')];
            return $this->_AjaxSend($data); die();
		}

		$filedata = $response->getBody();

		$imgfile = $path . $name . '.' . $ext;

		if( $filedata != '' ) {
			$wrResult = file_put_contents($imgfile, $filedata);
			if ( $wrResult === false ) {
				$data = ['error' => lang('Torrent.fileWriteError')];
				return $this->_AjaxSend($data); die();
			}
		}
		$file = new \CodeIgniter\Files\File($imgfile, true);
		$fileMime = $file->getMimeType();

		if (mb_strpos($fileMime, 'image/') !== 0) {
        	$data = ['error' => lang('Torrent.imgInvalidMime')];
            return $this->_AjaxSend($data); die();
		}
		$newName = $file->getRandomName(); 
		$file->move($path, $newName);

		if(setting('Torrent.convertPoster') && $ext !== 'webp') {
			$newExt = 'webp';
			$fname = str_ireplace($ext, $newExt, $newName);
			$result = $image->withFile($path . $newName)->convert(IMAGETYPE_WEBP)->save($path . $fname);
			if($result) {
				unlink($path . $newName);
				$data['error'] = '';
			} else {
				$data['error'] = 'error convert image';
			}	
		}
  		$newpath = str_ireplace(FCPATH, BASE . DIRECTORY_SEPARATOR, $path);
  		$data['filename'] = str_ireplace('\\', '/', $newpath . $fname);
  		$data['img'] = img(['src' => $data['filename'], 'width' => '200px']);
  		return $this->_AjaxSend($data); die();
	}
	
	public function PosterUpload()
	{
	  	if(! $this->userData->logged_in)
  					throw PageNotFoundException::forPageNotFound();

		$validation = service("validation");
        $file = $this->request->getFile('poster'); // 'userfile' is the name attribute of your input file field
        $path = setting('Torrent.posterUploadPath');
        $image = service('image');
        if(! $this->userData->can_upload) {
        	$data = ['error' => lang('Torrent.cannotuploadposter')];
            return $this->_AjaxSend($data); die();
        }
        $rules = $this->TorrentModel->validationFilePoster;
        if (! $this->validateData([], $rules)) {
            $data = ['error' => $this->validator->getError()];
            return $this->_AjaxSend($data); die();
        }
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName(); 
            $file->move($path, $newName);
		}
		if(setting('Torrent.convertPoster')) {
			$ext = pathinfo($newName, PATHINFO_EXTENSION);
			$newExt = 'webp';
			$fname = str_ireplace($ext, $newExt, $newName);
			$result = $image->withFile($path . $newName)->convert(IMAGETYPE_WEBP)->save($path . $fname);
			if($result) {
				unlink($path . $newName);
				$data['error'] = '';
			} else {
				$data['error'] = 'error convert image';
			}	
		}
  		$newpath = str_ireplace(FCPATH, BASE . DIRECTORY_SEPARATOR, $path);
  		$data['filename'] = str_ireplace('\\', '/', $newpath . $fname);
  		$data['img'] = img(['src' => $data['filename'], 'width' => '200px']);
  		return $this->_AjaxSend($data); die();
	}

	public function getUserTorrents()
	{
   	  helper('number');
   	  helper('torrent');
   	  $pager = service('pager');
   	  $perPage = setting('Torrent.profileTorrentsPerPage');
	  		
   		$data = [];

			$userId = (int) $this->request->getPost('uid');

			$direction = (string) $this->request->getPost('direction');
			
			if(! $userId || ! $this->userData->logged_in)
  							throw PageNotFoundException::forPageNotFound();

			$offset = (int) $this->request->getPost('offset');

			if($direction == 'forward') {
					$offset = $offset + $perPage;
			} elseif ($direction == 'backward') {
					$offset = $offset - $perPage;
			}
//			var_dump($offset); die();
			$data['offset'] = ($offset <= 0) ? 0 : $offset;

			$data['torCount'] = $this->TorrentModel->where('owner', $userId)->where('deleted_at', null)->countAllResults();//$this->GlobalModel->getTorrentCountUser($userId);

			$data['torList'] = $this->GlobalModel->getTorrentByUser($userId, $perPage, $offset);
			
   		$data['no_torrents'] = $data['torList'] ? false : true;

			$data['perpage'] = (int) $perPage;
  		$data['pager'] = lang('Site.pager', [$offset + 1, ($offset + $perPage > $data['torCount']) ? $data['torCount'] : $perPage + $offset, $data['torCount']]);

			$data['html'] = $this->themes::render('ajax_templates/usertorrent.php', $data);

  		return $this->_AjaxSend($data); die();
	
	}


	public function getUserComments()
	{
   	  helper('number');
   	  helper('torrent');
   	  helper('smiley');
   	  $perPage = setting('Torrent.profileCommentsPerPage');
	  		
   		$data = [];

			$userId = (int) $this->request->getPost('uid');

			$direction = (string) $this->request->getPost('direction');
			
			if(! $userId || ! $this->userData->logged_in)
  											throw PageNotFoundException::forPageNotFound();

			$offset = (int) $this->request->getPost('offset');

			if($direction == 'forward') {
					$offset = $offset + $perPage;
			} elseif ($direction == 'backward') {
					$offset = $offset - $perPage;
			}
//			var_dump($offset); die();
			$data['offset'] = ($offset <= 0) ? 0 : $offset;

			$data['comCount'] = $this->CommentModel->where('user_id', $userId)->where('deleted_at', null)->countAllResults();

			$data['comList'] = $this->CommentModel->asObject()->where('comments.user_id', $userId)
															->withTorrents()->orderBy('comments.created_at', 'desc')
															->findAll($perPage, $offset);
			
			$data['bbcode'] = new BBCodeParser();

   		$data['no_comments'] = $data['comList'] ? false : true;

			$data['perpage'] = (int) $perPage;
  		$data['pager'] = lang('Site.pager', [$offset + 1, ($offset + $perPage > $data['comCount']) ? $data['comCount'] : $perPage + $offset, $data['comCount']]);

			$data['html'] = $this->themes::render('ajax_templates/usercomment.php', $data);

  		return $this->_AjaxSend($data); die();
	
	}


	public function getUserBookmarks()
	{
   	  helper('number');
   	  helper('torrent');
   	  helper('smiley');
   	  
   	  $perPage = setting('Torrent.profileBookmarksPerPage');
	  		
   		$data = [];

			$userId = (int) $this->request->getPost('uid');

			$direction = (string) $this->request->getPost('direction');
			
			if(! $userId || ! $this->userData->logged_in)
  											throw PageNotFoundException::forPageNotFound();

			$offset = (int) $this->request->getPost('offset');

			if($direction == 'forward') {
					$offset = $offset + $perPage;
			} elseif ($direction == 'backward') {
					$offset = $offset - $perPage;
			}
//			var_dump($offset); die();
			$data['offset'] = ($offset <= 0) ? 0 : $offset;

			$data['bokCount'] = $this->BookmarkModel->where('user_id', $userId)->countAllResults();

			$data['bokList'] = $this->BookmarkModel->asObject()->getUserBookMarks($userId, $perPage, $offset);
			
   		$data['no_bookmarks'] = $data['bokList'] ? false : true;

			$data['perpage'] = (int) $perPage;
  		$data['pager'] = lang('Site.pager', [$offset + 1, ($offset + $perPage > $data['bokCount']) ? $data['bokCount'] : $perPage + $offset, $data['bokCount']]);

			$data['html'] = $this->themes::render('ajax_templates/userbookmark.php', $data);

  		return $this->_AjaxSend($data); die();
	
	}

	function updateCaptcha()
	{
		$this->session->set('captcha', $this->captcha->getCode()); 
		$data['captcha'] = $this->captcha->getImage();
		return $this->_AjaxSend($data); die();	
	}

	function torrPreview()
	{
		$bbcode = new BBCodeParser();
		$poster = (string) $this->request->getPost('poster');
		$text = (string) $this->request->getPost('text');
		$renderedText = $bbcode->parse($text);
		$htmlPoster = '<div class="d-table mb-15 ms-3 p-1 float-end border border-1">';
		$imageProperties = [
		    'src'    => $poster,
			'alt'    => '',
		    'width'  => '200',
		];
		$htmlPoster .= img($imageProperties);
		$htmlPoster .= '</div>';
		$data = [
			'html' => $htmlPoster.$renderedText,
		];
		return $this->_AjaxSend($data); die();	
	}

}
