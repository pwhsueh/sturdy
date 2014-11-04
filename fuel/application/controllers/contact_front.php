<?php
class Contact_front extends CI_Controller {

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
		$country = $this->code_model->get_country();
		$vars['country'] = $country;	
		// print_r($country);
		// die;	
		$vars['views'] = 'contact';		    
		$vars['css'] = site_url()."assets/templates/css/contact.css";
		$this->fuel->pages->render("index",$vars);
	}

	function do_add()
	{	
		$post_ary = $this->input->post();
		$lang_code = $this->uri->segment(1); 
		foreach ($post_ary as $key => $value) {
			 if (is_array($value)) {
			 	 $post_ary[$key] = implode(",", $value);
			 	// echo "$key<br/>";
			 }
// 			 else{
// // echo "$key<br/>";
// 			 }
		}
		// echo fuel_block('contact_content');
		// die;
		// print_r($post_ary);
		// die;
		$post_ary['lang'] = $lang_code;
		$result = $this->code_model->insert_mod_contact($post_ary);
		$lang_info = $this->code_model->get_code_info('LANG_CODE',$lang_code);

		$country = $post_ary['country'];
		$managers = $this->code_model->get_country_info($country);
		// print_r($country);
		// print_r($managers);
		// die;
		if (isset($managers)) {
			foreach ($managers as $row) {
			$email = $row->email; 

			$this->email->from('service@sturdy.com.tw', 'contact');
			$this->email->to($email); 

			$this->email->subject('contact');
			$this->email->message(fuel_block('contact_content'));

			
			$success = $this->email->send();
		}
		}
		


		

		if($result){ 
			// echo 1;
			// die;
			$this->comm->plu_redirect(site_url($lang_code)."/Contact_front", 0, "填寫完成");
		}else{
			// echo 2;
			// die;
			$this->comm->plu_redirect(site_url($lang_code)."/Contact_front", 0, "發生異常錯誤。請聯絡管理人員");
		}
	}
	 
	
}