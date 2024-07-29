<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'FirstAm::index');
$routes->post('/', 'FirstAm::update');
$routes->get('/insert artist', 'FirstAm::insertArtist');
$routes->post('/delete', 'FirstAm::delete');
$routes->post('/edit', 'FirstAm::edit');
