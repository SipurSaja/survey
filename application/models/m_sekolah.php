<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_sekolah extends CI_Model {

    public function get_sekolah(){
        $this->db->select('*');
        $this->db->from('sekolah');
        $this->db->order_by('id_sekolah', 'desc');
        return $this->db->get()->result();
    }

    public function get_data($id_sekolah){
        $this->db->select('*');
        $this->db->from('sekolah');
        $this->db->order_by('id_sekolah', 'desc');
        $this->db->where('id_sekolah', $id_sekolah);
        
        return $this->db->get()->row();
    }

    public function add($data){
        $this->db->insert('sekolah', $data);
    }

    public function edit($data){
        $this->db->where('id_sekolah', $data['id_sekolah']);
        $this->db->update('sekolah', $data);
    }

    public function delete($data){
        $this->db->where('id_sekolah', $data['id_sekolah']);
        $this->db->delete('sekolah', $data);
    }

    public function tampil_page($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_sekolah', $keyword);
            $this->db->or_like('alamat_sekolah', $keyword);
            $this->db->or_like('email_sekolah', $keyword);
        }
        return $this->db->get('sekolah', $limit, $start)->result_array();
    }

    public function countAll()
    {
        return $this->db->get('sekolah')->num_rows();
    }

}



?>
