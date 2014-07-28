<?php 
//link the controller to the nav link


$route[FUEL_ROUTE.'sup/lists'] 			    = SUP_FOLDER.'/sup_manage/lists';
$route[FUEL_ROUTE.'sup/lists/(:num)'] 		= SUP_FOLDER.'/sup_manage/lists/$1';
$route[FUEL_ROUTE.'sup/create'] 			= SUP_FOLDER.'/sup_manage/create';
$route[FUEL_ROUTE.'sup/edit/(:num)'] 		= SUP_FOLDER.'/sup_manage/edit/$1';
$route[FUEL_ROUTE.'sup/del/(:num)'] 		= SUP_FOLDER.'/sup_manage/do_del/$1';
$route[FUEL_ROUTE.'sup/do_create'] 		    = SUP_FOLDER.'/sup_manage/do_create';
$route[FUEL_ROUTE.'sup/do_edit/(:num)'] 	= SUP_FOLDER.'/sup_manage/do_edit/$1';
$route[FUEL_ROUTE.'sup/do_multi_del'] 		= SUP_FOLDER.'/sup_manage/do_multi_del';  
$route[FUEL_ROUTE.'sup/type/(:any)'] 		= SUP_FOLDER.'/sup_manage/get_type/$1'; 

 