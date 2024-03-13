<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/index', 'Home::index');
$routes->post('/index', 'Home::update');
$routes->get('/insert_artist', 'Home::insertArtist');