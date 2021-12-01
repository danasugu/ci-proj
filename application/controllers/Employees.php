<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends CI_Controller {

  public function index()
  {

  }

  public function add_employee()
  {
    $this->load->view('dash/add_employee');
  }

  public function add_employee_process()
  {

  }

}

/* End of file Employees.php */
