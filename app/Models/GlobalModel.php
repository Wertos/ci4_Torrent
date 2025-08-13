<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model as Model;
use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\Database\RawSql;
use CodeIgniter\I18n\Time;

class GlobalModel extends Model
{    

    protected function initialize(): void
    {
        parent::initialize();
        $this->db = \Config\Database::connect();
    }

    function getCats() {
        	return $this->db->table('categories')
        					->select('*')
        					->where('deleted_at =', null)
									->groupBy('id')
                	->orderBy('sort', 'ASC')
                	->get()->getResult();
    }
    
    function getCatHome() {
        	return $this->db->table('categories')
        					->select('categories.*, COUNT(torrents.id) AS count')
									->join('torrents', 'torrents.category = categories.id', 'left')
									->where('categories.deleted_at =', null)
									->where('torrents.deleted_at =', null)
									->groupBy('categories.id')
                	->orderBy('categories.sort', 'ASC')
                	->get()->getResult();
    }

    public function getTorrentByCat(int $cid, int $limit = 10, int $offset = 0) {
        return $this->db->table('torrents t')->select('t.id, t.owner, t.size, t.type, t.name, t.category, t.created_at, t.poster, t.url, t.modded, t.seed, t.leech, t.views, t.downloaded, t.completed, t.version, u.username, c.name AS catname, c.url AS caturl')
                        ->join('users u', 'u.id = t.owner', 'left')
                        ->join('categories c', 'c.id = '.$cid , 'left')
                        ->where(['category' => $cid])
                        ->where('t.deleted_at =', null)
//                        ->where('added BETWEEN UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 1 DAY)) AND UNIX_TIMESTAMP(NOW())')
//                        ->where('added > UNIX_TIMESTAMP(CURDATE())')
                        ->orderBy("t.created_at", "DESC")
                        ->limit($limit, $offset)
                        ->get()->getResult();
    }

    public function getTorrentByUser(int $userId, int $limit = 10, int $offset = 0) {
        return $this->db->table('torrents t')->select('t.id, t.owner, t.size, t.type, t.name, t.category, t.created_at, t.poster, t.url, t.modded, t.seed, t.leech, t.views, t.downloaded, t.completed, t.version, u.username, c.name AS catname, c.url AS caturl')
                        ->join('users u', 'u.id = t.owner', 'left')
                        ->join('categories c', 'c.id = t.category' , 'left')
                        ->where(['t.owner' => $userId])
                        ->where('t.deleted_at =', null)
                        ->orderBy("t.created_at", "DESC")
                        ->limit($limit, $offset)
                        ->get()->getResult();
    }

    public function getTorrentCountUser(?int $id = null)
    {
        	$query = $this->db->table('torrents')->where('deleted_at =', null)->select('COUNT(id) AS count');
        	if ($id)
        				$query->where('owner', $id);
          $data = $query->get()->getRow();
          return (int) $data->count;
    }

    public function getAllTorrent(int $limit = 10, int $offset = 0) {
        return $this->db->table('torrents t')->select('t.id, t.owner, t.size, t.type, t.name, t.category, t.created_at, t.poster, t.url, t.modded, t.seed, t.leech, t.views, t.downloaded, t.completed, t.version, u.username, c.name AS catname, c.url AS caturl')
                        ->join('users u', 'u.id = t.owner', 'left')
                        ->join('categories c', 'c.id = t.category', 'left')
                        ->where('t.deleted_at =', null)
                        ->orderBy("t.created_at", "DESC")
                        ->limit($limit, $offset)
                        ->get()->getResult();
    }

    function getCatFromUrl(string $url) {
        	return $this->db->table('categories')
        					->select('*')
        					->where('url', $this->db->escapeString($url))
                	->limit(1)->get()->getRow();
    }

    function getTorrentCount(?int $id = null)
    {
        	$query = $this->db->table('torrents')->where('deleted_at =', null)->select('COUNT(id) AS count');
        	if ($id)
        				$query->where('category', $id);
          $data = $query->get()->getRow();
          return (int) $data->count;
    }

}
?>