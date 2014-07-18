<?php
class News_front extends CI_Controller {

	function __construct()
	{
		parent::__construct(); 
	} 

	function index()
	{	
		$vars['views'] = 'news';		    
		$vars['css'] = site_url()."assets/templates/css/news.css";
		$this->fuel->pages->render('news',$vars);
	}

	 
	
}