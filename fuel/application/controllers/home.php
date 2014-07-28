<?php
class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct(); 
		$this->load->model('code_model');  
		
		$this->load->library('comm');
	}

	function home() 
	{
		parent::Controller(); 
	} 

	// function index($lang_code){
	// 	echo $lang_code;
	// 	die;
	// 	return;
	// }

	function index()
	{	
		// $lang_code = $this->input->get("lang_code");
		$lang_code = $this->uri->segment(1);
		// print_r( $lang_code);
		// die;
		$vars['views'] = 'home';
		$vars['css'] = site_url()."assets/templates/css/index.css";
 		$index_list = $this->code_model->get_news_list(46,$lang_code); 
 		$vars['index_list'] = $index_list;
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'home');
		// print_r($vars);
		// die;
		$this->fuel->pages->render("index", $vars);
	 
	}
	
	 
}