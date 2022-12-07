<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_quiz extends CI_Model {

    public function get_quiz(){
        $this->db->select('*');
        $this->db->from('quiz');
        $this->db->join('histori', 'histori.id_histori = quiz.id_histori', 'left');
        $this->db->order_by('quiz', 'desc');
        return $this->db->get()->result();
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
    
    public function add($data){
        $this->db->insert('quiz', $data);
    }


    public function edit($data){
        $this->db->where('id_quiz', $data['id_quiz']);
        $this->db->update('quiz', $data);
    }

    public function delete($data){
        $this->db->where('id_quiz', $data['id_quiz']);
        $this->db->delete('quiz', $data);
    }

    public function tampil_page($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('quiz', $keyword);
            $this->db->or_like('nama_quiz', $keyword);
        }
        $this->db->join('histori', 'histori.id_histori = histori.id_histori', 'left');
        return $this->db->get('quiz', $limit, $start)->result_array();
    }

    public function countAll()
    {
        return $this->db->get('quiz')->num_rows();
    }

}



?>
