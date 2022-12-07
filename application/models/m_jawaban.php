<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_jawaban extends CI_Model {

    public function get_jawaban(){
        $this->db->select('*');
        $this->db->from('jawaban');
        $this->db->join('pengguna', 'pengguna.id_user = jawaban.id_user', 'left');
        $this->db->join('quiz', 'quiz.id_quiz = jawaban.id_quiz', 'left');
        $this->db->join('histori', 'histori.id_histori = quiz.id_histori', 'right');
        $this->db->order_by('id_jawaban', 'desc');
        return $this->db->get()->result();
    }

    public function get_quiz_by_histori($id_histori){
        $this->db->select('*');
        $this->db->from('quiz');
        $this->db->join('histori', 'histori.id_histori = quiz.id_histori', 'left');
        $this->db->where('quiz.id_histori', $id_histori);
        return $this->db->get()->result();
    }

    public function update($table, $data, $where)
    {
        $this->db->where($where)
                ->update($table, $data);
            return TRUE;
    }

    public function get_kepala(){
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->join('sekolah', 'sekolah.id_sekolah = pengguna.id_sekolah', 'left');
        $this->db->join('kepala_sekolah', 'sekolah.id_sekolah = kepala_sekolah.id_sekolah', 'left');
        $this->db->join('guru', 'guru.id_guru = pengguna.id_guru', 'left');
        $this->db->join('user_group', 'user_group.id = pengguna.id_group', 'left');
        $this->db->where('pengguna.id_sekolah', $id_histori);
        return $this->db->get()->result();
    }

    public function hasil($id_user, $id_quiz, $id_kepala, $jawab)
    {
        $data = array (
            'id_user' => $id_user,
            'id_kepala' => $id_kepala,
            'id_quiz' => $id_quiz,
            'jawab' => $jawab
        );
        $this->db->join('kepala_sekolah', 'kepala_sekolah.id_kepala = jawaban.id_kepala', 'left');
        $this->db->join('status', 'status.id_status = kepala_sekolah.id_status', 'left');
        $this->db->where('kepala_sekolah.id_status', 1);
        
        return $this->db->insert('jawaban', $data);
    }
}



?>
