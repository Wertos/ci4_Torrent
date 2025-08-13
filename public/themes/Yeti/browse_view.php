<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
<?php if(!$no_torrents) { ?>
<!--
<div class="alert alert-primary" style="padding: 5px !important;">
	<b class="fw-bold ps-1">Панель фильтров</b>
	<div class="m-1 p1">
		<a data-id="" data-status="approved" class="p-1 text-success" title="<?= lang('Torrent.status_name.approved'); ?>" href="javascript:void(0);"><i class="fa-solid fa-check-double fa-lg"></i></a>
		<a data-id="" data-status="not_approved" class="p-1 text-warning" title="<?= lang('Torrent.status_name.not_approved'); ?>" href="javascript:void(0);"><i class="fa-solid fa-circle-exclamation fa-lg"></i></a>
		<a data-id="" data-status="closed" class="p-1 text-danger" title="<?= lang('Torrent.status_name.closed'); ?>" href="javascript:void(0);"><i class="fa-solid fa-do-not-enter fa-lg"></i></a>
		<a data-id="" data-status="consumed" class="p-1 text-primary" title="<?= lang('Torrent.status_name.consumed'); ?>" href="javascript:void(0);"><i class="fa-solid fa-clone fa-lg"></i></a>
		<a data-id="" data-status="dup" class="p-1 text-secondary" title="<?= lang('Torrent.status_name.dup'); ?>" href="javascript:void(0);"><i class="fa-solid fa-lock fa-lg"></i></a>
		<a data-id="" data-status="need_edit" class="p-1 text-info" title="<?= lang('Torrent.status_name.need_edit'); ?>" href="javascript:void(0);"><i class="fa-solid fa-comments-question-check fa-lg"></i></a>
	</div>
</div>
-->
<table class="table table-bordered table-striped table-sm table-hover">
  <thead>
    <tr>
      <th scope="col" class="bg-secondary col-10 p-2 text-left"><?= lang('Browse.name'); ?></th>
      <th scope="col" class="bg-secondary col-1 p-2 text-center"><?= lang('Browse.add'); ?></th>
      <th scope="col" class="bg-secondary col-1 p-2 text-center">Торрент</th>
    </tr>
  </thead>
  <tbody>
  <?php
  	foreach ($torList as $tor) :
  	$status = getDataTorrStatus($tor->modded, '');
  ?>
    <tr>
      <td class="pt-2 pb-2 small">
      	<a class="d-block clearfix fw-bold" href="<?= base_url('torrent/' . $tor->id . '-' . $tor->url); ?>" /><?= $tor->name; ?></a>
      		<hr class="p-0 m-1">
      		<div style="font-size: 12px; min-width: 250px;" class="p-1 ps-3 mt-1 badge rounded-pill bg-light border <?= $status['class']; ?> text-start">
      			<?= $status['icon']; ?>
      			<span class="ms-1 me-1">|</span>
      			<?= getStrTorrVersion($tor->version); ?>
      			<span class="ms-1 me-1">|</span>
      			<a href="<?= base_url('user/profile/'.$tor->owner); ?>"><?= $tor->username;?></a>
      			<span class="ms-1 me-1">|</span>
      			<a href="<?= base_url($tor->caturl); ?>"><?= $tor->catname;?></a>
      		</div>
      </td>
      <td class="pt-2 pb-2 text-center small align-middle"><?= toDate($tor->created_at); ?><br /><?= $tor->downloaded; ?><span class="ms-1 me-1">|</span><?= $tor->completed; ?></td>
      <td class="pt-2 pb-2 text-center align-middle small">
      	<span class="text-success" title="<?= lang('Browse.seed'); ?>"><?= $tor->seed; ?></span>
      	<span class="ms-1 me-1">|</span>
      	<span class="text-danger" title="<?= lang('Browse.leech'); ?>"><?= $tor->leech; ?></span><br />
      	<nobr title="<?= lang('Browse.size'); ?>"><?= number_to_size($tor->size); ?></nobr>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?= $pager_links; ?>
<?php
} else {
?>
<div class="alert alert-danger" role="alert">
  <?= lang('Browse.no_torrents'); ?><br>
</div>
<?php
}
?>
</div>