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
		
	}