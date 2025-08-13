<?php

use CodeIgniter\CodeIgniter;


		function getDataTorrStatus(?int $status = null, string $texSizeClass = 'fs-6')
		{
		   	$data = [];
		   	switch ($status) {
	   		case 0:
		   		  $data['icon'] = '<i class="text-warning bi bi-exclamation-circle '.$texSizeClass.'"></i>';
		   		  $data['class'] = 'border-warning';
	   		  	$data['title'] = 'title="'.lang('Torrent.status_name.not_approved').'"';
	   			break;
	   		case 1:
	  	 		  $data['icon'] = '<i class="text-success bi bi-check2-all '.$texSizeClass.'"></i>';
	   			  $data['class'] = 'border-success';
	   		  	$data['title'] = 'title="'.lang('Torrent.status_name.approved').'"';
	   			break;
	   		case 2:
	   			  $data['icon'] = '<i class="text-danger bi bi-door-closed '.$texSizeClass.'"></i>';
	   		 		$data['class'] = 'border-danger';
	   		  	$data['title'] = 'title="'.lang('Torrent.status_name.closed').'"';
	   			break;
	   		case 3:
		   		  $data['icon'] = '<i class="text-primary bi bi-copy '.$texSizeClass.'"></i>';
		   		  $data['class'] = 'border-primary';
	   		  	$data['title'] = 'title="'.lang('Torrent.status_name.consumed').'"';
	   			break;
	   		case 4:
	  	 		  $data['icon'] = '<i class="text-secondary bi bi-lock '.$texSizeClass.'"></i>';
	   			  $data['class'] = 'border-dark';
	   		  	$data['title'] = 'title="'.lang('Torrent.status_name.dup').'"';
	   			break;
	   		case 5:
	   			  $data['icon'] = '<i class="text-info bi bi-pencil '.$texSizeClass.'"></i>';
	   		  	$data['class'] = 'border-info';
	   		  	$data['title'] = 'title="'.lang('Torrent.status_name.need_edit').'"';
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

    function getStrTorrVersion (?int $version = null): string
    {
		   	switch ($version) {
 					case 1:
			   		  $ver = 'v<b class="text-primary">1</b>';
		   			break;
 					case 2:
			   		  $ver = 'v<b class="text-success">2</b>';
		   			break;
 					case 3:
			   		  $ver = 'v<b class="text-danger">G</b>';
		   			break;
      		default: 
							$ver = '';
        }
        return $ver;
    }

?>

