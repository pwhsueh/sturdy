<?php echo css($this->config->item('news_css'), 'news')?> 

<section class="wrapper" style="margin:0px">
	<div class="row" style="margin:10px 10px">
	    <div class="col-md-2 sheader"><h4>新增</h4></div>
	    <div class="col-md-10 sheader"></div>
	</div>

	<div class="row" style="margin:10px 10px">
		<div class="span12">
			<ul class="breadcrumb">
			  <li>位置：<a href="<?php echo $module_uri?>">上稿作業</a></li>
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
							<label class="col-sm-2 col-sm-2 control-label">上稿類別</label>
							<div class="col-sm-4">
								<select name="type" id="type">
									<?php
										if(isset($type)):
									?>	
									<?php   foreach($type as $key=>$rows):?>
												<option value="<?php echo $rows->code_id ?>"><?php echo $rows->code_name ?></option>
										<?php endforeach;?>
									<?php endif;?>
								</select>
							</div>
						</div>	   
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">日期</label>
							<div class="col-sm-4">
								<input type="text" class="form-control date" name="date" value=""> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">標題</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="title" value=""> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">內容</label>
							<div class="col-sm-4"> 
								<textarea class="form-control" id="content" rows="3" name="content"></textarea>
							</div>
						</div>	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">順序</label>
							<div class="col-sm-4"> 
								<input type="text" class="form-control" id="news_order" name="news_order" > 
							</div>
						</div>						  
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">圖片</label>
							<div class="col-sm-4">
								<input type="file" class="form-control" name="img" value=""> 
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

<?php echo js($this->config->item('news_javascript'), 'news')?>
<?php echo js($this->config->item('news_ck_javascript'), 'news')?>
 
<script>
	function aHover(url)
	{
		location.href = url;
	}

	jQuery(document).ready(function($) {
	 
		$('.date').datepicker({dateFormat: 'yy-mm-dd'}); 

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
		$( 'textarea#content' ).ckeditor(config); 

		$("#type,#lang").change(function() {   
   		   $.ajax({
                url: '<?php echo site_url(); ?>' + 'fuel/news/get_news_order/' + $("#lang").val() + '/' +$("#type").val() ,
                cache: false
		        }).done(function (data) {            
	                var obj = $.parseJSON(data);
	                if (obj != null) {	     
						$("#news_order").val(obj.total_rows);
	                }
				});
			});

		$("#type").trigger('change');

	});
</script>