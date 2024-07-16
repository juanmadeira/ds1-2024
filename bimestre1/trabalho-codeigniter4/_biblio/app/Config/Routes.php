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
$routes->post('/edit', 'TerrariaBosses::edit');

//$routes->post('/delete/(:num)'), 'Home::deletarItemPorURL/$1') UTILIZAR O :NUM COMO PARAMETRO RETIRADO DO URL NA FUNÇÃO

$routes->get('/index', 'BiblioController::index');
$routes->get('/login', 'BiblioController::loginpage');
$routes->get('/cadastro', 'BiblioController::registerpage');

$routes->get('/logout', 'BiblioController::logout');
$routes->post('/cadastro', 'BiblioController::register');
$routes->post('/login', 'BiblioController::login');

$routes->get('/books', 'BiblioController::booksPage');
$routes->get('insertbooks', 'BiblioController::insertBooksPage');
$routes->post('insertbooks', 'BiblioController::insertBooks');
$routes->post('editbooks', 'BiblioController::editBooksPage');
$routes->post('updatebooks', 'BiblioController::updateBooks');
$routes->post('deletebooks', 'BiblioController::deleteBooks');

$routes->post('takebook', 'BiblioController::takeBook');
$routes->post('givebackbook', 'BiblioController::giveBackBook');
$routes->get('emprest', 'BiblioController::emprestimosPage');
$routes->get('insertemprest', 'BiblioController::insertEmprestPage');
$routes->post('insertemprest', 'BiblioController::insertEmprest');
$routes->post('editemprest', 'BiblioController::editEmprestPage');
$routes->post('updateemprest', 'BiblioController::updateEmprest');
$routes->post('deleteemprest', 'BiblioController::deleteEmprest');