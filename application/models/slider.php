<?php
class Slider extends DataMapper {

	var $table = 'slider';

	function __construct($id = NULL)
	{
		parent::__construct($id);
	}

	function get_json(){
		$this->db->order_by("id_slider", "desc");
		$query = $this->db->get('slider');
		return $query->result_array();
	}

	function delete_slider($id){
		$this->db->where('id_slider', $id);
		$this->db->delete('slider');
		return true;
	}
        
        function getJson_edit($id){
            
		$this->db->where("id_slider", "$id");
		$query = $this->db->get('slider');
		return $query->row_array();
	}
}