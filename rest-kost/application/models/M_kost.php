<?php 

    class M_kost extends CI_Model{
        
        public function getKost($idkost=null){
            if($idkost===null){
                return $this->db->get('kost')->result();
            }else{
                return $this->db->where('idkost',$idkost)
                ->get('kost');
            }
        }

        public function insertKost($table,$data){
            $this->db->insert($table,$data);
            return $this->db->affected_rows();
        }

        public function editKost($idkost,$data){
            $this->db->where('idkost',$idkost);
            $this->db->update('kost',$data);
        }

        public function deleteKost($idkost){
            $this->db->where('idkost',$idkost);
            $this->db->delete('kost');
            return $this->db->affected_rows();
        }

        public function filter($keterangan,$kota){
            if($keterangan == "default" & $kota == "default"){
                return $this->getKost(null);
            }else if($keterangan == "default" & !empty($kota)){
                return $this->db->select('*')
                ->from('kost')
                ->where('kota like', $kota)
                ->get()->result();
            }else if(!empty($keterangan) & $kota == "default"){
                return $this->db->select('*')
                ->from('kost')
                ->where('keterangan like', $keterangan)
                ->get()->result();
            }else{
                return $this->db->select('*')
                ->from('kost')
                ->where('keterangan like', $keterangan)
                ->where('kota like', $kota)
                ->get()->result();
            }
        }

        public function getkostlist($page, $start){
            return $query = $this->db->get('kost',$page,$start)->result();
        }

        public function getkostsold($sold){
            return $this->db->where('keterangan',$sold)
                ->get('kost')->result();
        }

        public function getavailablekost($keterangan){
            return $this->db->where('keterangan',$keterangan)->get('kost')->result();
        }

        function uploadbase64($base, $namefile){
            $target_dir = 'uploads/';
            $decoded_file = base64_decode($base); 
            $file_dir = $target_dir . $namefile;
            try {
                file_put_contents($file_dir, $decoded_file); 
                header('Content-Type: application/json');
                echo json_encode("File Uploaded Successfully");
            } catch (Exception $e) {
                header('Content-Type: application/json');
                echo json_encode("File Uploaded Failed");
            }
            return $base;
        }
    }

?>