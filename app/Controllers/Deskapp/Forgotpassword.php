<?php

namespace App\Controllers\Deskapp;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Forgotpassword extends BaseController
{
    public function index()
    {
        return view('deskapp/auth/forgot-password');
    }

}