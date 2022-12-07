<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->model("m_sekolah");

		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('auth');
            redirect($url);
		};
	}
	
	public function index()
	{
	}

    // Add a new item
    public function add()
    {
        $data = array(
            'nama_sekolah' => $this->input->post('nama_sekolah'),
            'alamat_sekolah' =>  $this->input->post('alamat_sekolah'),
            'email_sekolah' =>  $this->input->post('email_sekolah'),
         );
         $this->m_sekolah->add($data);
         $this->session->set_flashdata('message', 'Data Berhasil Di Tambahkan');
         redirect('dashboard/sekolahan');
    }

    //Update one item
    public function edit( $id_sekolah = NULL )
    {
        $data = array(
            'id_sekolah' => $id_sekolah,
            'nama_sekolah' => $this->input->post('nama_sekolah'),
            'alamat_sekolah' =>  $this->input->post('alamat_sekolah'),
            'email_sekolah' =>  $this->input->post('email_sekolah'),
            
         );
         $this->m_sekolah->edit($data);
         $this->session->set_flashdata('message', 'Data Berhasil Di Edit');
         redirect('dashboard/sekolahan');
    }

    //Delete one item
    public function delete( $id_sekolah = NULL )
    {
        $data = array('id_sekolah' => $id_sekolah );
        $this->m_sekolah->delete($data);
        $this->session->set_flashdata('message', 'Data Berhasil Di Hapus');
         redirect('dashboard/sekolahan');
    }
}

/* End of histori.php */



?>