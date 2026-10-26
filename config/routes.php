<?php
require_once CONFIG_PATH . '/config.php';

$router->add('/', 'HomeController', 'index');
$router->add('/nosotros',  'HomeController', 'nosotros');
$router->add('/about-us',  'HomeController', 'nosotros');
$router->add('/noticias',  'HomeController', 'noticias');
$router->add('/contacto',         'HomeController', 'contacto');
$router->add('/contacto/enviar',  'HomeController', 'enviarContacto');
$router->add('/consultoria-e-interventoria', 'HomeController', 'consultoria');
$router->add('/mantenimiento-y-calibracion', 'HomeController', 'mantenimiento');
$router->add('/diseno-y-fabricacion',        'HomeController', 'diseno');

// ── Admin (sin login por ahora) ──
$router->add('/admin',                   'AdminController', 'index');
$router->add('/admin/noticias',          'AdminController', 'noticias');
$router->add('/admin/noticias/crear',    'AdminController', 'crearNoticia');
$router->add('/admin/noticias/guardar',  'AdminController', 'guardarNoticia');
$router->add('/admin/noticias/editar',   'AdminController', 'editarNoticia');
$router->add('/admin/noticias/eliminar', 'AdminController', 'eliminarNoticia');