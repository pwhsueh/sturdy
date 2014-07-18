<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>STURDY-新駿實業</title>

<link rel="stylesheet" type="text/css" href="http://localhost:8888/sturdy/assets/templates/css/default.css" />        
<link rel="stylesheet" type="text/css" href="http://localhost:8888/sturdy/assets/templates/css/index.css">
<link rel="stylesheet" type="text/css" href="http://localhost:8888/sturdy/assets/templates/css/component.css" />
 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://localhost:8888/sturdy/assets/templates/js/jquery.easing.1.3.js"></script>

<script src="http://localhost:8888/sturdy/assets/templates/js/responsiveslides.min.js"></script> 
<script src="http://localhost:8888/sturdy/assets/templates/js/modernizr.custom.js"></script>

</head>
    
<body>


<header class="clearfix top_nav">
            <div id="header_nav">
                <div id="logo">
                    <a href="#maximage"><img src="http://localhost:8888/sturdy/assets/templates/images/studylogo.png"></a>    
                </div>
                <div id="sub_nav">
                    <ul>
                        <li id="about_nav"><a href="about.html">About</a></li>
                        <li id="support_nav"><a href="support.html">Support</a></li>
                        <li id="contact_nav"><a href="contact.html">Contact</a></li>
                        <li id="news_nav"><a href="news.html">News</a></li>
                    </ul>
                </div>
                
               <div id="letter_nav">
                    <ul>
                        <li id="letter_size1" onClick="fzchange(0);">A</li>
                        <li id="letter_size2" onClick="fzchange(1);">A</li>
                        <li id="letter_size3" onClick="fzchange(2);">A</li>
                    </ul>
                </div>
            </div>
</header>   

<div class="main_nav">

<!--產品的照片/系列/廠牌須讓業主可從後台更新--> 
           
                <nav class="cbp-hsmenu-wrapper" id="cbp-hsmenu-wrapper">
                    
                    <div class="cbp-hsinner">
                        
                        <ul class="cbp-hsmenu">
                            
                            <li>
                                <a href="#" id="nav_medical"></a>
                                
                                <ul class="cbp-hssubmenu">
                                
                                    <li><a href="series_page.html"><img src="http://localhost:8888/sturdy/assets/templates/images/products/med_1.png" alt="img01"/><span>Autoclave Sterilizer</span></a></li>
                                    <li><a href="series_page_op.html"><img src="http://localhost:8888/sturdy/assets/templates/images/products/med_2.png" alt="img02"/><span>Operating Table</span></a></li>
                                    <li><a href="#"><img src="http://localhost:8888/sturdy/assets/templates/images/products/med_3.png" alt="img03"/><span>Operating Light</span></a></li>
                                    <li><a href="series_page_ems.html"><img src="http://localhost:8888/sturdy/assets/templates/images/products/med_4.png" alt="img04"/><span>E.M.S.</span></a></li>
                                    <li><a href="series_page_ent.html"><img src="http://localhost:8888/sturdy/assets/templates/images/products/med_5.png" alt="img05"/><span>E.N.T.</span></a></li>
                                    <li><a href="#"><img src="http://localhost:8888/sturdy/assets/templates/images/products/med_6.png" alt="img06"/><span>Suction</span></a></li>
                                    <li><a href="#"><img src="http://localhost:8888/sturdy/assets/templates/images/products/med_7.png" alt="img07"/><span>Ultrasonic Cleaner</span></a></li>
                                </ul>
                            </li>
                            
                            <li>
                                <a href="#" id="nav_dental"></a>
                                
                                <ul class="cbp-hssubmenu cbp-hssub-rows">
                                
                                    <li><a href="#"><img src="http://localhost:8888/sturdy/assets/templates/images/products/den_1.png" alt="img01"/><span>Autoclave Sterilizer</span></a></li>
                                    <li><a href="#"><img src="http://localhost:8888/sturdy/assets/templates/images/products/den_2.png" alt="img02"/><span>Hand piece Cleaner</span></a></li>
                                    <li><a href="#"><img src="http://localhost:8888/sturdy/assets/templates/images/products/den_3.png" alt="img03"/><span>Ultrasonic Cleaner</span></a></li>
                                </ul>
                            </li>
                            
                            <li>
                                <a href="#" id="nav_lab"></a>
                                <ul class="cbp-hssubmenu">
                                    <li><a href="#"><img src="http://localhost:8888/sturdy/assets/templates/images/products/lab_1.png" alt="img01"/><span>Vertical Autoclave</span></a></li>
                                    <li><a href="#"><img src="http://localhost:8888/sturdy/assets/templates/images/products/lab_2.png" alt="img02"/><span>Ultrasonic Cleaner</span></a></li>
                                </ul>
                            </li>
                               
                        </ul>
                    </div>
            </nav>
       </div> 

	<div id="wrapper_section"><!--以下about_content span內容要從後台撈-->
<div id="about_content">
<div id="intro">
<h1>Our Company</h1>
<span>From the establishment in 1992, Sturdy has been dedicated to bring our clients the most advanced products. With the mission to build a sterile world, Sturdy isn't only committed to the development of progressive technology, but also possesses all the requisite certifications. ISO 13485, ISO 9001, Japan GMP and Taiwan GMP are for quality management control approval and CE certificates / PED, 97/23/EC to guarantee the safety of our products. With the vast experience and dedication to R&amp;D, Sturdy is your best choice of high quality and innovative sterilizing equipments.</span></div>

<div id="pd_range">
<h1>Products Range</h1>
<span>Steam Autoclave Sterilizer / Operating Table / Operating Lamp / EMS Products Handpiece Cleaner/ Ultrasonic Cleaner/ Suction Unit/ ENT Instrument/ General Plastic Products</span></div>
</div>

<div id="about_bg"><img src="<?php echo img_path('images/about_bg.jpg');?>" /></div>

<div id="certificates_content">
<h1>CERTIFICATES</h1>

<div id="cert_img">
<div class="cert_box"><img src="<?php echo img_path('images/cert/cert1.jpg');?>" /></div>

<div class="cert_box"><img src="<?php echo img_path('images/cert/cert2.jpg');?>" /></div>

<div class="cert_box"><img src="<?php echo img_path('images/cert/cert3.jpg');?>" /></div>

<div class="cert_box"><img src="<?php echo img_path('images/cert/cert4.jpg');?>" /></div>
</div>
</div>
</div>

<div id="fake_footer">&nbsp;</div>	
<footer>

<div id="footer_content">
  <div id="footer_nav">
      <ul>
        <li id="ftsercurity_nav" style="width:60px; "><a href="#ftsercurity">產品保固</a></li>
        <li id="ftabout_nav" style="width:70px; "><a href="about.html">關於Sturdy</a></li>
        <li id="ftretailer_nav" style="width:70px; "><a href="#ftretailer">經銷商合作</a></li>
        <li id="ftprivicy_nav" style="width:130px; "><a href="#ftprivicy">隱私權保護與使用條款</a></li>
      </ul>
    </div>
    
  <div id="footer_copyright" style="text-align: center;">
        <h2>Copyright ©2014 STURDY INDUSTRIAL CO., LTD.</h2>
</div>
    
</footer>    


<script type="text/javaScript">
  
    function fzchange(x){ 
        if(x==0){ 
        $('body').css('font-size','small');
        }
        if(x==1){ 
        $('body').css('font-size','medium');
        }
        if(x==2){ 
        $('body').css('font-size','large');
        }
    }
    
</script> 
 
</body>
</html><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>