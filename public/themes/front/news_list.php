<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
<?php if(!$no_news) { ?>
<table class="table table-bordered table-striped table-sm table-hover small">
  <thead>
    <tr>
      <th scope="col" class="bg-secondary col-8 p-2 text-left"><?= lang('News.title'); ?></th>
      <th scope="col" class="bg-secondary col-2 p-2 text-center"><?= lang('News.created_at'); ?></th>
      <th scope="col" class="bg-secondary col-2 p-2 text-center"><?= lang('News.author'); ?></th>
    </tr>
  </thead>
  <tbody>
  <?php
  	foreach ($newsList as $news) :
  ?>
    <tr>
      <td class="pt-2 pb-2">
      	<a class="d-block clearfix fw-bold" href="<?= base_url('news/' . $news->id . '-' . $news->url); ?>" /><?= $news->title; ?></a>
      </td>
      <td class="pt-2 pb-2 text-center align-middle">
      	<span title="<?= lang('News.add'); ?>">
      		<?= toDate($news->created_at); ?>
      	</span>
	  </td>
      <td class="pt-2 pb-2 text-center align-middle">
      	<a class="d-block clearfix fw-bold" href="<?= base_url('user/profile/' . $news->user_id); ?>" /><?= $news->username; ?></a>
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
  <?= lang('News.no_news'); ?><br>
</div>
<?php
}
?>
</div>