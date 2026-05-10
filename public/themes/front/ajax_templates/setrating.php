<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
<span class="kpname fs-7 d-block">Оценить фильм
	<span class="pe-1 ps-1 badge rounded-pill <?= $clsRating; ?> fw-bold">
		<i class="bi bi-star-fill me-1 text-dark"></i><?= $avgRating; ?>
	</span>
</span>
<button class="star"><span><i class="bi bi-star-fill"></i></span></button>
<button onClick="CI4.rate(<?= $tid; ?>, 1)" class="rating" data-tid="<?= $tid; ?>" data-rating="1" type="button"><span class="red">1</span></button>
<button onClick="CI4.rate(<?= $tid; ?>, 2)" class="rating" data-tid="<?= $tid; ?>" data-rating="2" type="button"><span class="red">2</span></button>
<button onClick="CI4.rate(<?= $tid; ?>, 3)" class="rating" data-tid="<?= $tid; ?>" data-rating="3" type="button"><span class="red">3</span></button>
<button onClick="CI4.rate(<?= $tid; ?>, 4)" class="rating" data-tid="<?= $tid; ?>" data-rating="4" type="button"><span class="red">4</span></button>
<button onClick="CI4.rate(<?= $tid; ?>, 5)" class="rating" data-tid="<?= $tid; ?>" data-rating="5" type="button"><span class="gray">5</span></button>
<button onClick="CI4.rate(<?= $tid; ?>, 6)" class="rating" data-tid="<?= $tid; ?>" data-rating="6" type="button"><span class="gray">6</span></button>
<button onClick="CI4.rate(<?= $tid; ?>, 7)" class="rating" data-tid="<?= $tid; ?>" data-rating="7" type="button"><span class="green">7</span></button>
<button onClick="CI4.rate(<?= $tid; ?>, 8)" class="rating" data-tid="<?= $tid; ?>" data-rating="8" type="button"><span class="green">8</span></button>
<button onClick="CI4.rate(<?= $tid; ?>, 8)" class="rating" data-tid="<?= $tid; ?>" data-rating="9" type="button"><span class="green">9</span></button>
<button onClick="CI4.rate(<?= $tid; ?>, 10)" class="rating" data-tid="<?= $tid; ?>" data-rating="10" type="button"><span class="green">10</span></button>