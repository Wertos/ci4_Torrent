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
    private $sDate;

    protected function initialize(): void
    {
        parent::initialize();
        $this->userModel = model(UserModel::class);
        $this->torrentModel = model(TorrentModel::class);
        $this->commentModel = model(CommentModel::class);
        $this->reportModel = model(ReportModel::class);
        $this->newsModel = model(NewsModel::class);

    	$this->db = \Config\Database::connect();

		if ($this->db->DBDriver == 'Postgre') 
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

		public function systemLoad($coreCount = 2, $interval = 1)
		{
			$rs = sys_getloadavg();
			$interval = $interval >= 1 && 3 <= $interval ? $interval : 1;
			$load = $rs[$interval];
			return round(($load * 100) / $coreCount,2);
		}

		public function diskUsage()
		{
			$disktotal = disk_total_space ('/');
			$diskfree  = disk_free_space  ('/');
			$diskuse   = round (100 - (($diskfree / $disktotal) * 100)) .'%';
			return $diskuse;
		}

		public function serverUptime()
		{
			$uptime = floor(preg_replace ('/\.[0-9]+/', '', file_get_contents('/proc/uptime')) / 86400);
			return $uptime;
		}

		public function memoryUsage()
		{
	
			$mem = memory_get_usage(true);
	
			if ($mem < 1024) {
		
				$$memory = $mem .' B'; 
		
			} elseif ($mem < 1048576) {
		
				$memory = round($mem / 1024, 2) .' KB';
		
			} else {
		
				$memory = round($mem / 1048576, 2) .' MB';
		
			}
	
			return $memory;
	
		}
/**
 * Returns the number of available CPU cores
 * 
 *  Should work for Linux, Windows, Mac & BSD
 * 
 * @return integer 
 */
		public function getNumCpus()
		{
			$numCpus = 1;

			if (is_file('/proc/cpuinfo'))
			{
				$cpuinfo = file_get_contents('/proc/cpuinfo');
				preg_match_all('/^processor/m', $cpuinfo, $matches);

				$numCpus = count($matches[0]);
			}
			else if ('WIN' == strtoupper(substr(PHP_OS, 0, 3)))
			{
				$process = @popen('wmic cpu get NumberOfCores', 'rb');

				if (false !== $process)
				{
					fgets($process);
					$numCpus = intval(fgets($process));

					pclose($process);
				}
			}
			else
			{
				$process = @popen('sysctl -a', 'rb');

				if (false !== $process)
				{
					$output = stream_get_contents($process);

					preg_match('/hw.ncpu: (\d+)/', $output, $matches);
					if ($matches)
					{
						$numCpus = intval($matches[1][0]);
					}

					pclose($process);
				}
			}
  
		return $numCpus;
	}

}                                                                                                                          