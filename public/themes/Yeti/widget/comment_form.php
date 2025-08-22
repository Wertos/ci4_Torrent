<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
<?= form_open('/comment/add/'.$details->id, '', ['tid' => $details->id]); ?>
<?php echo smiley_js(); ?>
<div class="card mt-4 border-primary" id="commentForm">
	<div class="card-header">
		<h6 class="mb-0"><?= lang('Comment.add') ?></h6>
	</div>
	<div class="card-body">
	    <div class="mb-4">
    	  <label for="floatingTextInput"><?= lang('Comment.text') ?></label>
    		<textarea data-editor autocorrect="on" spellcheck="true" name="text" class="form-control" id="floatingTextInput" rows="3" style="height: 50px; resize: none;" required /></textarea>
  	  </div>
  </div>
  <div class="card-footer text-center">
  	<button type="submit" id="commentSubmit" class="btn btn-primary btn-sm"><i class="bi bi-chat-dots me-1"></i><?= lang('Comment.send') ?></button>
  </div>
<script>
	CI4.smilies = `<?= $smilies; ?>`;
</script>
</div>
<?= form_close(); ?>
