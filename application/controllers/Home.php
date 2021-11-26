<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users');

	}

	public function index()
	{
		$this->load->view('dash/inc/header');
		$this->load->view('home');
		$this->load->view('dash/inc/footer');
	}

	public function upload(){
		$this->load->view('inc/header');
		$this->load->view('upload');
		$this->load->view('inc/footer');
	}

	public function register(){
		$this->load->view('dash/inc/header');
		$this->load->view('register');
		$this->load->view('dash/inc/footer');
	}

	public function login_process(){
		if($this->input->post('u_login')){
						$u_name = $this->input->post('u_name');
						$u_pass = md5($this->input->post('u_pass'));

						$user_data = array(
							'u_name' => $u_name,
							'u_pass' => $u_pass
						);
						// echo "<pre>";
						// var_dump($user_data);
						$users_list = $this->db->get_where( 'users', array( 'u_name' => $user_data[ 'u_name'] ));
									foreach ( $users_list -> result() as $user )
									{
										if( $user_data['u_name'] == $user-> u_name && $user_data['u_pass'] == $user->u_pass )
										{
											// print_r($u_name);
											// echo 'hi, DS!';
												$_SESSION['u_name'] = $user_data['u_name'];
												redirect('dash', 'refresh');
										} else {
											echo "<script>alert('Username or password not matching. Try again')</script>";
											redirect('home', 'refresh');
										}
									}

		} else{
			redirect('home', 'refresh');
		}
	}
	public function register_process(){
		if($this->input->post('u_reg')){
			$u_email = $this->input->post('u_email');
			$u_name = $this->input->post('u_name');
			$u_pass = md5($this->input->post('u_pass'));

			$user_data = array(
				'u_email' 	=> $u_email,
				'u_name' 	=> $u_name,
				'u_pass' 	=> $u_pass
			);
			// echo "<pre>";
			// var_dump($user_data);
			$this->Users->insert_user($user_data);
			redirect('home', 'refresh');

		} else{
            redirect('home', 'refresh');
        }
	}


	public function logout() {
		session_unset();
		session_destroy();
		redirect('home/login_process', 'refresh');
	}

}
