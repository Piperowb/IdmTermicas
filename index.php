<?php
/**
 * TecnoKing - Front Controller
 * Punto de entrada principal del patrón MVC
 */

define('ROOT', __DIR__);
define('APP_PATH', ROOT . '/app');
define('PUBLIC_PATH', ROOT . '/public');
define('CONFIG_PATH', ROOT . '/config');

// Cargar configuración y autoloader
require_once APP_PATH . '/core/Autoloader.php';
require_once CONFIG_PATH . '/config.php';
require_once APP_PATH . '/core/Router.php';

// Iniciar la aplicación
$router = new Router();
require_once CONFIG_PATH . '/routes.php';

$router->dispatch();
