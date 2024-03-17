<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->post('/', 'Home::update');
$routes->get('/insert artist', 'Home::insertArtist');