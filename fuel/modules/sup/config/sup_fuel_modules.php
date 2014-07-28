<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['sup_manage'] = array(
		'module_name' => 'Suppport',
		'model_name' => 'sup_manage_model',
		'module_uri' => 'sup/lists',
		'model_location' => 'sup',
		'permission' => 'sup/manage',
		'nav_selected' => 'sup/lists',
		'archivable' => TRUE,
		'instructions' => '新增/修改'
	);
?>