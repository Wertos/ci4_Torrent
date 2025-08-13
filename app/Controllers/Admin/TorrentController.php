<?php                 

namespace App\Controllers\Admin;

use CodeIgniter\Model\Admin;
use \CodeIgniter\AdminController;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\Message;
use CodeIgniter\Exceptions\PageNotFoundException;


class TorrentController extends \App\Controllers\AdminController
{
    
    function __construct()
    {
        //$this->CatModel = new \App\Models\Admin\CategoryModel();
		}

    public function CatList()
    {
		}

    public function CatAddShow()
    {
		}
    
    public function CatAddAction()
    {
		}

    public function CatEditShow(int $catId)
    {
		}
    
    public function CatEditAction(int $catId)
    {
		}

    protected function getValidationRules(string $rule): array
    {
    }

}