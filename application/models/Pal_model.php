<?php

	class PAL_model extends CI_model{
		public function __construct(){
			$this->load->database();
		}
		public function login($credentials){
			$query = $this->db->get_where('users_data', array('username' => $credentials['username'], 'password' => $credentials['password']));
			return $query->row_array();
		}
		public function courses_offer(){
			$query = $this->db->get('course_offer');
			return $query->result();
		}
		public function add_course($data){
			$this->db->insert('course_offer', $data);
			$insert_id = $this->db->insert_id();
			return $insert_id;
		}
		public function remove_course($id){
			$this->db->where('id', $id);
			$query = $this->db->delete('course_offer');
			return $query;
		}
		public function update_course($id){
			$query = $this->db->get_where('course_offer', array('id' => $id));
			return $query->row_array();
		}
		public function subject(){
			$query = $this->db->get('list_of_subject');
			return $query->result();
		}
		public function update_course_data($rowname, $id, $data){
			$data = json_encode($data, JSON_PRETTY_PRINT);
			$newData = [
	            $rowname => $data,
	        ];
	        $this->db->where('id', $id);
        	$this->db->update('course_offer', $newData);
		}
		public function update_course_name($id, $rowname, $course_name, $data){
			$newData = [
				'course_name' => $course_name,
				$rowname => $data
	        ];
	        $this->db->where('id', $id);
        	$this->db->update('course_offer', $newData);
		}
		public function add_subject($data){
			$this->db->insert('list_of_subject', $data);
			$insert_id = $this->db->insert_id();
			return $insert_id;
		}
		public function add_teacher($lrn,$data,$data2,$data3,$data4){
			$data = json_encode($data, JSON_PRETTY_PRINT);
			$data2 = json_encode($data2, JSON_PRETTY_PRINT);
			$data3 = json_encode($data3, JSON_PRETTY_PRINT);
			$data4 = json_encode($data4, JSON_PRETTY_PRINT);
			$newData = array(
				'personal_info' => $data,
	            'lrn' =>$lrn,
	            'address' => $data2,
	            'guardian_info' => $data3,
	            'education' => $data4,
	            'status' => '0',

			);
			$this->db->insert('teacher_data', $newData);
		}
		public function add_student($lrn,$data,$data2,$data3,$data4,$data5){
			$data = json_encode($data, JSON_PRETTY_PRINT);
			$data2 = json_encode($data2,JSON_PRETTY_PRINT);
			$data3 = json_encode($data3,JSON_PRETTY_PRINT);
			$data4 = json_encode($data4,JSON_PRETTY_PRINT);
			$data5 = json_encode($data5,JSON_PRETTY_PRINT);
			$newData = array(
				'personal_info' => $data,
				'acad_level' => $data5,
	            'lrn' =>$lrn,
	            'address' => $data2,
	            'guardian_info' => $data3,
	            'education' => $data4,
	            'status' =>'0',
			);
			$this->db->insert('student_data', $newData);
		}
		public function teacher_data(){
			$query = $this->db->get_where('teacher_data', array('status' => '1'));
			return $query->result();
		}
		public function viewTeacher($id){
			$query = $this->db->get_where('teacher_data', array('id' => $id));
			return $query->row_array();
		}
		/*viewing of student information*/
		public function student_data(){
			$query = $this->db->get_where('student_data');
			return $query->result();
		}
		public function viewStudent($id){
			$query = $this->db->get_where('student_data', array('id' => $id));
			return $query->row_array();
		}
		/*pending teacher for viewing*/
		public function pending_teacher(){
			$query = $this->db->get_where('teacher_data', array('status' => '0'));
			return $query->result();
		}
		/*pending student for viewing*/
		public function pending_student(){
			$query = $this->db->get_where('student_data', array('status' => '0'));
			return $query->result();
		}
		public function viewSubject($id){
			$query = $this->db->get_where('list_of_subject', array('id' => $id));
			return $query->row_array();
		}

		public function remove_subject($id){
			$this->db->where('id', $id);
			$query = $this->db->delete('list_of_subject');
			return $query;
		}
		/*remove student info from db*/
		public function remove_student($id){
			$this->db->where('id', $id);
			$query = $this->db->delete('student_data');
			return $query;
		}
		/*--*/
		/*confirm student*/
		public function confirm_student($id, $lrn){
			$this->db->where('id', $id);
			$query = $this->db->update('student_data', array('status' =>'1'));
			$this->db->insert('users_data', array(
				'username' => $lrn,
				'password' => '123456',
				'restriction' => 'student',
			));
			return $query;
		}
		/*confirm teacher*/
		public function confirm_teacher($id,$lrn){
			$this->db->where('id', $id);
			$query = $this->db->update('teacher_data', array('status' =>'1'));
			$this->db->insert('users_data', array(
				'username' => $lrn,
				'password' => '123456',
				'restriction' => 'teacher',
			));
			return $query;
		}
		/*remove teacher info*/
		public function remove_teacher($id){
			$this->db->where('id', $id);
			$query = $this->db->delete('teacher_data');
			return $query;
		}
		/*--*/
		public function update_subject_data($id, $data){
			$data = json_encode($data, JSON_PRETTY_PRINT);
			$newData = [
	            'teachers_id' => $data,
	        ];
	        $this->db->where('id', $id);
	        $this->db->update('list_of_subject', $newData);
		}
		public function update_subject_names($id, $rowname, $newName){
			$newData = [
				$rowname => $newName
	        ];
	        $this->db->where('id', $id);
        	$this->db->update('list_of_subject', $newData);
		}


		// adding of new acad year
		public function add_acad_year($acadyear, $opencourse){
			$data = json_encode($opencourse, JSON_PRETTY_PRINT);
			$newData = array(
				'acad_year' => $acadyear,
				'course_open_id' => $data
			);
			$this->db->insert('open_course', $newData);
		}

		// viewing of all academic year
		public function academic_year(){
			$query = $this->db->get('open_course');
			return $query->result();
		}

		// for getting open courses per academic year
		
		public function get_open_course_per_acadyear($id){
			$query = $this->db->get_where('open_course', array('id' => $id));
			return $query->row_array();
		}


		// adding of new section

		public function add_section($data){
			$this->db->insert('section_list', $data);
		}

		// check academic level for adding of section

		public function check_academic_level($course, $academicyear){
			$query = $this->db->get_where('section_list', array('course' => $course, 'academic_year' => $academicyear));
			return $query->result();
		}
	}