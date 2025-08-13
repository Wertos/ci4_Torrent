<?php
declare(strict_types=1);

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Exceptions\PageNotFoundException;
use Psr\Log\LoggerInterface;
use Arifrh\Themes\Themes;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class AdminController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = ['avatar','html','uri','menu','title'];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    public $TorrConfig;
    public $setting;
    public $translit;
    public $GlobalModel;
    public $userData;
		public $themes;
    
    private function initUser()
    {

			$this->userData = auth()->user();
//			var_dump($this->userData); die();
			if (auth()->loggedIn())
			{
					$this->userData->logged_in = true;
					
					$this->userData->is_superadmin = ($this->userData->inGroup('superadmin') && $this->userData->logged_in);

					$this->userData->is_admin = ($this->userData->inGroup('admin') && $this->userData->logged_in);
					
					$this->userData->is_moderator = ($this->userData->inGroup('moderator') && $this->userData->logged_in);
					
					$this->userData->is_uploader = ($this->userData->inGroup('uploader') && $this->userData->logged_in);

					$this->userData->is_user = ($this->userData->inGroup('user') && $this->userData->logged_in);
			
					$this->userData->is_banned = ($this->userData->isBanned() && $this->userData->logged_in);
		
			}
			else
			{
				$this->userData = new \stdClass();
				$this->userData->logged_in = false;
				$this->userData->is_superadmin = false;
				$this->userData->is_admin = false;
				$this->userData->is_moderator = false;
				$this->userData->is_uploader = false;
				$this->userData->is_user = false;
				$this->userData->is_banned = false;
				$this->userData->is_guest = true;
				$this->userData->can_upload = false;
				$this->userData->id = 0;
			}

    	return $this->userData;
    }

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
				// Preload any models, libraries, etc, here.
        parent::initController($request, $response, $logger);

				$this->TorrConfig = config('Torrent');//new \Config\Siteseo();
				
				$this->translit = \Transliterator::create('Any-Latin; Latin-ASCII');
				
				$this->userData = $this->initUser();

				if (! ($this->userData->is_superadmin || $this->userData->is_admin)) {
						throw PageNotFoundException::forPageNotFound();		
				}
				
				$this->themes = Themes::init($this->TorrConfig)->setTheme('admin')
								->addCSS(['bootstrap.min.css', 'main.css', 'all.min.css'])
								->addJS(['jquery-3.7.1.min.js', 'bootstrap.bundle.min.js', 'main.js', 'ajax.js'])
								->setVar(['userdata' => $this->userData]);

        // E.g.: $this->session = service('session');

    }
}
