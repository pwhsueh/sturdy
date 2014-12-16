<?php
class Contact_front extends CI_Controller {

	function __construct()
	{
		parent::__construct(); 
		$this->load->model('code_model'); 
		$this->load->library('comm');
		$this->load->library('email');
	}


	function index()
	{			
		$lang_code = $this->uri->segment(1); 
		$country = $this->code_model->get_country();
		$vars['country'] = $country;	
		// print_r($country);
		// die;	
		$vars['views'] = 'contact';		    
		$vars['css'] = site_url()."assets/templates/css/contact.css";
		$this->fuel->pages->render("index",$vars);
	}

	function do_add()
	{	
		$post_ary = $this->input->post();
		$lang_code = $this->uri->segment(1); 
		foreach ($post_ary as $key => $value) {
			 if (is_array($value)) {
			 	 $post_ary[$key] = implode(",", $value);
			 	// echo "$key<br/>";
			 }
// 			 else{
// // echo "$key<br/>";
// 			 }
		}
		// echo fuel_block('contact_content');
		// die;
		// print_r($post_ary);
		// die;
		$post_ary['lang'] = $lang_code;
		$result = $this->code_model->insert_mod_contact($post_ary);
		$lang_info = $this->code_model->get_code_info('LANG_CODE',$lang_code);

		$country = $post_ary['country'];
		$managers = $this->code_model->get_country_info($country);
		// print_r($country);
		// print_r($managers);
		// die;
		// $country_id = $_POST["country"];
		$country_info = $this->code_model->get_code_info('COUNTRY','zh-TW',-1," code_id = '$country' ");
		$country_name = '';
		if (isset($country_info) && sizeof($country_info) > 0) {
			$country_name = $country_info[0]->code_name;
		}

		$subject = "CONTACT US FROM WEBSITE"; //信件標題 
		// $msg =  "Company Name"."  ".$_POST["com_name"]."<br/>".
		// 		"Address"."  ".$_POST["address"]."<br/>".
		// 		"Contact Person"."  ".$_POST["contact_person"]."<br/>".
		// 		"Country"."  ".$_POST["country"]."<br/>".
		// 		"Telephone"."  ".$_POST["tel"]."<br/>".
		// 		"Fax"."  ".$_POST["fax"]."<br/>".
		// 		"E-mail"."  ".$_POST["email"]."<br/>".
		// 		"Website"."  ".$_POST["website"]."<br/>".
		// 		"Company Type"."  ".$_POST["comtype"]."<br/>".
		// 		"Employee"."  ".$_POST["employeenum"]."<br/>".
		// 		"Engineer / Technician"."  ".$_POST["engineer"]."<br/>".
		// 		"Sales Type"."  ".$_POST["salestype"]."<br/>".
		// 		"Sales Channel"."  ".$_POST["saleschannel"]."<br/>".
		// 		"Territory"."  ".$_POST["territory"]."<br/>".
		// 		"How did you learn of STURDY?"."  ".$_POST["wherelearnsturdy"]."<br/>".
		// 		"Major interests"."  ".$_POST["interests"]."<br/>".
		// 		"Comment"."  ".$_POST["comment"];//信件內容 

		$msg = "

		<table style='border-collapse: collapse; border: 1px solid black;'>
		<tr style='border: 1px solid black;'>
		<td colspan='2' height='40px' align='center' bgcolor='#00b259' style='color:#FFF'>REQUIRING MAIL</td>
		</tr>
		<tr style='border: 1px solid black;'>
		<td width='250px' style='border: 1px solid black;'>Company Name</td><td>".(isset($post_ary["com_name"])?$post_ary["com_name"]:'')."</td>
		</tr>
		<tr style='border: 1px solid black;'>
		<td style='border: 1px solid black;'>Address</td><td>".(isset($post_ary["address"])?$post_ary["address"]:'')."</td>
		</tr>
		<tr style='border: 1px solid black;'>
		<td style='border: 1px solid black;'>Contact Person</td><td>".(isset($post_ary["contact_person"])?$post_ary["contact_person"]:'')."</td>
		</tr>
		<tr style='border: 1px solid black;'>
		<td style='border: 1px solid black;'>Country</td><td>".$country_name."</td>
		</tr>
		<tr style='border: 1px solid black;'>
		<td style='border: 1px solid black;'>Telephone</td><td>".(isset($post_ary["tel"])?$post_ary["tel"]:'')."</td>
		</tr>
		<tr style='border: 1px solid black;'>
		<td style='border: 1px solid black;'>Fax </td><td>".(isset($post_ary["fax"])?$post_ary["fax"]:'')."</td>
		</tr>
		<tr style='border: 1px solid black;'>
		<td style='border: 1px solid black;'>E-mail</td><td>".(isset($post_ary["email"])?$post_ary["email"]:'')."</td>
		</tr>
		<tr style='border: 1px solid black;'>
		<td style='border: 1px solid black;'>Website</td><td>".(isset($post_ary["website"])?$post_ary["website"]:'')."</td>
		</tr>
		<tr style='border: 1px solid black;'>
		<td style='border: 1px solid black;'>Company Type</td><td>".(isset($post_ary["comtype"])?$post_ary["comtype"]:'')."</td>
		</tr>
		<tr style='border: 1px solid black;'>
		<td style='border: 1px solid black;'>Employee</td><td>".(isset($post_ary["employeenum"])?$post_ary["employeenum"]:'')."</td>
		</tr>
		<tr style='border: 1px solid black;'>
		<td style='border: 1px solid black;'>Engineer / Technician</td><td>".(isset($post_ary["engineer"])?$post_ary["engineer"]:'')."</td>
		</tr>
		<tr style='border: 1px solid black;'>
		<td style='border: 1px solid black;'>Sales Type</td><td>".(isset($post_ary["salestype"])?$post_ary["salestype"]:'')."</td>
		</tr>
		<tr style='border: 1px solid black;'>
		<td style='border: 1px solid black;'>Sales Channel</td><td>".(isset($post_ary["saleschannel"])?$post_ary["saleschannel"]:'')."</td>
		</tr>
		<tr style='border: 1px solid black;'>
		<td style='border: 1px solid black;'>Territory </td><td>".(isset($post_ary["territory"])?$post_ary["territory"]:'')."</td>
		</tr>
		<tr style='border: 1px solid black;'>
		<td style='border: 1px solid black;'>How did you learn of STURDY?</td><td>".(isset($post_ary["wherelearnsturdy"])?$post_ary["wherelearnsturdy"]:'')."</td>
		</tr>
		<tr style='border: 1px solid black;'>
		<td style='border: 1px solid black;'>Major interests</td><td>".(isset($post_ary["interests"])?$post_ary["interests"]:'')."</td>
		</tr>
		<tr style='border: 1px solid black;'>
		<td style='border: 1px solid black;'>Comment</td><td>".(isset($post_ary["comment"])?$post_ary["comment"]:'')."</td>
		</tr>
		</table>

		";

		if (isset($managers)) {
			foreach ($managers as $row) {
			$email = $row->email; 

			$this->email->from('services@sturdy.com.tw', 'contact');
			$this->email->to($email); 

			$this->email->subject($subject);
			// $this->email->message(fuel_block('contact_content'));
			$this->email->message($msg);

			
			$success = $this->email->send();
		}
		}
		
		// print_r($msg);
		// die;

		

		if($result){ 
			// echo 1;
			// die;
			$this->comm->plu_redirect(site_url($lang_code)."/Contact_front", 0, "填寫完成");
		}else{
			// echo 2;
			// die;
			$this->comm->plu_redirect(site_url($lang_code)."/Contact_front", 0, "發生異常錯誤。請聯絡管理人員");
		}
	}
	 
	
}