<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();
// $session = \Config\Services::session();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Pages');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->add('/session', 'Product_cart::session');


$routes->add('/', 'Pages::index', ['namespace' => 'App\Controllers']);
$routes->add('/index', 'Pages::index', ['namespace' => 'App\Controllers']);
$routes->add('/sanpham', 'Pages::sanpham');
$routes->add('/product_item/(:any)', 'Pages::chitietsp/$1');

$routes->add('/tamtinh/(:any)/(:any)', 'Product_cart::tamtongtien');
$routes->post('/cart/remove/(:any)', 'Product_cart::remove_sanpham/$1');
$routes->post('/cart_header/remove', 'Product_cart::remove_header_cart');
$routes->add('/tongtien', 'Product_cart::tongtien');
$routes->add('/huygiohang', 'Product_cart::huygiohang');
$routes->add('/thanhtoan', 'Product_cart::thanhtoan');
$routes->post('/quantri/distric/(:any)', 'Product_cart::distric/$1');
$routes->post('/quantri/commune/(:any)', 'Product_cart::commune/$1');


// đăng nhập quản trị
$routes->add('/quantri', 'Administration::administrationLogin');
$routes->post('/action_page_login', 'Administration::administrationLogin_action');
$routes->match(['get','post'],'/create_user', 'Administration::administrationCreateUserPage');
$routes->match(['get','post'],'/user_profile/(:any)', 'Administration::userProfile/$1', ['filter' => 'authfilter']);

$routes->match(['get','post'],'/logout_user', 'Administration::logoutUser');
$routes->match(['get','post'],'/welcome_page', 'Administration::administrationWelcomePage',['filter' => 'authfilter']);
$routes->match(['get','post'],'/list_user', 'Administration::administrationListUser',['filter' => 'authfilter']);
$routes->match(['get','post'],'/update_user/(:any)', 'Administration::adminUpdateUser/$1',['filter' => 'authfilter']);	
// $routes->post('/action_create_user', 'Administration::administrationActionCreateUser');
//$routes->match(['get','post'],'/action_page_login', 'Administration::administrationLogin'); //tốt hơn 

// thêm xóa sửa sản phẩm trong quản trị
$routes->add('/quantri/sanpham', 'Administration::administrationAddProduct_Controllers', ['filter' => 'authfilter']);
$routes->add('/quantri/danhsach', 'Administration::administrationListProduct_Controllers', ['filter' => 'authfilter']);
$routes->add('/quantri/quantrixoasanpham/(:any)', 'Administration::administrationDeleteProduct_Controllers/$1', ['filter' => 'authfilter']);
$routes->add('/quantri/quantrisuasanpham/(:any)', 'Administration::administrationEditProduct_Controllers/$1', ['filter' => 'authfilter']);
$routes->post('/quantri/sanpham/insert', 'Administration::administrationInsertProduct_Controllers', ['filter' => 'authfilter']);
$routes->post('/quantri/statusproduct/update', 'Administration::administrationUpdateStatusProduct_Controllers', ['filter' => 'authfilter']);
$routes->post('/quantri/listproduct/update', 'Administration::administrationUpdateProduct_Controllers', ['filter' => 'authfilter']);


// $routes->get('session', 'Pages::session');
// $routes->get('/blog/create', 'Blog::create');
// $routes->get('(:any)', 'Pages::showme/$1');	

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
