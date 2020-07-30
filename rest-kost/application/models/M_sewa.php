<?php 

    class M_sewa extends CI_Model{
        public function getSewa($idsewa=null){
            if($idsewa===null){
                return $this->db->get('sewa')->result();
            }else{
                return $this->db->where('idsewa',$idsewa)
                ->get('sewa')->result_array();
            }
        }

        public function insertSewa($table, $data){
            $this->db->insert($table,$data);
            return $this->db->affected_rows();
        }

        public function editSewa($idsewa,$data){
            $this->db->where('idsewa',$idsewa);
            $this->db->update('sewa',$data);
        }

        public function deleteSewa($idsewa){
            $this->db->where('idsewa',$idsewa);
            $this->db->delete('sewa');
            return $this->db->affected_rows();
        }
    }