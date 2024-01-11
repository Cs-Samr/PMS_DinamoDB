<?php 
	namespace App\Controllers\Deskapp;
	use App\Controllers\BaseController;
    use App\Models\UserModel;

    /**
     * 
     */
    class Login extends BaseController
    {
    	
	    	public function index()
	    {
	        helper(['form']);
	        echo view('deskapp/auth/login');
	    } 

	    public function auth()
	    {
	   
$session = session();
$model = new UserModel();

$email = $this->request->getPost('email');
$password = $this->request->getPost('password');

// Sanitize and validate user inputs before querying the database

$user = $model->where('email', $email)->first();

if ($user) {
    $storedPassword = $user['password'];

    if (password_verify($password, $storedPassword)) {
        // Password verified successfully
        
        $userData = [
            'id_mem' => $user['id_mem'], // Include the user's ID in session data
            'email' => $user['email'],
            'name' => $user['name'],
            'rules' => $user['rules'],
            'department' => $user['department'],
            'employee_No' => $user['employee_no'],
            'logged_in' => true
        ];

        // Set user session data
        $session->set($userData);

        // Redirect based on user's rule and send id_mem
        $redirectUrl = './deskapp/dashboard';
        switch ($user['rules']) {
            case 1:
                $redirectUrl = './deskapp/dashboard';
                break;
            case 2:
                $redirectUrl = './deskapp/dashboard/two';
                break;
            case 3:
                $redirectUrl = './deskapp/dashboard/three';
                break;
            // Add more cases for other rules
        }

        // Append id_mem (user's ID) to the redirect URL
        $redirectUrl .= '?id_mem=' . urlencode($user['id_mem']);

        return redirect()->to($redirectUrl);
    } else {
        $session->setFlashdata('msg', 'Wrong Password');
    }
} else {
    $session->setFlashdata('msg', 'Username not Found');
}

// Redirect to login page if authentication fails
return redirect()->to('./deskapp/login');
	    }

	   
    }