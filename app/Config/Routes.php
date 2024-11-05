<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//$routes->get('users','Users::index');
//$routes->get('users/new','Users::new');

$routes->resource('users', ['placeholder' => '(:num)', 'except' => 'show']);
