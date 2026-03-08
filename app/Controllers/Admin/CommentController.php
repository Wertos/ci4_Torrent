<?php

namespace App\Controllers\Admin;

use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\Message;
use CodeIgniter\Exceptions\PageNotFoundException;
use \CodeIgniter\AdminController;
use \App\Models\Admin\CommentModel;
use App\Libraries\BBCode\BBCodeParser;

class CommentController extends \App\Controllers\AdminController
{
    public $CommentModel;

    function __construct()
    {
		$this->CommentModel = model(CommentModel::class);
	}

    public function CommentsList (?string $material = null, ?int $id = null)
    {
		helper('torrent');
		helper('smiley');
		helper('text');
		helper('url');

		$pager = service('pager');
		$perPage = setting('Torrent.commentPerPage');
		$page = (int) ($this->request->getGet("page") ?? 1);
		$offset = ($page - 1) * $perPage;
		
//		$sort_fields = ['created_at', 'updated_at', 'user_id', 'tid'];
		$location_fields = ['torrent', 'news'];
		$sort = 'created_at';

		$sort = $this->request->getGet('sort');
		$location = $this->request->getGet('location') ?? '';
		$poster = $this->request->getGet('poster') ?? '';
		$today = str_contains($_SERVER['QUERY_STRING'], 'today') ? true : false;

		$poster = $poster <= 0 ? 0 : (int) $poster;
		$location = in_array($location, $location_fields) ? $location : '';

//										$location $owner $today $limit $offset
		$comments = $this->CommentModel->asObject()->getComments($location, $poster, $today, $perPage, $offset)->getPagination($perPage);

		$no_comments = false;

		if (! $comments['comments'])
		{
			$no_comments = true;
		}
	   	
	   	$table = new \CodeIgniter\View\Table();
        $smilies_array = get_clickable_smileys('/uploads/smileys/', 'floatingTextInput');
	   	$col_array = $table->makeColumns($smilies_array, 8);
	
		$siteTitle = $this->TorrConfig->siteTitle . ' | ' . lang('Comment.commmanage');

		$data = [
			'comments'		=> $comments['comments'],
			'bbcode'		=> new BBCodeParser(),
			'paginate'		=> $this->CommentModel->pager,
			'no_comments'	=> $no_comments,
			'sort'			=> $sort,
			'location_fields' => $location_fields,
			'location' => $location,
			'poster' => ($poster) ? auth()->getProvider()->findById($poster)->username : '',
			'page_title' => $siteTitle,
		];
	
		$data['page_title'] = $siteTitle;

		$this->themes::render('comments_list', $data);
	}

    public function CommentsDelete (?int $id = null)
    {
    	if(! $id)
    	     throw PageNotFoundException::forPageNotFound();
   	
    	$this->CommentModel->delete($id);
        return redirect()->back()->with('message', lang('Comment.delete_success'));
    }
}