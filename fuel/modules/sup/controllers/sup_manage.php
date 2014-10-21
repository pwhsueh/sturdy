<?php
require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class Sup_manage extends Fuel_base_controller {
	public $view_location = 'sup';
	public $nav_selected = 'sup/manage';
	public $module_name = 'sup manage';
	public $module_uri = 'fuel/sup/lists';
	function __construct()
	{
		parent::__construct();
		$this->_validate_user('sup/manage');
		$this->load->module_model(SUP_FOLDER, 'sup_manage_model');
		$this->load->module_model(CODEKIND_FOLDER, 'codekind_manage_model');
		$this->load->helper('ajax');
		$this->load->library('pagination');
		$this->load->library('set_page');
		$this->load->library('session');		
		$this->load->library('comm');
	}
	
	function lists($dataStart=0)
	{
		$base_url = base_url();

		$search_type = $this->input->get_post('search_type'); 
		$search_lang = $this->input->get_post('search_lang'); 
		
		$filter = " WHERE 1=1  "; 

		if (!empty($search_type)) {
			$this->session->set_userdata('search_type', $search_type);
		}else {
			$search_type = $this->session->userdata('search_type'); 
		} 

		if (!empty($search_lang)) {
			$this->session->set_userdata('search_lang', $search_lang);
		}else {
			$search_lang = $this->session->userdata('search_lang'); 			
		} 

		$filter .= " AND a.type = '$search_type' ";

		// print_r($filter);
		// die;

		$target_url = $base_url.'fuel/sup/lists/';

		$total_rows = $this->sup_manage_model->get_total_rows($filter);
		$config = $this->set_page->set_config($target_url, $total_rows, $dataStart, 20);
		$dataLen = $config['per_page'];
		$this->pagination->initialize($config); 

		$results = $this->sup_manage_model->get_sup_list($dataStart, $dataLen,$filter);

	 
		// $type = $this->codekind_manage_model->get_code_list_for_other_mod("NEWSTYPE");
		$lang = $this->codekind_manage_model->get_code_list_for_other_mod("LANG_CODE");
		$vars['lang'] = $lang;
 
		 
		$vars['search_type'] = $search_type;
		$vars['search_lang'] = $search_lang;
		$vars['total_rows'] = $total_rows; 
		$vars['form_action'] = $base_url.'fuel/sup/lists';
		$vars['form_method'] = 'POST';
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);

		$vars['page_jump'] = $this->pagination->create_links();
		$vars['create_url'] = $base_url.'fuel/sup/create';
		$vars['edit_url'] = $base_url.'fuel/sup/edit/';
		$vars['del_url'] = $base_url.'fuel/sup/del/';
		$vars['multi_del_url'] = $base_url.'fuel/sup/do_multi_del';
		$vars['results'] = $results;
		$vars['total_rows'] = $total_rows; 
		$vars['CI'] = & get_instance();

		$this->fuel->admin->render('_admin/sup_lists_view', $vars);

	}

 
	function create()
	{
		$vars['form_action'] = base_url().'fuel/sup/do_create';
		$vars['form_method'] = 'POST';
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);		

		$vars['module_uri'] = base_url().$this->module_uri;
		$vars['view_name'] = "新增";

		// $support = $this->codekind_manage_model->get_code_list_for_other_mod("Support");
		// $vars['support'] = $support;

		$lang = $this->codekind_manage_model->get_code_list_for_other_mod("LANG_CODE");
		$vars['lang'] = $lang;
 

		$this->fuel->admin->render("_admin/sup_create_view", $vars);
	}

	function do_create()
	{
		$post_arr = $this->input->post();  

		// print_r($post_arr);
		// 	die;

		$success = $this->sup_manage_model->insert($post_arr);  

		if($success)
		{ 
			$id = $this->sup_manage_model->get_last_insert_id(); 
			$root_path = assets_server_path("support/$id/");

// print_r($root_path);
// 			die;

			if (!file_exists($root_path)) {
			    mkdir($root_path, 0777, true);
			}
			 
			$module_uri = base_url().$this->module_uri;

			$updateAry = array();
			$updateAry["id"] = $id;
			 
			$config['upload_path'] = $root_path;
			$config['allowed_types'] = 'png';
			$config['max_size']	= '9999';
			$config['max_width']  = '0';
			$config['max_height']  = '0';

			$this->load->library('upload',$config); 

		
			if ($this->upload->do_upload('img'))
			{
				$data = array('upload_data'=>$this->upload->data()); 
				$updateAry["img"] = "support/$id/".$data["upload_data"]["file_name"];
			} else{ 
				$updateAry["img"] = '';				 
			}  

			$config['upload_path'] = $root_path;
			$config['allowed_types'] = '*';
			$config['max_size']	= '200000';
			$config['max_width']  = '0';
			$config['max_height']  = '0';
 
			$this->upload->initialize($config);
 
			if ($this->upload->do_upload('file_url'))
			{
				$data = array('upload_data'=>$this->upload->data()); 
				$updateAry["file_url"] = "support/$id/".$data["upload_data"]["file_name"];
			} else{ 
				$updateAry["file_url"] = '';				 
			} 

			// print_r($updateAry);
			// die;

			$this->sup_manage_model->update_file($updateAry); 

			$this->comm->plu_redirect($module_uri, 0, "新增成功");
			die();
		}
		else
		{
			$this->comm->plu_redirect($module_uri, 0, "新增失敗");
			die();
		}
		return;
	}

	 
	function edit($id)
	{ 
		$support;
		if(isset($id))
		{
			$support = $this->sup_manage_model->get_sup_detail($id);
		} 

		if(!isset($id) || !isset($support))
		{
			$this->comm->plu_redirect(base_url().'fuel/sup/lists', 0, "找不到資料");
			die;
		} 

		$vars['form_action'] = base_url()."fuel/sup/do_edit/$id";
		$vars['form_method'] = 'POST';
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);	 

		$lang = $this->codekind_manage_model->get_code_list_for_other_mod("LANG_CODE");
		$vars['lang'] = $lang;

	    $vars['support'] = $support; 
		$vars['module_uri'] = base_url().$this->module_uri;
	 
		$vars["view_name"] = "修改";
		$this->fuel->admin->render('_admin/sup_edit_view', $vars);
	}

	function do_edit($id)
	{ 
		$post_arr = $this->input->post(); 

		$post_arr["id"] = $id;
 

		$root_path = assets_server_path("support/$id/");

		if (!file_exists($root_path)) {
		    mkdir($root_path, 0777, true);
		}
		 
		$module_uri = base_url().$this->module_uri;
		  
		$config['upload_path'] = $root_path;
		$config['allowed_types'] = 'png';
		$config['max_size']	= '9999';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload',$config); 

	 
		if ($this->upload->do_upload('img'))
		{
			$data = array('upload_data'=>$this->upload->data()); 
			$post_arr["img"] = "support/$id/".$data["upload_data"]["file_name"];
		} else{ 
			$post_arr["img"] = $post_arr["exist_img"];				 
		} 
		 

		$config['upload_path'] = $root_path;
		$config['allowed_types'] = '*';
		$config['max_size']	= '200000';
		$config['max_width']  = '0';
		$config['max_height']  = '0';

		// $this->load->library('upload',$config); 
		$this->upload->initialize($config);

		if ($this->upload->do_upload('file_url'))
		{
			$data = array('upload_data'=>$this->upload->data()); 
			$post_arr["file_url"] = "support/$id/".$data["upload_data"]["file_name"];
		} else{ 
			echo $this->upload->display_errors();
			$post_arr["file_url"] = $post_arr["exist_file_url"];			 
		} 

		// print_r($post_arr);
		// die;
		$success = $this->sup_manage_model->update($post_arr); 
		
		if($success)
		{  
			$this->comm->plu_redirect($module_uri, 0, "更新成功");
			die();
		}
		else
		{
			$this->comm->plu_redirect($module_uri, 0, "更新失敗");
			die();
		}
		return;
	} 

	function do_multi_del(){
		$result = array();

		$ids = $this->input->get_post("ids");


		if($ids)
		{
			$im_ids = implode(",", $ids);
			// $result['im_ids'] = $im_ids;

			$success = $this->sup_manage_model->do_multi_del($im_ids);
		}
		else
		{
			$success = false;
		}



		if(isset($success))
		{
			$result['status'] = 1;
		}
		else
		{
			$result['status'] = $ids;
		}


		if(is_ajax())
		{
			echo json_encode($result);
		}
	} 

	function do_del($id)
	{
		$response = array();
		if(!empty($id))
		{
			$success = $this->sup_manage_model->del($id);

			if($success)
			{
				$response['status'] = 1;
			}
			else
			{
				$response['status'] = -1;
			}
		}
		else
		{
			$response['status'] = -1;
		}

		echo json_encode($response);
	}

	// function plu_redirect($url, $delay, $msg)
	// {
	//     if( isset($msg) )
	//     {
	//         $this->notify($msg);
	//     }

	//     echo "<meta http-equiv='Refresh' content='$delay; url=$url'>";
	// }

	// function notify($msg)
	// {
	//     $msg = addslashes($msg);
	//     echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
	//     echo "<script type='text/javascript'>alert('$msg')</script>\n";
	//     echo "<noscript>$msg</noscript>\n";
	//     return;
	// }

	function get_type($lang_code)
	{
		$response = $this->codekind_manage_model->get_codekind_list(0,999," WHERE codekind_key='Support' and lang_code='$lang_code' ","mod_code"); ;
		 
		echo json_encode($response);
	} 

}