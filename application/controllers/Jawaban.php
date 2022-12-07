<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jawaban extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->model("m_jawaban");
        $this->load->model("m_histori");
        $this->load->model("m_quiz");
        $this->load->model('m_dashboard');
        

		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('auth');
            redirect($url);
		};
	}
	
	public function index()
	{

	}

    public function get_quiz($id_histori){
        $histori = $this->m_histori->get_data($id_histori);
        $data ['judul']= 'Quiz '. $histori->nama_quiz;
        $data ['jawaban'] = $this->m_jawaban->get_quiz_by_histori($id_histori);
        $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
        $this->load->view("side/header", $data);
        $this->load->view("side/sidebar", $data);
		$this->load->view("quiz/quiz_tampil", $data);
        $this->load->view("side/footer", $data);
     }

    public function edit($id_histori)
    {
        $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
        $data ['jawaban'] = $this->m_jawaban->get_quiz_by_histori($id_histori);
        $data['get_id'] = $id_histori;
        $this->load->view("side/header", $data);
        $this->load->view("side/sidebar", $data);
		$this->load->view("quiz/quiz_tampil", $data);
        $this->load->view("side/footer", $data);
    }

    public function jawab()
    {
        
        $i = 1;
        $id_user = $this->session->userdata('id');
        $id_kepala = $this->input->post('id_kepala');
        while (isset($_POST['jawab'.$i])) {
            $id_quiz = $_POST['id_quiz' .$i];
            $jawab = $this->input->post('jawab'. $i);
            $this->m_jawaban->hasil($id_user, $id_quiz, $id_kepala, $jawab);
            $i++;
        }
        
        redirect('dashboard/jawab','refresh');
    }
} 

?>