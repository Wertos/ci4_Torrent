<?php                 

namespace App\Controllers\Admin;

use CodeIgniter\Model\Admin;
use \CodeIgniter\AdminController;
use \App\Models\Admin\AdminModel;
use \App\Models\GlobalModel;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\Message;
use CodeIgniter\Exceptions\PageNotFoundException;


class TorrentController extends \App\Controllers\AdminController
{

	public $TorrModel;
	public $CatModel;
	public $siteTitle;

    function __construct()
    {
        $this->CatModel = new \App\Models\Admin\CategoryModel();
		$this->TorrModel = new \App\Models\Admin\TorrentModel();
	}

	public function dellTorr(int $id)
	{
		$message = [];
        $data = [
			'delfile' => false,
			'deltor' => false,
			'delcom' => false,
			'delrep' => false,
			'delbok' => false,
		];

		$data = $this->TorrModel->delTorrent($id);

		if($data['deltor'] === true) {
			$message[] = '<div class="alert alert-primary d-flex align-items-center"><i class="fa-solid fa-circle-check"></i>&nbsp;&nbsp;'.lang('Torrent.tordelete.success').'</div>';
		} else {
			$message[] = '<div class="alert alert-danger d-flex align-items-center"><i class="fa-solid fa-circle-xmark"></i>&nbsp;&nbsp;'.lang('Torrent.tordelete.error').'</div>';
		}
		if($data['delfile'] === true) {
			$message[] = '<div class="alert alert-primary d-flex align-items-center"><i class="fa-solid fa-circle-check"></i>&nbsp;&nbsp;'.lang('Torrent.filedelete.success').'</div>';
		} else {
			$message[] = '<div class="alert alert-danger d-flex align-items-center"><i class="fa-solid fa-circle-xmark"></i>&nbsp;&nbsp;'.lang('Torrent.filedelete.error').'</div>';
		}
		if($data['delcom'] === true) {
			$message[] = '<div class="alert alert-primary d-flex align-items-center"><i class="fa-solid fa-circle-check"></i>&nbsp;&nbsp;'.lang('Torrent.comdelete.success').'</div>';
		} else {
			$message[] = '<div class="alert alert-danger d-flex align-items-center"><i class="fa-solid fa-circle-xmark"></i>&nbsp;&nbsp;'.lang('Torrent.comdelete.error').'</div>';
		}
		if($data['delrep'] === true) {
			$message[] = '<div class="alert alert-primary d-flex align-items-center"><i class="fa-solid fa-circle-check"></i>&nbsp;&nbsp;'.lang('Torrent.repdelete.success').'</div>';
		} else {
			$message[] = '<div class="alert alert-danger d-flex align-items-center"><i class="fa-solid fa-circle-xmark"></i>&nbsp;&nbsp;'.lang('Torrent.repdelete.error').'</div>';
		}
		if($data['delbok'] === true) {
			$message[] = '<div class="alert alert-primary d-flex align-items-center"><i class="fa-solid fa-circle-check"></i>&nbsp;&nbsp;'.lang('Torrent.bokdelete.success').'</div>';
		} else {
			$message[] = '<div class="alert alert-danger d-flex align-items-center"><i class="fa-solid fa-circle-xmark"></i>&nbsp;&nbsp;'.lang('Torrent.bokdelete.error').'</div>';
		}
//		var_dump($message); die();	
		return redirect()->back()->with('messages', $message);

	}
	public function TorrList(?int $catId = null, ?int $statusId = null, ?int $owner = null,)
	{

		helper('torrent');
		helper('text');
		helper('url');

		$cats = $this->CatModel->where('enabled', 1)->where('deleted_at', null)->findAll();

		$pager = service("pager");
		$torrents = null;
		$no_torrents = false;
		$page = (int) ($this->request->getGet("page") ?? 1);
		$perPage = setting("Torrent.torrentsPerPage");
		$offset = ($page - 1) * $perPage;

		$catId = $this->request->getGet('catid') ?? '';
		$statusId = $this->request->getGet('statusid') ?? null;
		$owner = $this->request->getGet('owner') ?? '';
		$today = str_contains($_SERVER['QUERY_STRING'], 'today') ? true : false;

		$catId = $catId <= 0 ? 0 : (int) $catId;
		$owner = $owner <= 0 ? 0 : (int) $owner;

		$torrents = $this->TorrModel->asObject()->getTorrents($catId, $owner, $today, $statusId, $perPage, $offset)->getPagination($perPage);

		if(!$torrents['torrents'])
		{
			$no_torrents = true;
		}

		$this->siteTitle = $this->TorrConfig->siteTitle . ' | ' . lang('Torrent.torrents');

		$data = [
			'torrents' => $torrents['torrents'],
			'paginate' => $this->TorrModel->pager,
			'no_torrents' => $no_torrents,
			'page_title' => $this->siteTitle,
			'category' => $cats,
			'statused' => getStatus(),
			'catId' => $catId ? $catId : '-',
			'statusId' => $statusId !== null ? $statusId : '-',
		];

		$this->themes::render('torrents_list', $data);

	}
}