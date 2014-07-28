<?php
class Contact extends CI_Controller {

	function __construct()
	{
		parent::__construct(); 
		$this->load->model('code_model'); 
		$this->load->library('comm');
		$this->load->library('email');
	}


	function index()
	{			
		$lang_code = $this->uri->segment(1); 
		$vars['views'] = 'contact';		    
		$vars['css'] = site_url()."assets/templates/css/contact.css";
		$this->fuel->pages->render("index",$vars);
	}

	function do_add()
	{	
		$post_ary = $this->input->post();
		$lang_code = $this->uri->segment(1); 
		// print_r($post_ary);
		// die;
		$post_ary['lang'] = $lang_code;
		$result = $this->code_model->insert_mod_contact($post_ary);
		$lang_info = $this->code_model->get_code_info('LANG_CODE',$lang_code);
		$email = $lang_info[0]->code_value1;


		$this->email->from('service@mail.9icase.com', 'contact');
		$this->email->to($email); 

		$this->email->subject('contact');
		$this->email->message('使用者發問');

		
		$success = $this->email->send();

		if($result){ 
			// echo 1;
			// die;
			$this->comm->plu_redirect(site_url($lang_code)."/contact", 0, "填寫完成");
		}else{
			// echo 2;
			// die;
			$this->comm->plu_redirect(site_url($lang_code)."/contact", 0, "發生異常錯誤。請聯絡管理人員");
		}
	}
	 
	
}