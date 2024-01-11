<?php

namespace App\Controllers\Deskapp;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\SystemManagerModel;

class Register extends BaseController
{
    public function index()
    {
        helper(['form']);
        $data = [];
        return view('deskapp/auth/register', $data);
    }

    public function save()
    {
       // ini_set('display_errors', 1);
        //ini_set('display_startup_errors', 1);
        helper(['form','url']);
        
        $rules = [
            'name' => 'required|min_length[2]|max_length[100]',
            'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[user.Email]',
            'department' => 'required|min_length[2]|max_length[100]',
            'employee_no' => 'required|min_length[5]|max_length[100]',
            'password' => 'required|min_length[7]|max_length[200]',
            'job_t' => 'required|min_length[2]|max_length[100]',
            'rules' => 'required',
        ];

        if ($this->request->getMethod() == 'post' && $this->validate($rules)) {
            $model = new UserModel();

            $data = [
                'email' => $this->request->getVar('email'),
                'name' => $this->request->getVar('name'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'rules' => $this->request->getVar('rules'),
                'department' => $this->request->getVar('department'),
                'employee_no' => $this->request->getVar('employee_no'),
                'job_t' => $this->request->getVar('job_t'),
            ];

            $data2 = [
                'email' => $this->request->getVar('email'),
                'name' => $this->request->getVar('name'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'rules' => $this->request->getVar('rules'),
            ];

            //print_r ($data);

             // Save user data
             $model = new UserModel();
             $model->save($data); 

            // Save System Manager data
            if ($data['rules'] == 1) {
                $managerModel = new SystemManagerModel();
                $managerModel->save($data2);
            }
            
             return redirect()->to('/deskapp/ui/buttons');

        } else {
            $data['validation'] = $this->validator;
            return view('deskapp/auth/register', $data);
        }


    }

}
