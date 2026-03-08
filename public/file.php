<?php


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mysqli = mysqli_connect('localhost', 'torrent', 'password', 'ci4_torrent');

mysqli_set_charset($mysqli, 'utf8mb4');

//printf("Успешно... %s\n", mysqli_get_host_info($mysqli));

$result = mysqli_query($mysqli, "SELECT file_name FROM torrents");
$rows = mysqli_fetch_all($result);

foreach ($rows as $row)
{
	$fff[] = $row[0];
}
$i=1;
//echo($fff[1]);
$path = '/srv/http/torr.ws/writable/uploads/torrents/';
if ($dh = opendir($path)) {
     while (($file = readdir($dh)) !== false) {
			if($file == 'index.html' or $file == '.' or $file == '..') continue;
			if(in_array($file, $fff)) continue;
            unlink($path.$file);
			echo $i++."    ".$file."<br />";
     }
     closedir($dh);
}

?>