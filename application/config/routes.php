<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//$route['timeline/update/(:any)'] = 'timeline/update/$1';
//$route['timeline/view_profile/(:any)']='timeline/view_profile/$1';
//$route['timeline/(:any)/(:num)'] = 'timeline/view/$1/$2';
//$route['friends/follow'] = 'friends/follow';
//$route['friends'] = 'friends/index';
//$route['timeline/add'] = 'timeline/add';
//$route['timeline/update_submit'] = 'timeline/update_submit';
//
//$route['timeline/(:any)'] = 'timeline/delete/$1';
//$route['timeline/(:any)/(:num)'] = 'timeline/view/$1/$2';
//
//
$route['timeline'] = 'timeline/index';
//
////set default opening path to application
$route['default_controller'] = 'authentication/login_user';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
//
//
//$route['(:any)'] = 'pages/view/$1';

