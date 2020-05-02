<?php 

    class M_query extends CI_Model
    {

        //fungsi tampil data kost semua dan by id
        public function get_kost($idkost = null){
            if($idkost === null){
                return $this->db->get('kost')->result();
            }else{
                return $this->db->where('idkost',$idkost)
                ->get('kost');
            }
        }

        //fungsi tambah data kost (CRUD)
        public function insert_kost($table,$data){
            $this->db->insert($table,$data);
            return $this->db->affected_rows();
        }

        //fungsi update data kost (CRUD)
        public function update_kost($where, $data)
        {
            $this->db->where('idkost',$where);
            $this->db->update('kost',$data);
        }

        //fungsi delete data kost (CRUD)
        public function delete_kost($idkost)
        {
            $this->db->delete('kost',['idkost'=>$idkost]);
            return $this->db->affected_rows();
        }

        public function filter($keterangan,$kota){
            if($keterangan == "default" & $kota == "default"){
                return $this->get_kost(null);
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

        public function sewa(){
            return $this->db->select('*')
            ->from('sewa')
            ->get()->result();
        }

        public function insert_sewa($table,$data){
            $this->db->insert($table,$data);
            return $this->db->affected_rows();
        }

        public function delete_sewa($idsewa){
            $this->db->where($idsewa)
            ->delete('sewa');
            return $this->db->affected_rows();
        }

        public function kost_update($keterangan, $id){
            $this->db->set('keterangan',$keterangan)
            ->where('idkost',$id)
            ->update('kost'); 
        }
    }