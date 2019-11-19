<?php
class Musicgenres_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	public function get_genres(){
		$this->db->order_by('genre_name');
		$query = $this->db->get('music_genres');
		return $query->result_array();
	}

	public function get_genre($id){
		$query = $this->db->get_where('categories', array('id' => $id));
		return $query->row();
	}
}
