<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>

<div class="d-flex justify-content-center">
	<div class="col-7">
		<form action="<?= url_to('user/login') ?>" method="post">
    	<?= csrf_field() ?>
      <!-- Email -->
      <div class="form-floating mb-3">
	      <input type="email" class="form-control" id="floatingEmailInput" name="email" inputmode="email" autocomplete="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" required>
        <label for="floatingEmailInput"><?= lang('Auth.email') ?></label>
      </div>
      <!-- Password -->
      <div class="form-floating mb-3">
	      <input type="password" class="form-control" id="floatingPasswordInput" name="password" inputmode="text" autocomplete="current-password" placeholder="<?= lang('Auth.password') ?>" required>
  	    <label for="floatingPasswordInput"><?= lang('Auth.password') ?></label>
  	    <div id="viewpass" style="top:50%; left:95%;" class="clickable position-absolute translate-middle rounded">
  	    	<i class="bi bi-unlock"></i>
  	    </div>
      </div>
      <!-- Remember me -->
			<?php if (setting('Auth.sessionConfig')['allowRemembering']): ?>
      	<div class="form-check">
      	  <label class="form-check-label">
            <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')): ?> checked<?php endif ?>>
        	  <?= lang('Auth.rememberMe') ?>
          </label>
        </div>
      <?php endif; ?>
      <div class="d-grid col-12 col-md-8 mx-auto m-3">
	      <button type="submit" class="btn btn-primary btn-block"><i class="bi bi-door-open me-1"></i><?= lang('Auth.login') ?></button>
      </div>
      <?php if (setting('Auth.allowMagicLinkLogins')) : ?>
  	    <p class="text-start fw-light fs-6"><?= lang('Auth.forgotPassword') ?> <a href="<?= url_to('user/login/magic-link') ?>"><?= lang('Auth.useMagicLink') ?></a></p>
      <?php endif ?>
      <?php if (setting('Auth.allowRegistration')) : ?>
    		<p class="text-start fw-light fs-6"><?= lang('Auth.needAccount') ?> <a href="<?= url_to('user/register') ?>"><?= lang('Auth.register') ?></a></p>
			<?php endif ?>
    </form>
	</div>
</div>