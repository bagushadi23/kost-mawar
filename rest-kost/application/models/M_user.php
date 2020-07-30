<?php 

    class M_user extends CI_Model{
        public function getUser($id=null){
            if($id===null){
                return $this->db->get('user')->result();
            }else{
                return $this->db->where('id',$id)->get('user')->result_array();
            }
        }

        public function insertUser($table,$data){
            $this->db->insert($table,$data);
            return $this->db->affected_rows();
        }
        
        public function editUser($id,$data){
            $this->db->where('id',$id);
            $this->db->update('user',$data);
            return $this->db->affected_rows();
        }

        public function deleteUser($id){
            $this->db->where('id',$id);
            $this->db->delete('user');
            return $this->db->affected_rows();
        }

        public function getuserSewa($id=null){
            if($id===null){
                return $this->db->select('*')
                ->from('sewa')
                ->join('user','sewa.id=user.id')
                ->join('kost','sewa.idkost=kost.idkost')->get()->result(); 
            }else{
                return $this->db->select('*')
                ->from('sewa')
                ->join('user','sewa.id=user.id')
                ->join('kost','sewa.idkost=kost.idkost')->where('user.id',$id)->get()->result();
            }
        }
    }