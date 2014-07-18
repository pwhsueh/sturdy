<?php
class Code_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function get_series_info($codekind_key,$code_key){
        $sql = @"select * from mod_code where codekind_key = '$codekind_key' and code_key='$code_key'   ";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $row = $query->row();

            return $row;
        }
    }

    public function get_series_detail($codekind_key,$code_key){
        $sql = @"select * from mod_code where parent_id in (
            select code_id from mod_code where codekind_key = '$codekind_key' and code_key='$code_key' 
            ) ";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }
    }
 

}