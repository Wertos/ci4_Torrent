<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
   <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
	   <div class="fs-4 text-secondary fw-bolder"><?= lang('Torrent.torrents'); ?></div>
     <div class="text-secondary lead fw-normal" id="curr_date_time"></div>
   </div>
<hr />
<div class="col-lg-12">
 <table class="table table-sm align-middle">
    <tr>
    	<td colspan="3">
    		<a class="text-danger fs-5" style="text-decoration:none;" href="<?= base_url('admin/torrents'); ?>"><i class="fa-regular fa-circle-xmark"></i> <?= lang('Admin.reset') ?></a>
    	</td>
    </tr>
    <tr>
    	<td colspan="3" id="btnManage" class="d-none">
			<div class="btn-group pb-3 pt-3" role="group">
				<button data-event="tdelete" id="tDel" type="button" class="btn btn-xs btn-danger fw-bold"><?= lang('Torrent.deleteTorrents'); ?></button>
				<button data-event="tmove" id="tMov" type="button" class="btn btn-xs btn-primary fw-bold"><?= lang('Torrent.moveTorrents'); ?></button>
			</div>
    	</td>
    </tr>
    <tr>
    	<td scope="col" class="col-2 pb-3">
			<label for="filterByStatus"><?= lang('Torrent.filterByStatus') ?></label>
			<select class="form-select form-select-sm" id="filterByStatus" aria-label="">
				<option <?= ($statusId == '-') ? 'selected' : '' ?> disabled value="-" class=""><?= lang('Admin.filterByStatus') ?></option>
			<?php foreach ($statused as $sKey => $sVal) : ?>
				<option <?= ($statusId == $sKey) ? 'selected' : '' ?> value="<?= $sKey ?>" class="<?=$sVal['class']?>"><?=$sVal['icon']?><?=$sVal['title']?></option>
			<?php endforeach; ?>
			</select>
        </td>
    	<td scope="col" class="col-2 pb-3">
			<label for="filterByCat"><?= lang('Admin.filterByCat') ?></label>
			<select class="form-select form-select-sm" id="filterByCat" aria-label="">
				<option <?= ($catId == '-') ? 'selected' : '' ?> disabled value="-" class=""><?= lang('Admin.filterByCat') ?></option>
			<?php foreach ($category as $cat) : ?>
				<option <?= ($catId == $cat['id']) ? 'selected' : '' ?> value="<?= $cat['id'] ?>" class=""><?= $cat['name']; ?></option>
			<?php endforeach; ?>
			</select>
        </td>
    	<td scope="col" class="col-2 pb-3">
			<label for="filterByUser"><?= lang('Admin.filterByUser'); ?></label>
			<input autocomplete="off" name="useranme" type="text" class="form-control form-control-sm" id="filterByUser" placeholder="<?= lang('Admin.filterByUser'); ?>">
			<input name="userid" type="hidden" id="UserId">
			<ul class="dropdown-menu" id="userlist">
				<li><a class="dropdown-item" href="#"><?= lang('Admin.userNotFound'); ?></a></li>
			</ul>
        </td>
    </tr>
 </table>
 <?php if ($no_torrents) : ?>
   <?= lang('Torrent.no_torrents'); ?>
 <?php else : ?>
 <table class="table table-sm table-hover align-middle">
  <thead>
    <tr>
      <th scope="col" class="col-1">
      	<?= lang('Torrent.id'); ?>
		<input id="torrSelect" class="form-check-input ms-1 border border-2 border-primary" type="checkbox" value="" data-bs-toggle="tooltip" data-bs-title="<?= lang('Torrent.torrselect'); ?>">
      </th>
      <th scope="col" class="col-6"><?= lang('Torrent.name'); ?></th>
      <th scope="col" class="col-2"><?= lang('Torrent.category'); ?></th>
      <th scope="col" class="col-1"><?= lang('Torrent.owner'); ?></th>
      <th scope="col" class="col-1"><?= lang('Torrent.created_at'); ?></th>
      <th scope="col" class="col-1"><?= lang('Torrent.updated_at'); ?></th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($torrents as $tor) : ?>
  	<tr id="rowid-<?= $tor->tid; ?>" class="">
  		<td class="col-1" id="torrentid-<?= $tor->tid; ?>">
  			<?= $tor->tid; ?>
			<input class="form-check-input ms-1 border border-2 border-primary" name="torrSelect" type="hidden" id="select-<?= $tor->tid; ?>" value="<?= $tor->tid; ?>">
  		</td>
  		<td class="col-6" id="torrentname-<?= $tor->tid; ?>">
  			<a target="_blank" data-bs-toggle="tooltip" data-bs-title="<?= $tor->tname; ?>" href="<?= base_url('torrent/' . $tor->tid . '-' . $tor->turl); ?>">
  				<?= $tor->tname; ?>
  			</a>
  		</td>
  		<td class="col-2" id="torrentcat-<?= $tor->cid; ?>">
            <a class="me-2" data-bs-toggle="tooltip" data-bs-title="<?= lang('Admin.filterByCat'); ?>" href="<?= base_url('admin/torrents?catid=' . $tor->cid); ?>"><i class="text-secondary-emphasis fa-solid fa-magnifying-glass"></i></a>
  			<a target="blank" data-bs-toggle="tooltip" data-bs-title="<?= lang('Torrent.category'); ?>" href="<?= base_url($tor->curl); ?>"><?= $tor->cname; ?></a>
  		</td>
  		<td class="col-1" id="torrentauthor-<?= $tor->id; ?>">
            <a class="me-2" data-bs-toggle="tooltip" data-bs-title="<?= lang('Admin.filterByUser'); ?>" href="<?= base_url('admin/torrents?poster=' . $tor->uid); ?>"><i class="text-secondary-emphasis fa-solid fa-magnifying-glass"></i></a>
  			<a target="blank" data-bs-toggle="tooltip" data-bs-title="<?= lang('Torrent.owner'); ?>" href="<?= base_url('user/profile/' . $tor->uid); ?>"><?= $tor->uname; ?></a>
  		</td>
  		<td class="col-1" id="torrentcreated-<?= $tor->tid; ?>"><?= ($tor->created_at); ?></td>
  		<td class="col-1" id="torrentupdated-<?= $tor->tid; ?>"><?= ($tor->updated_at == $tor->created_at) ? '-' : $tor->updated_at; ?></td>
  	</tr>
  	<?php endforeach; ?>
  </tbody>
</table>
<div class="ms-2 me-2"><?= $paginate->links(); ?></div>
   <?php endif; ?>
</div>
