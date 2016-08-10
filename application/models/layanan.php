<?php
class Layanan extends DataMapper {

    var $table = 'layanan';

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }

    function get_json(){
    	$query = $this->db->get('layanan');
    	return $query->result_array();
    }

    function delete_layanan($id){
    	$this->db->where('id_layanan', $id);
		$this->db->delete('layanan'); 
		return true;
    }
}