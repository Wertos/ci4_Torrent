<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
<span class="kpname fs-7 d-block"><?= $siteTitle; ?>
	<span title="<?= lang('Torrent.myrate'); ?>" class="pe-1 ps-1 badge rounded-pill <?= $myBgRating; ?> fw-bold">
		<i class="bi bi-star-fill me-1 "></i><?= $myRating; ?>
	</span>
</span>
<span class="kprating"><?= $avgRating; ?></span>
<!-- -->/<!-- -->
<span class="kpof">10</span>
<span class="ms-1 kpvotes d-inline"><?= $countVotes; ?></span>
<p onClick="CI4.rateEdit('delrating', <?= $tid; ?>);" id="rateedit" data-bs-toggle="dropdown" aria-expanded="false" class="clickable float-end text-end ms-1 kpvotes pt-2 m-0 text-danger fw-bold"><i title="<?= lang('Torrent.delMyRating'); ?>" class="bi bi-x-circle-fill"></i></p>