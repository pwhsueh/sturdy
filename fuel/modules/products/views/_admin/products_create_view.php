<?php echo css($this->config->item('products_css'), 'products')?> 

<section class="wrapper" style="margin:0px">
	<div class="row" style="margin:10px 10px">
	    <div class="col-md-2 sheader"><h4>新增</h4></div>
	    <div class="col-md-10 sheader"></div>
	</div>

	<div class="row" style="margin:10px 10px">
		<div class="span12">
			<ul class="breadcrumb">
			  <li>位置：<a href="<?php echo $module_uri?>">產品列表</a></li>
			  <li class="active"><?php echo $view_name?></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					<?php echo $view_name?>
				</header>
				<div class="panel-body">
					<div class="form-horizontal tasi-form">						 
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">語言</label>
							<div class="col-sm-4">
								 <select name="lang" id="lang">
									<?php
										if(isset($lang)):
									?>	
									<?php   foreach($lang as $key=>$rows):?>
										<option value="<?php echo $rows->code_key ?>" ><?php echo $rows->code_name ?></option>
									<?php endforeach;?>
									<?php endif;?>
								</select>
							</div>
						</div>	  
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">系列</label>
							<div class="col-sm-4">
								<select id="series_1" name="series_1" >
									 <option value="Medical">Medical</option>
									 <option value="DENTAL">DENTAL</option>
									 <option value="LABORATORY">LABORATORY</option>
								</select>
								<select name="series_2" id="series_2"> 
								</select>
								<select name="series_3" id="series_3"> 
								</select>
								<select name="series_4" id="series_4"> 
								</select>
							</div>
						</div>	   
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Title</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="title" value=""> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Abstract</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="abstract" value=""> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Sub title</label>
							<div class="col-sm-4"> 
								<input type="text" class="form-control" name="sub_title" value=""> 
							</div>
						</div>	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Descript</label>
							<div class="col-sm-4"> 
								<textarea class="form-control" rows="8" name="descript"></textarea>
							</div>
						</div>					  
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Image 1</label>
							<div class="col-sm-4">
								<input type="file" class="form-control" name="img1" value=""> 
							</div>
						</div>					  
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Image 2</label>
							<div class="col-sm-4">
								<input type="file" class="form-control" name="img2" value=""> 
							</div>
						</div>						  
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Image 3</label>
							<div class="col-sm-4">
								<input type="file" class="form-control" name="img3" value=""> 
							</div>
						</div>						  
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Image 4</label>
							<div class="col-sm-4">
								<input type="file" class="form-control" name="img4" value=""> 
							</div>
						</div>		
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Category file</label>
							<div class="col-sm-4"> 
								<input type="file" class="form-control" name="category_url" value=""> 
							</div>
						</div>	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Detail</label>
							<div class="col-sm-4"> 
								<textarea class="form-control" rows="8" name="detail"></textarea>
							</div>
						</div>		
						<div class="form-group">
							<div class="col-sm-12" style="text-align:center">
								<button type="submit" class="btn btn-info">新增</button>
								<button type="button" class="btn btn-danger" onClick="aHover('<?php echo $module_uri?>')">取消</button>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>

</section>

<?php echo js($this->config->item('products_javascript'), 'products')?>
 
<script>
	function aHover(url)
	{
		location.href = url;
	}

	jQuery(document).ready(function($) {
 
 		

		$("#lang").change(function() { 
  		   $('#series_2').find('option').remove().end();
  		   $('#series_3').find('option').remove().end();
  		   $('#series_4').find('option').remove().end(); 
  		   $("#series_1").trigger('change'); 
		});
	 
		$("#series_1").change(function() { 
  		   $('#series_2').find('option').remove().end();
  		   $('#series_3').find('option').remove().end();
  		   $('#series_4').find('option').remove().end();
  		    console.log('<?php echo site_url(); ?>' + 'fuel/products/series/'  + $(this).val() + '/' +$("#lang").val() + '/-1');
		   $.ajax({
                url: '<?php echo site_url(); ?>' + 'fuel/products/series/' + $(this).val() + '/' +$("#lang").val() + '/-1',
                cache: false
		        }).done(function (data) {            
	                var obj = $.parseJSON(data);
	                if (obj != null) {	                	
						for (var i = 0 ;i<obj.length;i++) { 
		   					$('#series_2').append(
						        $("<option></option>").text(obj[i].code_name).val(obj[i].code_id)
						   );
						};
					    $("#series_2").trigger('change'); 
	                }
				});
			});

		$("#series_2").change(function() {  
  		   $('#series_3').find('option').remove().end();
  		   $('#series_4').find('option').remove().end();
  		    console.log('<?php echo site_url(); ?>' + 'fuel/products/series/' + $("#series_1").val() + '/' +$("#lang").val() + '/' + $(this).val());
		   $.ajax({
                url: '<?php echo site_url(); ?>' + 'fuel/products/series/' + $("#series_1").val() + '/' +$("#lang").val() + '/' + $(this).val(),
                cache: false
		        }).done(function (data) {            
	                var obj = $.parseJSON(data);
	                if (obj != null) {	
	                	for (var i = 0 ;i<obj.length;i++) { 
		   					$('#series_3').append(
						        $("<option></option>").text(obj[i].code_name).val(obj[i].code_id)
						   );
						};
						$("#series_3").trigger('change');
	                }					
				});
			});

		$("#series_3").change(function() {   
  		   $('#series_4').find('option').remove().end();
  		   console.log('<?php echo site_url(); ?>' + 'fuel/products/series/' + $("#series_1").val() + '/' +$("#lang").val() + '/' + $(this).val());
		   $.ajax({
                url: '<?php echo site_url(); ?>' + 'fuel/products/series/' + $("#series_1").val() + '/' +$("#lang").val() + '/' + $(this).val(),
                cache: false
		        }).done(function (data) {            
	                var obj = $.parseJSON(data);
	                if (obj != null) {	                	
						for (var i = 0 ;i<obj.length;i++) { 
		   					$('#series_4').append(
						        $("<option></option>").text(obj[i].code_name).val(obj[i].code_id)
						   ); 
						};
						$("#series_4").trigger('change');
	                }
				});
			});

		$("#series_1").trigger('change');

	});
</script>
