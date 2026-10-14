<?php
require_once CONFIG_PATH . '/config.php';

$router->add('/', 'HomeController', 'index');
$router->add('/about-us', 'HomeController', 'nosotros');
$router->add('/noticias', 'HomeController', 'noticias');
$router->add('/contacto', 'HomeController', 'contacto');
$router->add('/consultoria-e-interventoria', 'HomeController', 'consultoria');
$router->add('/mantenimiento-y-calibracion', 'HomeController', 'mantenimiento');
$router->add('/diseno-y-fabricacion', 'HomeController', 'diseno');
$router->add('/contacto/enviar', 'HomeController', 'enviarContacto');