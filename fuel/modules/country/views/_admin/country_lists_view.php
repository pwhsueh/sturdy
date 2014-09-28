<?php echo css($this->config->item('country_css'), 'country')?>

<section class="main-content">
<section class="wrapper">
	<div id="dialog-confirm" title="刪除確認?">
	  <p></p>
	</div>
	<div class="row">
		<div class="span12">
			<ul class="breadcrumb">
			  <li>位置：上稿列表</li>
			</ul>
		</div>
	</div> 
	<div class="row" style="">
 
	    <div class="col-md-12 sheader"> 
			<div class="form-inline" style="margin-top:10px">
				<div class="form-group">
					<label class="col-sm-4 control-label" >
						姓名
					</label>
				    <div class="col-sm-8">
				        <input type="text" name="search_name" value='<?php echo $search_name ?>' />
				    </div>
				    <label class="col-sm-4 control-label" >
						email
					</label>
				    <div class="col-sm-8">
				        <input type="text" name="search_email" value='<?php echo $search_email ?>' />
				    </div>
				</div>
			</div>  
			<div class="form-inline" style="margin-top:10px" >
				<div class="form-group">
					<button type="submit" class="btn btn-warning">搜尋</button>
					<button class="btn btn-info" type="button" onClick="aHover('<?php echo $create_url;?>')">新增</button>
					<!-- <button type="button" id="donebatch" class="btn btn-info">批次刪除</button> -->
				</div>
			</div>
	    </div>
	</div> 

	<div class="row notify" style="margin:10px 10px; font-size: 12px; display:none">
		<div class="bs-docs-example">
		  <div class="alert fade in">
		    <button type="button" class="close" data-dismiss="alert">×</button>
		    <span>刪除失敗</span>
		  </div>
		</div>
	</div>

	<div class="row">
		<section class="panel">
			<header class="panel-heading">
				<!-- <button class="btn btn-info" type="button" onClick="aHover('<?php echo $create_url;?>')">新增群組</button> -->
			</header>
			<table class="table table-striped table-advance table-hover">
				<thead>
					<tr>
						<th>
							<label class="label_check c_on" for="checkbox-01">
								<input type="checkbox" id="select-all"/>
							</label>
						</th>
						<th>姓名</th>
						<th>email</th> 
						<th>更新時間</th>
						<th>刪除</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(isset($results))
					{
						foreach($results as $key=>$rows)
						{

					?>
					<tr>
						<td>
							<label class="label_check c_on" for="checkbox-01">
								<input type="checkbox" name="id[]" caseid="<?php echo $rows->id?>"/>
							</label>
						</td>
						<td><a href="<?php echo $edit_url.$rows->id?>"><?php echo $rows->name?></a></td>
						<td><?php echo $rows->email?></td> 
						<td><?php echo $rows->modi_time?></td>
						<td>
							<button class="btn btn-xs btn-danger del" type="button" onclick="dialog_chk(<?php echo $rows->id?>)">刪除</button>
						</td>
					</tr>
					<?php
						}
					}
					else
					{
					?>
						<tr>
							<td colspan="5">No results.</td>
						</tr>
					<?php
					}
					?>
				</tobdy>
			</table>
		</section>
	</div>
	<div style="text-align:center">
	  <ul class="pagination">
		<?php echo $page_jump?>
	  </ul>
	</div>
</section>
</section>
<?php echo js($this->config->item('country_javascript'), 'country')?>
<script>
	var $j = jQuery.noConflict(true);
	function aHover(url)
	{
		location.href = url;
	}

	$j("document").ready(function($) {
		$j("#select-all").click(function() {

		   if($j("#select-all").prop("checked"))
		   {
				$j("input[name='id[]']").each(function() {
					$j(this).prop("checked", true);
				});
		   }
		   else
		   {
				$j("input[name='id[]']").each(function() {
					$j(this).prop("checked", false);
				});     
		   }
		});

		$j("button.delall").click(function(){
			var ids = [];
			var j = 0;
			var postData = {};
			var api_url = '<?php echo $multi_del_url?>';
			$j("input[name='id[]']").each(function(i){
				if($j(this).prop("checked"))
				{
					ids[j] = $j(this).attr('memberid');
					j++;
				}
			});

			postData = {'ids': ids};
			$j( "#dialog-confirm p" ).text('您確定要刪除嗎？');
			$j( "#dialog-confirm" ).dialog({
			  resizable: false,
			  height:150,
			  modal: true,
			  buttons: {
			    "Delete": function() {
					$j.ajax({
						url: api_url,
						type: 'POST',
						async: true,
						crossDomain: false,
						cache: false,
						data: postData,
						success: function(data, textStatus, jqXHR){
							var data_json=jQuery.parseJSON(data);
							console.log(data_json);
							$j( "#dialog-confirm" ).dialog( "close" );
							if(data_json.status == 1)
							{
								$j(".notify").find("span").text('刪除成功');
								$j(".notify").fadeIn(100).fadeOut(1000);
								setTimeout("update_page()", 500);
							}
							else
							{
								$j(".notify").find(".alert").addClass('alert-error');
								$j(".notify").find(".alert").addClass('alert-block');
								$j(".notify").find("span").text('刪除失敗');
								$j(".notify").slideDown(500).delay(1000).fadeOut(200);
							}

						},
					});
			    },
			    Cancel: function() {
			      $j( this ).dialog( "close" );
			    }
			  }
			});
		});
	});

	function del(id)
	{
		var	 api_url = '<?php echo $del_url?>' + id;
	   
		$j.ajax({
			url: api_url,
			type: 'POST',
			async: true,
			crossDomain: false,
			cache: false,
			success: function(data, textStatus, jqXHR){
				var data_json=jQuery.parseJSON(data);
				console.log(data_json);
				$j( "#dialog-confirm" ).dialog( "close" );
				if(data_json.status == 1)
				{
					$j("#notification span").text('刪除成功');
					$j("#notify").fadeIn(100).fadeOut(1000);
					setTimeout("update_page()", 500);
				}

			},
		});
	}
	function dialog_chk(id)
	{
		$j( "#dialog-confirm p" ).text('您確定要刪除嗎？');
		$j( "#dialog-confirm" ).dialog({
		  resizable: false,
		  height:150,
		  modal: true,
		  buttons: {
		    "Delete": function() {
				del(id);
		    },
		    Cancel: function() {
		      $j( this ).dialog( "close" );
		    }
		  }
		});
	}
	function update_page()
	{
		location.reload();
	}
</script>