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

		if(empty($data['course'])){
			show_404();
		}
		

		$this->load->view('adminpage/header');
		$this->load->view('adminpage/courseUpdate', $data);
		$this->load->view('adminpage/footer');
	}

	public function updateCourseData(){
		$id = $_POST['id'];
		$removesubjects = $_POST['subjects'];
		$year_level = $_POST['year_level'];
		$semester = $_POST['semester'];
		$status = $_POST['status'];
		$data['course'] = $this->pal_model->update_course($id);
		$onegrade11 = json_decode($data['course']['1stsemgrade11']);
		$twograde11 = json_decode($data['course']['2ndsemgrade11']);
		$onegrade12 = json_decode($data['course']['1stsemgrade12']);
		$twograde12 = json_decode($data['course']['2ndsemgrade12']);
		$arr = array();
		$subjects = $this->pal_model->subject();
		if(count($onegrade11) > 1){
				foreach ($subjects as $key => $value) {
					foreach ($onegrade11 as $value2) {
						if ($value->id == $value2->id) {
							unset($subjects[$key]);
						}
					}
				}
			}
			if(count($twograde11) > 1){
				foreach ($subjects as $key => $value) {
					foreach ($twograde11 as $value2) {
						if ($value->id == $value2->id) {
							unset($subjects[$key]);
						}
					}
				}
			}
			if(count($onegrade12) > 1){
				foreach ($subjects as $key => $value) {
					foreach ($onegrade12 as $value2) {
						if ($value->id == $value2->id) {
							unset($subjects[$key]);
						}
					}
				}
			}
			if(count($twograde12) > 1){
				foreach ($subjects as $key => $value) {
					foreach ($twograde12 as $value2) {
						if ($value->id == $value2->id) {
							unset($subjects[$key]);
						}
					}
				}
			}
			$this->data['subjects'] = $subjects;
		// if($status == "1"){
			
		// 	if(count($onegrade11) > 1){
		// 		foreach ($subjects as $key => $value) {
		// 			foreach ($onegrade11 as $value2) {
		// 				if ($value->id == $value2->id) {
		// 					unset($subjects[$key]);
		// 				}
		// 			}
		// 		}
		// 	}
		// 	if(count($twograde11) > 1){
		// 		foreach ($subjects as $key => $value) {
		// 			foreach ($twograde11 as $value2) {
		// 				if ($value->id == $value2->id) {
		// 					unset($subjects[$key]);
		// 				}
		// 			}
		// 		}
		// 	}
		// 	if(count($onegrade12) > 1){
		// 		foreach ($subjects as $key => $value) {
		// 			foreach ($onegrade12 as $value2) {
		// 				if ($value->id == $value2->id) {
		// 					unset($subjects[$key]);
		// 				}
		// 			}
		// 		}
		// 	}
		// 	if(count($twograde12) > 1){
		// 		foreach ($subjects as $key => $value) {
		// 			foreach ($twograde12 as $value2) {
		// 				if ($value->id == $value2->id) {
		// 					unset($subjects[$key]);
		// 				}
		// 			}
		// 		}
		// 	}
		// 	$this->data['subjects'] = $subjects;
		// }
		// if($status == "2"){
			
		// }
		// if($status == "3"){
			
		// }
		// if($status == "4"){
			
		// }
		
		
		
		echo json_encode($this->data);
		
	}
	public function removeCourseData(){
		$id = $_POST['id'];
		$removesubjects = $_POST['removesubjects'];
		$data['course'] = $this->pal_model->update_course($id);
		$new = json_decode($data['course']['subject_ids']);
		$arr = array();
		
		foreach ($new as $key => $value) {
			for ($i=0; $i < count($removesubjects); $i++) {
				if($value->id == $removesubjects[$i]){
					unset($new[$key]);
				}
			}
		}
		foreach ($new as $key => $value){
			array_push($arr, array('id' => $value->id));
		}
		
		$this->data['removesubjects'] = $arr;
		$result = $this->pal_model->update_course_data($id, $arr);
		echo json_encode($this->data);
	}

	public function subject(){
		$this->load->view('adminpage/header');
		$this->load->view('adminpage/subject');
		$this->load->view('adminpage/footer');
	}
}