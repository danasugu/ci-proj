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

  public function add_job() {
    if($this->input->post['add_job'])
    {
      // $j_name = $this->input->post['j_name'];
      echo "string";
    }
  }

}

/* End of file Jobs.php */
