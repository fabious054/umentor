<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Crud::index');
$routes->get('/buscar', 'Crud::buscar');
$routes->get('/deletar', 'Crud::deletar');

$routes->post('/adicionar', 'Crud::adicionar');
$routes->post('/editar', 'Crud::editar');
