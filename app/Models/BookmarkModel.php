<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class BookmarkModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'bookmarks';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id','t_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

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


    protected function initialize(): void
    {
        parent::initialize();
        $this->db = \Config\Database::connect();
    }
    
    public function getUserBookMarks(int $userId, int $limit = 10, int $offset = 0) {
        return $this->db->table('bookmarks b')->select('b.user_id, b.t_id, b.created_at, b.updated_at, b.deleted_at, t.id, t.owner, t.size, t.type, t.name, t.category, t.created_at, t.poster, t.url, t.modded, t.seed, t.leech, t.views, t.downloaded, t.completed, t.version, u.username, c.name AS catname, c.url AS caturl')
                        ->join('torrents t', 't.id = b.t_id' , 'left')
                        ->join('categories c', 'c.id = t.category' , 'left')
                        ->join('users u', 'u.id = t.owner' , 'left')
                        ->where(['b.user_id' => $userId])
                        ->where(['b.deleted_at' => null])
                        ->orderBy('b.created_at', 'DESC')
                        ->limit($limit, $offset)
                        ->get()->getResult();
    }

}