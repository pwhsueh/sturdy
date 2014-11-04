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
										<option value="<?php echo $rows->code_key ?>" <?php if ($rows->code_key == $product->lang): ?>
											selected
										<?php endif ?> ><?php echo $rows->code_name ?></option>
									<?php endforeach;?>
									<?php endif;?>
								</select>
							</div>
						</div>	  
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">系列</label>
							<div class="col-sm-4">
								<select id="series_1">
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
								<input type="text" class="form-control" name="title" value='<?php echo $product->title ?>' /> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Abstract</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="abstract" value='<?php echo $product->abstract ?>' /> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Sub title</label>
							<div class="col-sm-4"> 
								<input type="text" class="form-control" name="sub_title" value='<?php echo $product->sub_title ?>' /> 
							</div>
						</div>	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Descript</label>
							<div class="col-sm-4"> 
								<textarea class="form-control" rows="8" id="descript" name="descript"><?php echo htmlspecialchars_decode($product->descript) ?></textarea>
							</div>
						</div>					  
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Image 1(425*425)</label>
							<div class="col-sm-4">
								<input type="file" class="form-control" name="img1" value="">  
								<input type="hidden" value="<?php echo $product->img1; ?>" name="exist_img1" />	
								<?php if (isset($product->img1) && !empty($product->img1)): ?>
									<img src="<?php echo site_url()."assets/".$product->img1; ?>" />
									<input type="checkbox" name="img1_delete" />刪除
								<?php endif ?> 
							</div>
						</div>					  
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Image 2(425*425)</label>
							<div class="col-sm-4">
								<input type="file" class="form-control" name="img2" value="">  
								<input type="hidden" value="<?php echo $product->img2; ?>" name="exist_img2" />	
								<?php if (isset($product->img2) && !empty($product->img2)): ?>
									<img src="<?php echo site_url()."assets/".$product->img2; ?>" />
									<input type="checkbox" name="img2_delete" />刪除
								<?php endif ?> 
							</div>
						</div>						  
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Image 3(425*425)</label>
							<div class="col-sm-4">
								<input type="file" class="form-control" name="img3" value="">  
								<input type="hidden" value="<?php echo $product->img3; ?>" name="exist_img3" />	
								<?php if (isset($product->img3) && !empty($product->img3)): ?>
									<img src="<?php echo site_url()."assets/".$product->img3; ?>" />
									<input type="checkbox" name="img3_delete" />刪除
								<?php endif ?> 
							</div>
						</div>						  
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Image 4(425*425)</label>
							<div class="col-sm-4">
								<input type="file" class="form-control" name="img4" value="">  
								<input type="hidden" value="<?php echo $product->img4; ?>" name="exist_img4" />	
								<?php if (isset($product->img4) && !empty($product->img4)): ?>
									<img src="<?php echo site_url()."assets/".$product->img4; ?>" />
									<input type="checkbox" name="img4_delete" />刪除
								<?php endif ?> 
							</div>
						</div>		
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Category file</label>
							<div class="col-sm-4"> 
								<input type="file" class="form-control" name="category_url" value="">  
								<input type="hidden" value="<?php echo $product->category_url; ?>" name="exist_category_url" />	
								<?php if (isset($product->category_url) && !empty($product->category_url)): ?> 
									<a href="<?php echo site_url()."assets/".$product->category_url; ?>" target="_blank" >Category file</a>
									<input type="checkbox" name="category_url_delete" />刪除
								<?php endif ?> 
							</div>
						</div>	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Detail</label>
							<div class="col-sm-4"> 
								<textarea class="form-control" rows="8" id="detail" name="detail"><?php echo htmlspecialchars_decode($product->detail) ?></textarea>
							</div>
						</div>			
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">順序</label>
							<div class="col-sm-4"> 
								<input type="text" class="form-control" id="prod_order" name="prod_order" value="<?php echo $product->prod_order ?>">
								<input type="hidden" name="prod_ori_order" value="<?php echo $product->prod_order ?>" /> 
								目前已有<span id="total_count"></span>筆
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

<?php echo js($this->config->item('products_javascript'), 'products')?>
<?php echo js($this->config->item('products_ck_javascript'), 'products')?>
 
<script>
	function aHover(url)
	{
		location.href = url;
	}

	function get_order(){

   		   $.ajax({
                url: '<?php echo site_url(); ?>' + 'fuel/products/get_prod_order/' + $("#lang").val() + '/' + $("#series_4").val() ,
                cache: false
		        }).done(function (data) {            
	                var obj = $.parseJSON(data);
	                if (obj != null) {	     
	                	// console.log(obj.total_rows);
						$("#total_count").text(obj.total_rows-1);
	                }
			});
		 
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
						<?php if (isset($series_2)): ?>
							$("#series_2").val('<?php echo $series_2 ?>');
							$("#series_2").trigger('change'); 
						<?php endif ?>
					   
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
						<?php if (isset($series_3)): ?>
							$("#series_3").val('<?php echo $series_3 ?>');
							$("#series_3").trigger('change'); 
						<?php endif ?>
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
						
						<?php if (isset($series_4)): ?>
							$("#series_4").val('<?php echo $series_4 ?>');
							$("#series_4").trigger('change');
							get_order(); 
							// alert('<?php echo site_url(); ?>' + 'fuel/products/get_prod_order/' + $("#lang").val() + '/' + $("#series_4").val());
						<?php endif ?>
	                }
				});
			});

		
		$("#series_1").val('<?php echo $series_1 ?>');
		$("#series_1").trigger('change');

		var config =
            {
                height: 380,
                width: 850,
                linkShowAdvancedTab: false,
                scayt_autoStartup: false,
                enterMode: Number(2),
                toolbar_Full: [
                				[ 'Styles', 'Format', 'Font', 'FontSize', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ],
                				['Bold', 'Italic', 'Underline', '-', 'NumberedList', 'BulletedList'],
                                ['Link', 'Unlink'], ['Undo', 'Redo', '-', 'SelectAll'], [ 'TextColor', 'BGColor' ],['Checkbox', 'Radio', 'Image' ], ['Source']
                              ]

            };
		$( 'textarea#descript' ).ckeditor(config); 
		$( 'textarea#detail' ).ckeditor(config); 

		

		$("#prod_order").blur(function() {   
   		  	if ($(this).val() > $("#total_count").text()) {
   		  		$(this).val($("#total_count").text());
   		  	};
		});

	});
</script>
