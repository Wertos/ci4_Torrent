<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
<?php echo smiley_js(); ?>
<script>
	CI4.smilies = `<?= $smilies; ?>`;
</script>

 <div class="card card-default">
 	<div class="card-header py-3">
	 	<h6 class=""><?= lang('Torrent.addTorrent'); ?></h6>
		<div class="bg-info p-3">
			<?= lang('Torrent.alert'); ?>
			<?php
			  foreach (setting('Torrent.legalAnnouncer') as $ann)
			  {
			  		echo "<p class='m-0 p-0 small fw-bold'>" . $ann . "</p>";
			  }
			?>
		</div>
	</div>
	<div class="card-body">
		<?= form_open_multipart('torrent/add', ['id' => 'torrent']); ?>
    	<?= csrf_field() ?>
  	  <!-- Torrent File -->
	    <div class="mb-4">
	    	<label for="floatingFileInput"><?= lang('Torrent.file') ?></label>
			<input type="file" class="form-control form-control-lg" id="floatingFileInput" name="torrentfile" accept=".torrent" required />
			</div>
			<!-- torrent Name -->
		<div class="form-floating mb-4">
			<input type="text" class="form-control" id="floatingTitleInput" name="name" inputmode="text" placeholder="<?= lang('Torrent.title') ?>" required />
			<label for="floatingTitleInput"><?= lang('Torrent.title') ?></label>
    		<small class="small ms-1 d-block"><?= lang('Torrent.titledesc', ['255']); ?></small>
    		<small class="small ms-1 d-block"><?= lang('Torrent.titleexample'); ?></small>
    	</div>
  	  <!-- Torrent Poster -->
  	  <?php if (setting('Torrent.uploadPoster')) : ?>
	    <div class="input-group mb-4 input-group-lg" id="posterUpload">
				<input type="file" class="form-control" id="floatingPosterInput" accept="image/*" name="poster" <?= $posterRequired; ?> />
				<button class="btn btn-outline-success progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" type="button" id="uploadposter"><?= lang('Torrent.uploadposter'); ?></button>
    		<p class="small p-1"></p>
    		<input type="hidden" name="poster" value="">
  	  </div>
  	  <?php else : ?>
	    <div class="form-floating mb-4">
				<input type="url" class="form-control" id="floatingPosterInput" name="poster" inputmode="url" placeholder="<?= lang('Torrent.poster') ?>" <?= $posterRequired; ?> />
    	  <label for="floatingPosterInput"><?= lang('Torrent.poster') ?></label>
    		<small class="small ms-1 d-block"><?= lang('Torrent.posterdesc'); ?></small>
  	  </div>
  	  <?php endif;?>
  	  <!-- Torrent Description -->
	    <div class="mb-4">
    	  <label for="floatingDescInput"><?= lang('Torrent.description') ?></label>
    		<textarea data-editor name="descr" class="form-control" id="floatingDescInput" rows="3" style="height: 300px;" required /></textarea>
  	  </div>
  	  <!-- Torrent Category -->
	    <div class="mb-4">
				<select name="category" class="form-select" aria-label="<?= lang('Torrent.category'); ?>" required />
				  <option selected disabled><?= lang('Torrent.category'); ?></option>
				<?php foreach ($cats as $cat) :?>
					<option value="<?= $cat->id; ?>"><?= $cat->name; ?></option>				
				<?php endforeach; ?>
				</select>
  	  </div>
			<hr />
			<div class="form-check form-switch">
			  <input name="can_comment" class="form-check-input" type="checkbox" id="flexSwitchCanComment" checked />
			  <label class="form-check-label" for="flexSwitchCanComment"><?= lang('Torrent.canComment'); ?></label>
			</div>		  
    <div class="card-footer text-muted">
		  <div class="col-12 col-md-8 mx-auto m-3 text-center">
  			<button type="submit" class="btn btn-primary btn-block"><i class="bi bi-plus-circle me-1"></i><?= lang('Torrent.addsend') ?></button>
  	  </div>
  	</div>
   </div>
    <?= form_close(); ?>
	</div>
