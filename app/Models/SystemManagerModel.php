<?php

namespace App\Models;

use CodeIgniter\Model;

class SystemManagerModel extends Model
{
    protected $table = 'system_maneger';
    //protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'password', 'email', 'rules'];

    public function getuser()
    {
        return $this->findAll();
    }
}


