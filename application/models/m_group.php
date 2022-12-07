<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_group extends CI_Model {

    public function get_group(){
        $this->db->select('*');
        $this->db->from('user_group');
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result();
    }

    public function tampil_page($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('id', $keyword);
            $this->db->or_like('gruop_name', $keyword);
        }
        return $this->db->get('user_group', $limit, $start)->result_array();
    }

    public function countAll()
    {
        return $this->db->get('user_group')->num_rows();
    }


    public function add($data){
        $this->db->insert('user_group', $data);
    }

    public function edit($data){
        $this->db->where('id', $data['id']);
        $this->db->update('user_group', $data);
    }

    public function delete($data){
        $this->db->where('id', $data['id']);
        $this->db->delete('user_group', $data);
    }

}



?>
