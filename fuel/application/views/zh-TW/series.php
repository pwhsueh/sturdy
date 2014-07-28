<div id="wrapper_section">

<div id="mainseries_title" class="auto_bg" style="background:<?php echo $series_info->code_value1?>;opacity: 0.6;"><h1><?php echo $series_info->code_name?></h1></div><!--需要從後台撈TITLE名稱-->

<div id="series_bg"><img src="<?php echo site_url()?>assets/templates/images/medical/bg.png"></div>


<?php if (isset($series_sub_nav)): ?>
    <div id="series_nav">
    <?php foreach ($series_sub_nav as $key => $value): ?>
        <?php if ($value->code_id == $title): ?>
             <div class="this_subnav_medems"><?php echo $value->code_name ?></div>
        <?php else: ?>
             <div class="series_subnav_medems ems_nav" style="background:<?php echo $series_info->code_value1?>;opacity: 0.8;
border-top: 1px <?php echo $series_info->code_value1?> solid;
border-right: 1px <?php echo $series_info->code_value1?> solid;
border-left: 1px <?php echo $series_info->code_value1?> solid;" ><a href='<?php echo site_url($lang_code)."/series?series=$series&sub_nav=$sub_nav&title=$value->code_id" ?>' ><?php echo $value->code_name ?></a></div>

        <?php endif ?>
    <?php endforeach ?>
    </div>
<?php endif ?>
 


<div class="series_content">

    <?php if (isset($series_title)): ?> 
    <?php foreach ($series_title as $key => $value): ?>
        <?php 
            $prod_list = $this->code_model->get_products_list($value->code_id);                
        ?>
        <?php if (isset($prod_list)): ?>
        <div id="series_all">    
            <div class="series_title auto_subnav" style="background:<?php echo $series_info->code_value1?>;opacity: 0.8"><h1><?php echo $value->code_name ?></h1></div>                
            <div class="title_line"></div>
            <?php foreach ($prod_list as $key2 => $value2): ?>
                <div class="wrapper_box">            
                    <div class="series_box" >
                        <a href='<?php echo site_url($lang_code)."/product/$value2->id"?>'>                         
                            <div class="imgbox" onMouseOver="setShow(this);" onMouseOut="setHide(this);" >
                                <div class="effect auto_effect" id="eff1" style="background:<?php echo $series_info->code_value1?>;opacity: 0.5;"><span><?php echo $value2->abstract; ?></span></div>
                                <div class="series_img"><img src="<?php echo site_url()."assets/$value2->img1" ?>"></div>
                            </div>                        
                            <div class="pd_code">
                              <div><?php echo $value2->title ?></div>
                            </div>      
                        </a>                  
                    </div>
                
                </div>
            <?php endforeach ?>
         </div>
         <?php endif ?>
    <?php endforeach ?>

    <?php else: ?>
      
           
           
            
            <div class="wrapper_box">
                
            <div class="series_box" >
            
            <div class="imgbox" onMouseOver="setShow(this);" onMouseOut="setHide(this);" >
                <div class="effect auto_effect" id="eff1" style="background:<?php echo $series_info->code_value1?>;opacity: 0.5;"><span>SuperMicrom</span></div>
                <div class="series_img"><img src="<?php echo site_url()?>assets/templates/images/medical/p1.png"></div>
            </div>
            
                <div class="pd_code">
                  <div>SA-300VMA</div>
                </div>
            
            </div>
            
            </div>
        
    <?php endif ?>

</div>






</div>
    
    <div id="fake_footer"></div>

<script type="text/javaScript">
    function setShow(x) {
        $( x ).children( ".effect" ).css( "display", "block" );
    }
    
    function setHide(x) {
        $( x ).children( ".effect" ).css( "display", "none" );
    }
    
    
</script>  
  
     
