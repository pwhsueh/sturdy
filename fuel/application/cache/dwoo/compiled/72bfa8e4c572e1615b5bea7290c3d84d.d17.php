<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div id="wrapper_section"><!--以下about_content span內容要從後台撈-->
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
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>