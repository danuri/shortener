<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group("api", function ($routes) {
    $routes->post('create', 'Api::create');
});

$routes->get('(:any)', 'Home::link/$1');
