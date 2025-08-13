<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;
use Arokettu\Torrent\TorrentFile;
use Arokettu\Bencode\Bencode;

class TorrentModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'torrents';
//    protected $uniqueKey				=	'infohash';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';//\App\Entities\Torrent::class;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
//    protected $allowedFields    = ['owner','infohash','numfiles','size','type','name','descr','category','poster','magnet','url','file','can_comment','modded','file_name'];
    protected $allowedFields    = ['name','descr','category','poster','can_comment','torrentfile'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'name' => [
            'label' => 'Torrent.title',
            'rules' => [
                'required',
                'max_length[500]',
                'min_length[3]',
                'string',
            ],
        ],
        'poster' => [
            'label' => 'Torrent.poster',
            'rules' => [
                'max_length[254]',
                'valid_url',
            ],
        ],
        'descr' => [
            'label' => 'Torrent.description',
            'rules' => [
                'required',
                'max_length[10000]',
                'min_length[3]',
                'string',
            ],
        ],
        'torrentfile' => [
     	      'label' => 'Torrent.file',
          	'rules' => [
              	'uploaded[torrentfile]',
                'mime_in[torrentfile,application/bittorrent,application/x-bittorrent,application/force-download,application/torrent,torrent]',
                'max_size[torrentfile,1024]',
                'ext_in[torrentfile,torrent]',
        		],
        ],
        'can_comment' => [
            'label' => 'Torrent.can_comment',
            'rules' => [
                'required',
                'numeric',
            ],
        ],
        'category' => [
            'label' => 'Torrent.category',
            'rules' => [
                'required',
                'numeric',
            ],
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

    protected function initialize(): void
    {
        parent::initialize();
        $this->db = \Config\Database::connect();
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

		public function update($id = null, $row = null): bool
    {
        $query = $this->db->table($this->table);
        $query->where('id', $id);
        return $query->set($row)->update();
    }
/*
		public function delete($id = null, bool $purge = false)
    {
//        $this->db->table('comments')->where('fid', $id)->delete();
//        $this->db->table('reports')->where('fid', $id)->delete();
        $query = $this->db->table($this->table)->where('id', $id);
        return $query->delete();
    }
*/
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
				return $this->torrent->getInfoHashes();
		}

		public function getVersion(): int
		{
//				if( $this->torrent->v2() !== null ) return 2;
//				if( $this->torrent->v1() !== null ) return 1;
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
		  $q = $this->db->table($this->table.' AS t')->select('t.*, c.name AS catname, c.url AS caturl, c.desc AS catdesc, u.username, u.avatar, r.fid AS rid, r.comment AS rtext, r.created_at AS radded, r.sender AS rsender, r.modded_by AS rmodded')
                ->join('categories c', 'c.id = t.category', 'left')
                ->join('users u', 'u.id = t.owner', 'left')
                ->join('reports r', 'r.fid = '.$tId, 'left')
                ->where('t.id', (int) $tId)
                ->limit(1)->get()->getRow();
		  return isset($q) ? $q : null;		
		}

		function updateViews($id) {
        $query = $this->db->table($this->table)->set('views', 'views + 1', FALSE)->where('id', $id);
        return $query->update();
    }

		function updateDownloaded($id) {
        $query = $this->db->table($this->table)->set('downloaded', 'downloaded + 1', FALSE)->where('id', $id);
        return $query->update();
    }

}