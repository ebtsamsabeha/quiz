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
$route['default_controller']='welcome';

$route['404_override']='admin/Errors';
$route['translate_uri_dashes'] = FALSE;

$route['admin']='admin/HomeController';
// route to user Controller 
$route['admin/login']='admin/LoginController';

$route['admin/logout']='admin/UserController/logout';

$route['admin/users']='admin/UserController';

$route['admin/users/add']='admin/UserController/add';

$route['admin/users/edit/(:any)']='admin/UserController/edit/$1';

$route['admin/users/delete/(:any)']='admin/UserController/delete/$1';
// view user tests 
$route['admin/users/tests/(:any)']='admin/UserController/tests/$1';
// view user test result
$route['admin/users/test_result/(:any)']='admin/UserController/viewTestResult/$1';


// route to test controller 

$route['admin/tests']='admin/TestController';

$route['admin/tests/add']='admin/TestController/add';


$route['admin/tests/validate']='admin/TestController/validate';
$route['admin/tests/edit/(:any)']='admin/TestController/edit/$1';

$route['admin/tests/delete/(:any)']='admin/TestController/delete/$1';

$route['admin/tests/view/(:any)']='admin/TestController/view/$1';

$route['admin/tests/result']='admin/TestController/result';


// route to question controller 
$route['admin/questions']='admin/QuestionController';

$route['admin/questions/add']='admin/QuestionController/add';

$route['admin/questions/validate']='admin/QuestionController/validate';

$route['admin/questions/edit/(:any)']='admin/QuestionController/edit/$1';

$route['admin/questions/delete/(:any)']='admin/QuestionController/delete/$1';

// routes for site 

$route['login']='site/LoginController';
$route['test/(:any)']='site/TestController/index/$1';
$route['result/(:any)']='site/HomeController/result/$1';
$route['tests/result']='site/TestController/result';
$route['logout']='site/HomeController/logout';
$route['send']='site/HomeController/send';
