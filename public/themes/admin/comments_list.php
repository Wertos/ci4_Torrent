<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
	<div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
		<div class="fs-4 text-secondary fw-bolder"><?= lang('Comment.commmanage'); ?></div>
		<div class="text-secondary lead fw-normal" id="curr_date_time"></div>
	</div>
<hr />
	<div class="col-lg-12">
 <table class="table table-sm align-middle">
    <tr>
    	<td colspan="2">
    		<a class="text-danger fs-5" style="text-decoration:none;" href="<?= base_url('admin/comments'); ?>"><i class="fa-regular fa-circle-xmark"></i> <?= lang('Admin.reset') ?></a>
    	</td>
    </tr>
    <tr>
    	<td colspan="2" id="btnManage" class="d-none">
			<div class="btn-group pb-3 pt-3" role="group">
				<button data-event="cdelete" id="cDel" type="button" class="btn btn-xs btn-danger fw-bold"><?= lang('Comment.deleteComments'); ?></button>
			</div>
    	</td>
    </tr>
    <tr>
    	<td scope="col" class="col-2 pb-3">
			<label for="filterByStatus"><?= lang('Comment.by_material') ?></label>
			<select class="form-select form-select-sm" id="filterByMaterial" aria-label="">
				<option <?= ($location == null) ? 'selected' : ''?> disabled value="-" class=""><?= lang('Comment.by_material') ?></option>
				<?php foreach ($location_fields as $loc) : ?>
					<option <?= ($loc == $location) ? 'selected' : ''?> value="<?= $loc; ?>"><?= lang('Comment.by_material.'.$loc); ?></option>
				<?php endforeach; ?>
			</select>
        </td>
    	<td scope="col" class="col-2 pb-3">
			<label for="filterByUser"><?= lang('Admin.filterByUser'); ?></label>
			<input value="<?= $poster; ?>" autocomplete="off" name="useranme" type="text" class="form-control form-control-sm" id="filterByUser" placeholder="<?= lang('Admin.filterByUser'); ?>">
			<input name="userid" type="hidden" id="UserId">
			<ul class="dropdown-menu" id="userlist">
				<li><a class="dropdown-item" href="#"><?= lang('Admin.userNotFound'); ?></a></li>
			</ul>
        </td>
    </tr>
 </table>
<?php if ($no_comments) : ?>
	<?= lang('Comment.no_comment'); ?>
<?php else : ?>
 <table class="table table-sm table-hover align-middle">
  <thead>
    <tr>
      <th scope="col" class="col-1"><?= lang('Comment.id'); ?>
		<input id="comSelect" class="form-check-input ms-1 border border-2 border-primary" type="checkbox" value="" data-bs-toggle="tooltip" data-bs-title="<?= lang('Comment.comselect'); ?>">
      </th>
      <th scope="col" class="col-1"><?= lang('Comment.author'); ?></th>
      <th scope="col" class="col-6"><?= lang('Comment.text'); ?></th>
      <th scope="col" class="col-1"><?= lang('Comment.material'); ?></th>
      <th scope="col" class="col-1"><?= lang('Comment.created_at'); ?></th>
      <th scope="col" class="col-1"><?= lang('Comment.updated_at'); ?></th>
      <th scope="col" class="col-1"><?= lang('Comment.manadge'); ?></th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($comments as $comment) : ?>
  	<tr id="rowid-<?= $comment->id; ?>" class="">
  		<td class="col-1" id="commentid-<?= $comment->id; ?>">
  			<?= $comment->id; ?>
			<input class="form-check-input ms-1 border border-2 border-primary" name="comSelect" type="hidden" id="select-<?= $comment->id; ?>" value="<?= $comment->id; ?>">
  		</td>
  		<td class="col-1" id="commentauthor-<?= $comment->id; ?>">
            <a class="me-2" data-bs-toggle="tooltip" data-bs-title="<?= lang('Comment.by_author'); ?>" href="<?= base_url('admin/comments?poster=' . $comment->cuid); ?>"><i class="text-secondary-emphasis fa-solid fa-magnifying-glass"></i></a>
  			<a target="blank" data-bs-toggle="tooltip" data-bs-title="<?= lang('Comment.author'); ?>" href="<?= base_url('user/profile/' . $comment->uid); ?>"><?= $comment->uname; ?></a>
  		</td>
  		<td class="col-6" id="commenttext-<?= $comment->id; ?>">
  			<div class="text-break news-text" style="overflow:auto; max-height:200px;">
  				<?= $bbcode->parse(parse_smileys($comment->text, '/uploads/smileys/')); ?>
  			</div>
  		</td>
  		<td class="col-1" id="commentmaterial-<?= $comment->id; ?>">
            <?php
				$id = ($comment->clocate == 'news') ? $comment->nid : $comment->tid;
				$title = ($comment->clocate == 'news') ? $comment->ntitle : $comment->ttitle;
				$url = ($comment->clocate == 'news') ? $comment->nurl : $comment->turl;
				$fltr = ($comment->clocate == 'news') ? '?news='.$id : '?torrent='.$id;
            ?>
  			<a class="me-2" data-bs-toggle="tooltip" data-bs-title="<?= lang('Comment.by_topic'); ?>" href="<?= base_url('admin/comments' . $fltr); ?>"><i class="text-secondary-emphasis fa-solid fa-magnifying-glass"></i></a>
  			<a target="_blank" data-bs-toggle="tooltip" data-bs-title="<?= $title; ?>" href="<?= base_url($comment->clocate . '/' . $id . '-' . $url); ?>">
				<?= word_limiter($title, 4, '&#8230;'); ?>
  			</a>
  		</td>
  		<td class="col-1" id="commentcreated-<?= $comment->id; ?>"><?= ($comment->created_at); ?></td>
  		<td class="col-1" id="commentupdated-<?= $comment->id; ?>"><?= ($comment->updated_at == $comment->created_at) ? '-' : $comment->updated_at; ?></td>
  		<td class="col-1 text-center">
       	<div id="newsdelete-<?= $comment->id; ?>" class="d-inline">
      		<a class="me-2 link-offset-2 link-underline link-underline-opacity-0" onclick="return confirmation();" href="<?= base_url('admin/comments?del=' . $comment->id); ?>" data-bs-toggle="tooltip" data-bs-title="<?= lang('Comment.delete'); ?>">
      			<i class="fa-solid fa-trash-xmark cursor-pointer text-danger"></i>
      		</a>
      	</div>
  		</td>
  	</tr>
  	<?php endforeach; ?>
  </tbody>
</table>
<div class="ms-2 me-2"><?= $paginate->links(); ?></div>
   <?php endif; ?>
</div>
