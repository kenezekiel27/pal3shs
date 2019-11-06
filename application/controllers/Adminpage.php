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
		$arr = array();
		$data['course'] = $this->pal_model->update_course($id);

		$new = json_decode($data['course']['subject_ids']);
		foreach ($new as $value) {
			array_push($arr, array('id' => $value->id));
		}
		for ($i=0; $i < count($subjects); $i++) { 
			
			array_push($arr, array('id' => $subjects[$i]));
		}
		$this->data['msg'] = $arr;
		$result = $this->pal_model->update_course_data($id, $arr);
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
	/*viewing fo subject list*/
	public function subject(){
		$subjects = $this->pal_model->subject_offer();
		
		$this->data['subjects'] = $subjects;
		$this->load->view('adminpage/header');
		$this->load->view('adminpage/subject',$this->data);
		$this->load->view('adminpage/footer');
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
			/*$new_course = array(
				'course_name' => $track.'/'.$strand,
				'id' => $courseadd
			);
			$this->data['data'] = $new_course;*/
			echo json_encode($this->data);
		}
	}
	/*viewing of teacher list*/
	// public function teacher(){
		
	// 	$this->load->view('adminpage/header');
	// 	$this->load->view('adminpage/dashboard',$this->data);
	// 	$this->load->view('adminpage/footer');
	// }
	
}