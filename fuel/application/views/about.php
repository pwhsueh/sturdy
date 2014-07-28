<?php 
    $intro = $this->code_model->get_news_list(52,$lang_code); 
    $pd_range = $this->code_model->get_news_list(53,$lang_code); 
    // print_r($intro[0]);

?>
<div id="wrapper_section">
    <!--以下about_content span內容要從後台撈-->
    <div id="about_content">
    
    <div id="intro">    
        <h1><?php echo $intro[0]->title ?></h1>
        
        <span><?php echo $intro[0]->content ?></span>
    </div>
    
    <div id="pd_range"> 
        <h1><?php echo $pd_range[0]->title ?></h1>
        
        <span><?php echo $pd_range[0]->content ?></span>
    </div>
        
    </div>
    

    <div id="about_bg"><img src="<?php echo site_url()?>assets/templates/images/about_bg.jpg"></div>
    
    <div id="certificates_content">
    
    <h1>CERTIFICATES</h1>
    
    <div id="cert_img">
    
        <div class="cert_box"><img src="<?php echo site_url()?>assets/templates/images/cert/cert1.jpg"></div>
        <div class="cert_box"><img src="<?php echo site_url()?>assets/templates/images/cert/cert2.jpg"></div>
        <div class="cert_box"><img src="<?php echo site_url()?>assets/templates/images/cert/cert3.jpg"></div>
        <div class="cert_box"><img src="<?php echo site_url()?>assets/templates/images/cert/cert4.jpg"></div>   
        
    </div>
        
    </div>
    
       
</div> 
  <div id="fake_footer"></div>
  
     
