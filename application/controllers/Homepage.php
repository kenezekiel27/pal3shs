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
	public function register2(){
			
		$this->load->view('homepage/header');
		$this->load->view('homepage/registration2');
		$this->load->view('homepage/footer');
	}
	public function addteacher(){
		$lrn = $_POST['lrn'];
		$lname = $_POST['lname'];
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$sex = $_POST['sex'];
		$bday = $_POST['bday'];
		$bplace = $_POST['bplace'];
		$age = $_POST['age'];
		$height = $_POST['height'];
		$weight = $_POST['weight'];
		$language = $_POST['language'];
		$religion = $_POST['religion'];
		$ethnic_group = $_POST['ethnic_group'];
		$telephone = $_POST['telephone'];
		$mobile = $_POST['mobile'];
		$email = $_POST['email'];
		$this->form_validation->set_message('is_unique', '%s already exist.');
		$this->form_validation->set_rules('lrn', "LRN", 'required|is_unique[teacher_data.lrn]|is_unique[student_data.lrn]');
		$this->form_validation->set_rules('lname', "Last name", 'required');
		$this->form_validation->set_rules('fname', "First name", 'required');
		$this->form_validation->set_rules('mname', "Middle Name", 'required');
		$this->form_validation->set_rules('sex', "Sex", 'required');
		$this->form_validation->set_rules('bday', "Birth Date", 'required');
		$this->form_validation->set_rules('bplace', "Birth Place", 'required');
		$this->form_validation->set_rules('age', "Age", 'required');
		$this->form_validation->set_rules('height', "Height", 'required');
		$this->form_validation->set_rules('weight', "Weight", 'required');
		$this->form_validation->set_rules('language', "Language", 'required');
		$this->form_validation->set_rules('religion', "Religion", 'required');
		$this->form_validation->set_rules('ethnic_group', "Ethnic Group", 'required');
		$this->form_validation->set_rules('telephone', "telephone", 'required');
		$this->form_validation->set_rules('mobile', "mobile", 'required');
		$this->form_validation->set_rules('email', "email", 'required');



		if ($this->form_validation->run() == FALSE) {

			$this->data['status'] = 'error';
			$this->data['msg'] = validation_errors();
			echo json_encode($this->data);
		}
		else{
			$arr = array();
			$personal_info = array(
				array(
					'lname' =>$lname,
					'fname' =>$fname,
					'mname' =>$mname,
					'sex' =>$sex,
					'bday' =>$bday,
					'bplace' =>$bplace,
					'age' =>$age,
					'height' =>$height,
					'weight' =>$weight,
					'language' =>$language,
					'religion' =>$religion,
					'ethnic_group' =>$ethnic_group,
					'telephone'=>$telephone,
					'mobile'=>$mobile,
					'email' =>$email,
				)
			);
			// foreach ($personal_info as $key => $value) {
			// 	array_push($arr, array())
			// }
			$courseadd =  $this->pal_model->add_teacher($lrn,$personal_info);
			$this->data['status'] = 'success';
			$this->data['msg'] = "Successfully added.";
			
			echo json_encode($this->data);
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