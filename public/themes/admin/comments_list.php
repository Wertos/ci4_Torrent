<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
   <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
	   <div class="fs-4 text-secondary fw-bolder"><?= lang('Comment.comments'); ?></div>
     <div class="text-secondary lead fw-normal" id="curr_date_time"></div>
   </div>
<hr />
	<div class="col-lg-12">
	   <?php if ($no_comments) : ?>
		   <?= lang('Comment.no_comment'); ?>
	   <?php else : ?>
 <table class="table table-sm table-hover align-middle">
  <thead>
    <tr>
    	<td colspan="4" scope="col" class="col-4 pb-3">
            <?= lang('Comment.sort'); ?>
	        <select id="sort" name="sort" class="ms-2">
		        <?php foreach (lang('Comment.sortfields') as $sortkey => $sortfield) : ?>
				<option <?= ($sort == $sortkey) ? ' selected ' : ''; ?> value="<?= $sortkey; ?>"><?= $sortfield; ?></option>
    		    <?php endforeach; ?>
            </select>
        </td>
    	<td colspan="8" scope="col" class="col-4">
        </td>
    </tr>
    <tr>
      <th scope="col" class="col-1"><?= lang('Comment.id'); ?></th>
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
  		<td class="col-1" id="commentid-<?= $comment->id; ?>"><?= $comment->id; ?></td>
  		<td class="col-1" id="commentauthor-<?= $comment->id; ?>">
            <a class="me-2" data-bs-toggle="tooltip" data-bs-title="<?= lang('Comment.by_author'); ?>" href="<?= base_url('admin/comments/user_id/' . $comment->user_id); ?>"><i class="text-secondary-emphasis fa-solid fa-magnifying-glass"></i></a>
  			<a target="blank" data-bs-toggle="tooltip" data-bs-title="<?= lang('Comment.author'); ?>" href="<?= base_url('user/profile/' . $comment->user_id); ?>"><?= $comment->username; ?></a>
  		</td>
  		<td class="col-6" id="commenttext-<?= $comment->id; ?>">
  			<div class="text-break news-text" style="overflow:auto; max-height:200px;">
  				<?= $bbcode->parse(parse_smileys($comment->text, '/uploads/smileys/')); ?>
  			</div>
  		</td>
  		<td class="col-1" id="commentmaterial-<?= $comment->id; ?>">
  			<a class="me-2" data-bs-toggle="tooltip" data-bs-title="<?= lang('Comment.by_material'); ?>" href="<?= base_url('admin/comments/torrent/' . $comment->fid); ?>">
  				<i class="text-secondary-emphasis fa-solid fa-magnifying-glass"></i>
  			</a>
  			<a target="_blank" data-bs-toggle="tooltip" data-bs-title="<?= $comment->tname; ?>" href="<?= base_url($comment->location . '/' . $comment->tid . '-' . $comment->turl); ?>">
  				<?= word_limiter($comment->tname, 4, '&#8230;'); ?>
  			</a>
  		</td>
  		<td class="col-1" id="commentcreated-<?= $comment->id; ?>"><?= ($comment->created_at); ?></td>
  		<td class="col-1" id="commentupdated-<?= $comment->id; ?>"><?= ($comment->updated_at == $comment->created_at) ? '-' : $comment->updated_at; ?></td>
  		<td class="col-1 text-center">
       	<div id="newsdelete-<?= $comment->id; ?>" class="d-inline">
      		<a class="me-2 link-offset-2 link-underline link-underline-opacity-0" onclick="return confirmation();" href="<?= base_url('admin/comments/del/' . $comment->id); ?>" data-bs-toggle="tooltip" data-bs-title="<?= lang('Comment.delete'); ?>">
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
