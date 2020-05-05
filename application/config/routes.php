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
$route['default_controller'] = 'welcome';
// route login
$route['auth'] = 'auth';

// route dashboard
/*$route['dashboard'] = 'dashboard';

// // route untuk halaman blog
$route['blog'] = 'welcome/blog';
$route['blog/(:num)'] = 'welcome/blog/$1';

// route untuk halaman kategori artikel
$route['kategori/(:any)'] = 'welcome/kategori/$1';
$route['kategori/(:any)/(:num)'] = 'welcome/kategori/$1/$s2';

// route untuk halaman cari artikel
$route['search'] = 'welcome/search';
$route['search/(:any)'] = 'welcome/search/$1';
$route['search/(:any)/(:num)'] = 'welcome/search/$1/$2';

// route untuk halaman page
$route['page/(:any)'] = 'welcome/page/$1';

// route URL SEO untuk artikel
$route['(:any)'] = 'welcome/single/$1';

$route['404_override'] = 'welcome/notfound';
$route['translate_uri_dashes'] = FALSE;
*/