
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

/* ===== custom routes ======= */ 
$route['logout'] = 'admin/auth/logout';
$route['login'] = 'admin/auth';
$route['dashboard'] = 'admin/dashboard';
$route['produk'] = 'admin/produk';
$route['kategori'] = 'admin/kategori'; 
$route['kategori'] = 'admin/kategori';
$route['invoice'] = 'admin/invoice';
$route['menu'] = 'admin/menu';
$route['users'] = 'admin/users';

// Produk
$route['produk/tambah'] = 'admin/produk/tambahProduk';
$route['produk/tambahAksi'] = 'admin/produk/tambahProdukAksi';

$route['produk/update/(:num)'] = 'admin/produk/update/$1';
$route['produk/updateAksi'] = 'admin/produk/updateAksi';

$route['produk/detail/(:num)'] = 'admin/produk/detail/$1';
$route['produk/delete/(:num)'] = 'admin/produk/delete/$1';

// kategori produk
$route['kategori/tambah'] = 'admin/kategori/tambahKategori';
$route['kategori/tambahAksi'] = 'admin/kategori/tambahKategoriAksi';

$route['kategori/update/(:num)'] = 'admin/kategori/updateKategori/$1';
$route['kategori/updateAksi'] = 'admin/kategori/updateKategoriAksi';

$route['kategori/hapus/(:num)'] = 'admin/kategori/deleteKategori/$1';

// shop pada controllers user
// $route['shop/(:num)'] = 'shop/index/$1';
// $route['shop/(:any)'] = 'shop/kategori/$1';

// users pada controllers admin
$route['users'] = 'admin/users';
$route['users/tambah'] = 'admin/users/tambahUser';
$route['users/tambahAksi'] = 'admin/users/tambahUserAksi';
$route['users/update/(:num)'] = 'admin/users/updateUser/$1';
$route['users/delete/(:num)'] = 'admin/users/deleteUser/$1';
$route['users/updateAksi'] = 'admin/users/updateUserAksi';
$route['users/deactivateUser/(:num)'] = 'admin/users/deactivateUser/$1';
$route['users/activateUser/(:num)'] = 'admin/users/activateUser/$1';
$route['users/setUserStatus/(:num)/(:any)'] = 'admin/users/setUserStatus/$1/$2';


// search pada controller shop
$route['search'] = 'shop/search';


