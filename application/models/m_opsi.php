<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_opsi extends CI_Model {

    public function get_opsi(){
        $this->db->select('*');
        $this->db->from('opsi');
        $this->db->order_by('value', 'desc');
        return $this->db->get()->result();
    }

    public function add($data){
        $this->db->insert('opsi', $data);
    }
    
    public function tampil_page($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('opsi', $keyword);
            $this->db->or_like('value', $keyword);
        }
        $this->db->order_by('value', 'desc');
        return $this->db->get('opsi', $limit, $start)->result_array();
    }

    public function countAll()
    {
        return $this->db->get('opsi')->num_rows();
    }

    public function edit($data){
        $this->db->where('id_opsi', $data['id_opsi']);
        $this->db->update('opsi', $data);
    }

    public function delete($data){
        $this->db->where('id_opsi', $data['id_opsi']);
        $this->db->delete('opsi', $data);
    }

}



?>
