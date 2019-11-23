<?php
class Musicgenres_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	public function get_genres(){
		$this->db->order_by('genre_name');
		$query = $this->db->get('music_genres');

		$genreList=array();
		if ($query->num_rows() != 0) {
			foreach ($query->result() as $row) {

				$genreList[] = new Musicgenres($row->id, $row->genre_name);

			}


		}
		$returnedArray = array('result' => true, 'genList' => $genreList);
		return $returnedArray;

	}

	public function get_genre($id){
		$query = $this->db->get_where('categories', array('id' => $id));
		return $query->row();
	}
}
