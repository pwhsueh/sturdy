<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['country_manage'] = array(
		'module_name' => '區域管理員維護',
		'model_name' => 'country_manage_model',
		'module_uri' => 'country/lists',
		'model_location' => 'country',
		'permission' => 'country/manage',
		'nav_selected' => 'country/lists',
		'archivable' => TRUE,
		'instructions' => '新增/修改區域管理員'
	);
?>