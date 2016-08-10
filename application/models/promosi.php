<?php
class Promosi extends DataMapper {

    var $table = 'promosi';

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }

    function get_json(){
    	$this->db->order_by("id_promosi", "desc"); 
    	$query = $this->db->get('promosi');
    	return $query->result_array();
    }

    function delete_promosi($id){
    	$this->db->where('id_promosi', $id);
		$this->db->delete('promosi'); 
		return true;
    }
}