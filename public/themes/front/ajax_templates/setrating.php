<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
<span class="kpname fs-7 d-block"><?= lang('Torrent.ratetorrent'); ?>
	<span title="<?= lang('Torrent.myrate'); ?>" class="pe-1 ps-1 badge rounded-pill <?= $clsRating; ?> fw-bold">
		<i class="bi bi-star-fill me-1 text-dark"></i><span class="text-dark"><?= $avgRating; ?></span>
	</span>
</span>
<button class="star"><span><i class="bi bi-star-fill"></i></span></button>
<?php for ($i = 1; $i <= 10; $i++) : ?>
	<?php if ($i < 5) $class = 'red'; ?>
	<?php if ($i >= 5 && $i < 7) $class = 'gray'; ?>
	<?php if ($i >= 7) $class = 'green'; ?>
	<button onClick="CI4.rate(<?= $tid; ?>, <?= $i; ?>)" class="rating" data-tid="<?= $tid; ?>" data-rating="<?= $i; ?>" type="button"><span class="<?= $class; ?>"><?= $i; ?></span></button>
<?php endfor; ?>