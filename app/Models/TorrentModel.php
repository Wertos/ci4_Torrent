<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;
use Arokettu\Torrent\TorrentFile;
use Arokettu\Bencode\Bencode;
use CodeIgniter\I18n\Time;
use CodeIgniter\Database\RawSql;

class TorrentModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'torrents';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';//\App\Entities\Torrent::class;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
//    protected $allowedFields    = ['owner','infohash_v1','infohash_v2','numfiles','size','type','name','descr','category','poster','magnet','url','file','can_comment','modded','file_name'];
    protected $allowedFields    = ['owner','numfiles','size','type','name','descr','category','poster','magnet','url','file','can_comment','modded','file_name','version','infohash_v1','infohash_v2','torrentfile','seed','leech','completed','updated_peer','downloaded','views','rating'];
//																																                                                               "views" "downloaded" "seed"	"leech"	"completed"	"updated_peer"

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
//		'owner' => ['rules' => ['numeric']],
//		'numfiles' => ['rules' => ['numeric']],
//		'size' => ['rules' => ['numeric']],
//		'type' => ['rules' => ['numeric']],
        'name' => [
            'label' => 'Torrent.title',
            'rules' => ['required','max_length[500]','min_length[3]','string'],
        ],
        'descr' => [
            'label' => 'Torrent.description',
            'rules' => ['required','max_length[20000]','min_length[3]','string'],
        ],
        'category' => [
            'label' => 'Torrent.category',
            'rules' => ['required','numeric'],
        ],
		'poster' => [
			'label' => 'Torrent.poster',
			'rules' => ['max_length[254]','valid_url'],
       	],
//		'magnet' => ['rules' => ['string']],
//		'url' => ['rules' => ['string']],
//		'file' => ['rules' => ['numeric']],
        'can_comment' => [
            'label' => 'Torrent.can_comment',
            'rules' => ['required','numeric'],
        ],
        'torrentfile' => [
			'label' => 'Torrent.file',
			'rules' => ['uploaded[torrentfile]','mime_in[torrentfile,application/bittorrent,application/x-bittorrent,application/force-download,application/torrent,torrent]','max_size[torrentfile,1024]','ext_in[torrentfile,torrent]'],
        ],
