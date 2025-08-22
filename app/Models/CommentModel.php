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
    
		public function withTorrents()
		{
//    		$this->builder()
        		$this
        		->select('torrents.url as turl, torrents.name as tname, torrents.id as tid, comments.*')
        		->join('torrents', 'torrents.id = comments.fid', 'left');
//    		    ->where('id', $user_id)
//		        ->first();
		    return $this;
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
}