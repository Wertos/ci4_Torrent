<?php

use CodeIgniter\CodeIgniter;

/**
 * Returns user avatar
 */
function avatar($avatar, $size = 100, ?string $class = null, ?string $id = null) : string
{
	$config = new \Config\Torrent;  
    $avatarpath = $config->AvatarHtmlPath . $avatar;
    $avatarpath = str_ireplace('\\', '/', $avatarpath);
    $image_properties = array(
        'src' => ($avatar != '' ? $avatarpath : $config->AvatarHtmlPath . 'default_avatar.jpg'),
        'class' => 'avatar ' . $class,
        'id'	=> $id,
        'width' => $size,
        'height' => $size
    );

    return img($image_properties);
}
