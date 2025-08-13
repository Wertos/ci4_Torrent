<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\BookmarkModel;
use App\Models\TorrentModel;

class BookmarkController extends BaseController
{

    function __construct()
    {
        $this->BookmarkModel = model(BookmarkModel::class);
        $this->TorrentModel = model(TorrentModel::class);
		}

    public function BookMark(int $id)
    {
				if (! $id || ! $this->userData->logged_in)
								throw PageNotFoundException::forPageNotFound();

				if (! $this->CheckTorrent($id))
								return redirect()->back()->with('error', lang('Bookmark.tnotfound'));

			  $user_id = $this->userData->id;
				$message = '';
				$type = 'error';					
				$bookmark = $this->BookmarkModel->where(['user_id' => $user_id, 't_id' => $id])->first();
				if ($bookmark === null) {
						$result = $this->BookmarkModel->insert(['user_id' => $user_id, 't_id' => $id]);
						if ($result) {
									$type = 'message';
									$message = lang('Bookmark.addsuccess');
						} else {
									$type = 'error';
									$message = lang('Bookmark.adderror');
						}
				} else {
						$result = $this->BookmarkModel->where(['user_id' => $user_id, 't_id' => $id])->delete();
						if ($result) {
									$type = 'message';
									$message = lang('Bookmark.deletesuccess');
						} else {
									$type = 'error';
									$message = lang('Bookmark.deleteerror');
						}
				}
		
		    return redirect()->back()->with($type, $message);
		}

		private function CheckTorrent (int $id) : bool
		{
				$result = $this->TorrentModel->withDeleted()->find($id);
				
				if ($result) {
						return true;
				} else {
						return false;
				}
				
				return false;
		}
}