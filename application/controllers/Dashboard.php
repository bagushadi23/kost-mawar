<?php 

    class Dashboard extends CI_Controller
    {
        var $API ="";
    
        function __construct() {
            parent::__construct();
            $this->API="http://localhost/rest-kost/api/";
            $this->assetimg = "http://localhost/rest-kost/uploads/";
        }

        public function index(){
            $data['title'] = "KOST MAWAR - Dashboard";
            $data['asset'] = $this->assetimg;
            $data['kost'] = json_decode($this->curl->simple_get($this->API.'kost/getkost'));
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('dashboard', $data);
            $this->load->view('templates/footer');
        }

        public function detail(){
            $data['asset'] = $this->assetimg;
            $data['kost'] = json_decode($this->curl->simple_get($this->API.'kost/getkost?idkost='.$this->uri->segment(3)),true);
            $d = $data['kost'];
            $data['title'] = $d['namakost'];
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('detail',$data);
            $this->load->view('templates/footer');
        }

        public function kostbyfilter(){
            $data['asset'] = $this->assetimg;
            $keterangan = $this->input->post('keterangan');
            $kota = $this->input->post('kota');
            $data['kost'] = json_decode($this->curl->simple_get($this->API.'kost/kostbyfilter?keterangan='.$keterangan.'&kota='.$kota));
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('dashboard',$data);
            $this->load->view('templates/footer');
        }
    }

?>