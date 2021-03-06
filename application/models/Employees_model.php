<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employees_model extends CI_Model {

    public function add_employee($employee_details)
    {
      $this->db->insert('employees', $employee_details);

    }

    public function getEmployeesWhereLike($field, $search)
    {
    $query = $this->db->like($field, $search)->orderBy('e_name')->get('employees');
    return $query->result();
    }

}

/* End of file Employees_model.php */
