<?php
class Artikel extends DataMapper {

	var $table = 'artikel';

	function __construct($id = NULL)
	{
		parent::__construct($id);
	}

	function get_json(){
		$this->db->order_by("id_artikel", "desc");
		$query = $this->db->get('artikel');
		return $query->result_array();
	}

	function delete_artikel($id){
		$this->db->where('id_artikel', $id);
		$this->db->delete('artikel');
		return true;
	}
}