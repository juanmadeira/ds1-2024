<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/index', 'Home::index');

$routes->get('/signin', 'Home::signin');
$routes->get('/signup', 'Home::signup');

$routes->post('/signup', 'Home::register');
$routes->post('/signin', 'Home::login');