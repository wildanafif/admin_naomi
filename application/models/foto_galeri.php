<?php

class Foto_galeri extends DataMapper {

    var $table = 'foto_galeri';

    function __construct($id = NULL) {
        parent::__construct($id);
    }

    function get_json() {
        $this->db->order_by("id_foto_galeri", "desc");
        $query = $this->db->get('foto_galeri');
        return $query->result_array();
    }

    function delete_foto_galeri($id) {
        $this->db->where('id_foto_galeri', $id);
        $this->db->delete('foto_galeri');
        return true;
    }

    function delete_galeri($id) {
        $this->db->where('id_galeri', $id);
        $this->db->delete('foto_galeri');
        return true;
    }

}
