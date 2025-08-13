<?php                 

namespace App\Controllers\Admin;

use CodeIgniter\Model\Admin;
use \CodeIgniter\AdminController;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\Message;
use CodeIgniter\Exceptions\PageNotFoundException;
use \App\Models\Admin\CategoryModel;


class CategoryController extends \App\Controllers\AdminController
{
    public $CatModel;
    public $CatData;
    public $siteTitle;

    function __construct()
    {
        $this->CatModel = model(CategoryModel::class);
		}

    public function CatList()
    {
     		$this->CatData = $this->CatModel->getCatList();

				$this->siteTitle = $this->TorrConfig->siteTitle . ' | ' . lang('Category.Categories');
			
				$data = [
						'page_title' => $this->siteTitle,
						'catList'	=> $this->CatData,
				];
			
				$this->themes::render('cat_list', $data);

		}

    public function CatAddShow()
    {
				helper('form');

				$this->siteTitle = $this->TorrConfig->siteTitle . ' | ' . lang('Category.Create');
			
				$data = [
						'page_title' => $this->siteTitle,
				];
			
				$this->themes::render('cat_add', $data);
		}
    
    public function CatAddAction()
    {
			
			$validation = service('validation');

			$rules = $this->CatModel->validationRules;
			
			$this->catData = $this->request->getPost();
			
			if (isset($this->catData['csrf_test_name']))
						unset($this->catData['csrf_test_name']);
			
			if ($this->catData['url'] == '')
			{
					 $translitString = $this->translit->transliterate($this->catData['name']);
					 $this->catData['url'] = url_title($translitString, '-', true);
			}

			if (! $this->validateData($this->catData, $rules)) {
         		return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
      }

			$lastCatId = $this->CatModel->CatInsert($this->catData);

			return redirect()->to('admin/categories')->with('message', lang('Category.AddSuccess'));
		}

    public function CatEditShow(int $catId)
    {
				helper('form');

     		$this->Cat = $this->CatModel->getCatById($catId);

     		if(! $this->Cat )
     		     return redirect()->back()->withInput()->with('errors', $lang('Category.NotFound'));

				$this->siteTitle = $this->TorrConfig->siteTitle . ' | ' . lang('Category.Edit');
			
				$data = [
						'page_title' => $this->siteTitle,
						'cat'	=> $this->Cat,
				];
			
				$this->themes::render('cat_edit', $data);

		}
    
    public function CatEditAction(int $catId)
    {

			$validation = service('validation');

			$rules = $this->getValidationRules('categories');
			
			$message = [
						'type' => 'error',
						'text' => lang('Category.EditFault'),
			];

			$this->oldCat = $this->CatModel->getCatById($catId);
			$this->catData = $this->request->getPost();
			
			if (isset($this->catData['csrf_test_name']))
						unset($this->catData['csrf_test_name']);

  		$this->newCatData = [];
      foreach ($this->catData as $key => $value)
      {
 				if (!$value || $value == $this->oldCat->{$key}) 
 				{
 						unset($rules[$key]);
 						continue;
 				}
 					
 				$this->newCatData[$key] = $value;
	    }
                 
      if($this->newCatData)
      {

				if (! $this->validateData($this->catData, $rules)) {
  	       		return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    	  }
			
				$this->CatModel->CatUpdate($catId, $this->newCatData);
				
				$message = [
						'type' => 'message',
						'text' => lang('Category.EditSuccess'),
				];

			}

		  return redirect()->back()->withInput()->with($message['type'], $message['text']);
			
		}

}