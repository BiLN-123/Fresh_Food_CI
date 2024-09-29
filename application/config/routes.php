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
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['blog/(:num)-(:any)'] = 'blog/blog_details/$1';
$route['(:num)-(:any)'] = 'shop_details/index/$1';
$route['category/(:num)-(:any)'] = 'category/index/$1';

//$route['admin'] = 'admin/home/index';

//user
$route['login'] = 'user/login';
$route['register'] = 'user/register';
$route['logout'] = 'user/logout';

$route['user/purchase'] = 'order/purchase';
$route['user/purchase/delete/(:num)'] = 'order/delete/$1';
$route['user/purchase/show/(:num)'] = 'order/show/$1';

//admin

//product
$route['admin/product/list/all'] = 'admin/product/index';
$route['admin/product/list/active'] = 'admin/product/index';
$route['admin/product/list/soldout'] = 'admin/product/index';
$route['admin/product/list/unlisted'] = 'admin/product/index';


//order
$route['admin/order/list/all'] = 'admin/order/index';
$route['admin/order/list/unpaid'] = 'admin/order/index';
$route['admin/order/list/shipment'] = 'admin/order/index';
$route['admin/order/list/shipping'] = 'admin/order/index';
$route['admin/order/list/completed'] = 'admin/order/index';
$route['admin/order/list/cancelled'] = 'admin/order/index';

//user manager
$route['admin/user/list/all'] = 'admin/user/index';
$route['admin/user/list/active'] = 'admin/user/index';
$route['admin/user/list/hidden'] = 'admin/user/index';
