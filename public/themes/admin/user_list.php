<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
   <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
	   <div class="fs-4 text-secondary fw-bolder"><?= lang('Admin.UsersTitle'); ?></div>
     <div class="text-secondary lead fw-normal" id="curr_date_time"></div>
   </div>
   <hr>
  	<div class="col-lg-12">
	<div class="ms-2 me-2 mb-4">
		<a class="me-3 ps-2 d-inline" href="<?= base_url('admin/users'); ?>"><?= lang('Admin.all'); ?></a>
		<a class="me-3 ps-2 d-inline" href="<?= base_url('admin/users?only=banned'); ?>"><?= lang('Admin.banned'); ?></a>
		<a class="me-3 ps-2 d-inline" href="<?= base_url('admin/users?only=notactive'); ?>"><?= lang('Admin.notactive'); ?></a>
	</div>
	<table class="table table-sm table-hover align-middle">
  <thead>
    <tr>
      <th scope="col"><?= lang('Admin.id'); ?></th>
      <th scope="col"><?= lang('Admin.nickname'); ?></th>
      <th scope="col"><?= lang('Profile.firstname'); ?></th>
      <th scope="col"><?= lang('Profile.lastname'); ?></th>
      <th scope="col"><?= lang('Admin.email'); ?></th>
      <th scope="col"><?= lang('Profile.birthdate'); ?></th>
      <th scope="col"><?= lang('Admin.created_at'); ?></th>
      <th scope="col"><?= lang('Admin.updated'); ?></th>
      <th scope="col"><?= lang('Admin.usercontrol'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php //var_dump($usersList); die();?>
    <?php foreach ($usersList as $user) : ?>
    <tr id="rowid-<?= $user['id']; ?>">
      <th id="userid-<?= $user['id']; ?>"><?= $user['id']; ?></th>
      <td id="username-<?= $user['id']; ?>">
      	<?= $user['name']; ?>&nbsp;
      	<?= ($user['active'] === false) ? '<i id="act_icon_'.$user['id'].'" data-bs-toggle="tooltip" data-bs-title="' . lang('Admin.UserAct.notactivated') .'" class="fa-solid fa-triangle-exclamation me-2 text-danger"></i>' : '';  ?>
      	<?= ($user['banned'] === true) ? '<i id="ban_icon_'.$user['id'].'" data-bs-toggle="tooltip" data-bs-title="' . lang('Admin.Ban.banned') .'" class="fa-solid fa-ban me-2 text-danger"></i>' : '';  ?>
      </td>
      <td id="fl-name-<?= $user['id']; ?>"><?= $user['firstname'] ?></td>
      <td id="fl-name-<?= $user['id']; ?>"><?= $user['lastname']; ?></td>
      <td id="email-<?= $user['id']; ?>"><?= $user['email']; ?></td>
      <td id="bdate-<?= $user['id']; ?>"><?= $user['birthdate']; ?></td>
      <td id="created-<?= $user['id']; ?>"><?= $user['created']; ?></td>
      <td><?= $user['updated']?></td>
      <td>
      	<div id="userdelete-<?= $user['id']; ?>" class="d-inline">
      		<a class="me-2 link-offset-2 link-underline link-underline-opacity-0" href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-title="<?= lang('Admin.UserDelete.delete'); ?>" onclick="CI4_Admin.UserDelete(<?= $user['id']; ?>); return false;">
      			<i class="fa-solid fa-trash-xmark text-danger cursor-pointer"></i>
      		</a>
      	</div>
				<div id="useredit-<?= $user['id']; ?>" class="d-inline">
					<a class="me-2 link-offset-2 link-underline link-underline-opacity-0" href="<?= base_url('admin/user/edit/' . $user['id']);?>" data-bs-toggle="tooltip" data-bs-title="<?= lang('Admin.UserEdit.edit'); ?>">
						<i class="fa-solid fa-user-pen text-primary cursor-pointer"></i>
					</a>
				</div>
				<div id="useract-<?= $user['id']; ?>" class="d-inline">
					<a class="me-2 link-offset-2 link-underline link-underline-opacity-0" class="link-offset-2 link-underline link-underline-opacity-0" href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-title="<?= ($user['active'] === true) ? lang('Admin.UserAct.deactivate') : lang('Admin.UserAct.activate'); ?>" data-action="<?= ($user['active'] === true) ? 'deact' : 'act'; ?>" onclick="CI4_Admin.UserAct(<?= $user['id']; ?>); return false;">
						<i class="fa-solid <?= ($user['active'] === false) ? 'fa-check text-success' : 'fa-xmark text-danger'; ?>  cursor-pointer"></i>
					</a>
				</div>
				<div id="userban-<?= $user['id']; ?>" class="d-inline">
					<a class="me-2 link-offset-2 link-underline link-underline-opacity-0" href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-title="<?= ($user['banned'] === true) ? lang('Admin.Ban.unban') : lang('Admin.Ban.ban'); ?>" data-action="<?= ($user['banned'] === false) ? 'ban' : ''; ?>" onclick="CI4_Admin.UserBan(<?= $user['id']; ?>); return false;">
						<i class="fa-solid <?= ($user['banned'] === false) ? 'fa-ban text-danger ' : 'fa-ban text-success'; ?> cursor-pointer"></i>
					</a>
				</div>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
	</table>
		<div class="ms-2 me-2"><?= $pager_links; ?></div>
    </div>
