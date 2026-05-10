<?php
declare(strict_types=1);

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
use App\Models\RatingModel;

class TorrentController extends BaseController
{
	public $GlobalModel;
	public $TorrentModel;
	public $CommentModel;
	public $BookmarkModel;
	public $ReportModel;
	public $RatingModel;
	public $siteTitle;

	function __construct()
	{
		$this->GlobalModel = model(GlobalModel::class);
		$this->TorrentModel = model(TorrentModel::class);
		$this->CommentModel = model(CommentModel::class);
		$this->BookmarkModel = model(BookmarkModel::class);
		$this->ReportModel = model(ReportModel::class);
		$this->RatingModel = model(RatingModel::class);
	}
	
	public function TorrentView(?int $tId = null)
	{
		helper('tree');
		helper('number');
		helper('form');
		helper('torrent');
		helper('smiley');
		helper('kinopoisk');
		
		//var_dump(get_rating(1178445)->imdb_votes);

		$torrentData = $this->TorrentModel->getDetail($tId);
		if (!$torrentData)
		{
			throw PageNotFoundException::forPageNotFound();
		}
		if ($torrentData->deleted_at != null)
		{
			return redirect()->back()->with('error', lang('Torrent.deleted'));
		}

		if ( setting('Torrent.kpRating') ) {

			$torrentData->kp_rating = NULL;
			$torrentData->kp_votes = NULL;
			$torrentData->imdb_rating = NULL;
			$torrentData->imdb_votes = NULL;
			$torrentData->kp_id = NULL;
			$torrentData->tMyRating = NULL;

			if ( preg_match('~\[rating=(\d+)\]~siu', $torrentData->descr, $match) && $this->userData->logged_in)
			{
				$torrentData->descr = preg_replace('~(\s\s+)?\[rating=(\d+)\](\s\s+)?~siu', '', $torrentData->descr);
				$filmId = (int) $match[1];
				$torrentData->kp_id = $filmId;
				$this->TorrentModel->setRating($filmId, $tId);
				$filmData = json_decode($torrentData->rating, FALSE);
				if ( $filmData && $filmData->error === FALSE ) {
					$torrentData->kp_rating = colorize_rating($filmData->kp_rating);
					$torrentData->kp_votes = $filmData->kp_votes;
					$torrentData->imdb_rating = $filmData->imdb_rating;
					$torrentData->imdb_votes = $filmData->imdb_votes;
				}
				$torrentData->tMyRating = $this->RatingModel->checkTorrent($tId, $this->userData->id);
				if ( $torrentData->tMyRating === true ) {
					$ratArry = $this->RatingModel->getRating($tId, $this->userData->id);
					$torrentData->ratHtml = $this->RatingModel->getHtmlRating($ratArry, (int) $torrentData->id);
				} else {
					$ratArry = $this->RatingModel->getRating($tId, $this->userData->id);
					$torrentData->ratHtml = $this->themes->render('ajax_templates/setrating.php', ['tid' => $torrentData->id, 'clsRating' => my_col_bg($ratArry['avgRating']), 'avgRating' => $ratArry['avgRating']], TRUE);
				}
			}
		}

		$owner = ($this->userData->id == $torrentData->owner);
		$can_edit = ($owner && $this->userData->can('tor.ownededit')) || ($owner && $this->userData->is_uploader) || $this->isMod || $this->isAdmin || $this->isSuperAdmin;
		$this->TorrentModel->updateViews($tId);
		if ($this->isMod)
		{
			$cats = $this->GlobalModel->getCats();
		}
		if ($torrentData === null)
		{
			return redirect()->back()->with('error', lang('Torrent.notfound'));
		}
		$torrentFile = $this->TorrentModel->torrLoad( setting('Torrent.TorrentFilesPath'), $torrentData->file_name, );
		$data = [];
		$pager = service('pager');
		if (setting('Torrent.commenEnable'))
		{
			$comments = $this->CommentModel->asObject()->where('tid', $tId)->where('location', 'torrent')->orderBy('created_at', 'DESC')->getPagination(setting('Torrent.commentPerPage'));
		}
		$status = getDataTorrStatus((int)$torrentData->modded, 'fs-1');
		$table = new \CodeIgniter\View\Table();
		$smilies_array = get_clickable_smileys( '/uploads/smileys/', 'floatingTextInput', );
		$col_array = $table->makeColumns($smilies_array, 8);
		if (!is_null($torrentFile))
		{
			$annList = [];
			$ann = $this->TorrentModel->getAnnounceList()->toArray();
			array_walk_recursive($ann, function ($item) use (&$annList)
			{
				$annList[] = $item;
			}
			);
			$annList[] = $this->TorrentModel->getAnnounce();
			$annList = array_unique($annList);
			$filestree = setting('Torrent.allowFileList') === true ? $torrentFile->toTree() : null;
		}
		else
		{
			$annList = [];
			$filestree = null;
		}
		$data = [
			'hash_v1' => $this->TorrentModel->hashToString( $torrentData->infohash_v1 ),
			'hash_v2' => $this->TorrentModel->hashToString( $torrentData->infohash_v2 ),
			'torrComment' => $this->TorrentModel->getComment(),
			'torrCreatedBy' => $this->TorrentModel->getCreatedBy(),
			'ogimage' => $torrentData->poster,
			'bbcode' => new BBCodeParser(),
			'icon' => $status['icon'],
			'title' => $status['title'],
			'class' => $status['class'],
			'details' => $torrentData,
			'poster' => img($torrentData->poster),
			'can_delete' => $this->isMod || $can_edit,
			'can_edit' => $can_edit,
			'moderate' => $this->isMod,
			'download' => setting('Torrent.allowUploadTorrent') === true && in_array((int) $torrentData->modded, setting('Torrent.statusAllowDownload')) && $torrentFile,
			'allowmagnet' => $torrentData->modded === '1' || $torrentData->modded === '0',
			'allowreport' => setting('Torrent.allowreport') === true && $this->userData->logged_in,
			'allowFileList' => setting('Torrent.allowFileList') === true,
			'filestree' => $filestree, 'cats' => $this->isMod ? $cats : null,
			'comments' => $comments['comments'] ?? null,
			'paginate' => $this->CommentModel->pager,
			'canCommentEdit' => $this->userData->logged_in && $this->userData->can('comment.ownededit'),
			'canCommentDelete' => $this->userData->logged_in && $this->userData->can('comment.owneddelete'),
			'smilies' => $table->generate($col_array),
			'announceList' => count($annList) > 0 ? $annList : ['No tracker'],
			'bookmark' => $this->BookmarkModel->where(['user_id' => $this->userData->id,'tid' => $torrentData->id])->first(),
			'location' => 'torrent'
		];
		$siteTitle = $this->TorrConfig->siteTitle . ' | ' . $torrentData->name;
		$this->breadcrumb->append(lang('Browse.allview'), 'browse');
		$this->breadcrumb->append( $torrentData->catname, $torrentData->caturl, );
		$this->breadcrumb->append($torrentData->name);
		$data['breadcrumb'] = $this->breadcrumb->output();
		$data['page_title'] = $siteTitle;
		$this->themes::render('torrent_view', $data);
	}

