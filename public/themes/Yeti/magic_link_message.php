<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>

<div class="d-flex justify-content-center">
	<div class="col-7 mb-4">
		<div class="alert alert-dismissible alert-success">
	    <h5 class="mb-2 text-center fw-bold"><?= lang('Auth.useMagicLink') ?></h5>
      <p class="text-center fw-light fs-6"><b><?= lang('Auth.checkYourEmail') ?></b></p>
      <p class="text-center fw-light fs-6"><?= lang('Auth.magicLinkDetails', [setting('Auth.magicLinkLifetime') / 60]) ?></p>
		</div>
	</div>
</div>
