<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>STURDY-新駿實業</title>

<link rel="stylesheet" type="text/css" href="<?php echo site_url()?>assets/templates/css/default.css" />        
<!-- <link rel="stylesheet" type="text/css" href="<?php echo site_url()?>assets/templates/css/index.css"> -->
<link rel="stylesheet" type="text/css" href="<?php echo site_url()?>assets/templates/css/component.css" />
 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?php echo site_url()?>assets/templates/js/jquery.easing.1.3.js"></script>

<script src="<?php echo site_url()?>assets/templates/js/responsiveslides.min.js"></script> 
<script src="<?php echo site_url()?>assets/templates/js/modernizr.custom.js"></script>
 <?php echo css($css); ?>


</head>
    
<body> 
<?php

	$lang_code = $this->uri->segment(1);// $this->input->get("lang_code");
	// print_r($lang_code);
	// die;
	if (!isset($lang_code) || empty($lang_code)) {
		$lang_code = 'zh-TW';
  
		$this->comm->plu_redirect(site_url($lang_code)."/home", 0,null);
	}

	$data = array(
		"lang_code" => $lang_code
	);

?>
<?php $this->load->view("_blocks/$lang_code/_header",$data)?> 


	<?php 
		if(isset($views)){
			$this->load->view($lang_code."/".$views,$data);
		}
		else
		{
			define('FUELIFY', FALSE);
			echo fuel_var('body', '');
		}
	?>
	
<?php $this->load->view("_blocks/$lang_code/_footer")?>

 <?php echo js($js); ?>

</body>
</html>