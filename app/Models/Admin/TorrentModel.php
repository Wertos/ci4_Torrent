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

    protected function initialize(): void
    {
        parent::initialize();
        $this->db = \Config\Database::connect();
    }
}