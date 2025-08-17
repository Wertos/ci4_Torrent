<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
<div class="row m-2 p-2">
<?php if(!$no_comments) { ?>
<table class="table table-bordered table-striped table-sm table-hover">
  <thead>
    <tr>
      <th scope="col" class="bg-secondary col-10 p-2 text-left"><?= lang('Comment.text'); ?></th>
      <th scope="col" class="bg-secondary col-1 p-2 text-center"><?= lang('Comment.created_at'); ?></th>
      <th scope="col" class="bg-secondary col-1 p-2 text-center"><?= lang('Comment.torrent'); ?></th>
    </tr>
  </thead>
  <tbody>
  <?php
  	foreach ($comList as $com) :
  ?>
    <tr>
      <td class="pt-2 pb-2 small commentText"><?= $bbcode->parse(parse_smileys($com->text, '/uploads/smileys/')); ?></td>
      <td class="pt-2 pb-2 text-center small align-middle"><?= toDate($com->created_at); ?></td>
      <td class="pt-2 pb-2 text-center align-middle small"><a href="<?= base_url('torrent/' . $com->fid . '-' . $com->url . '#comment-' . $com->id); ?>" class="fw-bold fs-6"><i class="bi bi-box-arrow-up-right"></i></a></td>
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
		    	<button onclick="CI4.GetProfileData(<?= $com->user_id; ?>, 'comments', 'backward'); return false;" id="backward" type="button" class="btn-primary btn btn-sm" disabled><i class="bi bi-chevron-double-left"></i></button>
    			<button onclick="CI4.GetProfileData(<?= $com->user_id; ?>, 'comments', 'forward'); return false;" id="forward" type="button" class="btn-primary btn btn-sm" <?= ($comCount > $perpage) ? '' : 'disabled'; ?>><i class="bi bi-chevron-double-right"></i></button>
		  	</div>
			</div>    	
  	</div>

<?php
} else {
?>
<div class="alert alert-danger" role="alert">
  <?= lang('Comment.no_comment'); ?><br>
</div>
<?php
}
?>
</div>