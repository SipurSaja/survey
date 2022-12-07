<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepala_sekolah extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->model("m_kepala");
        $this->load->model("m_sekolah");
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
        $this->form_validation->set_rules('nama_kepala', 'Nama Kepala', 'required', array(
            'required' => 'Masukkan Nama !'
        ));
        $this->form_validation->set_rules('nip', 'Nip', 'required', array(
            'required' => 'Masukkan NIP !'
        ));
        $this->form_validation->set_rules('id_sekolah', 'Sekolah', 'required', array(
            'required' => 'Pilih sekolah !'
        ));
        $this->form_validation->set_rules('periode_awal', 'periode', 'required', array(
            'required' => 'Pilih Periode Awal !'
        ));
        $this->form_validation->set_rules('periode_akhir', 'periode', 'required', array(
            'required' => 'Pilih Periode akhir !'
        ));
        $this->form_validation->set_rules('id_status', 'status', 'required', array(
            'required' => 'Pilih Status !'
        ));

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/foto_users/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
            $config['max_size']     = '2000';

            $this->upload->initialize($config);
            $f = "foto";

            if (!$this->upload->do_upload($f)) {
                $data = array (
                    'title'=> 'Tambah Kepala Sekolah',
                    'pengguna' => $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array(),
                    'sekolah'=> $this->m_sekolah->get_sekolah(),
                    'status'=> $this->m_kepala->get_status(),
                    'error_up'=> $this->upload->display_errors(),
                );

                $this->load->view("side/header");
                $this->load->view("side/sidebar", $data);
                $this->load->view("kepala/kepala_add", $data);
                $this->load->view("side/footer");
                } else {
                    $up_foto = array('uploads' => $this->upload->data());
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/foto_users/'. $up_foto['uploads']['file_name'];
                    $this->load->library('image_lib', $config);
                    $data = array(
                        'id_sekolah' => $this->input->post('id_sekolah'),
                        'nama_kepala' => $this->input->post('nama_kepala'),
                        'nip' => $this->input->post('nip'),
                        'periode_awal' => $this->input->post('periode_awal'),
                        'periode_akhir' => $this->input->post('periode_akhir'),
                        'id_status' => $this->input->post('id_status'),
                        'foto' => $up_foto['uploads']['file_name'],
                    );
                    $this->m_kepala->add($data);
                    $this->session->set_flashdata('message', 'Kepala Sekolah Berhasil Di Tambahkan');
                    redirect('dashboard/kepala_sekolah');
                }
            } else {
                 $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
                $data['sekolah'] = $this->m_sekolah->get_sekolah();
                $data['status'] = $this->m_kepala->get_status();
                // $data['guru'] = $this->m_guru->get_guru();

                $this->load->view("side/header");
                $this->load->view("side/sidebar", $data);
                $this->load->view("kepala_sekolah/kepala_add", $data);
                $this->load->view("side/footer");
        }
    }

    //Update one item
    public function edit( $id_kepala = NULL )
    {
        $this->form_validation->set_rules('nama_kepala', 'Nama Kepala', 'required', array(
            'required' => 'Masukkan Nama !'
        ));
        $this->form_validation->set_rules('nip', 'Nip', 'required', array(
            'required' => 'Masukkan NIP !'
        ));
        $this->form_validation->set_rules('id_sekolah', 'Sekolah', 'required', array(
            'required' => 'Pilih sekolah !'
        ));
        $this->form_validation->set_rules('periode_awal', 'periode', 'required', array(
            'required' => 'Pilih Periode Awal !'
        ));
        $this->form_validation->set_rules('periode_akhir', 'periode', 'required', array(
            'required' => 'Pilih Periode akhir !'
        ));
        $this->form_validation->set_rules('id_status', 'status', 'required', array(
            'required' => 'Pilih Status !'
        ));

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/foto_users/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
            $config['max_size']     = '2000';

            $this->upload->initialize($config);
            $f = "foto";

            if (!$this->upload->do_upload($f)) {
                $data = array (
                    'pengguna' => $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array(),
                    'title'=> 'Tambah Kepala Sekolah',
                    'kepala_sekolah'=> $this->m_kepala->get_data($id_kepala),
                    'sekolah'=> $this->m_sekolah->get_sekolah(),
                    'status'=> $this->m_kepala->get_status(),
                    'error_up'=> $this->upload->display_errors(),

                );

                $this->load->view("side/header");
                $this->load->view("side/sidebar", $data);
                $this->load->view("kepala_sekolah/kepala_edit", $data);
                $this->load->view("side/footer");
            } else {
                //hapus gambar
                $kepala_sekolah = $this->m_kepala->get_data($id_kepala);
                if ($kepala_sekolah->foto != "") {
                    unlink('./assets/foto_users/'. $kepala_sekolah->foto);
                }

                $up_foto = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/foto_users/'. $up_foto['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_kepala' => $id_kepala,
                    'id_sekolah' => $this->input->post('id_sekolah'),
                    'nama_kepala' => $this->input->post('nama_kepala'),
                    'nip' => $this->input->post('nip'),
                    'periode_awal' => $this->input->post('periode_awal'),
                    'periode_akhir' => $this->input->post('periode_akhir'),
                    'id_status' => $this->input->post('id_status'),
                    'foto' => $up_foto['uploads']['file_name'],
                );
                $this->m_kepala->edit($data);
                $this->session->set_flashdata('message', 'Film Berhasil Di Tambahkan');
                redirect('dashboard/kepala_sekolah');
            }
            //Tampa Mengganti Gambar
            $data = array(
                'id_kepala' => $id_kepala,
                'id_sekolah' => $this->input->post('id_sekolah'),
                'nama_kepala' => $this->input->post('nama_kepala'),
                'nip' => $this->input->post('nip'),
                'periode_awal' => $this->input->post('periode_awal'),
                'periode_akhir' => $this->input->post('periode_akhir'),
                'id_status' => $this->input->post('id_status'),
                );
                $this->m_kepala->edit($data);
                $this->session->set_flashdata('message', 'Film Berhasil Di Tambahkan');
                redirect('dashboard/kepala_sekolah');

        } else {
            $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
            $data['kepala_sekolah'] = $this->m_kepala->get_data($id_kepala);
            $data['sekolah'] = $this->m_sekolah->get_sekolah();
            $data['status'] = $this->m_kepala->get_status();

            $this->load->view("side/header");
            $this->load->view("side/sidebar", $data);
            $this->load->view("kepala_sekolah/kepala_edit", $data);
            $this->load->view("side/footer");
        }
    }

        public function edit_id( $id_kepala = NULL )
        {
            $this->form_validation->set_rules('id_status', 'status', 'required', array(
                'required' => 'Pilih Status !'
            )); 
            if ($this->form_validation->run() == TRUE) 
            {
                $data = array (
                    'id_kepala' => $id_kepala,
                    'id_status' => $this->input->post('id_status')
                );
                $this->m_kepala->edit($data);
                $this->session->flashdata('msg','Data berhasil diubah');
                redirect('dashboard/kepala_sekolah_id');
            }
            else {
                $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
                $data['kepala_sekolah'] = $this->m_kepala->get_data($id_kepala);
                $data['sekolah'] = $this->m_sekolah->get_sekolah();
                $data['status'] = $this->m_kepala->get_status();

                $this->load->view("side/header");
                $this->load->view("side/sidebar", $data);
                $this->load->view("kepala_sekolah/kepala_edit_id", $data);
                $this->load->view("side/footer");
            }
    
        }


    //Delete one item
    public function delete( $id_kepala = NULL )
    {
        $kepala_sekolah = $this->m_kepala->get_data($id_kepala);
        if ($kepala_sekolah->foto != "") {
            unlink('./assets/foto_users/'. $kepala_sekolah->kepala_sekolah);
        }
        $data = array('id_kepala' => $id_kepala );
        $this->m_kepala->delete($data);
        $this->session->set_flashdata('message', 'Data Berhasil Di Hapus');
         redirect('dashboard/kepala_sekolah');
    }
}

?>