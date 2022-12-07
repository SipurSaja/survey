<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documents extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->model("m_documents");

		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('auth');
            redirect($url);
		};
	}
	
	public function index()
	{
	}

    // Add a new file
    public function add()
    {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $this->form_validation->set_rules('id_kepala', 'Kepala Sekolah'); 
        $this->form_validation->set_rules('nama_file', 'Nama File', 'required'); 
        $this->load->library('upload');

        $config = array (
            'upload_path' => FCPATH . 'assets/file/', 
            'allowed_types' => "pdf|docx",
            'max_size' => '20000', 
        );
        $this->upload->initialize($config);
        $this->upload->do_upload("file");
        $file_data = $this->upload->data();
        $file = $file_data["file_name"];
        $id_user = $this->session->userdata('id');
        $id_kepala = $this->input->post('id_kepala');
        $data_arr = array (
            'id_user' => $id_user,
            'id_kepala' => $id_kepala,
            'nama_file' => $this->input->post('nama_file'),
            'file' => $file,
        );

        $result = $this->m_documents->upload($data_arr);

        if ($result) {
            $this->session->set_flashdata('msg', 'Berhasil Mengirim Document');
            redirect('dashboard/documents','refresh');
        } else {
            $this->session->set_flashdata('msg', 'Gagal Mengirim Document');
            redirect('dashboard/documents','refresh');
            }
        }
    }

    public function add_id()
    {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // $this->form_validation->set_rules('id_kepala', 'Kepala Sekolah'); 
        $this->form_validation->set_rules('nama_file', 'Nama File', 'required'); 
        $this->load->library('upload');

        $config = array (
            'upload_path' => FCPATH . 'assets/file/', 
            'allowed_types' => "pdf|docx",
            'max_size' => '20000', 
        );
        $this->upload->initialize($config);
        $this->upload->do_upload("file");
        $file_data = $this->upload->data();
        $file = $file_data["file_name"];
        $id_user = $this->session->userdata('id');
        $id_kepala = $this->input->post('id_kepala');
        $data_arr = array (
            'id_user' => $id_user,
            'id_kepala' => $id_kepala,
            'nama_file' => $this->input->post('nama_file'),
            'file' => $file,
        );

        $result = $this->m_documents->upload($data_arr);

        if ($result) {
            $this->session->set_flashdata('msg', 'Berhasil Mengirim Document');
            redirect('dashboard/documentsid','refresh');
        } else {
            $this->session->set_flashdata('msg', 'Gagal Mengirim Document');
            redirect('dashboard/documentsid','refresh');
            }
        }
    }

// Edit file
    public function edit($id_file)
    {
        $this->form_validation->set_rules('nama_file', 'Nama File', 'required'); 

        if ($this->form_validation->run()==true) {
        $config = array (
            'upload_path' => FCPATH . 'assets/file/', 
            'allowed_types' => "pdf|docx",
            'max_size' => '20000', 
        );
        $this->upload->initialize($config);
            
        if (!$this->upload->do_upload('file')) {
            $data = array (
                'documents' => $this->m_documents->get_data($id_file)
            );
        $this->load->view("tampil/header");
        $this->load->view("tampil/sidebar");
		$this->load->view("documents/documents_form", $data);
        $this->load->view("tampil/footer");
        } else {
            $documents = $this->m_documents->get_data($id_file);
                if ($documents->file != "") {
                    unlink('assets/file/'. $documents->file);
            }

            $file_data = $this->upload->data();
            $file = $file_data["file_name"];

            $data = array (
                'id_file' => $id_file,
                'nama_file' => $this->input->post('nama_file'),
                'file' => $file,
            );

            $this->m_documents->edit($data);
            redirect('dashboard/documents','refresh');
        }
    
        $data = array (
            'id_file' => $id_file,
            'nama_file' => $this->input->post('nama_file')
        );
        $this->m_documents->edit($data);
        redirect('dashboard/documents','refresh');
    }
    }

    public function edit_id($id_file)
    {
        $this->form_validation->set_rules('nama_file', 'Nama File', 'required'); 

        if ($this->form_validation->run()==true) {
        $config = array (
            'upload_path' => FCPATH . 'assets/file/', 
            'allowed_types' => "pdf|docx",
            'max_size' => '20000', 
        );
        $this->upload->initialize($config);
            
        if (!$this->upload->do_upload('file')) {
            $data = array (
                'documents' => $this->m_documents->get_data($id_file)
            );
        $this->load->view("tampil/header");
        $this->load->view("tampil/sidebar");
		$this->load->view("documents/documents_form", $data);
        $this->load->view("tampil/footer");
        } else {
            $documents = $this->m_documents->get_data($id_file);
                if ($documents->file != "") {
                    unlink('assets/file/'. $documents->file);
            }

            $file_data = $this->upload->data();
            $file = $file_data["file_name"];

            $data = array (
                'id_file' => $id_file,
                'nama_file' => $this->input->post('nama_file'),
                'file' => $file,
            );

            $this->m_documents->edit($data);
            redirect('dashboard/documentsid','refresh');
        }
    
        $data = array (
            'id_file' => $id_file,
            'nama_file' => $this->input->post('nama_file')
        );
        $this->m_documents->edit($data);
        redirect('dashboard/documentsid','refresh');
    }
    }

// Download
    public function download($id_file)
    {
        // Load zip library
        $this->load->library('zip');
        
        $query = $this->m_documents->download_file($id_file);
        
        foreach ($query as $row)
        {
            $fileName = FCPATH."assets/file/".$row->file;

            $this->zip->read_file($fileName);
        }
        $filename = "Document.zip";
        $this->zip->download($filename);

    }

    //Delete one item
    public function delete( $id_file = NULL )
    {
        $document = $this->m_documents->get_data($id_file);
        if ($document->file != "") {
            unlink('assets/file/'. $document->file);
        }
        $data = array('id_file' => $id_file );
        $this->m_documents->delete($data);
        $this->session->set_flashdata('message', 'Data Berhasil Di Hapus');
        redirect('dashboard/documents');
    }

    public function delete_id( $id_file = NULL )
    {
        $document = $this->m_documents->get_data($id_file);
        if ($document->file != "") {
            unlink('assets/file/'. $document->file);
        }
        $data = array('id_file' => $id_file );
        $this->m_documents->delete($data);
        $this->session->set_flashdata('message', 'Data Berhasil Di Hapus');
        redirect('dashboard/documentsid');
    }
}

/* End of documents.php */



?>