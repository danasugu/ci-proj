<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends CI_Controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->model('Employees_model');

  }


  public function index()
  {

    $this->load->view('dash/employee_list');
     $filter = $this->input->post('filter');
        $field  = $this->input->post('field');
        $search = $this->input->post('search');

        if (isset($filter) && !empty($search)) {
            $this->load->model('students/Employees_model');
            $data['students'] = $this->Student_Model->getStudentsWhereLike($field, $search);
        } else {
            $this->load->model('students/Student_Model');
            $data['students'] = $this->Student_Model->getStudents();
        }

        $data['module']    = 'admin';
        $data['view_file'] = 'students/view';

        $this->load->module('templates');
        $this->templates->admin($data);

  }

  public function single_employee($e_id)
  {

    $this->load->view('dash/single_employee', $e_id);

  }

  public function add_employee()
  {
    $this->load->view('dash/add_employee');
  }

  public function update_employee_process($e_id)
  {
     $e_name = $this->input->post('e_name');
     $e_email = $this->input->post('e_email');
     $e_phone = $this->input->post('e_phone');
     $e_job = $this->input->post('e_job');

     $employee_details = array(
     'e_name' => $e_name,
     'e_email' => $e_email,
     'e_phone' => $e_phone,
     'e_job' => $e_job
     );

    //  print_r($employee_details);
    $this->db->where('e_id', $e_id);
    $this->db->update('employees', $employee_details);
    redirect('employees', 'refresh');
  }

  public function update_employee($e_id)
  {

    $this->load->view('dash/update_employee', $e_id);

  }

  public function add_employee_process()
  {
    if($this->input->post('add_employee'))
    {
      $e_name = $this->input->post('e_name');
      $e_email = $this->input->post('e_email');
      $e_phone = $this->input->post('e_phone');
      $e_job = $this->input->post('e_job');

      $employee_details = array(
        'e_name' => $e_name,
        'e_email' => $e_email,
        'e_phone' => $e_phone,
        'e_job' => $e_job
      );
        // echo "<pre>";
        // print_r($employee_details);

        $this->Employees_model->add_employee($employee_details);
        redirect('employees', 'refresh');
    }
  }

  public function delete_employee($e_id)
  {
    $this->db->where('e_id', $e_id);

    $this->db->delete('employees');
    redirect('employees', 'refresh');

  }

}

/* End of file Employees.php */
