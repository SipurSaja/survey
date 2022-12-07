<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->model("m_guru");
        $this->load->model("m_sekolah");
        $this->load->model("m_dashboard");
        // $this->load->library('pagination');

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
            'required' => 'Pilih sekolah !'
        ));
        $this->form_validation->set_rules('nip', 'nip', 'required', array(
            'required' => 'Masukkan NIP !'
        ));
        $this->form_validation->set_rules('nama', 'Nama', 'required', array(
            'required' => 'Masukkan nama lengkap !'
        ));
        $this->form_validation->set_rules('telp', 'No telp', 'required', array(
            'required' => 'Masukkan no telp !'
        ));
        $this->form_validation->set_rules('email', 'Email', 'required', array(
            'required' => 'Masukkan email !'
        ));
        // $this->form_validation->set_rules('jabatan', 'Jabatan', 'required', array(
        //     'required' => 'Masukkan Jabatan !'
        // )); 
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', array(
            'required' => 'Pilih jenis kelamin !'
        ));
    
            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = './assets/foto_users/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
                $config['max_size']     = '10000';
    
                $this->upload->initialize($config);
                $f = "foto";
                if (!$this->upload->do_upload($f)) {
                    $data = array (
                        'pengguna'=> $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array(),
                        'title'=> 'Tambah Guru',
                        'sekolah'=> $this->m_sekolah->get_sekolah(),
                        'error_up'=> $this->upload->display_errors(),
    
                    );
                    $this->load->view("side/header");
                    $this->load->view("side/sidebar", $data);
                    $this->load->view("guru/guru_add", $data);
                    $this->load->view("side/footer");
                } else {
                    $up_foto = array('uploads' => $this->upload->data());
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/foto_users/'. $up_foto['uploads']['file_name'];
                    $this->load->library('image_lib', $config);
                    $data = array(
                        'id_sekolah' => $this->input->post('id_sekolah'),
                        'nip' => $this->input->post('nip'),
                        'nama' => $this->input->post('nama'),
                        'telp' => $this->input->post('telp'),
                        'email' => $this->input->post('email'),
                        'jabatan' => guru,
                        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                        'foto' => $up_foto['uploads']['file_name'],
                    );
                    $this->m_guru->add($data);
                    $this->session->set_flashdata('message', 'Guru Berhasil Di Tambahkan');
                    redirect('dashboard/guru');
                }
            } else {
                $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
                $data['sekolah'] = $this->m_sekolah->get_sekolah();

                $this->load->view("side/header");
                $this->load->view("side/sidebar", $data);
                $this->load->view("guru/guru_add", $data);
                $this->load->view("side/footer");
        }
    }

    //Update one item
    public function edit( $id_guru = NULL )
    {
        $this->form_validation->set_rules('id_sekolah', 'Sekolah', 'required', array(
            'required' => 'Pilih sekolah !'
        ));
        $this->form_validation->set_rules('nip', 'nip', 'required', array(
            'required' => 'Masukkan NIP !'
        ));
        $this->form_validation->set_rules('nama', 'Nama', 'required', array(
            'required' => 'Masukkan nama lengkap !'
        ));
        $this->form_validation->set_rules('telp', 'No telp', 'required', array(
            'required' => 'Masukkan no telp !'
        ));
        $this->form_validation->set_rules('email', 'Email', 'required', array(
            'required' => 'Masukkan email !'
        ));
        // $this->form_validation->set_rules('jabatan', 'Jabatan', 'required', array(
        //     'required' => 'Masukkan Jabatan !'
        // )); 
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', array(
            'required' => 'Pilih jenis kelamin !'
        ));

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/foto_users/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
            $config['max_size']     = '2000';

            $this->upload->initialize($config);
            $f = "foto";

            if (!$this->upload->do_upload($f)) {
                $data = array (
                    'pengguna'=> $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array(),
                    'title'=> 'Tambah Guru',
                    'guru'=> $this->m_guru->get_data($id_guru),
                    'sekolah'=> $this->m_sekolah->get_sekolah(),
                    'error_up'=> $this->upload->display_errors(),

                );

                $this->load->view("side/header");
                $this->load->view("side/sidebar", $data);
                $this->load->view("guru/guru_edit", $data);
                $this->load->view("side/footer");
            } else {
                //hapus gambar
                $guru = $this->m_guru->get_data($id_guru);
                if ($guru->foto != "") {
                    unlink('./assets/foto_users/'. $guru->foto);
                }

                $up_foto = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/foto_users/'. $up_foto['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_guru' => $id_guru,
                    'id_sekolah' => $this->input->post('id_sekolah'),
                    'nip' => $this->input->post('nip'),
                    'nama' => $this->input->post('nama'),
                    'telp' => $this->input->post('telp'),
                    'email' => $this->input->post('email'),
                    'jabatan' => guru,
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'foto' => $up_foto['uploads']['file_name'],
                );
                $this->m_guru->edit($data);
                $this->session->set_flashdata('message', 'Film Berhasil Di Tambahkan');
                redirect('dashboard/guru');
            }
            //Tampa Mengganti Gambar
            $data = array(
                'id_guru' => $id_guru,
                'id_sekolah' => $this->input->post('id_sekolah'),
                'nip' => $this->input->post('nip'),
                'nama' => $this->input->post('nama'),
                'telp' => $this->input->post('telp'),
                'email' => $this->input->post('email'),
                'jabatan' => guru,
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                );
                $this->m_guru->edit($data);
                $this->session->set_flashdata('message', 'Film Berhasil Di Tambahkan');
                redirect('dashboard/guru');

        } else {
            $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
            $data['guru'] = $this->m_guru->get_data($id_guru);
            $data['sekolah'] = $this->m_sekolah->get_sekolah();

            $this->load->view("side/header");
            $this->load->view("side/sidebar", $data);
            $this->load->view("guru/guru_edit", $data);
            $this->load->view("side/footer");
        }
    }

// Detail Guru
    public function Detail($id_guru){
        $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
        // $data ['judul']= 'Halaman Menonton';
        $data['guru'] = $this->m_guru->get_data($id_guru);
        $data['sekolah'] = $this->m_sekolah->get_sekolah();
        $this->load->view("side/header");
        $this->load->view("side/sidebar", $data);
        $this->load->view("guru/guru_detail", $data);
        $this->load->view("side/footer");
     }

     public function Detail_id($id_guru){
        $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
        // $data ['judul']= 'Halaman Menonton';
        $data['guru'] = $this->m_guru->get_data($id_guru);
        $data['sekolah'] = $this->m_sekolah->get_sekolah();
        $this->load->view("side/header");
        $this->load->view("side/sidebar", $data);
        $this->load->view("guru/guru_detail_id", $data);
        $this->load->view("side/footer");
     }

    //Delete one item
    public function delete( $id_guru = NULL )
    {
        $guru = $this->m_guru->get_data($id_guru);
        if ($guru->foto != "") {
            unlink('./assets/foto_users/'. $guru->gambar);
        }
        $data = array('id_guru' => $id_guru );
        $this->m_guru->delete($data);
        $this->session->set_flashdata('message', 'Data Berhasil Di Hapus');
         redirect('dashboard/guru');
    }
}

/* End of guru.php */



?>