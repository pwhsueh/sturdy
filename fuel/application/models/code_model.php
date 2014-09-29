<?php
class Code_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_code($codekind_key,$lang_code,$parent_id=-1,$filter=""){
        $sql = @"select * from mod_code where codekind_key = '$codekind_key' 
        and parent_id = $parent_id and lang_code = '$lang_code' $filter ";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }
    }

    public function get_series_menu($codekind_key,$lang_code,$parent_id=-1){
        // $sql = @"select * from mod_code where codekind_key = '$codekind_key' and parent_id = $parent_id and lang_code = '$lang_code' ";
        // $query = $this->db->query($sql);
        // //echo $sql;exit;
        // if($query->num_rows() > 0)
        // {
        //     $result = $query->result();

        //     return $result;
        // }
        return $this->get_code($codekind_key,$lang_code,$parent_id);
    }

    public function get_country(){
        return $this->get_code('COUNTRY','zh-TW');
    }

    public function get_country_info($code_id){
        $sql = @"select * from mod_country 
        where  country_id like '%;$code_id;%'   ";
        $query = $this->db->query($sql);
        
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }
    }

    public function get_series_info($code_id){
        $sql = @"select * from mod_code where code_id = '$code_id'  ";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $row = $query->row();

            return $row;
        }
    }

    public function get_series_sub_detail($parent_id){
        $sql = @"select * from mod_code where parent_id  = '$parent_id' ";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }
    }

    public function get_code_info($codekind_key,$code_key){
        $sql = @"select * from mod_code where codekind_key='$codekind_key' and code_key='$code_key' ";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }
    }

    public function get_news_list($type,$lang){
        $sql = @"select * from mod_news where type='$type' and lang='$lang' ";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }
    }

    public function get_products_list($serial_key){
        $sql = @"select * from mod_products where serial_key  = '$serial_key' ";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }
    }

    public function get_product($id){
        $sql = @"select * from mod_products where id  = '$id' ";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $row = $query->row();

            return $row;
        }
    }

    public function get_support($type_code_key,$lang_code){
        $sql = @"select * from mod_code where code_key='$type_code_key' and lang_code = '$lang_code'  ";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $row = $query->row();

            return $row;
        }
    }

    public function get_support_list($type){ 
        $sql = @"select * from mod_sup where type = '$type' ";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }
    }

    public function insert_mod_contact($insert_data){
        $sql = @"INSERT INTO mod_contact (
                                            com_name, 
                                            address,
                                            contact_person, 
                                            country,   
                                            tel,
                                            fax,
                                            email,
                                            website,
                                            engineernum,
                                            bothpercentt,
                                            bothpercentr,
                                            territoryplace,
                                            whichexhibition,
                                            wherelearnsturdyothers,
                                            comment,
                                            lang                                         
                                        ) 
                VALUES ( ?, ?, ?, ?, ?,?,?, ?, ?, ?, ?, ?, ?, ?, ?,?)"; 

        $para = array(
                $insert_data['com_name'], 
                $insert_data['address'],
                $insert_data['contact_person'],
                $insert_data['country'],  
                $insert_data['tel'],
                $insert_data['fax'],
                $insert_data['email'],
                $insert_data['website'],
                $insert_data['engineernum'],
                $insert_data['bothpercentt'],
                $insert_data['bothpercentr'],
                $insert_data['territoryplace'],
                $insert_data['whichexhibition'],
                $insert_data['wherelearnsturdyothers'],
                $insert_data['comment'],
                $insert_data['lang']
            );
        $success = $this->db->query($sql, $para);

        if($success)
        {
            return true;
        }

        return;
    }
 

}