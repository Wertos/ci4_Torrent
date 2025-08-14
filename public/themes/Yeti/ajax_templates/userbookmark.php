<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
<div class="row m-2 p-2">
<?php if(!$no_bookmarks) { ?>
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
  	foreach ($bokList as $bookmark) :
  	if (! $bookmark->id) continue;
  	$status = getDataTorrStatus($bookmark->modded, '');
  ?>
    <tr>
      <td class="pt-2 pb-2 small">
      	<a class="me-1 text-danger" href="<?= base_url('bookmark/'.$bookmark->id); ?>" title="<?= lang('Bookmark.del'); ?>"><i class="bi bi-trash-fill"></i></a>
      	<a class="fw-bold" href="<?= base_url('torrent/' . $bookmark->id . '-' . $bookmark->url); ?>" /><?= $bookmark->name; ?></a>
      		<hr class="p-0 m-1">
      		<div style="font-size: 12px; min-width: 250px;" class="p-1 ps-3 mt-1 badge rounded-pill bg-light border <?= $status['class']; ?> text-start">
      			<span title="<?= $status['title']; ?>"><?= $status['icon']; ?></span>
      			<span class="ms-1 me-1">|</span>
      			<?= getStrTorrVersion($bookmark->version); ?>
      			<span class="ms-1 me-1">|</span>
      			<a href="<?= base_url('user/profile/'.$bookmark->owner); ?>"><?= $bookmark->username;?></a>
      			<span class="ms-1 me-1">|</span>
      			<a href="<?= base_url($bookmark->caturl); ?>"><?= $bookmark->catname;?></a>
      		</div>
      </td>
      <td class="pt-2 pb-2 text-center small align-middle"><?= toDate($bookmark->created_at); ?><br /><?= $bookmark->downloaded; ?><span class="ms-1 me-1">|</span><?= $bookmark->completed; ?></td>
      <td class="pt-2 pb-2 text-center align-middle small">
      	<span class="text-success" title="<?= lang('Browse.seed'); ?>"><?= $bookmark->seed; ?></span>
      	<span class="ms-1 me-1">|</span>
      	<span class="text-danger" title="<?= lang('Browse.leech'); ?>"><?= $bookmark->leech; ?></span><br />
      	<nobr title="<?= lang('Browse.size'); ?>"><?= number_to_size($bookmark->size); ?></nobr>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
    <div class="card-footer text-muted">
      <div class="btn-toolbar float-start">
      	<?= $pager; ?>
      </div>
			<div class="btn-toolbar float-end">
			  <div class="btn-group me-2" id="ajaxpag" data-type="ajaxpag" data-offset="0">
		    	<button onclick="CI4.GetProfileData(<?= $bookmark->owner; ?>, 'bookmarks', 'backward'); return false;" id="backward" type="button" class="btn-outline-primary btn btn-secondary btn-sm" disabled><i class="bi bi-chevron-double-left"></i></button>
    			<button onclick="CI4.GetProfileData(<?= $bookmark->owner; ?>, 'bookmarks', 'forward'); return false;" id="forward" type="button" class="btn-outline-primary btn btn-secondary btn-sm" <?= ($bokCount > $perpage) ? '' : 'disabled'; ?>><i class="bi bi-chevron-double-right"></i></button>
		  	</div>
			</div>    	
  	</div>

<?php
} else {
?>
<div class="alert alert-danger" role="alert">
  <?= lang('Bookmark.no_bookmark'); ?><br>
</div>
<?php
}
?>
</div>