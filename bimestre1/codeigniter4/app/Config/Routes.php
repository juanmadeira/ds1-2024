<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/tela2', 'Home::tela2');
$routes->get('/tela3', 'Home::tela3');

$routes->get('/form', 'Home::form');