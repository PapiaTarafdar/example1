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
$routes->get('/', 'Home::index');

$routes->get('/students','StudentController::index');
$routes->get('/students/create','StudentController::create');
$routes->post('/students/add','StudentController::store');
$routes->get('student/edit/(:num)','StudentController::edit/$1');
$routes->put('student/update/(:num)','StudentController::update/$1');
$routes->get('student/getDelete/(:num)','StudentController::Delete/$1');
$routes->delete('student/delete-method/(:num)','StudentController::Delete/$1');
$routes->get('/student/confirm-delete/(:num)','StudentController::ConfirmDelete/$1');



$routes->get('products','ProductController::feature');
$routes->get('products/(:any)','ProductController::find/$1');
$routes->group('user', function ($routes) {
    $routes->get('profile/(:any)/(:any)', 'ProductController::user_profile/$1/$2');
    
    $routes->get('orders', function(){
        return "I am User's orders";
    });
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
