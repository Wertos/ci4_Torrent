<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
   <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
	   <div class="fs-4 text-secondary fw-bolder"><?= lang('News.editnews'); ?></div>
     <div class="text-secondary lead fw-normal" id="curr_date_time"></div>
   </div>
<hr />
	<div class="container-fluid p-3 p-md-4 d-flex justify-content-center">
	<div class="col-11 mb-4">
		<?= form_open('admin/news/edit/' . $news->id, ['id' => 'formnews']); ?>
  	  <!-- news title -->
			<div class="form-floating mb-2">
				<input value="<?= $news->title; ?>" maxlength="499" type="text" class="form-control" id="floatingTitleInput" name="title" inputmode="none" autocomplete="title" placeholder="<?= lang('News.title') ?>" required />
   	  	<label for="floatingTitleInput"><i class="fa-solid fa-list me-2"></i><?= lang('News.title') ?></label>
    	</div>
  	  <!-- news text -->
	    <div class="mb-4">
    	  <label for="floatingTextInput">
    	  	<?= lang('News.text') ?>
    	  	<p class="small alert alert-danger fs-6 p-1 mb-2 fw-bold"><?= lang('News.textdesr'); ?></p>
    	  </label>
    		<textarea name="text" maxlength="9999" class="form-control" id="floatingTextInput" rows="3" style="width: 100%; height: 300px;" required /><?= $news->text; ?></textarea>
  	  </div>
			<div class="form-check form-switch">
			  <input <?= ($news->can_comment) ? ' checked ' : ''; ?> name="can_comment" class="form-check-input" type="checkbox" id="flexSwitchCanComment"/>
			  <label class="form-check-label" for="flexSwitchCanComment"><?= lang('News.cancomment'); ?></label>
			</div>		  
		  <div class="d-grid col-12 col-md-8 mx-auto m-3">
  			<button id="submit" type="submit" class="btn btn-primary btn-block"><i class="fa-solid fa-square-check me-2"></i><?= lang('News.edit') ?></button>
  	  </div>
    <?= form_close(); ?>
	</div>
	</div>
<script type="text/javascript" src="/themes/admin/js/nicedit/nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { 
			new nicEditor({
					fullPanel : true,
					iconsPath : '/themes/admin/js/nicedit/nicEditorIcons.gif',
					maxHeight : 500,
			}).panelInstance('floatingTextInput');
			nicEditors.findEditor('floatingTextInput').saveContent();

			$('#formnews').on('submit', function () {
					text = $('#floatingTextInput').val();
					if(text.length > 9999) {
							newval = text.substring(0, 9999);
							$('#floatingTextInput').val(newval);
					}
			
			});
	});
</script>