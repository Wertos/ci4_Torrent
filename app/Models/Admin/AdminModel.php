<?php

declare(strict_types=1);

namespace App\Models\Admin;

use \CodeIgniter\Database\BaseBuilder;
use \CodeIgniter\Database\RawSql;
use \CodeIgniter\Model as GlobalAdminModel;
use \App\Models\UserModel;
use \App\Models\TorrentModel;
use \App\Models\CommentModel;
use \App\Models\ReportModel;
use \App\Models\NewsModel;
use \CodeIgniter\I18n\Time;

class AdminModel extends GlobalAdminModel
{

    public $userModel;
    public $torrentModel;
    public $commentModel;
    public $reportModel;
    public $newsModel;

    protected function initialize(): void
    {
        parent::initialize();
        $this->userModel = model(UserModel::class);
        $this->torrentModel = model(TorrentModel::class);
        $this->commentModel = model(CommentModel::class);
        $this->reportModel = model(ReportModel::class);
        $this->newsModel = model(NewsModel::class);

    		//$this->db = \Config\Database;
		if (setting('Database.default')['DBDriver'] == 'Postgre') 
		{
			$this->sDate = 'CURRENT_DATE';
		} 
		else 
		{
			$this->sDate = 'CURDATE()';
		}
	}

		public function getCountUsersOnDay(): int
		{
				
				$count = (int) $this->userModel
//							    ->where('created_at >= CONVERT_TZ(CURDATE(), \'+00:00\', \''. date('P') .'\') - INTERVAL 1 DAY')
							    ->where('created_at >= ' . $this->sDate)
				    			->countAllResults();
				
				return $count;
		}

		public function getCountUsers(): int
		{
				
				$count = (int) $this->userModel->countAll();
				
				return $count;
		}                                

		public function getCommentsOnDay(): int
		{
				
				$count = (int) $this->commentModel
//							    ->where('created_at >= CONVERT_TZ(CURDATE(), \'+00:00\', \''. date('P') .'\') - INTERVAL 1 DAY')
							    ->where('created_at >= ' . $this->sDate)
				    			->countAllResults();
				
				return $count;
		}

		public function getCountComments(): int
		{
				
				$count = (int) $this->commentModel->countAll();
				
				return $count;
		}                                

		public function getTorrentsOnDay(): int
		{
				
				$count = (int) $this->torrentModel
//							    ->where('created_at >= CONVERT_TZ(CURDATE(), \'+00:00\', \''. date('P') .'\') - INTERVAL 1 DAY')
							    ->where('created_at >= ' . $this->sDate)
				    			->countAllResults();
				
				return $count;
		}

		public function getCountTorrents(): int
		{
				
				$count = (int) $this->torrentModel->countAll();
				
				return $count;
		}                                
		
		public function getReportsOnDay(): int
		{
				
				$count = (int) $this->reportModel
//							    ->where('created_at >= CONVERT_TZ(CURDATE(), \'+00:00\', \''. date('P') .'\') - INTERVAL 1 DAY')
							    ->where('created_at >= ' . $this->sDate)
				    			->countAllResults();
				
				return $count;
		}

		public function getCountReports(): int
		{
				
				$count = (int) $this->reportModel->countAll();
				
				return $count;
		}                                
}                                                                                                                          