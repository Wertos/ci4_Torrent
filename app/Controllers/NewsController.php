<?php
declare(strict_types=1);

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\NewsModel;
use App\Models\CommentModel;
use App\Libraries\BBCode\BBCodeParser;

class NewsController extends BaseController
{
      public $NewsModel;
      public $CommentModel;

      function __construct()
      {
            $this->NewsModel = model(NewsModel::class);
            $this->CommentModel = model(CommentModel::class);
      }


      public function NewsList()
      {
			$pager = service("pager");

			$no_news = false;

            $newsList = NULL;

            $page = (int) ($this->request->getGet("page") ?? 1);
            $perPage = setting("Torrent.torrentsPerPage");
            $offset = ($page - 1) * $perPage;

            $newsCount = $this->NewsModel->newsCount();

		    if (!($newsList = cache("newsList"))) {
				$newsList = $this->NewsModel->getNews($perPage, $offset);
				cache()->save("newsList", $newsList);
			}

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
                'breadcrumb' => $this->breadcrumb->output(),

			];			

			$this->themes::render('news_list', $data);

	  }


      public function NewsView(?int $id = null)
      {
            helper("number");
            helper("form");
            helper("torrent");
            helper("smiley");

            if (!$id) {
                  throw PageNotFoundException::forPageNotFound();
            }

            $news = $this->NewsModel->asObject()->find($id);

            $siteTitle = $this->TorrConfig->siteTitle . " | " . $news->title;
            $this->breadcrumb->append(lang("News.news"), "news");
            $this->breadcrumb->append($news->title);

            if (setting("Torrent.commenEnable")) {
                  $comments = $this->CommentModel
                        ->asObject()
                        ->where("tid", $id)
						->where("location", "news")
                        ->orderBy("created_at", "DESC")
                        ->getPagination(setting("Torrent.commentPerPage"));
            }

            $table = new \CodeIgniter\View\Table();

            $smilies_array = get_clickable_smileys(
                  "/uploads/smileys/",
                  "floatingTextInput",
            );
            $col_array = $table->makeColumns($smilies_array, 8);

            $data = [
                  "page_title" => $siteTitle,
                  "details" => $news,
                  "breadcrumb" => $this->breadcrumb->output(),
				  "location" => "news",
                  "smilies" => $table->generate($col_array),
                  "comments" => $comments["comments"] ?? null,
                  "paginate" => $this->CommentModel->pager,
                  "canCommentEdit" =>
                        $this->userData->logged_in &&
                        $this->userData->can("comment.ownededit"),
                  "canCommentDelete" =>
                        $this->userData->logged_in &&
                        $this->userData->can("comment.owneddelete"),
                  "bbcode" => new BBCodeParser(),

            ];
            $this->themes::render("news_view", $data);
      }
}
