<footer>
<div id="footer_content">
 <?php //echo fuel_block("footer_$lang_code"); ?>
    <div id="footer_content">
        <div id="footer_nav_tw">
            <!--<ul>
                <li id="ftsercurity_nav" style="width:60px; "><a href="#ftsercurity">產品保固</a></li>
                <li id="ftabout_nav" style="width:70px; "><a href="<?php echo site_url($lang_code)?>/about">關於Sturdy</a></li>
                <li id="ftretailer_nav" style="width:70px; "><a href="#ftretailer">經銷商合作</a></li>
                <li id="ftprivicy_nav" style="width:130px; "><a href="#ftprivicy">隱私權保護與使用條款</a></li>
            </ul>-->
                 <ul><li>24872 新北市五股區中興路一段168號&nbsp;&nbsp;Tel: 886-2-2981-5245&nbsp;&nbsp;Fax: 886-2-2984-8208&nbsp;&nbsp;Email: <a href="mailto:foreign@sturdy.com.tw">foreign@sturdy.com.tw</a></li></ul>
            </div>

            <div id="footer_copyright" style="text-align: center;">
            <h2>Copyright ©2014 STURDY INDUSTRIAL CO., LTD.</h2>
        </div>
    </div>
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