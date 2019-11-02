<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
		
	public function pages($page = 'home'){
		if ($page == "about-mission" || $page == "about-vision" || $page == "about-history" ) {
			$page = "about";
		}
		else if($page == "courses-abm" || $page == "courses-stem" || $page == "courses-humss"){
			$page = "courses";
		}
		if (!file_exists(APPPATH.'views/homepage/'.$page.'.php')) {
			show_404();
		};
		$this->load->view('homepage/header');
		$this->load->view('homepage/'.$page);
		$this->load->view('homepage/footer');
	}
	public function login(){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$this->form_validation->set_rules('username', "Username", 'required');
		$this->form_validation->set_rules('password', "Password", 'required');
		if ($this->form_validation->run() == FALSE) {

			$this->data['status'] = 'error';
			$this->data['msg'] = validation_errors();
			echo json_encode($this->data);
		}
		else{
			$credentials = array(
				'username' => $username,
				'password' => $password
			);
			$check = $this->pal_model->login($credentials);
			if($check == null){
				$this->data['status'] = 'error';
				$this->data['msg'] = "Invalid username or password";
				echo json_encode($this->data);
			}
			else{
				$this->data['status'] = 'success';
				$this->data['msg'] = "Logging in. Please wait!";
				$this->data['credentials'] = $check;
				echo json_encode($this->data);
				$this->session->set_userdata('user_data', $check);
			}
			
			
		}
		
	}

	// public function index()
	// {

	// 	$this->load->view('homepage/header');
	// 	$this->load->view('homepage/index');
	// 	$this->load->view('homepage/footer');
	// }
	// public function about(){
	// 	$this->load->view('homepage/header');
	// 	$this->load->view('homepage/about');
	// 	$this->load->view('homepage/footer');
	// }
	// public function mission(){
	// 	$this->load->view('homepage/header');
	// 	$this->load->view('homepage/about');
	// 	$this->load->view('homepage/footer');
	// }
	// public function vision(){
	// 	$this->load->view('homepage/header');
	// 	$this->load->view('homepage/about');
	// 	$this->load->view('homepage/footer');
	// }
	// public function history(){
	// 	$this->load->view('homepage/header');
	// 	$this->load->view('homepage/about');
	// 	$this->load->view('homepage/footer');
	// }
	// public function courses(){
	// 	$this->load->view('homepage/header');
	// 	$this->load->view('homepage/courses');
	// 	$this->load->view('homepage/footer');
	// }
	// public function abm(){
	// 	$this->load->view('homepage/header');
	// 	$this->load->view('homepage/courses');
	// 	$this->load->view('homepage/footer');
	// }
	// public function humss(){
	// 	$this->load->view('homepage/header');
	// 	$this->load->view('homepage/courses');
	// 	$this->load->view('homepage/footer');
	// }
	// public function stem(){
	// 	$this->load->view('homepage/header');
	// 	$this->load->view('homepage/courses');
	// 	$this->load->view('homepage/footer');
	// }

	// public function contact(){
	// 	$this->load->view('homepage/header');
	// 	$this->load->view('homepage/contact');
	// 	$this->load->view('homepage/footer');
	// }
}