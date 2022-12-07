<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

    public function get_histori(){
        $this->db->select('*');
        $this->db->from('histori');
        $this->db->order_by('id_histori', 'desc');
        return $this->db->get()->result();
    }

    public function get_quiz(){
        $this->db->select('*');
        $this->db->from('quiz');
        $this->db->join('histori', 'histori.id_histori = quiz.id_histori', 'left');
        $this->db->order_by('quiz', 'desc');
        return $this->db->get()->result();
    }

    function cekdata(){
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->join('sekolah', 'sekolah.id_sekolah = pengguna.id_sekolah', 'left');
        $this->db->join('kepala_sekolah', 'sekolah.id_sekolah = kepala_sekolah.id_sekolah', 'left');
        // $this->db->join('status', 'status.id_status = kepala_sekolah.id_status', 'left');
        $this->db->join('guru', 'guru.id_guru = pengguna.id_guru', 'left');
        $this->db->join('user_group', 'user_group.id = pengguna.id_group', 'left');
        // $this->db->where('kepala_sekolah.id_status', 1);
        $this->db->where('id_user',  $this->session->userdata('id'));
        
        return $this->db->get();

    }

    public function jawaban()
    {
        $this->db->select('nama_quiz, SUM(jawab) as total');
        $this->db->join('kepala_sekolah', 'kepala_sekolah.id_kepala = jawaban.id_kepala', 'left');
        $this->db->join('pengguna', 'pengguna.id_user = jawaban.id_user', 'left');
        $this->db->join('quiz', 'quiz.id_quiz = jawaban.id_quiz', 'left');
        $this->db->join('histori', 'histori.id_histori = quiz.id_histori', 'left');
        $this->db->join('sekolah', 'sekolah.id_sekolah = kepala_sekolah.id_sekolah', 'left');
        $this->db->group_by('nama_quiz'); 
        $this->db->where('pengguna.id_user', $this->session->userdata('id'));
        $hasil = $this->db->get('jawaban');
         return $hasil;
    }

    public function rekap()
    {
        $this->db->select('kepala_sekolah.nama_kepala, sekolah.nama_sekolah, histori.nama_quiz, COUNT(DISTINCT quiz.id_quiz) as totalquiz, COUNT(DISTINCT jawaban.id_user) as respon, SUM(jawab) as total');
        $this->db->join('kepala_sekolah', 'kepala_sekolah.id_kepala = jawaban.id_kepala', 'left');
        $this->db->join('pengguna', 'pengguna.id_user = jawaban.id_user', 'left');
        $this->db->join('quiz', 'quiz.id_quiz = jawaban.id_quiz', 'left');
        $this->db->join('histori', 'histori.id_histori = quiz.id_histori', 'left');
        $this->db->join('sekolah', 'sekolah.id_sekolah = kepala_sekolah.id_sekolah', 'left');
        $this->db->group_by('nama_kepala'); 
        $this->db->group_by('nama_quiz'); 
        $this->db->order_by('total', 'desc');
        $hasil = $this->db->get('jawaban');
         return $hasil;
    }

    public function detailres()
    {
        $this->db->join('kepala_sekolah', 'kepala_sekolah.id_kepala = jawaban.id_kepala', 'left');
        $this->db->join('pengguna', 'pengguna.id_user = jawaban.id_user', 'left');
        $this->db->join('quiz', 'quiz.id_quiz = jawaban.id_quiz', 'left');
        $this->db->join('histori', 'histori.id_histori = quiz.id_histori', 'left');
        $this->db->join('sekolah', 'sekolah.id_sekolah = kepala_sekolah.id_sekolah', 'left');
        $hasil = $this->db->get('jawaban');
         return $hasil;
    }
    

    public function totalquiz()
    {
        $this->db->select('histori.nama_quiz, COUNT(quiz.id_quiz) as total');
        // $this->db->from('histori');
        $this->db->join('quiz', 'quiz.id_histori = histori.id_histori', 'left');
        $this->db->join('jawaban', 'jawaban.id_quiz = quiz.id_quiz', 'left');
        $this->db->join('pengguna', 'pengguna.id_user = jawaban.id_user', 'left');
        $this->db->group_by('nama_quiz'); 
        $this->db->where('id_sekolah', $this->session->userdata('id_sekolah'));
        // $this->db->order_by('total', 'desc'); 
        $hasil = $this->db->get('histori');
         return $hasil;
    }


    public function sumquiz()
    {
        $this->db->select('*');
        $this->db->from('quiz');
        return $this->db->get()->num_rows();  
    }

    public function sumjudul()
    {
        $this->db->select('*');
        $this->db->from('histori');
        return $this->db->get()->num_rows();  
    }

    public function sumjawab()
    {
        $this->db->distinct();
        $this->db->select('jawaban.id_user');
        $this->db->from('jawaban');
        $this->db->join('pengguna', 'pengguna.id_user = jawaban.id_user', 'left');
        $this->db->where('id_sekolah', $this->session->userdata('id_sekolah'));
        return $this->db->get()->num_rows();  
    }

    public function sumjawabanmu()
    {
        $this->db->distinct();
        $this->db->select('id_quiz');
        $this->db->from('jawaban');
        $this->db->where('id_user', $this->session->userdata('id'));
        return $this->db->get()->num_rows();  
    }


    public function get_user($id_user){
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->join('sekolah', 'sekolah.id_sekolah = pengguna.id_sekolah', 'left');
        $this->db->join('guru', 'guru.id_guru = pengguna.id_guru', 'left');
        $this->db->join('user_group', 'user_group.id = pengguna.id_group', 'left');
        $this->db->where('id_user', $id_user);
        return $this->db->get()->row();
    }  

    public function get_data($id_quiz){
        $this->db->select('*');
        $this->db->from('quiz');
        $this->db->join('histori', 'histori.id_histori = quiz.id_histori', 'left');
        // $this->db->order_by('quiz', 'desc');
        $this->db->where('id_quiz', $id_quiz);
        
        return $this->db->get()->row();
    }
    
    public function get_quiz_by_histori($id_histori){
        $this->db->select('*');
        $this->db->from('quiz');
        $this->db->join('histori', 'histori.id_histori = quiz.id_histori', 'left');
        $this->db->where('quiz.id_histori', $id_histori);
        return $this->db->get()->result();
    }
}



?>
