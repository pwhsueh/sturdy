<?php
class News_front extends CI_Controller {

	function __construct()
	{
		parent::__construct(); 
		$this->load->model('code_model'); 
	} 

	function index()
	{	
		$lang_code = $this->uri->segment(1);
		$vars['views'] = 'news';		    
		$vars['css'] = site_url()."assets/templates/css/news.css";
		$news_list = $this->code_model->get_news_list(47,$lang_code); 
		$vars['news_list'] =  $news_list;

		$this->fuel->pages->render("index",$vars);
	}

	 
	
}