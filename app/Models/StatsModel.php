<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\Database\RawSql;

class StatsModel extends Model {

    protected function initialize(): void
    {
        parent::initialize();
        $this->db = \Config\Database::connect();
    }

    public function displayStats()
    {
    		helper('number');

        if (!$stats = cache('stats')) {
            $stats = $this->db->table('torrents')
            			->select('SUM(leech) as leechers, SUM(seed) AS seeders, COUNT(id) AS torrents, SUM(size) AS size')
            			->get()->getRow();
//			$stats->count = $this->db->count_all('torrents');
            cache()->save('stats', $stats);
        }
//        print_r($stats); die();
        $data = [
            'torrents' => $stats->torrents,
            'seeders' => $stats->seeders,
            'leechers' => $stats->leechers,
            'size' => number_to_size($stats->size)
        ];

        return $data;
    }

}