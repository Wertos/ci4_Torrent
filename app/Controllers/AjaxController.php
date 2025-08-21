<?php                 

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
//      				$this->ReportModel = model(ReportModel::class);
      			break;
				case 'userdata':
      				$this->TorrentModel = model(TorrentModel::class);
      				$this->CommentModel = model(CommentModel::class);
      				$this->BookmarkModel = model(BookmarkModel::class);
      				$this->GlobalModel = model(GlobalModel::class);
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
 	    $stdata = getDataTorrStatus($status, 'fs-2');

 			$data['modded'] = $status;
			$data['icon'] = $stdata['icon'];
			$data['class'] = $stdata['class'];
			$data['status_text'] = $stdata['title'];

	  	$st = $this->TorrentModel->update($id, ['modded' => $data['modded']]);

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

			$info[$infoHash_V1]['seeders'] = 0;
			$info[$infoHash_V2]['seeders'] = 0;
			$info[$infoHash_V1]['leechers'] = 0;
			$info[$infoHash_V2]['leechers'] = 0;
			$info[$infoHash_V1]['completed'] = 0;
			$info[$infoHash_V2]['completed'] = 0;

			$iii = $this->scraper->scrape( $hash, $announcer, count($announcer), $maxTimeOnAnnouncer);

			if($iii) $info = $iii;

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

			$updated_peer = Time::now(setting('App.appTimezone'))->toDateTimeString();
			$this->TorrentModel->update($id, ['seed' => $seed, 'leech' => $leech, 'completed' => $completed, 'updated_peer' => $updated_peer]);

			$data['id']	=	$id;
			$data['error'] = '';//$errors;
			$data['seeders'] = $seed;
			$data['completed'] = $completed;
			$data['leechers'] = $leech;
			
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

			if (isset($postData['csrf_test_name']))
						unset($postData['csrf_test_name']);
			
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
  		
  		$data['fid'] = (int) $this->request->getPost('id');
  		$data['location'] = (string) $this->request->getPost('type');
  		$data['comment'] = (string) $this->request->getPost('comment');
  		$data['sender'] = $this->userData->id;
  		$data['ip'] = $this->request->getIPAddress();
			$act = false;
  		
  		$checkReport = $this->ReportModel->where(['fid' => $data['fid'], 'modded_by' => 0, 'location' => $data['location']])->first();

  		if(! $checkReport)
  								$act = $this->ReportModel->insert($data);
  		
  		$data['error'] = ($act) ? false : true;
  		$data['error_text'] = (!$act) ? lang('Report.adderror') : '';
  		$data['success_text'] = ($act) ? lang('Report.addsuccess') : '';
  		$data['action'] = (string) $this->request->getPost('action');
  		
  		return $this->_AjaxSend($data); die();
	}

	public function PosterUpload()
	{
	
	  	if(! $this->userData->logged_in)
  											throw PageNotFoundException::forPageNotFound();
        
        $file = $this->request->getFile('poster'); // 'userfile' is the name attribute of your input file field
        $path = setting('Torrent.posterUploadPath');
        $image = service('image');
        if(! $this->userData->can_upload) {
        		$data = ['error' => lang('Torrent.cannotuploadposter')];
            return $this->_AjaxSend($data); die();
        }
        if (! $this->validateData([], setting('Torrent.validationPosterUploadRule'))) {
            $data = ['error' => $this->validator->getErrors()];
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
					$result = $image
					    ->withFile($path . $newName)
						  ->convert(IMAGETYPE_WEBP)
					    ->save($path . $fname);				
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
}
