<?php 
	namespace App\Controllers\Deskapp;
	use App\Controllers\BaseController;
    use App\Models\UserModel; // Include the UserModel

	/**
	 * tables controller
	 */
	class Tables extends BaseController
	{
		
		public function index()
		{
			$session = session();
			$data['session'] = \Config\Services::session();
 			$data['username'] = $session->get('user_name');
			return view('deskapp/tables/basic-table',$data);
		}
		
		public function basic()
		{
			$session = session();
			$data['session'] = \Config\Services::session();
			$data['username'] = $session->get('user_name');
	
			// Load the UserModel
			$userModel = new UserModel();
			$data['users'] = $userModel->getUsersWithoutPasswordAndMemId();
	
			return view('deskapp/tables/basic-table', $data);
			
		}
		public function datatable()
		{
			$session = session();
			$data['session'] = \Config\Services::session();
 			$data['username'] = $session->get('user_name');
			return view('deskapp/tables/datatable',$data);
		}
	}