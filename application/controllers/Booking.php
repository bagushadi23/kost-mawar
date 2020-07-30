<?php 

    class Booking extends CI_Controller
    {
        var $API ="";
    
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

        function pembayaran($id){
            $data['title'] = "PEMBAYARAN";
            $data['kost'] = json_decode($this->curl->simple_get($this->API.'kost/getkost?idkost='.$this->uri->segment(3)),true);
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('pembayaran',$data);
            $this->load->view('templates/footer');
        }

        function konfirmasi($id){
            $data['title'] = "KONFIRMASI";
            $data['kost'] = json_decode($this->curl->simple_get($this->API.'kost/getkost?idkost='.$id),true);
            $data['dp'] = $this->uri->segment(4);
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('konfirmasi',$data);
            $this->load->view('templates/footer');
        }

        function paymentconfirm(){
            $data['title'] = "TERIMAKASIH PESANAN SEGERA DI PROSES";
            define('BOT_TOKEN', '1054687337:AAG5ubrSbi01g4j2Fc3YIyJoghx3Snb5qjE');
            define('CHAT_ID','966804937');
            $idkost           = $this->input->post('idkost');
            $namakost         = $this->input->post('namakost');
            $iduser           = $this->session->userdata('id');
            $namauser         = $this->session->userdata('nama');
            $an               = $this->input->post('anbank');
            $bank             = $this->input->post('bank');
            $bulan           = $this->input->post('bulan');
            $notelp           = $this->input->post('notelp');
            $mulaikost           = $this->input->post('mulaikost');
            $jumlah           = $this->input->post('jumlah');
            $open             = "<b>Ada DP Pembayaran</b>%0A%0A<b>detail kost</b>%0A-----------------------------------------%0A<b>idkost</b>    :$idkost %0A<b>nama kost</b>  :$namakost%0A<b>Lama kost</b>  :$bulan%0A%0A<b>detail user</b>%0A-----------------------------------------%0A<b>iduser</b>    :$iduser%0A<b>nama</b>      :$namauser%0A%0A<b>detail pembayaran</b>%0A-----------------------------------------%0A<b>AN </b>       :$an%0A<b>bank</b>      :$bank%0A<b>jumlah</b>    :$jumlah%0A<b>NO TELP</b>    :$notelp%0A<b>Mulai KOST</b>    :$mulaikost";
            $API = "https://api.telegram.org/bot".BOT_TOKEN."/sendmessage?chat_id=".CHAT_ID."&text=$open&parse_mode=html";
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
    }