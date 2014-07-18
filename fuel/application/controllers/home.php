<?php
class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct(); 
	}

	function home() 
	{
		parent::Controller();

	} 

	function index()
	{	
		  
		$vars['views'] = 'home';
		$vars['css'] = site_url()."assets/templates/css/index.css";
 
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'home');
		$this->fuel->pages->render('home', $vars);
	 
	}
	
	 
}