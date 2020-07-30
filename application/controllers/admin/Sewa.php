<?php 

    class Sewa extends CI_Controller{

        
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

        function insert(){
            $kost['k'] = json_decode($this->curl->simple_get($this->API.'/kost/getkost'));
            $idkost = explode(",",$this->input->post('idkost'));
            foreach($kost['k'] as $k){
                if($k->idkost == $idkost[0] ){
                    $kost = array(
                        'idkost'        => $k->idkost,
                        'harga' => $k->harga,
                        'keterangan' => "Sold",
                        'gambar' => $k->gambar,
                        'namakost' => $k->namakost,
                        'kota' => $k->kota,
                        'type' => $k->type,
                        'Alamat' => $k->Alamat,
                        'kecamatan' => $k->kecamatan,
                        'diskripsi' => $k->diskripsi,
                        'fasilitas' => $k->fasilitas
                    );
                    if($this->input->post('pembayaran') > $k->harga){
                        $kelebihan = $this->input->post('pembayaran') - $k->harga;
                        $kekurangan = 0;
                    }else{
                        $kekurangan = $k->harga - $this->input->post('pembayaran');
                        $kelebihan = 0;
                    }
                    $this->curl->simple_put($this->API.'/kost/editkost/',$kost,array(CURLOPT_BUFFERSIZE => 10));
                }
            }

            $cekin = explode("/",$this->input->post('cekin'));
            $cekout = explode("/",$this->input->post('cekout'));    

            $data = array (
                'idsewa'    => '',
                'idkost'    => $idkost[0],
                'id'        => $this->input->post('iduser'),
                'cekin'     => $cekin[0],
                'cekout'    => $cekout[0],
                'kekurangan'=> $kekurangan,
                'kelebihan' => $kelebihan,
                'total'     => $this->input->post('pembayaran')
            );

            $create = $this->curl->simple_post($this->API.'/sewa/insertsewa/',$data,array(CURLOPT_BUFFERSIZE => 10));
            if($create)
            {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sewa Has Been Insert!</div>');
                redirect('/admin/dashboard/datasewa');
            }else
            {
                $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Fail to Insert Sewa!</div>');
                redirect('/admin/dashboard/datasewa');
            }
        }

        function editsewa(){
            $data['title']  = "Tambah Data Sewa";
            $data['sewa'] = json_decode($this->curl->simple_get($this->API.'/sewa/getsewa?idsewa='.$this->uri->segment(4)));
            
            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/editsewa',$data);
            $this->load->view('templates_admin/footer');
        }

        function edit(){
            $test['test'] = json_decode($this->curl->simple_get($this->API.'/sewa/getsewa?idsewa='.$this->input->post('idsewa')));
            $pa;
            $ka;
            $pecahbulan = explode("/",$this->input->post('cekout'));
            foreach ($test['test'] as $row)
            {
                $bulandata = explode("/",$row->cekout);
                
                if($pecahbulan[1]!=$bulandata[1]){
                    $ta = $this->input->post('kekurangan')+$row->total+($row->harga*($pecahbulan[1]-$bulandata[1]));
                    $pa = $row->total+$this->input->post('masuk');
                    $ka = $ta-$pa;
                }else{
                    $m = $this->input->post('masuk');
                    $pa = $row->total+$m;
                    $ka = $row->kekurangan - $m;
                }
            }

            $cekin = explode("/",$this->input->post('cekin'));
            $cekout = explode("/",$this->input->post('cekout'));

            $data = array (
                'idsewa'    => $this->input->post('idsewa'),
                'id'        => $this->input->post('id'),
                'idkost'    => $this->input->post('idkost'),
                'cekin'     => $cekin[0],
                'cekout'    => $cekout[0],
                'kekurangan'=> $ka,
                'kelebihan' => $this->input->post('kelebihan'),
                'total'     => $pa,
            );

            $create = $this->curl->simple_put($this->API.'/sewa/editsewa/',$data,array(CURLOPT_BUFFERSIZE => 10));
            if($create)
            {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sewa Has Been Updated!</div>');
                redirect('/admin/dashboard/datasewa');
            }else
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Fail to Edit Sewa!</div>');
                redirect('/admin/dashboard/datasewa');
            }
        }

        function delete(){
            $pecah = explode("-",$this->uri->segment(4));
            $idsewa = $pecah[0];
            $idkostku = $pecah[1];

            $kost['k'] = json_decode($this->curl->simple_get($this->API.'/kost/getkost'));
            $idkost = explode(",",$this->input->post('idkost'));
            foreach($kost['k'] as $k){
                if($k->idkost == $idkostku ){
                    $kost = array(
                        'idkost'        => $k->idkost,
                        'harga' => $k->harga,
                        'keterangan' => "Available",
                        'gambar' => $k->gambar,
                        'namakost' => $k->namakost,
                        'kota' => $k->kota,
                        'type' => $k->type,
                        'Alamat' => $k->Alamat,
                        'kecamatan' => $k->kecamatan,
                        'diskripsi' => $k->diskripsi,
                        'fasilitas' => $k->fasilitas
                    );
                    if($this->input->post('pembayaran') > $k->harga){
                        $kelebihan = $this->input->post('pembayaran') - $k->harga;
                        $kekurangan = 0;
                    }else{
                        $kekurangan = $k->harga - $this->input->post('pembayaran');
                        $kelebihan = 0;
                    }
                    $this->curl->simple_put($this->API.'/kost/editkost/',$kost,array(CURLOPT_BUFFERSIZE => 10));
                }
            }
            
            $idsewa = $this->uri->segment(4);
            $delete = $this->curl->simple_delete($this->API.'/sewa/deletesewa',array('idsewa'=>$idsewa),array(CURLOPT_BUFFERSIZE => 10));
            
            if($delete){
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sewa Has Been Deleted!</div>');
                redirect('/admin/dashboard/datasewa');
            }else
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Fail to Deleted Sewa!</div>');
                redirect('/admin/dashboard/datasewa');
            }
        }
    }
?>