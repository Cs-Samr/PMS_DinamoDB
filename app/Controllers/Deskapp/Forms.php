<?php 
	namespace App\Controllers\Deskapp;
	use App\Controllers\BaseController;
	use App\Models\UserModel;
	use App\Models\ProjectModel;
	use App\Models\LevelsModel;
	use App\Models\ProjectAssign;


	
	/**
	 * forms controller
	 */
	class Forms extends BaseController
	{
		
		public function index() {
			$session = session();
			$data['session'] = \Config\Services::session();
 			$data['username'] = $session->get('user_name');
			return view('deskapp/forms/form-basic',$data);
		}
		public function basic() {
			$session = session();
			$data['session'] = \Config\Services::session();
 			$data['username'] = $session->get('user_name');
			return view('deskapp/forms/form-basic',$data);
		}
		public function advance() {
			$session = session();
			$data['session'] = \Config\Services::session();
 			$data['username'] = $session->get('user_name');
			return view('deskapp/forms/advanced-components',$data);
		}

		public function pickers($id_project) {
			ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			error_reporting(E_ALL);

			$userModel = new UserModel();
			$ProjectModel = new ProjectModel();
			$levelsModel = new LevelsModel();
		//	$projectAssignModel = new ProjectAssign(); // Correct model instantiation
		
			$users = $userModel->getUser();
			$projects = $ProjectModel->getpro();
			$levels = $levelsModel->getlevel();
		//	$projectAssignments = $projectAssignModel->getAssignmentsByProject($id_project);
          //       $assignedUserIds = array_column($projectAssignments, 'id_memfk');

         //  $assignedUsers = array();
         //     foreach ($users as $user) {
         //        if (in_array($user['id_mem'], $assignedUserIds)) {
         //       $assignedUsers[] = $user;
          //    }
      //  }


		
			//$data['assigned_users'] = $assignedUsers;

			$data['users'] = $users;
			$data['projects'] = $projects;
			$data['levels'] = $levels;
			//$data['project_assign'] = $projectAssign;

     // $projectNames = array_column($projects, 'pro_name');
      //  $data['project_names'] = $projectNames;

       $Projects = $ProjectModel->where('id_project', $id_project)->findAll();

         //  $data['projects'] = $Projects;
		   $data ['id_project'] = $id_project;

		
			// Fetch project assignments
			//$projectAssignData = $projectAssignModel->getUser(); // Fetch all assignments
			//$projectAssignDataByProject = $projectAssignModel->getAssignmentsByProject($id_project); // Fetch assignments for a specific project
			//$projectAssignByUsers = $userModel->getAssignmentsByProject($projectAssignDataByProject); // Fetch assignments for a specific project
		
			//$data['project_assign'] = $projectAssignData; // All assignments
			//$data['project_assign_by_project'] = $projectAssignDataByProject; // Assignments for a specific project
			//$data['projectAssignByUsers'] = $projectAssignByUsers; // Assignments for a specific project
			//print_r($projectAssignDataByProject);

			$Projects =	$ProjectModel->where('id_project', $id_project)->findAll();



			$data['projects'] = $Projects;

			 // Assuming 'getNames()' is a method of your ProjectModel
			 $projectNames = array_column($projects, 'pro_name'); // Extract 'pro_name' from each project
			 $data['project_names'] = $projectNames;

			// $id_project = $this->request->getGet('id_project');  
			       $data ['id_project']= $id_project;


             //print_r($projectAssign);
			return view('deskapp/forms/form-pickers',$data);
		}

		public function wizard()
		{
			ini_set('display_errors', 1);
		
			$session = session();
			$data['username'] = $session->get('user_name');
			$data['session'] = $session;
		
			$userModel = new UserModel();
			$ProjectModel = new ProjectModel();
		
			$users = $userModel->getUser();
			$projects = $ProjectModel->getpro();
		
			$data['users'] = $users;
			$data['projects'] = $projects;
		
			// Assuming 'getNames()' is a method of your ProjectModel
			$projectNames = array_column($projects, 'pro_name'); // Extract 'pro_name' from each project
			$data['project_names'] = $projectNames;
		
			//$data['names'] = $userModel->getAllNames();
		
			// Get the id_project from the query parameter and pass it to the view
			$data['id_project'] = $this->request->getGet('id_project');
		
			return view('deskapp/forms/form-wizard', $data);
		}
		


		// public function saveForm()
		// 	{
		// 		ini_set('display_errors', 1); 
		// 		helper(['form', 'url']);

		// 		// Load the LevelsModel
		// 		$levelsModel = new LevelsModel(); 
		// 		$ProjectModel = new ProjectModel(); 

		// 		$session = session();
		// 		$data['username'] = $session->get('user_name');
		// 		$data['session'] = $session;
 
		// 		$userModel = new UserModel();
		// 		$ProjectModel = new ProjectModel();
			
		// 		$users = $userModel->getUser();
		// 		$projects = $ProjectModel->getpro();
			
		// 		$data['users'] = $users;
		// 		$data['projects'] = $projects;
			
		// 		// Assuming 'getNames()' is a method of your ProjectModel
		// 		$projectNames = array_column($projects, 'pro_name'); // Extract 'pro_name' from each project
		// 		$data['project_names'] = $projectNames;


		// 		// if ($this->request->getMethod() == 'post' ) {
		// 		$leveldata = [
		// 			'title' => $this->request->getVar('title'),
		// 			'details' => $this->request->getVar('details'),
        //             'id_mem' => $this->request->getVar('id_mem'),
		// 			'id_project' => $this->request->getVar('id_project'),
		// 			'd_start' => $this->request->getVar('d_start'),
		// 			'd_end' => $this->request->getVar('d_end'),
		// 			'level#' => $this->request->getVar('level#'),
		// 			'states' => $this->request->getVar('states'),
		// 		];

				
		// 		print_r($leveldata);
		// 		// Save form data to the levels table
		// 		//$levelsModel->insert($leveldata);
		// 		   // Determine the appropriate method to call based on the level
		// 		//    $saveMethod = 'saveLevel' . $data['level#'];

		// 		//    // Call the appropriate save method
		// 		//    if (method_exists($levelsModel, $saveMethod)) {
		// 		// 	   $levelsModel->$saveMethod($data);
		// 		//    }
				   

		// 		// Update the "level#" column in the project table
		// 		$projectData = [
		// 			'level#' => $this->request->getVar('level#')
		// 		];

		// 		$ProjectModel->update($this->request->getVar('id_project'), $projectData);
			
		// 		$projectData2 = [
					
		// 			'type' => $this->request->getVar('type')
		// 		];
		// 		$ProjectModel->update($this->request->getVar('type'), $projectData2);
			

		// 		$this->session->setFlashdata('form_success', 'تم حفظ المرحلة الحالية');
			

		// 		//return redirect()->to('/MS/deskapp/forms/wizard');
		// 	// } else {
		// 	// 	// Validation failed, return to the view with validation errors
		// 	// 	$data['validation'] = $this->validator;
		// 	// 	return view('deskapp/forms/form-wizard', $data);
		// 	// }
		// }

		
		
		public function save()
		{
			ini_set('display_errors', 1);
			helper(['form','url']);
			
			// Load the models
			$userModel = new UserModel(); // Assuming UserModel class is available
			$projectModel = new ProjectModel(); // Assuming ProjectModel class is available
			$ProjectAssign = new ProjectAssign(); // Assuming ProjectAssign class is available
		    $LevelsModel = new LevelsModel();
		
			$rules = [
				'pro_name' => 'required|min_length[2]|max_length[100]',
				'details' => 'min_length[2]|max_length[500]',
				'd_start' => 'required',
				'd_end' => 'required',
				'state' => 'required'
			];
		
			if ($this->request->getMethod() == 'post' && $this->validate($rules)) {
				$data = [
					'pro_name' => $this->request->getVar('pro_name'),
					'd_start' => $this->request->getVar('d_start'),
					'd_end' => $this->request->getVar('d_end'),
					'state' => $this->request->getVar('state'),
					'details' => $this->request->getVar('details'),
				]; 
		
				// Save project details
				//$projectModel->saveProject($data);
				$projectModel->insert($data);
				//print_r($data);
				$id = $projectModel->getInsertID();
		
				// Update project with project code and ID
				$data['project_code'] = $id . $data['d_start'];
				$data['id_project'] = $id;
				$projectModel->replace($data);
		
				// Handle user assignment
				if ($this->request->getPost('selected_names')) {
					$selectedUserIDs = $this->request->getPost('selected_names');
					$assignmentData = [];
		
					foreach ($selectedUserIDs as $value) {
						$assignmentData[] = [
							'id_memfk' => $value,
							'id_projectfk' => $id,
						];
					}
		
					if (!empty($assignmentData)) {
						$ProjectAssign->insertBatch($assignmentData);
					}
				}

				$this->session->setFlashdata('id_project', $id);

		
				    // Redirect to the wizard page with id_project as a query parameter
					return redirect()->to("http://localhost/MS/deskapp/forms/wizard?id_project=$id");
			} else {
				// Validation failed, return to the view with validation errors
				$data['validation'] = $this->validator;
				return view('deskapp/Ui/ui-cards', $data);
			}
		}
		


		public function saveForm()
		{
			ini_set('display_errors', 1);
			helper(['form','url']);


			if ($this->request->getMethod() === 'post') {
				$levelModel = new LevelsModel();
				$ProjectModel = new ProjectModel();

		
				$data = [
					'title' => $this->request->getPost('title'),
					'level#' => $this->request->getPost('level#'),
					'id_project' => $this->request->getPost('id_project'),
					'details' => $this->request->getPost('details'),
					'states' => $this->request->getPost('states'),
					'd_start' => $this->request->getPost('d_start'),
					'd_end' => $this->request->getPost('d_end'),
					'id_mem' => $this->request->getPost('id_mem'),
				];
		
				// Insert data into the database
				$levelModel->insert($data);
		
				// Update the "level#" column in the project table
				$projectData = [
					'level#' => $this->request->getVar('level#')
				];
		
				$ProjectModel->update($this->request->getVar('id_project'), $projectData);
		
				$projectData2 = [
					'type' => $this->request->getVar('type')
				];
				$ProjectModel->update($this->request->getVar('id_project'), $projectData2);

					
				$projectData3 = [
					'states' => $this->request->getVar('proState')
				];
				$ProjectModel->update($this->request->getVar('id_project'), $projectData3);

				if ($this->request->getVar('level#') === '4' && $this->request->getVar('states') === 'مكتمل') {
					$projectData4 = [
						'state' => $this->request->getVar('statepro') // Use the correct field name from your form
					];
					$ProjectModel->update($this->request->getVar('id_project'), $projectData4);
				}
				

			
		
				$this->session->setFlashdata('form_success', ' تم حفظ المرحلة الحالية يمكنك الإنتقال إلى المرحلة التالية');
			} else {
				echo "Invalid request method.";
			}
		
			return redirect()->back();
		}
		

	// 	public function saveForm()
	// 	{
	// 		if ($this->request->getMethod() === 'post') {
	// 			$validation = \Config\Services::validation();
	
	// 			// Define validation rules
	// 			$validation->setRules([
	// 				'title' => 'required',
	// 				'level#' => 'required',
	// 				'id_project' => 'required',
	// 				'details' => 'required',
	// 				'states' => 'required',
	// 				'd_start' => 'required|valid_date',
	// 				'd_end' => 'required|valid_date',
	// 				'id_mem' => 'required',
	// 			]);
	
	// 			// Run validation
	// 			if ($validation->withRequest($this->request)->run()) {
	// 				$levelModel = new LevelsModel();
	
	// 				$data = [
	// 					'title' => $this->request->getPost('title'),
	// 					'level#' => $this->request->getPost('level#'),
	// 					'id_project' => $this->request->getPost('id_project'),
	// 					'details' => $this->request->getPost('details'),
	// 					'states' => $this->request->getPost('states'),
	// 					'd_start' => $this->request->getPost('d_start'),
	// 					'd_end' => $this->request->getPost('d_end'),
	// 					'id_mem' => $this->request->getPost('id_mem'),
	// 				];

	// 				$levelModel->insert($data) ;
					
	// 			// Update the "level#" column in the project table
	// 			$projectData = [
	// 				'level#' => $this->request->getVar('level#')
	// 			];

	// 			$ProjectModel->update($this->request->getVar('id_project'), $projectData);
			
	// 			$projectData2 = [
					
	// 				'type' => $this->request->getVar('type')
	// 			];
	// 			$ProjectModel->update($this->request->getVar('type'), $projectData2);
			

	// 			$this->session->setFlashdata('form_success', 'تم حفظ المرحلة الحالية');
			
	// 		// 		// Insert data into the database
	// 		// 		if ($levelModel->insert($data)) {
	// 		// 			echo "Form data saved successfully.";
	// 		// 		} else {
	// 		// 			// Database insert error
	// 		// 			$error = $levelModel->errors();
	// 		// 			echo "Error saving form data: " . print_r($error, true);
	// 		// 		}
	// 		// 	} else {
	// 		// 		// Validation errors
	// 		// 		$errors = $validation->getErrors();
	// 		// 		echo "Validation errors: " . print_r($errors, true);
	// 		// 	}
	// 		// } else {
	// 		// 	echo "Invalid request method.";
	// 		// }
	// 		return redirect()->back();


	// 			}


	// 	}
	// }
		


	
	
// 	public function saveForm()
		
// 		{
// 			ini_set('display_errors', 1);

// 			helper(['form','url']);

// 			// Create an instance of LevelsModel
// $levelsModel = new LevelsModel();


// $rules = [
// 	'title' => 'required|min_length[2]|max_length[100]',
// 	'details' => 'min_length[2]|max_length[500]',
// 	'd_start' => 'required',
// 	'd_end' => 'required',
// 	'states' => 'required'
// ];
 
// if ($this->request->getMethod() == 'post' && $this->validate($rules)) {

// // Loop four times to process the forms
//     $leveldata = [
//         'title' => $this->request->getVar('title' ), // Assuming you have input names like 'title_1', 'title_2', ...
//         'details' => $this->request->getVar('details'),
//         'id_mem' => $this->request->getVar('id_mem' ),
//         'id_project' => $this->request->getVar('id_project' ),
//         'd_start' => $this->request->getVar('d_start'  ),
//         'd_end' => $this->request->getVar('d_end'  ),
//         'level#' => $this->request->getVar('level#'  ), // Note: 'level#' is not a valid key name, use 'level_' instead
//         'states' => $this->request->getVar('states'  ),
//     ];

//     // Print the data for the current form
//     print_r($leveldata);

// 	// $this->levelsModel->add($leveldata);

// 				//$levelsModel->saveLevel1($leveldata);

//         $levelsModel->insert($leveldata); // Insert data into the database
// }
// 			// Redirect back to the page after processing
// 				//return redirect()->to('/MS/deskapp/forms/wizard');
// 	}
	
	




		public function html5Editor() {
			
			 ini_set('display_errors', 1);
		
			 $session = session();
			 $data['username'] = $session->get('user_name');
			 $data['session'] = $session;
 
			 $userModel = new UserModel();
			 $ProjectModel = new ProjectModel();
		 
			 $users = $userModel->getUser();
			 $projects = $ProjectModel->getpro();
		 
			 $data['users'] = $users;
			 $data['projects'] = $projects;
		 
			 // Assuming 'getNames()' is a method of your ProjectModel
			 $projectNames = array_column($projects, 'pro_name'); // Extract 'pro_name' from each project
			 $data['project_names'] = $projectNames;
		 

			return view('deskapp/forms/html5-editor',$data);
		}

		public function imageCropper() {
			ini_set('display_errors', 1);
 
			$session = session();
			$data['session'] = \Config\Services::session();
 			$data['username'] = $session->get('user_name');
		
			 $session = session();
			 $data['username'] = $session->get('user_name');
			 $data['session'] = $session;
 
			 $userModel = new UserModel();
			 $ProjectModel = new ProjectModel();
		 
			 $users = $userModel->getUser();
			 $projects = $ProjectModel->getpro();
		 
			 $data['users'] = $users;
			 $data['projects'] = $projects;
		 
			 // Assuming 'getNames()' is a method of your ProjectModel
			 $projectNames = array_column($projects, 'pro_name'); // Extract 'pro_name' from each project
			 $data['project_names'] = $projectNames;
		 
	
			return view('deskapp/forms/image-cropper',$data);
		}
		public function imageDropZone() {
			ini_set('display_errors', 1);

			$session = session();
			$data['session'] = \Config\Services::session();
 			$data['username'] = $session->get('user_name');

		
			 $session = session();
			 $data['username'] = $session->get('user_name');
			 $data['session'] = $session;
 
			 $userModel = new UserModel();
			 $ProjectModel = new ProjectModel();
		 
			 $users = $userModel->getUser();
			 $projects = $ProjectModel->getpro();
		 
			 $data['users'] = $users;
			 $data['projects'] = $projects;
		 
			 // Assuming 'getNames()' is a method of your ProjectModel
			 $projectNames = array_column($projects, 'pro_name'); // Extract 'pro_name' from each project
			 $data['project_names'] = $projectNames;
		 

			return view('deskapp/forms/image-dropzone',$data);
		}
	}