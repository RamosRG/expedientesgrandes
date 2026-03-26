<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Ruta principal
$routes->get('/', 'Home::index');

// Grupo USUARIOS
$routes->group('usuarios', function ($routes) {
    // =========================
    // CONSULTAS (GET)
    // =========================
    $routes->get('editarUsuario/(:num)', 'UsuariosController::editarUsuario/$1');
    $routes->post('actualizar/(:num)', 'UsuariosController::actualizar/$1');
    $routes->get('obtenerUsuario/(:num)', 'UsuariosController::obtenerUsuario/$1');
    $routes->get('crearUsuarios', 'UsuariosController::crearUsuarios');
    $routes->get('listar', 'UsuariosController::listar');
    $routes->get('verUsuarios', 'UsuariosController::listar');
    $routes->get('obtenerUsuarios', 'UsuariosController::obtenerUsuarios');
    $routes->get('obtenerUsuariosConRol', 'UsuariosController::obtenerUsuariosConRol');
    
    // Ruta principal para usuarios - AGREGADA PARA EL BOTÓN CANCELAR
    $routes->get('/', 'UsuariosController::listar');

    // POST (cambiar estado)
    $routes->post('cambiarEstado/(:num)', 'UsuariosController::cambiarEstado/$1');
});

$routes->group('admin', function ($routes) {
    $routes->post('guardar', 'AdminController::guardar');
    $routes->get('crearUsuarios', 'UsuariosController::crearUsuarios');
    $routes->get('usuarios', 'UsuariosController::listar');
});