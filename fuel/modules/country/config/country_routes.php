<?php 
//link the controller to the nav link


$route[FUEL_ROUTE.'country/lists'] 			= COUNTRY_FOLDER.'/country_manage/lists';
$route[FUEL_ROUTE.'country/lists/(:num)'] 		= COUNTRY_FOLDER.'/country_manage/lists/$1';
$route[FUEL_ROUTE.'country/create'] 			= COUNTRY_FOLDER.'/country_manage/create';
$route[FUEL_ROUTE.'country/edit/(:num)'] 		= COUNTRY_FOLDER.'/country_manage/edit/$1';
$route[FUEL_ROUTE.'country/del/(:num)'] 		= COUNTRY_FOLDER.'/country_manage/do_del/$1';
$route[FUEL_ROUTE.'country/do_create'] 		= COUNTRY_FOLDER.'/country_manage/do_create';
$route[FUEL_ROUTE.'country/do_edit/(:num)'] 	= COUNTRY_FOLDER.'/country_manage/do_edit/$1';
$route[FUEL_ROUTE.'country/do_multi_del'] 		= COUNTRY_FOLDER.'/country_manage/do_multi_del';
 