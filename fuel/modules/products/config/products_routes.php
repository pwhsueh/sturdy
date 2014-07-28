<?php 
//link the controller to the nav link


$route[FUEL_ROUTE.'products/lists'] 			= PRODUCTS_FOLDER.'/products_manage/lists';
$route[FUEL_ROUTE.'products/lists/(:num)'] 		= PRODUCTS_FOLDER.'/products_manage/lists/$1';
$route[FUEL_ROUTE.'products/create'] 			= PRODUCTS_FOLDER.'/products_manage/create';
$route[FUEL_ROUTE.'products/edit/(:num)'] 		= PRODUCTS_FOLDER.'/products_manage/edit/$1';
$route[FUEL_ROUTE.'products/del/(:num)'] 		= PRODUCTS_FOLDER.'/products_manage/do_del/$1';
$route[FUEL_ROUTE.'products/do_create'] 		= PRODUCTS_FOLDER.'/products_manage/do_create';
$route[FUEL_ROUTE.'products/do_edit/(:num)'] 	= PRODUCTS_FOLDER.'/products_manage/do_edit/$1';
$route[FUEL_ROUTE.'products/do_multi_del'] 		= PRODUCTS_FOLDER.'/products_manage/do_multi_del'; 
$route[FUEL_ROUTE.'products/series/(:any)/(:any)/(:any)'] 		= PRODUCTS_FOLDER.'/products_manage/get_series/$1/$2/$3';

 