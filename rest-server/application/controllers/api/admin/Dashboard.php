<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	require APPPATH . '/libraries/REST_Controller.php';
	use Restserver\Libraries\REST_Controller;
	
	class Dashboard extends REST_Controller
	{
		
		function __construct($config = 'rest')
		{
			parent::__construct($config);
        	$this->load->database();
		}

		function sewa_get(){
			$data = $this->m_query->sewa();
			$this->response($data, 200);
		}

		function sewa_post(){
			$bayar = $this->input->post('pembayaran');
            $kekurangan=$this->input->post('kekurangan')-$bayar;
            $data = array (
                'id'           => $this->input->post('iduser'),
                'idkost'       => $this->input->post('idkost'),
                'cekin'        => $this->input->post('cekin'),
                'cekout'       => $this->input->post('cekout'),
                'kekurangan'   => $kekurangan,
                'kelebihan'    => 0,
                'total'        => $this->input->post('total'),
            );
            $kostketerangan = "Sold";
            $this->m_query->kost_update($kostketerangan,$this->input->post('idkost'));
			if($this->m_query->insert_sewa('sewa',$data)>0){
				$message = [
					'message'   => "new data sewa kost hasben insert",
					'data'      => $data
				];
				$this->set_response($message, REST_Controller::HTTP_CREATED);
			}else{
				$message = [
					'message'   => "fail insert new data sewa to database",
				];
				$this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);
			}
		}

		public function sewa_put(){

		}

		public function sewa_delete(){
			$idsewa = $this->delete('idsewa');
			if ($idsewa===null) {
				//jika tidak ada id maka ini
				$message = [
					'message' => 'masukan id'
				];
				$this->response($message, REST_Controller::HTTP_BAD_REQUEST);
			} else {
				if($this->m_query->delete_sewa($idsewa)>0){
					//ok
					$message = [
						'idsewa' => $idsewa,
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
?>