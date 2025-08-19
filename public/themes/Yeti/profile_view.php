<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>

<ul class="nav nav-pills flex-column flex-sm-row border-bottom border-primary border-3" role="tablist" id="userTabs">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" data-user-id="<?= $user->id; ?>" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile"><?= lang('Profile.profile'); ?></button>
  </li>
  <li class="nav-item">
    <button class="nav-link <?= ($torrcount) ? '' : 'disabled'; ?>" data-user-id="<?= $user->id; ?>" id="torrents-tab" data-bs-toggle="tab" data-bs-target="#torrents" type="button" role="tab" aria-controls="torrents"><?= lang('Profile.torrents'); ?><span class="badge bg-success ms-2"><?= $torrcount; ?></span></button>
  </li>
  <li class="nav-item">
    <button class="nav-link <?= ($commcount) ? '' : 'disabled'; ?>" data-user-id="<?= $user->id; ?>" id="comments-tab" data-bs-toggle="tab" data-bs-target="#comments" type="button" role="tab" aria-controls="comments"><?= lang('Profile.comments'); ?><span class="badge bg-success ms-2"><?= $commcount; ?></span></button>
  </li>
  <li class="nav-item">
    <button class="nav-link <?= ($bookcount) ? '' : 'disabled'; ?>" data-user-id="<?= $user->id; ?>" id="bookmarks-tab" data-bs-toggle="tab" data-bs-target="#bookmarks" type="button" role="tab" aria-controls="bookmarks"><?= lang('Profile.bookmarks'); ?><span class="badge bg-success ms-2"><?= $bookcount; ?></span></button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
	<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
		<div class="row m-2 border p-2">
			<div class="col-5">
				<div align="center" style="margin-bottom: 7px;">
					<?= avatar($user->avatar, 250); ?>
				</div>
      </div>
			<div class="col-7">
 				<h6 class="d-inline"><?= lang('Profile.username'); ?></h6>
				<h5 class="d-inline ms-4 float-end me-5"><?= $user->username; ?></h5>
				<hr class="d-block crearfix">
 				<h6 class="d-inline"><?= lang('Profile.firstname'); ?></h6>
				<h5 class="d-inline ms-4 float-end me-5"><?= $user->first_name; ?></h5>
				<hr class="d-block crearfix">
 				<h6 class="d-inline"><?= lang('Profile.lastname'); ?></h6>
				<h5 class="d-inline ms-4 float-end me-5"><?= $user->last_name; ?></h5>
				<hr class="d-block crearfix">
 				<h6 class="d-inline"><?= lang('Profile.birthdate'); ?></h6>
				<h5 class="d-inline ms-4 float-end me-5"><?= $user->birthdate; ?><?php if ($user->birthdate) : ?> (<?= $age; ?>) <?php endif; ?></h5>
				<hr class="d-block crearfix">
 				<h6 class="d-inline"><?= lang('Profile.created'); ?></h6>
				<h5 class="d-inline ms-4 float-end me-5"><?= toDate($user->created_at); ?></h5>
				<hr class="d-block crearfix">
			</div>
		</div>
	</div>
	<div class="tab-pane fade" id="torrents" role="tabpanel" aria-labelledby="torrents-tab" data-offset="0">
	torrents
	</div>
	<div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments-tab" data-offset="0">
	comments
	</div>
	<div class="tab-pane fade" id="bookmarks" role="tabpanel" aria-labelledby="bookmarks-tab" data-offset="0">
	bookmarks
	</div>
</div>