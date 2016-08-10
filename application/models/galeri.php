<?php
class Galeri extends DataMapper {

	var $table = 'galeri';

	function __construct($id = NULL)
	{
		parent::__construct($id);
	}

	function get_json(){
		$this->db->order_by("id_galeri", "desc");
		$query = $this->db->get('galeri');
		return $query->result_array();
	}

	function delete_galeri($id){
		$this->db->where('id_galeri', $id);
		$this->db->delete('galeri');
		return true;
	}
}