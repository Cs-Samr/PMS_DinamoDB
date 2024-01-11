<?php 
	namespace App\Controllers\Deskapp;
	use App\Controllers\BaseController;
	use App\Models\UserModel;
	use App\Models\ProjectModel;
	use App\Models\ProjectAssign;
	use App\Models\LevelsModel;

	/**
	 * ui controller
	 */
	class Ui extends BaseController
	{
		public function index()
		{
			$session = session();
			$data['session'] = \Config\Services::session();
 			$data['username'] = $session->get('user_name');
			return view('deskapp/ui/Users_page',$data);
		}
		public function buttons()
		{
			
			$session = session();
			$data['session'] = \Config\Services::session();
			$data['username'] = $session->get('user_name');
	
			// Load the UserModel
			$userModel = new UserModel();
			$users = $userModel->getUser(); 
			
			
			// Process the users based on the "rules" field
			foreach ($users as &$user) {
				if ($user['rules'] === '1') {
					$user['rules'] = 'مدير النظام';
				} elseif ($user['rules'] === '2') {
					$user['rules'] = 'مدير المشاريع';
				} else {
					$user['rules'] = 'عضو';
				}
				// if ($user['rules'] === '1') {
				// 	$user['rules'] = 'system manager';
				// } elseif ($user['rules'] === '2') {
				// 	$user['rules'] = 'manager';
				// } else {
				// 	$user['rules'] = 'member';
				// }

				$user['edit_url'] = base_url("deskapp/ui/edit/{$user['id_mem']}");

			}
	
			$data['users'] = $users;

			
        return view('deskapp/ui/Users_page', $data);

		}

		public function delete($userId){
			//print_r('delete');

			//if ( $this->request->getMethod(true) === 'POST') {
				// Get the user ID from the POST request
				//$userId = $this->request->getPost('id_mem');
	
				// Load the UserModel
				$userModel = new UserModel();
	
				// Perform the user deletion using the UserModel
				$success = $userModel->deleteUser($userId);

			
				$session = session();
				$data['session'] = \Config\Services::session();
				$data['username'] = $session->get('user_name');
		
				// Load the UserModel
				$userModel = new UserModel();
				$users = $userModel->getUser();
				
				
				// Process the users based on the "rules" field
				foreach ($users as &$user) {
					if ($user['rules'] === '1') {
						$user['rules'] = 'system manager';
					} elseif ($user['rules'] === '2') {
						$user['rules'] = 'manager';
					} else {
						$user['rules'] = 'member';
					}
	
				}
		
				$data['users'] = $users;
	
				
			return view('deskapp/ui/Users_page', $data);
	
				// Return the result of the deletion as JSON response
				//return $this->response->setJSON(['success' => $success]);
		//	}
		}

		public function edit($userId){

			  // Load the UserModel
			  $userModel = new UserModel();

			  // Get the user details based on the user ID
			  $data['user'] = $userModel->find($userId);
		  
			  return view('deskapp/ui/edit_user', $data);


		}

		

		public function update()
 {
    // Load the UserModel
    $userModel = new UserModel();

    // Get the user ID from the form submission
    $userId = $this->request->getPost('id_mem');

    // Fetch the user details based on the user ID
    //$user = $userModel->find($userId);


  // Update the user's information based on the form data
  $user['name'] = $this->request->getPost('name');
  $user['department'] = $this->request->getPost('department');
  $user['employee_no'] = $this->request->getPost('employee_no');
  $user['email'] = $this->request->getPost('email');
  $user['job_t'] = $this->request->getPost('job_t');
  $user['rules'] = $this->request->getPost('rules');

     // Save the updated user data to the database using the update() method
	 $userModel->update($userId, $user);

	 // Redirect the user back to the users list page (buttons page)
	 return redirect()->to(base_url("deskapp/ui/buttons"));
 }
		

		
		public function cardsHover()
		{
			$session = session();
			$data['session'] = \Config\Services::session();
 			$data['username'] = $session->get('user_name');
			//$data['user'] = $session->get('user');
			 
			 $userModel = new UserModel();
			 $user = $userModel->dd();

			 $data['users'] = $user;
			 return view('deskapp/ui/ui-cards-hover',$data);
			

		}


		public function cards()
		{
			ini_set('display_errors', 1);

			$session = session();
			$data['session'] = \Config\Services::session();
 			$data['username'] = $session->get('user_name');			

			$userModel = new UserModel();
			$users = $userModel->getUser();
			
			$data['users'] = $users;
			
			// Get the current user's ID from the session
			$currentUserId = $session->get('id_mem'); // Adjust 'user_id' to match your session key
			
			// Get the selected names for the current user
			//$selectedNames = $userModel->getSelectedNamesForUser($currentUserId);
			
			//$data['selectedNames'] = $selectedNames;
			 return view('deskapp/ui/ui-cards',$data);

		}

		

		public function save()
		{
			ini_set('display_errors', 1);

			helper(['form','url']);
			
			// Load the models
			$userModel = new UserModel();  // Assuming UserModel class is available
			$projectModel = new ProjectModel();  // Assuming ProjectModel class is available
			$ProjectAssign = new ProjectAssign();  // Assuming ProjectAssign class is available
			
			
			$rules = [
				'pro_name' => 'required|min_length[2]|max_length[100]',
				'details' => 'min_length[2]|max_length[500]',
				'd_start' => 'required',
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
				

				$projectModel->saveProject($data);

				$id = $projectModel->getInsertID();
			  // Merge 'id' and 'd_start' and set it to 'code'
				$data['project_code'] = $id. $data['d_start'];
				$data['id_project'] = $id ;
				$projectModel->replace($data);
				 

				if (isset($_POST['selected_names'])) {
					$selectedUserIDs = $_POST['selected_names'];
					$assignmentData = [];
			
					foreach ($selectedUserIDs as $value) {
						$assignmentData[] = [
							'id_memfk' => $value,
							'id_projectfk' => $id,
						];
					}

		
				print_r($assignmentData);
				//$ProjectAssign->insertBatch($assignmentData);
			}
		

//old
				// // Get data from the user and project tables
				// //$users = $userModel->findAll();
				// //$projects = $projectModel->findAll();
				
				// // // Initialize an array to store selected user IDs for assignment
				// // $selectedUserIDs = [];
				
					
				
				// // // Set selected_names to an empty array
				// // $selectedNames = [];
				
				// // Retrieve selected names from the form submission
				// if(isset($_POST['selected_names']) && is_array($_POST['selected_names'])) {
				// 	$selectedUserIDs = $_POST['selected_names'];
				
				// 	// Convert the array to a comma-separated string for storage
				// 	$selectedNamesString = implode(', ', $selectedUserIDs);
				
				// 	// Convert the string back to an array using explode
				// 	$selectedNames = explode(', ', $selectedNamesString);
				
				// 	// Delete existing assignments for the specific project
				// 	$ProjectAssign->where('id_projectfk', $id)->delete();
				// 	$ProjectAssign->where('id_memfk', $id)->delete();

				
				// 	// Loop through the users and projects to assign selected users to projects
				// 	foreach ($users as $user) {
				// 		if (in_array($user['id_mem'], $selectedNames)) {
				// 			foreach ($projects as $project) {
				// 				$assignmentData = [
				// 					'id_memfk' => $user['id_mem'],
				// 					'id_projectfk' => $project['id_project'],
				// 					// Add other fields as needed for the assignment
				// 				];
				
				// 				// Insert data into the project_assign table
				// 				$ProjectAssign->insert($assignmentData);
				// 			}
				// 		}
				// 	}
				
				// 	// Clear the selected names array after saving
				// 	$selectedUserIDs = [];
				//   // Set selected_names to an empty array
				//    $selectedNames = [];
				
			

	          
				return redirect()->to('http://localhost/MS/deskapp/forms/wizard');

	
			} else {
				$data['validation'] = $this->validator;
				return view('deskapp/Ui/ui-cards', $data);
			}
		}
	

		

     	public function carousel()
		{
			$session = session();
			$data['session'] = \Config\Services::session();
 			$data['username'] = $session->get('user_name');
			return view('deskapp/ui/ui-carousel',$data);
		}
		public function listgroup()
		{
			$session = session();
			$data['session'] = \Config\Services::session();
 			$data['username'] = $session->get('user_name');
			return view('deskapp/ui/ui-list-group',$data);
		}
		public function modals()
		{
			$session = session();
			$data['session'] = \Config\Services::session();
 			$data['username'] = $session->get('user_name');
			return view('deskapp/ui/ui-modals',$data);
		}
		public function notification()
		{
			$session = session();
			$data['session'] = \Config\Services::session();
 			$data['username'] = $session->get('user_name');

			// Load the ProjectModel
			$ProjectModel = new ProjectModel();
		
			// Get the projects details
			$data['projects'] = $ProjectModel->getpro();
			$data['project_data'] = $ProjectModel->getNames(); 

		
			return view('deskapp/ui/ui-notification',$data);
		}
		public function progressBar()
		{
			$session = session();
			$data['session'] = \Config\Services::session();
 			$data['username'] = $session->get('user_name');
			return view('deskapp/ui/ui-progressbar',$data);
		}
		public function rangeSlider()
		{
			$session = session();
			$data['session'] = \Config\Services::session();
 			$data['username'] = $session->get('user_name');
			return view('deskapp/ui/ui-range-slider',$data);
		}
		public function sweetAlert()
		{
			ini_set('display_errors', 1);

			$session = session();
			$data['session'] = \Config\Services::session();
			$data['username'] = $session->get('user_name');
		
			// Load the ProjectModel
			$ProjectModel = new ProjectModel();
		
			// Get the projects details
			$data['projects'] = $ProjectModel->getpro();
		
			return view('deskapp/ui/ui-sweet-alert', $data);

		}
		public function tabs()
		{
			$session = session();
			$data['session'] = \Config\Services::session();
 			$data['username'] = $session->get('user_name');
			return view('deskapp/ui/ui-tabs',$data);
		}

		public function timeline()
		{
			$session = session();
			$data['session'] = \Config\Services::session();
 			$data['username'] = $session->get('user_name');
			return view('deskapp/ui/ui-timeline',$data);
		}

		public function tooltip($projectId)
		{

			$session = session();
			$data['session'] = \Config\Services::session();
			$data['username'] = $session->get('user_name');
	
			// Load the UserModel
			$ProjectModel = new ProjectModel();
			//$Projects = $ProjectModel->find($projectId); 
			$Projects =	$ProjectModel->where('id_project', $projectId)->findAll();
			
			$userModel = new UserModel();
			$users = $userModel->getUser();
			$data['users'] = $users;

			// Process the users based on the "rules" field
			// foreach ($Projects as &$Project) {
			
			// 	$Project['edit_url'] = base_url("deskapp/ui/editProject/{$Project['id_project']}");

			// }
			$data['projects'] = $Projects;


        return view('deskapp/ui/ui-tooltip-popover',$data);

		}

		public function deletePro($projectId) {
			$session = session();
			$data['session'] = \Config\Services::session();
			$data['username'] = $session->get('user_name');
			
			ini_set('display_errors', 1);
			$projectModel = new ProjectModel();
			$projectAssign = new ProjectAssign();

			// $del_project = [
			// 	'state' => $this->request->getVar('proState')
			// ];
			// $projectModel->update($projectId, $del_project);




			$projectAssign->deleteProject($projectId);
			$projectModel->deleteProject($projectId);
			
			// $data['alertMessage'] = 'Project has been deleted successfully.';

			$projectModel = new ProjectModel();
			$project = $projectModel->getpro();
			$data['projects'] = $project;
			
			$projectAssign = new ProjectAssign();
			$assipro = $projectAssign->getUser(); 
			$data['project_assign'] = $assipro;
					
			return view('deskapp/ui/ui-sweet-alert', $data);
					
		}
		
		



		public function editProject($projectId) {
			// Load the ProjectModel & UserModel
			$projectModel = new ProjectModel();

			// Get the project details based on the project ID
			$data['projects'] = $projectModel->find($projectId);
		
			return view('deskapp/ui/ui-tooltip-popover', $data);
		
		}
	
		public function updateProject($projectId) {
			// Load the ProjectModel
			$projectModel = new ProjectModel();
			$assignmentModel = new ProjectAssign();

			
			// Fetch the project details based on the project ID
			$project = $projectModel->find($projectId);
			
			// If the project doesn't exist, handle the error (add appropriate logic)
		
			// Get the updated project data from the form submission
			$updatedProjectData = [
				'pro_name' => $this->request->getPost('pro_name'),
				'details' => $this->request->getPost('details'),
				'd_start' => $this->request->getPost('d_start'),
				'd_end' => $this->request->getPost('d_end')
			];
		
			// Update the project's information based on the form data
			$projectModel->update($projectId, $updatedProjectData);
		
			 // Delete existing assignments for the project
			 $assignmentModel->where('id_projectfk', $projectId)->delete();

			// Get the inserted ID (assuming it's an auto-incremented field)
			$insertedId = $projectModel->getInsertID();
			
			// Generate the project code by merging 'id' and 'd_start'
			$projectCode = $projectId . $updatedProjectData['d_start'];
			
			// Update the 'project_code' and 'id_project' fields
			$projectModel->update($projectId, [
				'project_code' => $projectCode,
				'id_project' => $insertedId
			]);
		
			if (isset($_POST['selected_names'])) {
				$selectedUserIDs = $_POST['selected_names'];
				$assignmentData = [];
				
				// Prepare assignment data for each selected user
				foreach ($selectedUserIDs as $value) {
					$assignmentData[] = [
						'id_memfk' => $value,
						'id_projectfk' => $projectId
					];
				}
		
				// Assuming you have an AssignmentModel to handle assignments
		
				// Insert assignment data into the AssignmentModel
				if (!empty($assignmentData)) {
					$assignmentModel->insertBatch($assignmentData);
				}
			}
		
			// Redirect the user after the update
			return redirect()->to(base_url("deskapp/ui/sweetAlert"));
		}
		

		// public function updateProject($projectId) {

		// 	// Load the ProjectModel
		// 	$projectModel = new ProjectModel();

		// 	// Get the project ID from the form submission
		// 	$projectId = $this->request->getPost('id_project');
		
		// 	// Fetch the project details based on the project ID
		// 	//$project = $projectModel->find($projectId);
		
		// 	// Update the project's information based on the form data
		// 	$project['pro_name'] = $this->request->getPost('pro_name');
		// 	$project['details'] = $this->request->getPost('details');
		// 	$project['d_start'] = $this->request->getPost('d_start');
		// 	$project['d_end'] = $this->request->getPost('d_end');
			


		
		// 	// Save the updated project data to the database using the update() method
		// 	$projectModel->update($projectId, $project);
		
		// 	// Redirect the user back to the projects list page or wherever you want to redirect after update
		// 	//return redirect()->to(base_url("deskapp/ui/editProject/{$projectId}"));
		// 	return redirect()->to(base_url("deskapp/ui/sweetAlert"));
				
			
		// } 

		public function typography()
		{
			$session = session();
			$data['session'] = \Config\Services::session();
 			$data['username'] = $session->get('user_name');
			return view('deskapp/ui/ui-typography',$data);
		}
	}