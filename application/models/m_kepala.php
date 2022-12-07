<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_kepala extends CI_Model {

    public function get_kepala(){
        $this->db->select('*');
        $this->db->from('kepala_sekolah');
        $this->db->join('status', 'status.id_status = kepala_sekolah.id_status' , 'left');
        $this->db->join('sekolah', 'sekolah.id_sekolah = kepala_sekolah.id_sekolah', 'left');
        $this->db->order_by('id_status', 'desc');
        return $this->db->get()->result();
    }

    public function get_status(){
        $this->db->select('*');
        $this->db->from('status');
        return $this->db->get()->result();
    }

    public function get_data($id_kepala){
        $this->db->select('*');
        $this->db->from('kepala_sekolah');
        $this->db->join('sekolah', 'sekolah.id_sekolah = kepala_sekolah.id_sekolah' , 'left');
        $this->db->join('status', 'status.id_status = kepala_sekolah.id_status' , 'left');
        $this->db->order_by('id_kepala', 'desc');
        $this->db->where('id_kepala', $id_kepala);
        
        return $this->db->get()->row();
    }

    public function tampil_page($limit, $start, $keyword = null)
    {
        if($keyword) {
            $this->db->like('nama_kepala', $keyword);
            $this->db->or_like('nip', $keyword);
            $this->db->or_like('periode_awal', $keyword);
            $this->db->or_like('periode_akhir', $keyword);
            $this->db->or_like('nama_sekolah', $keyword);
            $this->db->or_like('jenis_status', $keyword);
        }
        $this->db->join('sekolah', 'sekolah.id_sekolah = kepala_sekolah.id_sekolah', 'left');
        $this->db->join('status', 'status.id_status = kepala_sekolah.id_status' , 'left');
        return $this->db->get('kepala_sekolah', $limit, $start)->result_array();
    }

    public function tampil_page_id($limit, $start, $keyword = null)
    {
        if($keyword) {
            $this->db->like('nama_kepala', $keyword);
            $this->db->or_like('nip', $keyword);
            $this->db->or_like('periode_awal', $keyword);
            $this->db->or_like('periode_akhir', $keyword);
            $this->db->or_like('jenis_status', $keyword);
            $this->db->or_like('nama_sekolah', $keyword);
        }
        $this->db->join('status', 'status.id_status = kepala_sekolah.id_status' , 'left');
        $this->db->join('sekolah', 'sekolah.id_sekolah = kepala_sekolah.id_sekolah', 'left'); 
        $this->db->where('kepala_sekolah.id_sekolah', $this->session->userdata('id_sekolah'));
        return $this->db->get('kepala_sekolah', $limit, $start)->result_array();
    }

    public function countAll()
    {
        return $this->db->get('kepala_sekolah')->num_rows();
    }

    public function add($data){
        $this->db->insert('kepala_sekolah', $data);
    }

    public function edit($data){
        $this->db->where('id_kepala', $data['id_kepala']);
        $this->db->update('kepala_sekolah', $data);
    }

    public function delete($data){
        $this->db->where('id_kepala', $data['id_kepala']);
        $this->db->delete('kepala_sekolah', $data);
    }

}

?>
