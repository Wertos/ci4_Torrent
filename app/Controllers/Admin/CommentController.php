<?php

namespace App\Controllers\Admin;

use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\Message;
use CodeIgniter\Exceptions\PageNotFoundException;
use \CodeIgniter\AdminController;
use App\Models\CommentModel;
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
		
		$sort_fields = ['created_at', 'updated_at', 'user_id', 'fid'];
		$material_fields = ['torrent', 'news', 'user_id'];
		$sort = 'created_at';
//		$material = 'torrent';

		$where = 'comments.id = comments.id';
		
		$material = ($material && in_array($material, $material_fields)) ? $material : 'torrent';
		if ($material == 'user_id') {
			$material = 'torrent,news';
		}
		
		switch ($material) {
		    case 'torrent':
		    case 'news':
		        $where = ($id !== null) ? "comments.fid = " . $id : $where;
		        break;
		    case 'user_id':
		        $where = ($id !== null) ? "comments.user_id = " . $id : $where;
		        break;
		}

		$sort = $this->request->getGet('sort');

		$no_comments = false;

		$sort = ($sort && in_array($sort, $sort_fields)) ? $sort : 'created_at';
		
   		$comments = $this->CommentModel
    			->asObject()->whereIn('location', explode(',', $material))
    			->where($where)
       				->withTorrents()
    				->orderBy($sort, 'DESC')
    			->getPagination(setting('Torrent.commentPerPage'));

		if (! $comments['comments'])
				$no_comments = true;

	   	$table = new \CodeIgniter\View\Table();
        $smilies_array = get_clickable_smileys('/uploads/smileys/', 'floatingTextInput');
	   	$col_array = $table->makeColumns($smilies_array, 8);
	
		$data = [
			'comments'		=> $comments['comments'],
			'bbcode'		=> new BBCodeParser(),
			'paginate'		=> $this->CommentModel->pager,
			'no_comments'	=> $no_comments,
			'sort'			=> $sort,
	
		];
	
		$siteTitle = $this->TorrConfig->siteTitle . ' | ' . lang('Comments.list');

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