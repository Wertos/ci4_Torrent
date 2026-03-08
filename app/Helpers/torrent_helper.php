<?php

use CodeIgniter\CodeIgniter;

		function getStatus()
		{
		   	$data = [];
	   		$data[0] = [
				'icon' => '<i title="' . lang('Torrent.status_name.not_approved') . '" class="text-warning bi bi-exclamation-circle "></i>',
	   			'class' => 'border-warning',
   		  		'title' => lang('Torrent.status_name.not_approved')
            ];
  	 		$data[1] = [
				'icon' => '<i title="' . lang('Torrent.status_name.approved') . '" class="text-success bi bi-check2-all "></i>',
   				'class' => 'border-success',
   		  		'title' => lang('Torrent.status_name.approved')
            ];
   			$data[2] = [
				'icon' => '<i title="' . lang('Torrent.status_name.closed') . '" class="text-danger bi bi-door-closed "></i>',
   		 		'class' => 'border-danger',
   		  		'title' => lang('Torrent.status_name.closed')
			];
	   		$data[3] = [
				'icon' => '<i title="' . lang('Torrent.status_name.consumed') . '" class="text-primary bi bi-copy "></i>',
	   			'class' => 'border-primary',
   		  		'title' => lang('Torrent.status_name.consumed')
			];
  	 		$data[4] = [
				'icon' => '<i title="' . lang('Torrent.status_name.dup') . '" class="text-secondary bi bi-lock "></i>',
   				'class' => 'border-dark',
   		  		'title' => lang('Torrent.status_name.dup')
			];
			$data[5] = [
				'icon' => '<i title="' . lang('Torrent.status_name.need_edit') . '" class="text-info bi bi-pencil "></i>',
   		  		'class' => 'border-info',
   		  		'title' => lang('Torrent.status_name.need_edit')
			];
			return $data;
    }

		function getDataTorrStatus(?int $status = null, string $texSizeClass = 'fs-7')
		{
		   	$data = [];
		   	switch ($status) {
	   		case 0:
		   		$data['icon'] = '<i title="' . lang('Torrent.status_name.not_approved') . '" class="text-warning bi bi-exclamation-circle "></i>';
		   		$data['class'] = 'border-warning';
	   		  	$data['title'] = lang('Torrent.status_name.not_approved');
	   			break;
	   		case 1:
	  	 		$data['icon'] = '<i title="' . lang('Torrent.status_name.approved') . '" class="text-success bi bi-check2-all "></i>';
	   			$data['class'] = 'border-success';
	   		  	$data['title'] = lang('Torrent.status_name.approved');
	   			break;
	   		case 2:
	   			$data['icon'] = '<i title="' . lang('Torrent.status_name.closed') . '" class="text-danger bi bi-door-closed "></i>';
	   		 	$data['class'] = 'border-danger';
	   		  	$data['title'] = lang('Torrent.status_name.closed');
	   			break;
	   		case 3:
		   		$data['icon'] = '<i title="' . lang('Torrent.status_name.consumed') . '" class="text-primary bi bi-copy "></i>';
		   		$data['class'] = 'border-primary';
	   		  	$data['title'] = lang('Torrent.status_name.consumed');
	   			break;
	   		case 4:
	  	 		$data['icon'] = '<i title="' . lang('Torrent.status_name.dup') . '" class="text-secondary bi bi-lock "></i>';
	   			$data['class'] = 'border-dark';
	   		  	$data['title'] = lang('Torrent.status_name.dup');
	   			break;
	   		case 5:
				$data['icon'] = '<i title="' . lang('Torrent.status_name.need_edit') . '" class="text-info bi bi-pencil "></i>';
	   		  	$data['class'] = 'border-info';
	   		  	$data['title'] = lang('Torrent.status_name.need_edit');
	   			break;
      		default: 
	   			$data['icon'] = '';
	   		  	$data['class'] = '';
	   		  	$data['title'] = '';
				}
				return $data;
    }

    function toDate (string $timestr = '')
    {
				$time = \CodeIgniter\I18n\Time::parse($timestr, setting('App.appTimezone'));
				return $time->toDateString();
    }

    function getStrTorrVersion (?int $version = null, ?string $class = null): string
    {
		   	switch ($version) {
 					case 1:
			   		  $ver = '<span title="' . lang('Torrent.torrentversion', [$version]). '" style="" class="font-monospace fs-7' . $class . '">v<b class="text-primary">1</b></span>';
		   			break;
 					case 2:
			   		  $ver = '<span title="' . lang('Torrent.torrentversion', [$version]). '" style="" class="font-monospace fs-7' . $class . '">v<b class="text-success">2</b></span>';
		   			break;
 					case 3:
			   		  $ver = '<span title="' . lang('Torrent.torrentversion', ['Gibrid']). '" style="" class="font-monospace fs-7' . $class . '">v<b class="text-danger">G</b></span>';
		   			break;
      		default: 
							$ver = '';
        }
        return $ver;
    }

?>

