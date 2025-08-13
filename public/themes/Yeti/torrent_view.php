<?php if ($moderate): ?>
<div class="alert alert-danger" style="padding: 5px !important;">
	<b class="fw-bold ps-1">Панель модерирования</b>
	<div id="modpanel" class="m-1 p1">
		<a data-id="<?= $details->id; ?>" data-action="torstatus" data-status="approved" class="<?= $details->modded == 1 ? 'border-bottom border-3 border-dark' : '' ?> status p-1 text-success" title="<?= lang('Torrent.status_name.approved'); ?>" href="javascript:void(0);"><i class="bi bi-check2-all fs-6"></i></a>
		<a data-id="<?= $details->id; ?>" data-action="torstatus" data-status="not_approved" class="<?= $details->modded == 0 ? 'border-bottom border-3 border-dark' : '' ?> status p-1 text-warning" title="<?= lang('Torrent.status_name.not_approved'); ?>" href="javascript:void(0);"><i class="bi bi-exclamation-circle fs-6"></i></a>
		<a data-id="<?= $details->id; ?>" data-action="torstatus" data-status="closed" class="<?= $details->modded == 2 ? 'border-bottom border-3 border-dark' : '' ?> status p-1 text-danger" title="<?= lang('Torrent.status_name.closed'); ?>" href="javascript:void(0);"><i class="bi bi-door-closed fs-6"></i></a>
		<a data-id="<?= $details->id; ?>" data-action="torstatus" data-status="consumed" class="<?= $details->modded == 3 ? 'border-bottom border-3 border-dark' : '' ?> status p-1 text-primary" title="<?= lang('Torrent.status_name.consumed'); ?>" href="javascript:void(0);"><i class="bi bi-copy fs-6"></i></a>
		<a data-id="<?= $details->id; ?>" data-action="torstatus" data-status="dup" class="<?= $details->modded == 4 ? 'border-bottom border-3 border-dark' : '' ?> status p-1 text-secondary" title="<?= lang('Torrent.status_name.dup'); ?>" href="javascript:void(0);"><i class="bi bi-lock fs-6"></i></a>
		<a data-id="<?= $details->id; ?>" data-action="torstatus" data-status="need_edit" class="<?= $details->modded == 5 ? 'border-bottom border-3 border-dark' : '' ?> status p-1 text-info" title="<?= lang('Torrent.status_name.need_edit'); ?>" href="javascript:void(0);"><i class="bi bi-pencil fs-6"></i></a>
		<span class="p-1 ms-2 me-2 text-dark fw-bold">|</span>
				<select id="category" class="w-25" aria-label="<?= lang('Torrent.category'); ?>" />
				<?php foreach ($cats as $cat) :?>
					<option <?= ($cat->id == $details->category) ? 'selected' : ''; ?> value="<?= $cat->id; ?>"><?= $cat->name; ?></option>				
				<?php endforeach; ?>
				</select>
				<span onclick="CI4.TorrMove(<?= $details->id; ?>); return false;" class="clickable" title="<?= lang('Torrent.moveTorrent'); ?>" id="catmove"><i class="bi bi-box-arrow-right text-primary ms-1 fs-6"></i></span>
		<span class="p-1 ms-2 me-2 text-dark fw-bold">|</span>
		<a class="me-1 text-danger" onclick="return confirmation();" href="<?= base_url('torrent/delete/'.$details->id); ?>" title="<?= lang('Torrent.deleteTorrent'); ?>"><i class="bi bi-trash fs-6"></i></a>
	</div>
