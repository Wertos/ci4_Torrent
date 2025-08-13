<?php

namespace App\Controllers\Auth;

use \CodeIgniter\BaseController;
use CodeIgniter\Shield\Controllers\LoginController as ShieldLogin;
use CodeIgniter\HTTP\RedirectResponse;
use Arifrh\Themes\Themes;

class LoginController extends ShieldLogin
{
    public function loginView()
    {
        if (auth()->loggedIn()) {
            return redirect()->to(config('Auth')->loginRedirect());
        }

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        // If an action has been defined, start it up.
        if ($authenticator->hasAction()) {
            return redirect()->route('auth-action-show');
        }
				$data['page_title'] = $this->TorrConfig->siteTitle . ' | ' . lang('Site.SiteHome');
				$this->breadcrumb->append(lang('Login.login'));
  	    $data['breadcrumb'] = $this->breadcrumb->output();

				Themes::render('login_view', $data);
    }
}