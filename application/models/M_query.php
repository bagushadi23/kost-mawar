<?php 

    class M_query extends CI_Model
    {
        //fungsi search kost (admin)
        public function search($where){
            return $this->db->select('*')
            ->from('kost')
            ->group_start()
            ->where('kota like', $where)
            ->or_where('keterangan',$where)
            ->or_where('type',$where)
            ->or_where('namakost',$where)
            ->or_where('idkost',$where)
            ->group_end()
            ->get()->result();
        }
    }

?>