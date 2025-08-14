<?php
namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class PageController extends BaseController
{
		public $siteTitle;

    function __construct()
    {
		}

    public function rules()
    {
    
			$siteTitle = $this->TorrConfig->siteTitle . ' | ' . lang('Site.rules');
			
			$this->breadcrumb->append(lang('Site.rules'));

      $data = [
      		'breadcrumb' => $this->breadcrumb->output(),
					'page_title' => $siteTitle,
			];			

			$this->themes::render('pages/rules', $data);

    }
    

    public function secure()
    {
			$siteTitle = $this->TorrConfig->siteTitle . ' | ' . lang('Site.secure');
			
			$this->breadcrumb->append(lang('Site.secure'));

      $data = [
      		'breadcrumb' => $this->breadcrumb->output(),
					'page_title' => $siteTitle,
			];			

			$this->themes::render('pages/secure', $data);
    }

    public function about()
    {
			$siteTitle = $this->TorrConfig->siteTitle . ' | ' . lang('Site.about');
			
			$this->breadcrumb->append(lang('Site.about'));

      $data = [
      		'breadcrumb' => $this->breadcrumb->output(),
					'page_title' => $siteTitle,
			];			

			$this->themes::render('pages/about', $data);
    }

}