	public function TorrentAddShow()
	{
		helper('torrent');
		helper('smiley');
		helper('form');
		if (!$this->userData->can_upload)
		{
			return redirect()->to('/')->with('error', lang('Torrent.uploadforbidden'));
		}
		$this->catList = $this->GlobalModel->getCats();
		$siteTitle = $this->TorrConfig->siteTitle . ' | ' . lang('Torrent.addTorrent');
		$this->breadcrumb->append(lang('Torrent.addTorrent'));
		$table = new \CodeIgniter\View\Table();
		$smilies_array = get_clickable_smileys( '/uploads/smileys/', 'floatingDescInput', );
		$col_array = $table->makeColumns($smilies_array, 8);
		$data = [
			'breadcrumb' => $this->breadcrumb->output(),
			'page_title' => $siteTitle,
			'cats' => $this->catList,
			'posterRequired' => setting('Torrent.posterRequired') ? ' required ' : '',
			'smilies' => $table->generate($col_array),
			'addview' => true,
		];
		$this->themes::render('torrent_add', $data);
	}

	public function TorrentEditShow(int $tId)
	{
		helper('form');
		helper('torrent');
		helper('smiley');
		$torrentData = $this->TorrentModel->getDetail($tId);
		if (!$torrentData)
		{
			throw PageNotFoundException::forPageNotFound();
		}
		$owner = $this->userData->id == $torrentData->owner;
		$can_edit = ($owner && $this->userData->can('tor.ownededit')) || ($owner && $this->userData->is_uploader) || $this->isMod || $this->isAdmin || $this->isSuperAdmin;
		if (!$can_edit)
		{
			return redirect()->to('/')->with('error', lang('Torrent.notowner'));
		}
		$catList = $this->GlobalModel->getCatHome();
		if ($torrentData === null)
		{
			return redirect()->back()->with('error', lang('Torrent.notfound'));
		}
		$siteTitle = $this->TorrConfig->siteTitle . ' | ' . lang('Torrent.editTorrent');
		$this->breadcrumb->append(lang('Torrent.editTorrent'));
		$table = new \CodeIgniter\View\Table();
		$smilies_array = get_clickable_smileys( '/uploads/smileys/', 'floatingDescInput', );
		$col_array = $table->makeColumns($smilies_array, 8);
		$data = [
			'catlist' => $catList,
			'details' => $torrentData,
			'breadcrumb' => $this->breadcrumb->output(),
			'page_title' => $siteTitle,
			'posterRequired' => setting('Torrent.posterRequired') ? ' required ' : '',
			'smilies' => $table->generate($col_array),
			'addview' => true,
		];
		$this->themes::render('torrent_edit', $data);
	}

