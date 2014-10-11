 
<?php echo css($this->config->item('contact_css'), 'contact')?>

<section class="wrapper">
	<div class="row" style="margin:10px 10px">
	    <div class="col-md-2 sheader"><h4>聯絡明細</h4></div>
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
							<label class="col-sm-2 col-sm-2 control-label">公司名稱</label>
							<div class="col-sm-4">
								<?php echo $row->com_name ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">地址</label>
							<div class="col-sm-4">
								<?php echo $row->com_name ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">聯絡人</label>
							<div class="col-sm-4">
								<?php echo $row->contact_person ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">地址</label>
							<div class="col-sm-4">
								<?php echo $row->address ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">國家</label>
							<div class="col-sm-4">
								<?php echo $row->country ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">電話</label>
							<div class="col-sm-4">
								<?php echo $row->tel ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">傳真</label>
							<div class="col-sm-4">
								<?php echo $row->fax ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">電子郵箱</label>
							<div class="col-sm-4">
								<?php echo $row->email ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">網站</label>
							<div class="col-sm-4">
								<?php echo $row->website ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">公司類型</label>
							<div class="col-sm-4">
								<input type="checkbox" name="comtype" value="manufacturer" <?php echo $row->comtype == "manufacturer"?"checked":"" ?> disabled>製造商
					            <input type="checkbox" name="comtype" value="distributor" <?php echo $row->comtype == "distributor"?"checked":"" ?> disabled>分銷商
					            <input type="checkbox" name="comtype" value="importer" <?php echo $row->comtype == "importer"?"checked":"" ?> disabled>進口商
					            <input type="checkbox" name="comtype" value="enduser" <?php echo $row->comtype == "enduser"?"checked":"" ?> disabled>最終用戶&nbsp;(醫院或診所)
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">員工</label>
							<div class="col-sm-4">
								<input type="checkbox" name="employeenum" value="500" <?php echo $row->employeenum == "500"?"checked":"" ?> disabled>超過500個以上
					            <input type="checkbox" name="employeenum" value="100" <?php echo $row->employeenum == "100"?"checked":"" ?> disabled>100以上
					            <input type="checkbox" name="employeenum" value="50" <?php echo $row->employeenum == "50"?"checked":"" ?> disabled>50以上
					            <input type="checkbox" name="employeenum" value="30" <?php echo $row->employeenum == "30"?"checked":"" ?> disabled>30以上
					            <input type="checkbox" name="employeenum" value="10" <?php echo $row->employeenum == "10"?"checked":"" ?> disabled>10以上
					            <input type="checkbox" name="employeenum" value="less9" <?php echo $row->employeenum == "less9"?"checked":"" ?> disabled>小於9
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">工程師/技術員</label>
							<div class="col-sm-4">
								<input type="checkbox" name="engineer" value="yes" <?php echo $row->engineer == "yes"?"checked":"" ?> disabled>是（有多少人？）
					            <input type="text" name="engineernum" size="2" id="engineernum" value="<?php echo $row->engineernum ?>" />
					            <input type="checkbox" name="engineer" value="no" <?php echo $row->engineer == "no"?"checked":"" ?> disabled>超過10 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">銷售型</label>
							<div class="col-sm-4">
								<input type="checkbox" name="salestype" value="tender" <?php echo $row->salestype == "tender"?"checked":"" ?> disabled>投標
					            <input type="checkbox" name="salestype" value="retail" <?php echo $row->salestype == "retail"?"checked":"" ?> disabled>零售
					            <input type="checkbox" name="salestype" value="both" <?php echo $row->salestype == "both"?"checked":"" ?> disabled>銷量雙雙投標及零售 (T
					            <input type="text" name="bothpercentt" size="2" id="bothpercentt" value="<?php echo $row->bothpercentt ?>" />% R
					            <input type="text" name="bothpercentr" size="2" id="bothpercentr" value="<?php echo $row->bothpercentr ?>"/>% )
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">銷售渠道</label>
							<div class="col-sm-4">
								<input type="checkbox" name="saleschannel" value="hospital" <?php echo $row->saleschannel == "hospital"?"checked":"" ?> disabled>醫院
					            <input type="checkbox" name="saleschannel" value="clinic" <?php echo $row->saleschannel == "clinic"?"checked":"" ?> disabled>診所
					            <input type="checkbox" name="saleschannel" value="dclinic" <?php echo $row->saleschannel == "dclinic"?"checked":"" ?> disabled>牙科 診所
					            <input type="checkbox" name="saleschannel" value="lab" <?php echo $row->saleschannel == "lab"?"checked":"" ?> disabled>實驗室
					            <input type="checkbox" name="saleschannel" value="scientific" <?php echo $row->saleschannel == "scientific"?"checked":"" ?> disabled>科學
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">國家</label>
							<div class="col-sm-4">
								<input type="checkbox" name="territory" value="domestic" <?php echo $row->territory == "domestic"?"checked":"" ?> disabled>國內
					            <input type="checkbox" name="territory" value="international" <?php echo $row->territory == "international"?"checked":"" ?> disabled>國際市場 
					            <input type="text" name="territoryplace" size="8" id="territoryplace" value="<?php echo $row->territoryplace ?>" /> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">你是怎麼知道新駿？</label>
							<div class="col-sm-4">
								<input type="checkbox" name="wherelearnsturdy" value="exhibition" <?php echo $row->wherelearnsturdy == "exhibition"?"checked":"" ?> disabled>展覽（哪一個？）
								<input type="text" name="whichexhibition" size="8" id="whichexhibition" value="<?php echo $row->whichexhibition ?>" /> 
					            <input type="checkbox" name="wherelearnsturdy" value="website" <?php echo $row->wherelearnsturdy == "website"?"checked":"" ?> disabled>網站
					            <input type="checkbox" name="wherelearnsturdy" value="others" <?php echo $row->wherelearnsturdy == "others"?"checked":"" ?> disabled>其他 
					            <input type="text" name="wherelearnsturdyothers" size="8" id="wherelearnsturdyothers" value="<?php echo $row->wherelearnsturdyothers ?>" /> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">有興趣產品（至少選擇一項產品）</label>
							<div class="col-sm-4">
								<input type="checkbox" name="interests" value="autoclave" <?php echo $row->interests == "autoclave"?"checked":"" ?> disabled>高壓滅菌鍋
					            <input type="checkbox" name="interests" value="operationtable" <?php echo $row->interests == "operationtable"?"checked":"" ?> disabled>手術檯
					            <input type="checkbox" name="interests" value="operationlight" <?php echo $row->interests == "operationlight"?"checked":"" ?> disabled>手術燈
					            <input type="checkbox" name="interests" value="suction" <?php echo $row->interests == "suction"?"checked":"" ?> disabled>吸引器
					            <input type="checkbox" name="interests" value="enttableandchair" <?php echo $row->interests == "enttableandchair"?"checked":"" ?> disabled>耳鼻喉科桌椅系列
					            <input type="checkbox" name="interests" value="ultrasoniccleaner" style="margin-left:254px;" <?php echo $row->wherelearnsturdy == "ultrasoniccleaner"?"checked":"" ?> disabled>超聲波清洗機
					            <input type="checkbox" name="interests" value="handpiececleaner" <?php echo $row->interests == "handpiececleaner"?"checked":"" ?> disabled>手機清洗機
					            <input type="checkbox" name="interests" value="emsproducts" <?php echo $row->interests == "emsproducts"?"checked":"" ?> disabled>EMS產品 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">評論</label>
							<div class="col-sm-4">
								<textarea name="comment" size="300" placeholder="" id="comment" disabled/><?php echo $row->comment ?></textarea><br>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>

</section>
     
     