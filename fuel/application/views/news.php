<?php 
    // $news_list = $this->code_model->get_news_list(47,$lang_code); 

 ?>  

<div id="wrapper_section">
    <!--以下about_content span內容要從後台撈-->
    
    <a href="#top" class="backtotop_icon"><img src="<?php echo site_url()?>assets/templates/images/b2topicon.png"></a>
    
    <a name="top" style="margin-top:80px;">1</a>
    
    <div id="news_content">
    
    <div id="title">NEWS</div>
    
    <?php foreach ($news_list as $key => $value): ?>
        <div class="newsbox">
        <div class="newsimg"><img src='<?php echo site_url()."assets/$value->img"?>'></div>
        <div class="newscontent">
        <?php 
             $date = explode(" ", $value->date); 
             $date2 = $date[0];
           

        ?>
        <div class="newsdate"><?php echo $date2 ?></div>
        <div class="newstitle"><?php echo $value->title ?></div>
            <?php echo $value->content ?>
        </div>
        </div>
    <?php endforeach ?>
     

</div>
    
<div id="fake_footer"></div>