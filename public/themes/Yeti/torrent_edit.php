<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
<?php echo smiley_js(); ?>
<script>
	CI4.smilies = `<?= $smilies; ?>`;
</script>
 <div class="card panel-default">
 	<h6 class="card-header py-3"><?= lang('Torrent.editTorrent'); ?></h6>
	<div class="card-body">
		<?= form_open_multipart('torrent/edit/' . $details->id); ?>
    	<?= csrf_field() ?>
			<!-- torrent Name -->
  	  <div class="form-floating mb-4">
				<input value="<?= $details->name; ?>" type="text" class="form-control" id="floatingTitleInput" name="name" inputmode="text" placeholder="<?= lang('Torrent.title') ?>" required />
				<label for="floatingTitleInput"><?= lang('Torrent.title') ?></label>
    		<small class="small ms-1 d-block"><?= lang('Torrent.titledesc', ['255']); ?></small>
    		<small class="small ms-1 d-block"><?= lang('Torrent.titleexample'); ?></small>
    	</div>
  	  <!-- Torrent Poster -->
	    <div class="form-floating mb-4">
				<input value="<?= $details->poster; ?>" type="url" class="form-control" id="floatingPosterInput" name="poster" inputmode="url" placeholder="<?= lang('Torrent.poster') ?>" <?= $posterRequired; ?> />
    	  <label for="floatingPasswordConfirmInput"><?= lang('Torrent.poster') ?></label>
    		<small class="small ms-1 d-block"><?= lang('Torrent.posterdesc'); ?></small>
  	  </div>
  	  <!-- Torrent Description -->
	    <div class="mb-4">
    	  <label for="floatingDescInput"><?= lang('Torrent.description') ?></label>
    		<textarea data-editor name="descr" class="form-control" id="floatingDescInput" rows="3" style="height: 300px;" required /><?= $details->descr; ?></textarea>
  	  </div>
  	  <!-- Torrent Category -->
	    <div class="mb-4">
				<select name="category" class="form-select" aria-label="<?= lang('Torrent.category'); ?>" required />
				  <option disabled><?= lang('Torrent.category'); ?></option>
				<?php foreach ($catlist as $cat) :?>
					<option <?= ($details->category == $cat->id) ? 'selected' : '' ; ?> value="<?= $cat->id; ?>"><?= $cat->name; ?></option>				
				<?php endforeach; ?>
				</select>
  	  </div>
			<hr />
			<div class="form-check form-switch">
			  <input <?= ($details->can_comment == 1) ? 'checked' : '' ; ?> name="can_comment" class="form-check-input" type="checkbox" id="flexSwitchCanComment" />
			  <label class="form-check-label" for="flexSwitchCanComment"><?= lang('Torrent.canComment'); ?></label>
			</div>		  
    <div class="card-footer text-muted">
		  <div class="col-12 mx-auto m-3 text-center">
  			<button type="submit" class="btn btn-primary"><i class="bi bi-pencil-square me-1"></i><?= lang('Torrent.editsend') ?></button>
  			<button type="button" class="btn btn-danger" onclick="history.back();return false;"><i class="bi bi-x-circle me-1"></i><?= lang('Torrent.editcancel') ?></button>
  	  </div>
  	</div>
   </div>
    <?= form_close(); ?>
	</div>
