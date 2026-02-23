<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
	<div class="card card-info" style="margin-right: -10px;margin-left: -4px;">
		<div class="card-header">
  		<h3 class="card-title"><b><?= $details->title; ?></b></h3>
		</div>
		<div class="card-body">
			<div class="news" id="news-text">
				<?= $details->text; ?>
			</div>
		</div>
	</div>
<?php 
  if (setting('Torrent.commenEnable')) :
	if($details->can_comment && $userdata->can_comment) :
?>
	<?php include "widget/comment_form.php"; ?>
<?php
	endif;
?>
<?php include "widget/comment_view.php"; ?>
<?php
	endif;
?>
