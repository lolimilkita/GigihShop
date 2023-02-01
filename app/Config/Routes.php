<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Pages::index');

$routes->group('admin', ['filter' => 'role:admin'], static function ($routes) {
    $routes->get('/admin', 'Admin::index');
    
    $routes->get('/admin/barangdetail/(:num)', 'Admin::barangdetail/$1');
    $routes->delete('/admin/barangdelete/(:num)', 'Admin::barangdelete/$1');
    $routes->get('/admin/barangupdate/(:num)', 'Admin::barangupdate/$1');
    $routes->get('/admin/barangsave', 'Admin::barangsave');
    
    $routes->get('/admin/kota', 'Admin::kota');
    $routes->get('/admin/kota/index', 'Admin::kota');
    $routes->get('/admin/kota/kotasave', 'Admin::kotasave');
    $routes->delete('/admin/kota/kotadelete/(:num)', 'Admin::kotadelete/$1');
    $routes->get('/admin/kota/kotaedit/(:num)', 'Admin::kotaedit/$1');
    $routes->get('/admin/kota/kotaupdate/(:num)', 'Admin::kotaupdate/$1');
    
    $routes->get('/admin/banner', 'Admin::banner');
    $routes->get('/admin/banner/index', 'Admin::banner');
    $routes->get('/admin/bannersave', 'Admin::bannersave');
    $routes->delete('/admin/bannerdelete/(:num)', 'Admin::bannerdelete/$1');
    $routes->get('/admin/banneredit/(:num)', 'Admin::banneredit/$1');
    $routes->get('/admin/bannerupdate/(:num)', 'Admin::bannerupdate/$1');
    
    $routes->get('/admin/pesanan', 'Admin::pesanan');
    $routes->get('/admin/pesanan/index', 'Admin::pesanan');
    $routes->get('/admin/pesananedit/(:num)', 'Admin::pesananedit/$1');
    $routes->get('/admin/pesananupdate/(:num)', 'Admin::pesananupdate/$1');
});

$routes->group('admin', ['filter' => 'role:user'], static function ($routes) {
    $routes->get('/pesanan', 'Pesanan::index');
    $routes->get('/pesanan/index', 'Pesanan::index');
    $routes->get('/pesanan/pesanan', 'Pesanan::pesanan');
    $routes->get('/pesanan/detail/(:num)', 'Pesanan::detail/$1');
    $routes->delete('/pesanan/delete/(:num)', 'Pesanan::delete/$1');
    $routes->get('/pesanan/berhasil', 'Pesanan::berhasil');
    $routes->get('/pesanan/savepesanan', 'Pesanan::savepesanan');
    
    $routes->get('/keranjang/tambah/(:num)', 'Keranjang::tambah/$1');
    $routes->delete('/keranjang/(:num)', 'Keranjang::delete/$1');
    $routes->get('/keranjang/detail/(:num)', 'Keranjang::detail/$1');
    $routes->get('/keranjang/delete/(:num)', 'Keranjang::fucku/$1');
});




/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
