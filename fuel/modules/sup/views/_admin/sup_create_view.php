<?php echo css($this->config->item('sup_css'), 'sup')?> 

<section class="wrapper" style="margin:0px">
	<div class="row" style="margin:10px 10px">
	    <div class="col-md-2 sheader"><h4>新增</h4></div>
	    <div class="col-md-10 sheader"></div>
	</div>

	<div class="row" style="margin:10px 10px">
		<div class="span12">
			<ul class="breadcrumb">
			  <li>位置：<a href="<?php echo $module_uri?>">Support 列表</a></li>
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
									<?php foreach($lang as $key=>$rows):?>
										<option value="<?php echo $rows->code_key ?>" ><?php echo $rows->code_name ?></option>
									<?php endforeach;?>
									<?php endif;?>
								</select>
							</div>
						</div>	  
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Type</label>
							<div class="col-sm-4">
								<select name="type" id="type">
									 
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
							<label class="col-sm-2 col-sm-2 control-label">Image </label>
							<div class="col-sm-4">
								<input type="file" class="form-control" name="img" value=""> 
							</div>
						</div>		
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">File</label>
							<div class="col-sm-4"> 
								<input type="file" class="form-control" name="file_url" value=""> 
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

<?php echo js($this->config->item('sup_javascript'), 'sup')?>
 
<script>
	function aHover(url)
	{
		location.href = url;
	}

	jQuery(document).ready(function($) {
 		$("#lang").change(function() { 
  		   $('#type').find('option').remove().end(); 
  		   $.ajax({
                url: '<?php echo site_url(); ?>' + 'fuel/sup/type/' + $(this).val() ,
                cache: false
		        }).done(function (data) {            
	                var obj = $.parseJSON(data);
	                if (obj != null) {	                	
						for (var i = 0 ;i<obj.length;i++) { 
		   					$('#type').append(
						        $("<option></option>").text(obj[i].code_name).val(obj[i].code_id)
						   );
						};
					 	 
	                }
				});
		});

		$("#lang").trigger('change'); 

	});
</script>
