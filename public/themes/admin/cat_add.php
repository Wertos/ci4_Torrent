<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
   <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
	   <div class="fs-4 text-secondary fw-bolder"><?= lang('Category.Create'); ?></div>
     <div class="text-secondary lead fw-normal" id="curr_date_time"></div>
   </div>
<hr />
	<div class="container-fluid p-3 p-md-4 d-flex justify-content-center">
	<div class="col-8 mb-4">
		<?= form_open('admin/categories/add'); ?>
    	<?= csrf_field() ?>
  	  <!-- Cat Name -->
			<div class="form-floating mb-2">
				<input type="text" class="form-control" id="floatingCatNameInput" name="name" inputmode="none" autocomplete="name" placeholder="<?= lang('Category.Category.name') ?>" required />
   	  	<label for="floatingCatNameInput"><i class="fa-solid fa-list me-2"></i><?= lang('Category.Category.name') ?></label>
    	</div>
  	  <!-- Cat Desc -->
	    <div class="form-floating mb-2">
				<input type="text" class="form-control" id="floatingCatDescInput" name="desc" inputmode="none" autocomplete="desc" placeholder="<?= lang('Category.Category.desc') ?>" required />
    	  <label for="floatingCatDescInput"><i class="fa-solid fa-subtitles me-2"></i><?= lang('Category.Category.desc') ?></label>
			</div>
  	  <!-- Cat Url -->
	    <div class="form-floating mb-2">
				<input type="text" class="form-control" id="floatingCatUrlInput" name="url" inputmode="none" autocomplete="url" placeholder="<?= lang('Category.Category.url') ?>" />
    	  <label for="floatingCatUrlInput"><i class="fa-solid fa-link me-2"></i><?= lang('Category.Category.url') ?></label>
				<small class="small ms-1 d-block text-danger"><?= lang('Category.Category.urldesc') ?></small>
			</div>
			<!-- Cat Sort -->
  	  <div class="form-floating mb-2">
				<input type="number" pattern="\d*" min="0" class="form-control" id="floatingCatSortInput" name="sort" inputmode="Numeric" autocomplete="sort" placeholder="<?= lang('Category.Category.sort') ?>" required />
				<label for="floatingCatSortInput"><i class="fa-solid fa-bars-sort me-2"></i><?= lang('Category.Category.sort') ?></label>
				<small class="small ms-1 d-block text-danger"><?= lang('Category.Category.sortdesc') ?></small>
    	</div>
  	  <!-- Cat Icon -->
	    <div class="form-floating mb-2">
				<input type="text" class="form-control" id="floatingCatIconInput" name="img" inputmode="none" autocomplete="img" placeholder="<?= lang('Category.Category.img') ?>">
    	  <label for="floatingCatIconInput"><i class="fa-solid fa-image-landscape me-2"></i><?= lang('Category.Category.img') ?></label>
  	  </div>
		  <div class="d-grid col-12 col-md-8 mx-auto m-3">
  			<button type="submit" class="btn btn-primary btn-block"><i class="fa-solid fa-square-check me-2"></i><?= lang('Auth.send') ?></button>
  	  </div>
    <?= form_close(); ?>
	</div>
	</div>
