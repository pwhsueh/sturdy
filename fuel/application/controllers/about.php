<?php
class About extends CI_Controller {

	function __construct()
	{
		parent::__construct(); 
		$this->load->model('code_model'); 
	}


	function index()
	{	
		$lang_code = $this->uri->segment(1);
		$vars['views'] = 'about';		    
		$vars['css'] = site_url()."assets/templates/css/about.css";
		// $vars['views_path'] = 'zh-TW';
		// $this->fuel->pages->render("about",$vars);
		$this->fuel->pages->render("index",$vars);
		// print_r($this->fuel->pages->render("zh-TW/about",$vars));
		// die;
	}

	 
	
}