

<script type="text/javaScript">

      $(function () {

      // Slideshow 1
      $("#slider1").responsiveSlides({
         maxwidth: 1024,
        speed: 900,
        nav: true,
        namespace: "indexslide",
      });

    });
    
    function setShow1() {
        $('#effect1').fadeIn(); 
    }
    
    function setHide1() {
        $('#effect1').fadeOut(); 
    }
    
    function setShow2() {
        $('#effect2').fadeIn(); 
    }
    
    function setHide2() {
        $('#effect2').fadeOut(); 
    }
    
    
    function setShow3() {
        $('#effect3').fadeIn(); 
    }
    
    function setHide3() {
        $('#effect3').fadeOut(); 
    }
    
    function tonews(){
        window.location="News_front";
    }
    
   
    
</script>      
        
<div id="wrapper">
       
  <div id="slides">

<!--以下三張圖須從資料庫讓業主更新-->  
    <ul class="rslides" id="slider1">
      <?php if (isset($index_list) && sizeof($index_list) >0): ?>
           <?php foreach ($index_list as $key => $value): ?>
             <li><img src='<?php echo site_url()."assets/$value->img"?>' alt=""></li>  
          <?php endforeach ?>
      <?php endif ?>
     
    </ul>
  </div>
  
  <div id="quicknav">
  
  <div class="quick_box">
   <?php echo fuel_block('home_new_products_en'); ?>
  </div>
  
   <div class="quick_box quick_box1">
    <h1>VIDEO</h1>
    <div class="play_button" id="effect2"></div>
    <div id="quick_box_vdo_img" onMouseOver="setShow2();" onMouseOut="setHide2();"><a href="#"></a></div>
  </div>
  
  <div class="quick_box quick_box1" onClick="tonews();">
    <h1>NEWS & EVENTS</h1>
    <div class="hover_effect" id="effect3" onMouseOut="setHide3();"></div>
    <div id="quick_box_nws_img" onMouseOver="setShow3();"></div>
  </div>
  
  </div>  
</div> 

</div>
    
        <div id="fake_footer"></div>
    
 

     
