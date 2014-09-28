<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Country_manage_model extends MY_Model {
	
	function __construct()
	{
		$CI =& get_instance();
		$CI->config->module_load(COUNTRY_FOLDER, COUNTRY_FOLDER);
		$tables = $CI->config->item('tables');
		parent::__construct($tables['mod_country']); // table name
	}

	public function get_total_rows($filter="")
	{
		$sql = @"SELECT COUNT(*) AS total_rows FROM mod_country ".$filter;
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$row = $query->row();

			return $row->total_rows;
		}

		return 0;
	}

	public function get_country_list($dataStart, $dataLen, $filter)
	{
		$sql = @"SELECT * FROM mod_country ".$filter." ORDER BY modi_time DESC LIMIT $dataStart, $dataLen";
	
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$result = $query->result();

			return $result;
		}

		return;
	} 

	public function get_country_by_id($id)
	{
		$sql = @"SELECT * FROM mod_country WHERE id='$id' ";
	
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$result = $query->row();

			return $result;
		}

		return;
	} 

	public function get_country($filter=""){
        $sql = @"select * from mod_code where codekind_key = 'COUNTRY' and parent_id = -1 $filter";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }
    }
 

	public function insert($insert_data)
	{
		$sql = @"INSERT INTO mod_country (
											name, 
											email, 
											country_id,
											modi_time
										) 
				VALUES ( ?, ?, ?, NOW())";
		$para = array(
				$insert_data['name'],
				$insert_data['email'],
				$insert_data['country_id']
			);
		$success = $this->db->query($sql, $para);

		if($success)
		{
			return true;
		}

		return;
	}

	public function update($update_data)
	{
		$sql = @"UPDATE mod_country SET name 	= ?,
										email 	= ?,
										country_id 	= ?,
										modi_time = NOW()
				WHERE id = ?";
		$para = array(
				$update_data['name'],
				$update_data['email'], 
				$update_data['country_id'], 
				$update_data['id']
			);
		$success = $this->db->query($sql, $para);

		if($success)
		{
			return true;
		}

		return;
	} 
	  
	public function del($id)
	{
		$sql = @"DELETE FROM mod_country WHERE id = ?";
		$para = array($id);
		$success = $this->db->query($sql, $para);

		if($success)
		{
			return true;
		}

		return;
	} 
	
}