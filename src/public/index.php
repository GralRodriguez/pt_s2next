<?php

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

// Definición ruta de la base sqlite
define('DB_DIR', __DIR__ . '/../data/base.db');
define('DB_OPTS', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC]);
define('DB_STR_CONN', 'sqlite:' . DB_DIR);

// Definición ruta de las vistas
define('VIEW_DIR', __DIR__ . '/../s2next/views');

use S2Next\Router;
use S2Next\Model\Db\DbService;

$db = new DbService();
$db->condicionesIniciales();

$router = new Router();

$router->get('/', [S2Next\Controller\MenuController::class, 'index']);
$router->get('/crear', [S2Next\Controller\MenuController::class, 'crear']);
$router->post('/crear', [S2Next\Controller\MenuController::class, 'crearpost']);
$router->post('/actualizar', [S2Next\Controller\MenuController::class, 'actualizar']); // Cambiar, ya hay manejo de parametros!
$router->post('/actualizarpost', [S2Next\Controller\MenuController::class, 'actualizarpost']);
$router->get('/mostrar', [S2Next\Controller\MenuController::class, 'mostrar']);
$router->post('/mostrar', [S2Next\Controller\MenuController::class, 'mostrarpost']); // Cambiar, ya hay manejo de parametros!
$router->get('/eliminar', [S2Next\Controller\MenuController::class, 'eliminar']);
$router->post('/eliminar', [S2Next\Controller\MenuController::class, 'eliminar']); // Falto cambiar vista, se envia ya la prueba por cuestiones de tiempo, si se solicita se actualiza en repositorio github

/*
$router->get($_SERVER['REQUEST_URI'] . '', [S2Next\Controller\MenuController::class, 'index']);
$router->get($_SERVER['REQUEST_URI'] . 'crear', [S2Next\Controller\MenuController::class, 'crear']);
$router->post($_SERVER['REQUEST_URI'] . 'crear', [S2Next\Controller\MenuController::class, 'crearpost']);
$router->post($_SERVER['REQUEST_URI'] . 'actualizar', [S2Next\Controller\MenuController::class, 'actualizar']); // Cambiar, ya hay manejo de parametros!
$router->post($_SERVER['REQUEST_URI'] . 'actualizarpost', [S2Next\Controller\MenuController::class, 'actualizarpost']);
$router->get($_SERVER['REQUEST_URI'] . 'mostrar', [S2Next\Controller\MenuController::class, 'mostrar']);
$router->post($_SERVER['REQUEST_URI'] . 'mostrar', [S2Next\Controller\MenuController::class, 'mostrarpost']); // Cambiar, ya hay manejo de parametros!
$router->get($_SERVER['REQUEST_URI'] . 'eliminar', [S2Next\Controller\MenuController::class, 'eliminar']);
$router->post($_SERVER['REQUEST_URI'] . 'eliminar', [S2Next\Controller\MenuController::class, 'eliminar']); // Falto cambiar vista, se envia ya la prueba por cuestiones de tiempo, si se solicita se actualiza en repositorio github
*/
echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

?>