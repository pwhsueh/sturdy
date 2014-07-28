<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['products_manage'] = array(
		'module_name' => '產品管理',
		'model_name' => 'products_manage_model',
		'module_uri' => 'products/lists',
		'model_location' => 'products',
		'permission' => 'products/manage',
		'nav_selected' => 'products/lists',
		'archivable' => TRUE,
		'instructions' => '新增/修改'
	);
?>