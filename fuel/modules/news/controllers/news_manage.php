<?php
require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class News_manage extends Fuel_base_controller {
	public $view_location = 'news';
	public $nav_selected = 'news/manage';
	public $module_name = 'news manage';
	public $module_uri = 'fuel/news/lists';
	function __construct()
	{
		parent::__construct();
		$this->_validate_user('news/manage');
		$this->load->module_model(NEWS_FOLDER, 'news_manage_model');
		$this->load->module_model(CODEKIND_FOLDER, 'codekind_manage_model');
		$this->load->helper('ajax');
		$this->load->library('pagination');
		$this->load->library('set_page');
	}
	
	function lists($dataStart=0)
	{
		$base_url = base_url();

		$search_type = $this->input->get_post("search_type"); 
		
		$filter = " WHERE 1=1  ";
 

		if (!empty($search_type)) {
			$filter .= " AND type = '$search_type'";
		}
  
		
		$target_url = $base_url.'fuel/news/lists/';

		$total_rows = $this->news_manage_model->get_total_rows($filter);
		$config = $this->set_page->set_config($target_url, $total_rows, $dataStart, 20);
		$dataLen = $config['per_page'];
		$this->pagination->initialize($config); 

		$results = $this->news_manage_model->get_news_list($dataStart, $dataLen,$filter);

		$type = $this->codekind_manage_model->get_code_list_for_other_mod("NEWSTYPE");
		$vars['type'] = $type;
		$vars['search_type'] = $search_type;
		$vars['total_rows'] = $total_rows;
		$vars['type'] = $type; 
		$vars['form_action'] = $base_url.'fuel/news/lists';
		$vars['form_method'] = 'POST';
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);

		$vars['page_jump'] = $this->pagination->create_links();
		$vars['create_url'] = $base_url.'fuel/news/create';
		$vars['edit_url'] = $base_url.'fuel/news/edit/';
		$vars['del_url'] = $base_url.'fuel/news/del/';
		$vars['multi_del_url'] = $base_url.'fuel/news/do_multi_del';
		$vars['results'] = $results;
		$vars['total_rows'] = $total_rows; 
		$vars['CI'] = & get_instance();

		$this->fuel->admin->render('_admin/news_lists_view', $vars);

	}

 
	function create()
	{
		$vars['form_action'] = base_url().'fuel/news/do_create';
		$vars['form_method'] = 'POST';
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);		

		$vars['module_uri'] = base_url().$this->module_uri;
		$vars['view_name'] = "新增";

		$type = $this->codekind_manage_model->get_code_list_for_other_mod("NEWSTYPE");
		$vars['type'] = $type;
 

		$this->fuel->admin->render("_admin/news_create_view", $vars);
	}

	function do_create()
	{
		$post_arr = $this->input->post();
		$root_path = assets_server_path('news_img/'.$post_arr['type']."/");
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

        if ($this->upload->do_upload('img'))
		{
			$data = array('upload_data'=>$this->upload->data()); 
			$post_arr["img"] = 'news_img/'.$post_arr['type']."/".$data["upload_data"]["file_name"];
			$success = $this->news_manage_model->insert($post_arr);
			$success = true;
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
		 
		} else{ 
			$this->notify($this->upload->display_errors());
			$this->plu_redirect($module_uri, 0, "新增失敗");
			die();
				 
		} 
		return;
	}

	 
	function edit()
	{
		$account = $this->input->get("account");
		if(isset($account))
		{
			$result = $this->resume_manage_model->get_resume_detail($account);
		}

		$vars['form_action'] = base_url().'fuel/resume/do_edit?account='.$account;
		$vars['form_method'] = 'POST';
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);	
 

		$job_state = $this->codekind_manage_model->get_code_list_for_other_mod("job_state");
		$vars['job_state'] = $job_state;

		$job_cate = $this->codekind_manage_model->get_code_list_for_other_mod("job_cate");
		$vars['job_cate'] = $job_cate;

		$city = $this->codekind_manage_model->get_code_list_for_other_mod("city");
		$vars['city'] = $city;

		$place = $this->codekind_manage_model->get_code_list_for_other_mod("city");
		$placeOrdered = array();

		foreach ($place as $key) {
			 $value = $this->codekind_manage_model->get_code_detail_by_parent_id($key->code_id);
			 array_push($placeOrdered, $key);
			 foreach ($value as $key2) {
			 	array_push($placeOrdered, $key2);
			 }
		}
		$vars['place'] = $placeOrdered;

		$skill = $this->resume_manage_model->get_resume_skill($account);		
		$vars["skill"] = $skill;

		$school = $this->resume_manage_model->get_resume_school($account);		
		$vars["school"] = $school;


		$exp = $this->resume_manage_model->get_resume_exp($account);		
		$vars["exp"] = $exp;
	 

		$vars['module_uri'] = base_url().$this->module_uri;
		$vars["result"] = $result;
		$vars["view_name"] = "修改履歷";
		$this->fuel->admin->render('_admin/resume_edit_view', $vars);
	}

	function do_edit()
	{
		$account = $this->input->get("account");
		$module_uri = base_url().$this->module_uri;
		if(!empty($account))
		{
			$update_data = array();
			$update_data['account'] = $this->input->get_post("account");
			$password = $this->input->get_post("password");
			if (!empty($password)) {
				$update_data['password'] = $this->input->get_post("password");	
			}
			$update_data['name'] = $this->input->get_post("name");
			$update_data['birth'] = $this->input->get_post("birth");
			$update_data['contact_tel'] = $this->input->get_post("contact_tel");
			$update_data['contact_mail'] = $this->input->get_post("contact_mail");
			$update_data['address_zip'] = $this->input->get_post("address_zip");
			$update_data['address_city'] = $this->input->get_post("address_city");
			$update_data['address_area'] = $this->input->get_post("address_area");
			$update_data['address'] = $this->input->get_post("address");
			$update_data['job_status'] = $this->input->get_post("job_status");
			$update_data['about_self'] = $this->input->get_post("about_self");
			$exclude_cate = $this->input->get_post("exclude_cate");
			if (is_array($exclude_cate)  && sizeof($exclude_cate)>0) { 
				 $update_data['exclude_cate'] = implode(";",$exclude_cate );
			}else{
				$update_data['exclude_cate'] = "";
			}
			$place = $this->input->get_post("place");
			if (is_array($place)  && sizeof($place)>0) {
				 $update_data['job_location'] = implode(";",$place);
			} else{
				$update_data['job_location'] = "";
			}
			$update_data['fb_account'] = $this->input->get_post("fb_account");

			$success = $this->resume_manage_model->update($update_data);

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

	function do_multi_del(){
		$result = array();

		$ids = $this->input->get_post("ids");


		if($ids)
		{
			$im_ids = implode(",", $ids);
			// $result['im_ids'] = $im_ids;

			$success = $this->news_manage_model->do_multi_del($im_ids);
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
			$success = $this->news_manage_model->del($id);

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