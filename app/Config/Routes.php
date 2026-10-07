<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/about', 'About::index');
$routes->get('/services', 'Services::index');
$routes->match(['get', 'post'], '/contact', 'Contact::index');
$routes->get('/register', 'Register::index');
$routes->post('/register', 'Register::create');
$routes->match(['get', 'post'], '/login', 'Auth::login');
$routes->post('/logout', 'Auth::logout');
$routes->get('/dashboard', 'Customers::index');
$routes->get('/customers', 'Customers::index');
$routes->get('/customers/new', 'Customers::new');
$routes->post('/customers', 'Customers::create');
$routes->get('/customers/(:num)', 'Customers::show/$1');
$routes->get('/customers/(:num)/edit', 'Customers::edit/$1');
$routes->post('/customers/(:num)', 'Customers::update/$1');
$routes->post('/customers/(:num)/delete', 'Customers::delete/$1');
