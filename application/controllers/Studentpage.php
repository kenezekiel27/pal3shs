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
	public function information(){
		$username = $this->session->userdata('user_data');

		$students = $this->pal_model->viewStudent2($username['username']);
		$this->data['student_info'] = $students;
		$this->load->view('studentpage/header');
		$this->load->view('studentpage/information', $this->data);
		$this->load->view('studentpage/footer');
	}
	public function account(){
		$this->load->view('studentpage/header');
		$this->load->view('studentpage/account');
		$this->load->view('studentpage/footer');
	}
	public function updateStudentPersonalInfo(){
		$lrn=$_POST['lrn'];
		$lname=$_POST['lname'];
		$fname=$_POST['fname'];
		$mname=$_POST['mname'];
		$sex=$_POST['sex'];
		$bday=$_POST['bday'];
		$bplace=$_POST['bplace'];
		$age=$_POST['age'];
		$height=$_POST['height'];
		$weight=$_POST['weight'];
		$language=$_POST['language'];
		$religion=$_POST['religion'];
		$egroup=$_POST['egroup'];
		$telephone=$_POST['telephone'];
		$mobile=$_POST['mobile'];
		$email=$_POST['email'];

		$personal = array(
			array(
				'lname' => $lname,
				'fname' => $fname,
				'mname' => $mname,
				'sex' => $sex,
				'bday' => $bday,
				'bplace' => $bplace,
				'age' => $age,
				'height' => $height,
				'weight' => $weight,
				'language' => $language,
				'religion' => $religion,
				'ethnic_group' => $egroup,
				'telephone' => $telephone,
				'mobile' => $mobile,
				'email' => $email,
				
			)
		);
			
		$courseadd =  $this->pal_model->updatePersonalInfoStudent2($lrn,$personal);
		$this->data['status'] = 'success';
		$this->data['msg'] = "Successfully added.";
		
		
		echo json_encode($this->data);
	}
	public function updateStudentAddressInfo(){
		$lrn=$_POST['lrn'];
		$brgy=$_POST['brgy'];
		$municipality=$_POST['municipality'];
		$province=$_POST['province'];

		$address = array(
			array(
				'brgy' => $brgy,
				'municipality' => $municipality,
				'province' => $province,
				
			)
		);
			
		$courseadd =  $this->pal_model->updateAddressInfoStudent2($lrn,$address);
		$this->data['status'] = 'success';
		$this->data['msg'] = "Successfully added.";
		
		
		echo json_encode($this->data);
	}
	public function updateStudentGuardianInfo(){
		$lrn=$_POST['lrn'];
		$g_lname=$_POST['g_lname'];
		$g_fname=$_POST['g_fname'];
		$g_mname=$_POST['g_mname'];
		$g_relation=$_POST['g_relation'];
		$g_contact=$_POST['g_contact'];
		$g_brgy=$_POST['g_brgy'];
		$g_municipality=$_POST['g_municipality'];
		$g_province=$_POST['g_province'];

		$guardian = array(
			array(
				'g_lname' => $g_lname,
				'g_fname' => $g_fname,
				'g_mname' => $g_mname,
				'g_relationship' => $g_relation,
				'g_contact' => $g_contact,
				'g_brgy' => $g_brgy,
				'g_municipality' => $g_municipality,
				'g_province' => $g_province,														
				
			)
		);
			
		$courseadd =  $this->pal_model->updateGuardianInfoStudent2($lrn,$guardian);
		$this->data['status'] = 'success';
		$this->data['msg'] = "Successfully added.";
		
		
		echo json_encode($this->data);
	}
	public function updateStudentEducationalInfo(){
		$lrn=$_POST['lrn'];
		$curriculum=$_POST['curriculum'];
		$school=$_POST['school'];
		$s_brgy=$_POST['s_brgy'];
		$s_municipality=$_POST['s_municipality'];
		$s_province=$_POST['s_province'];
		$s_yearfrom=$_POST['s_yearfrom'];
		$s_yearto=$_POST['s_yearto'];
		$s_average=$_POST['s_average'];

		$education = array(
			array(
				'curriculum' => $curriculum,
				'school' => $school,
				'brgy' => $s_brgy,
				'municipality' => $s_municipality,
				'province' => $s_province,
				'yearfrom' => $s_yearfrom,
				'yearto' => $s_yearto,
				'average' => $s_average,											
				
			)
		);
		$courseadd =  $this->pal_model->updateEducationalInfoStudent2($lrn,$education);
		$this->data['status'] = 'success';
		$this->data['msg'] = "Successfully added.";
		
		
		echo json_encode($this->data);
	}
}