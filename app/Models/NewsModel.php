<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'news';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['title','text','url', 'can_comment', 'user_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'title' => [
            'label' => 'News.title',
            'rules' => [
                'required',
                'max_length[500]',
                'min_length[3]',
                'string',
            ],
        ],
        'text' => [
            'label' => 'News.text',
            'rules' => [
                'required',
                'max_length[10000]',
                'min_length[3]',
                'string',
            ],
        ],
        'url' => [
            'rules' => [
                'required',
                'max_length[500]',
                'min_length[3]',
                'string',
            ],
        ],
        'can_comment' => [
            'label' => 'News.can_comment',
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

    protected function initialize(): void
    {
        parent::initialize();
        $this->db = \Config\Database::connect();
    }




}