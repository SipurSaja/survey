<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengguna extends CI_Model {

    public function get_pengguna(){
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->join('sekolah', 'sekolah.id_sekolah = pengguna.id_sekolah', 'left');
        $this->db->join('guru', 'guru.id_guru = pengguna.id_guru', 'left');
        $this->db->join('user_group', 'user_group.id = pengguna.id_group', 'left');
        $this->db->order_by('id_user', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function get_data($id_user){
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->join('sekolah', 'sekolah.id_sekolah = pengguna.id_sekolah', 'left');
        $this->db->join('guru', 'guru.id_guru = pengguna.id_guru', 'left');
        $this->db->join('user_group', 'user_group.id = pengguna.id_group', 'left');
        // $this->db->order_by('pengguna', 'desc');
        $this->db->where('id_user', $id_user);
        return $this->db->get()->row();
    }  

    public function getSekolah()
    {
        $query = $this->db->get('sekolah')->result_array();
        return $query;
    }

    public function getNip($id_sekolah)
    {
        $query = $this->db->get_where('guru', ['id_sekolah' => $id_sekolah])->result();
        return $query;
    }

    public function create($input)
    {
        $this->db->insert('pengguna', $input);
        return $this->db->affected_rows();
    }

    public function getByIdPengguna($id_user)
    {
        return $this->db->get_where('pengguna', ['id_user' => $id_user])->row_array();   
    }

    function get_data_pengguna(){
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->join('user_group', 'user_group.id = pengguna.id_group', 'left');
        $this->db->join('sekolah', 'sekolah.id_sekolah = pengguna.id_sekolah', 'left');
        $this->db->join('guru', 'guru.id_guru = pengguna.id_guru', 'left');
        $query = $this->db->get();
        return $query;
    }

    public function tampil_page($limit, $start, $keyword = null)
    {
        if($keyword) {
            $this->db->like('nama', $keyword);
            $this->db->or_like('nip', $keyword);
            $this->db->or_like('nama_sekolah', $keyword);
            $this->db->or_like('username', $keyword);
            $this->db->or_like('group_name', $keyword);
        }
        $this->db->join('guru', 'guru.id_guru = pengguna.id_guru', 'left');
        $this->db->join('sekolah', 'sekolah.id_sekolah = pengguna.id_sekolah', 'left');
        $this->db->join('user_group', 'user_group.id = pengguna.id_group', 'left');  

        return $this->db->get('pengguna', $limit, $start)->result_array();
    }

    public function countAll()
    {
        return $this->db->get('pengguna')->num_rows();
    }

    
    public function update($up,$input)
    {
        $this->db->update('pengguna', $input, $up);
        return $this->db->affected_rows();   
    }

    public function delete($id_user)
    {
        $this->db->delete('pengguna', ['id_user' => $id_user]);
        return $this->db->affected_rows();   
    }

}



?>