</div>
<?php endif; ?>            
<div class="card <?= ($details->rid == $details->id && $details->rmodded == 0) ? 'border-danger border-5' : ''; ?>">
    <div class="card-header">
        <?php if($details->rmodded == 0 && $details->rid) : ?>
	        <div style="top:-2px; left:10%;" class="position-absolute translate-middle badge rounded-pill bg-danger"><i class="bi bi-exclamation-circle"></i> <?= lang('Report.reported'); ?></div>
        <?php endif; ?>
        <h5 class="card-title mb-3 d-inline">
            <?php if ($can_edit): ?>
                    <a class="me-1" href="<?= base_url('torrent/edit/'.$details->id); ?>" title="<?= lang('Torrent.editTorrent'); ?>"><i class="bi bi-pen"></i></a>
            <?php endif; ?>
            <?php if ($userdata->logged_in): ?>
										<?php if($bookmark) : ?>
											<a class="me-1" href="<?= base_url('bookmark/'.$details->id); ?>" title="<?= lang('Bookmark.del'); ?>"><i class="bi bi-bookmark-fill text-primary"></i></a>
										<?php else : ?>
											<a class="me-1" href="<?= base_url('bookmark/'.$details->id); ?>" title="<?= lang('Bookmark.add'); ?>"><i class="bi bi-bookmark"></i></a>
										<?php endif; ?>
            <?php endif; ?>            
            <?php if ($can_delete): ?>
                    <a class="me-1 text-danger" onclick="return confirmation();" href="<?= base_url('torrent/delete/'.$details->id); ?>" title="<?= lang('Torrent.deleteTorrent'); ?>"><i class="bi bi-trash"></i></a>
            <?php endif; ?>            
        </h5>
        <h6 class="card-title mb-3 d-inline">
            <?= $details->name ?>
        </h6>
        <div id="status" class="p-2 border <?= $class; ?> border-5 position-absolute rounded-circle">
        	<div <?= $title; ?> id="torrstatus">
        		<?= $icon; ?>
        	</div>
        </div>
        </h5>
        <hr />
        <div class="position-relative">
        <div style="top:17px; left:-20px;" class="position-absolute translate-middle">
        	<a title="<?= lang('Torrent.owner') . '<br />' . $details->username; ?>" href="<?= base_url('user/profile/' . $details->owner); ?>"><?= avatar($details->avatar, 70); ?></a>
        </div>
        </div>
        <ul class="list-inline ms-4">
            <li title="<?= lang('Torrent.created'); ?>" class="list-inline-item"><i class="bi bi-calendar"></i> <?= $details->created_at ?></li>
            <li class="list-inline-item">|</li>
            <li title="<?= lang('Torrent.size'); ?>" class="list-inline-item"><i class="bi bi-hdd"></i> <?= number_to_size($details->size); ?></li>
            <li class="list-inline-item">|</li>
            <li class="list-inline-item">
                <ul class="list-inline" id="torrent_stats">
                    <span class="badge bg-secondary fs-6">
                    <li title="<?= lang('Torrent.seeds'); ?>" class="list-inline-item"><i class="text-success bi bi-arrow-bar-up"></i> <span id="seed"><?= $details->seed; ?></span></li>
                    <li class="list-inline-item">|</li>
                    <li title="<?= lang('Torrent.leechers'); ?>" class="list-inline-item"><i class="text-danger bi bi-arrow-bar-down"></i> <span id="leech"><?= $details->leech; ?></span></li>
                    <li class="list-inline-item">|</li>
                    <li title="<?= lang('Torrent.completed'); ?>" class="list-inline-item"><i class="text-primary bi bi-download"></i> <span id="completed"><?= $details->completed; ?></span></li>
                    </span>
                    <li class="list-inline-item">|</li>
                    <li title="<?= lang('Torrent.views'); ?>" class="list-inline-item"><i class="bi bi-eye"></i> <?= $details->views; ?></li>
                    <li class="list-inline-item">|</li>
                    <li title="<?= lang('Torrent.downloaded'); ?>" class="list-inline-item"><i class="bi bi-box-arrow-down"></i> <?= $details->downloaded; ?></li>
                    <?php if ($moderate): ?>
                    <li class="list-inline-item">|</li>
									  <li title="<?= lang('Torrent.updateStats'); ?>" class="list-inline-item"><a href="javascript:void(0)" class="text-danger clickable" onclick="CI4.updatePeers('<?= $details->id ?>')" id="updatestats"><i class="bi bi-arrow-clockwise"></i></a></li>
										<?php endif; ?>
                </ul>
            </li>
            <li class="float-end">
                <ul class="list-inline">
                    <?php if( $download ) : ?>
                    	<li title="<?= lang('Torrent.download'); ?>" class="list-inline-item"><a class="btn btn-success btn-sm" rel="nofollow" href="<?= base_url('torrent/dl/' . $details->id); ?>"><i class="bi bi-box-arrow-down"></i></a></li>
                    <?php endif; ?>
                    <?php if( $allowmagnet ) : ?>
                    	<li title="<?= lang('Torrent.magnet'); ?>" class="list-inline-item"><a class="btn btn-primary btn-sm" rel="nofollow" href="<?= $details->magnet; ?>"><i class="bi bi-magnet"></i></a></li>
                    <?php endif; ?>
                    <?php if( $allowreport ) : ?>
                      <li title="<?= lang('Torrent.report'); ?>" class="list-inline-item"><button class="btn btn-danger btn-sm" onclick="CI4.AddReport(<?= $details->id ?>, 'torrents')"><i class='bi bi-flag'></i></button></li>
                    <?php endif; ?>
                </ul> 
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="d-table mb-15 ms-3 p-1 float-end border border-1">
            <?= img($details->poster,'','style="max-width:250px;"') ?>
        </div>
        <?= $bbcode->parse($details->descr); ?>
    </div>
	<div class="card-footer p-1">
    <table class="table table-striped border table-sm mb-0">
        <tr>
            <td class="rowhead"><?= lang('Torrent.category'); ?></td>
            <td class="border-start">
            	<a href="<?= base_url($details->caturl); ?>"><?= $details->catname; ?></a>
           		<small class="small d-block bg-warning-subtle p-1"><?= $details->catdesc; ?></small>
            </td>
        </tr>
        <tr>
            <td class="rowhead"><?= lang('Torrent.infohash'); ?></td>
            <td class="border-start">
            	<?php 
            	  switch ($details->version) {
            				case 1:
            						 echo lang('Torrent.torrentversion', ['<b class="text-primary">1</b><br />']) . lang('Torrent.infohash_v1') . mb_strtoupper(bin2hex($details->infohash_v1));
            						 break;
            				case 2:		 
            						 echo lang('Torrent.torrentversion', ['<b class="text-success">2</b><br />']) . lang('Torrent.infohash_v2') . mb_strtoupper(bin2hex($details->infohash_v2));
            						 break;
            				case 3:
            						 echo lang('Torrent.torrentversion', ['<b class="text-danger">Gibrid</b><br />']) . lang('Torrent.infohash_v2') . mb_strtoupper(bin2hex($details->infohash_v2)) . "<br />" . lang('Torrent.infohash_v1') . strtoupper(bin2hex($details->infohash_v1));
            						 break;
            		}
            	?>
            </td>
        </tr>
        <?php if($allowFileList) : ?>
        <tr>
            <td class="rowhead"><?= lang('Torrent.files'); ?> (<?= $details->numfiles ?>)</td>
            <td class="border-start">
  						<a id="tor-fl-treecontrol" class="mb-1" data-bs-toggle="collapse" href="#collapseFileList" role="button" aria-expanded="false" aria-controls="collapseFileList">
						    <i class="bi bi-folder pe-1"></i><?= lang('Torrent.showfiles'); ?>
						  </a>            	
							<div class="collapse" id="collapseFileList">
							  <div id="tor-filelist" class="border border-dark card-body">
							  	<?= $filestree; ?>
							  </div>
							</div>
            </td>
        </tr>   
        <?php endif; ?>
        <tr>
            <td class="rowhead"><?= lang('Torrent.trackers'); ?></td>
            <td class="border-start">
  						<a id="" class="mb-1" data-bs-toggle="collapse" href="#collapseTrackers" role="button" aria-expanded="false" aria-controls="collapseTrackers">
						    <i class="bi bi-link pe-1"></i><?= lang('Torrent.showtorrents'); ?>
						  </a>            	
							<div class="collapse" id="collapseTrackers">
							  <div id="tor-trackers" class="border border-dark card-body">
							  <ul class="list-unstyled m-0">
							  <?php //var_dump($announceList); die('sdfvsdvsdv'); ?>
							  <?php foreach ($announceList as $announce) : ?>
							  	<li class="small"><i class="bi bi-link-45deg me-1"></i><?= $announce; ?><hr class="p-0 m-0"></li>
							  <?php endforeach; ?>
							  </ul>
							  </div>
							</div>
            </td>
        </tr>     
    </table>
	</div>
</div>
<?php 
  if (setting('Torrent.commenEnable')) :
	if($details->can_comment && $userdata->can_comment) :
?>
	<?php include "widget/comment_form.php"; ?>
<?php
	endif;
?>
<?php include "widget/comment_view.php"; ?>
<?php
	endif;
?>
