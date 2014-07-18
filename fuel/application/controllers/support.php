<?php
class Support extends CI_Controller {

	function __construct()
	{
		parent::__construct(); 
	} 

	function index()
	{	
		$vars['views'] = 'support';		    
		$vars['css'] = site_url()."assets/templates/css/supports.css";
		$this->fuel->pages->render('support',$vars);
	}

	 
	
}