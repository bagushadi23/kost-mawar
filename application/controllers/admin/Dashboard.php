<?php 

    class Dashboard extends CI_Controller
    {
        var $API ="";
    
        function __construct() {
            parent::__construct();
            $this->API="http://localhost/rest-kost/api/";
            $this->assetimg = "http://localhost/rest-kost/uploads/";
            if($this->session->userdata('role_id')!='1'){
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Anda Belum Login</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('auth/login');
            }
        }
        

        public function index()
        {   
            $data['title'] = "Dashboard Admin";
            $data['kost'] = json_decode($this->curl->simple_get($this->API.'kost/getkost'));
            $data['sewa'] = json_decode($this->curl->simple_get($this->API.'sewa/getsewa'));
            $data['user'] = json_decode($this->curl->simple_get($this->API.'user/getuser'));
            $data['kostsold'] = json_decode($this->curl->simple_get($this->API.'kost/getkostsold?keterangan=Sold'));
            $data['kostavailable'] = json_decode($this->curl->simple_get($this->API.'kost/getkostavailable'));
            $this->load->view('templates_admin/header',$data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/index',$data);
            $this->load->view('templates_admin/footer');
        }

        public function kost()
        {   
            $data['title'] = "Kost - Dashboard Admin";
            $data['asset']=$this->assetimg;
            $data['count']=json_decode($this->curl->simple_get($this->API.'kost/getkost'));
            $config['base_url'] = base_url().'admin/dashboard/kost';
            $config['total_rows']= count($data['count']);
            $config['per_page']=5;
            $config["uri_segment"] = 4;  // uri parameter
            $choice = $config["total_rows"] / $config["per_page"];
            $config["num_links"] = floor($choice);

            // Membuat Style pagination untuk BootStrap v4
            $config['first_link']       = 'First';
            $config['last_link']        = 'Last';
            $config['next_link']        = 'Next';
            $config['prev_link']        = 'Prev';
            $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
            $config['full_tag_close']   = '</ul></nav></div>';
            $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close']    = '</span></li>';
            $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
            $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
            $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
            $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['prev_tagl_close']  = '</span>Next</li>';
            $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
            $config['first_tagl_close'] = '</span></li>';
            $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['last_tagl_close']  = '</span></li>';
            $form = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $this->pagination->initialize($config);
            $data['kost'] = json_decode($this->curl->simple_get($this->API.'/kost/getkostlistpage?from='.$form.'&page='.$config['per_page']));         
            $data['pagination'] = $this->pagination->create_links();
            $this->load->view('templates_admin/header',$data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/kost',$data);
            $this->load->view('templates_admin/footer');
        }

        public function kostsold(){
            $data['title'] = "Kost Terjual";
            $data['sewa'] = json_decode($this->curl->simple_get($this->API.'all/join'));
            $this->load->view('templates_admin/header',$data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/kostsold',$data);
            $this->load->view('templates_admin/footer');
        }

        public function kurang(){
            $data['title'] = "Pembayaran Kost Kurang";
            $data['sewa'] = json_decode($this->curl->simple_get($this->API.'all/join'));
            $this->load->view('templates_admin/header',$data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/kurang',$data);
            $this->load->view('templates_admin/footer');
        }

        public function user()
        {
            $data['title'] = "DATA USER";
            $data['user'] = json_decode($this->curl->simple_get($this->API.'/user/getuser'));
            $this->load->view('templates_admin/header',$data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/user',$data);
            $this->load->view('templates_admin/footer');
        }

        public function edit(){
            $data['title'] = "EDIT USER";
            $data['user'] = json_decode($this->curl->simple_get($this->API.'/user/getuser?id='.$this->uri->segment(4)));
            $this->load->view('templates_admin/header',$data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/edituser',$data);
            $this->load->view('templates_user/footer');
        }

        public function updateuser(){
            $data = array(
            'id'            => $this->input->post('id'),
            'nama'          => $this->input->post('nama'),
            'username'      => $this->input->post('username'),
            'password'      => $this->input->post('password'),
            'jenis_kelamin' => $this->input->post('jk'),
            'alamat'        => $this->input->post('alamat'),
            'role_id'       => 2,
            'nohp'          => $this->input->post('nohp'),
            'email'         => $this->input->post('email'),
            );
            
            $update = $this->curl->simple_put($this->API.'/user/updateuser/',$data,array(CURLOPT_BUFFERSIZE => 10));
            if($update)
            {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User Has Been Updated!</div>');
                redirect('/admin/dashboard/user');
            }else
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Fail to Update User!</div>');
                redirect('admin/dashboard/user');
            }      
        }

        public function datasewa(){
            $data['title'] = "Data Sewa";
            $data['sewa'] = json_decode($this->curl->simple_get($this->API.'all/join'));
            $data['kost'] = json_decode($this->curl->simple_get($this->API.'/kost/getkost'));
            $data['user'] = json_decode($this->curl->simple_get($this->API.'/user/getuser'));
            $this->load->view('templates_admin/header',$data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/datasewa',$data);
            $this->load->view('templates_admin/footer');
        }

        public function deleteuser(){
            $id = $this->uri->segment(4);
            $delete = $this->curl->simple_delete($this->API.'/user/deleteuser/',array('id'=>$id),array(CURLOPT_BUFFERSIZE => 10));
            if($delete)
            {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User Has Been Deleted!</div>');
                redirect('/admin/dashboard/user');
            }else
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Fail to Delete User!</div>');
                redirect('/admin/dashboard/user');
            }
        }
    }

?>