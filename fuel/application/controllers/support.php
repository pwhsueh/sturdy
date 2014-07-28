<?php
class Support extends CI_Controller {

	function __construct()
	{
		parent::__construct(); 
		$this->load->model('code_model'); 
	} 

	function index()
	{	
		$lang_code = $this->uri->segment(1);
		$vars['views'] = 'support';		    
		$vars['css'] = site_url()."assets/templates/css/supports.css";

		$cd = $this->code_model->get_support('CD',$lang_code);
		$umd = $this->code_model->get_support('UMD',$lang_code);



		$vars['cd'] = $cd;
		$vars['umd'] = $umd;

		$vars['cd_list'] = $this->code_model->get_support_list($cd->code_id);
		$vars['umd_list'] = $this->code_model->get_support_list($umd->code_id);

		// $vars['account'] = $umd;
		// $vars['password'] = $umd;

		// print_r($var);
		// die;


		$this->fuel->pages->render("index",$vars);
	}

	 
	
}