<?php echo css($this->config->item('contact_css'), 'contact')?>

 
	 
	<div class="row">
		<div class="span12">
			<ul class="breadcrumb">
			  <li>位置：聯絡列表</li>
			</ul>
		</div>
	</div> 
	<div class="row" style="">
 
	    <div class="col-md-12 sheader"> 
			<div class="form-inline" style="margin-top:10px">
				<div class="form-group">
					<label class="col-sm-4 control-label" >
						公司名稱
					</label>
				    <div class="col-sm-8">
				        <input type="text" name="search_com_name" value='<?php echo $search_com_name ?>' />
				    </div>
				    <label class="col-sm-4 control-label" >
						聯絡人
					</label>
				    <div class="col-sm-8">
				        <input type="text" name="search_contact_person" value='<?php echo $search_contact_person ?>' />
				    </div>
				       <label class="col-sm-4 control-label" >
						電子信箱
					</label>
				    <div class="col-sm-8">
				        <input type="text" name="search_email" value='<?php echo $search_email ?>' />
				    </div>
				    <label class="col-sm-4 control-label" >
						國家
					</label>
				    <div class="col-sm-8">
				        <select style="width:50%" name="search_country" >
				        	<option value="all">ALL</option>
						 	<?php if (isset($country)): ?>
						 		<?php foreach ($country as $key => $rows): ?>
						 			<option value="<?php echo $rows->code_id ?>" 
						 				<?php if ($search_country == $rows->code_id ): ?>
						 					selected
						 				<?php endif ?>
						 			 ><?php echo $rows->code_name ?></option>
						 		<?php endforeach ?>
						 	<?php endif ?>
						</select>
				    </div> 
				 
				</div>
			</div>  
			<div class="form-inline" style="margin-top:10px" >
				<div class="form-group">
					<button type="submit" class="btn btn-warning">搜尋</button> 
					<button type="button" id="btnExport" class="btn btn-danger">匯出</button>
				</div>
			</div>
	    </div>
	</div>  
 
	<div class="row">
		<div class="col-md-12 sheader"> 
			<table class="table table-striped table-advance table-hover">
				<thead>
					<tr> 
						<th>編號</th>
						<th>公司名稱</th>
						<th>聯絡人</th>
						<th>國家</th> 
						<th>電話</th>
						<th>電子信箱</th>
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
					<!-- 	<td><a href="<?php echo $detail_url.$rows->id?>"><?php echo $rows->id?></a></td>
						<td><a href="<?php echo $detail_url.$rows->id?>"><?php echo $rows->com_name?></a></td>  -->
						<td><?php echo $rows->id?></td>
						<td><?php echo $rows->com_name?></td>
						<td><?php echo $rows->contact_person?></td> 
						<td><?php echo $rows->country?></td>
						<td><?php echo $rows->tel?></td>
						<td><?php echo $rows->email?></td> 
					</tr>
					<?php
						}
					}
					else
					{
					?>
						<tr>
							<td colspan="6">No results.</td>
						</tr>
					<?php
					}
					?>
				</tobdy>
			</table>
		</div>
	</div>
	<div style="text-align:center">
	  <ul class="pagination">
		<?php echo $page_jump?>
	  </ul>
	</div>
 
<?php echo js($this->config->item('contact_javascript'), 'contact')?>

<script>
	var $j = jQuery.noConflict(true);

	function aHover(url)
	{
		location.href = url;
	}

	$j("document").ready(function($) {
		$("#btnExport").click(function(){

			$("#form").attr('action', '<?php echo $export_action ?>');

			$("#form").submit();

			$("#form").attr('action', '<?php echo $form_action ?>');

	 	});
	});

	 
</script>