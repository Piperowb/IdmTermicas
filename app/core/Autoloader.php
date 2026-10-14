<?php
/**
 * TecnoKing - Autoloader
 * Carga automática de clases del sistema MVC
 */

spl_autoload_register(function ($className) {
    $paths = [
        APP_PATH . '/core/'        . $className . '.php',
        APP_PATH . '/controllers/' . $className . '.php',
        APP_PATH . '/models/'      . $className . '.php',
    ];

    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
});
