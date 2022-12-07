<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

    public function get_transaksi(){
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('histori', 'histori.id_histori = transaksi.id_histori', 'left');
        $this->db->join('kepala_sekolah', 'sekolah.id_sekolah = kepala_sekolah.id_sekolah', 'left');
        $this->db->join('sekolah', 'sekolah.id_sekolah = transaksi.id_sekolah', 'left');
        // $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function get_data($id_transaksi){
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('histori', 'histori.id_histori = transaksi.id_histori', 'left');
        $this->db->join('sekolah', 'sekolah.id_sekolah = transaksi.id_sekolah', 'left');
        $this->db->join('kepala_sekolah', 'sekolah.id_sekolah = kepala_sekolah.id_sekolah', 'left');
        // $this->db->order_by('transaksi', 'desc');
        $this->db->where('id_transaksi', $id_transaksi);
        
        return $this->db->get()->row();
    }
    
    public function tampil_page($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_quiz', $keyword);
            $this->db->or_like('nama_sekolah', $keyword);
            $this->db->or_like('hasil', $keyword);
        }
        $this->db->join('histori', 'histori.id_histori = transaksi.id_histori', 'left');
        $this->db->join('sekolah', 'sekolah.id_sekolah = transaksi.id_sekolah', 'left');
        $this->db->join('kepala_sekolah', 'sekolah.id_sekolah = kepala_sekolah.id_sekolah', 'left');
        return $this->db->get('transaksi', $limit, $start)->result_array();
    }

    public function tampil_page_id($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_quiz', $keyword);
            $this->db->or_like('nama_sekolah', $keyword);
            $this->db->or_like('hasil', $keyword);
        }
        $this->db->join('histori', 'histori.id_histori = transaksi.id_histori', 'left');
        $this->db->join('sekolah', 'sekolah.id_sekolah = transaksi.id_sekolah', 'left');
        $this->db->join('kepala_sekolah', 'sekolah.id_sekolah = kepala_sekolah.id_sekolah', 'left');
		$this->db->where('transaksi.id_sekolah', $this->session->userdata('id_sekolah'));
        return $this->db->get('transaksi', $limit, $start)->result_array();
    }

    public function countAll()
    {
        return $this->db->get('transaksi')->num_rows();
    }

    // public function jawaban()
    // {
    //     $this->db->select('SUM(jawab) as total');
    //     $this->db->from('jawaban');
    //     $this->db->join('pengguna', 'pengguna.id_user = jawaban.id_user', 'left');
    //     $this->db->join('sekolah', 'pengguna.id_sekolah = sekolah.id_sekolah', 'left');
    //     $this->db->join('kepala_sekolah', 'sekolah.id_sekolah = kepala_sekolah.id_sekolah', 'left');
    //     $this->db->where('jawaban.id_user', $this->session->userdata('id'));
    //     return $this->db->get()->row()->total;  
    // }

    public function add($data){
        $this->db->insert('transaksi', $data);
    }

    public function edit($data){
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('transaksi', $data);
    }

    public function delete($data){
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->delete('transaksi', $data);
    }

}



?>
