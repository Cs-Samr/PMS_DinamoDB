<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey  ='id_mem';
    protected $allowedFields = ['email', 'name', 'password', 'rules', 'department', 'employee_no', 'job_t'];

    public function getUser()
    {
        //return $this->select('email, name, rules, department, employee_no, job_t','password')->findAll();
        return $this->select('*')->findAll();

    }
    public function deleteUser($userId)
    {
        
        return $this->where('id_mem', $userId)->delete();
    }
    public function getAssignmentsByProject($users_id)
    {
        return $this->where('id_mem', $users_id)->findAll();
    }
   
    public function getUserCount()
    {
        // Count the number of rows (users) in the 'user' table
        return $this->countAllResults();
    }

    public function getAllNames()
    {
        $query = $this->select('name')->findAll();
        $names = array_column($query, 'name');
        return $names;
    }

    public function getSelectedNamesForUser($userId)
{
    // Replace 'selected_names_table' with the actual table name where you store selected names
    $selectedNamesQuery = $this->db->table('user')
        ->select('name')
        ->where('user_id', $userId)
        ->get();

    $selectedNames = array_column($selectedNamesQuery->getResultArray(), 'name');
    return $selectedNames;
}


}