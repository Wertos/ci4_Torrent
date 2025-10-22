<?php

use CodeIgniter\CodeIgniter;

/**
 * Returns user avatar
 */
function avatar($avatar, $size = 100, ?string $class = null, ?string $id = null) : string
{
    $src = '';
    $config = new \Config\Torrent;
    $avatarpath = $config->AvatarHtmlPath . $avatar;
    $avatarpath = str_ireplace('\\', '/', $avatarpath);
    if ( !file_exists($avatarpath) || !$avatar) {
	    $src = $config->AvatarHtmlPath . 'default_avatar.jpg';
    }
    else
    {
	    $src = $avatarpath;
    }
    $image_properties = [
        'src' => $src,
        'class' => 'avatar ' . $class,
        'id'	=> $id,
        'width' => $size,
        'height' => $size
    ];

    return img($image_properties);
}