	public function TorrentEditAction(int $tId)
	{
		if (!$this->userData->can_upload)
		{
			return redirect()->to('/')->with('error', lang('Torrent.editforbidden'));
		}
		$torrentData = $this->TorrentModel->getDetail($tId);
		$owner = $this->userData->id == $torrentData->owner;
		$can_edit = ($owner && $this->userData->can('tor.ownededit')) || ($owner && $this->userData->is_uploader) || $this->isMod || $this->isAdmin || $this->isSuperAdmin;
		if (!$can_edit)
		{
			return redirect() ->to('/') ->with('error', lang('Torrent.editforbidden'));
		}
		$validation = service('validation');
		$rules = $this->TorrentModel->validationRules;
		unset($rules['torrentfile']);
		$postData = $this->request->getPost();
		$postData['can_comment'] = isset($postData['can_comment']) ? 1 : 0;
		if (!setting('Torrent.posterRequired'))
		{
			unset($rules['poster']);
		}
		if (!$this->validateData($postData, $rules))
		{
			return redirect() ->back() ->withInput() ->with('errors', $this->validator->getErrors());
		}
		$postData['url'] = url_title( $this->translit->transliterate($postData['name']), '-', true, );
		$this->TorrentModel->update($tId, $postData, true);
		return redirect() ->to('torrent/' . $tId) ->with('message', lang('Torrent.editsuccess'));
	}

