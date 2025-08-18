<?php
declare(strict_types=1);

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Libraries\Breadcrumb\BreadcrumbClass;
use App\Models\GlobalModel;
use App\Models\StatsModel;
use App\Models\NewsModel;
use Psr\Log\LoggerInterface;
use Arifrh\Themes\Themes;
//use Westsworld\TimeAgo;

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
abstract class BaseController extends Controller
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
    protected $helpers = ['torrent', 'avatar','html','uri', 'menu'];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;
    public $TorrConfig;
    public $setting;
    public $translit;
    public $GlobalModel;
    public $StatsModel;
    public $breadcrumb;
    public $userData;
    public $adminlink;
    public $themes;
    public $catHome;
    public string $ogimage;

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
		
		    	$this->userData->can_upload = 
		    								($this->userData->is_uploader
								    		|| $this->userData->is_moderator
    										|| $this->userData->is_admin
    										|| $this->userData->is_superadmin
    										|| $this->userData->can('tor.upload'));

		    	$this->userData->can_comment = 
		    								($this->userData->is_uploader
		    								|| $this->userData->is_user
								    		|| $this->userData->is_moderator
    										|| $this->userData->is_admin
    										|| $this->userData->is_superadmin
    										|| $this->userData->can('comment.add'));

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
				$this->userData->can_comment = false;
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

				$this->setting = service('settings');
				
				$this->TorrConfig = config('Torrent');

				$this->translit = \Transliterator::create('Any-Latin; Latin-ASCII');

				$this->GlobalModel = model(GlobalModel::class);
				$this->StatsModel = model(StatsModel::class);

				// Cache data news on index page
				if (! $this->news = cache('news')) {
				    $this->NewsModel = model(NewsModel::class);
						
						$this->news = $this->NewsModel->asObject()->orderBy('created_at', 'desc')->findAll(setting('Torrent.newsPerIndex'));
						
						cache()->save('news', $this->news);
				}

				// Cache data category on index page
				if (! $this->catHome = cache('CatHome')) {

						$this->catHome = $this->GlobalModel->getCatHome();
						
						cache()->save('CatHome', $this->catHome);
				}

				$this->breadcrumb = new BreadcrumbClass();
				
				$this->breadcrumb->prepend('<i class="bi bi-house m-1"></i>', '/');
    		
    		$this->userData = $this->initUser();

				$this->adminlink = ($this->userData->is_superadmin || $this->userData->is_admin) ? true : false;

				$this->ogimage = base_url('themes/' . setting('Torrent.theme') . '/img/logo.png');

				$this->themes = Themes::init($this->TorrConfig)
								->addCSS(['bootstrap.min.css', 'themes.min.css', 'bootstrap-icons.min.css'])
								->addJS(['jquery-3.7.1.min.js', 'jquery.treeview.js', 'bootstrap.bundle.min.js', 'main.js', 'ajax.js'])
								->setVar(['userdata' => $this->userData])->setVar(['adminlink' => $this->adminlink])
								->setVar(['catList' => $this->catHome])->setVar(['widgets' => $this->setting->get('Torrent.widgets')])
								->setVar(['stats' => $this->StatsModel->displayStats()])->setVar(['ogimage' => $this->ogimage])
								->setVar(['news' => $this->news]);

        // E.g.: $this->session = service('session');

    }

}
