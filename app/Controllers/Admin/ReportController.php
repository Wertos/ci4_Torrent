<?php                 

namespace App\Controllers\Admin;

use CodeIgniter\Model\Admin;
use \CodeIgniter\AdminController;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\Message;
use CodeIgniter\Exceptions\PageNotFoundException;
use \App\Models\ReportModel;


class ReportController extends \App\Controllers\AdminController
{
    private $reportModel;
    public $siteTitle;

    function __construct()
    {
        $this->reportModel = model(ReportModel::class);
		}

		public function ReportList(int $offset = 0)
		{
		
	      helper('torrent');
	      helper('form');
     		$pager = service('pager');
     		$where = ['reports.id >' => 0];
				
				$only = ($this->request->getGet('only') ?? 'all');

		    if($only == 'opened') {
				    $where = ['reports.modded_by' => 0];
		 		}

		    if($only == 'reaction') {
				    $where = ['reports.modded_by >' => 0];
		 		}

     		$countReport = $this->reportModel->where($where)->CountAllResults();
     		
        $page = (int) ($this->request->getGet('page') ?? 1);
        
        $limit = 20;//setting('Torrent.reportPerPage');
		    $offset = ($page - 1) * $limit;

		    $pager_links = $pager->makeLinks($page, $limit, $countReport);

     		$reportData = $this->reportModel
        					->select('reports.*, u.username AS user_sender, m.username AS user_modded')
									->where($where)
									->join('users AS u', 'u.id = reports.sender', 'left')
									->join('users AS m', 'm.id = reports.modded_by', 'left')
                  ->orderBy("created_at", "DESC")
                  ->limit($limit, $offset)
                  ->get()->getResult();

				$this->siteTitle = $this->TorrConfig->siteTitle . ' | ' . lang('Admin.reports');

				$data = [
						'page_title' => $this->siteTitle,
						'reportList'	=> $reportData,
						'pager_links' => $pager_links,
				];
			
				$this->themes::render('report_list', $data);
		
		}

		public function ReportDelete($id)
		{
		  	if (! auth()->user()->inGroup('superadmin', 'admin')) {
		  		throw PageNotFoundException::forPageNotFound();
	  		}	
	
				$report = $this->reportModel->asObject()->find((int) $id);
				$rId = ($report !== null) ? (int) $report->id  : null;
						  	
		  	if (! $rId) {
	  			throw PageNotFoundException::forPageNotFound();
	  		}	
				
				$this->reportModel->delete($rId);
							
				return redirect()->back()->with('message', lang('Report.delete_success'));
		}

		public function ReportReaction($id)
		{
		  	if (! auth()->user()->inGroup('superadmin', 'admin', 'moderator')) {
		  		throw PageNotFoundException::forPageNotFound();
	  		}	
	
				$report = $this->reportModel->asObject()->find((int) $id);
				$rId = ($report !== null) ? (int) $report->id  : null;
						  	
		  	if (! $rId) {
	  			throw PageNotFoundException::forPageNotFound();
	  		}	
				
				$data = [
						'modded_by' => $this->userData->id,
				];

				$this->reportModel->update($rId, $data);
							
				return redirect()->back()->with('message', lang('Report.reviewed'));
		}

}