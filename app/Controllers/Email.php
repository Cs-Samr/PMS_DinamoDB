<?php
namespace App\Controllers;

class Email extends BaseController
{
    public function sendEmail_ForgotPassword()
    {
        // Load the email library
        $email = \Config\Services::email();

        // Email configuration
        $config = [
            'protocol' => 'smtp',
            'SMTPHost' => 'smtp.mailtrap.io',
            'SMTPUser' => 'ece7d66ef6d99d',
            'SMTPPass' => '9c54b44e082dfc',
            'SMTPPort' => 2525,
        ];

        $email->initialize($config);

        // Get the email address from the form submission
        $recipientEmail = $this->request->getPost('email');

        // Set email details
        $email->setFrom('smr.aff.alh@gmail.com', date('Y.m.d h:i:s'));
        $email->setTo($recipientEmail); // Use the recipient email from the form
        $email->setSubject('Reset your password');
        $email->setMessage('Visit this link to reset your password: http://localhost/MS/deskapp/Additionalpages/reset_password');

        try {
            // Send the email
            if ($email->send()) {
                // Set success flashdata
                return redirect()->to(previous_url())->with('success_message', 'Email sent successfully.');
            } else {
                // Set error flashdata
                return redirect()->to(previous_url())->with('error_message', 'Email sending failed.');
            }
        } catch (\Exception $e) {
            // Set error flashdata
            return redirect()->to(previous_url())->with('error_message', 'An error occurred: ' . $e->getMessage());
        }
    }
}

