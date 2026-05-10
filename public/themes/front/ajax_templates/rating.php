<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
<span class="kpname fs-7 d-block"><?= $siteTitle; ?>
	<span class="pe-1 ps-1 badge rounded-pill <?= $myBgRating; ?> fw-bold">
		<i class="bi bi-star-fill me-1 "></i><?= $myRating; ?>
	</span>
</span>
<span class="kprating"><?= $avgRating; ?></span>
<!-- -->/<!-- -->
<span class="kpof">10</span>
<span class="ms-1 kpvotes d-inline"><?= $countVotes; ?></span>
<p onClick="CI4.rateEdit('delrating', <?= $tid; ?>);" id="rateedit" data-bs-toggle="dropdown" aria-expanded="false" class="clickable float-end text-end ms-1 kpvotes pt-2 m-0 text-danger fw-bold"><i title="Удалить свою оценку" class="bi bi-x-circle-fill"></i></p>
<!--
<div class="pt-0 pb-0 dropdown-menu" aria-labelledby="rateedit">
	<ul class="list-group list-group-flush">
		<li onClick="CI4.rateEdit('editrating', <?= $tid; ?>); return false;" class="p-1 small clickable fw-bolder list-group-item list-group-item-action">Изменить оценку</li>
		<li onClick="CI4.rateEdit('delrating', <?= $tid; ?>); return false;" class="p-1 small clickable fw-bolder list-group-item list-group-item-action">Удалить оценку</li>
	</ul>
</div>
-->