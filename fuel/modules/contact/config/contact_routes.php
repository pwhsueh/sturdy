<?php 
//link the controller to the nav link


$route[FUEL_ROUTE.'contact/lists'] 			    = CONTACT_FOLDER.'/contact_manage/lists';
$route[FUEL_ROUTE.'contact/lists/(:num)'] 		= CONTACT_FOLDER.'/contact_manage/lists/$1'; 
$route[FUEL_ROUTE.'contact/detail/(:num)'] 		= CONTACT_FOLDER.'/contact_manage/detail/$1'; 
$route[FUEL_ROUTE.'contact/export_excel'] 		= CONTACT_FOLDER.'/contact_manage/export_excel'; 