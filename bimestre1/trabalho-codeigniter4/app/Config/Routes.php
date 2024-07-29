<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

$routes->get('/signin', 'Home::signin');
$routes->post('/signin', 'Home::login');

$routes->get('/signup', 'Home::signup');
$routes->post('/signup', 'Home::register');

$routes->get('/admin', 'Home::admin');
$routes->get('/collection', 'Home::collection');
    $routes->get('/add_book', 'Home::add_book');
    $routes->post('/add_book', 'Home::new_book');
    $routes->post('/delete_book', 'Home::delete_book');
$routes->get('/control', 'Home::control');

$routes->get('/user', 'Home::user');
$routes->get('/books', 'Home::books');
$routes->get('/my_books', 'Home::my_books');
