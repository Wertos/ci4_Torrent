<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class SearchModel extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'torrents';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['text'];

    // Validation
    protected $validationRules = [
        'query' => [
            'rules' => [
                'required',
                'max_length[255]',
                'min_length[3]',
                'string|required',
            ],
        ],
    ];

    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public $search;

    protected function initialize(): void
    {
        parent::initialize();
        $this->db = \Config\Database::connect();
        $this->search = new \StdClass;
    }
    
    public function getSearchQuery(?string $query = null)
    {

    }

		public function cleanString($text = null): string
		{
		  if (! $text) return '';

			$utf8 = array(
				'/[áàâãªä]/iu'   =>   'a',
				'/[ÁÀÂÃÄ]/iu'    =>   'A',
				'/[ÍÌÎÏ]/iu'     =>   'I',
				'/[íìîï]/iu'     =>   'i',
				'/[éèêë]/iu'     =>   'e',
				'/[ÉÈÊË]/iu'     =>   'E',
				'/[óòôõºö]/iu'   =>   'o',
				'/[ÓÒÔÕÖ]/iu'    =>   'O',
				'/[úùûü]/iu'     =>   'u',
				'/[ÚÙÛÜ]/iu'     =>   'U',
				'/ç/'            =>   'c',
				'/Ç/'            =>   'C',
				'/ñ/'            =>   'n',
				'/Ñ/'            =>   'N',
				'/–/'            =>   '-', // UTF-8 hyphen to "normal" hyphen
				'/[’‘‹›‚]/iu'    =>   ' ', // Literally a single quote
				'/[“”«»„]/iu'    =>   ' ', // Double quote
				'/ /'            =>   ' ', // nonbreaking space (equiv. to 0x160)
			);
			$text = preg_replace(array_keys($utf8), array_values($utf8), $text);
			$text = $this->db->escape($text);
			$text = preg_replace('/[^a-zA-Zа-яёА-ЯЁ0-9\s]/iu', '', $text);
			return $text;
		}

		public function StringToArray(string $text): array
		{
//		   var_dump($text);die();
		   $text = mb_strtolower($text);
		   return explode(' ', $text);
		}

		public function ArrayToSql(array $arr, array $fields): string
		{
		   $str = '';
		   foreach ($arr as $word) {
		   		if(mb_strlen($word) < 3) continue;
		   		$str .= ' '.$word.'*';	
		   }
		   $sqlWhere = 'MATCH(' . implode(',', $fields) . ') AGAINST(\'' . $str . '\' IN BOOLEAN MODE)';
		   return $sqlWhere;
		}

}