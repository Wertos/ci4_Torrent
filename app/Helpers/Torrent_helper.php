<?php

use CodeIgniter\CodeIgniter;


		function getDataTorrStatus(?int $status = null, string $texSizeClass = 'fs-6')
		{
		   	$data = [];
		   	switch ($status) {
	   		case 0:
		   		  $data['icon'] = '<i title="' . lang('Torrent.status_name.not_approved') . '" class="text-warning bi bi-exclamation-circle '.$texSizeClass.'"></i>';
		   		  $data['class'] = 'border-warning';
	   		  	$data['title'] = lang('Torrent.status_name.not_approved');
	   			break;
	   		case 1:
	  	 		  $data['icon'] = '<i title="' . lang('Torrent.status_name.approved') . '" class="text-success bi bi-check2-all '.$texSizeClass.'"></i>';
	   			  $data['class'] = 'border-success';
	   		  	$data['title'] = lang('Torrent.status_name.approved');
	   			break;
	   		case 2:
	   			  $data['icon'] = '<i title="' . lang('Torrent.status_name.closed') . '" class="text-danger bi bi-door-closed '.$texSizeClass.'"></i>';
	   		 		$data['class'] = 'border-danger';
	   		  	$data['title'] = lang('Torrent.status_name.closed');
	   			break;
	   		case 3:
		   		  $data['icon'] = '<i title="' . lang('Torrent.status_name.consumed') . '" class="text-primary bi bi-copy '.$texSizeClass.'"></i>';
		   		  $data['class'] = 'border-primary';
	   		  	$data['title'] = lang('Torrent.status_name.consumed');
	   			break;
	   		case 4:
	  	 		  $data['icon'] = '<i title="' . lang('Torrent.status_name.dup') . '" class="text-secondary bi bi-lock '.$texSizeClass.'"></i>';
	   			  $data['class'] = 'border-dark';
	   		  	$data['title'] = lang('Torrent.status_name.dup');
	   			break;
	   		case 5:
	   			  $data['icon'] = '<i title="' . lang('Torrent.status_name.need_edit') . '" class="text-info bi bi-pencil '.$texSizeClass.'"></i>';
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
			   		  $ver = '<span title="' . lang('Torrent.torrentversion', [$version]). '" style="font-size: 11px !important;" class="font-monospace ' . $class . '">v<b class="text-primary">1</b></span>';
		   			break;
 					case 2:
			   		  $ver = '<span title="' . lang('Torrent.torrentversion', [$version]). '" style="font-size: 11px !important;" class="font-monospace ' . $class . '">v<b class="text-success">2</b></span>';
		   			break;
 					case 3:
			   		  $ver = '<span title="' . lang('Torrent.torrentversion', ['Gibrid']). '" style="font-size: 11px !important;" class="font-monospace ' . $class . '">v<b class="text-danger">G</b></span>';
		   			break;
      		default: 
							$ver = '';
        }
        return $ver;
    }

?>

