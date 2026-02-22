<?php
declare(strict_types=1);

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\NewsModel;

class NewsController extends BaseController
{
      public $NewsModel;

      function __construct()
      {
            $this->NewsModel = model(NewsModel::class);
      }


      public function NewsList()
      {
			$pager = service("pager");

			$no_news = false;

            $page = (int) ($this->request->getGet("page") ?? 1);
            $perPage = setting("Torrent.torrentsPerPage");
            $offset = ($page - 1) * $perPage;

            $newsCount = $this->NewsModel->newsCount();

            $this->NewsModel->join('users', 'users.id = news.user_id', 'left');
			$newsList = $this->NewsModel->asObject()->findAll($perPage, $offset);

			if (!$newsList) $no_news = true;

            $siteTitle = $this->TorrConfig->siteTitle;
            $this->breadcrumb->append(lang("News.news"), "");

            $pager_links = $pager->makeLinks($page, $perPage, $newsCount);

			$data = [
      			'breadcrumb' => $this->breadcrumb->output(),
				'page_title' => $siteTitle,
				'no_news'	=> $no_news,
				'newsList'	=> $newsList,
				'pager_links'	=> $pager_links,
			];			

			$this->themes::render('news_list', $data);

	  }


      public function NewsView(?int $id = null)
      {
            if (!$id) {
                  throw PageNotFoundException::forPageNotFound();
            }

            $news = $this->NewsModel->asObject()->find($id);

            $siteTitle = $this->TorrConfig->siteTitle . " | " . $news->title;
            $this->breadcrumb->append(lang("News.news"), "news");
            $this->breadcrumb->append($news->title);

            $data = [
                  "page_title" => $siteTitle,
                  "newsData" => $news,
                  "breadcrumb" => $this->breadcrumb->output(),
            ];

            $this->themes::render("news_view", $data);
      }
}
