<?php 

class Auth extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_sekolah");
        $this->load->model("m_group");
        $this->load->model("m_guru");
        $this->load->model('Auth_model');
    }
   public function index(){
        $this->load->view("auth/head");
        $this->load->view("auth/login_new");
        $this->load->view("auth/foot");
   }

   public function error(){
    $this->load->view("auth/head");
    $this->load->view("auth/error");
    $this->load->view("auth/foot");
    }

    function autentikasi(){
        $nip = $this->input->post('nip');
        $password = $this->input->post('password');
                
        $validasi_nip = $this->Auth_model->query_validasi_nip($nip);
        if($validasi_nip->num_rows() > 0){
            $validate_ps=$this->Auth_model->query_validasi_password($nip,$password);
            if($validate_ps->num_rows() > 0){
                $x = $validate_ps->row_array();
                if($x['is_active']=='1'){
                    $this->session->set_userdata('logged',TRUE);
                    $this->session->set_userdata('pengguna',$nip);
                    $id=$x['id_user'];
                    if($x['id_group']==1){ //super admin
                        $nip = $x['nip'];
                        $id_sekolah = $x['id_sekolah'];
                        $this->session->set_userdata('id_group','1');
                        $this->session->set_userdata('id',$id);
                        $this->session->set_userdata('nip',$nip);
                        $this->session->set_userdata('id_sekolah',$id_sekolah);
                        redirect('dashboard');
            
                    }else if($x['id_group']==2){ //admin sekolah
                        $nip = $x['nip'];
                        $id_sekolah = $x['id_sekolah'];
                        $this->session->set_userdata('id_group','2');
                        $this->session->set_userdata('id',$id);
                        $this->session->set_userdata('nip',$nip);
                        $this->session->set_userdata('id_sekolah',$id_sekolah);
                        redirect('dashboard');

                    }else{ // guru
                        $nip = $x['nip'];
                        $id_sekolah = $x['id_sekolah'];
                        $this->session->set_userdata('id_group','8');
                        $this->session->set_userdata('id',$id);
                        $this->session->set_userdata('nip',$nip);
                        $this->session->set_userdata('id_sekolah',$id_sekolah);
                        redirect('dashboard');
                    }
                }else{
                    echo $this->session->set_flashdata('msg','<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
                    <h3>Uupps!</h3>
                    <p>Akun kamu telah di blokir. Silahkan hubungi admin.</p>');
                    redirect(base_url('auth'));
                }
            }else{
                echo $this->session->set_flashdata('msg','<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
                    <h3>Uupps!</h3>
                    <p>Password yang kamu masukan salah.</p>');
                redirect(base_url('auth'));
            }

        }else{
            echo $this->session->set_flashdata('msg','<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
            <h3>Uupps!</h3>
            <p>nip yang kamu masukan salah.</p>');
            redirect(base_url('auth'));
        }
    }

    public function register()
    {
        $data['sekolah'] = $this->Auth_model->getSekolah();
        
        $this->form_validation->set_rules('username', 'User', 'required|is_unique[pengguna.username]',[
            'is_unique' => 'username sudah digunakan',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view("auth/head");
            $this->load->view("auth/register_new", $data);
            $this->load->view("auth/foot");
        }
        else {
            $input = array(
                'id_group' => 8,
                'username' => $this->input->post('username'),
                'id_sekolah' => $this->input->post('id_sekolah'),
                'id_guru' => $this->input->post('id_guru'),
                'password' => $this->input->post('password'),
            );
            
            if ($this->Auth_model->create($input) > 0) {
                $this->session->set_flashdata('msg', 'Data Berhasil Disimpan');
                $this->load->view("auth/head");
                $this->load->view("auth/login_new", $data);
                $this->load->view("auth/foot");
            } 
            else {
                $this->session->set_flashdata('msg', 'Data Gagal Disimpan');
                $this->load->view("auth/head");
                $this->load->view("auth/register_new", $data);
                $this->load->view("auth/foot");
            }
        }

    }

    public function getNip()
    {
        $id_guru = $this->input->post('id_guru',TRUE);
        $id_sekolah = $this->input->post('id',TRUE);
        $data = $this->Auth_model->getNip($id_sekolah);
        $output = '<option value=""> Pilih NIP </option>';
        foreach ($data as $row) {
            if ($id_guru) { //edit
                if ($id_guru == $row->id_guru) {
                    $output .= '<option value="' .$row->id_guru . '" selected>'. $row->nip . '</option>';
                } else {
                    $output .= '<option value="' .$row->id_guru . '">'. $row->nip . '</option>';
                }
            } else { //tambah
                $output .= '<option value="' .$row->id_guru . '">'. $row->nip .  '</option>';
            }
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
        
    }


    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('auth'));
    }
}

?>