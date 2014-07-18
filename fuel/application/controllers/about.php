<?php
class About extends CI_Controller {

	function __construct()
	{
		parent::__construct(); 
	}


	function index()
	{	
		$vars['views'] = 'about';		    
		$vars['css'] = site_url()."assets/templates/css/about.css";
		$this->fuel->pages->render('about',$vars);
	}

	 
	
}