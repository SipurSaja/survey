<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->model("m_transaksi");
        $this->load->model("m_sekolah");
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


    public function add()
    {
        $this->form_validation->set_rules('id_sekolah', 'Sekolah', 'required', array(
            'required' => 'Pilih Sekolah !'
        ));
        $this->form_validation->set_rules('id_histori', 'Judul', 'required', array(
            'required' => 'Pilih Judul !'
        )); 
        if ($this->form_validation->run() == TRUE) 
        {
            $data = array (
                'id_sekolah' => $this->input->post('id_sekolah'),
                'id_histori' => $this->input->post('id_histori')
            );
            $this->m_transaksi->add($data);
            $this->session->flashdata('msg','Data berhasil ditambahkan');
            redirect('dashboard/transaksi','refresh');
        }
        else {   
            $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
            $data['sekolah'] = $this->m_sekolah->get_sekolah();
            $data['histori'] = $this->m_histori->get_histori();
            $this->load->view("side/header");
            $this->load->view("side/sidebar", $data);
		    $this->load->view("transaksi/transaksi_add", $data);
            $this->load->view("side/footer");
        }

    }


    //Update one item
    public function edit( $id_transaksi = NULL )
    {
        $this->form_validation->set_rules('id_sekolah', 'Sekolah', 'required', array(
            'required' => 'Pilih Sekolah !'
        ));
        $this->form_validation->set_rules('id_histori', 'Judul', 'required', array(
            'required' => 'Pilih Judul !'
        )); 
        if ($this->form_validation->run() == TRUE) 
        {
            $data = array (
                'id_transaksi' => $id_transaksi,
                'id_sekolah' => $this->input->post('id_sekolah'),
                'id_histori' => $this->input->post('id_histori')
            );
            $this->m_transaksi->edit($data);
            $this->session->flashdata('msg','Data berhasil diubah');
            redirect('dashboard/transaksi','refresh');
        }
        else {
            $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
            $data['transaksi'] = $this->m_transaksi->get_data($id_transaksi);
            $data['histori'] = $this->m_histori->get_histori();
            $data['sekolah'] = $this->m_sekolah->get_sekolah();
            $this->load->view("side/header", $data);
            $this->load->view("side/sidebar", $data, $data);
		    $this->load->view("transaksi/transaksi_edit", $data);
            $this->load->view("side/footer", $data);
        }

    }

    //Delete one item
    public function delete( $id_transaksi = NULL )
    {
        $data = array('id_transaksi' => $id_transaksi );
        $this->m_transaksi->delete($data);
        $this->session->set_flashdata('message', 'Data Berhasil Di Hapus');
         redirect('dashboard/transaksi');
    }
}

/* End of transaksi.php */



?>