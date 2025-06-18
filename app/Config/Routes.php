<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
//Common Routes
$routes->get('/', 'Welcome::index');
$routes->post('GetLogin', 'Welcome::index');
$routes->get('blocked', 'Welcome::forbiddenPage');
$routes->get('register', 'Welcome::register');
$routes->post('register', 'Welcome::registration');
$routes->get('home', 'Home::index');
$routes->get('users', 'Users::index');
$routes->get('dosen', 'Dosen::index');
$routes->get('Dosen/form', 'Dosen::form');
$routes->get('dosen/searchUser', 'Dosen::searchUser');
$routes->get('/Welcome/logout', 'Welcome::logout');

// Setting Routes
$routes->get('/users/userRoleAccess', 'Users::userRoleAccess');
$routes->post('/users/createRole', 'Users::createRole');
$routes->post('users/updateRole', 'Users::updateRole');
$routes->delete('users/deleteRole', 'Users::deleteRole');
$routes->post('users/createUser', 'Users::createUser');
$routes->post('users/updateUser', 'Users::updateUser');
$routes->delete('users/deleteUser', 'Users::deleteUser');
$routes->post('users/changeMenuPermission', 'Users::changeMenuPermission');
$routes->post('users/changeMenuCategoryPermission', 'Users::changeMenuCategoryPermission');
$routes->post('users/changeSubMenuPermission', 'Users::changeSubMenuPermission');

$routes->post('menuManagement/createMenuCategory', 'Developers\MenuManagement::createMenuCategory');
$routes->post('menuManagement/createMenu', 'Developers\MenuManagement::createMenu');
$routes->post('menuManagement/createSubMenu', 'Developers\MenuManagement::createSubMenu');

//Developer Routes
$routes->get('menuManagement', 'Developers\MenuManagement::index');
$routes->get('crudGenerator', 'Developers\CRUDGenerator::index');

// Fitur Prodi
$routes->get('prodi', 'Prodi::index');
$routes->get('prodi/form', 'Prodi::form');
$routes->get('prodi/form/(:num)', 'Prodi::form/$1');
$routes->post('prodi/save', 'Prodi::save');
$routes->get('prodi/delete/(:num)', 'Prodi::delete/$1');

// Fitur Lembaga Akreditasi
$routes->get('lembaga', 'Lembaga::index');
$routes->get('lembaga/form', 'Lembaga::form');
$routes->get('lembaga/form/(:num)', 'Lembaga::form/$1');
$routes->post('lembaga/save', 'Lembaga::save');
$routes->get('lembaga/delete/(:num)', 'Lembaga::delete/$1');

// Fitur Standar Akreditasi
$routes->get('standar', 'Standar::index');                              // Halaman daftar standar
$routes->get('standar/form', 'Standar::form');                          // Form tambah
$routes->get('standar/form/(:num)', 'Standar::form/$1');               // Form edit berdasarkan ID
$routes->post('standar/save', 'Standar::saveStandar');                 // Proses simpan data baru
$routes->post('standar/save/(:num)', 'Standar::saveStandar/$1');       // Proses update data berdasarkan ID
$routes->get('standar/delete/(:num)', 'Standar::deleteStandar/$1');    // Hapus data

// Fitur Capaian Kinerja
$routes->get('/capaian', 'Capaian::index');
$routes->get('/capaian/form', 'Capaian::form');
$routes->get('/capaian/form/(:num)', 'Capaian::form/$1');
$routes->post('/capaian/create', 'Capaian::create');
$routes->post('/capaian/update', 'Capaian::update');
$routes->get('/capaian/delete/(:num)', 'Capaian::delete/$1');
