<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
   <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
	   <div class="fs-4 text-secondary fw-bolder"><?= lang('Config.settingManager'); ?></div>
     <div class="text-secondary lead fw-normal" id="curr_date_time"></div>
   </div>
<hr />
<div class="col-lg-12">
 <table class="table table-sm table-hover align-middle">
  <thead>
    <tr>
      <th scope="col" class="col-6"><?= lang('Torrent.name'); ?></th>
      <th scope="col" class="col-6"><?= lang('Torrent.category'); ?></th>
	</tr>
  </thead>
  <tbody>
    <?php foreach ($settings as $sKey => $sVal) : ?>
    <tr>
      <td><?= lang('Config.settings.'.$sKey); ?></td>
      <td>
      <?php if (gettype($sVal) == "string") : ?>
      	<input class="form-control border border-primary" type="text" id="<?= $sKey; ?>" name="<?= $sKey; ?>" value="<?= $sVal; ?>" />
      <?php elseif (gettype($sVal) == "boolean") : ?>
      	<input class="form-check-input border border-primary" type="checkbox" id="<?= $sKey; ?>" name="<?= $sKey; ?>" <?= $sVal >= 1 ? 'checked' : ''; ?> />
      <?php elseif (gettype($sVal) == "integer") : ?>
      	<input class="form-control border border-primary" type="number" id="<?= $sKey; ?>" name="<?= $sKey; ?>" value="<?= $sVal; ?>" />
	  <?php endif; ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
 </table>
</div>