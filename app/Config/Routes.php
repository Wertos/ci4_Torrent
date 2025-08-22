<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('admin',                           'Admin\Home::index');
$routes->get('admin/users',                     'Admin\UserController::UserList');
$routes->get('admin/user/edit/(:num)',          'Admin\UserController::UserEditShow/$1');
$routes->post('admin/user/update/(:num)',       'Admin\UserController::UserEditAction/$1');

$routes->get('admin/categories',                'Admin\CategoryController::CatList');

$routes->get('admin/categories/add',            'Admin\CategoryController::CatAddShow');
$routes->post('admin/categories/add',           'Admin\CategoryController::CatAddAction');

$routes->get('admin/categories/edit/(:num)',    'Admin\CategoryController::CatEditShow/$1');
$routes->post('admin/categories/edit/(:num)',   'Admin\CategoryController::CatEditAction/$1');

$routes->post('admin/categories/delete/(:num)', 'Admin\AjaxController::CatDelete/$1');
                                                
$routes->post('/admin/users/delete/(:num)',     'Admin\AjaxController::UserDelete/$1');
$routes->post('/admin/users/harddelete/(:num)', 'Admin\AjaxController::UserHardDelete/$1');
$routes->post('/admin/users/restore/(:num)',    'Admin\AjaxController::UserRestore/$1');

$routes->post('/admin/users/act/(:num)',        'Admin\AjaxController::UserAct/$1');
$routes->post('/admin/users/ban/(:num)',        'Admin\AjaxController::UserBan/$1');

$routes->get('admin/reports',                   'Admin\ReportController::ReportList');
$routes->get('admin/reports/del/(:num)',        'Admin\ReportController::ReportDelete/$1');
$routes->get('admin/reports/reaction/(:num)',   'Admin\ReportController::ReportReaction/$1');

$routes->get('admin/news/list',                 'Admin\NewsController::NewsList');
$routes->get('admin/news/add',                  'Admin\NewsController::NewsAddView');
$routes->post('admin/news/add',                 'Admin\NewsController::NewsAddAction');
$routes->get('admin/news/edit/(:num)',          'Admin\NewsController::NewsEditView/$1');
$routes->post('admin/news/edit/(:num)',         'Admin\NewsController::NewsEditAction/$1');
$routes->get('admin/news/del/(:num)',           'Admin\NewsController::NewsDelete/$1');
$routes->get('admin/news/harddel/(:num)',       'Admin\NewsController::NewsHardDelete/$1');
$routes->get('admin/news/restore/(:num)',       'Admin\NewsController::NewsRestore/$1');

$routes->get('admin/comments',					'Admin\CommentController::CommentsList');
$routes->get('admin/comments/torrent/(:num)',	'Admin\CommentController::CommentsList/torrent/$1');
$routes->get('admin/comments/news/(:num)',		'Admin\CommentController::CommentsList/news/$1');
$routes->get('admin/comments/user_id/(:num)',	'Admin\CommentController::CommentsList/user_id/$1');
$routes->get('admin/comments/del/(:num)',		'Admin\CommentController::CommentsDelete/$1');


$routes->get('/', 													'Home::index');
$routes->get('rules',            						'PageController::rules');
$routes->get('secure',            					'PageController::secure');
$routes->get('about',            						'PageController::about');

$routes->post('ajax/torstatus/(:num)',			'AjaxController::TorrentStatus/$1');
$routes->post('ajax/tormove/(:num)',				'AjaxController::TorrentMove/$1');
$routes->post('ajax/updatepeers/(:num)',		'AjaxController::TorrentScrape/$1');
$routes->get('ajax/commentedit/(:num)',			'AjaxController::CommentEditView/$1');
$routes->post('ajax/commentedit/(:num)',		'AjaxController::CommentEditAction/$1');
$routes->post('ajax/commentdelete/(:num)',	'AjaxController::CommentDelete/$1');
$routes->post('ajax/ajaxpag',								'AjaxController::AjaxPag');
$routes->post('ajax/addreport',							'AjaxController::AddReport');
$routes->post('ajax/posterupload',					'AjaxController::PosterUpload');
$routes->post('ajax/usertorrents',					'AjaxController::getUserTorrents');
$routes->post('ajax/usercomments',					'AjaxController::getUserComments');
$routes->post('ajax/userbookmarks',					'AjaxController::getUserBookMarks');
$routes->post('/ajax/updatecaptcha',				'AjaxController::updateCaptcha');

$routes->get('torrent/add',            			'TorrentController::TorrentAddShow');
$routes->post('torrent/add',           			'TorrentController::TorrentAddAction');
$routes->get('torrent/edit/(:num)',    			'TorrentController::TorrentEditShow/$1');
$routes->post('torrent/edit/(:num)',   			'TorrentController::TorrentEditAction/$1');
$routes->get('torrent/(:num)',         			'TorrentController::TorrentView/$1');
$routes->get('torrent/(:num)-(:any)',  			'TorrentController::TorrentView/$1');
$routes->get('torrent/dl/(:num)',      			'TorrentController::TorrentSend/$1');
$routes->get('torrent/delete/(:num)',  			'TorrentController::TorrentDelete/$1');

$routes->get('browse',			              	'BrowseController::BrowseView');
$routes->get('browse/search/',			        'BrowseController::SearchView/');
$routes->get('([a-z0-9-]+)/page/(:num)',  	'BrowseController::BrowseView/$1');
$routes->get('([a-z0-9-]+)',              	'BrowseController::BrowseView/$1');

$routes->post('comment/add/(:num)',  				'CommentController::CommentAddAction/$1');
$routes->get('bookmark/(:num)',  				  	'BookmarkController::Bookmark/$1');

$routes->get('news/(:num)-(:any)',  		  	'NewsController::NewsView/$1');

$routes->get('user/profile', 								'Auth\ProfileController::ProfileView');
$routes->get('user/profile/(:num)', 				'Auth\ProfileController::ProfileView/$1');
$routes->get('user/edit', 									'Auth\ProfileController::ProfileEditView');
$routes->post('user/update', 								'Auth\ProfileController::ProfileEditAction');

//service('auth')->routes($routes);
service('auth')->routes($routes, ['except' => ['login', 'register', 'magic-link', 'logout', 'auth-actions']]);
$routes->get('user/register', 							'Auth\RegisterController::RegisterView', ['as' => 'register']);
$routes->post('user/register', 							'Auth\RegisterController::registerAction');
$routes->get('user/login', 									'Auth\LoginController::loginView', ['as' => 'login']);
$routes->post('user/login', 								'\CodeIgniter\Shield\Controllers\LoginController::loginAction');
/*
$routes->get('user/login/magic-link', 'Auth\MagicLinkController::loginView');
$routes->post('user/login/magic-link', 'Auth\MagicLinkController::loginAction');
$routes->get('user/login/verify-magic-link', '\CodeIgniter\Shield\Controllers\MagicLinkController::verify');
*/
$routes->get('user/logout', 								'\CodeIgniter\Shield\Controllers\LoginController::logoutAction', ['as' => 'logout']);
$routes->get('user/auth-action-show', 			'\CodeIgniter\Shield\Controllers\ActionController::show', ['as' => 'auth-action-show']);
$routes->post('user/auth-action-handle', 		'\CodeIgniter\Shield\Controllers\ActionController::handle', ['as' => 'auth-action-handle']);
$routes->post('user/auth-action-verify', 		'\CodeIgniter\Shield\Controllers\ActionController::verify', ['as' => 'auth-action-verify']);

