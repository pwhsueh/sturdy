<?php
class Contact extends CI_Controller {

	function __construct()
	{
		parent::__construct(); 
	}


	function index()
	{	
		$vars['views'] = 'contact';		    
		$vars['css'] = site_url()."assets/templates/css/contact.css";
		$this->fuel->pages->render('contact',$vars);
	}

	 
	
}