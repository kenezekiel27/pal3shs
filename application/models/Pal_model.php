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
		public function add_teacher($lrn,$data){
			$data = json_encode($data, JSON_PRETTY_PRINT);
			$newData = array(
				'personal_info' => $data,
	            'lrn' =>$lrn,

			);
			$this->db->insert('teacher_data', $newData);
		}
		public function teacher_data(){
			$query = $this->db->get('teacher_data');
			return $query->result();
		}
		//for viewing of subject

		public function viewSubject($id){
			$query = $this->db->get_where('list_of_subject', array('id' => $id));
			return $query->row_array();
		}

		public function remove_subject($id){
			$this->db->where('id', $id);
			$query = $this->db->delete('list_of_subject');
			return $query;
		}
		public function update_subject_data($id, $data){
			$data = json_encode($data, JSON_PRETTY_PRINT);
			$newData = [
	            'teachers_id' => $data,
	        ];
	        $this->db->where('id', $id);
	        $this->db->update('list_of_subject', $newData);
		}
		// public function update_course($id){
		// 	$query = $this->db->get_where('course_offer', array('id' => $id));
		// 	return $query->row_array();
		// }
		// public function update_course_data($rowname, $id, $data){
		// 	$data = json_encode($data, JSON_PRETTY_PRINT);
		// 	$newData = [
	 //            $rowname => $data,
	 //        ];
	 //        $this->db->where('id', $id);
  //       	$this->db->update('course_offer', $newData);
		// }
	}