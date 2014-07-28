<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sup_manage_model extends MY_Model {
	
	function __construct()
	{
		$CI =& get_instance();
		$CI->config->module_load(SUP_FOLDER, SUP_FOLDER);
		$tables = $CI->config->item('tables');
		parent::__construct($tables['mod_sup']); // table name
	}

	public function get_total_rows($filter="")
	{
		$sql = @"SELECT COUNT(*) AS total_rows FROM mod_sup a left join mod_code b on a.type = b.code_id $filter ";
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$row = $query->row();

			return $row->total_rows;
		}

		return 0;
	}

	public function get_sup_list($dataStart, $dataLen, $filter="")
	{
		$sql = @"SELECT a.*,b.code_name FROM mod_sup a left join mod_code b on a.type = b.code_id
 		$filter  ORDER BY `type` DESC LIMIT $dataStart, $dataLen";
	
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$result = $query->result();

			return $result;
		}

		return;
	}

	public function get_sup_detail($id){
		$sql = @"SELECT * FROM mod_sup where id='$id' LIMIT 1 ";
	
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$row = $query->row();

			return $row;
		}

		return;
	}
 

	public function insert($insert_data)
	{
		$sql = @"INSERT INTO mod_sup (
											type, 
											title,
											lang									 
										) 
				VALUES ( ?, ? , ?)"; 

		$para = array(
				$insert_data['type'], 
				$insert_data['title'], 
				$insert_data['lang']
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
		$sql = @"UPDATE mod_sup SET `type` 	= ?,
									title 	= ?,
									img 	= ?,
									file_url 	= ?,
									lang = ?
									 
				WHERE id = ?";
		$para = array(
				$update_data['type'], 
				$update_data['title'],  
				$update_data['img'],  
				$update_data['file_url'],  
				$update_data['lang'],
				$update_data['id']
			);
		$success = $this->db->query($sql, $para);
 
		 
		if($success)
		{
			return true;
		}

		return;
	} 

	public function update_file($update_data)
	{
		$sql = @"UPDATE mod_sup SET  img   = ? ,
								     file_url  = ? 
				WHERE id = ?";
		$para = array( 
				$update_data['img'], 
				$update_data['file_url'], 
				$update_data['id']
			);
		$success = $this->db->query($sql, $para);
 
		 
		if($success)
		{
			return true;
		}

		return;
	} 
 
	public function get_last_insert_id(){
		$sql = "SELECT last_insert_id() as ID";
        $id_result= $this->db->query($sql);
        return $id_result->row()->ID;  ;
	}

	public function do_multi_del($ids){
		$sql = @"DELETE FROM  mod_sup WHERE id in ($ids) ";

		// $para = array($ids);
		$success = $this->db->query($sql);

		return $success;
	}

	public function del($id)
	{
		$sql = @"DELETE FROM mod_sup WHERE id = ?";
		 
		$para = array($id);
		$success = $this->db->query($sql, $para);

		if($success)
		{
			return true;
		}

		return;
	} 
	  
	
}