<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'reports';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['fid','comment','modded_by','location', 'sender', 'ip'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
		protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'comment' => [
            'label' => 'Report.comment',
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
        //$this->db = \Config\Database::connect();
    }
    
    public function getPagination(?int $perPage = null): array
    {
        $this->builder()
            ->select('reports.*, users.username')
            ->join('users', 'users.id = reports.sender');

        return [
            'comments'  => $this->paginate($perPage),
            'pager' => $this->pager,
        ];
    }


}