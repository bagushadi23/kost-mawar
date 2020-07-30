<?php

	class M_query extends CI_Model{
		public function joinsewasold(){
			$keterangan="Sold";
            return $this->db->select('*')
            ->from('sewa')
            ->join('user','sewa.id=user.id')
            ->join('kost','sewa.idkost=kost.idkost')->where('keterangan',$keterangan)->get()->result();
		}

		public function cek_login($username,$password)
        {
            $hasil   = $this->db->where('username',$username)->where('password',$password)->limit(1)->get('user')->result();
            if($hasil->num_rows()>0)
            {
                return $hasil->result();
            }else{
                return array();
            }
        }

        public function sewaid($idsewa){
            return $this->db->select('*')
            ->from('sewa')
            ->join('user','sewa.id=user.id')
            ->join('kost','sewa.idkost=kost.idkost')->where('sewa.idsewa',$idsewa)->get()->result();
		}
	}