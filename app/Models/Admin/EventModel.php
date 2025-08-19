<?php

declare(strict_types=1);

namespace App\Models\Admin;

use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\Database\RawSql;
use CodeIgniter\Model as GlobalAdminModel;
use CodeIgniter\I18n\Time;

class CategoryModel extends GlobalAdminModel
{
    protected $DBGroup          = 'default';
    protected $table            = 'admin_log';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';//\App\Entities\Torrent::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id','event_data','event_userid','date'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules = [
        'name' => [
            'label' => 'Category.Category.name',
            'rules' => [
                'required',
                'max_length[30]',
                'min_length[3]',
                'string',
                'is_unique[categories.name]',
            ],
        ],

        'desc' => [
            'label' => 'Category.Category.desc',
            'rules' => [
                'required',
                'max_length[200]',
                'min_length[3]',
                'string',
            ],
        ],

        'url' => [
            'required',
            'label' => 'Category.Category.url',
            'rules' => [
                'max_length[30]',
                'min_length[3]',
                'regex_match[/\A[a-z0-9-\.]+\z/]',
                'is_unique[categories.url]',
            ],
        ],

        'sort' => [
            'required',
            'label' => 'Category.Category.sort',
            'rules' => [
                'max_length[100]',
                'min_length[1]',
                'is_natural',
                'is_unique[categories.sort]',
            ],
        ],
/*
        'img' => [
            'label' => 'Category.Category.img',
            'rules' => [
                'max_length[254]',
                'valid_url',
            ],
        ],
*/
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

		public function saveEvent( int $userId, array $eventData, ?int $eventUserId = null)
		{

				$db = \Config\Database::connect();

				$data = [
						'user_id' => (int) $userId,
						'event_data' => (string) json_encode($eventData),
						'event_userid' => (int) $eventUserId,
				];
				
				$db->table('admin_log')->insert($data);

		}

		public function getEvent( ?int $userId = null, ?int $eventId = null, int $limit = 50, ?int $start = null)
		{

				return 1;

		}
