<?php
/**
 * TecnoKing - Router
 * Maneja el enrutamiento de la aplicación MVC
 */

class Router
{
    private array $routes = [];

    /**
     * Registra una ruta nueva
     */
    public function add(string $path, string $controller, string $action): void
    {
        $this->routes[$path] = [
            'controller' => $controller,
            'action'     => $action,
        ];
    }

    /**
     * Despacha la solicitud a su controlador y acción correspondiente
     */
    public function dispatch(): void
    {
        // Obtener la URI limpia sin query string
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Detectar el subfolder base (ej: /tecnoking) desde SCRIPT_NAME
        // SCRIPT_NAME = /tecnoking/index.php  →  base = /tecnoking
        $scriptDir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');

        // Quitar el base del inicio de la URI
        if ($scriptDir !== '' && strpos($uri, $scriptDir) === 0) {
            $uri = substr($uri, strlen($scriptDir));
        }

        // Normalizar: siempre empieza con /, nunca termina con / (salvo raíz)
        $uri = '/' . ltrim($uri, '/');
        if ($uri !== '/' && substr($uri, -1) === '/') {
            $uri = rtrim($uri, '/');
        }

        if (array_key_exists($uri, $this->routes)) {
            $route      = $this->routes[$uri];
            $controller = new $route['controller']();
            $action     = $route['action'];
            $controller->$action();
        } else {
            $this->notFound();
        }
    }

    private function notFound(): void
    {
        http_response_code(404);
        if (defined('VIEWS_PATH') && defined('SITE_URL')) {
            $content = VIEWS_PATH . '/pages/404.php';
            if (file_exists($content)) {
                require_once VIEWS_PATH . '/layout.php';
                return;
            }
        }
        echo '<h1>404 - Página no encontrada</h1>';
    }
}
