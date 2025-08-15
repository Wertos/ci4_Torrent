<?php                 

namespace App\Controllers\Admin;

use CodeIgniter\Model\Admin;
use \CodeIgniter\AdminController;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\Message;
use CodeIgniter\Exceptions\PageNotFoundException;
use \App\Models\NewsModel;


class NewsController extends \App\Controllers\AdminController
{
    
    function __construct()
    {
        $this->NewsModel = model(NewsModel::class);
		}

		public function NewsAddView()
		{
				helper('form');

				$siteTitle = $this->TorrConfig->siteTitle . ' | ' . lang('News.addnews');
			
				$data = [
						'page_title' => $siteTitle,
				];
			
				$this->themes::render('news_add', $data);
		
		}

    public function NewsAddAction()
    {
			
			$validation = service('validation');

			$rules = $this->NewsModel->validationRules;
			
			$newsData = $this->request->getPost();
			
			$translitString = $this->translit->transliterate($newsData['title']);
 		  $newsData['url'] = url_title($translitString, '-', true);

			$newsData['can_comment'] = ($newsData['can_comment'] == "on") ? 1 : 0;

			if (! $this->validateData($newsData, $rules)) {
         		return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
      }

			$newsData['user_id'] = $this->userData->id;

			$lastNewsId = $this->NewsModel->insert($newsData, true);

			return redirect()->to('admin/news/list')->with('message', lang('News.addsuccess'));
		}

    public function NewsList()
    {

	    helper('torrent');

 			$pager = service('pager');

   		$news = $this->NewsModel->asObject()->withDeleted(true)->orderBy('created_at', 'DESC')->paginate(setting('Torrent.newsPerAdminList'));

			$this->siteTitle = $this->TorrConfig->siteTitle . ' | ' . lang('News.listnews');

   		$data = [
   				'page_title' => $this->siteTitle,
					'newsList' => $news ?? null,
					'pager_links' => $this->NewsModel->pager->links(),
			];

			$this->themes::render('news_list', $data);

		}

    public function NewsDelete(?int $id = null)
    {

    	if(! $id)
    	     throw PageNotFoundException::forPageNotFound();

    	$news = $this->NewsModel->delete($id);

    	return redirect()->to('admin/news/list')->with('message', lang('News.deletesuccess'));
		}

    public function NewsHardDelete(?int $id = null)
    {

    	if(! $id)
    	     throw PageNotFoundException::forPageNotFound();

    	$news = $this->NewsModel->delete($id, true);

    	return redirect()->to('admin/news/list')->with('message', lang('News.harddeletesuccess'));
		}

    public function NewsRestore(?int $id = null)
    {

    	if(! $id)
    	     throw PageNotFoundException::forPageNotFound();
    	
    	$db = \Config\Database::connect();
    	$db->table('news')->set('deleted_at', null)->where('id', $id)->update();

    	return redirect()->to('admin/news/list')->with('message', lang('News.restoresuccess'));
		}

		public function NewsEditView($id)
		{
				helper('form');
	    	if(! $id)
  	  	     throw PageNotFoundException::forPageNotFound();

    		$news = $this->NewsModel->asObject()->find($id);

				$siteTitle = $this->TorrConfig->siteTitle . ' | ' . lang('News.editnews');
			
				$data = [
						'page_title' => $siteTitle,
						'news' => $news,
				];
			
				$this->themes::render('news_edit', $data);
		
		}

    public function NewsEditAction($id)
    {

    	if(! $id)
    	     throw PageNotFoundException::forPageNotFound();
			
			$validation = service('validation');

			$rules = $this->NewsModel->validationRules;
			
			$newsData = $this->request->getPost();
			
			$translitString = $this->translit->transliterate($newsData['title']);
 		  $newsData['url'] = url_title($translitString, '-', true);

			$newsData['can_comment'] = ($newsData['can_comment'] == "on") ? 1 : 0;

			if (! $this->validateData($newsData, $rules)) {
         		return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
      }

			$newsData['user_id'] = $this->userData->id;

			$lastNewsId = $this->NewsModel->update($id, $newsData);

			return redirect()->to('admin/news/list')->with('message', lang('News.editsuccess'));
		}

}