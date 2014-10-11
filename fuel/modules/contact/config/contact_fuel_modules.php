<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['country_manage'] = array(
		'module_name' => '聯絡我們',
		'model_name' => 'contact_manage_model',
		'module_uri' => 'contact/lists',
		'model_location' => 'contact',
		'permission' => 'contact',
		'nav_selected' => 'contact/lists',
		'archivable' => TRUE,
		'instructions' => '新增/修改'
	);
?>