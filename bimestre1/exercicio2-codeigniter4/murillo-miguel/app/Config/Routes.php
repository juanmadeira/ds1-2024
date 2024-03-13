<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/form', 'Form::index');
$routes->post('/receive', 'Form::receiveData');

$routes->get('/calculadora', 'Calculadora::index');
$routes->post('/calculadora', 'Calculadora::post');

$routes->get('/calcprag', 'Calcprag::index');
$routes->post('/calcprag','Calcprag::index');
$routes->get('/calcbhask', 'Calcprag::bhaskara');
$routes->post('/calcbhask', 'Calcprag::bhaskara');

$routes->get('/exerc1', 'Exerc1Controller::index');
$routes->post('/update', 'Exerc1Controller::update');

//Terraria Bosses

$routes->get('/terrariaindex', 'TerrariaBosses::index');
$routes->post('/terrariaindex', 'TerrariaBosses::update');
$routes->get('/terrariaform', 'TerrariaBosses::form');
$routes->post('/delete', 'TerrariaBosses::delete');

//$routes->post('/delete/(:num)'), 'Home::deletarItemPorURL/$1') UTILIZAR O :NUM COMO PARAMETRO RETIRADO DO URL NA FUNÇÃO