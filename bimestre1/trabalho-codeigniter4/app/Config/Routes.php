<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('login', 'Home::login');
$routes->get('signup', 'Home::signup');

$routes->post('signup', 'Home::register');