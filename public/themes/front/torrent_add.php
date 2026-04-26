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
		<div data-bs-spy="scroll" data-bs-smooth-scroll="true" style="display:none;" id="prevContent" class="border border-primary alert alert-dismissible alert-light" role="alert">
			<button type="button" class="btn-close" onClick="$('#prevContent').css('display', 'none'); return false;" ></button>
			<div class="clearfix w-100"></div>
			<div id="prevHtml" class="w-100"></div>
			<div class="clearfix w-100"></div>
		</div>
		<?= form_open_multipart('torrent/add', ['id' => 'torrent']); ?>
  	  <!-- Torrent Category -->
		<div class="mb-4">
			<select name="category" class="form-select" aria-label="<?= lang('Torrent.category'); ?>" required />
				<option selected disabled><?= lang('Torrent.category'); ?></option>
				<?php foreach ($cats as $cat) :?>
					<option value="<?= $cat->id; ?>"><?= $cat->name; ?></option>				
				<?php endforeach; ?>
			</select>
		</div>
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
		<ul class="nav nav-pills" id="posterTab" role="tablist">
			<li class="nav-item">
				<button class="nav-link active" id="urlPoster-tab" data-bs-toggle="tab" data-bs-target="#urlPoster" type="button" role="tab" aria-controls="urlPoster" aria-selected="true"><?= lang('Torrent.uploadFromUrl'); ?></button>
			</li>
			<li class="nav-item">
				<button class="nav-link" id="filePoster-tab" data-bs-toggle="tab" data-bs-target="#filePoster" type="button" role="tab" aria-controls="filePoster" aria-selected="false"><?= lang('Torrent.uploadFromFile'); ?></button>
			</li>
		</ul>
		<div class="tab-content mb-4" id="posterTabs">
			<div class="tab-pane active pb-2 pt-2" id="urlPoster" role="tabpanel" aria-labelledby="urlPoster-tab">
				<div class="input-group input-group-lg">
					<input type="url" class="form-control" id="urlPosterInput" inputmode="url" placeholder="<?= lang('Torrent.posterdesc') ?>" />
					<button class="progress-bar progress-bar-striped bg-success btn btn-outline-success" role="progressbar" type="button" id="uploadurlposter"><?= lang('Torrent.uploadposter'); ?></button>
				</div>
			</div>
			<div class="tab-pane pb-2 pt-2" id="filePoster" role="tabpanel" aria-labelledby="filePoster-tab">
				<div class="input-group input-group-lg" id="posterUpload">
					<input type="file" class="form-control" id="filePosterInput" accept="image/*" name="poster" <?= $posterRequired; ?> />
					<button class="progress-bar progress-bar-striped bg-success btn btn-outline-success" role="progressbar" type="button" id="uploadposter"><?= lang('Torrent.uploadposter'); ?></button>
				</div>
			</div>
		</div>
		<p id="posterPrewiev" class="small p-1"></p>
		<input <?= $posterRequired; ?> type="hidden" id="posterInput" name="poster" value="" />
		<?php else : ?>
	    <div class="form-floating mb-4">
			<input type="url" class="form-control" id="floatingPosterInput" name="poster" inputmode="url" placeholder="<?= lang('Torrent.poster') ?>" <?= $posterRequired; ?> />
			<label for="floatingPosterInput"><?= lang('Torrent.posterdesc'); ?></label>
		</div>
		<?php endif;?>

  	  <!-- Torrent Description -->
	    <div class="mb-4">
    	  <label for="floatingDescInput"><?= lang('Torrent.description') ?></label>
		  <?php include "widget/bbcode.php"; ?>
 		  <textarea data-editor name="descr" class="form-control" id="floatingDescInput" rows="3" style="height: 300px;" required /></textarea>
          <fieldset class="border rounded-3 mt-2">
		  <legend class="float-none w-auto px-1 small ms-2"><?= lang('Torrent.templates'); ?></legend>
       	  <div class="btn-group ms-2 mb-2">
	       	  <button class="btn btn-primary btn-xs" onclick="insertTemplate('video', 'floatingDescInput'); return false;"><i class="bi bi-film me-1"></i><?= lang('Torrent.template.video'); ?></button>
	       	  <button class="btn btn-primary btn-xs" onclick="insertTemplate('music', 'floatingDescInput'); return false;"><i class="bi bi-cassette me-1"></i><?= lang('Torrent.template.music'); ?></button>
	       	  <button class="btn btn-primary btn-xs" onclick="insertTemplate('book', 'floatingDescInput'); return false;"><i class="bi bi-book me-1"></i><?= lang('Torrent.template.book'); ?></button>
	       	  <button class="btn btn-primary btn-xs" onclick="insertTemplate('game', 'floatingDescInput'); return false;"><i class="bi bi-controller me-1"></i><?= lang('Torrent.template.game'); ?></button>
	       	  <button class="btn btn-primary btn-xs" onclick="insertTemplate('soft', 'floatingDescInput'); return false;"><i class="bi bi-tux me-1"></i><?= lang('Torrent.template.soft'); ?></button>
		  </div>
          </fieldset>
  	    </div>
			<hr />
			<div class="form-check form-switch">
			  <input name="can_comment" class="form-check-input" type="checkbox" id="flexSwitchCanComment" checked />
			  <label class="form-check-label" for="flexSwitchCanComment"><?= lang('Torrent.canComment'); ?></label>
			</div>		  
		<div class="card-footer text-muted">
			<div class="col-12 col-md-8 mx-auto m-3 text-center">
  				<button type="submit" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i><?= lang('Torrent.addsend') ?></button>
				<button type="button" href="#prevContent" id="TorPreview" class="btn btn-success"><i class="bi bi-binoculars me-1"></i><?= lang('Torrent.preview') ?></button>
			</div>
		</div>
   </div>
    <?= form_close(); ?>
	</div>
