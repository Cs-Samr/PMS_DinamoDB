<?php

namespace App\Models;

use CodeIgniter\Model;


class ProjectAssign extends Model
{
    protected $table = 'project_assign';
    protected $primaryKey  ='id_assign';
    protected $allowedFields = ['id_memfk', 'id_projectfk'];

    public function getUser()
    {
        //return $this->select('email, name, rules, department, employee_no, job_t','password')->findAll();
        return $this->select('*')->findAll();

    }
    public function deleteProject($id_project)
{
    return $this->where('id_projectfk', $id_project)->delete();
}

public function getAssignmentsByProject($id_project)
    {
        return $this->select('id_memfk')->where('id_projectfk', $id_project)->findAll();
    }

}
