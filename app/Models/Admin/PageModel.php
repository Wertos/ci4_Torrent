<?php

declare(strict_types=1);

namespace App\Models\Admin;

use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\Database\RawSql;
use CodeIgniter\Model as GlobalAdminModel;
use CodeIgniter\I18n\Time;

class PageModel extends GlobalAdminModel
{
    protected $DBGroup          = 'default';
    protected $table            = 'page';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';//\App\Entities\Torrent::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['title','descr','url','link'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules = [
        'name' => [
            'label' => 'Page.title',
            'rules' => [
                'required',
                'max_length[255]',
                'min_length[3]',
                'string',
                'is_unique[page.title]',
            ],
        ],

        'desc' => [
            'label' => 'Page.descr',
            'rules' => [
                'required',
                'max_length[2000]',
                'min_length[3]',
                'string',
            ],
        ],

        'url' => [
            'required',
            'label' => 'Page.url',
            'rules' => [
                'max_length[255]',
                'min_length[3]',
                'regex_match[/\A[a-z0-9-\.]+\z/]',
                'is_unique[page.url]',
            ],
        ],
        'link' => [
            'required',
            'label' => 'Page.link',
            'rules' => [
                'max_length[255]',
                'min_length[3]',
                'regex_match[/\A[a-z0-9-\.]+\z/]',
                'is_unique[page.link]',
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

