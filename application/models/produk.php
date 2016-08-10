<?php
class Produk extends DataMapper {

    var $table = 'produk';

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }

    function get_json(){
    	$this->db->order_by("id_produk", "desc"); 
    	$query = $this->db->get('produk');
    	return $query->result_array();
    }

    function delete_produk($id){
    	$this->db->where('id_produk', $id);
		$this->db->delete('produk'); 
		return true;
    }
}