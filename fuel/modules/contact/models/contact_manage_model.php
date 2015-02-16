<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contact_manage_model extends MY_Model {
	
	function __construct()
	{
		$CI =& get_instance();
		$CI->config->module_load(CONTACT_FOLDER, CONTACT_FOLDER);
		$tables = $CI->config->item('tables');
		parent::__construct($tables['mod_contact']); // table name
	}

	public function get_total_rows($filter="")
	{
		$sql = @"SELECT COUNT(*) AS total_rows FROM mod_contact a 
		 left join mod_code b on a.country = b.code_id $filter";
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$row = $query->row();

			return $row->total_rows;
		}

		return 0;
	}

	public function get_contact_list($dataStart, $dataLen, $filter)
	{
		$sql = @"SELECT a.*,b.code_name AS country FROM mod_contact  a 
		 left join mod_code b on a.country = b.code_id $filter ORDER BY id DESC LIMIT $dataStart, $dataLen";
	
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$result = $query->result();

			return $result;
		}

		return;
	} 

	public function get_contact_by_id($id)
	{
		$sql = @"SELECT * FROM mod_contact WHERE id='$id' ";
	
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$result = $query->row();

			return $result;
		}

		return;
	} 

	public function get_country($filter=""){
        $sql = @"select * from mod_code where codekind_key = 'COUNTRY' and parent_id = -1 $filter ORDER BY code_value1";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }
    }

	function get_export_list($filter){
		$col_name = array("公司名稱","地址","聯絡人","國家","電話","傳真","電子郵箱","公司類型","員工","工程師/技術員","人數","銷售型","T","R","銷售渠道","國家","國際市場-其他","你是怎麼知道新駿？","你是怎麼知道新駿？-其他","有興趣產品","評論","填寫日期");
		
		 $sql = @"select com_name AS 公司名稱,
		 address AS 地址,
		 contact_person AS 聯絡人,
		 b.code_name AS 國家,
		 tel AS 電話,
		 fax AS 傳真,
		 email AS 電子郵箱,
		 comtype AS 公司類型,
		 employeenum AS 員工,
		 engineer AS '工程師/技術員',
		 engineernum AS 人數,
		 salestype AS 銷售型,
		 bothpercentt AS T,
		 bothpercentr AS R,
		 saleschannel AS 銷售渠道,
		 territory AS 市場,
		 territoryplace AS '國際市場-其他',
		 wherelearnsturdy AS '你是怎麼知道新駿？',
		 wherelearnsturdyothers AS '你是怎麼知道新駿？-其他',
		 interests AS 有興趣產品,
		 comment AS 評論,
		 modi_date AS 填寫日期
		 from mod_contact a left join mod_code b on a.country = b.code_id $filter ORDER BY id desc";
        $query = $this->db->query($sql);
        // echo $sql;exit;
        // die;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }
	}
 
	
}