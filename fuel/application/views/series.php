<div id="wrapper_section">

<div id="mainseries_title" class="auto_bg" style="background:<?php echo $series_info->code_value1?>;opacity: 0.6;"><h1><?php echo $series_info->code_name?></h1></div><!--需要從後台撈TITLE名稱-->

<div id="series_bg"><img src="<?php echo site_url()?>assets/templates/images/medical/bg.png"></div>

<div id="series_nav">
    <?php 
    // print_r($series_sub_nav);
    if (isset($series_sub_nav))  
       foreach ($series_sub_nav as $key => $value) {
           if($value->code_key == $title)   {   
    ?>
            <div class="this_subnav"><?php echo $value->code_name ?></div>
     <?
           }else{
    ?>
            <div class="series_subnav auto_nav" style="background:<?php echo $series_info->code_value1?>;opacity: 0.8;
border-top: 1px <?php echo $series_info->code_value1?> solid;
border-right: 1px <?php echo $series_info->code_value1?> solid;
border-left: 1px <?php echo $series_info->code_value1?> solid;" ><a href='<?php echo site_url()."series?series=$series&sub_nav=$sub_nav&title=$value->code_key" ?>' ><?php echo $value->code_name ?></a></div>
    <?
        }
       }
    ?> 
</div>

<div class="series_content">

     
      
     <?php  
    if (isset($series_title))  
       foreach ($series_title as $key => $value) {
             
    ?>

    <div id="series_all">
    
    <div class="series_title auto_subnav" style="background:<?php echo $series_info->code_value1?>;opacity: 0.8"><h1><?php echo $value->code_name ?></h1></div>
        
    <div class="title_line"></div>
    
    <div class="wrapper_box">
        
    <div class="series_box" >
    
    <div class="imgbox" onMouseOver="setShow(this);" onMouseOut="setHide(this);">
        <div class="effect auto_effect" id="eff1"><span>SuperMicrom</span></div>
        <div class="series_img"><img src="<?php echo site_url()?>assets/templates/images/medical/p1.png"></div>
    </div>
    
        <div class="pd_code">
          <div>SA-300VMA</div>
        </div>
    
    </div>
    
    </div>
    
    </div>

     <?
        
       }
    ?> 
    
        
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
  
     
