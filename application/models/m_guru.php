<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_guru extends CI_Model {

    public function get_guru(){
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->join('sekolah', 'sekolah.id_sekolah = guru.id_sekolah', 'left');
        $this->db->order_by('id_guru', 'desc');
        return $this->db->get()->result();
    }
    public function get_data($id_guru){
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->join('sekolah', 'sekolah.id_sekolah = guru.id_sekolah', 'left');
        // $this->db->order_by('guru', 'desc');
        $this->db->where('id_guru', $id_guru);
        
        return $this->db->get()->row();
    }
    
    public function tampil_page($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nip', $keyword);
            $this->db->or_like('nama', $keyword);
            $this->db->or_like('telp', $keyword);
            $this->db->or_like('email', $keyword);
            $this->db->or_like('jabatan', $keyword);
            $this->db->or_like('jenis_kelamin', $keyword);
            $this->db->or_like('nama_sekolah', $keyword);
        }
        $this->db->join('sekolah', 'sekolah.id_sekolah = guru.id_sekolah', 'left');
        return $this->db->get('guru', $limit, $start)->result_array();
    }

    public function tampil_page_id($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nip', $keyword);
            $this->db->or_like('nama', $keyword);
            $this->db->or_like('telp', $keyword);
            $this->db->or_like('email', $keyword);
            $this->db->or_like('jabatan', $keyword);
            $this->db->or_like('jenis_kelamin', $keyword);
            $this->db->or_like('nama_sekolah', $keyword);
        }
        $this->db->join('sekolah', 'sekolah.id_sekolah = guru.id_sekolah', 'left');
		$this->db->where('guru.id_sekolah', $this->session->userdata('id_sekolah'));
        return $this->db->get('guru', $limit, $start)->result_array();
    }

    public function countAll()
    {
        return $this->db->get('guru')->num_rows();
    }


    public function add($data){
        $this->db->insert('guru', $data);
    }

    public function edit($data){
        $this->db->where('id_guru', $data['id_guru']);
        $this->db->update('guru', $data);
    }

    public function delete($data){
        $this->db->where('id_guru', $data['id_guru']);
        $this->db->delete('guru', $data);
    }

}

?>
