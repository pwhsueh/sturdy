<?php
class Series extends CI_Controller {

	function __construct()
	{
		parent::__construct(); 
		$this->load->model('code_model');
	}


	function index()
	{	
		$lang_code = $this->uri->segment(1);
		$series = $this->input->get("series");
		$sub_nav = $this->input->get("sub_nav");
		$title = $this->input->get("title");
		// $lang_code = $this->input->get("lang_code");

		$vars['views'] = 'series';		    
		$vars['css'] = site_url()."assets/templates/css/series.css";

		$series_info = $this->code_model->get_series_info($sub_nav); 
		$series_sub_nav = $this->code_model->get_series_sub_detail($series_info->code_id);

		

		if ($title == -1) {// 1層
			 
		} else{//2層 or 3層
			$series_sub_info = $this->code_model->get_series_info($title); 
			$series_title = $this->code_model->get_series_sub_detail($series_sub_info->code_id);
			if (!isset($series_title)) {//2層
				$vars['series_title'] = $series_sub_nav;	
			}else{
				$vars['series_sub_nav'] = $series_sub_nav;	
				$vars['series_title'] = $series_title;	
			}
		}

		$vars['series_info'] = $series_info;


		$vars['series'] = $series;	
		$vars['sub_nav'] = $sub_nav;	
		$vars['title'] = $title;	
		// print_r($series_info);
		// die;	
		$this->fuel->pages->render("index",$vars);
	}

	function product($id){
		$lang_code = $this->uri->segment(1);
		$product = $this->code_model->get_product($id);
		// print_r($product);
		$series_ary = explode(';',$product->level_id);
		// print_r($series_ary);
		$series = $this->code_model->get_series_info($series_ary[0]);
		 
		$vars['views'] = 'product';		   
		$vars['product'] = $product;		   
		$vars['series'] = $series;	     
		$vars['css'] = site_url()."assets/templates/css/product_page.css";
		$this->fuel->pages->render("index",$vars);
	}

	 
	
}