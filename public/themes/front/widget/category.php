<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
	<div class="card mb-4 rounded-3 shadow-sm border-primary">
		<div class="card-header py-3 text-white bg-primary border-primary">
			<h6 class="my-0"><i class="bi bi-list-nested"></i> <?= lang('Category.Categories'); ?></h6>
		</div>
		<div class="card-body">
			<div class="list-group list-group-flush">
			  <?php foreach ($catList as $cat): ?>
			  <?php if($cat->count == 0) continue; ?>
				<div class="list-group-item list-group-item-action">
				<a href="<?= base_url($cat->url); ?>"><?= $cat->name; ?>
					<span data-bs-original-title="<?= lang('Torrent.torInCat'); ?>" title="<?= lang('Torrent.torInCat'); ?>" class="badge bg-primary float-end"><?= $cat->count; ?></span>
				</a>
				</div>
			<?php endforeach; ?>
			</div>
		</div>
	</div>
