<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Studentpage extends CI_Controller {

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
	function __construct()
	{
		parent::__construct();
		
		$this->isLogin();
	}
	private function isLogin(){
		if($this->session->userdata('user_data') == "" || $this->session->userdata('restriction') == "admin" ){
			redirect('home');
		}
	}
	
	public function dashboardStudent(){
		// $teachers = $this->pal_model->teacher_data();
		// $this->data['personal_info'] = $teachers;
		$this->load->view('studentpage/header');
		$this->load->view('studentpage/dashboard');
		$this->load->view('studentpage/footer');
	}
	public function logout(){
		session_destroy();

		$this->session->unset_userdata('user_data');

		redirect('home');
	}
	
}