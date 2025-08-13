<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>

<div class="d-flex justify-content-center">
	<div class="col-8 mb-4">
		<?= form_open_multipart('user/update', 'id="editProfile"'); ?>
  	  <!-- UserName -->
	    <div class="form-floating mb-2">
				<input type="text" class="form-control is-invalid" id="floatingUserNameInput" name="username" inputmode="text" autocomplete="username" placeholder="<?= lang('Auth.username') ?>" value="<?= $userdata->username; ?>" disabled readonly>
    	  <label for="floatingUserNameInput"><?= lang('Auth.username') ?></label>
    	  <div style="top:4px; left:100%;" class="position-absolute translate-middle badge rounded-pill bg-danger"><i class="bi bi-exclamation-circle"></i> <?= lang('Profile.fielddanger'); ?></div>
  	  </div>
  	  <!-- Email -->
	    <div class="form-floating mb-2">
				<input type="text" class="form-control is-invalid" id="floatingEmailInput" name="email" inputmode="text" autocomplete="email" placeholder="<?= lang('Auth.email') ?>" value="<?= $userdata->email; ?>" disabled readonly>
    	  <label for="floatingEmailInput"><?= lang('Auth.email') ?></label>
    	  <div style="top:4px; left:100%;" class="position-absolute translate-middle badge rounded-pill bg-danger"><i class="bi bi-exclamation-circle"></i> <?= lang('Profile.fielddanger'); ?></div>
  	  </div>
  	  <!-- First Name -->
	    <div class="form-floating mb-2">
				<input type="text" class="form-control" id="floatingFirstNameInput" name="first_name" inputmode="text" autocomplete="first-name" placeholder="<?= lang('Profile.firstname') ?>" value="<?= $userdata->first_name; ?>">
    	  <label for="floatingFirstNameInput"><?= lang('Profile.firstname') ?></label>
  	  </div>
  	  <!-- Last Name -->
	    <div class="form-floating mb-2">
				<input type="text" class="form-control" id="floatingLastNameInput" name="last_name" inputmode="text" autocomplete="last-name" placeholder="<?= lang('Profile.lastname') ?>" value="<?= $userdata->last_name; ?>">
    	  <label for="floatingLastNameInput"><?= lang('Profile.lastname') ?></label>
  	  </div>
  	  <!-- Birth Date -->
	    <div class="mb-2">
	    	<label for="floatingBirthdateInput"><?= lang('Profile.birthdate') ?></label>
				<input type="date" class="form-control" id="floatingBirthdateInput" name="birthdate" inputmode="date" placeholder="<?= lang('Profile.birthdate') ?>" value="<?= $userdata->birthdate; ?>">
  	  </div>
			<!-- Password -->
  	  <div class="form-floating mb-2">
				<input type="password" class="form-control" id="floatingPasswordInput" name="password" inputmode="text" autocomplete="password" placeholder="<?= lang('Auth.password') ?>">
				<label for="floatingPasswordInput"><?= lang('Auth.password') ?></label>
    	</div>
  	  <!-- Password (Again) -->
	    <div class="form-floating mb-2">
				<input type="password" class="form-control" id="floatingPasswordConfirmInput" name="password_confirm" inputmode="text" autocomplete="new-password" placeholder="<?= lang('Auth.passwordConfirm') ?>">
    	  <label for="floatingPasswordConfirmInput"><?= lang('Auth.passwordConfirm') ?></label>
  	  </div>
  	  <!-- Avatar -->
	    <div class="mb-5">
	    	<label for="floatingAvatarInput"><?= lang('Profile.avatar') ?></label>
				<input accept="image/png, image/gif, image/jpeg" type="file" class="form-control form-control-lg" id="floatingAvatarInput" name="avatar">
  	  </div>
		  <div class="d-grid col-12 col-md-8 mx-auto m-3">
  			<button type="submit" id="submitProfile" class="btn btn-primary btn-block"><i class="bi bi-check2-all me-1"></i><?= lang('Auth.confirm') ?></button>
  	  </div>
    <?= form_close(); ?>
	</div>
</div>
