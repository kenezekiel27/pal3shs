<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacherpage extends CI_Controller {

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
		if($this->session->userdata('user_data') == "" || $this->session->userdata('restriction') == "student" ){
			redirect('home');
		}
	}
	
	public function dashboardTeacher(){
		// $teachers = $this->pal_model->teacher_data();
		// $this->data['personal_info'] = $teachers;
	
		$this->load->view('teacherpage/header');
		$this->load->view('teacherpage/dashboard');
		$this->load->view('teacherpage/footer');
	}
	public function logout(){
		session_destroy();

		$this->session->unset_userdata('user_data');

		redirect('home');
	}
	
	public function information(){
		$username = $this->session->userdata('user_data');

		$teacher = $this->pal_model->viewTeacher2($username['username']);
		$this->data['teacher_info'] = $teacher;
		$this->load->view('teacherpage/header');
		$this->load->view('teacherpage/information', $this->data);
		$this->load->view('teacherpage/footer');
	}
	public function updateTeacherPersonalInfo(){
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
			
		$courseadd =  $this->pal_model->updatePersonalInfoTeacher2($lrn,$personal);
		$this->data['status'] = 'success';
		$this->data['msg'] = "Successfully added.";
		
		
		echo json_encode($this->data);
	}
	public function updateTeacherAddressInfo(){
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
			
		$courseadd =  $this->pal_model->updateAddressInfoTeacher2($lrn,$address);
		$this->data['status'] = 'success';
		$this->data['msg'] = "Successfully added.";
		
		
		echo json_encode($this->data);
	}
	public function updateTeacherGuardianInfo(){
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
			
		$courseadd =  $this->pal_model->updateGuardianInfoTeacher2($lrn,$guardian);
		$this->data['status'] = 'success';
		$this->data['msg'] = "Successfully added.";
		
		
		echo json_encode($this->data);
	}
	public function updateTeacherEducationalInfo(){
		$lrn=$_POST['lrn'];
		$school=$_POST['school'];
		$degree=$_POST['degree'];
		$course=$_POST['course'];
		$brgy=$_POST['brgy'];
		$municipality=$_POST['municipality'];
		$province=$_POST['province'];
		$yearfrom=$_POST['yearfrom'];
		$yearto=$_POST['yearto'];
		$education = array(
			array(
				'school_name' => $school,
				'degree' => $degree,
				'course' => $course,
				's_brgy' => $brgy,
				's_municipality' => $municipality,
				's_province' => $province,
				'year_from' => $yearfrom,
				'year_to' => $yearto,										
				
			)
		);
			
		$courseadd =  $this->pal_model->updateEducationalInfoTeacher2($lrn,$education);
		$this->data['status'] = 'success';
		$this->data['msg'] = "Successfully added.";
		
		
		echo json_encode($this->data);
	}
}