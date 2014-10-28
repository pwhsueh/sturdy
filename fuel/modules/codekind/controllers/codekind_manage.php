<?php
require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class Codekind_manage extends Fuel_base_controller {
	public $view_location = 'codekind';
	public $nav_selected = 'codekind/manage';
	public $module_name = 'codekind manage';
	public $module_uri = 'fuel/codekind/lists';
	function __construct()
	{
		parent::__construct();
		$this->_validate_user('codekind/manage');
		$this->load->module_model(CODEKIND_FOLDER, 'codekind_manage_model');
		$this->load->helper('ajax');
		$this->load->library('pagination');
		$this->load->library('set_page');
	}
	
	function lists($dataStart=0)
	{
		$base_url = base_url();

		$act = $this->input->get_post("act");
		$search_item = $this->input->get_post("search_item");
		$filter = "";

		if($act)
		{
			switch ($act) {
				case 'by_title':
					$filter = " WHERE codekind_name LIKE '%".$search_item."%'";
					break;
				case 'by_content':
					$filter = " WHERE cd_content LIKE '%".$search_item."%'";
					break;					
				default:
					$filter = " WHERE cd_title LIKE %'".$search_item."'%";
					break;
			}
		}

		
		$target_url = $base_url.'fuel/codekind/lists/';

		$total_rows = $this->codekind_manage_model->get_total_rows($filter);
		$config = $this->set_page->set_config($target_url, $total_rows, $dataStart, 20);
		$dataLen = $config['per_page'];
		$this->pagination->initialize($config);

		$codekind_results = $this->codekind_manage_model->get_codekind_list($dataStart, $dataLen, $filter);
		

		$vars['form_action'] = $base_url.'fuel/codekind/lists';
		$vars['form_method'] = 'POST';
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);

		$vars['page_jump'] = $this->pagination->create_links();
		$vars['create_url'] = $base_url.'fuel/codekind/create';
		$vars['edit_url'] = $base_url.'fuel/codekind/edit/';
		$vars['del_url'] = $base_url.'fuel/codekind/del/';
		$vars['multi_del_url'] = $base_url.'fuel/codekind/do_multi_del';
		$vars['codekind_results'] = $codekind_results;
		$vars['total_rows'] = $total_rows;
		$vars['search_url'] = $base_url.'fuel/codekind/lists';
		$vars['level_url'] = $base_url.'fuel/code/lists?codekind_key=';
		$vars['CI'] = & get_instance();

		$this->fuel->admin->render('_admin/codekind_lists_view', $vars);

	}

	function code_lists($dataStart=0)
	{
		$base_url = base_url();

		$filter = "";
		
		$codekind_key = $this->input->get_post("codekind_key");
		$code_id = $this->input->get_post("code_id");
		$code_lang = $this->input->get_post("code_lang");

		if(!empty($codekind_key))
		{
			if(!empty($code_id))
			{
				$filter = "WHERE codekind_key='".$codekind_key."' AND parent_id='".$code_id."'";
				$code_name = $this->codekind_manage_model->get_code_name($code_id);
				$vars['up_url'] = $base_url.'fuel/code/lists?codekind_key='.$codekind_key;
				$vars['code_name'] = $code_name;
				$vars['create_url'] = $base_url.'fuel/code/create?codekind_key='.$codekind_key.'&code_id='.$code_id;
				if (isset($code_lang) && !empty($code_lang)) {
					 $vars['create_url'] = $vars['create_url'].'&code_lang='.$code_lang;
				}
			}
			else
			{
				$filter = "WHERE codekind_key='".$codekind_key."' AND parent_id=-1";
				$vars['create_url'] = $base_url.'fuel/code/create?codekind_key='.$codekind_key;
			}
			$target_url = $base_url.'fuel/code/lists/';

			$total_rows = $this->codekind_manage_model->get_total_rows($filter, "mod_code");
			$config = $this->set_page->set_config($target_url, $total_rows, $dataStart, 20);
			$dataLen = $config['per_page'];
			$this->pagination->initialize($config);

			$code_results = $this->codekind_manage_model->get_codekind_list($dataStart, $dataLen, $filter, "mod_code");
			$codekind_name = $this->codekind_manage_model->get_codekind_name($codekind_key);
			
			$vars['codekind_key'] = $codekind_key;
			$vars['code_id'] = $code_id;
			$vars['code_lang'] = $code_lang;

			$vars['codekind_name'] = $codekind_name;
			$vars['page_jump'] = $this->pagination->create_links();
			$vars['multi_update_multi_order_url'] = $base_url.'fuel/codekind/do_update_order';
			$vars['edit_url'] = $base_url.'fuel/code/edit/';
			$vars['del_url'] = $base_url.'fuel/code/del/';
			$vars['multi_del_url'] = $base_url.'fuel/code/do_multi_del';
			$vars['back_url'] = $base_url.'fuel/codekind/lists';
			$vars['level_url'] = $base_url.'fuel/code/lists?codekind_key='.$codekind_key.'&code_id=';
			$vars['code_results'] = $code_results;
			$vars['total_rows'] = $total_rows;
			$vars['CI'] = & get_instance();

			$this->fuel->admin->render('_admin/code_lists_view', $vars);
		}
		else
		{
			show_404();
		}

	}

	function create()
	{
		$vars['form_action'] = base_url().'fuel/codekind/do_create';
		$vars['form_method'] = 'POST';
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);		

		$vars['module_uri'] = base_url().$this->module_uri;
		$vars['view_name'] = "新增分類";
		$this->fuel->admin->render("_admin/codekind_create_view", $vars);
	}

	function do_create()
	{
		$module_uri = base_url().$this->module_uri;
		$insert_data = array();
		$insert_data['codekind_name'] = $this->input->get_post("codekind_name");
		$insert_data['codekind_desc'] = $this->input->get_post("codekind_desc");
		$insert_data['codekind_key'] = $this->input->get_post("codekind_key");
		$insert_data['codekind_value1'] = $this->input->get_post("codekind_value1");
		$insert_data['codekind_value2'] = $this->input->get_post("codekind_value2");
		$insert_data['codekind_value3'] = $this->input->get_post("codekind_value3");
		$insert_data['lang_code'] = $this->input->get_post("lang_code");

		$success = $this->codekind_manage_model->insert($insert_data);

		if($success)
		{
			$this->plu_redirect($module_uri, 0, "新增成功");
			die();
		}
		else
		{
			$this->plu_redirect($module_uri, 0, "新增失敗");
			die();
		}

		return;
	}

	function code_create()
	{
		$codekind_key = $this->input->get_post("codekind_key");
		$code_id = $this->input->get_post("code_id");
		$code_lang = $this->input->get_post("code_lang");

		$filter = " WHERE parent_id in ( select parent_id from mod_code where code_id = '$code_id' ) ";
		$codekind_results = $this->codekind_manage_model->get_codekind_list(0, 9999999, "");
		$code_list = $this->codekind_manage_model->get_codekind_list(0, 9999999, $filter, "mod_code");

		if(!empty($codekind_key) && !empty($code_id))
		{
			$vars['module_uri'] = base_url()."fuel/code/lists?codekind_key=".$codekind_key."&code_id=".$code_id;
			$vars['code_key']	= $this->codekind_manage_model->get_code_key($code_id);
			$vars['code_key_num'] = $this->codekind_manage_model->get_code_child_key_num($code_id);
		}
		else if(!empty($codekind_key))
		{
			$vars['module_uri'] = base_url()."fuel/code/lists?codekind_key=".$codekind_key;
		}
		else
		{
			$vars['module_uri'] = base_url()."fuel/codekind/lists";
		}


		$lang = $this->codekind_manage_model->get_code_list_for_other_mod("LANG_CODE");
		$vars['lang'] = $lang;

		$vars['codekind_key'] = $codekind_key;
		$vars['code_id'] = $code_id;
		$vars['code_lang'] = $code_lang;

		$vars['form_action'] = base_url().'fuel/code/do_create';
		$vars['form_method'] = 'POST';
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);
		
		$vars['view_name'] = "新增分類";
		$vars['codekind_results'] = $codekind_results;
		$vars['code_list'] = $code_list;
		$this->fuel->admin->render("_admin/code_create_view", $vars);
	}

	function do_code_create()
	{ 
		$post_arr = $this->input->post();
		$root_path = assets_server_path('code_img/'.$post_arr['code_key']."/".$post_arr['lang_code']."/");
		if (!file_exists($root_path)) {
		    mkdir($root_path, 0777, true);
		}
		 
		$module_uri = base_url().$this->module_uri;
		 
		$post_arr = $this->input->post();
		$config['upload_path'] = $root_path;
		$config['allowed_types'] = 'png';
		$config['max_size']	= '9999';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload',$config); 

	 	// $name = 'news_img/'.$post_arr['type']."/".$post_arr['title'].".png"; 
	 	$redirect_uri = base_url()."fuel/code/lists?codekind_key=".$post_arr['codekind_key']."&code_id=".$post_arr['parent_id'];

        if ($this->upload->do_upload('img'))
		{

			// $insert_data = array();
			// $insert_data['code_name'] 		= $this->input->get_post("code_name");
			// $insert_data['code_key'] 		= $this->input->get_post("code_key");
			// $insert_data['code_value1'] 	= $this->input->get_post("code_value1");
			// $insert_data['code_value2'] 	= $this->input->get_post("code_value2");
			// $insert_data['code_value3'] 	= $this->input->get_post("code_value3");
			// $insert_data['lang_code'] 		= $this->input->get_post("lang_code");
			// $insert_data['codekind_key'] 	= $this->input->get_post("codekind_key");
			// $insert_data['parent_id'] 		= $this->input->get_post("parent_id");
			$data = array('upload_data'=>$this->upload->data()); 
			$post_arr["img"] = 'code_img/'.$post_arr['code_key']."/".$post_arr['lang_code']."/".$data["upload_data"]["file_name"];
			
		 
		} else{
			$post_arr["img"] = '';
		}

		$success = $this->codekind_manage_model->code_insert($post_arr); 
		if($success)
		{
			$this->plu_redirect($redirect_uri, 0, "新增成功");
			die();
		}
		else
		{
			$this->plu_redirect($redirect_uri, 0, "新增失敗");
			die();
		}
 
		 

		return;
	}

	function edit($codekind_id)
	{
		if(isset($codekind_id))
		{
			$codekind_result = $this->codekind_manage_model->get_codekind_detail($codekind_id);
		}

		$vars['form_action'] = base_url().'fuel/codekind/do_edit/'.$codekind_id;
		$vars['form_method'] = 'POST';
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);	

		$vars['module_uri'] = base_url().$this->module_uri;
		$vars["ck_result"] = $codekind_result;
		$vars["view_name"] = "修改分類";
		$this->fuel->admin->render('_admin/codekind_edit_view', $vars);
	}

	function do_edit($codekind_id)
	{
		$module_uri = base_url().$this->module_uri;
		if(!empty($codekind_id))
		{
			$update_data = array();
			$update_data['codekind_name'] = $this->input->get_post("codekind_name");
			$update_data['codekind_desc'] = $this->input->get_post("codekind_desc");
			$update_data['codekind_key'] = $this->input->get_post("codekind_key");
			$update_data['codekind_value1'] = $this->input->get_post("codekind_value1");
			$update_data['codekind_value2'] = $this->input->get_post("codekind_value2");
			$update_data['codekind_value3'] = $this->input->get_post("codekind_value3");
			$update_data['lang_code'] = $this->input->get_post("lang_code");

			$success = $this->codekind_manage_model->update($codekind_id, $update_data);

			if($success)
			{
				$this->plu_redirect($module_uri, 0, "更新成功");
				die();
			}
			else
			{
				$this->plu_redirect($module_uri, 0, "更新失敗");
				die();
			}
		}
		else
		{
			$this->plu_redirect($module_uri, 0, "更新失敗");
			die();
		}

		return;
	}

	function code_edit($code_id)
	{
		if(isset($code_id))
		{
			$codekind_key = $this->input->get_post("codekind_key");
			if(!empty($codekind_key) && !empty($code_id))
			{
				$vars['module_uri'] = base_url()."fuel/code/lists?codekind_key=".$codekind_key."&code_id=".$code_id;
			}
			else if(!empty($codekind_key))
			{
				$vars['module_uri'] = base_url()."fuel/code/lists?codekind_key=".$codekind_key;
			}
			else
			{
				$vars['module_uri'] = base_url()."fuel/codekind/lists";
			}			

			$filter = " WHERE parent_id=-1 ";
			$codekind_results = $this->codekind_manage_model->get_codekind_list(0, 9999999, "");
			$code_list = $this->codekind_manage_model->get_codekind_list(0, 9999999, $filter, "mod_code");
			$code_result = $this->codekind_manage_model->get_code_detail($code_id);

			$lang = $this->codekind_manage_model->get_code_list_for_other_mod("LANG_CODE");
			$vars['lang'] = $lang;

			$vars['form_action'] = base_url().'fuel/code/do_edit/'.$code_id;
			$vars['form_method'] = 'POST';
			$crumbs = array($this->module_uri => $this->module_name);
			$this->fuel->admin->set_titlebar($crumbs);	

			$vars['code_list'] = $code_list;
			$vars["code_result"] = $code_result;
			$vars["codekind_results"] = $codekind_results;
			$vars["view_name"] = "修改分類";
			$this->fuel->admin->render('_admin/code_edit_view', $vars);		
		}
		else
		{
			show_404();
		}

		return;
	}

	function do_code_edit($code_id)
	{
		$module_uri = base_url().$this->module_uri;
		if(!empty($code_id))
		{
			

			$post_arr = $this->input->post();
			$root_path = assets_server_path('code_img/'.$post_arr['code_key']."/".$post_arr['lang_code']."/");
			if (!file_exists($root_path)) {
			    mkdir($root_path, 0777, true);
			}
		 
			 
			$post_arr = $this->input->post();
			$config['upload_path'] = $root_path;
			$config['allowed_types'] = 'png';
			$config['max_size']	= '9999';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

			$this->load->library('upload',$config); 

		 	// $name = 'news_img/'.$post_arr['type']."/".$post_arr['title'].".png"; 
		 	$redirect_uri = base_url()."fuel/code/lists?codekind_key=".$post_arr['codekind_key']."&code_id=".$post_arr['parent_id'];

	        if ($this->upload->do_upload('img'))
			{
				$data = array('upload_data'=>$this->upload->data()); 
				$post_arr["img"] = 'code_img/'.$post_arr['code_key'].'/'.$post_arr['lang_code'].'/'.$data["upload_data"]["file_name"];
			}else{
				$post_arr["img"] = $post_arr["exist_img"];	
			}
		
			// $update_data = array();
			// $update_data['code_name'] 		= $this->input->get_post("code_name");
			// $update_data['code_key'] 		= $this->input->get_post("code_key");
			// $update_data['code_value1'] 	= $this->input->get_post("code_value1");
			// $update_data['code_value2'] 	= $this->input->get_post("code_value2");
			// $update_data['code_value3'] 	= $this->input->get_post("code_value3");
			// $update_data['lang_code'] 		= $this->input->get_post("lang_code");
			// $update_data['codekind_key'] 	= $this->input->get_post("codekind_key");
			// $update_data['parent_id'] 		= $this->input->get_post("parent_id");

			$success = $this->codekind_manage_model->code_update($code_id, $post_arr);
			 
			if($success)
			{
				$this->plu_redirect($redirect_uri, 0, "更新成功");
				die();
			}
			else
			{
				$this->plu_redirect($redirect_uri, 0, "更新失敗");
				die();
			}
		}
		else
		{
			$this->plu_redirect($module_uri, 0, "更新失敗");
			die();
		}

		return;
	}

	function do_code_del($code_id)
	{
		$response = array();
		if(!empty($code_id))
		{
			$success = $this->codekind_manage_model->code_del($code_id);

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

	function do_multi_upadate_order()
	{
		$result = array();

		$ids = $this->input->get_post('ids');
		// $ids = $this->input->post();
		// $ids = json_decode($ids);


		if($ids)
		{
			// $im_ids = implode(",", $ids);
			// $result['im_ids'] = $im_ids;
			// $ids = json_decode($ids,true);
			foreach ($ids as $key) {
				$this->do_upadate_order($key['id'],$key['order']);
				// $result['key'] = $key['id'];
			}
			$success = true;
			// $success = $this->news_manage_model->do_multi_del($im_ids);
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
			$result['status'] = 0;
		}

		// $result['status'] = $ids;

		if(is_ajax())
		{
			echo json_encode($result);
		}
	}

	function do_upadate_order($id,$order)
	{
		// $response = array();
		if(!empty($id))
		{
			// $success = 
			$this->codekind_manage_model->upadate_order($id,$order);

			// if($success)
			// {
			// 	$response['status'] = 1;
			// }
			// else
			// {
			// 	$response['status'] = -1;
			// }
		}
		// else
		// {
		// 	$response['status'] = -1;
		// }

		// echo json_encode($response);
	}

	function do_del($codekind_id)
	{
		$response = array();
		if(!empty($codekind_id))
		{
			$success = $this->codekind_manage_model->del($codekind_id);

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

	function plu_redirect($url, $delay, $msg)
	{
	    if( isset($msg) )
	    {
	        $this->notify($msg);
	    }

	    echo "<meta http-equiv='Refresh' content='$delay; url=$url'>";
	}

	function notify($msg)
	{
	    $msg = addslashes($msg);
	    echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
	    echo "<script type='text/javascript'>alert('$msg')</script>\n";
	    echo "<noscript>$msg</noscript>\n";
	    return;
	}

}