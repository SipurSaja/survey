<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model{

    function query_validasi_nip($nip){
    	$result = $this->db->query("SELECT * FROM pengguna LEFT JOIN guru ON pengguna.id_guru = guru.id_guru LEFT JOIN sekolah ON pengguna.id_sekolah = sekolah.id_sekolah WHERE guru.nip='$nip' or pengguna.username='$nip' LIMIT 1");
        return $result;
    }

    function query_validasi_password($nip,$password){
    	$result = $this->db->query("SELECT * FROM pengguna LEFT JOIN guru ON pengguna.id_guru = guru.id_guru WHERE guru.nip='$nip' or pengguna.username='$nip' AND password='$password' LIMIT 1");
        return $result;
    }

    public function getSekolah()
    {
        $query = $this->db->get('sekolah')->result();
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

} 