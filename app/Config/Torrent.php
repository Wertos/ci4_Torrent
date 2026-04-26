<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Torrent extends BaseConfig
{
// Site seo config
		public string $appname = 'Codeigniter 4 torrent-tracker';
		public string $siteTitle = 'Site Title';
		public string $siteName = 'Site Name';
		public string $siteDescr = 'Site Descr';
		public string $siteKeyword = 'site,key,word';

// Directory fo files upload    
		public string $AvatarUploadPath = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'avatars' . DIRECTORY_SEPARATOR;
		public string $AvatarHtmlPath = 'uploads' . DIRECTORY_SEPARATOR . 'avatars' . DIRECTORY_SEPARATOR;

		public string $TorrentFilesPath = WRITEPATH . 'uploads' . DIRECTORY_SEPARATOR . 'torrents' . DIRECTORY_SEPARATOR;
		public string $TorrentUploadPath = 'torrents' . DIRECTORY_SEPARATOR;
    
// Torrent setting
		public int  $torrentsPerPage = 20;
		public int  $torrentsPerCatOnIndex = 5;
		public bool $allowUploadTorrent = true;
		public bool $allowMagnet = true;
		public bool $allowreport = true;
		public int  $archiveId	= 0;
		public array $statusAllowDownload = [0,1];

		public bool $allowFileList = true;
		public bool $replaceAnnounce = false;
		public bool $enableAnnouncer = false;
		public bool $useTorrentAnnouncer = false;
		public array $legalAnnouncer = [
					'udp://open.stealth.si:80/announce',
					'udp://exodus.desync.com:6969/announce',
					'udp://explodie.org:6969/announce',
					'udp://tracker.dler.org:6969/announce',
		];
		public int $maxTimeOnAnnouncer = 3; //second

		public bool $uploadPoster = true;
		public bool $posterRequired = true;
		public bool $resizePoster = false;
		public bool $convertPoster = true; //to webp
		public string $posterUploadPath = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'posters' . DIRECTORY_SEPARATOR;
		public string $posterHtmlPath = 'uploads' . DIRECTORY_SEPARATOR . 'posters' . DIRECTORY_SEPARATOR;
		public string $imageDir;
		public string $catImageDir;
		public string $templatesPath = 'uploads' . DIRECTORY_SEPARATOR . 'torrent_templates' . DIRECTORY_SEPARATOR;

// Comment setting
		public bool $commenEnable = true;
		public int $commentPerPage = 10;

// profile 
		public int $profileBookmarksPerPage = 20;
		public int $profileTorrentsPerPage = 20;
		public int $profileCommentsPerPage = 20;
// News settin
		public bool $newsEnable = true;
		public int $newsPerIndex = 3;
		public int $newsPerAdminList = 10;

// Theme setting
		public bool $minifyJs = FALSE;
		public bool $minifyCss = FALSE;
		public string $minifyJsFileName = 'build.min.js';
		public string $minifyCssFileName = 'build.min.css';
		public int $jsLifeTime = 259200;
		public int $cssLifeTime = 259200;
		public string $fullThemePath = FCPATH . 'themes' . DIRECTORY_SEPARATOR . 'front' . DIRECTORY_SEPARATOR;
		public string $theme = 'front';
//		public string $css_theme = 'yeti.min.css';
		public string $theme_path = 'themes';
		public string $css_path = 'css';
		public string $js_path = 'js';
		public string $image_path = 'img';
		public string $header = 'header';
		public string $template = 'home';
		public string $footer = 'footer';
		public bool $use_full_template = FALSE;
		public string $plugin_path = 'plugins';
		public array $siteCSS = [
			"yeti.min.css",
	        "themes.min.css",
    	    "bootstrap-icons.min.css",
		];
		public array $siteJs = [
			"jquery-4.0.0.min.js",
			"jquery.treeview.js",
			"bootstrap.bundle.min.js",
			"main.js",
			"ajax.js",
		];

		/**
		public $plugins = [
			'bootbox' => [
				'js' => [
					'bootbox/bootbox-en.min.js'
				]
			]
		];
		*/


// Widget setting
		public $widgetDir; // See consructor
		public $widgets = [
//			'widget php file' => enable or disable(true or false)
				'category' => true,
				'stats' => true,
		];

    function __construct() {
    			$this->widgetDir = FCPATH . $this->theme_path . DIRECTORY_SEPARATOR . $this->theme . DIRECTORY_SEPARATOR . 'widget' . DIRECTORY_SEPARATOR;
    			$this->imageDir = FCPATH . $this->theme_path . DIRECTORY_SEPARATOR . $this->theme . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR;
    			$this->catImageDir = DIRECTORY_SEPARATOR . $this->theme_path . DIRECTORY_SEPARATOR . $this->theme . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'catimg' . DIRECTORY_SEPARATOR;
    }
}