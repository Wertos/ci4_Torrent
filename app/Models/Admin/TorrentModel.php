<?php

declare(strict_types=1);

namespace App\Models\Admin;

use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\Database\RawSql;
use CodeIgniter\Model as GlobalAdminModel;
use CodeIgniter\I18n\Time;

class TorrentModel extends GlobalAdminModel
{
    protected $DBGroup          = 'default';
    protected $table            = 'torrents';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';//\App\Entities\Torrent::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name','descr','category','poster','can_comment','torrentfile'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules = [];

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

	public $sDate;

    protected function initialize(): void
    {
        parent::initialize();
        $this->db = \Config\Database::connect();
		if ($this->db->DBDriver == 'Postgre') 
		{
			$this->sDate = 'CURRENT_DATE';
		} 
		else 
		{
			$this->sDate = 'CURDATE()';
		}

    }

    public function delTorrent(int $tId, bool $full = true)
    {
        $data = [];
		
		$fileName = $this->db->table($this->table)->select('file_name')->where('id', $tId)->limit(1)->get()->getRow()->file_name;
//		var_dump($fileName);
        $torrentFile = setting("Torrent.TorrentFilesPath") . $fileName;

        if (file_exists($torrentFile)) {
              $data['delfile'] = unlink($torrentFile);
        }
		
		$data['deltor'] = $this->db->table($this->table)->where('id', $tId)->delete();
		$data['delcom'] = $this->db->table('comments')->where('tid', $tId)->delete();
		$data['delrep'] = $this->db->table('reports')->where('tid', $tId)->delete();
		$data['delbok'] = $this->db->table('bookmarks')->where('tid', $tId)->delete();
		
		return $data;
	}

    public function moveTorrent(int $tId, int $moveTo)
    {
        $data = [];
		$data['movetor'] = $this->db->table($this->table)->replace(['category' => $moveTo])->where('id', $tId);
		
		return $data;
    }

    public function getTorrents(int $catId,
								int $owner,
								int $today,
								?int $statusId = null,
								int $limit = 20,
								int $offset = 0
					)
	{
   			$this->select('torrents.url as turl, torrents.name as tname, torrents.id as tid,
						  categories.id as cid, categories.name as cname, categories.url as curl,
						  users.id as uid, users.username as uname');

			$this->join('categories', 'categories.id = torrents.category', 'left');
			$this->join('users', 'users.id = torrents.owner', 'left');

			if ($catId) {
				$this->where('categories.id', $catId);
			}

			if ($statusId !== NULL) {
				$this->where('torrents.modded', $statusId);
			}

			if ($owner) {
				$this->where('torrents.owner', $owner);
			}

			if ($today) {
				$this->where('torrents.created_at >= ' . $this->sDate);
			}

			$this->orderBy('torrents.created_at', 'DESC');
			return $this;
	}

    public function getPagination(?int $perPage = null): array
    {
        $this->builder()
            ->select('torrents.*');
        return [
            'torrents'  => $this->paginate($perPage),
            'pager' => $this->pager,
        ];
    }

}