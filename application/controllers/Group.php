<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->model("m_group");

		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('auth');
            redirect($url);
		};
	}
	
	public function index()
	{
        $data['users'] = $this->db->get_where('users', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['user_group'] = $this->m_group->get_group();
        $this->load->view("side/header");
        $this->load->view("side/sidebar");
		$this->load->view("group/group_form", $data);
        $this->load->view("side/footer");
	}

    // Add a new item
    public function add()
    {
        $data = array(
            'group_name' => $this->input->post('group_name'),
         );
         $this->m_group->add($data);
         $this->session->set_flashdata('message', 'Data Berhasil Di Tambahkan');
         redirect('group');
    }

    //Update one item
    public function edit( $id = NULL )
    {
        $data = array(
            'id' => $id,
            'group_name' => $this->input->post('group_name'),
            
         );
         $this->m_group->edit($data);
         $this->session->set_flashdata('message', 'Data Berhasil Di Edit');
         redirect('group');
    }

    //Delete one item
    public function delete( $id = NULL )
    {
        $data = array('id' => $id );
        $this->m_group->delete($data);
        $this->session->set_flashdata('message', 'Data Berhasil Di Hapus');
         redirect('group');
    }
}

/* End of opsi.php */



?>