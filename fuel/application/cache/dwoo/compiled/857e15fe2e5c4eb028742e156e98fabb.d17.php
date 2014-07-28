<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><!--__FUEL_MARKER__0--><div id="footer_content">
  <div id="footer_nav">
      <ul>
        <li id="ftsercurity_nav" style="width:60px; "><a href="#ftsercurity">產品保固</a></li>
        <li id="ftabout_nav" style="width:70px; "><a href="<?php echo site_url();?>about">關於Sturdy</a></li>
        <li id="ftretailer_nav" style="width:70px; "><a href="#ftretailer">經銷商合作</a></li>
        <li id="ftprivicy_nav" style="width:130px; "><a href="#ftprivicy">隱私權保護與使用條款</a></li>
      </ul>
    </div>
    
  <div id="footer_copyright" style="text-align: center;">
        <h2>Copyright &copy;2014 STURDY INDUSTRIAL CO., LTD.</h2>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>