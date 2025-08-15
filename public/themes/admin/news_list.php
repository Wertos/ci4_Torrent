<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
   <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
	   <div class="fs-4 text-secondary fw-bolder"><?= lang('News.news'); ?></div>
     <div class="text-secondary lead fw-normal" id="curr_date_time"></div>
   </div>
<hr />
	<div class="col-lg-12">
	   <?php 
	   	if (!$newsList) :
	   ?>
	   <?= lang('News.notfind'); ?>
	   <?php
	    else :
	   ?>
	<table class="table table-sm table-hover align-middle">
  <thead>
    <tr>
      <th scope="col" class="col-1"><?= lang('News.id'); ?></th>
      <th scope="col" class="col-1"><?= lang('News.title'); ?></th>
      <th scope="col" class="col-6"><?= lang('News.text'); ?></th>
      <th scope="col" class="col-1"><?= lang('News.created_at'); ?></th>
      <th scope="col" class="col-1"><?= lang('News.updated_at'); ?></th>
      <th scope="col" class="col-1"><?= lang('News.deleted_at'); ?></th>
      <th scope="col" class="col-1"><?= lang('News.manadge'); ?></th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($newsList as $news) : ?>
  	<tr id="rowid-<?= $news->id; ?>" class="<?= ($news->deleted_at) ? ' bg-danger-subtle ' : ''; ?>">
  		<td class="col-1" id="newsid-<?= $news->id; ?>"><?= $news->id; ?></td>
  		<td class="col-1 text-break" id="newstitle-<?= $news->id; ?>"><?= $news->title; ?></td>
  		<td class="col-6" id="newstext-<?= $news->id; ?>">
  			<div class="text-break news-text" style="overflow:auto; max-height:200px;"><?= $news->text; ?></div>
  		</td>
  		<td class="col-1" id="newscreated-<?= $news->id; ?>"><?= toDate($news->created_at); ?></td>
  		<td class="col-1" id="newsupdated-<?= $news->id; ?>"><?= toDate($news->updated_at); ?></td>
  		<td class="col-1" id="newsdeleted-<?= $news->id; ?>"><?= ($news->deleted_at != null) ? toDate($news->deleted_at) : ''; ?></td>
  		<td class="col-1">
      <?php if ($news->deleted_at == null) : ?>
       	<div id="newsdelete-<?= $news->id; ?>" class="d-inline">
      		<a class="me-2 link-offset-2 link-underline link-underline-opacity-0" href="<?= base_url('admin/news/del/' . $news->id); ?>" data-bs-toggle="tooltip" data-bs-title="<?= lang('News.delete'); ?>">
      			<i class="fa-regular fa-trash cursor-pointer text-danger"></i>
      		</a>
      	</div>
				<div id="newsedit-<?= $news->id; ?>" class="d-inline">
					<a class="me-2 link-offset-2 link-underline link-underline-opacity-0" href="<?= base_url('admin/news/edit/' . $news->id);?>" data-bs-toggle="tooltip" data-bs-title="<?= lang('News.edit'); ?>">
						<i class="fa-solid fa-pen-to-square text-primary cursor-pointer"></i>
					</a>
				</div>
      <?php else : ?>
       	<div id="newsdelete-<?= $news->id; ?>" class="d-inline">
      		<a class="me-2 link-offset-2 link-underline link-underline-opacity-0" onclick="return confirmation();" href="<?= base_url('admin/news/harddel/' . $news->id); ?>" data-bs-toggle="tooltip" data-bs-title="<?= lang('News.harddelete'); ?>">
      			<i class="fa-solid fa-trash-xmark cursor-pointer text-danger"></i>
      		</a>
      	</div>
       	<div id="newsdelete-<?= $news->id; ?>" class="d-inline">
      		<a class="me-2 link-offset-2 link-underline link-underline-opacity-0" href="<?= base_url('admin/news/restore/' . $news->id); ?>" data-bs-toggle="tooltip" data-bs-title="<?= lang('News.restore'); ?>">
      			<i class="fa-solid fa-trash-can-arrow-up cursor-pointer text-success"></i>
      		</a>
      	</div>
      <?php endif; ?>
  		</td>
  	</tr>
  	<?php endforeach; ?>
  </tbody>
	</table>
	<div class="ms-2 me-2"><?= $pager_links; ?></div>
	   <?php
	   	endif;
	   ?>
	</div>
