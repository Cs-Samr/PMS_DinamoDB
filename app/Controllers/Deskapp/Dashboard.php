<?php
 namespace App\Controllers\Deskapp;
 use App\Controllers\BaseController;
 use App\Models\UserModel;
 use App\Models\ProjectModel;


 /**
  * 
  */
 class Dashboard extends BaseController
 {
 	
 	public function index()
 	{
 		ini_set('display_errors',1);
		$model = new UserModel();
		$model2 = new ProjectModel();

        $session = session();
        $data['username'] = $session->get('user_name');
        $data['session'] = \Config\Services::session();

        // Retrieve the number of users from the UserModel
        $data['userCount'] = $model->getUserCount();
		
        // Retrieve the number of Project from the ProjectModel
		$data['projectsCount'] = $model2->getProjectsCount();
		
		//$ProjectModel = new ProjectModel();
		//$data['pro_name'] = $model2->getNames();
		//$data['project_code'] = $model2->getNames();
		$data['project_data'] = $model2->getNames(); 

	

        echo view('deskapp/dashboard/index', $data);
 	}
 	public function one()
 	{
 		$session = session();
 		$data['session'] = \Config\Services::session();
 		$data['username'] = $session->get('user_name');
 		echo view('deskapp/dashboard/index',$data);
		
 	}

 	public function two()
 	{
		$model2 = new ProjectModel();

        $session = session();
        $data['username'] = $session->get('user_name');
        $data['session'] = \Config\Services::session();

       
		// Retrieve the number of Project from the ProjectModel
		$data['projectsCount'] = $model2->getProjectsCount();
		
	
		$data['project_data'] = $model2->getNames(); 
		

 		echo view('deskapp/dashboard/index2',$data);
 	}
 	public function three()
 	{
		ini_set('display_errors',1);
		$model = new UserModel();
		$projectModel = new projectModel();

        $session = session();
        $data['username'] = $session->get('user_name');
        $data['session'] = \Config\Services::session();

    
		$data['project_data'] = $projectModel->getNames(); 
		//$data['project_data'] = $projectModel->findAll();

	//print_r($data);
	 		echo view('deskapp/dashboard/index3',$data);
 	}
 	
 }