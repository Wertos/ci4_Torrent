<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
   <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
	   <div class="fs-4 text-secondary fw-bolder"><?= lang('Admin.UserEdit.edittitle'); ?> <b><?= $user->username ?></b></div>
     <div class="text-secondary lead fw-normal" id="curr_date_time"></div>
   </div>
<hr />
<div class="container-fluid p-3 p-md-4 d-flex justify-content-center">
	<div class="col-8 mb-4">
		<?= form_open_multipart('admin/user/update/'.$user->id); ?>
    	<?= csrf_field() ?>
  	  <input type="hidden" name="userid" value="<?= $user->id; ?>">
  	  <!-- Name -->
	    <div class="form-floating mb-2">
				<input type="text" class="form-control" id="floatingUserNameInput" name="username" inputmode="text" autocomplete="username" placeholder="<?= lang('Auth.username') ?>" value="<?= $user->username ?>">
    	  <label for="floatingUsernameInput"><?= lang('Auth.username') ?></label>
			</div>
  	  <!-- Email -->
	    <div class="form-floating mb-2">
				<input type="email" class="form-control" id="floatingEmailInput" name="email" inputmode="email" autocomplete="email" placeholder="<?= lang('Auth.email') ?>" value="<?= $user->email ?>">
    	  <label for="floatingEmailInput"><?= lang('Auth.email') ?></label>
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
  	  <hr />
  	  <!-- First Name -->
	    <div class="form-floating mb-2">
				<input type="text" class="form-control" id="floatingFirstNameInput" name="first_name" inputmode="text" autocomplete="first-name" placeholder="<?= lang('Profile.firstname') ?>" value="<?= $user->first_name ?>">
    	  <label for="floatingFirstNameInput"><?= lang('Profile.firstname') ?></label>
  	  </div>
  	  <!-- Last Name -->
	    <div class="form-floating mb-2">
				<input type="text" class="form-control" id="floatingLastNameInput" name="last_name" inputmode="text" autocomplete="last-name" placeholder="<?= lang('Profile.lastname') ?>" value="<?= $user->last_name ?>">
    	  <label for="floatingLastNameInput"><?= lang('Profile.lastname') ?></label>
  	  </div>
  	  <!-- Birth Date -->
    <div class="form-floating mb-2">
				<input type="date" class="form-control" id="floatingBirthdateInput" name="birthdate" inputmode="date" placeholder="<?= lang('Profile.birthdate') ?>" value="<?= $user->birthdate ?>">
				<label for="floatingBirthdateInput"><?= lang('Profile.birthdate') ?></label>
  	  </div>
  	  <!-- Avatar -->
<!--
	    <div class="mb-5">
	    	<label for="floatingAvatarInput"><?= lang('Profile.avatar') ?></label>
				<input accept="image/png, image/gif, image/jpeg" type="file" class="form-control form-control-lg" id="floatingAvatarInput" name="avatar">
  	  </div>
-->
      <div class="mb-5">
      <span class="d-block"><?= lang('Admin.UserEdit.groups'); ?></span>
      <?php
      	foreach($allGroup as $group => $descGroup)
      	{
      		$checked = (in_array($group, $user->getGroups())) ? 'checked' : '';
      		$disabled = ($group === $defaultGroup) ? 'disabled' : '';
      ?>
				<input type="checkbox" class="btn-check" name="groups[<?= $group; ?>]" id="<?= $group; ?>" autocomplete="off" <?= $checked; ?> <?= $disabled; ?> />
				<label data-bs-toggle="tooltip" data-bs-title="<?= $descGroup['description']; ?>" class="btn btn-outline-success btn-sm" for="<?= $group; ?>"><?= $descGroup['title']; ?></label>  				
      <?php
      	}
      ?>
		  <input type="hidden" name="groups[<?= $defaultGroup; ?>]">
		  </div>
		  <div class="d-grid col-12 col-md-8 mx-auto m-3">
  			<button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.send') ?></button>
  	  </div>
    <?= form_close(); ?>
	</div>
</div>
