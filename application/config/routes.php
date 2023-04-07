<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = 'error404';
$route['translate_uri_dashes'] = TRUE;
$route['san-pham/(:any)/(:any)'] 			= "san-pham/index/$1/$2";
$route['san-pham/(:any)'] 					= "san-pham/index/$1";
$route['san-pham']                          = "san-pham";
$route['tin-tuc-su-kien/(:any)/(:any)'] 	= "tin-tuc-su-kien/index/$1/$2";
$route['tin-tuc-su-kien/(:any)'] 			= "tin-tuc-su-kien/index/$1";
$route['ho-tro-khach-hang/(:any)/(:any)'] 	= "ho-tro-khach-hang/index/$1/$2";
$route['ho-tro-khach-hang/(:any)'] 			= "ho-tro-khach-hang/index/$1";
$route['hoi-dap/(:any)/(:any)'] 			= "hoi-dap/index/$1/$2";
$route['hoi-dap/(:any)'] 					= "hoi-dap/index/$1";
$route['thong-tin-chung/(:any)/(:any)'] 	= "thong-tin-chung/index/$1/$2";
$route['thong-tin-chung/(:any)'] 			= "thong-tin-chung/index/$1";
$route['lien-he/ajax-contact']				= 'lien-he/ajax-contact';
$route['test']				                = 'bieu-phi-dich-vu/index1';