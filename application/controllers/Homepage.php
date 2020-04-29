<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
if($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
	header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
	header('Access-Control-Allow-Headers: Content-Type');
	exit;
}
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
		
	public function pages_get($page = 'home'){
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
				$this->data['restriction'] = $check['restriction'];
				echo json_encode($this->data);
				$this->session->set_userdata('user_data', $check);
				$this->session->set_userdata('restriction', $check['restriction']);
			}
			
			
		}
	}
	public function register1(){
		$courses = $this->pal_model->courses_offer();
		$this->data['courses'] = $courses;
		
		$this->load->view('homepage/header');
		$this->load->view('homepage/registration1', $this->data);
		$this->load->view('homepage/footer');

	}
	public function addstudent(){
		/*academic level*/
		$type = $_POST['type'];
		$new_acad_level = $_POST['new_acad_level'];
		$new_course = $_POST['new_course'];
		$new_semester = $_POST['new_semester'];
		$new_year = $_POST['new_year'];
		/*$new_yearto= $_POST['new_yearto'];*/
		$old_course = $_POST['old_course'];
		$old_acad_level = $_POST['old_acad_level'];
		$old_semester = $_POST['old_semester'];
		$old_year = $_POST['old_year'];
		/*$old_to = $_POST['old_to'];*/
		$transfer_course = $_POST['transfer_course'];
		$transfer_acad_level = $_POST['transfer_acad_level'];
		$transfer_semester = $_POST['transfer_semester'];
		$transfer_year = $_POST['transfer_year'];
		/*$transfer_to = $_POST['transfer_to'];*/
		/*personal_info*/
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
		/*student address*/
		$brgy = $_POST['brgy'];
		$municipality = $_POST['municipality'];
		$province = $_POST['province'];
		/*guardian information*/
		$g_lname = $_POST['g_lname'];
		$g_fname = $_POST['g_fname'];
		$g_mname = $_POST['g_mname'];
		$g_relationship = $_POST['g_relationship'];
		$g_contact = $_POST['g_contact'];
		$g_brgy = $_POST['g_brgy'];
		$g_municipality = $_POST['g_municipality'];
		$g_province = $_POST['g_province'];
		/*educational_background*/
		$old = $_POST['old_curriculum'];
		$old_school = $_POST['old_school'];
        $old_brgy = $_POST['old_brgy'];
        $old_municipality = $_POST['old_municipality'];
        $old_province = $_POST['old_province'];
        $old_yearfrom = $_POST['old_yearfrom'];
        $old_yearto = $_POST['old_yearto'];
        $old_average = $_POST['old_average'];
        $jshs_school = $_POST['jshs_school'];
        $jshs_brgy = $_POST['jshs_brgy'];
        $jshs_municipality = $_POST['jshs_municipality'];
        $jshs_province = $_POST['jshs_province'];
        $jshs_yearfrom = $_POST['jshs_yearfrom'];
        $jshs_yearto = $_POST['jshs_yearto'];
        $jshs_average = $_POST['jshs_average'];

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
		$this->form_validation->set_rules('brgy', "Barangay", 'required');
		$this->form_validation->set_rules('municipality', "Municipality", 'required');
		$this->form_validation->set_rules('province', "Province", 'required');
		$this->form_validation->set_rules('g_lname', "Guardian Last name", 'required');
		$this->form_validation->set_rules('g_fname', "Guardian First name", 'required');
		$this->form_validation->set_rules('g_mname', "Guardian Middle name", 'required');
		$this->form_validation->set_rules('g_relationship', "Relationship", 'required');
		$this->form_validation->set_rules('g_contact', "Guardian contact", 'required');
		$this->form_validation->set_rules('g_brgy', "Barangay", 'required');
		$this->form_validation->set_rules('g_municipality', "Municipality", 'required');
		$this->form_validation->set_rules('g_province', "Province", 'required');

		if ($this->form_validation->run() == FALSE) {

			$this->data['status'] = 'error';
			$this->data['msg'] = validation_errors();
			echo json_encode($this->data);
		}
		else{
			$arr = array();
			if($type == "new"){
				$acad_level = array(
					array(
						'acad_status' => 'New Student',
						'acad_level' => $new_acad_level,
						'course' => $new_course,
						'semester' => $new_semester,
						'acad_year' => $new_year,
						/*'yearto' => $new_yearto,*/
					)
				);
			}
			else if($type == 'old'){
				$acad_level = array(
					array(
						'acad_status' => 'Old Student',
						'acad_level' => $old_acad_level,
						'course' => $old_course,
						'semester' => $old_semester,
						'acad_year' =>$old_year,
						/*'yearto' => $old_to,*/
					)
				);
			}
			else if($type == "transferee"){
				$acad_level = array(
					array(
						'acad_status' => 'Transfer Student',
						'acad_level' => $transfer_acad_level,
						'course' => $transfer_course,
						'semester' => $transfer_semester,
						'acad_year' =>$transfer_year,
						/*'yearto' => $transfer_to,*/
					)
				);
			}
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
			$address = array(
				array(
					'brgy' => $brgy,
					'municipality' => $municipality,
					'province' => $province, 
				)
			);
			$guardian_info = array(
				array(
					'g_lname' => $g_lname,
					'g_fname' => $g_fname,
					'g_mname' => $g_mname,
					'g_relationship' => $g_relationship,
					'g_contact' =>$g_contact,
					'g_brgy' => $g_brgy,
					'g_municipality' => $g_municipality,
					'g_province' => $g_province,

				)
			);
			if($old==1){
				$educational = array(
					array(
						'curriculum' => 'Old Curriculum',
						'school' => $old_school,
						'brgy' => $old_brgy,
						'municipality' => $old_municipality,
						'province' => $old_province,
						'yearfrom' => $old_yearfrom,
						'yearto' => $old_yearto,
						'average' => $old_average,
					)
				);
			}
			else{
				$educational = array(
					array(
						'curriculum' => 'Junior High School',
						'school' => $jshs_school,
						'brgy' => $jshs_brgy,
						'municipality' => $jshs_municipality,
						'province' => $jshs_province,
						'yearfrom' => $jshs_yearfrom,
						'yearto' => $jshs_yearto,
						'average' => $jshs_average,
					)
				);
			}
			$courseadd =  $this->pal_model->add_student($lrn,$personal_info,$address,$guardian_info,$educational,$acad_level);
			$this->data['status'] = 'success';
			$this->data['msg'] = "Successfully added.";
			
			echo json_encode($this->data);
		}
	}
	public function enrollStudent(){
		$id=$_POST['id'];
		$course = $_POST['course'];
		$acad_level = $_POST['acad_level'];
		$acad_sem = $_POST['acad_sem'];
		$acad_year = $_POST['acad_year'];
		$acad_status = $_POST['acad_status'];

		$this->form_validation->set_rules('course', "Course", 'required');
		$this->form_validation->set_rules('acad_level', "academic level", 'required');
		$this->form_validation->set_rules('acad_sem', "Semester", 'required');
		$this->form_validation->set_rules('dummy', "Academic year", 'required');
		if ($this->form_validation->run() == FALSE) {

			$this->data['status'] = 'error';
			$this->data['msg'] = validation_errors();
			$this->data['course'] = $course;
			$this->data['level'] = $acad_level;
			$this->data['semester'] = $acad_sem;
			$this->data['year'] = $acad_year;
		}
		else{
			$courseData = $this->pal_model->update_course($course);

			$acad_level = array(
				array(
					'acad_status' => $acad_status,
					'acad_level' => $acad_level,
					'course' => $courseData['course_name'],
					'semester' => $acad_sem,
					'acad_year' => $acad_year,
					
				)
			);
			
			$courseadd =  $this->pal_model->enrollStudent($id,$acad_level);
			$this->data['status'] = 'success';
			$this->data['msg'] = "Successfully added.";
		}
		
		
		echo json_encode($this->data);
	}
	public function register2(){
			
		$this->load->view('homepage/header');
		$this->load->view('homepage/registration2');
		$this->load->view('homepage/footer');
	}
	public function addteacher(){
		$lrn = $_POST['lrn'];
		/*personal_info*/
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
		/*adress*/
		$brgy = $_POST['brgy'];
        $municipality = $_POST['municipality'];
        $province = $_POST['province'];
        /*guardian info*/
        $g_lname = $_POST['g_lname'];
		$g_fname = $_POST['g_fname'];
		$g_mname = $_POST['g_mname'];
		$g_relationship = $_POST['g_relationship'];
		$g_contact = $_POST['g_contact'];
		$g_brgy = $_POST['g_brgy'];
		$g_municipality = $_POST['g_municipality'];
		$g_province = $_POST['g_province'];
		/*educational background*/
		$school_name = $_POST['school_name'];
		$degree = $_POST['degree'];
		$course = $_POST['course'];
		$s_brgy = $_POST['s_brgy'];
		$s_municipality = $_POST['s_municipality'];
		$s_province = $_POST['s_province'];
		$year_from = $_POST['year_from'];
		$year_to = $_POST['year_to'];
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
		$this->form_validation->set_rules('brgy', "Barangay", 'required');
		$this->form_validation->set_rules('municipality', "municipality", 'required');
		$this->form_validation->set_rules('province', "province", 'required');
		$this->form_validation->set_rules('g_lname', "Last name", 'required');
		$this->form_validation->set_rules('g_fname', "First name", 'required');
		$this->form_validation->set_rules('g_mname', "Middle name", 'required');
		$this->form_validation->set_rules('g_relationship', "Relationship", 'required');
		$this->form_validation->set_rules('g_contact', "Contact", 'required');
		$this->form_validation->set_rules('g_brgy', "Barangay", 'required');
		$this->form_validation->set_rules('g_municipality', "Municipality", 'required');
		$this->form_validation->set_rules('school_name', "School name", 'required');
		$this->form_validation->set_rules('degree', "Bachelor Degree", 'required');
		$this->form_validation->set_rules('s_brgy', "Barangay", 'required');
		$this->form_validation->set_rules('s_municipality', "Municipality", 'required');
		$this->form_validation->set_rules('s_province', "Province", 'required');
		$this->form_validation->set_rules('year_from', "Academic year from", 'required');
		$this->form_validation->set_rules('year_to', "Academic year to", 'required');


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
			$address = array(
				array(
					'brgy' => $brgy,
					'municipality' => $municipality,
					'province' => $province,
				)
			);
			$guardian_info = array(
				array(
					'g_lname'=>$g_lname,
					'g_fname'=>$g_fname,
					'g_mname'=>$g_mname,
					'g_relationship'=>$g_relationship,
					'g_contact'=>$g_contact,
					'g_brgy'=>$g_brgy,
					'g_municipality'=>$g_municipality,
					'g_province'=>$g_province,
				)
			);
			$educational_background = array(
				array(
					'school_name'=>$school_name,
					'degree' =>$degree,
					'course'=>$course,
					's_brgy'=>$s_brgy,
					's_municipality'=>$s_municipality,
					's_province'=>$s_province,
					'year_from'=>$year_from,
					'year_to'=>$year_to,
				)
			);
			// foreach ($personal_info as $key => $value) {
			// 	array_push($arr, array())
			// }
			$courseadd =  $this->pal_model->add_teacher($lrn,$personal_info,$address,$guardian_info,$educational_background);
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