<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Torrent extends BaseConfig
{
// Site seo config
		public string $siteTitle = 'Site Title';
		public string $siteName = 'Site Name';
		public string $siteDescr = 'Site Descr';
		public string $siteKeyword = 'site,key,word';

// Directory fo files upload    
		public string $AvatarUploadPath = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'avatars' . DIRECTORY_SEPARATOR;
		public string $AvatarHtmlPath = 'uploads' . DIRECTORY_SEPARATOR . 'avatars' . DIRECTORY_SEPARATOR;

		public string $TorrentFilesPath = WRITEPATH . 'uploads' . DIRECTORY_SEPARATOR . 'torrents' . DIRECTORY_SEPARATOR;
		public string $TorrentUploadPath = 'torrents' . DIRECTORY_SEPARATOR;
    
// Torrent settin    
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

		public bool $uploadPoster = false;
//		public bool $uploadUrlPoster = true;
		public bool $posterRequired = true;
		public bool $resizePoster = false;
		public bool $convertPoster = true; //to webp
//		public string $posterUploadPath = WRITEPATH . 'uploads' . DIRECTORY_SEPARATOR . 'posters' . DIRECTORY_SEPARATOR;
		public string $posterUploadPath = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'posters' . DIRECTORY_SEPARATOR;
		public string $posterHtmlPath = 'uploads' . DIRECTORY_SEPARATOR . 'posters' . DIRECTORY_SEPARATOR;
    
    public array $validationPosterUploadRule = [
   	   'poster' => [
     	      'label' => 'Torrent.poster',
       	    'rules' => [
          	      'uploaded[poster]',
             	    'is_image[poster]',
               	  'mime_in[poster,image/jpg,image/jpeg,image/gif,image/png]',
                 	'max_size[poster,512]',
                 	'max_dims[poster,2000,2000]',
            ],
       ],
 	  ];

// Comment setting
		public bool $commenEnable = true;
		public int $commentPerPage = 10;

// profile 
		public int $profileBookmarksPerPage = 20;
		public int $profileTorrentsPerPage = 20;
		public int $profileCommentsPerPage = 20;

// Theme setting
		public $theme = 'Yeti';
		public $theme_path = 'themes';
		public $css_path = 'css';
		public $js_path = 'js';
		public $image_path = 'img';
		public $header = 'header';
		public $template = 'home';
		public $footer = 'footer';
		public $use_full_template = FALSE;
		public $plugin_path = 'plugins';
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
    }
}