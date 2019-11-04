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
		$this->load->view('adminpage/header');
		$this->load->view('adminpage/dashboard');
		$this->load->view('adminpage/footer');
	}
	public function logout(){
		session_destroy();

		$this->session->unset_userdata('user_data');

		redirect('home');
	}
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
		$this->form_validation->set_rules('strand', "Subject Description", 'required|is_unique[course_offer.academic_strand]');

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
		$onegrade11 = json_decode($data['course']['1stsemgrade11']);
		$twograde11 = json_decode($data['course']['2ndsemgrade11']);
		$onegrade12 = json_decode($data['course']['1stsemgrade12']);
		$twograde12 = json_decode($data['course']['2ndsemgrade12']);
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
			$rowname = '1stsemgrade11';
			
			$oldData = json_decode($data['course']['1stsemgrade11']);
			if(count($oldData) > 0){
				foreach ($oldData as $value) {
					array_push($newData, array('id' => $value->id));
				}	
			}
		}
		else if($status == 2){
			$rowname = '2ndsemgrade11';
			
			$oldData = json_decode($data['course']['2ndsemgrade11']);
			if(count($oldData) > 0){
				foreach ($oldData as $value) {
					array_push($newData, array('id' => $value->id));
				}	
			}
		}
		else if($status == 3){
			$rowname = '1stsemgrade12';
			
			$oldData = json_decode($data['course']['1stsemgrade12']);
			if(count($oldData) > 0){
				foreach ($oldData as $value) {
					array_push($newData, array('id' => $value->id));
				}	
			}
		}
		else if($status == 4){
			$rowname = '2ndsemgrade12';
			
			$oldData = json_decode($data['course']['2ndsemgrade12']);
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
		$this->load->view('adminpage/header');
		$this->load->view('adminpage/subject');
		$this->load->view('adminpage/footer');
	}
	public function listofsubjectperlevel(){
		$id = $_POST['id'];
		$status = $_POST['status'];
		$data['course'] = $this->pal_model->update_course($id);
		$data['subjects'] = $this->pal_model->subject();
		$arr = array();
		if($status == 1){
			$data['olddata'] = json_decode($data['course']['1stsemgrade11']);
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
			$data['olddata'] = json_decode($data['course']['2ndsemgrade11']);
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
			$data['olddata'] = json_decode($data['course']['1stsemgrade12']);
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
			$data['olddata'] = json_decode($data['course']['2ndsemgrade12']);
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
			$old = json_decode($data['course']['1stsemgrade11']);
			$rowname = "1stsemgrade11";
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
			$old = json_decode($data['course']['2ndsemgrade11']);
			$rowname = "2ndsemgrade11";
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
			$old = json_decode($data['course']['1stsemgrade12']);
			$rowname = "1stsemgrade12";
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
			$old = json_decode($data['course']['2ndsemgrade12']);
			$rowname = "2ndsemgrade12";
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
		$this->data['allcourses'] = $result;
		echo json_encode($this->data);
	}
}