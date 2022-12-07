<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->model("m_dashboard");
		$this->load->model("m_histori");
		$this->load->model("m_quiz");
		$this->load->model('m_sekolah');
		$this->load->model('m_guru');
        $this->load->model('m_documents');
        $this->load->model('m_jawaban');
        $this->load->model('m_kepala');
        $this->load->model('m_transaksi');
        $this->load->model('m_opsi');
        $this->load->model("m_pengguna");
        $this->load->model("m_group");
		
		if($this->session->userdata('logged') !=TRUE){
            redirect(base_url('auth/error'));
		};
	}
	
	public function index()
	{
        $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
		$data['histori'] = $this->m_dashboard->get_histori();
		$data['sumquiz'] = $this->m_dashboard->sumquiz();
		// $data['sumquizjudul'] = $this->m_dashboard->sumquizjudul();
		$data['sumjudul'] = $this->m_dashboard->sumjudul();
		$data['sumjawab'] = $this->m_dashboard->sumjawab();
		$data['sumjawabanmu'] = $this->m_dashboard->sumjawabanmu();
		$data['jawaban'] = $this->m_dashboard->jawaban();
		$data['totalquiz'] = $this->m_dashboard->totalquiz();
		// $data['pengguna'] = $this->m_pengguna->getid();
        $this->load->view("side/header", $data);
        $this->load->view("side/sidebar", $data);
		$this->load->view("dashboard/dashboard", $data);
        $this->load->view("side/footer", $data);
	}

    public function profile(){
        $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
            $this->load->view("side/header", $data);
            $this->load->view("side/sidebar", $data);
            $this->load->view("dashboard/profile", $data);
            $this->load->view("side/footer", $data); 
     }

     public function detailres(){
        $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
        $data['detailres'] = $this->m_dashboard->detailres();
        $this->load->view("side/header", $data);
        $this->load->view("side/sidebar", $data);
        $this->load->view("dashboard/rekap", $data);
        $this->load->view("side/footer", $data);
     }

     public function Rekap(){
        $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
		$data['rekap'] = $this->m_dashboard->rekap();
        $this->load->view("side/header", $data);
        $this->load->view("side/sidebar", $data);
        $this->load->view("dashboard/rekap", $data);
        $this->load->view("side/footer", $data);

     }

     public function jawab(){
        $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
            $this->load->view("quiz/quiz_jawab", $data);
     }

	public function get_quiz($id_histori){
        $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
        $histori = $this->m_histori->get_data($id_histori);
        $data ['judul']= 'Quiz '. $histori->nama_quiz;
        $data ['jawaban'] = $this->m_jawaban->get_quiz_by_histori($id_histori);
        $this->load->view("side/header", $data);
        $this->load->view("side/sidebar", $data);
		$this->load->view("quiz/quiz_tampil", $data);
        $this->load->view("side/footer", $data);
     }

	 public function sekolahan()
	 {
		if ($this->input->get('submit')) {
            $data['keyword'] = $this->input->get('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);

        } else {
            $data['keyword'] = $this->session->set_userdata('keyword');
        }

        $this->db->like('nama_sekolah', $data['keyword']);
        $this->db->or_like('alamat_sekolah', $data['keyword']);
        $this->db->or_like('email_sekolah', $data['keyword']);
        $this->db->from('sekolah');
        $config['base_url'] = base_url('dashboard/sekolah');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 4;

        $this->pagination->initialize($config);
        
        $data['start'] = $this->uri->segment(3);
        $data['sekolah'] = $this->m_sekolah->tampil_page($config['per_page'], $data['start'], $data['keyword']);
        $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();     

        $this->load->view("side/header",$data);
        $this->load->view("side/sidebar", $data);
		$this->load->view("sekolah/sekolah_form", $data);
        $this->load->view("side/footer", $data);
	 }

     public function documents()
	 {
		if ($this->input->get('submit')) {
            $data['keyword'] = $this->input->get('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
            
        } else {
            $data['keyword'] = $this->session->set_userdata('keyword');
        }

        $this->db->like('nama_file', $data['keyword']);
        $this->db->or_like('file', $data['keyword']);
        $this->db->or_like('nama_sekolah', $data['keyword']);
        $this->db->join('kepala_sekolah', 'kepala_sekolah.id_kepala = document.id_kepala', 'left');
        $this->db->join('status', 'status.id_status = kepala_sekolah.id_status', 'left');
        $this->db->join('pengguna', 'pengguna.id_user = document.id_user', 'left'); 
        $this->db->join('sekolah', 'pengguna.id_sekolah = sekolah.id_sekolah', 'left');  
        $this->db->from('document');
        $config['base_url'] = base_url('dashboard/documents');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 4;

        $this->pagination->initialize($config);
        
        $data['start'] = $this->uri->segment(3);
        $data['documents'] = $this->m_documents->tampil_page($config['per_page'], $data['start'], $data['keyword']);
        $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
                
        $this->load->view("side/header",$data);
        $this->load->view("side/sidebar", $data);
		$this->load->view("documents/documents_form", $data);
        $this->load->view("side/footer", $data);
	 }

     public function documentsid()
	 {
		if ($this->input->get('submit')) {
            $data['keyword'] = $this->input->get('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
            
        } else {
            $data['keyword'] = $this->session->set_userdata('keyword');
        }

        $this->db->like('nama_file', $data['keyword']);
        $this->db->or_like('file', $data['keyword']);
        $this->db->join('kepala_sekolah', 'kepala_sekolah.id_kepala = document.id_kepala', 'left');
        $this->db->join('status', 'status.id_status = kepala_sekolah.id_status', 'left');
        $this->db->join('pengguna', 'pengguna.id_user = document.id_user', 'left'); 
        $this->db->join('sekolah', 'pengguna.id_sekolah = sekolah.id_sekolah', 'left'); 
        $this->db->from('document');
        $this->db->where('document.id_user', $this->session->userdata('id'));
        $this->db->where('kepala_sekolah.id_status', 1);
        
        $config['base_url'] = base_url('dashboard/documentsid');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 4;

        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['documentsid'] = $this->m_documents->tampil_page_id($config['per_page'], $data['start'], $data['keyword']);
        $data['pengguna'] = $this->m_documents->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
                

        $this->load->view("side/header",$data);
        $this->load->view("side/sidebar", $data);
		$this->load->view("documents/documents_form_id", $data);
        $this->load->view("side/footer", $data);
	 }

     public function histori()
	 {
		if ($this->input->get('submit')) {
            $data['keyword'] = $this->input->get('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
            
        } else {
            $data['keyword'] = $this->session->set_userdata('keyword');
        }

        $this->db->like('nama_quiz', $data['keyword']);
        $this->db->or_like('tanggal', $data['keyword']);
        $this->db->from('histori');
        $config['base_url'] = base_url('dashboard/histori');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 4;

        $this->pagination->initialize($config);
        
        $data['start'] = $this->uri->segment(3);
        $data['histori'] = $this->m_histori->tampil_page($config['per_page'], $data['start'], $data['keyword']);
        $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
                
        $this->load->view("side/header",$data);
        $this->load->view("side/sidebar", $data);
		$this->load->view("histori/histori_form", $data);
        $this->load->view("side/footer", $data);
	 }

     public function quiz()
	 {
		if ($this->input->get('submit')) {
            $data['keyword'] = $this->input->get('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
            
        } else {
            $data['keyword'] = $this->session->set_userdata('keyword');
        }

        $this->db->like('quiz', $data['keyword']);
        $this->db->or_like('nama_quiz', $data['keyword']);
        $this->db->join('histori', 'histori.id_histori = quiz.id_histori', 'left');
        $this->db->from('quiz');
        $config['base_url'] = base_url('dashboard/quiz');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 4;

        $this->pagination->initialize($config);
        
        $data['start'] = $this->uri->segment(3);
        $data['quiz'] = $this->m_quiz->tampil_page($config['per_page'], $data['start'], $data['keyword']);
        $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();

        $this->load->view("side/header",$data);
        $this->load->view("side/sidebar", $data);
		$this->load->view("quiz/quiz_list", $data);
        $this->load->view("side/footer", $data);
	 }


	 public function guru()
	 {
		if ($this->input->get('submit')) {
            $data['keyword'] = $this->input->get('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
            
        } else {
            $data['keyword'] = $this->session->set_userdata('keyword');
        }

        $this->db->like('nip', $data['keyword']);
        $this->db->or_like('nama', $data['keyword']);
		$this->db->or_like('telp', $data['keyword']);
        $this->db->or_like('email', $data['keyword']);
		$this->db->or_like('jabatan', $data['keyword']);
        $this->db->or_like('jenis_kelamin', $data['keyword']);
        $this->db->or_like('nama_sekolah', $data['keyword']);
        $this->db->join('sekolah', 'sekolah.id_sekolah = guru.id_sekolah', 'left');
        $this->db->from('guru');
        $config['base_url'] = base_url('dashboard/guru');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 4;

        $this->pagination->initialize($config);
        
        $data['start'] = $this->uri->segment(3);
        $data['guru'] = $this->m_guru->tampil_page($config['per_page'], $data['start'], $data['keyword']);
        $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
                
        $this->load->view("side/header",$data);
        $this->load->view("side/sidebar", $data);
		$this->load->view("guru/guru_list", $data);
        $this->load->view("side/footer", $data);
	 }

     public function guruid()
	 {
		if ($this->input->get('submit')) {
            $data['keyword'] = $this->input->get('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
            
        } else {
            $data['keyword'] = $this->session->set_userdata('keyword');
        }

        $this->db->like('nip', $data['keyword']);
        $this->db->or_like('nama', $data['keyword']);
		$this->db->or_like('telp', $data['keyword']);
        $this->db->or_like('email', $data['keyword']);
		$this->db->or_like('jabatan', $data['keyword']);
        $this->db->or_like('jenis_kelamin', $data['keyword']);
        $this->db->or_like('nama_sekolah', $data['keyword']);
        $this->db->join('sekolah', 'sekolah.id_sekolah = guru.id_sekolah', 'left');
        $this->db->from('guru');
        $this->db->where('guru.id_sekolah', $this->session->userdata('id_sekolah'));
        $config['base_url'] = base_url('dashboard/guruid');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 4;

        $this->pagination->initialize($config);
        
        $data['start'] = $this->uri->segment(3);
        $data['guruid'] = $this->m_guru->tampil_page_id($config['per_page'], $data['start'], $data['keyword']);
        $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
                
        $this->load->view("side/header",$data);
        $this->load->view("side/sidebar", $data);
		$this->load->view("guru/guru_list_id", $data);
        $this->load->view("side/footer", $data);
	 }

     public function pengguna()
	 {
		if ($this->input->get('submit')) {
            $data['keyword'] = $this->input->get('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
            
        } else {
            $data['keyword'] = $this->session->set_userdata('keyword');
        }

        $this->db->like('nip', $data['keyword']);
        $this->db->or_like('nama_sekolah', $data['keyword']);
        $this->db->or_like('nama', $data['keyword']);
		$this->db->or_like('username', $data['keyword']);
        $this->db->or_like('group_name', $data['keyword']);
        $this->db->join('sekolah', 'sekolah.id_sekolah = pengguna.id_sekolah', 'left'); 
        $this->db->join('guru', 'guru.id_guru = pengguna.id_guru', 'left'); 
        $this->db->join('user_group', 'user_group.id = pengguna.id_group', 'left');  
        $this->db->from('pengguna');
        $config['base_url'] = base_url('dashboard/pengguna');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 4;

        $this->pagination->initialize($config);
        
        $data['start'] = $this->uri->segment(3);
        $data['users'] = $this->m_pengguna->tampil_page($config['per_page'], $data['start'], $data['keyword']);
        $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
    
        $this->load->view("side/header",$data);
        $this->load->view("side/sidebar", $data);
		$this->load->view("pengguna/pengguna_list", $data);
        $this->load->view("side/footer", $data);
	 }

     public function kepala_sekolah()
	 {
		if ($this->input->get('submit')) {
            $data['keyword'] = $this->input->get('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
            
        } else {
            $data['keyword'] = $this->session->set_userdata('keyword');
        }

        $this->db->like('nama_kepala', $data['keyword']);
        $this->db->or_like('nip', $data['keyword']);
		$this->db->or_like('periode_awal', $data['keyword']);
        $this->db->or_like('periode_awal', $data['keyword']);
        $this->db->or_like('nama_sekolah', $data['keyword']);
        $this->db->or_like('jenis_status', $data['keyword']);
        $this->db->join('status', 'status.id_status = kepala_sekolah.id_status' , 'left');
        $this->db->join('sekolah', 'sekolah.id_sekolah = kepala_sekolah.id_sekolah', 'left'); 
        $this->db->from('kepala_sekolah');
        $config['base_url'] = base_url('dashboard/kepala_sekolah');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 4;

        $this->pagination->initialize($config);
        
        $data['start'] = $this->uri->segment(3);
        $data['kepala_sekolah'] = $this->m_kepala->tampil_page($config['per_page'], $data['start'], $data['keyword']);
        $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
                
        $this->load->view("side/header",$data);
        $this->load->view("side/sidebar", $data);
		$this->load->view("kepala_sekolah/kepala_list", $data);
        $this->load->view("side/footer", $data);
	 }

     public function kepala_sekolah_id()
	 {
		if ($this->input->get('submit')) {
            $data['keyword'] = $this->input->get('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
            
        } else {
            $data['keyword'] = $this->session->set_userdata('keyword');
        }

        $this->db->like('nama_kepala', $data['keyword']);
        $this->db->or_like('nip', $data['keyword']);
		$this->db->or_like('periode_awal', $data['keyword']);
        $this->db->or_like('periode_awal', $data['keyword']);
        $this->db->or_like('nama_sekolah', $data['keyword']);
        $this->db->join('status', 'status.id_status = kepala_sekolah.id_status' , 'left');
        $this->db->join('sekolah', 'sekolah.id_sekolah = kepala_sekolah.id_sekolah', 'left'); 
        $this->db->from('kepala_sekolah');
        $this->db->where('kepala_sekolah.id_sekolah', $this->session->userdata('id_sekolah'));
        $config['base_url'] = base_url('dashboard/kepala_sekolah_id');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 4;

        $this->pagination->initialize($config);
        
        $data['start'] = $this->uri->segment(3);
        $data['kepala_sekolah_id'] = $this->m_kepala->tampil_page_id($config['per_page'], $data['start'], $data['keyword']);
        $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
                
        $this->load->view("side/header",$data);
        $this->load->view("side/sidebar", $data);
		$this->load->view("kepala_sekolah/kepala_list_id", $data);
        $this->load->view("side/footer", $data);
	 }


     public function transaksi()
	 {
		if ($this->input->get('submit')) {
            $data['keyword'] = $this->input->get('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
            
        } else {
            $data['keyword'] = $this->session->set_userdata('keyword');
        }

        $this->db->like('nama_quiz', $data['keyword']);
        $this->db->or_like('nama_sekolah', $data['keyword']);
		$this->db->or_like('hasil', $data['keyword']);
        $this->db->join('histori', 'histori.id_histori = transaksi.id_histori', 'left'); 
        $this->db->join('sekolah', 'sekolah.id_sekolah = transaksi.id_sekolah', 'left'); 
        $this->db->from('transaksi');
        $config['base_url'] = base_url('dashboard/transaksi');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 4;

        $this->pagination->initialize($config);
        
        $data['start'] = $this->uri->segment(3);
        $data['transaksi'] = $this->m_transaksi->tampil_page($config['per_page'], $data['start'], $data['keyword']);
        $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
                
        $this->load->view("side/header",$data);
        $this->load->view("side/sidebar", $data);
		$this->load->view("transaksi/transaksi_list", $data);
        $this->load->view("side/footer", $data);
	 }

     public function transaksiid()
	 {
		if ($this->input->get('submit')) {
            $data['keyword'] = $this->input->get('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
            
        } else {
            $data['keyword'] = $this->session->set_userdata('keyword');
        }

        $this->db->like('nama_quiz', $data['keyword']);
        $this->db->or_like('nama_sekolah', $data['keyword']);
		$this->db->or_like('hasil', $data['keyword']);
        $this->db->join('histori', 'histori.id_histori = transaksi.id_histori', 'left'); 
        $this->db->join('sekolah', 'sekolah.id_sekolah = transaksi.id_sekolah', 'left'); 
        $this->db->from('transaksi');
        $this->db->where('transaksi.id_sekolah', $this->session->userdata('id_sekolah'));
        $config['base_url'] = base_url('dashboard/transaksiid');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 4;

        $this->pagination->initialize($config);
        
        $data['start'] = $this->uri->segment(3);
        $data['transaksiid'] = $this->m_transaksi->tampil_page_id($config['per_page'], $data['start'], $data['keyword']);
        $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
                
        $this->load->view("side/header",$data);
        $this->load->view("side/sidebar", $data);
		$this->load->view("transaksi/transaksi_list_id", $data);
        $this->load->view("side/footer", $data);
	 }

     public function opsi()
	 {
		if ($this->input->get('submit')) {
            $data['keyword'] = $this->input->get('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
            
        } else {
            $data['keyword'] = $this->session->set_userdata('keyword');
        }

        $this->db->like('opsi', $data['keyword']);
        $this->db->or_like('value', $data['keyword']);
        $this->db->from('opsi');
        $config['base_url'] = base_url('dashboard/opsi');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 4;

        $this->pagination->initialize($config);
        
        $data['start'] = $this->uri->segment(3);
        $data['opsi'] = $this->m_opsi->tampil_page($config['per_page'], $data['start'], $data['keyword']);
        $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
                
        $this->load->view("side/header",$data);
        $this->load->view("side/sidebar", $data);
		$this->load->view("opsi/opsi_form", $data);
        $this->load->view("side/footer", $data);
	 }

     public function group()
	 {
		if ($this->input->get('submit')) {
            $data['keyword'] = $this->input->get('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
            
        } else {
            $data['keyword'] = $this->session->set_userdata('keyword');
        }

        $this->db->like('id', $data['keyword']);
        $this->db->or_like('group_name', $data['keyword']);
        $this->db->from('user_group');
        $config['base_url'] = base_url('dashboard/group');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 4;

        $this->pagination->initialize($config);
        
        $data['start'] = $this->uri->segment(3);
        $data['user_group'] = $this->m_group->tampil_page($config['per_page'], $data['start'], $data['keyword']);
        $data['pengguna'] = $this->m_dashboard->cekdata(['id_user' => $this->session->userdata('id')])->row_array();
                
        $this->load->view("side/header",$data);
        $this->load->view("side/sidebar", $data);
		$this->load->view("group/group_form", $data);
        $this->load->view("side/footer", $data);
	 }


}