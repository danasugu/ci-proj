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
      redirect('jobs/view_jobs','reload');
      // echo 'success!';
    }

  }

  public function update_job($j_id)
  {
    $this->load->view('dash/update_job', $j_id);
  }

  public function update_process_jobs($j_id)
  {
    // echo $j_id;
    if( $this->input->post('update_job'))
    {

    }
  }

}

/* End of file Jobs.php */
