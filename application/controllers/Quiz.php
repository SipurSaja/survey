<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->model("m_quiz");
        $this->load->model("m_histori");
        $this->load->model('m_dashboard');
        

		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('auth');
            redirect($url);
		};
	}
	
	public function index()
	{
	}

    public function histori($id_histori){

        $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
        $histori = $this->m_histori->get_data($id_histori);
        $data ['judul']= 'Quiz '. $histori->nama_quiz;
        $data ['quiz'] = $this->m_quiz->get_quiz_by_histori($id_histori);
        $this->load->view("side/header");
        $this->load->view("side/sidebar");
		$this->load->view("quiz/quiz_side", $data);
        $this->load->view("side/footer");
     }
     
    public function add()
    {
        $this->form_validation->set_rules('quiz', 'Quiz', 'required', array(
            'required' => 'Masukkan Nama Quiz !'
        ));
        $this->form_validation->set_rules('id_histori', 'Histori', 'required', array(
            'required' => 'Pilih Judul !'
        )); 
        if ($this->form_validation->run() == TRUE) 
        {
            $data = array (
                'quiz' => $this->input->post('quiz'),
                'id_histori' => $this->input->post('id_histori')
            );
            $this->m_quiz->add($data);
            $this->session->flashdata('msg','Data berhasil ditambahkan');
            redirect('dashboard/quiz','refresh');
        }
        else {
            $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
            $data['histori'] = $this->m_histori->get_histori();
            $this->load->view("side/header");
            $this->load->view("side/sidebar", $data);
		    $this->load->view("quiz/quiz_add", $data);
            $this->load->view("side/footer");
        }

    }

    //Update one item
    public function edit( $id_quiz = NULL )
    {
        $this->form_validation->set_rules('quiz', 'Quiz','required', array(
            'required' => 'Masukkan Nama Quiz !'
        ));
        $this->form_validation->set_rules('id_histori', 'Histori', 'required', array(
            'required' => 'Pilih Judul Quiz !'
        )); 
        if ($this->form_validation->run() == TRUE) 
        {
            $data = array (
                'id_quiz' => $id_quiz,
                'quiz' => $this->input->post('quiz'),
                'id_histori' => $this->input->post('id_histori')
            );
            $this->m_quiz->edit($data);
            $this->session->flashdata('msg','Data berhasil diubah');
            redirect('dashboard/quiz','refresh');
        }
        else {
            $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
            $data['quiz'] = $this->m_quiz->get_data($id_quiz);
            $data['histori'] = $this->m_histori->get_histori();
            $this->load->view("side/header");
            $this->load->view("side/sidebar", $data);
		    $this->load->view("quiz/quiz_edit", $data);
            $this->load->view("side/footer");
        }

    }

    //Delete one item
    public function delete( $id_quiz = NULL )
    {
        $data = array('id_quiz' => $id_quiz );
        $this->m_quiz->delete($data);
        $this->session->set_flashdata('message', 'Data Berhasil Di Hapus');
         redirect('dashboard/quiz');
    }
}

/* End of quiz.php */



?>