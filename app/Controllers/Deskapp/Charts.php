<?php 
	namespace App\Controllers\Deskapp;
	use App\Controllers\BaseController;
	use App\Models\UserModel;
	use App\Models\ProjectModel;
	use App\Models\LevelsModel;
	use App\Models\ProjectAssign;

	/**
	 * charts controller
	 */
	class Charts extends BaseController
	{
		
		public function apexcharts()
    {
      ini_set('display_errors', 1); 

      $session = session();
      $data['session'] = \Config\Services::session();
       $data['username'] = $session->get('user_name');
       $projectModel = new ProjectModel();
       $projects = $projectModel->findAll();
   
       $projectNames = array_column($projects, 'pro_name');
       $projectStates = [];
   
       foreach ($projects as $project) {
         $state = $project['state'] === 'قيد الإنشاء' ? 1 : 2;
         array_push($projectStates, $state);
       }
   
       $data = [
         'projectNames' => $projectNames,
         'projectStates' => $projectStates
       ];

      return view('deskapp/chart/apexcharts',$data);
    }

		public function highchart()
    {  
      $session = session();
      $data['session'] = \Config\Services::session();
       $data['username'] = $session->get('user_name');
       $levelsModel = new LevelsModel();
       $level1Number = $levelsModel->where('title', 'المرحلة الاولى')->findAll();
       $level2Number = $levelsModel->where('title', 'المرحلة الثانية')->findAll();
       $level3Number = $levelsModel->where('title', 'المرحلة الثالثة')->findAll();
       $level4Number = $levelsModel->where('title', 'المرحلة الرابعة')->findAll();
       
       $level1Number = array_column($level1Number, 'level#');
       $level2Number = array_column($level2Number, 'level#');
       $level3Number = array_column($level3Number, 'level#');
       $level4Number = array_column($level4Number, 'level#');
      
       return view('deskapp/chart/highchart',$data);
    }
		public function jvectormap()
		{
			$session = session();
			$data['session'] = \Config\Services::session();
 			$data['username'] = $session->get('user_name');
			return view('deskapp/chart/jvectormap',$data);	
		}
		public function knobchart()
		{
			$session = session();
			$data['session'] = \Config\Services::session();
 			$data['username'] = $session->get('user_name');
			return view('deskapp/chart/knob-chart',$data);
		}
	}