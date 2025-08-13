<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
<?php foreach ($catList as $cat): ?>
<?php if($cat->count == 0) continue; ?>
  <div class="col-xs-12 col-sm-4 col-lg-6 mb-4">
   <div class="card panel-default">
   <!-- Default panel contents -->
   	<div class="card-header"><?= anchor($cat->url, $cat->name,['class' => 'link-primary text-decoration-none']); ?>
				<span data-bs-original-title="<?= lang('Torrent.torInCat'); ?>" title="<?= lang('Torrent.torInCat'); ?>" class="badge bg-primary float-end"><?= $cat->count ?></span>
   			<small style="font-size:10px; display:block;"><?= $cat->desc; ?></small>
   	</div>
   	<div class="card-body  p-1 m-1">
   	<!-- List group -->
	  <?php if ($torList[$cat->id]) : ?>
    <div class="list-group list-group-flush" id="catid_<?php echo $cat->id; ?>">
			<?php foreach ($torList[$cat->id] as $torrent) : ?>
			<?php
			  $status = getDataTorrStatus($torrent->modded);
        $metadata = '
                <ul class="list-inline home_metadata p-0 m-0">
                  <li class="list-inline-item" title="' . lang('Torrent.created') . '"><i class="bi bi-calendar"></i> ' . toDate($torrent->created_at) . '</li>
                  <li class="list-inline-item" title="' . lang('Torrent.size') . '"><i class="bi bi-hdd"></i> ' . number_to_size($torrent->size) . '</li>
                  <li class="list-inline-item text-success" title="' . lang('Torrent.seeds') . '"><i class="bi bi-arrow-up"></i> ' . number_format($torrent->seed) . '</li>
                  <li class="list-inline-item text-danger" title="' . lang('Torrent.leechers') . '"><i class="bi bi-arrow-down"></i> ' . number_format($torrent->leech) . '</li>
                  <li class="list-inline-item" title="'.lang('Torrent.downloaded').' '.number_format($torrent->downloaded).'"><i class="bi bi-eye"></i> '.number_format($torrent->views).'</li>
                </ul>
      					<div ' . $status['title'] . ' class="border ' . $status['class'] . ' position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">' . $status['icon'] . ' '.getStrTorrVersion($torrent->version).'</div>
			';?>
      <?= anchor('torrent/' . $torrent->id . ($torrent->url ? '-' . $torrent->url : ''), 
         '<div class="poster-home float-start me-1 mt-1"><img data-html="true" title="<img width=\'100\' src=\''.$torrent->poster.'\' />" src="'.$torrent->poster.'" width="30" height="40" alt="" /></div><h6 class="p-0 m-0 text-truncate" title="'.$torrent->name.'">' . $torrent->name . '</h6>' . $metadata, array('class' => 'mb-0 p-1 list-group-item', 'id' => 'torrent-'.$torrent->id)) ?>
			<?php endforeach; ?>
    </div>
		<?php endif; ?>
		</div>
    <div class="card-footer text-muted">
			<div class="btn-toolbar float-end">
			  <div class="btn-group me-2" id="ajaxpag-<?= $cat->id; ?>" data-type="ajaxpag" data-offset="0">
		    	<button onclick="CI4.AjaxPag(<?= $cat->id; ?>, 'backward'); return false;" id="backward-<?= $cat->id; ?>" type="button" class="btn-outline-primary btn btn-secondary btn-sm" disabled><i class="bi bi-chevron-double-left"></i></button>
    			<button onclick="CI4.AjaxPag(<?= $cat->id; ?>, 'forward'); return false;" id="forward-<?= $cat->id; ?>" type="button" class="btn-outline-primary btn btn-secondary btn-sm" <?= ($cat->count > setting('Torrent.torrentsPerCatOnIndex')) ? '' : 'disabled'; ?>><i class="bi bi-chevron-double-right"></i></button>
		  	</div>
			</div>    	
  	</div>
   </div>
  </div>
<?php endforeach; ?>
</div>
