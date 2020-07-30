<?php 

    class Dashboard extends CI_Controller{
        function __construct() {
            parent::__construct();
            $this->API="http://localhost/rest-kost/api/";
            $this->assetimg = "http://localhost/rest-kost/uploads/";
            if($this->session->userdata('role_id')!='2'){
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Anda Belum Login</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('auth/login');
            }
        }

        public function index(){
            $data['title'] = "KOST MAWAR - User";
            $data['datasewa'] = json_decode($this->curl->simple_get($this->API.'/user/getdatausersewa?id='.$this->session->userdata('id')));
            $this->load->view('templates_user/header',$data);
            $this->load->view('templates_user/sidebar');
            $this->load->view('user/dashboard',$data);
            $this->load->view('templates_user/footer');
        }

        public function konfirmasi(){
            $data['jumlah'] = $this->uri->segment(5);
            $data['title'] = "KONFIRMASI";
            $data['datasewa']=json_decode($this->curl->simple_get($this->API.'/sewa/getsewa?idsewa='.$this->uri->segment(4)));
            $this->load->view('templates_user/header',$data);
            $this->load->view('templates_user/sidebar');
            $this->load->view('user/konfirmasi',$data);
            $this->load->view('templates_user/footer');
        }

        public function info(){
            $data['title'] = "DETAIL PEMBAYARAN";
            $data['datasewa']=json_decode($this->curl->simple_get($this->API.'/sewa/getsewa?idsewa='.$this->uri->segment(4)));
            $sewa['sewa'] = $data['datasewa'][0];
            $data['jumlah'] = $sewa['sewa']->kekurangan;
            $this->load->view('templates_user/header',$data);
            $this->load->view('templates_user/sidebar');
            $this->load->view('user/pembayaran',$sewa);
            $this->load->view('templates_user/footer');
        }

        public function bayarkurang(){
            $data['title'] = "Terimakasih";
            define('BOT_TOKEN', '1054687337:AAG5ubrSbi01g4j2Fc3YIyJoghx3Snb5qjE');
            define('CHAT_ID','966804937');
            $an               = $this->input->post('anbank');
            $bank             = $this->input->post('bank');
            $jumlah           = $this->input->post('jumlah');
            $pembayaran       = $this->input->post('Pembayaran');
            $API = "https://api.telegram.org/bot".BOT_TOKEN."/sendmessage?chat_id=".CHAT_ID."&text=Ada Pembayaran ".$pembayaran." Dari:%0AA.N:".$an."%0ABANK:".$bank."%0AJUMLAH: RP.".$jumlah;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_URL, $API);
            $result = curl_exec($ch);
            curl_close($ch);
            $this->load->view('templates_user/header',$data);
            $this->load->view('templates_user/sidebar');
            $this->load->view('lewat');
            $this->load->view('templates_user/footer');
        }

        public function perpanjang(){
            $data['title'] = "FORM PERPANJANG";
            $data['perpanjang'] = json_decode($this->curl->simple_get($this->API.'/all/sewajoin?idsewa='.$this->uri->segment(4)));
            $this->load->view('templates_user/header',$data);
            $this->load->view('templates_user/sidebar');
            $this->load->view('user/perpanjang',$data);
            $this->load->view('templates_user/footer');
        }

        public function getinfo(){
            $data['title'] = "DETAIL PEMBAYARAN";
            $data['jumlah'] = $this->input->post('jumlah');
            $data['datasewa']=json_decode($this->curl->simple_get($this->API.'/sewa/getsewa?idsewa='.$this->uri->segment(4)));
            $data['sewa'] = $data['datasewa'][0];
            $this->load->view('templates_user/header',$data);
            $this->load->view('templates_user/sidebar');
            $this->load->view('user/pembayaran',$data);
            $this->load->view('templates_user/footer');
          }

          public function edit(){
            $data['title'] = "EDIT USER";
            $data['user'] = json_decode($this->curl->simple_get($this->API.'/user/getuser?id='.$this->session->userdata('id')));
            $this->load->view('templates_user/header',$data);
            $this->load->view('templates_user/sidebar');
            $this->load->view('user/edit',$data);
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
                redirect('/user/dashboard');
            }else
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Fail to Update User!</div>');
                redirect('user/dashboard');
            }      
          }


    }