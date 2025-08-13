<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
   <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
	   <div class="fs-4 text-secondary fw-bolder"><?= lang('Admin.reports'); ?></div>
     <div class="text-secondary lead fw-normal" id="curr_date_time"></div>
   </div>
<hr />
	<div class="col-lg-12">
	<div class="ms-2 me-2 mb-4">
		<a class="border-start border-secondary border-3 me-3 ps-2 d-inline" href="<?= base_url('admin/reports'); ?>"><?= lang('Report.all'); ?></a>
		<a class="border-start border-danger border-3 me-3 ps-2 d-inline" href="<?= base_url('admin/reports?only=reaction'); ?>"><?= lang('Report.onlyreaction'); ?></a>
		<a class="border-start border-success border-3 me-3 ps-2 d-inline" href="<?= base_url('admin/reports?only=opened'); ?>"><?= lang('Report.onlyopened'); ?></a>
	</div>
	   <?php 
	   	if (!$reportList) :
	   ?>
	   <?= lang('Report.noreport'); ?>
	   <?php
	   	endif;
	    if ($reportList) :
	   ?>
	<table class="table table-sm table-hover align-middle">
  <thead>
    <tr>
      <th scope="col"><?= lang('Report.id'); ?></th>
      <th scope="col"><?= lang('Report.comment'); ?></th>
      <th scope="col"><?= lang('Report.created_at'); ?></th>
      <th scope="col"><?= lang('Report.sender'); ?></th>
      <th scope="col"><?= lang('Report.modded_by'); ?></th>
      <th scope="col"><?= lang('Report.location'); ?></th>
      <th scope="col"><?= lang('Report.ip'); ?></th>
      <th scope="col"><?= lang('Report.manage'); ?></th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($reportList as $report) { ?>
  	<tr class="<?= ($report->modded_by == 0) ? '' : 'text-muted'; ?>" id="rowid-<?= $report->id; ?>">
  		<td id="reportid-<?= $report->id; ?>"><span class="border-start <?= ($report->modded_by == 0) ? 'border-danger' : 'border-success text-muted'; ?> border-3 ps-1"><a href="#<?= $report->id; ?>"><?= $report->id; ?></a></span></td>
  		<td id="reportcomment-<?= $report->id; ?>"><?= $report->comment; ?>
  		<td data-bs-title="<?= $report->created_at; ?>" data-bs-toggle="tooltip" id="reporturl-<?= $report->id; ?>"><?= toDate($report->created_at); ?></td>
  		<td id="reportsender-<?= $report->id; ?>"><a targer="_blank" href="<?= base_url('user/profile/'.$report->sender); ?>"><?= $report->user_sender; ?></a></td>
  		<td id="reportmodded-<?= $report->id; ?>">
  			<?= ($report->modded_by > 0) ? '<a targer="_blank" href="'.base_url('user/profile/'.$report->sender).'">'.$report->user_sender.'</a>' : '-'; ?>
  		</td>
  		<td id="reportlocation-<?= $report->id; ?>"><?= ($report->location == 'torrents') ? '<a href="' . base_url('torrent/'.$report->fid) . '" target="_blank">'.lang('Report.location_torrents') . '</a>' : '<a href="' .  base_url('admin/comments/#'.$report->fid) . '" >' . lang('Report.location_comments') . '</a>'; ?></td>
  		<td id="reportip-<?= $report->id; ?>"><?= $report->ip; ?></td>
  		<td class="text-center">
      	<div id="reportdelete-<?= $report->id; ?>" class="d-inline">
      		<a class="me-2 link-offset-2 link-underline link-underline-opacity-0" href="<?= base_url('admin/reports/del/'.$report->id); ?>" data-bs-toggle="tooltip" data-bs-title="<?= lang('Report.delete'); ?>">
      			<i class="fa-solid fa-trash-xmark text-danger cursor-pointer"></i>
      		</a>
      	</div>
				<div id="reportreaction-<?= $report->id; ?>" class="d-inline">
					<?php if($report->modded_by == 0) : ?>
					<a class="me-2 link-offset-2 link-underline link-underline-opacity-0" href="<?= base_url('admin/reports/reaction/'.$report->id); ?>" data-bs-toggle="tooltip" data-bs-title="<?= lang('Report.reaction'); ?>">
						<i class="fa-solid fa-child text-primary cursor-pointer"></i>
					</a>
					<?php else : ?>
					<spn class="me-2 link-offset-2 link-underline link-underline-opacity-0" data-bs-toggle="tooltip" data-bs-title="<?= lang('Report.reviewed'); ?>">
						<i class="fa-solid fa-child-reaching text-muted cursor-pointer"></i>
					</span>
					<?php endif; ?>
				</div>
  		</td>
  	</tr>
  	<?php } ?>
  </tbody>
	</table>
	<div class="ms-2 me-2"><?= $pager_links; ?></div>
	   <?php
	   	endif;
	   ?>
	</div>
