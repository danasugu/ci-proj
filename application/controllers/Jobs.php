<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Jobs_model');

  }

  public function index()
  {
    $this->load->view('dash/add_job');
  }

  public function view_jobs()
  {
    $this->load->view('dash/job_list');

  }

  public function add_job()
  {
    if( $this->input->post('add_job') )
    {
      $j_name = $this->input->post('j_name');

      $jobs_data = array (
        'j_name' => $j_name
      );
      // var_dump($job_details);
      $this->Jobs_model->add_job( $jobs_data );
      redirect('jobs','reload');
      // echo 'success!';
    }

  }

}

/* End of file Jobs.php */
