<?php 

    class Kost extends CI_Controller
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

        function update($idkost){
            $data['title']  = "EDIT KOST";
            $data['kost']   = json_decode($this->curl->simple_get($this->API.'kost/getkost?idkost='.$idkost),true);
            $this->load->view('templates_admin/header',$data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/update',$data);
            $this->load->view('templates_admin/footer');
        }

        function ubah(){
            $fasilitas  = $this->input->post('KMD').','.$this->input->post('KD').','.$this->input->post('KASUR').','.$this->input->post('AC').','.$this->input->post('WIFI').','.$this->input->post('24JAM').','.$this->input->post('LOUNDRY').','.$this->input->post('TV');

            $data = array (
                'idkost'        => $this->input->post('idkost'),
                'namakost'      => $this->input->post('namakost'),
                'harga'         => $this->input->post('harga'),
                'type'          => $this->input->post('type'),
                'kota'          => $this->input->post('kota'),
                'kecamatan'     => $this->input->post('kecamatan'),
                'keterangan'    => $this->input->post('keterangan'),
                'diskripsi'     => $this->input->post('diskripsi'),
                'Alamat'        => $this->input->post('Alamat'),
                'gambar'        => $this->input->post('gambar'),
                'fasilitas'     => $fasilitas
            );
            $update = $this->curl->simple_put($this->API.'/kost/editkost/',$data,array(CURLOPT_BUFFERSIZE => 10));
            if($update)
            {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kost Has Been Updated!</div>');
                redirect('/admin/dashboard/kost');
            }else
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Fail to Update Kost!</div>');
                redirect('/admin/dashboard/kost');
            }            
        }

        function delete(){
            $idkost = $this->uri->segment(4);
            $delete = $this->curl->simple_delete($this->API.'/kost/deletekost/',array('idkost'=>$idkost),array(CURLOPT_BUFFERSIZE => 10));
            if($delete)
            {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kost Has Been Deleted!</div>');
                redirect('/admin/dashboard/kost');
            }else
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Fail to Delete Kost!</div>');
                redirect('/admin/dashboard/kost');
            }
        }

        function tambah(){
            $fasilitas  = $this->input->post('KMD').','.$this->input->post('KD').','.$this->input->post('KASUR')
                          .','.$this->input->post('AC').','.$this->input->post('WIFI').','.$this->input->post('24JAM')
                          .','.$this->input->post('LOUNDRY').','.$this->input->post('TV');
            
            if(isset($_FILES['gambar'])){
                $data_img = base64_encode(file_get_contents($_FILES['gambar']['tmp_name']));
                $base64 = $data_img;
            }

            $gabung = $this->input->post('namakost').rand();
            $namagambar = str_replace(" ", "_", $gabung);

            $data = array (
                'harga' => $this->input->post('harga'),
                'keterangan' => $this->input->post('keterangan'),
                'gambar' => $namagambar,
                'namakost' => $this->input->post('namakost'),
                'kota' => $this->input->post('kota'),
                'type' => $this->input->post('type'),
                'Alamat' => $this->input->post('Alamat'),
                'kecamatan' => $this->input->post('kecamatan'),
                'diskripsi' => $this->input->post('diskripsi'),
                'fasilitas' => $fasilitas
            );
            $datagambar = array(
                'base'          => $base64,
                'nama'          => $namagambar
            );

            $uploadimg = $this->curl->simple_post($this->API.'kost/upload',$datagambar,array(CURLOPT_BUFFERSIZE => 10));
            $create = $this->curl->simple_post($this->API.'kost/insertkost',$data,array(CURLOPT_BUFFERSIZE => 20));
            if($uploadimg)
            {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kost Has Been Insert!</div>');
                redirect('/admin/dashboard/kost');
            }else
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Fail to Insert Kost!</div>');
                redirect('/admin/dashboard/kost');
            }

        }

    }

?>