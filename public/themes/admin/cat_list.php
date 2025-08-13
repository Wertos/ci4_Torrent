<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
   <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
	   <div class="fs-4 text-secondary fw-bolder"><?= lang('Category.Categories'); ?></div>
     <div class="text-secondary lead fw-normal" id="curr_date_time"></div>
   </div>
<hr />
	<div class="col-lg-12">
	   <?php 
	   	if (!$catList) :
	   ?>
	   <?= lang('Category.NotFind'); ?>
	   <?php
	   	endif;
	    if ($catList) :
	   ?>
	<table class="table table-sm table-hover align-middle">
  <thead>
    <tr>
      <th scope="col"><?= lang('Category.Category.catid'); ?></th>
      <th scope="col"><?= lang('Category.Category.name'); ?><br /><small style="font-size:10px;"><?= lang('Category.Category.desc'); ?></small></th>
      <th scope="col"><?= lang('Category.Category.url'); ?></th>
      <th scope="col"><?= lang('Category.Category.sort'); ?></th>
      <th scope="col"><?= lang('Category.Category.img'); ?></th>
      <th scope="col"><?= lang('Category.Manage'); ?></th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($catList as $cat) { ?>
  	<tr id="rowid-<?= $cat->id; ?>">
  		<td id="catid-<?= $cat->id; ?>"><?= $cat->id; ?></td>
  		<td id="catname-<?= $cat->id; ?>"><?= $cat->name; ?><br /><small style="font-size:10px;" class="bg-warning-subtle p-1"><?= $cat->desc; ?></small></td>
  		<td id="caturl-<?= $cat->id; ?>"><?= $cat->url; ?></td>
  		<td id="catsort-<?= $cat->id; ?>"><?= $cat->sort; ?></td>
  		<td id="catimg-<?= $cat->id; ?>"><?= $cat->img; ?></td>
  		<td>
      	<div id="catdelete-<?= $cat->id; ?>" class="d-inline">
      		<a class="me-2 link-offset-2 link-underline link-underline-opacity-0" href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-title="<?= lang('Category.Delete'); ?>" onclick="CI4_Admin.CatDelete(<?= $cat->id; ?>); return false;">
      			<i class="fa-solid fa-trash-xmark text-danger cursor-pointer"></i>
      		</a>
      	</div>
				<div id="catedit-<?= $cat->id; ?>" class="d-inline">
					<a class="me-2 link-offset-2 link-underline link-underline-opacity-0" href="<?= base_url('admin/categories/edit/' . $cat->id);?>" data-bs-toggle="tooltip" data-bs-title="<?= lang('Category.Edit'); ?>">
						<i class="fa-solid fa-pen-to-square text-primary cursor-pointer"></i>
					</a>
				</div>
  		</td>
  	</tr>
  	<?php } ?>
  </tbody>
	</table>
	   <?php
	   	endif;
	   ?>
	</div>
