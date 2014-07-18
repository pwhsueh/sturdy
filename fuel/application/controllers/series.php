<?php
class Series extends CI_Controller {

	function __construct()
	{
		parent::__construct(); 
		$this->load->model('code_model');
	}


	function index()
	{	
		$series = $this->input->get("series");
		$sub_nav = $this->input->get("sub_nav");
		$title = $this->input->get("title");

		$vars['views'] = 'series';		    
		$vars['css'] = site_url()."assets/templates/css/series.css";
		$series_info = $this->code_model->get_series_info($series,$sub_nav);
		$series_sub_nav = $this->code_model->get_series_detail($series,$sub_nav);
		$series_title = $this->code_model->get_series_detail($series,$title);
		$vars['series_sub_nav'] = $series_sub_nav;	
		$vars['series_title'] = $series_title;	
		$vars['series'] = $series;	
		$vars['sub_nav'] = $sub_nav;	
		$vars['title'] = $title;	
		$vars['series_info'] = $series_info;	
		$this->fuel->pages->render('series',$vars);
	}

	function product(){
		$vars['views'] = 'product';		    
		$vars['css'] = site_url()."assets/templates/css/product_page.css";
		$this->fuel->pages->render('product',$vars);
	}

	 
	
}