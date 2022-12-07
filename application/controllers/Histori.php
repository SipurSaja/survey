<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Histori extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->model("m_histori");

		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('auth');
            redirect($url);
		};
	}
	
	public function index()
	{
        // $data['users'] = $this->db->get_where('users', ['nip' => $this->session->userdata('nip')])->row_array();
        // $data['histori'] = $this->m_histori->get_histori();
        // $this->load->view("tampil/header");
        // $this->load->view("tampil/sidebar");
		// $this->load->view("histori/histori_form", $data);
        // $this->load->view("tampil/footer");
	}

    // Add a new item
    public function add()
    {
        $data = array(
            'nama_quiz' => $this->input->post('nama_quiz'),
            'tanggal' =>  $this->input->post('tanggal'),
         );
         $this->m_histori->add($data);
         $this->session->set_flashdata('message', 'Data Berhasil Di Tambahkan');
         redirect('dashboard/histori');
    }

    //Update one item
    public function edit( $id_histori = NULL )
    {
        $data = array(
            'id_histori' => $id_histori,
            'nama_quiz' => $this->input->post('nama_quiz'),
            'tanggal' =>  $this->input->post('tanggal'),
         );
         $this->m_histori->edit($data);
         $this->session->set_flashdata('message', 'Data Berhasil Di Edit');
         redirect('dashboard/histori');
    }

    //Delete one item
    public function delete( $id_histori = NULL )
    {
        $data = array('id_histori' => $id_histori );
        $this->m_histori->delete($data);
        $this->session->set_flashdata('message', 'Data Berhasil Di Hapus');
         redirect('dashboard/histori');
    }
}

/* End of histori.php */



?>