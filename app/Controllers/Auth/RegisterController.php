<?php

namespace App\Controllers\Auth;

use \CodeIgniter\BaseController;
use CodeIgniter\Shield\Controllers\RegisterController as ShieldRegister;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Events\Events;
use Arifrh\Themes\Themes;
use \App\Libraries\Captcha\Image;

class RegisterController extends ShieldRegister
{

    public $captcha;

    function __construct()
    {
        $this->captcha = new Image();
				$this->captcha->imageWidth = 250;
				$this->captcha->imageHeight = 100;
		}
    
    /**
     * Displays the registration form.
     *
     * @return RedirectResponse|string
     */
    public function registerView()
    {
        if (auth()->loggedIn()) {
            return redirect()->to(config('Auth')->registerRedirect());
        }
        
        $session = service('session', config('Session'));

        // Check if registration is allowed
        if (! setting('Auth.allowRegistration')) {
            return redirect()->back()->withInput()
                ->with('error', lang('Auth.registerDisabled'));
        }

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        // If an action has been defined, start it up.
        if ($authenticator->hasAction()) {
            return redirect()->route('auth-action-show');
        }

        $session->set('captcha', $this->captcha->getCode()); 

				$this->breadcrumb->append(lang('Login.register'));
  	    
  	    $data['breadcrumb'] = $this->breadcrumb->output();
  	    $data['page_title'] = $this->TorrConfig->siteTitle . ' | ' . lang('Login.register');
  	    $data['captcha'] = $this->captcha->getImage();

        $this->themes::render('register_view', $data);
    }

    /**
     * Attempts to register the user.
     */
    public function registerAction(): RedirectResponse
    {
        if (auth()->loggedIn()) {
            return redirect()->to(config('Auth')->registerRedirect());
        }

        // Check if registration is allowed
        if (! setting('Auth.allowRegistration')) {
            return redirect()->back()->withInput()
                ->with('error', lang('Auth.registerDisabled'));
        }

        $session = service('session', config('Session'));

				$sessCaptcha = $session->has('captcha') ? mb_strtolower($session->get('captcha')) : '';
				$postCaptcha = (null !== $this->request->getPost('captcha')) ? mb_strtolower($this->request->getPost('captcha')) : '';

				if (! $sessCaptcha || ! $postCaptcha)
																return redirect()->back()->withInput()->with('error', lang('Profile.capchaproblem'));

				if ($sessCaptcha !== $postCaptcha)
    		   											return redirect()->back()->withInput()->with('error', lang('Profile.capchawrong'));

        $session->remove('captcha');

        $users = $this->getUserProvider();

        // Validate here first, since some things,
        // like the password, can only be validated properly here.
        $rules = $this->getValidationRules(['except' => ['first_name','last_name','birthdate']]);
        
        unset($rules['first_name'], $rules['last_name'], $rules['birthdate']);

        if (! $this->validateData($this->request->getPost(), $rules, [], config('Auth')->DBGroup)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        // Save the user
        $allowedPostFields = array_keys($rules);
        $user = $users->createNewUser($this->request->getPost($allowedPostFields));

        // Workaround for email only registration/login
        if ($user->username === null) {
            $user->username = null;
        }
        
        try {
            $users->save($user);
        } catch (ValidationException) {
            return redirect()->back()->withInput()->with('errors', $users->errors());
        }

        // To get the complete user object with ID, we need to get from the database
        $user = $users->findById($users->getInsertID());

        // Add to default group
        $users->addToDefaultGroup($user);

        Events::trigger('register', $user);

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        $authenticator->startLogin($user);

        // If an action has been defined for register, start it up.
        $hasAction = $authenticator->startUpAction('register', $user);
        if ($hasAction) {
            return redirect()->route('auth-action-show');
        }

        // Set the user active
        $user->activate();

        $authenticator->completeLogin($user);

        // Success!
        return redirect()->to(config('Auth')->registerRedirect())
            ->with('message', lang('Auth.registerSuccess'));
    }

}