<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'comments';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['text','user_id','fid','location'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'text' => [
            'label' => 'Comment.text',
            'rules' => [
                'required',
                'max_length[255]',
                'min_length[3]',
                'string',
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


    protected function initialize(): void
    {
        parent::initialize();
        $this->db = \Config\Database::connect();
    }
    
    public function getPagination(?int $perPage = null): array
    {
        $this->builder()
            ->select('comments.*, users.username, users.avatar')
            ->join('users', 'users.id = comments.user_id');

        return [
            'comments'  => $this->paginate($perPage),
            'pager' => $this->pager,
        ];
    }
/*
		public function insert($row = null, bool $returnID = true): int
    {
        $query = $this->db->table($this->table);
        $result = $query->insert($row, $returnID);
				
				$this->db->table('torrents')->set('comments + 1')->where('id', $row['id'])->update();
        
        if ( $returnID == true ) 
        {
        	return $this->db->insertID();
        }
        else
        {
          return $result;
        }
    }

		public function delete($id = null, bool $purge = false)
    {
				$this->db->table('torrents')->set('comments - 1')->where('id', $row['id'])->update();

        $query = $this->db->table($this->table);
        $query->where('id', $id);
        return $query->delete();
    }
*/
}