<div id="dialog-form" title="請輸入帳號密碼"> 
  
    <fieldset>
      <label for="account">帳號</label>
      <input type="text" name="account" id="account" class="text ui-widget-content ui-corner-all"> 
      <label for="password">Password</label>
      <input type="password" name="password" id="password" class="text ui-widget-content ui-corner-all">
 
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  
</div>

<div id="wrapper_section">
       
    <div id="supports_bg"><img src="<?php echo site_url()?>assets/templates/images/supports_bg.jpg"></div>
    
    <div id="catalog">
        <h1><?php echo $cd->code_name ?></h1>
    <div class="supports_content">
        <?php if (isset($cd_list)): ?>
            <?php foreach ($cd_list as $key => $value): ?>
                <div class="cat_box">
                    <div class="cat_img"><img src='<?php echo site_url()."assets/$value->img"?>'></div>
                    <span><?php echo $value->title ?></span></br>
                    <input type="submit" class="button" value="Download"/></input>
                </div>
            <?php endforeach ?>
        <?php endif ?> 
    </div>
    </div>
    
    <div id="manual">
        <h1><?php echo $umd->code_name; ?></h1>
    <div class="supports_content">
        <?php if (isset($umd_list)): ?>
            <?php $i = 0; ?>
            <?php foreach ($umd_list as $key => $value): ?>
                <div class="<?php echo $i % 4 == 3 ? "cat_box_last":"cat_box"; ?>">
                    <div class="cat_img"><img src='<?php echo site_url()."assets/$value->img"?>'></div>
                    <span><?php echo $value->title ?></span></br>
                    <input type="button" class="button umd" value="Download" data-url='<?php echo site_url()."assets/$value->file_url"?>' /></input>
                </div>
                <?php $i++; ?>
            <?php endforeach ?>
        <?php endif ?> 
    </div>    
    </div>
       
       
</div> 
 
<input type="hidden" id="file_url" />
<div id="fake_footer" style="height:800px;"></div>
<style>
    /*body { font-size: 62.5%; }*/
    /*label, input { display:block; }*/
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    
</style>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">  

<script src="<?php echo site_url()?>assets/admin_js/jquery-ui.min.js"></script>
<script type="text/javascript">
    $(document).ready(function($) {
         
   
        function Download() {
          var account = $( "#account" ).val(),
              password = $( "#password" ).val(),
              file = $("#file_url").val();
          if (account == '<?php echo $umd->code_value1; ?>' && password == '<?php echo $umd->code_value2; ?>') {
              window.open(file);
          }else{
             alert('帳號或密碼錯誤');
          }

        }
     
        var dialog = $( "#dialog-form" ).dialog({
          autoOpen: false,
          height: 300,
          width: 350,
          modal: true,
          buttons: {
            "確定": Download,
            Cancel: function() {
              dialog.dialog( "close" );
            }
          },
          close: function() {
            // form[ 0 ].reset();
            // allFields.removeClass( "ui-state-error" );
          }
        });
     
        // form = dialog.find( "form" ).on( "submit", function( event ) {
        //   event.preventDefault();
        //   addUser();
        // });
     
        $( ".umd" ).on( "click", function() {
          $("#file_url").val($(this).data('url'));
          dialog.dialog( "open" );
        });
     
    });
</script>