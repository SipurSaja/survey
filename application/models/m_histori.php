<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_histori extends CI_Model {

    public function get_histori(){
        $this->db->select('*');
        $this->db->from('histori');
        $this->db->order_by('id_histori', 'desc');
        return $this->db->get()->result();
    }
    public function get_data($id_histori){
        $this->db->select('*');
        $this->db->from('histori');
        $this->db->order_by('id_histori', 'desc');
        
        return $this->db->get()->row();
    }

    public function add($data){
        $this->db->insert('histori', $data);
    }

    public function edit($data){
        $this->db->where('id_histori', $data['id_histori']);
        $this->db->update('histori', $data);
    }

    public function delete($data){
        $this->db->where('id_histori', $data['id_histori']);
        $this->db->delete('histori', $data);
    }

    public function tampil_page($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_quiz', $keyword);
            $this->db->or_like('tanggal', $keyword);
        }
        return $this->db->get('histori', $limit, $start)->result_array();
    }

    public function countAll()
    {
        return $this->db->get('histori')->num_rows();
    }

}



?>
