<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

$routes->group('', ['filter' => 'login'], function ($routes) {
    $routes->get('/file/add', 'File::add');
    $routes->post('/file/add', 'File::process');
    $routes->post('/file/process', 'File::process');

    //user
    $routes->get('/user/list', 'Users::data');
//    $routes->get('/user/detail', 'Users::detail');
    $routes->get('/user/(:num)', 'Users::detail/$1');


    $routes->get('/', 'Home::index');
    $routes->get('/home', 'Home::index');

    //USER
    $routes->get('/user', 'Users::index');
    $routes->get('user/list', 'Users::data');

    //FILE
    $routes->get('/file', 'File::index');
    $routes->post('/file/add', 'File::process');
    $routes->get('/file/list', 'File::data');

    //history pengajuan
    $routes->get('/history', 'History::index');
    $routes->get('/history/list', 'History::data');

    //Pengajuan Form
    $routes->get('/cuti', 'Form::cuti');
    $routes->post('Form/process_cuti', 'Form::process_cuti');

    //Pengajuan Mutasi
    $routes->get('/mutasi-masuk-keluar', 'Form::masuk');

    //1. Masuk / Keluar
    $routes->get('/mutasi-skpd', 'Form::skpd');
    $routes->get('/cuti/add', 'Form::process_cuti');

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
