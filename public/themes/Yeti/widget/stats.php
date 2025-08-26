<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
	<div class="card mb-4 rounded-3 shadow-sm border-primary">
		<div class="card-header py-3 text-white bg-primary border-primary">
			<h6 class="my-0"><i class="bi bi-graph-up me-1"></i><?= lang('Stats.stats'); ?></h6>
		</div>
		<div class="card-body">
        <ul class="list-unstyled small list-group list-group-flush">
           	<li class="list-group-item pb-1 pt-1"><?= lang('Stats.torrcount'); ?><span class="ms-1 fw-bold"><?= number_format($stats['torrents']); ?></span></li>
           	<li class="list-group-item pb-1 pt-1"><?= lang('Stats.sumsize'); ?><span class="ms-1 fw-bold"><?= $stats['size']; ?></span></li>
            <li class="list-group-item pb-1 pt-1"><?= lang('Stats.seeders'); ?><span class="ms-1 text-success fw-bold"><?= number_format($stats['seeders']); ?></span></li>
            <li class="list-group-item pb-1 pt-1"><?= lang('Stats.leechers'); ?><span class="ms-1 text-danger fw-bold"><?= number_format($stats['leechers']); ?></span></li>
        </ul>
		</div>
	</div>
