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
    protected $table            = 'categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';//\App\Entities\Torrent::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['sort','name','desc','parent','url','img'];

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
                'regex_match[/^[a-zA-Z\p{Cyrillic}]+$/u]',
                'is_unique[categories.name]',
            ],
        ],

        'desc' => [
            'label' => 'Category.Category.desc',
            'rules' => [
                'required',
                'max_length[200]',
                'min_length[3]',
                'regex_match[/^[a-zA-Z\p{Cyrillic}]+$/u]',
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

    function getCatList(): array {
        return $this->db->table('categories')->orderBy('sort', 'asc')->get()->getResult();
    }
    
    function getCatById(int $id) {
        return $this->db->table('categories')->where('id', $id)->get()->getRow();
    }

    function CatDelete($id) {
        $this->db->table('categories')->where('id', $id)->delete();
    }

    function CatInsert($data) : int {
        $this->db->table('categories')->insert($data);
        return $this->db->insertID();
    }
    
    function CatUpdate($id, $data) {
        $this->db->table('categories')->where('id', $id)->set($data)->update();
        return $id;
    }
}                                                                                                                          