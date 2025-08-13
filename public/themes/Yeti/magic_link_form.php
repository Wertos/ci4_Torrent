<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>

<div class="d-flex justify-content-center">
	<div class="col-7">
		<form action="<?= url_to('user/login/magic-link') ?>" method="post">
    	<?= csrf_field() ?>
    	<!-- Email -->
    	<div class="form-floating mb-2">
    		<input type="email" class="form-control" id="floatingEmailInput" name="email" autocomplete="email" placeholder="<?= lang('Auth.email') ?>"
        	     value="<?= old('email', auth()->user()->email ?? null) ?>" required>
      	<label for="floatingEmailInput"><?= lang('Auth.email') ?></label>
    	</div>
    	<div class="d-grid col-12 col-md-8 mx-auto m-3">
		    <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.send') ?></button>
	    </div>
    </form>
    <p class="text-start fw-light fs-6"><a href="<?= url_to('user/login') ?>"><?= lang('Auth.backToLogin') ?></a></p>
	</div>
</div>