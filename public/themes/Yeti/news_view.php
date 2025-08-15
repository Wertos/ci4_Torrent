<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
	<div class="card card-info" style="margin-right: -10px;margin-left: -4px;">
		<div class="card-header">
  		<h3 class="card-title"><b><?= $newsData->title; ?></b></h3>
		</div>
		<div class="card-body">
			<div class="news" id="news-text">
				<?= $newsData->text; ?>
			</div>
		</div>
	</div>
