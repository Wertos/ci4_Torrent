<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
<?php if ($moderate): ?>
<div class="alert alert-danger" style="padding: 5px !important;">
	<b class="fw-bold ps-1"><?= lang('Admin.modpanel'); ?></b>
	<div id="modpanel" class="m-1 p1">
		<a data-id="<?= $details->id; ?>" data-action="torstatus" data-status="0" class="<?= $details->modded == 0 ? 'unclickable disabled border-bottom border-3 border-dark' : '' ?> status p-1 text-warning" title="<?= lang('Torrent.status_name.not_approved'); ?>" href="javascript:void(0);"><i class="bi bi-exclamation-circle fs-6"></i></a>
		<a data-id="<?= $details->id; ?>" data-action="torstatus" data-status="1" class="<?= $details->modded == 1 ? 'unclickable disabled border-bottom border-3 border-dark' : '' ?> status p-1 text-success" title="<?= lang('Torrent.status_name.approved'); ?>" href="javascript:void(0);"><i class="bi bi-check2-all fs-6"></i></a>
		<a data-id="<?= $details->id; ?>" data-action="torstatus" data-status="2" class="<?= $details->modded == 2 ? 'unclickable disabled border-bottom border-3 border-dark' : '' ?> status p-1 text-danger" title="<?= lang('Torrent.status_name.closed'); ?>" href="javascript:void(0);"><i class="bi bi-door-closed fs-6"></i></a>
		<a data-id="<?= $details->id; ?>" data-action="torstatus" data-status="3" class="<?= $details->modded == 3 ? 'unclickable disabled border-bottom border-3 border-dark' : '' ?> status p-1 text-primary" title="<?= lang('Torrent.status_name.consumed'); ?>" href="javascript:void(0);"><i class="bi bi-copy fs-6"></i></a>
		<a data-id="<?= $details->id; ?>" data-action="torstatus" data-status="4" class="<?= $details->modded == 4 ? 'unclickable disabled border-bottom border-3 border-dark' : '' ?> status p-1 text-secondary" title="<?= lang('Torrent.status_name.dup'); ?>" href="javascript:void(0);"><i class="bi bi-lock fs-6"></i></a>
		<a data-id="<?= $details->id; ?>" data-action="torstatus" data-status="5" class="<?= $details->modded == 5 ? 'unclickable disabled border-bottom border-3 border-dark' : '' ?> status p-1 text-info" title="<?= lang('Torrent.status_name.need_edit'); ?>" href="javascript:void(0);"><i class="bi bi-pencil fs-6"></i></a>
		<span class="p-1 ms-2 me-2 text-dark fw-bold">|</span>
				<select id="category" class="w-25" aria-label="<?= lang('Torrent.category'); ?>" />
				<?php foreach ($cats as $cat) :?>
					<option <?= ($cat->id == $details->category) ? 'selected disabled' : ''; ?> value="<?= $cat->id; ?>"><?= $cat->name; ?></option>				
				<?php endforeach; ?>
				</select>
				<span onclick="CI4.TorrMove(<?= $details->id ?>, <?= $details->category; ?>); return false;" class="clickable" title="<?= lang('Torrent.moveTorrent'); ?>" id="catmove"><i class="bi bi-box-arrow-right text-primary ms-1 fs-6"></i></span>
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
        <h6 class="card-title mb-3 d-inline align-top">
            <?= $details->name ?>
        </h6>
        <?php if ($details->kp_rating !== NULL && setting('Torrent.kpRating') === TRUE) : ?>
        <hr class="clearfix w-100 p-0 mt-1 mb-1">
        <div class="w-50">
        	<div class="kpblock float-start bg-light ms-0 mt-1 mb-2 me-2 p-1 border border-3">
        		<div class="d-block" style="width:100px;">
        			<span class="kpname fs-7 d-block"><?= lang('Torrent.kp'); ?></span>
        			<span class="kprating"><?= $details->kp_rating; ?></span>
					<!-- -->/<!-- -->
        			<span class="kpof">10</span>
                    <span class="ms-1 kpvotes"><?= $details->kp_votes; ?></span>
        		</div>
        	</div>
        	<div class="imdbblock float-start bg-light ms-0 mt-1 mb-2 me-2 p-1 border border-3">
        		<div class="d-block" style="width:100px;">
        			<span class="imdbname fs-7 d-block"><?= lang('Torrent.imdb'); ?></span>
        			<span class="imdbrating"><?= $details->imdb_rating; ?></span>
        			<!-- -->/<!-- -->
        			<span class="imdbof">10</span>
                    <span class="ms-1 imdbvotes"><?= $details->imdb_votes; ?></span>
        		</div>
        	</div>
        </div>
        <?php endif; ?>
        <div id="status" class="p-2 border <?= $class; ?> border-5 position-absolute rounded-circle">
        	<div id="torrstatus">
        		<?= $icon; ?>
        	</div>
        </div>
        </h5>
        <hr class="clearfix w-100 p-0 mt-1 mb-4">
        <div class="position-relative">
        <div style="top:13px; left:-20px;" class="position-absolute translate-middle">
        	<a class="topic-author" title="<?= lang('Torrent.owner') . '<br />' . $details->username; ?>" href="<?= base_url('user/profile/' . $details->owner); ?>"><?= avatar($details->avatar, 70, 'img-rounded img-responsive border border-dark border-3'); ?></a>
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
                    <li title="<?= lang('Torrent.seeds'); ?>" class="list-inline-item"><i class="text-success bi bi-arrow-bar-up"></i> <span id="seed"><?= number_format($details->seed ?? 0); ?></span></li>
                    <li class="list-inline-item">|</li>
                    <li title="<?= lang('Torrent.leechers'); ?>" class="list-inline-item"><i class="text-danger bi bi-arrow-bar-down"></i> <span id="leech"><?= number_format($details->leech ?? 0); ?></span></li>
                    <li class="list-inline-item">|</li>
                    <li title="<?= lang('Torrent.completed'); ?>" class="list-inline-item"><i class="text-primary bi bi-download"></i> <span id="completed"><?= number_format($details->completed ?? 0); ?></span></li>
                    </span>
                    <li class="list-inline-item">|</li>
                    <li title="<?= lang('Torrent.views'); ?>" class="list-inline-item"><i class="bi bi-eye"></i> <?= number_format($details->views); ?></li>
                    <li class="list-inline-item">|</li>
                    <li title="<?= lang('Torrent.downloaded'); ?>" class="list-inline-item"><i class="bi bi-box-arrow-down"></i> <?= number_format($details->downloaded ?? 0); ?></li>
                    <?php if ($moderate): ?>
                    <li class="list-inline-item">|</li>
					<li title="<?= lang('Torrent.updateStats'); ?>" class="list-inline-item"><a href="javascript:void(0)" class="text-danger clickable" onclick="CI4.updatePeers('<?= $details->id ?>')" id="updatestats"><b><i class="bi bi-arrow-clockwise"></i></b></a></li>
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
            	<a id="category" data-catid="<?= $details->category; ?>" href="<?= base_url($details->caturl); ?>"><?= $details->catname; ?></a>
           		<small class="small d-block bg-warning-subtle p-1"><?= $details->catdesc; ?></small>
            </td>
        </tr>
        <tr>
            <td class="rowhead"><?= lang('Torrent.infohash'); ?></td>
            <td class="border-start">
            	<?php 
            	  switch ($details->version) {
            				case 1:
            						 echo lang('Torrent.torrentversion', ['<b class="text-primary">1</b><br />']) . lang('Torrent.infohash_v1') . $hash_v1;
            						 break;
            				case 2:		 
            						 echo lang('Torrent.torrentversion', ['<b class="text-success">2</b><br />']) . lang('Torrent.infohash_v2') . $hash_v2;
            						 break;
            				case 3:
            						 echo lang('Torrent.torrentversion', ['<b class="text-danger">Gibrid</b><br />']) . lang('Torrent.infohash_v2') . $hash_v2 . "<br />" . lang('Torrent.infohash_v1') . $hash_v1;
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
<!--<?= $torrComment; ?>
<?= $torrCreatedBy; ?>-->
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
