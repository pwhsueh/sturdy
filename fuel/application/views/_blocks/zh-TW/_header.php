<?php
 

$nav_medical = $this->code_model->get_series_menu('MEDICAL',$lang_code); 

$nav_dental = $this->code_model->get_series_menu('DENTAL',$lang_code); 
$nav_lab = $this->code_model->get_series_menu('LABORATORY',$lang_code); 
  

?>

<header class="clearfix top_nav">
            <div id="header_nav">
                <div id="logo">
                    <a href="<?php echo site_url($lang_code)?>/home"><img src="<?php echo site_url()?>assets/templates/images/studylogo.png"></a>    
                </div>
                <div id="head_div">
                    <div id="sub_nav">
                        <ul>
                            <li id="about_nav"><a href="<?php echo site_url($lang_code)?>/about">關於</a></li>
                            <li id="support_nav"><a href="<?php echo site_url($lang_code)?>/support">Support</a></li>
                            <li id="contact_nav"><a href="<?php echo site_url($lang_code)?>/contact">Contact</a></li>
                            <li id="news_nav"><a href="<?php echo site_url($lang_code)?>/News_front">News</a></li>
                        </ul>
                    </div>
                    
                   <div id="letter_nav">
                        <ul>
                            <li id="letter_size1" onClick="fzchange(0);">A</li>
                            <li id="letter_size2" onClick="fzchange(1);">A</li>
                            <li id="letter_size3" onClick="fzchange(2);">A</li>
                        </ul>
                    </div>

                    <div id="langswicher_div">
                    
                        <select id="langswicher">
                            <option selected="selected" id="en" value="<?php echo site_url('EN')?>/home" <?php echo $lang_code == "EN"?"selected":"" ?>>English</option>
                            <option id="ch" value="<?php echo site_url('zh-TW')?>/home" <?php echo $lang_code == "zh-TW"?"selected":"" ?> >繁體中文</option>
                            <option id="es" value="<?php echo site_url('ES')?>/home" <?php echo $lang_code == "ES"?"selected":"" ?>>Espa&ntilde;ol</option>
                        </select>
                    
                    </div>
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
                                    <?php if (isset($nav_medical) && sizeof($nav_medical)>0): ?>
                                        <?php foreach ($nav_medical as $key => $value): ?>
                                            <?php 
                                                $nav_medical_l1 = $this->code_model->get_series_menu('MEDICAL',$lang_code,$value->code_id);
                                                // print_r($nav_medical_l1[0]->code_key)
                                                $title;
                                                if (is_array($nav_medical_l1) && sizeof($nav_medical_l1)>0) {
                                                    $title = $nav_medical_l1[0]->code_id;
                                                }else{
                                                    $title="-1";
                                                }
                                             ?>
                                            <li><a href='<?php echo site_url($lang_code)."/series?series=MEDICAL&sub_nav=$value->code_id&title=$title"?>'><img src='<?php echo site_url()."assets/$value->img"?>' alt="img01"/><span><?php echo $value->code_name ?></span></a></li>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                 
                                    <!-- <li><a href="<?php echo site_url()?>series?series=MEDICAL&sub_nav=AS&title=TABLETOP"><img src="<?php echo site_url()?>assets/templates/images/products/med_1.png" alt="img01"/><span>Autoclave Sterilizer</span></a></li>
                                    <li><a href="series_page_op.html"><img src="<?php echo site_url()?>assets/templates/images/products/med_2.png" alt="img02"/><span>Operating Table</span></a></li>
                                    <li><a href="#"><img src="<?php echo site_url()?>assets/templates/images/products/med_3.png" alt="img03"/><span>Operating Light</span></a></li>
                                    <li><a href="series_page_ems.html"><img src="<?php echo site_url()?>assets/templates/images/products/med_4.png" alt="img04"/><span>E.M.S.</span></a></li>
                                    <li><a href="series_page_ent.html"><img src="<?php echo site_url()?>assets/templates/images/products/med_5.png" alt="img05"/><span>E.N.T.</span></a></li>
                                    <li><a href="#"><img src="<?php echo site_url()?>assets/templates/images/products/med_6.png" alt="img06"/><span>Suction</span></a></li>
                                    <li><a href="#"><img src="<?php echo site_url()?>assets/templates/images/products/med_7.png" alt="img07"/><span>Ultrasonic Cleaner</span></a></li> -->
                                </ul>
                            </li>
                            
                            <li>
                                <a href="#" id="nav_dental"></a>
                                
                                <ul class="cbp-hssubmenu cbp-hssub-rows">
                                    <?php if (isset($nav_dental) && sizeof($nav_dental)>0): ?>
                                       <?php foreach ($nav_dental as $key => $value): ?>
                                            <?php 
                                                $nav_dental_l1 = $this->code_model->get_series_menu('DENTAL',$lang_code,$value->code_id);
                                                // print_r($nav_medical_l1[0]->code_key)
                                                $title;
                                                if (is_array($nav_dental_l1) && sizeof($nav_dental_l1)>0) {
                                                    $title = $nav_dental_l1[0]->code_id;
                                                }
                                            ?>
                                            <li><a href='<?php echo site_url($lang_code)."/series?series=DENTAL&sub_nav=$value->code_id&title=$title"?>'><img src='<?php echo site_url()."assets/$value->img"?>' alt="img01"/><span><?php echo $value->code_name ?></span></a></li>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                
                                </ul>
                            </li>
                            
                            <li>
                                <a href="#" id="nav_lab"></a>
                                <ul class="cbp-hssubmenu">
                                    <?php if (isset($nav_lab) && sizeof($nav_lab)>0): ?>
                                        <?php foreach ($nav_lab as $key => $value): ?>
                                            <?php 
                                                $nav_lab_l1 = $this->code_model->get_series_menu('LABORATORY',$lang_code,$value->code_id);
                                                // print_r($nav_medical_l1[0]->code_key)
                                                $title;
                                                if (is_array($nav_lab_l1) && sizeof($nav_lab_l1)>0) {
                                                    $title = $nav_lab_l1[0]->code_id;
                                                }
                                            ?>
                                            <li><a href='<?php echo site_url($lang_code)."/series?series=LABORATORY&sub_nav=$value->code_id&title=$title"?>'><img src='<?php echo site_url()."assets/$value->img"?>' alt="img01"/><span><?php echo $value->code_name ?></span></a></li>
                                        <?php endforeach ?>
                                    <?php endif ?> 
                                </ul>
                            </li>
                               
                        </ul>
                    </div>
            </nav>
       </div> 