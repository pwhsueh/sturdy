<?php
/*
|--------------------------------------------------------------------------
| FUEL NAVIGATION: An array of navigation items for the left menu
|--------------------------------------------------------------------------
*/
$config['nav']['codekind'] = array(
'codekind/lists'		=> '分類列表',

'codekind/lists1'		=> '分類列表2',

'codekind/list2s'		=> '分類列表3'
);

// $config['nav']['blog'] = array(
// 	'blog/posts' => lang('module_blog_posts'), 
// 	'blog/categories' => lang('module_blog_categories'),  
// 	'blog/comments' => lang('module_blog_comments'), 
// 	'blog/links' => lang('module_blog_links'), 
// 	'blog/users' => lang('module_blog_authors'), 
// );

// deterines whether to use this configuration below or the database for controlling the blogs behavior
$config['crawleruse_db_table_settings'] = TRUE;

// the cache folder to hold blog cache files
$config['codekind'] = 'codekind';

$config['tables']['mod_codekind'] = 'mod_codekind';


$config['codekind_javascript'] = array(
	'jquery.js',
	'jquery.min.js',
	'bootstrap.min',
	'jquery-ui.min.js',
	'jquery.sparkline.js',
);

$config['codekind_css'] = array(
	'bootstrap.min.css',
	'bootstrap-reset.css',
	'font-awesome/css/font-awesome.css',
	'jquery-easy-pie-chart/jquery.easy-pie-chart.css',
	'style.css',
	'style-responsive.css',
	'admin_style.css',
	'jquery-ui.css'
);

?>