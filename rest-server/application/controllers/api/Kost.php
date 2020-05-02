<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Kost extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get() {
        $idkost = $this->get('idkost');
        if ($idkost == '') {
            $data = $this->m_query->get_kost();
        } else {
            $data = $this->m_query->get_kost($idkost)->row_array();
        }
        $this->response($data, 200);
    }

    function indexbyfilter_get() {
        $keterangan = $this->get('keterangan');
        $kota = $this->get('kota');
        $data = $this->m_query->filter($keterangan,$kota);
        $this->response($data, 200);
    }

    function index_post() {
        $data = [
            'idkost' => '', 
            'harga' => $this->input->post('harga'),
            'keterangan' => $this->input->post('keterangan'),
            'gambar' => $this->input->post('gambar'),
            'namakost' => $this->input->post('namakost'),
            'kota' => $this->input->post('kota'),
            'type' => $this->input->post('type'),
            'Alamat' => $this->input->post('Alamat'),
            'kecamatan' => $this->input->post('kecamatan'),
            'diskripsi' => $this->input->post('diskripsi'),
            'fasilitas' => $this->input->post('fasilitas')
        ];

        $this->m_query->insert_kost('kost',$data);
        if($this->m_query->insert_kost('kost',$data)>0){
            $message = [
                'message'   => "new data kost hasben insert",
                'data'      => $data
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        }else{
            $message = [
                'message'   => "fail insert new data kost to database",
            ];
            $this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    function index_put() {
        $idkost = $this->put('idkost');
        $data = array (
            'harga' => $this->put('harga'),
            'keterangan' => $this->put('keterangan'),
            'gambar' => $this->put('gambar'),
            'namakost' => $this->put('namakost'),
            'kota' => $this->put('kota'),
            'type' => $this->put('type'),
            'Alamat' => $this->put('Alamat'),
            'kecamatan' => $this->put('kecamatan'),
            'diskripsi' => $this->put('diskripsi'),
            'fasilitas' => $this->put('fasilitas')
        );

        $data = $this->m_query->update_kost($idkost,$data);
        $this->response($data, 200);        
    }

    function index_delete() {
        $idkost = $this->delete('idkost');
        
        if ($idkost===null) {
            //jika tidak ada id maka ini
            $message = [
                'message' => 'masukan id'
            ];
            $this->response($message, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if($this->m_query->delete_kost($idkost)>0){
                //ok
                $message = [
                    'idkost' => $idkost,
                    'message' => 'Deleted the data'
                ];
                $this->m_query->delete_kost($idkost);
                $this->response($message, 200);
            }else{
                //jika fail
                $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

}