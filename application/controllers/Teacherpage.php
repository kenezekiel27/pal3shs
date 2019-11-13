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
	public function advisory(){
		$username = $this->session->userdata('user_data');
		$teacher = $this->pal_model->viewTeacher2($username['username']);
		$sectiondata = $this->pal_model->view_advisory($teacher['id']);
		
		$allstudent = $this->pal_model->student_data();
		$listofstudent = json_decode($sectiondata['student_id'], TRUE);
		$arr = array();
		if (count($listofstudent) > 0) {
			foreach ($listofstudent as $key => $value) {
				foreach ($allstudent as $key => $value2) {
					if ($value['id'] == $value2->id) {
						$olddata = json_decode($value2->personal_info, TRUE);
						
						foreach ($olddata as $key => $value3) {
							$fullname = ucfirst($value3['fname']).' '.ucfirst($value3['mname'][0]).'. '. ucfirst($value3['lname']);
							array_push($arr, array("id"=>$value2->id,"lrn" => $value2->lrn, "fullname" => $fullname));
						}
					}
				}
			}
		}
		
		$this->data['advisory'] = $arr;

		$this->data['sectiondata'] = $sectiondata;
		$this->load->view('teacherpage/header');
		$this->load->view('teacherpage/advisory', $this->data);
		$this->load->view('teacherpage/footer');
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

	public function myStudents(){
		$username = $this->session->userdata('user_data');

		$teacher = $this->pal_model->viewTeacher2($username['username']);

		$allsubjects = $this->pal_model->subject();
		$data = array();

		foreach ($allsubjects as $value) {
			$parseTeacherinSubjects = json_decode($value->teachers_of_this_subject, TRUE);
			if (count($parseTeacherinSubjects) > 0) {
				foreach ($parseTeacherinSubjects as $key => $value2) {
					if ($value2['idofteacher'] == $teacher['id']) {
						array_push($data, array(
							"id" => $key.''.rand(1,100),
							"academic_year" => $value2['academic_year'],
							"course" => $value2['course'],
							"academic_level" => $value2['academic_level'],
							"semester" => $value2['semester'],
							"status" => $value2['status'],
							"sectionName" => $value2['sectionName'],
							"status" => $value2['status'],
							"subject_code" =>$value->subject_code,
							"subject_description" => $value->subject_description
						));
					}
				}
			}
		}
		$this->data['allstudent'] = $data;

		$this->load->view('teacherpage/header');
		$this->load->view('teacherpage/myStudents', $this->data);
		$this->load->view('teacherpage/footer');
	}

	public function setSessionForData(){
		$academic_year = $_POST['academic_year'];
		$academic_level = $_POST['academic_level'];
		$status = $_POST['status'];
		$course = $_POST['course'];
		$semester = $_POST['semester'];
		$sectionName = $_POST['sectionName'];
		$subject_code = $_POST['subject_code'];
		$subject_description = $_POST['subject_description'];
		$this->session->set_userdata('academic_year', $academic_year);
		$this->session->set_userdata('academic_level', $academic_level);
		$this->session->set_userdata('status', $status);
		$this->session->set_userdata('course', $course);
		$this->session->set_userdata('semester', $semester);
		$this->session->set_userdata('sectionName', $sectionName);
		$this->session->set_userdata('subject_code', $subject_code);
		$this->session->set_userdata('subject_description', $subject_description);
		$this->data['status'] = "success";

		echo json_encode($this->data);
	}
	public function myStudentsList(){
		$academic_year = $this->session->userdata('academic_year');
		$academic_level = $this->session->userdata('academic_level');
		$status = $this->session->userdata('status');
		$course = $this->session->userdata('course');
		$semester = $this->session->userdata('semester');
		$sectionName = $this->session->userdata('sectionName');
		$subject_code = $this->session->userdata('subject_code');
		$subject_description = $this->session->userdata('subject_description');
		$sectionData = $this->pal_model->section_list();
		$student = $this->pal_model->student_data();
		$listofallstudent = array();
		foreach ($sectionData as $key => $value) {
			if ($value->section_name == $sectionName && $value->semester == $semester && $value->academic_year == $academic_year && $value->academic_level == $academic_level && $value->status == $status && $value->course == $course) {
				
			}
			else{
				unset($sectionData[$key]);
			}
		}

		foreach ($sectionData as $value) {
			$parseData = json_decode($value->student_id, TRUE);
			if (count($parseData) > 0) {
				foreach ($parseData as $value2) {
					foreach ($student as $value3) {
						if ($value2['id'] == $value3->id) {
							$parseStudent = json_decode($value3->personal_info, TRUE);
							foreach ($parseStudent as $value4) {
								$name = ucfirst($value4['fname']).' '.ucfirst($value4['mname'][0]).'. '. ucfirst($value4['lname']);
								array_push($listofallstudent, array(
									"id" => $value3->id,
									"name" => $name,
									"lrn" => $value3->lrn
								));
							}
							
						}
					}
				}
			}
		}
		$this->data['listofallstudent'] = $listofallstudent;
		$this->data['academic_year'] = $academic_year;
		$this->data['academic_level'] = $academic_level;
		$this->data['status'] = $status;
		$this->data['course'] = $course;
		$this->data['semester'] = $semester;
		$this->data['sectionName'] = $sectionName;
		$this->data['subject_code'] = $subject_code;
		$this->data['subject_description'] = $subject_description;
		$this->load->view('teacherpage/header');
		$this->load->view('teacherpage/myStudentsList', $this->data);
		$this->load->view('teacherpage/footer');
	}
}