//		'modded' => ['rules' => ['required','numeric']],
//		'file_name' => ['rules' => ['string']],
//		'version' => ['rules' => ['numeric']],
//		'infohash_v1' => ['rules' => ['string']],
//		'infohash_v2' => ['rules' => ['string']],
    ];

	protected $validationFilePoster = [
//		'label' => 'Torrent.poster',
		'rules' => [
			'uploaded[poster]',
			'is_image[poster]',
			'mime_in[poster,image/jpg,image/jpeg,image/gif,image/png]',
			'max_size[poster,512]',
			'max_dims[poster,2000,2000]',
		],
	];

    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public $torrent;
    public $decoded;
	public $config;

    protected function initialize(): void
    {
        parent::initialize();
        $this->db = \Config\Database::connect();
        $this->config = new \Config\Torrent();
	}

		public function insert($row = null, bool $returnID = true): int
		{
			$query = $this->db->table($this->table);
			$result = $query->insert($row, $returnID);
    		if ( $returnID == true ) 
        	{
        		return $this->db->insertID();
			}
			else
			{
				return $result;
			}
		}

		public function torrLoad (string $filePath, string $fileName)
		{
		     if (! file_exists($filePath . $fileName)) {
		     		return;
		     }
		     $this->torrent = TorrentFile::load($filePath . $fileName);
		     $this->decoded  = \Arokettu\Bencode\Bencode::decode($this->ToString(), dictType: \Arokettu\Bencode\Bencode\Collection::ARRAY);
		     return $this;
		}

		public function getInfoHashes (bool $binary = false)
		{
				//return $this->torrent->v2()?->getInfoHash($binary) ?? $this->torrent->v1()?->getInfoHash($binary);
				return $this->torrent->getInfoHashes($binary);
		}

		public function getVersion(): int
		{
	    	$infohash = $this->getInfoHashes();
    
    		if( isset($infohash[1]) && ! isset($infohash[2]) ) 
    			return 1;
    		elseif( isset($infohash[2]) && ! isset($infohash[1]) )
    			return 2;
			elseif( isset($infohash[2]) && isset($infohash[1]) )
				return 3;
			return 0;
		}

		public function isPrivate ()
		{
		    return $this->torrent->isPrivate();
		}

		public function getMagnet ()
		{
		    return $this->torrent->getMagnetLink();
		}

		public function isDirectory ()
		{
				$this->torrent->v2()?->isDirectory() ?? $this->torrent->v1()?->isDirectory();
		}
		
		public function getAnnounceList()
		{
				return $this->torrent->getAnnounceList();
		}

		public function getAnnounce()
		{
				return $this->torrent->getAnnounce();
		}

		public function getComment()
		{
				return $this->torrent->getComment();
		}

		public function getCreatedBy()
		{
				return $this->torrent->getCreatedBy();
		}

		public function getTorrentTree()
		{
				if( $this->torrent->v1() !== null )
				{
					$files = $this->torrent->v1()->getFiles()->getIterator();
				  
				  foreach ($files as $file)
				  {
				  	$fileList[] = [
							'name' => $file->name, // file base name
							'path' => $file->path, // full path as array
							'length' => $file->length, // file size
							'attributes' => $file->attributes, // Attributes object
				  	];
				  }
				}
				
				if( $this->torrent->v2() !== null )
				{
					$this->fileTree = $this->torrent->v2()->getFileTree();
					$files = new \RecursiveIteratorIterator($this->fileTree);

				  foreach ($files as $file)
				  {
				  	$fileList[] = [
							'name' => $file->name, // file base name
							'path' => $file->path, // full path as array
							'length' => $file->length, // file size
							'attributes' => $file->attributes, // Attributes object
				  	];
				  }
				}

				return $fileList;
		}

		public function getFilesCount()
		{
				return count($this->getTorrentTree());
		}

		public function getSize(): int
		{
				$size = 0;
				$tor = $this->getTorrentTree();
				foreach($tor as $t)
				{
						$size += intval($t['length']);
				}
				return $size;
		}

		public function toString()
		{
				return $this->torrent->storeToString();
		}

		public function toTree(): string
		{
			helper('tree');
			$torrent = new \TorrentFileList($this->decoded);
			return $torrent->get_filelist();
		}


		public function getFileName(int $tId)
		{
		  $fileName = $this->db->table($this->table.' t')->select('file_name, owner')
                ->where('id', (int) $tId)
                ->limit(1)->get()->getRow();
		  
		  return isset($fileName) ? $fileName : null;		
		}

		public function getDetail(int $tId)
		{
		  $q = $this->db->table($this->table.' AS t')->select('t.*, c.name AS catname, c.url AS caturl, c.desc AS catdesc, u.username, u.avatar, r.tid AS rid, r.comment AS rtext, r.created_at AS radded, r.sender AS rsender, r.modded_by AS rmodded')
                ->join('categories c', 'c.id = t.category', 'left')
                ->join('users u', 'u.id = t.owner', 'left')
                ->join('reports r', 'r.tid = '.$tId, 'left')
                ->where('t.id', (int) $tId)
                ->limit(1)->get()->getRow();
		  return isset($q) ? $q : null;		
		}

		function updateViews($id)
		{
			$query = $this->db->table($this->table)->set('views', 'views + 1', FALSE)->where('id', $id)->limit(1);
			return $query->update();
		}

		function updateDownloaded($id)
		{
        	$query = $this->db->table($this->table)->set('downloaded', 'downloaded + 1', FALSE)->where('id', $id)->limit(1);
	        return $query->update();
    	}
    
    public function checkHash(?string $hash = null): bool
    {
    	if (! $hash) 
    			return false;

        $hashLength = mb_strlen($hash);
        
        if ($hashLength < 40 || $hashLength > 64)
        		return false;

        return true;
    }

	public function torrCheck(?int $ver = null, ?string $hash1 = null, ?string $hash2 = null)
	{
		if ($ver > 3 || $ver < 1)
				return false;

		if ($ver == 1 && $this->checkHash($hash1) === false)
				return false;

		if ($ver == 2 && $this->checkHash($hash2) === false)
				return false;

		if ($ver == 3 && ($this->checkHash($hash1) === false && $this->checkHash($hash2) === false))
				return false;

		$arry = [];
	
        switch ($ver) {
			case 1:
		   		$arry['hash1'] = ($this->db->DBDriver == 'Postgre') ? pg_escape_bytea($this->db->connID, hex2bin($hash1)) : hex2bin($hash1);
				$arry['tid'] = $this->where('infohash_v1', $arry['hash1'])->first();
				break;
			case 2:
		   		$arry['hash2'] = ($this->db->DBDriver == 'Postgre') ? pg_escape_bytea($this->db->connID, hex2bin($hash2)) : hex2bin($hash2);
				$arry['tid'] = $this->where('infohash_v1', $arry['hash2'])->first();
				break;
			case 3:
		   		$arry['hash1'] = ($this->db->DBDriver == 'Postgre') ? pg_escape_bytea($this->db->connID, hex2bin($hash1)) : hex2bin($hash1);
		   		$arry['hash2'] = ($this->db->DBDriver == 'Postgre') ? pg_escape_bytea($this->db->connID, hex2bin($hash2)) : hex2bin($hash2);
				$arry['tid'] = $this->where('infohash_v1', $arry['hash1'])->orWhere('infohash_v2', $arry['hash2'])->first();
				break;
		}

		$arry['ver'] = $ver;
		
		return $arry;

	}

	public function hashToString ($hash = null)
	{
		if(! $hash)
			return null;

		if ($this->db->DBDriver == 'Postgre')
		{
			return mb_strtoupper(str_replace('\x', '', $hash));
		}
		
		return mb_strtoupper(bin2hex($hash));
	}


	public function setRating(int $filmId, int $tId)
	{
		$out = new \stdClass();
		$out->kp_rating = (float) 0;
		$out->kp_votes = (int) 0;
		$out->imdb_rating = (float) 0;
		$out->imdb_votes = (int) 0;
		$out->error = (bool) FALSE;
		$out->error_text = (string) '';
		$timestamp = Time::now()->getTimestamp();
		$prevUpdRating = $this->checkRatingUpdate($tId);

		if ( !$filmId ) {
			$out->error = TRUE;
			$out->error_text = 'Invalid ID !';
			return $out;
		}
		if ( $prevUpdRating < $timestamp - $this->config->ratingUpdate ) {
			$options = [
				'user_agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36 OPR/130.0.0.0',
				'timeout' => 5,
			];

			$kpurl = 'https://rating.kinopoisk.ru/' . $filmId . '.xml';
	        
			$client = service('curlrequest', $options);
			$response = $client->get($kpurl);

			if ( $response->getStatusCode() !== 200 ) {
				$out->error = TRUE;
				$out->error_text = 'Error. Status code: ' . $response->getStatusCode();
				return $out;
			}

			$type = $response->getHeaderLine('Content-Type');
	
			if ( !str_contains($type, 'xml') ) {
				$out->error = TRUE;
				$out->error_text = 'Not XML';
				return $out;
			}
	
			$data = $response->getBody();
	
			if ( !str_contains($data, 'xml') ) {
				$out->error = TRUE;
				$out->error_text = 'Not XML';
				return $out;
			}
	
			$xml = simplexml_load_string($data);
	
			$out->kp_rating = (float) $xml->kp_rating;
			$out->kp_votes = (int) $xml->kp_rating->attributes()->num_vote;
			$out->imdb_rating = (float) $xml->imdb_rating;
			$out->imdb_votes = (int) $xml->imdb_rating->attributes()->num_vote;
			$out->update = $timestamp;
			$out->error = FALSE;
			$out->error_text = '';
		
			$this->db->table($this->table)->set('rating', json_encode($out))
				->where('id', $tId)->update();
		}

		return $out;
	}
	public function getRating (int $tId)
	{
		$rating = $this->db->table($this->table)
			->select('rating', FALSE)->where('id', $tId)
			->get()->getRow();
		$ret = $rating ? json_decode($rating) : '';
		return $ret;
	}
	private function checkRatingUpdate (int $tId)
	{
		$query = $this->db->table($this->table)->select('JSON_EXTRACT(rating, "$.update") as `update`', FALSE)->where('id', $tId);
		return (int) $query->get()->getRow()->update ?? 0;
	}


}