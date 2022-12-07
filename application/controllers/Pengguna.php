<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->model("m_pengguna");
        $this->load->model("m_sekolah");
        $this->load->model("m_group");
        $this->load->model("m_guru");
        $this->load->model('m_dashboard');
        

		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('auth');
            redirect($url);
		};
	}
	
	public function index()
	{

	}

// Add
    public function form_add()
    {
        $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
        $data['user_group'] = $this->m_group->get_group();
        $data['sekolah'] = $this->m_pengguna->getSekolah();

        $this->form_validation->set_rules('id_group', 'Group', 'required');
        $this->form_validation->set_rules('username', 'user', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view("side/header", $data);
            $this->load->view("side/sidebar", $data);
            $this->load->view("pengguna/pengguna_add", $data);
            $this->load->view("side/footer", $data);
        }
        else {
            $input = [
                'id_group' => $this->input->post('id_group'),
                'username' => $this->input->post('username'),
                'id_sekolah' => $this->input->post('id_sekolah'),
                'id_guru' => $this->input->post('id_guru'),
                'password' => $this->input->post('password'),
            ];

            if ($this->m_pengguna->create($input) > 0) {
                $this->session->set_flashdata('msg', 'Data Berhasil Disimpan');
                redirect('dashboard/pengguna','refresh');
            } else {
                $this->session->set_flashdata('msg', 'Data Gagal Disimpan');
                redirect('pengguna/form_add','refresh');
            }
        }

    }

    public function getNip()
    {
        $id_guru = $this->input->post('id_guru',TRUE);
        $id_sekolah = $this->input->post('id',TRUE);
        $data = $this->m_pengguna->getNip($id_sekolah);
        $output = '<option value=""> Pilih NIP </option>';
        foreach ($data as $row) {
            if ($id_guru) { //edit
                if ($id_guru == $row->id_guru) {
                    $output .= '<option value="' .$row->id_guru . '" selected>'. $row->nip . '</option>';
                } else {
                    $output .= '<option value="' .$row->id_guru . '">'. $row->nip . '</option>';
                }
            } else { //tambah
                $output .= '<option value="' .$row->id_guru . '">'. $row->nip . '</option>';
            }
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
        
    }

    //edit 

    public function getId($id_user, $type)
    {
        $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
        $data['user_group'] = $this->m_group->get_group();
        $data['sekolah'] = $this->m_pengguna->getSekolah();
        $dataPengguna = $this->m_pengguna->getByIdPengguna($id_user);
        if ($type == 'edit') {
            $data['getById'] = $dataPengguna;
            $this->form_validation->set_rules('username', 'User', 'required');
            $this->form_validation->set_rules('id_group', 'Group', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view("side/header", $data);
                $this->load->view("side/sidebar", $data);
                $this->load->view("pengguna/pengguna_edit", $data);
                $this->load->view("side/footer", $data);
            } else {
                $input = [
                    'id_group' => $this->input->post('id_group'),
                    'username' => $this->input->post('username'),
                    'id_sekolah' => $this->input->post('id_sekolah'),
                    'id_guru' => $this->input->post('id_guru'),
                    'password' => $this->input->post('password'),
                ];

                if ($this->m_pengguna->update(array('id_user' => $this->input->post('id_user')),$input) > 0) {
                    $this->session->set_flashdata('msg', 'Data Berhasil Disimpan');
                    redirect('dashboard/pengguna','refresh');
                } else {
                    $this->session->set_flashdata('msg', 'Data Gagal Disimpan');
                    redirect('pengguna/form_add','refresh');
                }    
            }
            
        } elseif ($type == 'delete') {
            if ($this->m_pengguna->delete($id_user) > 0) {
                $this->session->set_flashdata('msg', 'Data Berhasil Disimpan');
                redirect('dashboard/pengguna','refresh');
            } else {
                $this->session->set_flashdata('msg', 'Data Gagal Disimpan');
                redirect('pengguna/form_add','refresh');
            }    
        }
        else {
            $this->output->set_content_type('application/json')->set_output(json_encode($dataPengguna));
        }

    }

    public function getdatasekolah()
    {
        $searchTerm = $this->input->post('searchTerm');
        $response   = $this->m_pengguna->get_sekolah($searchTerm);
        echo json_encode($response);
    }
    
    public function getdataguru($id_sekolah)
    {
        $searchTerm = $this->input->post('searchTerm');
        $response   = $this->m_pengguna->get_nip($id_sekolah, $searchTerm);
        echo json_encode($response);
    }

    //Delete one item
    public function delete( $id_user = NULL )
    {
        $data = array('id_user' => $id_user );
        $this->m_pengguna->delete($data);
        $this->session->set_flashdata('message', 'Data Berhasil Di Hapus');
         redirect('dashboard/pengguna');
    }
}

/* End of pengguna.php */



?>