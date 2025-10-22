<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
<?php if ($comments) : ?>
<div class="card mt-4 border-primary">
	<div class="card-header">
		<h6 class="mb-0"><?= lang('Comment.comments') ?></h6>
	</div>
	<div class="card-body">
	<ul class="list-group list-group-flush">
  <?php foreach ($comments as $comment) : ?>
  	<li class="list-group-item" id="comment-<?= $comment->id; ?>">
  	 	<div class="row">
  	 	<div class="col-1 avatar">
				<?= avatar($comment->avatar, 50); ?>
			</div>
  		<div class="col-11" onmouseover="$(this).find('span.showhide').removeClass('d-none');" onmouseout="$(this).find('span.showhide').addClass('d-none');">
  			<p class="mb-1">
  				<i class="bi bi-person"></i>
  				<a class="clickable fw-bold text-primary" href="<?= base_url('user/profile/' . $comment->user_id); ?>"><?= $comment->username; ?></a>
  				<span style="font-size:10px;" class="small"><?= $comment->created_at; ?></span>
  				<span class="float-end d-none showhide">
  				<?php if ($canCommentEdit && ($userdata->id = $comment->user_id)) : ?>
  					<button class="btn btn-outline-primary btn-xs" onclick="CI4.EditComment(<?= $comment->id; ?>, <?= $comment->fid; ?>); return false;"><i title="<?= lang('Comment.edit'); ?>" class="bi bi-pen"></i></button>
  				<?php	endif; ?>
  				<?php if ($userdata->logged_in) : ?>
  					<button class="btn btn-outline-primary btn-xs" onclick="CI4.QuoteComment(<?= $comment->id; ?>, '<?= $comment->username; ?>'); return false;"><i title="<?= lang('Comment.quote'); ?>" class="bi bi-chat-square-quote"></i></button>
  				<?php	endif; ?>
  				<?php if ($canCommentDelete && ($userdata->id = $comment->user_id)) : ?>
  					<button class="btn btn-outline-danger btn-xs" onclick="CI4.DelComment(<?= $comment->id; ?>); return false;"><i title="<?= lang('Comment.delete'); ?>" class="bi bi-trash"></i></button>
  				<?php	endif; ?>
  				<?php if ($userdata->logged_in) : ?>
  					<button class="btn btn-outline-danger btn-xs" onclick="CI4.AddReport(<?= $comment->id; ?>, 'comments'); return false;"><i title="<?= lang('Comment.report'); ?>" class="bi bi-flag"></i></button>
  				<?php	endif; ?>
  				</span>
  			</p>
	  		<div class="mt-1 commentText" id="commentText-<?= $comment->id; ?>">
	  			<?= $bbcode->parse(parse_smileys($comment->text, '/uploads/smileys/')); ?>
	  		</div>
	  	</div>
	  	</div>
  	</li>
  <?php endforeach; ?>
  </ul>                                                   
  </div>
  <div class="card-footer text-center">
			<?= $paginate->links(); ?>
  </div>
</div>
<?php endif; ?>