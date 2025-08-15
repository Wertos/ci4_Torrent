<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
<?php if ($userdata->logged_in) : ?>
	<div class="card mb-4 rounded-3 shadow-sm border-primary">
		<div class="card-header py-3 text-white bg-primary border-primary">
			<h6 class="my-0"><i class="bi bi-person"></i> <?= lang('Login.hiuser'); ?><span class="fw-normal">&nbsp;<?= $userdata->username; ?></span></h6>
		</div>
		<div class="card-body">
			<div class="" align="center">
				<?= avatar($userdata->avatar, 200); ?>
			</div>
			<hr />
			<div class="list-group list-group-flush">
				<div class="list-group-item list-group-item-action">
					<a href="<?= base_url('user/profile'); ?>">
						<i class="bi bi-person-lines-fill user_menu_icon"></i><?= lang('Profile.profile'); ?>
					</a>
					<a class="clickable float-end badge bg-success user_menu_icon p-1" title="<?= lang('Profile.editprofile'); ?>" href="<?= base_url('user/edit'); ?>"><i class="bi bi-pen"></i></a>
				</div>
				<?php if($userdata->can_upload) : ?>
					<div class="list-group-item list-group-item-action">
						<a href="<?= base_url('torrent/add'); ?>"><i class="bi bi-cloud-plus user_menu_icon"></i><?= lang('Torrent.addTorrent'); ?></a>
					</div>
				<?php endif; ?>
				<div class="list-group-item list-group-item-action">
					<a href="<?= base_url('user/logout'); ?>"><i class="bi bi-door-open user_menu_icon"></i><?= lang('Profile.logout'); ?></a>
				</div>
				<?php if ( $adminlink ) : ?>
					<div class="list-group-item list-group-item-action">
						<a target="_blank" href="<?= base_url('admin'); ?>"><i class="bi bi-person-gear user_menu_icon"></i><?= lang('Admin.AdminHome'); ?></a>
				  </div>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php else : ?>
	<div class="card mb-4 rounded-3 shadow-sm border-primary">
		<div class="card-header py-3 text-white bg-primary border-primary">
			<h6 class="my-0"><?= lang('Login.hiuser'); ?><span class="fw-normal">&nbsp;<?= lang('Login.guest'); ?></span></h6>
		</div>
		<div class="card-body">
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
  	    <div data-pass="viewpass" style="top:50%; left:95%;" class="clickable position-absolute translate-middle rounded">
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
	      <p class="text-start fw-light small"><?= lang('Auth.needAccount') ?> <a href="<?= url_to('user/register') ?>"><b class="text-danger"><?= lang('Auth.register') ?></b></a></p>
      <?php endif ?>
  		</form>
		</div>
	</div>

<?php endif; ?>
