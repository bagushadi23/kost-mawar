<?php 

    class Register extends CI_Controller
    {
        function __construct() {
            parent::__construct();
            $this->API="http://localhost/rest-kost/api/";
            $this->assetimg = "http://localhost/rest-kost/uploads/";
        }

        public function index()
        {
            $this->form_validation->set_rules('nama','Nama','required',['required'=>'Nama wajib diisi']);
            $this->form_validation->set_rules('username','Username','required',['required'=>'Username wajib diisi']);
            $this->form_validation->set_rules('password','Password','required',['required'=>'Password wajib diisi']);
            if($this->form_validation->run()==FALSE){
                $data['title'] = "FORM REGISTRASI";
                $this->load->view('templates_user/header', $data);
                $this->load->view('singup');
                $this->load->view('templates_user/footer');
            }else{
                $data = array(
                    'id'            => '',
                    'nama'          => $this->input->post('nama'),
                    'username'      => $this->input->post('username'),
                    'password'      => $this->input->post('password'),
                    'jenis_kelamin' => $this->input->post('jk'),
                    'alamat'        => '',
                    'role_id'       => 2,
                    'nohp'          => $this->input->post('nohp'),
                    'email'         => $this->input->post('email'),
                );
                $regis = $this->curl->simple_post($this->API.'/user/insertuser/',$data,array(CURLOPT_BUFFERSIZE => 10));
                if($regis)
                {
                    $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Pendaftaran Berhasil!</div>');
                    redirect('/auth/login');
                }else
                {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pendaftaran Gagal!</div>');
                    redirect('/auth/login');
                }
            }
        }

    }

?>