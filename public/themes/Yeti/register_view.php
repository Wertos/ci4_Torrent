<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>

<div class="d-flex justify-content-center">
	<div class="col-7 mb-4">
		<form action="<?= url_to('user/register') ?>" method="post">
    	<?= csrf_field() ?>
  	  <!-- Email -->
	    <div class="form-floating mb-2">
				<input type="email" class="form-control" id="floatingEmailInput" name="email" inputmode="email" autocomplete="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" required>
    	  <label for="floatingEmailInput"><?= lang('Auth.email') ?></label>
			</div>
	    <!-- Username -->
    	<div class="form-floating mb-4">
    		<input type="text" class="form-control" id="floatingUsernameInput" name="username" inputmode="text" autocomplete="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>" required>
  	  	<label for="floatingUsernameInput"><?= lang('Auth.username') ?></label>
	    </div>
			<!-- Password -->
  	  <div class="form-floating mb-2">
				<input type="password" class="form-control" id="floatingPasswordInput" name="password" inputmode="text" autocomplete="new-password" placeholder="<?= lang('Auth.password') ?>" required>
				<label for="floatingPasswordInput"><?= lang('Auth.password') ?></label>
    	</div>
  	  <!-- Password (Again) -->
	    <div class="form-floating mb-4">
				<input type="password" class="form-control" id="floatingPasswordConfirmInput" name="password_confirm" inputmode="text" autocomplete="new-password" placeholder="<?= lang('Auth.passwordConfirm') ?>" required>
    	  <label for="floatingPasswordConfirmInput"><?= lang('Auth.passwordConfirm') ?></label>
  	  </div>
  	  <!-- captcha -->
     	<div class="clearfix text-center mb-1">
    		<img src="<?= $captcha; ?>" class="border border-primary border-2" />
    	</div>
	    <div class="form-floating mb-5 text-center">
				<input type="text" class="form-control" id="floatingCaptchaInput" name="captcha" inputmode="text" placeholder="<?= lang('Profile.captcha') ?>" required>
    	  <label for="floatingCaptchaInput"><?= lang('Profile.captcha') ?></label>
  	  </div>
		  <div class="d-grid col-12 col-md-8 mx-auto m-3">
  			<button type="submit" class="btn btn-primary btn-block"><i class="bi bi-person-add me-1"></i><?= lang('Auth.register') ?></button>
  	  </div>
	    <p class="text-start fw-light fs-6"><?= lang('Auth.haveAccount') ?> <a href="<?= url_to('user/login') ?>"><?= lang('Auth.login') ?></a></p>
    </form>
	</div>
</div>
