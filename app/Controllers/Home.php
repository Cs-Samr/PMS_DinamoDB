<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {

	    return view('welcome_message');

        // // Load the email library
        // $email = \Config\Services::email();

        // // Email configuration
         // $config = [
        //     'protocol' => 'smtp',
        //     'SMTPHost' => 'smtp.mailtrap.io',
        //     'SMTPUser' => 'ece7d66ef6d99d',
        //     'SMTPPass' => '9c54b44e082dfc',
        //     'SMTPPort' => 2525,
        // ];

        // $email->initialize($config);

        // // Set email details
        // $email->setFrom('smr.aff.alh@gmail.com', date('Y.m.d h:i:s'));
        // $email->setTo('jjoouud@gmail.com');
        // $email->setSubject('Email Test');
        // $email->setMessage('Visit this link to reset your password: http://localhost/MS/deskapp/Additionalpages/reset_password');

        // try {
        //     // Send the email
        //     if ($email->send()) {
        //         $email->printDebugger(['header']);
        //     } else {
        //         echo "Email sending failed!";
        //         $email->printDebugger(['messages']);
        //     }
        // } catch (\Exception $e) {
        //     echo "An error occurred: " . $e->getMessage();
        // }
    }
}
