<footer>

<div id="footer_content">
 <?php echo fuel_block('footer'); ?>
</div>
  
</footer>    

<script src="<?php echo site_url()?>assets/templates/js/cbpHorizontalSlideOutMenu.min.js"></script>
 
<script type="text/javaScript">
    var menu = new cbpHorizontalSlideOutMenu( document.getElementById( 'cbp-hsmenu-wrapper' ) );
  
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

    function go(url){
         document.location.href = url;
    } 

    jQuery(document).ready(function($) {
        $("#langswicher").change(function() { 
            go($(this).val());
        });
    });
    
</script> 