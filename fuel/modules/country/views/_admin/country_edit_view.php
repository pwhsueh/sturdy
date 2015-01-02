<?php echo css($this->config->item('country_css'), 'country')?>
<section class="wrapper">
	<div class="row" style="margin:10px 10px">
	    <div class="col-md-2 sheader"><h4>區域管理員列表</h4></div>
	    <div class="col-md-10 sheader"></div>
	</div>

	<div class="row" style="margin:10px 10px">
		<div class="span12">
			<ul class="breadcrumb">
			  <li>位置：<a href="<?php echo $module_uri?>">區域管理員列表</a></li>
			  <li class="active"><?php echo $view_name?></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					編輯區域管理員
				</header>
				<div class="panel-body">
					<div class="form-horizontal tasi-form">  
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">姓名</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="name" value="<?php echo $row->name ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Email</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="email" value="<?php echo $row->email ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">國家</label>
							<div class="col-sm-4">
								<select multiple style="width:50%" id='lstBox1'>
								 	<?php if (isset($country)): ?>
								 		<?php foreach ($country as $key => $rows): ?>
								 			<option value="<?php echo $rows->code_id ?>" ><?php echo $rows->code_value1 ?></option>
								 		<?php endforeach ?>
								 	<?php endif ?>
								</select>
							</div>
							<div class="col-sm-2">
								<input type='button' id='btnRight' value ='  >  '/>
                                <br/><br/><input type='button' id='btnLeft' value ='  <  '/>
							</div>
							 
							<div class="col-sm-4">
								<select multiple style="width:50%" id='lstBox2' name="country[]">
								 <?php if (isset($country2)): ?>
								 		<?php foreach ($country2 as $key => $rows): ?>
								 			<option value="<?php echo $rows->code_id ?>" selected><?php echo $rows->code_value1 ?></option>
								 		<?php endforeach ?>
								 	<?php endif ?>
								</select>
							</div>
						</div>
						 
						<div class="form-group">
							<div class="col-sm-12" style="text-align:center">
								<button type="submit" class="btn btn-info">更新</button>
								<button type="button" class="btn btn-danger" onClick="aHover('<?php echo $module_uri?>')">取消</button>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>

</section>

<?php echo js($this->config->item('country_javascript'), 'country')?>
<script>
	function aHover(url)
	{
		location.href = url;
	}

	jQuery(document).ready(function($) {

		$('#form').submit(function() {
			  $("#lstBox2 option" ).each(function() {
                // console.log($(this));
                $(this).attr('selected', true);
               // $(this).prop("selected", "selected");
            });
		});

		 $('#btnRight').click(function(e) {
            var selectedOpts = $('#lstBox1 option:selected');
            if (selectedOpts.length == 0) {
                // alert("Nothing to move.");
                e.preventDefault();
            } 
            
            $('#lstBox2').append($(selectedOpts).clone());
            $(selectedOpts).remove();
            // $("#lstBox1 option").prop("selected", "selected");
            $("#lstBox2 option" ).each(function() {
                // console.log($(this));
                $(this).attr('selected', true);
               // $(this).prop("selected", "selected");
            });
            e.preventDefault();
        });

        $('#btnLeft').click(function(e) {
            var selectedOpts = $('#lstBox2 option:selected');
            if (selectedOpts.length == 0) {
                // alert("Nothing to move.");
                e.preventDefault();
            }

            $('#lstBox1').append($(selectedOpts).clone());
            $(selectedOpts).remove();
            e.preventDefault();
        });


	});
</script>