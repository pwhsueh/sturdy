<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/


$route['default_controller'] = 'home';
$route['404_override'] = 'fuel/page_router';
// $route['support/(:any)'] = 'support/index/$1'; 

// $route['(:any)/home'] = 'home/index/lang_code=$1'; 
// $route['(:any)/home'] = 'home/index/'; 
// $route['(:any)/support'] = 'support/index/'; 
// $route['(:any)/contact'] = 'contact/index/'; 
// $route['(:any)/about'] = 'about/index/'; 
// $route['(:any)/News_front'] = 'News_front/index/'; 
// $route['(:any)/series'] = 'series/index/'; 
// $route['zh-TW/product/(:num)'] 		= 'series/product/$1';
// $route['product/(:num)'] 		= 'series/product/$1';

 
$lang_ary = array('zh-TW', 'EN', 'ES');

foreach($lang_ary as $l)
{
	$route["$l/home"] = 'home/index/'; 
	$route["$l/support"] = 'support/index/'; 
	$route["$l/contact"] = 'contact/index/'; 
	$route["$l/about"] = 'about/index/'; 
	$route["$l/News_front"] = 'news_front/index/'; 
	$route["$l/series"] = 'series/index/'; 
	$route["$l/contact/do_add"] = 'contact/do_add/'; 
	$route["$l/product/(:num)"] = 'series/product/$1'; 
}
// $route['zh-TW/product/(:num)'] 		= 'series/product/$1';

/*	
| Uncomment this line if you want to use the automatically generated sitemap based on your navigation.
| To modify the sitemap.xml, go to the views/sitemap_xml.php file.
*/ 
//$route['sitemap.xml'] = 'sitemap_xml';

include(MODULES_PATH.'/fuel/config/fuel_routes.php');

/* End of file routes.php */
/* Location: ./application/config/routes.php */