<?php
namespace Config;

use CodeIgniter\Config\BaseConfig;

class Breadcrumb extends BaseConfig
{

	public string $tag_open = '<ol class="breadcrumb">';
	public string $tag_close = '</ol>';

	public string $item_open = '<li class="breadcrumb-item">';
	public string $item_close = '</li>';

	public string $last_item_open = '<li class="breadcrumb-item active">';
	public string $last_item_close = '</li>';

}