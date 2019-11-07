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
		if($this->session->userdata('user_data') == "" ){
			redirect('home');
		}
	}
	
	public function dashboard(){
		$teachers = $this->pal_model->teacher_data();
		$this->data['personal_info'] = $teachers;
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


	// BULLETIN BOARD
	public function school_event(){
		$this->load->view('adminpage/header');
		$this->load->view('adminpage/schoolEvent');
		$this->load->view('adminpage/footer');
	}
}