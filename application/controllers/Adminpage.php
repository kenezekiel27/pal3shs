<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminpage extends CI_Controller {

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
		if($this->session->userdata('user_data') == "" || $this->session->userdata('restriction') == "student"){
			redirect('home');
		}
	}
	
	public function dashboard(){
		$teachers = $this->pal_model->teacher_data();
		$students = $this->pal_model->student_data();
		$this->data['personal_info'] = $teachers;
		$this->data['student_info'] = $students;
		$this->load->view('adminpage/header');
		$this->load->view('adminpage/dashboard', $this->data);
		$this->load->view('adminpage/footer');
	}
	public function logout(){
		session_destroy();

		$this->session->unset_userdata('user_data');

		redirect('home');
	}
	//viewing of course list
	public function course(){
		$courses = $this->pal_model->courses_offer();
		
		$this->data['courses'] = $courses;
		$this->load->view('adminpage/header');
		$this->load->view('adminpage/course', $this->data);
		$this->load->view('adminpage/footer');
	}
	public function addCourse(){
		$track = $_POST['track'];
		$strand = $_POST['strand'];
		$this->form_validation->set_message('is_unique', '%s already exist.');
		$this->form_validation->set_rules('track', "Academic Track", 'required');
		$this->form_validation->set_rules('strand', "Academic Strand", 'required|is_unique[course_offer.academic_strand]');

		if ($this->form_validation->run() == FALSE) {

			$this->data['status'] = 'error';
			$this->data['msg'] = validation_errors();
			echo json_encode($this->data);
		}
		else{
			$course_data = array(
				'academic_track' => $track,
				'academic_strand' => $strand,
				'course_name' => $track.'/'.$strand
			);
			$courseadd =  $this->pal_model->add_course($course_data);
			$this->data['status'] = 'success';
			$this->data['msg'] = "Successfully added a course.";
			$new_course = array(
				'course_name' => $track.'/'.$strand,
				'id' => $courseadd
			);
			$this->data['data'] = $new_course;
			echo json_encode($this->data);
		}
	}
	public function removeCourse(){
		$id = $_POST['id'];
		$result = $this->pal_model->remove_course($id);
		$this->data['status'] = 'success';
		$this->data['msg'] = "Successfully removed a course.";
		echo json_encode($this->data);
	}
	public function courseUpdate($id){
		$data['course'] = $this->pal_model->update_course($id);
		$data['subjects'] = $this->pal_model->subject();
		$onegrade11 = json_decode($data['course']['firstsemgrade11']);
		$twograde11 = json_decode($data['course']['secondsemgrade11']);
		$onegrade12 = json_decode($data['course']['firstsemgrade12']);
		$twograde12 = json_decode($data['course']['secondsemgrade12']);
		if(count($onegrade11) > 0){
			foreach ($data['subjects'] as $key => $value) {
				foreach ($onegrade11 as $value2) {
					if ($value->id == $value2->id) {
						unset($data['subjects'][$key]);
					}
				}
			}
		}
		if(count($twograde11) > 0){
			foreach ($data['subjects'] as $key => $value) {
				foreach ($twograde11 as $value2) {
					if ($value->id == $value2->id) {
						unset($data['subjects'][$key]);
					}
				}
			}
		}
		if(count($onegrade12) > 0){
			foreach ($data['subjects'] as $key => $value) {
				foreach ($onegrade12 as $value2) {
					if ($value->id == $value2->id) {
						unset($data['subjects'][$key]);
					}
				}
			}
		}
		if(count($twograde12) > 0){
			foreach ($data['subjects'] as $key => $value) {
				foreach ($twograde12 as $value2) {
					if ($value->id == $value2->id) {
						unset($data['subjects'][$key]);
					}
				}
			}
		}
		if(empty($data['course'])){
			show_404();
		}
		

		$this->load->view('adminpage/header');
		$this->load->view('adminpage/courseUpdate', $data);
		$this->load->view('adminpage/footer');
	}

	public function updateCourseData(){
		$id = $_POST['id'];
		$subjects = $_POST['subjects'];
		$status = $_POST['status'];
		$data['course'] = $this->pal_model->update_course($id);

		$rowname = '';
		$newData = array();
		if($status == 1){
			$rowname = 'firstsemgrade11';
			
			$oldData = json_decode($data['course']['firstsemgrade11']);
			if(count($oldData) > 0){
				foreach ($oldData as $value) {
					array_push($newData, array('id' => $value->id));
				}	
			}
		}
		else if($status == 2){
			$rowname = 'secondsemgrade11';
			
			$oldData = json_decode($data['course']['secondsemgrade11']);
			if(count($oldData) > 0){
				foreach ($oldData as $value) {
					array_push($newData, array('id' => $value->id));
				}	
			}
		}
		else if($status == 3){
			$rowname = 'firstsemgrade12';
			
			$oldData = json_decode($data['course']['firstsemgrade12']);
			if(count($oldData) > 0){
				foreach ($oldData as $value) {
					array_push($newData, array('id' => $value->id));
				}	
			}
		}
		else if($status == 4){
			$rowname = 'secondsemgrade12';
			
			$oldData = json_decode($data['course']['secondsemgrade12']);
			if(count($oldData) > 0){
				foreach ($oldData as $value) {
					array_push($newData, array('id' => $value->id));
				}	
			}
		}


		for ($i=0; $i < count($subjects); $i++) { 
					
			array_push($newData, array('id' => $subjects[$i]));
		}
		$result = $this->pal_model->update_course_data($rowname, $id, $newData);
		$this->data['status'] = "success";


		echo json_encode($this->data);
		
	}
	

	public function subject(){
		$this->data['subjects'] = $this->pal_model->subject();
		$this->load->view('adminpage/header');
		$this->load->view('adminpage/subject', $this->data);
		$this->load->view('adminpage/footer');
	}
	public function listofsubjectperlevel(){
		$id = $_POST['id'];
		$status = $_POST['status'];
		$data['course'] = $this->pal_model->update_course($id);
		$data['subjects'] = $this->pal_model->subject();
		$arr = array();
		if($status == 1){
			$data['olddata'] = json_decode($data['course']['firstsemgrade11']);
			if($data['subjects'] > 0 && $data['olddata'] > 0){
				foreach ($data['subjects'] as $key => $value) {
					foreach ($data['olddata'] as $value2) {
						if($value2->id == $value->id){
							array_push($arr, array("id" => $value->id, "subject_description" => $value->subject_description));	
						}
					}
				}
			}
		}
		else if($status == 2){
			$data['olddata'] = json_decode($data['course']['secondsemgrade11']);
			if($data['subjects'] > 0 && $data['olddata'] > 0){
				foreach ($data['subjects'] as $key => $value) {
					foreach ($data['olddata'] as $value2) {
						if($value2->id == $value->id){
							array_push($arr, array("id" => $value->id, "subject_description" => $value->subject_description));	
						}
					}
				}
			}
		}
		else if($status == 3){
			$data['olddata'] = json_decode($data['course']['firstsemgrade12']);
			if($data['subjects'] > 0 && $data['olddata'] > 0){
				foreach ($data['subjects'] as $key => $value) {
					foreach ($data['olddata'] as $value2) {
						if($value2->id == $value->id){
							array_push($arr, array("id" => $value->id, "subject_description" => $value->subject_description));	
						}
					}
				}
			}
		}
		else if($status == 4){
			$data['olddata'] = json_decode($data['course']['secondsemgrade12']);
			if($data['subjects'] > 0 && $data['olddata'] > 0){
				foreach ($data['subjects'] as $key => $value) {
					foreach ($data['olddata'] as $value2) {
						if($value2->id == $value->id){
							array_push($arr, array("id" => $value->id, "subject_description" => $value->subject_description));	
						}
					}
				}
			}
		}
		$this->data['listofsubject'] = $arr;
		echo json_encode($this->data);
	}
	public function removeCourseData(){
		$id = $_POST['id'];
		$removesubjects = $_POST['removesubjects'];
		$data['course'] = $this->pal_model->update_course($id);
		$status = $_POST['status'];
		$rowname = "";
		$arr = array();
		
		if ($status == 1) {
			$old = json_decode($data['course']['firstsemgrade11']);
			$rowname = "firstsemgrade11";
			foreach ($old as $key => $value) {
				for ($i=0; $i < count($removesubjects); $i++) {
					if($value->id == $removesubjects[$i]){
						unset($old[$key]);
					}
				}
			}
			foreach ($old as $key => $value){
				array_push($arr, array('id' => $value->id));
			}
		}
		else if ($status == 2) {
			$old = json_decode($data['course']['secondsemgrade11']);
			$rowname = "secondsemgrade11";
			foreach ($old as $key => $value) {
				for ($i=0; $i < count($removesubjects); $i++) {
					if($value->id == $removesubjects[$i]){
						unset($old[$key]);
					}
				}
			}
			foreach ($old as $key => $value){
				array_push($arr, array('id' => $value->id));
			}
		}
		else if ($status == 3) {
			$old = json_decode($data['course']['firstsemgrade12']);
			$rowname = "firstsemgrade12";
			foreach ($old as $key => $value) {
				for ($i=0; $i < count($removesubjects); $i++) {
					if($value->id == $removesubjects[$i]){
						unset($old[$key]);
					}
				}
			}
			foreach ($old as $key => $value){
				array_push($arr, array('id' => $value->id));
			}
		}
		else if ($status == 4) {
			$old = json_decode($data['course']['secondsemgrade12']);
			$rowname = "secondsemgrade12";
			foreach ($old as $key => $value) {
				for ($i=0; $i < count($removesubjects); $i++) {
					if($value->id == $removesubjects[$i]){
						unset($old[$key]);
					}
				}
			}
			foreach ($old as $key => $value){
				array_push($arr, array('id' => $value->id));
			}
		}
		$result = $this->pal_model->update_course_data($rowname, $id, $arr);
		$this->data['status'] = "success";
		echo json_encode($this->data);
	}


	public function updateCourseName(){
		$id = $_POST['id'];
		$strand = $_POST['strand'];
		$description = $_POST['description'];
		$status = $_POST['status'];
		$originalStrand = $_POST['originalStrand'];
		$originalDescription = $_POST['originalDescription'];
		$newData = "";
		$rowname = "";
		$check = false;
		if ($status == 'forstrand') {
			if ($originalStrand == $strand) {
				$this->data['status'] = 'danger';
				$this->data['msg'] = "Please use different strand name.";
			}
			else{
				$this->data['status'] = 'success';
				$this->data['newData'] = $strand.'/'.$description;
				$this->data['originalStrand'] = $strand;
				
				$newData = $strand;
				$rowname = "academic_track";
				$check = true;
			}
		}
		else{
			if ($originalDescription == $description) {
				$this->data['status'] = 'danger';
				$this->data['msg'] = "Please use different description.";
			}
			else{
				$this->form_validation->set_message('is_unique', '%s already exist.');
				$this->form_validation->set_rules('description', $description, 'required|is_unique[course_offer.academic_strand]');
				if ($this->form_validation->run() == FALSE) {

					$this->data['status'] = 'danger';
					$this->data['msg'] = validation_errors();
				}
				else{
					$this->data['status'] = 'success';
					$this->data['newData'] = $strand.'/'.$description;
					$this->data['originalDescription'] = $description;
					$newData = $description;
					$rowname = "academic_strand";
					$check = true;
				}
			}
		}
		if($check){
			$course_name = $strand.'/'.$description;
			$result = $this->pal_model->update_course_name($id, $rowname, $course_name, $newData);
		}
		
		echo json_encode($this->data);
	}

	public function allcourse(){
		$result = $this->pal_model->courses_offer();
		//$this->data['allcourses'] = $result;
		$arr = array();
		foreach ($result as $key => $value) {
			$old1 = json_decode($value->firstsemgrade11);
			$old2 = json_decode($value->secondsemgrade11);
			$old3 = json_decode($value->firstsemgrade12);
			$old4 = json_decode($value->secondsemgrade12);
			if(count($old1) >= 1 || count($old2) >= 1 || count($old3) >= 1 || count($old4) >= 1 ){
				array_push($arr, array('id'=>$value->id, 'course_name' => $value->course_name));
			}
			else{
				
			}
			
		}
		$this->data['allcourses'] = $arr;
		echo json_encode($this->data);
	}
	public function import_subject(){
		$id = $_POST['id'];
		$idtoduplicate = $_POST['idtoduplicate'];
		$importyearlevel = $_POST['importyearlevel'];
		$importsem = $_POST['importsem'];

		$this->data['msg'] = $id.' '.$idtoduplicate.' '.$importyearlevel.' '.$importsem.' ';
		$this->data['status'] = "success";
	}
	public function checkifSemAndYearHasSubject(){
		$id = $_POST['id'];
		$this->data['id'] = $id;
		echo json_encode($this->data);
	}

	public function addsubject(){
		$subject_code = $_POST['subjectcode'];
		$subject_description = $_POST['subjectdescription'];
		$subject_type = $_POST['subjecttype'];
		$this->form_validation->set_message('is_unique', '%s already exist.');
		$this->form_validation->set_rules('subjectcode', "Subject Code", 'required|is_unique[list_of_subject.subject_code]');
		$this->form_validation->set_rules('subjectdescription', "Subject Description", 'required|is_unique[list_of_subject.subject_description]');
		$this->form_validation->set_rules('subjecttype', "Subject Description", 'required');

		if ($this->form_validation->run() == FALSE) {

			$this->data['status'] = 'error';
			$this->data['msg'] = validation_errors();
			echo json_encode($this->data);
		}
		else{
			$course_data = array(
				'subject_code' => $subject_code,
				'subject_description' => $subject_description,
				'subject_type' => $subject_type
			);
			$courseadd =  $this->pal_model->add_subject($course_data);
			$this->data['status'] = 'success';
			$this->data['msg'] = "Successfully added a course.";
			echo json_encode($this->data);
		}
	}
	


	//subject module

	public function removeSubject(){
		$id = $_POST['id'];
		$this->pal_model->remove_subject($id);
		$this->data['id'] = $id;
		echo json_encode($this->data);
	}
	public function viewOneSubject($id){

		$data['teachers'] = $this->pal_model->teacher_data();
		$subject = $this->pal_model->viewSubject($id);

		$existteacher = json_decode($subject['teachers_id'], TRUE);
		$this->data['availableteachers'] = $existteacher;
		$this->data['allteachers'] = $data['teachers'];
		if(count($existteacher) != 0){
			foreach ($data['teachers'] as $key => $value) {
				foreach ($existteacher as $value2) {
					if ($value->id == $value2['id']) {
						unset($data['teachers'][$key]);
					}
				}
			}
		}
		$this->data['subject'] = $subject;
		$this->data['teachers'] = $data['teachers'];
		if ($subject != null) {
			$this->data['subject'] = $subject;
			$this->load->view('adminpage/header');
			$this->load->view('adminpage/subjectData', $this->data);
			$this->load->view('adminpage/footer');
		}
		else{
			show_404();
		}
	}

	public function addTeacherToSubject(){
		$id = $_POST['id'];
		$teachers = $_POST['teachers'];

		$data['subject'] = $this->pal_model->viewSubject($id);
		$newData = array();
		$oldData = json_decode($data['subject']['teachers_id']);
		if(count($oldData) > 0){
			foreach ($oldData as $value) {
				array_push($newData, array('id' => $value->id));
			}	
		}
		for ($i=0; $i < count($teachers); $i++) { 
			array_push($newData, array('id' => $teachers[$i]));
		}
		$result = $this->pal_model->update_subject_data($id, $newData);
		$this->data['status'] = "success";
		$this->data['msg'] = $teachers;
		echo json_encode($this->data);
	}
	public function removeTeacherFromSubject(){
		$id = $_POST['id'];
		$removeteachers = $_POST['removeteachers'];
		$data['subject'] = $this->pal_model->viewSubject($id);
		$arr = array();

		$old = json_decode($data['subject']['teachers_id']);
		foreach ($old as $key => $value) {
			for ($i=0; $i < count($removeteachers); $i++) {
				if($value->id == $removeteachers[$i]){
					unset($old[$key]);
				}
			}
		}
		foreach ($old as $key => $value){
			array_push($arr, array('id' => $value->id));
		}
		$result = $this->pal_model->update_subject_data($id, $arr);
		$this->data['status'] = "success";
		echo json_encode($this->data);
	}
	public function updateNameOfSubject(){
		$id = $_POST['id'];
		$newName = $_POST['newName'];
		$rowName = $_POST['rowName'];
		$this->form_validation->set_message('is_unique', '%s already exist.');
		$nameOfRow = "";
		if($rowName == 'subject_code'){
			$originalSubjectCode = $_POST['originalSubjectCode'];
			if ($originalSubjectCode != $newName) {
				$this->form_validation->set_rules('newName', "Subject Code", 'required|is_unique[list_of_subject.subject_code]');
				if ($this->form_validation->run() == FALSE) {

					$this->data['status'] = 'error';
					$this->data['msg'] = validation_errors();
					echo json_encode($this->data);
				}
				else{
					$this->data['status'] = "success";
					$result = $this->pal_model->update_subject_names($id, 'subject_code', $newName);
					echo json_encode($this->data);
				}
			}		
		}
		else if($rowName == 'subject_description'){
			$originalSubjectCode = $_POST['originalSubjectDescription'];
			if ($originalSubjectCode != $newName) {
				$this->form_validation->set_rules('newName', "Subject Description", 'required|is_unique[list_of_subject.subject_description]');
				if ($this->form_validation->run() == FALSE) {

					$this->data['status'] = 'error';
					$this->data['msg'] = validation_errors();
					echo json_encode($this->data);
				}
				else{
					$this->data['status'] = "success";
					$result = $this->pal_model->update_subject_names($id, 'subject_description', $newName);
					echo json_encode($this->data);
				}
			}		
		}
		else{
			$originalSubjectType = $_POST['originalSubjectType'];
			if ($originalSubjectType != $newName) {
				$this->form_validation->set_rules('newName', "Subject Type", 'required');
				if ($this->form_validation->run() == FALSE) {

					$this->data['status'] = 'error';
					$this->data['msg'] = validation_errors();
					echo json_encode($this->data);
				}
				else{
					$this->data['status'] = "success";
					$result = $this->pal_model->update_subject_names($id, 'subject_type', $newName);
					echo json_encode($this->data);
				}
			}		
		}	
	}
	/*pending registration page*/
	public function pending_registration(){
		
		$students = $this->pal_model->pending_student();
		$this->data['student_info'] = $students;
		$teachers = $this->pal_model->pending_teacher();
		$this->data['teacher_info'] = $teachers;
		$this->load->view('adminpage/header');
		$this->load->view('adminpage/pendingRegistration',$this->data);
		$this->load->view('adminpage/footer');
	}
	
	/*remove student*/
	public function removeStudent(){
		$id = $_POST['id'];
		$this->pal_model->remove_student($id);
		$this->data['id'] = $id;
		echo json_encode($this->data);
	}
	/*confirm student*/
	public function confirmStudent(){
		$id = $_POST['id'];
		$studentdata = $this->pal_model->viewStudent($id);
		$lrn = $studentdata['lrn'];

		$this->pal_model->confirm_student($id, $lrn);
		$this->data['id'] = $id;
		echo json_encode($this->data);
	}
	/*confirm teacher*/
	public function confirmTeacher(){
		$id = $_POST['id'];
		$teacherdata = $this->pal_model->viewTeacher($id);
		$lrn = $teacherdata['lrn'];

		$this->pal_model->confirm_teacher($id,$lrn);
		$this->data['id'] = $id;
		echo json_encode($this->data);
	}
	/*remove teacher*/
	public function removeTeacher(){
		$id = $_POST['id'];
		$this->pal_model->remove_teacher($id);
		$this->data['id'] = $id;
		echo json_encode($this->data);
	}
	// BULLETIN BOARD
	public function school_event(){
		$this->load->view('adminpage/header');
		$this->load->view('adminpage/schoolEvent');
		$this->load->view('adminpage/footer');
	}


	// FOR SECTION PAGE

	public function openSection(){
		$courses = $this->pal_model->courses_offer();
		$teachers = $this->pal_model->teacher_data();
		$academicYear = $this->pal_model->academic_year();
		$sectionlist = $this->pal_model->section_list();

		$this->data['courses'] = $courses;
		$this->data['academicYear'] = $academicYear;
		$this->data['teachers'] = $teachers;
		$this->data['section_list'] = $sectionlist;

		//$this->data['teachers'] = $teachers;
		$this->load->view('adminpage/header');
		$this->load->view('adminpage/sectionList', $this->data);
		$this->load->view('adminpage/footer');
	}


	/*viewing of student information*/
	public function student_info($id){

		$students = $this->pal_model->viewStudent($id);
		$academicYear = $this->pal_model->academic_year();
		$this->data['academicYear'] = $academicYear;
		$this->data['student_info'] = $students;
		$this->load->view('adminpage/header');
		$this->load->view('adminpage/studentInfo', $this->data);

		$this->load->view('adminpage/footer');
	}
	/*viewing of teacher information*/
	public function teacher_info($id){
		$teachers = $this->pal_model->viewTeacher($id);
		$this->data['teacher_info'] = $teachers;
		$this->load->view('adminpage/header');
		$this->load->view('adminpage/teacherInfo', $this->data);
		$this->load->view('adminpage/footer');
	}



	// adding of new academic year
	public function addAcadYear(){
		$acadYear = $_POST['acadYear'];
		$courseOpen = $_POST['courseOpen'];

		$newData = array();
		$this->form_validation->set_message('is_unique', '%s already exist.');
		$this->form_validation->set_rules('acadYear', "Academic Year", 'required|is_unique[open_course.acad_year]');
		if ($this->form_validation->run() == FALSE) {

			$this->data['status'] = "danger";
			$this->data['msg'] = validation_errors();
		}
		else{
			for ($i=0; $i < count($courseOpen); $i++) { 
				array_push($newData, array('id' => $courseOpen[$i]));
			}

			$this->pal_model->add_acad_year($acadYear, $newData);
			$this->data['course_open'] = $newData;
		}
		
		
		echo json_encode($this->data);
	}

	public function getOpenCoursePerAcadYear(){
		$id = $_POST['id'];
		$this->data['id'] = $id;
		$old = $this->pal_model->get_open_course_per_acadyear($id);
		$courseOpen = json_decode($old['course_open_id']);

		$courses = $this->pal_model->courses_offer();
		$arr = array();
		foreach ($courseOpen as $value) {
			foreach ($courses as $value2) {
				if ($value->id == $value2->id) {
					array_push($arr,array('id'=>$value2->id, 'course_name' => $value2->course_name));
				}
			}
		}
		$this->data['open_course'] = $arr;
		echo json_encode($this->data);
	}
	/*teacher page*/
	public function teacher(){
		$teachers = $this->pal_model->teacher_data();
		$this->data['teacher_info'] = $teachers;
		$this->load->view('adminpage/header');
		$this->load->view('adminpage/teacher',$this->data);
		$this->load->view('adminpage/footer');
	}
	public function teacher2($id){
		$students = $this->pal_model->viewTeacher($id);
		$this->data['teacher_info'] = $students;
		$this->load->view('adminpage/header');
		$this->load->view('adminpage/teacher2',$this->data);
		$this->load->view('adminpage/footer');
	}
	public function updateTeacherPersonalInfo(){
		$id=$_POST['id'];
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
			
		$courseadd =  $this->pal_model->updatePersonalInfoTeacher($id,$personal);
		$this->data['status'] = 'success';
		$this->data['msg'] = "Successfully added.";
		
		
		echo json_encode($this->data);
	}
	public function updateTeacherAddressInfo(){
		$id=$_POST['id'];
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
			
		$courseadd =  $this->pal_model->updateAddressInfoTeacher($id,$address);
		$this->data['status'] = 'success';
		$this->data['msg'] = "Successfully added.";
		
		
		echo json_encode($this->data);
	}
	public function updateTeacherGuardianInfo(){
		$id=$_POST['id'];
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
			
		$courseadd =  $this->pal_model->updateGuardianInfoTeacher($id,$guardian);
		$this->data['status'] = 'success';
		$this->data['msg'] = "Successfully added.";
		
		
		echo json_encode($this->data);
	}
	public function updateTeacherEducationalInfo(){
		$id=$_POST['id'];
		$school=$_POST['school'];
		$degree=$_POST['degree'];
		$course=$_POST['course'];
		$sbrgy=$_POST['sbrgy'];
		$smunicipality=$_POST['smunicipality'];
		$sprovince=$_POST['sprovince'];
		$syearfrom=$_POST['syearfrom'];
		$syearto=$_POST['syearto'];

		$education = array(
			array(
				'school_name' => $school,
				'degree' => $degree,
				'course' => $course,
				's_brgy' => $sbrgy,
				's_municipality' => $smunicipality,
				's_province' => $sprovince,
				'year_from' => $syearfrom,
				'year_to' => $syearto,										
				
			)
		);
			
		$courseadd =  $this->pal_model->updateEducationalInfoStudent($id,$education);
		$this->data['status'] = 'success';
		$this->data['msg'] = "Successfully added.";
		
		
		echo json_encode($this->data);
	}
	/*student page*/
	public function student(){
		
		$teachers = $this->pal_model->teacher_data();
		$students = $this->pal_model->student_data();
		$this->data['personal_info'] = $teachers;
		$this->data['student_info'] = $students;
		$this->load->view('adminpage/header');
		$this->load->view('adminpage/student',$this->data);
		$this->load->view('adminpage/footer');
	}
	public function student2($id){

		$courses = $this->pal_model->courses_offer();
		$this->data['courses'] = $courses;
		
		$students = $this->pal_model->viewStudent($id);
		$academicYear = $this->pal_model->academic_year();
		$this->data['academicYear'] = $academicYear;
		$this->data['student_info'] = $students;
		$this->load->view('adminpage/header');
		$this->load->view('adminpage/student2',$this->data);
		$this->load->view('adminpage/footer');
	}
	public function updateStudentPersonalInfo(){
		/*acad_info*/
        $acad_status=$_POST['acad_status'];
		$course=$_POST['course'];
		$acad_level=$_POST['acad_level'];
		$acad_sem=$_POST['acad_sem'];
		$academic_year=$_POST['academic_year'];
		/*personal info*/
		$id=$_POST['id'];
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
		$acad_info = array(
			array(
				'acad_status' => $acad_status,
				'acad_level' => $acad_level,
				'course' => $course,
				'semester' => $acad_sem,
				'acad_year' => $academic_year,
			)
		);
			
		$courseadd =  $this->pal_model->updatePersonalInfoStudent($id,$personal,$acad_info);
		$this->data['status'] = 'success';
		$this->data['msg'] = "Successfully added.";
		
		
		echo json_encode($this->data);
	}
	public function updateStudentAddressInfo(){
		$id=$_POST['id'];
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
			
		$courseadd =  $this->pal_model->updateAddressInfoStudent($id,$address);
		$this->data['status'] = 'success';
		$this->data['msg'] = "Successfully added.";
		
		
		echo json_encode($this->data);
	}
	public function updateStudentGuardianInfo(){
		$id=$_POST['id'];
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
			
		$courseadd =  $this->pal_model->updateGuardianInfoStudent($id,$guardian);
		$this->data['status'] = 'success';
		$this->data['msg'] = "Successfully added.";
		
		
		echo json_encode($this->data);
	}
	public function updateStudentEducationalInfo(){
		$id=$_POST['id'];
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
			
		$courseadd =  $this->pal_model->updateEducationalInfoStudent($id,$education);
		$this->data['status'] = 'success';
		$this->data['msg'] = "Successfully added.";
		
		
		echo json_encode($this->data);
	}
	// adding of new section

	public function addNewSection(){
		$no_of_section = $_POST['no_of_section'];
		$sec_grade = $_POST['sec_grade'];
		$sec_semester = $_POST['sec_semester'];
		$sec_acadyearid = $_POST['sec_acadyear'];
		$sec_status = $_POST['sec_status'];
		$sec_acad_course = $_POST['sec_acad_course'];



		$this->form_validation->set_rules('no_of_section', "Sections", 'required');
		$this->form_validation->set_rules('sec_grade', "Grade", 'required');
		$this->form_validation->set_rules('sec_semester', "Semester", 'required');
		$this->form_validation->set_rules('sec_acadyear', "Academic Year", 'required');
		$this->form_validation->set_rules('sec_status', "Status", 'required');
		$this->form_validation->set_rules('sec_acad_course', "Course", 'required');
		if ($this->form_validation->run() == FALSE) {

			$this->data['status'] = "danger";
			$this->data['msg'] = validation_errors();
		}
		else{
			$newAcadYear = $this->pal_model->get_open_course_per_acadyear($sec_acadyearid);
			$arr = array();
			for ($i=1; $i <=$no_of_section; $i++) { 
				$name = "Section ".$i;
				$data = array(
					"section_name" => $name,
					"academic_level" => $sec_grade,
					"semester" => $sec_semester,
					"academic_year" => $newAcadYear['acad_year'],
					"status" => $sec_status,
					"course" => $sec_acad_course,
				);
				$old = $this->pal_model->add_section($data);

			}

			$this->data['status'] = "success";
		}

		
		echo json_encode($this->data);
	}

	// check if for section academic level

	public function checkAcademicLevel(){
		$academiccourse = $_POST['academiccourse'];
		$academiclevel = $_POST['academiclevel'];
		$academicyear = $_POST['academicyear'];
		$status = $_POST['status'];
		$levels = array(
			'Grade 11',
			'Grade 12'
		);

		
		

		$data = $this->pal_model->check_academic_level($academiccourse, $academicyear, $status);
		$first = false;
		$second = false;
		$third = false;
		$fourth = false;
		foreach ($data as $value) {
			if ($value->semester == "1st Semester" && $value->academic_level == "Grade 11") {
				$first = true;
			}
			else if($value->semester == "2nd Semester" && $value->academic_level == "Grade 11"){
				$second = true;
			}

			else if ($value->semester == "1st Semester" && $value->academic_level == "Grade 12") {
				$third = true;
			}
			else if($value->semester == "2nd Semester" && $value->academic_level == "Grade 12"){
				$fourth = true;
			}
		}

		$semester1 = array(
			'1st Semester',
			'2nd Semester'
		);

		$semester2 = array(
			'1st Semester',
			'2nd Semester'
		);
		if ($first) {
			unset($semester1[0]);
		}
		if ($second) {
			unset($semester1[1]);
		}
		if ($third) {
			unset($semester2[0]);
		}
		if ($fourth) {
			unset($semester2[1]);
		}

		if($second && $first){
			unset($levels[0]);
		}
		if($third && $fourth){
			unset($levels[1]);
		}

		$this->data['boolean'] = $first.' '. $second.' '.$third.' '.$fourth;
		$this->data['status'] = 'success';
		$this->data['academiclevel'] = $levels;
		$this->data['acadlevel']  = $academiclevel;
		if ($academiclevel == "Grade 11") {
			$this->data['grade11'] = "yes";
			$this->data['semester'] = $semester1;
		}
		else if ($academiclevel == "Grade 12"){
			$this->data['grade12'] = "yes";
			$this->data['semester'] = $semester2;
		}
		else{
			$semester = array(
				'1st Semester',
				'2nd Semester'
			);
			$this->data['default'] = "yes";
			$this->data['semester'] = $semester;
		}
		echo json_encode($this->data);
	}


	// ADD ADVISER TO A SECTION
	public function addAdviserToSection(){
		$id = $_POST['id'];
		$adviserid = $_POST['adviserid'];
		$this->form_validation->set_rules('adviserid', "adviser", 'required');
		if ($this->form_validation->run() == FALSE) {

			$this->data['status'] = "danger";
			$this->data['msg'] = validation_errors();
		}
		else{
			$teachers = $this->pal_model->viewTeacher($adviserid);
			
			$teacherdata = json_decode($teachers['personal_info'], TRUE);
			foreach ($teacherdata as $value) {
				$nameOfAdviser = ucfirst($value['fname']).' '.ucfirst($value['mname'][0]).'. '. ucfirst($value['lname']);
			}
			$this->pal_model->add_adviser_to_section($id, $adviserid);
			$this->data['name'] = $nameOfAdviser;
			$this->data['status'] = "success";
		}
		

		echo json_encode($this->data);
	}

	// CHECK IF TEACHER IS AVAILABLE AS ADVISER

	public function checkIfAdviser(){
		$teachers = $this->pal_model->teacher_data();
		$sectionlist = $this->pal_model->section_list();
		$arr = array();
		foreach ($sectionlist as $key => $value2) {
			foreach ($teachers as $key => $value) {
			
				if ($value2->adviser == $value->id) {
					unset($teachers[$key]);
				}
			}
				
		}
		foreach ($teachers as $value) {
			$old = json_decode($value->personal_info, TRUE);
			foreach ($old as $value2) {
				$fullname = ucfirst($value2['fname']).' '.ucfirst($value2['mname'][0]).'. '. ucfirst($value2['lname']);
				array_push($arr, array("name" => $fullname, "id" => $value->id));
			}
			
			
		}
		$this->data['asd'] = $teachers;
		$this->data['teachers'] = $arr;
		$this->data['status'] = "success";
		echo json_encode($this->data);
	}

	// REMOVE SECTION

	public function removeSection(){
		$id = $_POST['id'];

		$this->pal_model->remove_section($id);

		$this->data['status'] = "success";
		echo json_encode($this->data);
	}

	// OPENING OF ONE SECTION

	public function openOneSection($id){
		$status = "none";
		if (isset($_POST['status'])) {
			$status = "forcheck";
		}
		if (is_numeric($id)) {
			$sectiondata = $this->pal_model->viewOnSection($id);

			if(empty($sectiondata)){
				show_404();
			}
			else{
				$fullname = "";
				$teacher = $this->pal_model->viewTeacher($sectiondata['adviser']);
				$teacherdata = json_decode($teacher['personal_info'], TRUE);
				if (count($teacher) > 0) {
					foreach ($teacherdata as $value) {
						$fullname = ucfirst($value['fname']).' '.ucfirst($value['mname'][0]).'. '. ucfirst($value['lname']);		
					}
				}
				
				$student = $this->pal_model->student_data();
				// $availablestudent = $this->pal_model->studentavailableforsection($sectiondata['academic_year']);
				//$this->data['availablestudent'] = $availablestudent;
				$availablestudent = array();
				foreach ($student as $key => $value) {
					$data = json_decode($value->acad_level, TRUE);
					$data2 = json_decode($value->personal_info, TRUE);
					foreach ($data as $value2) {
						if ($value2['acad_year'] == $sectiondata['academic_year']  && $value2['acad_level'] == $sectiondata['academic_level'] && $value2['course'] == $sectiondata['course'] && $value2['semester'] == $sectiondata['semester']) {
							
							foreach ($data2 as  $value3) {
								$studentname = ucfirst($value3['fname']).' '.ucfirst($value3['mname'][0]).'. '. ucfirst($value3['lname']);
								array_push($availablestudent, array("id" => $value->id, "name" => $studentname));
							}
						}
					}
				}
				$subject = $this->pal_model->open_course_by_name($sectiondata['course']);
				$allsubject = $this->pal_model->subject();

				$sectionlist = $this->pal_model->section_list();

				foreach ($sectionlist as $key => $value) {
					$oldsectiondata = json_decode($value->student_id, TRUE);
					if(count($oldsectiondata) > 0){
						foreach ($oldsectiondata as $value2) {
							foreach ($availablestudent as $key => $value3) {
								if ($value2['id'] == $value3['id']) {
									unset($availablestudent[$key]);
								}
							}
						}
					}
					
				}
				$studentinsection = array();
				$sectionStudentData = json_decode($sectiondata['student_id']);
				if (count($sectionStudentData) > 0) {
					foreach ($sectionStudentData as $value) {
						foreach ($student as $value2) {
							if ($value->id == $value2->id) {
								$personal_info = json_decode($value2->personal_info, TRUE);
								foreach ($personal_info as $value3) {
									$nameofstudent = ucfirst($value3['fname']).' '.ucfirst($value3['mname'][0]).'. '. ucfirst($value3['lname']);		
									array_push($studentinsection, array("id" => $value2->id, "name" => $nameofstudent, "lrn" => $value2->lrn ));
								}
								
							}
						}
					}
				}
				$allsubject = $this->pal_model->subject();
				$rowname = "";
				if ($sectiondata['academic_level'] == "Grade 11" && $sectiondata['semester'] == "1st Semester") {
					$rowname = $subject['firstsemgrade11'];
				}
				else if($sectiondata['academic_level'] == "Grade 11" && $sectiondata['semester'] == "2nd Semester"){
					$rowname = $subject['secondsemgrade11'];
				}
				else if($sectiondata['academic_level'] == "Grade 12" && $sectiondata['semester'] == "1st Semester"){
					$rowname = $subject['firstsemgrade12'];
				}
				else if($sectiondata['academic_level'] == "Grade 12" && $sectiondata['semester'] == "2nd Semester"){
					$rowname = $subject['secondsemgrade12'];
				}
				$data = json_decode($rowname);
				$allsubjectNew = array();
				if (count($data) > 0) {
					foreach($data as $value){
						foreach ($allsubject as $key => $value2) {
							if ($value->id == $value2->id) {
								array_push($allsubjectNew, array("id"=>$value2->id, "subjectcode" => $value2->subject_code, "subjectdescription" => $value2->subject_description, "teachersofthissubject" => $value2->teachers_of_this_subject));
							}
						}
					}
				}
				$allteachers = $this->pal_model->teacher_data();
				$d = array();
				$nameofteacher = "";
				foreach($allsubjectNew as $key => $value){
					$data = json_decode($value['teachersofthissubject'], TRUE);
					if (count($data) > 0){
						foreach($data as $value2){
							if ($sectiondata['academic_year'] == $value2['academic_year'] && $sectiondata['course'] == $value2['course'] && $sectiondata['academic_level'] == $value2['academic_level'] && $sectiondata['semester'] == $value2['semester'] && $sectiondata['status'] == $value2['status'] && $sectiondata['section_name'] == $value2['sectionName']){
								foreach($allteachers as $value3){
									if ($value3->id == $value2['idofteacher']){
										$personalinfo = json_decode($value3->personal_info, TRUE);
										foreach($personalinfo as $value4){
											$nameofteacher = ucfirst($value4['fname']).' '.ucfirst($value4['mname'][0]).'. '. ucfirst($value4['lname']);
											array_push($d, array("name" => $nameofteacher, "id" => $value['id'], "idofteacher"=>$value3->id, "subjectcode" => $value['subjectcode'], "subjectdescription" => $value['subjectdescription'], "teachersofthissubject" => $value['teachersofthissubject']));
											unset($allsubjectNew[$key]);
										}
									}
								}
							}
						}
					}
				}
				foreach($allsubjectNew as $value){
					array_push($d, array("name" => "non", "id" => $value['id'], "subjectcode" => $value['subjectcode'], "subjectdescription" => $value['subjectdescription'], "teachersofthissubject" => $value['teachersofthissubject']));
				}
				$this->data['nameofteacher'] = $nameofteacher;
				$this->data['allteachers'] = $allteachers;
				$this->data['subject'] = $d;
				$this->data['studentinsection'] = $studentinsection;
				$this->data['student'] = $availablestudent;
				$this->data['fullname'] = $fullname;
				$this->data['sectiondata'] = $sectiondata;
				if ($status == "none") {
					$this->load->view('adminpage/header');
					$this->load->view('adminpage/sectionData', $this->data);
					$this->load->view('adminpage/footer');
				}
				else{
					echo json_encode($this->data);
				}
			}
		}
		else{
			show_404();
		}
		
		
	}

	// ADD STUDENT TO SECTION

	public function addStudentToSection(){
		$id = $_POST['id'];
		$student = $_POST['student'];
		

		$sectiondata = $this->pal_model->viewOnSection($id);
		$newData = array();

		$oldData = json_decode($sectiondata['student_id']);
		if(count($oldData) > 0){
			foreach ($oldData as $value) {
				array_push($newData, array('id' => $value->id));
			}	
		}
		for ($i=0; $i < count($student); $i++) { 
			array_push($newData, array('id' => $student[$i]));
		}
		$result = $this->pal_model->update_sectionlist_data($id, $newData);

		$this->data['status'] = "success";
		$this->data['msg'] = $student;
		
		echo json_encode($this->data);
	}


	// REMOVE STUDENT TO SECTION

	public function removeStudentToSection(){
		$id = $_POST['id'];
		$idofsection = $_POST['idofsection'];
		$sectiondata = $this->pal_model->viewOnSection($idofsection);
		$old = json_decode($sectiondata['student_id'], TRUE);
		$newData = array();
		foreach ($old as $key => $value) {
			if ($value['id'] == $id) {
			}
			else{
				array_push($newData, array("id" => $value['id']));
			}
		}

		$this->pal_model->update_sectionlist_data($idofsection, $newData);
		$this->data['status'] = "success";
		echo json_encode($this->data);
	}

	//GET ALL TEACHER PER SUBJECT

	public function getTeacherPerSubject(){
		$academicYear = $_POST['academicYear'];
		$course = $_POST['course'];
		$academicLevel = $_POST['academicLevel'];
		$semester = $_POST['semester'];
		$status = $_POST['status'];
		$sectionName = $_POST['sectionName'];


		$idofsubject = $_POST['idofsubject'];
		$subject = $this->pal_model->viewSubject($idofsubject);
		$allteachers = $this->pal_model->teacher_data();

		$parseTeacher = json_decode($subject['teachers_id'], TRUE);
		$availableteachers = array();

		$subjectdata = json_decode($subject['teachers_of_this_subject'], TRUE);
		
		// if (count($parseTeacher) > 0){
		// 	foreach ($parseTeacher as $key => $value){
		// 		if (count($subjectdata) > 0){
		// 			foreach ($subjectdata as $value2) {
		// 				if ($value['id'] == $value2['idofteacher']) {
							
		// 				}
		// 			}
		// 		}
		// 	}
		// }

		if (count($parseTeacher) > 0) {
			foreach ($parseTeacher as $value) {
				foreach ($allteachers as $value2){
					if ($value['id'] == $value2->id) {
						$dataofall = json_decode($value2->personal_info, TRUE);
						foreach ($dataofall as $value3){
							$fullname = ucfirst($value3['fname']).' '.ucfirst($value3['mname'][0]).'. '. ucfirst($value3['lname']);
							array_push($availableteachers, array("id" => $value['id'], "name" => $fullname));
						}
					}
				}
				
			}
		}
		$this->data['availableteachers'] = $availableteachers;
		$this->data['status'] = "success";
		echo json_encode($this->data);
	}

	// ADD TEACHER TO SUBJECT

	public function addOneTeacherToSubject(){
		$idofsubject = $_POST['idofsubject'];
		$academicYear = $_POST['academicYear'];
		$course = $_POST['course'];
		$academicLevel = $_POST['academicLevel'];
		$semester = $_POST['semester'];
		$status = $_POST['status'];
		$sectionName = $_POST['sectionName'];
		$teacher = $_POST['teacher'];
		$this->form_validation->set_rules('teacher', "Teacher", 'required');

		if ($this->form_validation->run() == FALSE) {

			$this->data['status'] = 'danger';
			$this->data['msg'] = validation_errors();
			echo json_encode($this->data);
		}
		else{
			$subject = $this->pal_model->viewSubject($idofsubject);
			$parseSubject = json_decode($subject['teachers_of_this_subject'], TRUE);
			$data = array();
			if (count($parseSubject) > 0) {
				foreach ($parseSubject as $value) {
					array_push($data, array(
						"idofteacher" => $value['idofteacher'],
						"academic_year" => $value['academic_year'],
						"course" => $value['course'],
						"academic_level" => $value['academic_level'],
						"semester" => $value['semester'],
						"status" => $value['status'],
						"sectionName" => $value['sectionName']
					));
				}
			}

			array_push($data, array(
				"idofteacher" => $teacher,
				"academic_year" => $academicYear,
				"course" => $course,
				"academic_level" => $academicLevel,
				"semester" => $semester,
				"status" => $status,
				"sectionName" => $sectionName
			));

			$this->data['idofteacher'] = $teacher;
			$result = $this->pal_model->update_subject_teacher($idofsubject, $data);


			$this->data['msg'] ="good";
			$this->data['status'] = "success";
			echo json_encode($this->data);
		}
		
	}

	public function removeTeacherinOnSubject(){
		$idofsubject = $_POST['idofsubject'];
		$academicYear = $_POST['academicYear'];
		$course = $_POST['course'];
		$academicLevel = $_POST['academicLevel'];
		$semester = $_POST['semester'];
		$status = $_POST['status'];
		$sectionName = $_POST['sectionName'];
		$teacherid = $_POST['teacherid'];

		$subject = $this->pal_model->viewSubject($idofsubject);
		$parseSubject = json_decode($subject['teachers_of_this_subject'], TRUE);
		foreach ($parseSubject as $key => $value) {
			if ($value['idofteacher'] == $teacherid && $value['academic_year'] == $academicYear && $value['course'] == $course && $value['academic_level'] == $academicLevel && $value['semester'] == $semester && $value['status'] == $status && $value['sectionName'] == $sectionName) {
				unset($parseSubject[$key]);
			}
		}
		$newData = array();
		foreach ($parseSubject as $value) {
			array_push($newData, array(
				"idofteacher" => $value['idofteacher'],
				"academic_year" => $value['academic_year'],
				"course" => $value['course'],
				"academic_level" => $value['academic_level'],
				"semester" => $value['semester'],
				"status" => $value['status'],
				"sectionName" => $value['sectionName']

			));
		}
		$result = $this->pal_model->update_subject_teacher($idofsubject, $newData);
		$this->data['status'] = "success";
		echo json_encode($this->data);
	}
}