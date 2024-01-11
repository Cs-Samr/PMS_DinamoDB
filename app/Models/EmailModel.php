<?php

namespace App\Models;

use CodeIgniter\Model;

class EmailModel extends Model
{
    protected $table = 'user'; // Replace 'user' with your actual database table name
    protected $primaryKey = 'id_mem'; // Replace 'id' with your actual primary key column name

    // Method to check if email exists in the database
    public function checkEmailExists($email)
    {
        return $this->where('email', $email)->countAllResults() > 0;
    }
}
