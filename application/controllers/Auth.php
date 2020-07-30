<?php 

    class Auth extends CI_Controller{

        var $API ="";
    
        function __construct() {
            parent::__construct();
            $this->API="http://localhost/rest-kost/api/";
            $this->assetimg = "http://localhost/rest-kost/uploads/";
        }
        
        public function login()
        {
            $this->form_validation->set_rules('username','Username','required',['required'=>'Username wajib diisi']);
            $this->form_validation->set_rules('password','Password','required',['required'=>'Password wajib diisi']);
            if($this->form_validation->run()==FALSE)
            {
                $data['title'] = "LOGIN";
                $this->load->view('templates/header',$data);
                $this->load->view('login');
                $this->load->view('templates/footer');
            }else{
                $username = set_value('username');
                $password = set_value('password');
                $result['user'] = json_decode($this->curl->simple_get($this->API.'/user/getuser'));
                $i=0;
                $j=0;
                foreach($result['user'] as $u){
                    if($u->username == $username && $u->password == $password){
                        $i=$j;
                    }
                    $j++;
                }
                $auth = $result['user'][$i];
                if($auth==FALSE)
                {
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Username Atau Password Salah</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                  redirect('auth/login');
                }else{
                    $this->session->set_userdata('username',$auth->username);
                    $this->session->set_userdata('id',$auth->id);
                    $this->session->set_userdata('nama',$auth->nama);
                    $this->session->set_userdata('role_id',$auth->role_id);
                    switch($auth->role_id){
                        case 1:
                            redirect('admin/dashboard');
                            break;
                        case 2:
                            redirect('user/dashboard');
                            break;
                        default:
                            break;
                    }
                    
                }
            }
        }

        public function logout()
        {
            $this->session->sess_destroy();
            redirect('dashboard/index');
        }

    }

?>