<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employees_model extends CI_Model {

    public function add_employee($employee_details)
    {
      $this->db->insert('employees', $employee_details);

    }

}

/* End of file Employees_model.php */
