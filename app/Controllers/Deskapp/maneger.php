<?php
/*namespace App\Controllers;

use App\Models\UserModel;
use App\Models\SystemManagerModel;

class maneger extends BaseController
{
    public function yourMethod()
    {
        
        $userModel = new UserModel();
        $usersData = $userModel->findAll();

        // Step 2: Transform and combine the data from UserModel with SystemManagerModel fields
        $combinedData = [];
        foreach ($usersData as $user) {
            $combinedData[] = [
                'name' => $user['name'],
                'password' => $user['password'],
                'email' => $user['email'],
                'rules' => $user['rules'],
                // Add additional fields from SystemManagerModel or any other data you want to combine
                // 'field_name' => $value,
                // 'another_field' => $another_value,
            ];
        }

        
        $systemManagerModel = new SystemManagerModel();
        $systemManagerModel->insertBatch($combinedData);

        // Optionally, you might want to delete the data from the UserModel after moving it to SystemManagerModel.
        // $userModel->deleteBatch(['id' => array_column($combinedData, 'id')]);

        // Handle any additional logic, redirects, or responses as needed.
    }
} */