	public function TorrentAddAction()
	{
		if (!$this->userData->can_upload)
		{
			return redirect()->to('/')->with('error', lang('Torrent.uploadforbidden'));
		}

		$tId = null;
		$validation = service('validation');
		$rules = $this->TorrentModel->validationRules;
		$postData = $this->request->getPost();
		$postData['can_comment'] = isset($postData['can_comment']) ? 1 : 0;
		if (!setting('Torrent.posterRequired'))
		{
			unset($rules['poster']);
		}
		if (!$this->validateData($postData, $rules))
		{
			return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
		}
		$torrFile = $this->request->getFile('torrentfile');
		$torrName = $torrFile->getRandomName();
		$torrPath = $torrFile->store(setting('Torrent.TorrentUploadPath'), $torrName);
		$this->torrent = $this->TorrentModel->torrLoad( setting('Torrent.TorrentFilesPath'), $torrName, );
		$torrHashes = $this->torrent->getInfoHashes();
		$torrVersion = $this->torrent->getVersion();
		
		$data = [
			'owner' => $this->userData->id,
			'numfiles' => $this->torrent->getFilesCount(),
			'size' => $this->torrent->getSize(),
			'type' => $this->torrent->isPrivate() ? 1 : 0,
			'name' => $postData['name'],
			'descr' => $postData['descr'],
			'category' => (int) $postData['category'],
			'poster' => $postData['poster'],
			'magnet' => $this->torrent->getMagnet(),
			'url' => url_title( $this->translit->transliterate($postData['name']), '-', true ),
			'file' => setting('Torrent.allowUploadTorrent') === true && $torrPath ? 1 : 0,
			'can_comment' => $postData['can_comment'],
			'modded' => $this->isMod ? 1 : 0,
			'file_name' => $torrName,
			'version' => $torrVersion,
			'created_at' => Time::now( setting('App.appTimezone') )->toDateTimeString(),
			'updated_at' => Time::now( setting('App.appTimezone'), )->toDateTimeString()
		];
		$arr = $this->TorrentModel->torrCheck( $torrVersion, isset($torrHashes[1]) ? $torrHashes[1] : null, isset($torrHashes[2]) ? $torrHashes[2] : null);
		if ($torrVersion == 1)
		{
			$data['infohash_v1'] = $arr['hash1'];
			$data['infohash_v2'] = null;
			if (!isset($arr['tid']))
			{
				$id = $this->TorrentModel->insert($data);
				return redirect()->to('torrent/' . $id)->with('message', lang('Torrent.uploadsuccess_v1'));
			}
		}
		elseif ($torrVersion == 2)
		{
			$data['infohash_v2'] = $arr['hash2'];
			$data['infohash_v1'] = null;
			if (!isset($arr['tid']))
			{
				$id = $this->TorrentModel->insert($data);
				return redirect()->to('torrent/' . $id)->with('message', lang('Torrent.uploadsuccess_v2'));
			}
		}
		elseif ($torrVersion == 3)
		{
			$data['infohash_v1'] = $arr['hash1'];
			$data['infohash_v2'] = $arr['hash2'];
			if (!isset($arr['tid']))
			{
				$id = $this->TorrentModel->insert($data);
				return redirect()->to('torrent/' . $id)->with( 'message', lang('Torrent.uploadsuccess_v3'));
			}
		}
		return redirect()->back()->with('error', lang('Torrent.uploaderror', ['id' => "{".$arr['tid']['id']."}"]));
	}

	public function TorrentSend($tId)
	{
		$torrentData = $this->TorrentModel->getFileName((int)$tId);
		if ($torrentData === null)
		{
			return redirect() ->back() ->with('error', lang('Torrent.notfound'));
		}
		$torrentFile = setting('Torrent.TorrentFilesPath') . $torrentData->file_name;
		if (!file_exists($torrentFile))
		{
			return redirect() ->back() ->with('error', lang('Torrent.notfound'));
		}
		$torrentFile = $this->TorrentModel->torrLoad( setting('Torrent.TorrentFilesPath'), $torrentData->file_name, );
		$this->TorrentModel->updateDownloaded($tId);
		$torrString = $torrentFile->toString();
		return $this->response->download($tId . '.torrent', $torrString);
	}

	public function TorrentDelete(int $tId)
	{
		$torrentData = $this->TorrentModel->getFileName($tId);
		$storeFiles = $this->TorrentModel->useSoftDeletes;
		if ($torrentData === null)
		{
			return redirect() ->back() ->with('error', lang('Torrent.notfound'));
		}
		$owner = $this->userData->id == $torrentData->owner;
		$can_delete = ($owner && $this->userData->can('tor.ownededit')) || ($owner && $this->userData->is_uploader) || $this->isMod || $this->isAdmin || $this->isSuperAdmin;
		if (!$can_delete)
		{
			return redirect() ->to('/') ->with('error', lang('Torrent.deleteforbidden'));
		}
		$torrentFile = setting('Torrent.TorrentFilesPath') . $torrentData->file_name;
		$this->CommentModel->where('tid', $tId)->delete();
		$this->ReportModel->where('tid', $tId)->delete();
		$this->BookmarkModel->where('tid', $tId)->delete();
		$this->TorrentModel->delete($tId);
		if (file_exists($torrentFile) && !$storeFiles)
		{
			unlink($torrentFile);
		}
		return redirect() ->to('/') ->with('message', lang('Torrent.deletesucess'));
	}
}