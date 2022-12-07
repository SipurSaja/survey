<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_documents extends CI_Model {

    public function upload($data_arr){
        $this->db->join('kepala_sekolah', 'kepala_sekolah.id_kepala = document.id_kepala', 'left');
        $this->db->join('status', 'status.id_status = kepala_sekolah.id_status', 'left');
        $this->db->where("id_file");
        // $this->db->where('kepala_sekolah.id_status', 1);
        $result = $this->db->insert('document', $data_arr);
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_documents(){
		return $this->db->get('document');
	}

    public function cekdata(){
        $this->db->select('*');
        $this->db->from('document');
        $this->db->join('kepala_sekolah', 'kepala_sekolah.id_kepala = document.id_kepala', 'left');
        $this->db->join('status', 'status.id_status = kepala_sekolah.id_status', 'left');
        $this->db->join('pengguna', 'pengguna.id_user = document.id_user', 'left'); 
        $this->db->join('sekolah', 'pengguna.id_sekolah = sekolah.id_sekolah', 'left'); 
        $this->db->where('kepala_sekolah.id_status', 1);
        return $this->db->get();

    }

    public function download_file($id_file )
    {
        $query = $this->db->get_where('document',array('id_file '=>$id_file ));
        return $query->result();
    }

    public function get_data($id_file)
    {
        $this->db->select('*');
        $this->db->from('document');
        $this->db->where('id_file', $id_file);
        
        return $this->db->get()->row();
    }

    public function delete($data){
        $this->db->where('id_file', $data['id_file']);
        $this->db->delete('document', $data);
    }
    
    public function edit($data){
        $this->db->where('id_file', $data['id_file']); 
        $this->db->update('document', $data);
    }

    public function get_documents_id(){
		$this->db->where('document.id_user', $this->session->userdata('id_user'));
        return $this->db->get('document')->result();         
	}
    
    public function tampil_page($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_file', $keyword);
            $this->db->or_like('file', $keyword);
            $this->db->or_like('nama_sekolah', $keyword);
        }
        $this->db->join('pengguna', 'pengguna.id_user = document.id_user', 'left'); 
        $this->db->join('kepala_sekolah', 'kepala_sekolah.id_kepala = document.id_kepala', 'left'); 
        $this->db->join('status', 'status.id_status = kepala_sekolah.id_status' , 'left');
        $this->db->join('sekolah', 'pengguna.id_sekolah = sekolah.id_sekolah', 'left'); 
        return $this->db->get('document', $limit, $start)->result_array();
    }

    public function tampil_page_id($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_file', $keyword);
            $this->db->or_like('file', $keyword);
        }
        $this->db->join('kepala_sekolah', 'kepala_sekolah.id_kepala = document.id_kepala', 'left'); 
        $this->db->join('status', 'status.id_status = kepala_sekolah.id_status' , 'left');
		$this->db->where('document.id_user', $this->session->userdata('id'));
        $this->db->where('kepala_sekolah.id_status', 1);
        return $this->db->get('document', $limit, $start)->result_array();
    }

    public function countAll()
    {
        return $this->db->get('document')->num_rows();
    }

}



?>
