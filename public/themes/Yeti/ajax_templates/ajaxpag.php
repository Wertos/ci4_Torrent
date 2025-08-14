<?php foreach ($torList as $torrent) : ?>
<?php
  $status = getDataTorrStatus($torrent->modded);
  $metadata = '
                <ul class="list-inline home_metadata p-0 m-0">
                  <li class="list-inline-item" title="' . lang('Torrent.created') . '"><i class="bi bu-calendar"></i> ' . toDate($torrent->created_at) . '</li>
                  <li class="list-inline-item" title="' . lang('Torrent.size') . '"><i class="bi bi-hdd"></i> ' . number_to_size($torrent->size) . '</li>
                  <li class="list-inline-item text-success" title="' . lang('Torrent.seeds') . '"><i class="bi bi-arrow-up"></i> ' . number_format($torrent->seed) . '</li>
                  <li class="list-inline-item text-danger" title="' . lang('Torrent.leechers') . '"><i class="bi bi-arrow-down"></i> ' . number_format($torrent->leech) . '</li>
                  <li class="list-inline-item" title="'.lang('Torrent.downloaded').' '.number_format($torrent->downloaded).'"><i class="bi bi-eye"></i> '.number_format($torrent->views).'</li>
                </ul>
      					<div title="' . $status['title'] . '" class="border ' . $status['class'] . ' pt-1 pe-2 pb-1 ps-2 align-self-center position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">' . $status['icon'] . ' '.getStrTorrVersion($torrent->version).'</div>
	';?>
  <?= anchor('torrent/' . $torrent->id . ($torrent->url ? '-' . $torrent->url : ''), 
  '<div class="poster-home float-start me-1 mt-1"><img data-html="true" title="<img width=\'100\' src=\''.$torrent->poster.'\' />" src="'.$torrent->poster.'" width="30" height="40" alt="" /></div><h6 class="p-0 m-0 text-truncate" title="'.$torrent->name.'">' . $torrent->name . '</h6>' . $metadata, array('class' => 'mb-0 p-1 list-group-item', 'id' => 'torrent-'.$torrent->id)) ?>
<?php endforeach; ?>
