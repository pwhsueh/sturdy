<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class News_manage_model extends MY_Model {
	
	function __construct()
	{
		$CI =& get_instance();
		$CI->config->module_load(NEWS_FOLDER, NEWS_FOLDER);
		$tables = $CI->config->item('tables');
		parent::__construct($tables['mod_news']); // table name
	}

	public function get_total_rows($filter="")
	{
		$sql = @"SELECT COUNT(*) AS total_rows FROM mod_news $filter ";
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$row = $query->row();

			return $row->total_rows;
		}

		return 0;
	}

	public function get_news_list($dataStart, $dataLen, $filter)
	{
		$sql = @"SELECT * FROM mod_news $filter ORDER BY `news_order` LIMIT $dataStart, $dataLen";
	
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$result = $query->result();

			return $result;
		}

		return;
	}

	public function get_news_detail($id){
		$sql = @"SELECT * FROM mod_news where id='$id' LIMIT 1 ";
	
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
		$sql = @"INSERT INTO mod_news (
											date, 
											img,
											title, 
											content, 
											type,
											lang,
										 	news_order
										) 
				VALUES ( ?, ?, ?, ?, ?,?,?)"; 

		$para = array(
				$insert_data['date'], 
				$insert_data['img'],
				$insert_data['title'],
				$insert_data['content'],
				$insert_data['type'],
				$insert_data['lang'],
				$insert_data['news_order']
			);
		$success = $this->db->query($sql, $para);

		if($success)
		{
			return true;
		}

		return;
	}

	public function delete_order($record)
	{
		$sql = @"UPDATE mod_news SET news_order = news_order - 1 WHERE news_order >= ? AND type=? AND  lang=? ";
		$para = array( 
			$record->news_order,
			$record->type,
			$record->lang
		);  
		$success = $this->db->query($sql, $para); 
		if($success)
		{
			return true;
		} 
		return; 
	} 

	public function did_insert_order_modify($num ,$update_data)
	{
		$sql = @"UPDATE mod_news SET news_order = news_order + 1 WHERE news_order >= $num AND type=? AND  lang=? ";
		$para = array( 
			$update_data['type'], 
			$update_data['lang'], 
		);  
		$success = $this->db->query($sql, $para); 
		if($success)
		{
			return true;
		} 
		return; 
	} 

	// public function update_order($ori_num,$num,$update_data)
	// {
	// 	$sql = @"UPDATE mod_news SET news_order = $ori_num WHERE news_order = $num AND type=? AND  lang=? "; 
	// 	$sql2 = @"UPDATE mod_news SET news_order = $num  WHERE news_order = $ori_num AND type=? AND  lang=? "; 
	// 	$para = array( 
	// 		$update_data['type'], 
	// 		$update_data['lang'], 
	// 	);
	// 	$success = $this->db->query($sql, $para); 
	// 	$success2 = $this->db->query($sql2, $para); 
	// 	if($success && $success2)
	// 	{
	// 		return true;
	// 	} 
	// 	return;
	// } 
	public function get_order($data)
	{
		$sql = @"SELECT * FROM mod_news WHERE type = ? AND lang = ? AND news_order = ?";  
		$para = array( 
			$data['type'], 
			$data['lang'], 
			$data['news_order']
		);
		$query = $this->db->query($sql, $para);  
		if($query->num_rows() > 0)
		{
			$row = $query->row();

			return $row;
		}
		return;
	} 

	public function update_order($news_order,$id)
	{
		$sql = @"UPDATE mod_news SET news_order = '$news_order' WHERE id = $id ";  
	 
		$success = $this->db->query($sql);  
		if($success)
		{
			return true;
		} 
		return;
	} 

	public function update($update_data)
	{
		$sql = @"UPDATE mod_news SET `date` 	= ?,
										img 	= ?,
										title 	= ?,
										content = ?, 
										type	= ?, 
										lang	= ?,
										news_order = ?
									 
				WHERE id = ?";
		$para = array(
				$update_data['date'],
				$update_data['img'],
				$update_data['title'],
				$update_data['content'],
				$update_data['type'], 
				$update_data['lang'],
				$update_data['news_order'],
				$update_data['id']
			);
		$success = $this->db->query($sql, $para);
 
		 
		if($success)
		{
			return true;
		}

		return;
	} 

	public function do_multi_del($ids){
		$sql = @"DELETE FROM  mod_news WHERE id in ($ids) ";

		// $para = array($ids);
		$success = $this->db->query($sql);

		return $success;
	}

	public function del($id)
	{
		$sql = @"DELETE FROM mod_news WHERE id = ?";
		 
		$para = array($id);
		$success = $this->db->query($sql, $para);

		if($success)
		{
			return true;
		}

		return;
	} 
	  
	
}