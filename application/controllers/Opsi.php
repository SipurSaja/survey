<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Opsi extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->model("m_opsi");

		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('auth');
            redirect($url);
		};
	}
	
	public function index()
	{
        // $data['users'] = $this->db->get_where('users', ['nip' => $this->session->userdata('nip')])->row_array();
        // $data['opsi'] = $this->m_opsi->get_opsi();
        // $this->load->view("tampil/header");
        // $this->load->view("tampil/sidebar");
		// $this->load->view("opsi/opsi_form", $data);
        // $this->load->view("tampil/footer");
	}

    // Add a new item
    public function add()
    {
        $data = array(
            'opsi' => $this->input->post('opsi'),
            'value' =>  $this->input->post('value'),
         );
         $this->m_opsi->add($data);
         $this->session->set_flashdata('message', 'Data Berhasil Di Tambahkan');
         redirect('dashboard/opsi');
    }

    //Update one item
    public function edit( $id_opsi = NULL )
    {
        $data = array(
            'id_opsi' => $id_opsi,
            'opsi' => $this->input->post('opsi'),
            'value' =>  $this->input->post('value'),
            
         );
         $this->m_opsi->edit($data);
         $this->session->set_flashdata('message', 'Data Berhasil Di Edit');
         redirect('dashboard/opsi');
    }

    //Delete one item
    public function delete( $id_opsi = NULL )
    {
        $data = array('id_opsi' => $id_opsi );
        $this->m_opsi->delete($data);
        $this->session->set_flashdata('message', 'Data Berhasil Di Hapus');
         redirect('dashboard/opsi');
    }
}

/* End of opsi.php */



?>