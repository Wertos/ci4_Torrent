<?php

declare(strict_types=1);

namespace App\Models\Admin;

use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\Database\RawSql;
use CodeIgniter\Model as GlobalAdminModel;
use CodeIgniter\I18n\Time;

class CommentModel extends GlobalAdminModel
{
    protected $DBGroup          = 'default';
    protected $table            = 'comments';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['text','user_id','tid','location','category'];

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

    public function delComment(int $cId)
    {

	}

    public function getComments(string $location,
								int $owner,
								int $today,
								int $limit = 20,
								int $offset = 0
					)
	{
   			$this->select('comments.id as cid, comments.user_id as cuid, comments.tid as ctid, comments.category as ccid,
            			   comments.created_at as ccreated, comments.updated_at as cupdated, comments.deleted_at as cdeleted,
                           comments.editedby as ceditid, comments.text as ctext, comments.location as clocate,
						   users.id as uid, users.username as uname');

			if ($location == 'news') {
				$this->select('news.id as nid, news.title as ntitle, news.url as nurl');
				$this->join('news', 'news.id = comments.tid', 'left');
			}
			else if ($location == 'torrent') {
				$this->select('torrents.id as tid, torrents.name as ttitle, torrents.url as turl');
				$this->join('torrents', 'torrents.id = comments.tid', 'left');
			}
			else
			{
				$this->select('news.id as nid, news.title as ntitle, news.url as nurl');
				$this->select('torrents.id as tid, torrents.name as ttitle, torrents.url as turl');
				$this->join('news', 'news.id = comments.tid', 'left');
				$this->join('torrents', 'torrents.id = comments.tid', 'left');
			}

			$this->join('users', 'users.id = comments.user_id', 'left');

			if ($owner > 0) {
				$this->where('comments.user_id', $owner);
			}

			if ($location) {
				$this->where('comments.location', $location);
			}

			if ($today) {
				$this->where('comments.created_at >= ' . $this->sDate);
			}

			$this->orderBy('comments.created_at', 'DESC');
			return $this;
	}

    public function getPagination(?int $perPage = null): array
    {
        $this->builder()
            ->select('comments.*');
        return [
            'comments'  => $this->paginate($perPage),
            'pager' => $this->pager,
        ];
    }

}