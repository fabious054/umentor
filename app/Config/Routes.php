<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Crud::index');
$routes->post('/adicionar', 'Crud::adicionar');
$routes->post('/editar', 'Crud::editar');

$routes->get('/buscar', 'Crud::buscar');