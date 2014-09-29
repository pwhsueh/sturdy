<?php
require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class Country_manage extends Fuel_base_controller {
	public $view_location = 'country';
	public $nav_selected = 'country/manage';
	public $module_name = 'country manage';
	public $module_uri = 'fuel/country/lists';
	function __construct()
	{
		parent::__construct();
		$this->_validate_user('country/manage');
		$this->load->module_model(COUNTRY_FOLDER, 'country_manage_model');
		$this->load->helper('ajax');
		$this->load->library('pagination');
		$this->load->library('set_page');
	}
	
	function lists($dataStart=0)
	{
		$base_url = base_url();

		$search_name = $this->input->get_post("search_name");
		$search_email = $this->input->get_post("search_email"); 
		
		$filter = " WHERE 1=1  "; 
 
		if ($search_name != "") {
			$filter .= " AND name like '%$search_name%'"; 
			$this->session->set_userdata('search_name', $search_name);
		}else{
			if (!isset($search_name) ) {
				$search_name = $this->session->userdata('search_name'); 
				if ($search_name != "") {
					$search_name = $search_name;
					$filter .= " AND name like '%$search_name%'"; 
				} 
			}else{
				$this->session->set_userdata('search_name', "");
			}					
		}


		if ($search_email != "") {
			$filter .= " AND email like '%$search_email%'"; 
			$this->session->set_userdata('search_email', $search_email);
		}else{
			if (!isset($search_email) ) {
				$search_email = $this->session->userdata('search_email'); 
				if ($search_email != "") {
					$search_email = $search_email;
					$filter .= " AND email like '%$search_email%'"; 
				} 
			}else{
				$this->session->set_userdata('search_email', "");
			}					
		}

		$vars['search_name'] = $search_name;
		$vars['search_email'] = $search_email;

		
		$target_url = $base_url.'fuel/country/lists/';

		$total_rows = $this->country_manage_model->get_total_rows($filter);
		$config = $this->set_page->set_config($target_url, $total_rows, $dataStart, 20);
		$dataLen = $config['per_page'];
		$this->pagination->initialize($config);

		$results = $this->country_manage_model->get_country_list($dataStart, $dataLen,$filter); 

		$vars['form_action'] = $base_url.'fuel/country/lists';
		$vars['form_method'] = 'POST';
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);

		$vars['results'] = $results;
		$vars['page_jump'] = $this->pagination->create_links();
		$vars['create_url'] = $base_url.'fuel/country/create';
		$vars['edit_url'] = $base_url.'fuel/country/edit/';
		$vars['del_url'] = $base_url.'fuel/country/del/';
		$vars['multi_del_url'] = $base_url.'fuel/country/do_multi_del';
		// $vars['codekind_results'] = $codekind_results;
		$vars['total_rows'] = $total_rows;
		$vars['search_url'] = $base_url.'fuel/country/lists';
		$vars['level_url'] = $base_url.'fuel/country/lists?codekind_key=';
		$vars['CI'] = & get_instance();

		$this->fuel->admin->render('_admin/country_lists_view', $vars);

	} 

	function create()
	{
		$vars['form_action'] = base_url().'fuel/country/do_create';
		$vars['form_method'] = 'POST';
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);		

		$vars['country'] = $this->country_manage_model->get_country();

		$vars['module_uri'] = base_url().$this->module_uri;
		$vars['view_name'] = "新增區域管理員";
		$this->fuel->admin->render("_admin/country_create_view", $vars);
	}

	function do_create()
	{
		$module_uri = base_url().$this->module_uri;
		$insert_data = array();
		$insert_data['email'] = $this->input->get_post("email");
		$insert_data['name'] = $this->input->get_post("name");
		$country_ary = $this->input->get_post("country");
		$country_str = ''; 
		// print_r($country_ary);
		
		foreach ($country_ary as $key) {
            $country_str .= $key.';';
        }

        if('' == $country_str)
		{
			$this->plu_redirect($module_uri, 0, "請至少選擇一筆國家");
			die();
		}
        // echo trim($country_str,';');
        // die;
		$insert_data['country_id'] = ';'.trim($country_str,';').';';
		 

		$success = $this->country_manage_model->insert($insert_data);

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

	 

	function edit($id)
	{
		$row;
		if(isset($id))
		{
			$row = $this->country_manage_model->get_country_by_id($id);
		}else{
			$this->plu_redirect($module_uri, 0, "找不到區域管理員");
			die();
		}
// print_r($row->country_id);
// 		die;
		$country_ary = explode(";", $row->country_id);
		$country_str = '';
		// print_r($country_ary);
		// die;
		foreach ($country_ary as $key) {
			if('' == $key)
				continue;
            $country_str .= "'".$key."',";
        }

        $country_str = trim($country_str,',');
        // echo($country_str);
        // die;
        $vars['row'] = $row;
		$vars['country'] = $this->country_manage_model->get_country(" AND code_id not in ($country_str)");
		$vars['country2'] = $this->country_manage_model->get_country(" AND code_id in ($country_str)");

		$vars['form_action'] = base_url().'fuel/country/do_edit/'.$id;
		$vars['form_method'] = 'POST';
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);	

		$vars['module_uri'] = base_url().$this->module_uri;
		$vars["row"] = $row;
		$vars["view_name"] = "修改區域管理員";
		$this->fuel->admin->render('_admin/country_edit_view', $vars);
	}

	function do_edit($id)
	{
		$module_uri = base_url().$this->module_uri;
		if($id != '')
		{
			$update_data = array();
			$update_data['id'] = $id;
			$update_data['name'] = $this->input->get_post("name");
			$update_data['email'] = $this->input->get_post("email");

			$country_ary = $this->input->get_post("country");
			$country_str = ''; 
			// print_r($country_ary);
			// die;
			foreach ($country_ary as $key) {
	            $country_str .= $key.';';
	        }
   // echo trim($country_str,';');
	        // die;
	        if('' == $country_str)
			{
				$this->plu_redirect($module_uri, 0, "請至少選擇一筆國家");
				die();
			}
	        // echo trim($country_str,';');
	        // die;
			$update_data['country_id'] = ';'.trim($country_str,';').';';
		 

			$success = $this->country_manage_model->update($update_data);

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

	 

	function do_del($id)
	{
		$response = array();
		if(!empty($id))
		{
			$success = $this->country_manage_model->del($id);

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