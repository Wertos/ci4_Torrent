<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;
use Arifrh\Themes\Themes;

class RatingModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'rating';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id','torrent_id','rating'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

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
//		$this->torrentId = NULL;
//		$this->rating = NULL;
    }

	public function setRating(int $userId, int $torrentId, int $rating)
	{
		$result = $this->checkTorrent($torrentId, $userId);

		if ( $result === true ) 
					return $this->getRating($torrentId, $userId);

		$ret = FALSE;
		$insData = [
			'user_id' => $userId,
			'torrent_id' => $torrentId,
			'rating' => $rating,
			'created_at' => Time::now( setting('App.appTimezone') )->toDateTimeString()
		];
		$ret = $this->builder()->insert($insData);
		if($ret === false) return $ret;

		$rating = $this->getRating($torrentId, $userId);
		return $rating;
	}

	public function checkTorrent(int $torrentId, int $userId): bool
	{
		$check = $this->builder()->select($this->primaryKey)
						->where(['torrent_id' => $torrentId])
						->where(['user_id' => $userId])
				->get()->getRow();

		if ( $check === NULL )
						return false;

		return true;
	}

	public function getHtmlRating(array $rating, int $torrent_id = 0)
	{
		helper('kinopoisk');

		$vars = [
			'avgRating' => colorize_rating($rating['avgRating']),
			'siteTitle' => config('Torrent')->siteTitle,
			'myBgRating' => my_col_bg($rating['myRating']),
			'myRating' => $rating['myRating'],
			'countVotes' => $rating['countVotes'],
			'tid' => $torrent_id
		];
		
		$html = Themes::render('ajax_templates/rating.php', $vars, TRUE);

		return $html;
	}

	public function getRating(int $torrentId, int $userId): array
	{
		$data = [
			'avgRating' => ' - ',
			'countVotes' => NULL,
			'myRating' => NULL
		];
		
		$rating = (int) $this->builder()->where('torrent_id', $torrentId)->selectSum('rating')->get()->getRow()->rating;
		$count = (int) $this->builder()->where('torrent_id', $torrentId)->countAllResults();
		$myrating = $this->builder()->where('torrent_id', $torrentId)->where('user_id', $userId)->select('rating')->get()->getRow();
		
		if($count > 0 && $rating > 0) {
				$data = [
					'avgRating' => (float) round($rating / $count, 3),
					'countVotes' => $count,
					'myRating' => $myrating ? (int) $myrating->rating : NULL
				];

				return $data;
		}		
		
		return $data;
	}
	
	public function delRating(int $torrentId, int $userId)
	{
		$ret = (int) $this->builder()
						->where('torrent_id', $torrentId)
						->where('user_id', $userId)
							->delete();
		return $ret;
	}
}