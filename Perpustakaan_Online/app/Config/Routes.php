<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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
$routes->group('admin', function ($routes) {

	$routes->add('/', 'Admin\Utama_A::index');

	// Route Profile
	$routes->add('profile', 'Admin\Anggota_A::profile');

	// Route Buku
	$routes->add('book', 'Admin\Buku_A::read');
	$routes->add('book/add', 'Admin\Buku_A::create');
	$routes->add('book/view/(:any)', 'Admin\Buku_A::view/$1');
	$routes->add('book/update/(:any)', 'Admin\Buku_A::update/$1');
	$routes->add('book/delete/(:any)', 'Admin\Buku_A::delete/$1');

	// Route Editor
	$routes->add('editor', 'Admin\Editor_A::read');
	$routes->add('editor/add', 'Admin\Editor_A::create');
	$routes->add('editor/view/(:any)', 'Admin\Editor_A::view/$1');
	$routes->add('editor/update/(:any)', 'Admin\Editor_A::update/$1');
	$routes->add('editor/delete/(:any)', 'Admin\Editor_A::delete/$1');

	// Route Peminjaman
	$routes->add('borrow', 'Admin\Peminjaman_A::read');
	$routes->add('borrow/add', 'Admin\Peminjaman_A::create');
	$routes->add('borrow/view/(:any)', 'Admin\Peminjaman_A::view/$1');
	$routes->add('borrow/update/(:any)', 'Admin\Peminjaman_A::update/$1');
	$routes->add('borrow/delete/(:any)', 'Admin\Peminjaman_A::delete/$1');

	// Route penerbit
	$routes->add('publisher', 'Admin\Penerbit_A::read');
	$routes->add('publisher/add', 'Admin\Penerbit_A::create');
	$routes->add('publisher/view/(:any)', 'Admin\Penerbit_A::view/$1');
	$routes->add('publisher/update/(:any)', 'Admin\Penerbit_A::update/$1');
	$routes->add('publisher/delete/(:any)', 'Admin\Penerbit_A::delete/$1');

	// Route pengembalian
	$routes->add('return', 'Admin\Pengembalian_A::read');
	$routes->add('return/add', 'Admin\Pengembalian_A::create');
	$routes->add('return/view/(:any)', 'Admin\Pengembalian_A::view/$1');
	$routes->add('return/update/(:any)', 'Admin\Pengembalian_A::update/$1');
	$routes->add('return/delete/(:any)', 'Admin\Pengembalian_A::delete/$1');

	// Route Penulis
	$routes->add('writer', 'Admin\Penulis_A::read');
	$routes->add('writer/add', 'Admin\Penulis_A::create');
	$routes->add('writer/view/(:any)', 'Admin\Penulis_A::view/$1');
	$routes->add('writer/update/(:any)', 'Admin\Penulis_A::update/$1');
	$routes->add('writer/delete/(:any)', 'Admin\Penulis_A::delete/$1');

	// Route Rak
	$routes->add('rack', 'Admin\Rak_A::read');
	$routes->add('rack/add', 'Admin\Rak_A::create');
	$routes->add('rack/view/(:any)', 'Admin\Rak_A::view/$1');
	$routes->add('rack/update/(:any)', 'Admin\Rak_A::update/$1');
	$routes->add('rack/delete/(:any)', 'Admin\Rak_A::delete/$1');
});

$routes->get('/login', 'Auth\Authorisasi::login');
$routes->get('/register', 'Auth\Authorisasi::register');

$routes->group('user', function ($routes) {

	$routes->add('/', 'Users\Utama_U::index');

	// Route Profile
	$routes->add('profile', 'Users\Anggota_U::profile');

	// Route Buku
	$routes->add('book', 'Users\Buku_U::read');
	$routes->add('book/view/(:any)', 'Users\Buku_U::view/$1');

	// Route Editor
	$routes->add('editor', 'Users\Editor_U::read');
	$routes->add('editor/view/(:any)', 'Users\Editor_U::view/$1');

	// Route Peminjaman
	$routes->add('borrow', 'Users\Peminjaman_U::read');
	$routes->add('borrow/pdf/(:any)', 'Users\Peminjaman_U::pdf');
	$routes->add('borrow/view/(:any)', 'Users\Peminjaman_U::view/$1');

	// Route penerbit
	$routes->add('publisher', 'Users\Penerbit_U::read');
	$routes->add('publisher/view/(:any)', 'Users\Penerbit_U::view/$1');

	// Route pengembalian
	$routes->add('return', 'Users\Pengembalian_U::read');
	$routes->add('return/pdf/(:any)', 'Users\Pengembalian_U::pdf');
	$routes->add('return/view/(:any)', 'Users\Pengembalian_U::view/$1');

	// Route Penulis
	$routes->add('writer', 'Users\Penulis_U::read');
	$routes->add('writer/view/(:any)', 'Users\Penulis_U::view/$1');

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
