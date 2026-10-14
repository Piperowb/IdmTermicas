<?php
/**
 * TecnoKing - Controlador Base
 * Todos los controladores heredan de esta clase
 */

class Controller
{
    /**
     * Renderiza una vista pasando datos
     */
    protected function render(string $view, array $data = []): void
    {
        // Extraer variables para la vista
        extract($data);

        // Incluir layout principal con la vista
        $viewFile = VIEWS_PATH . '/pages/' . $view . '.php';

        if (!file_exists($viewFile)) {
            throw new Exception("Vista no encontrada: {$view}");
        }

        // Pasar la vista al layout
        $content = $viewFile;
        require_once VIEWS_PATH . '/layout.php';
    }

    /**
     * Retorna JSON (útil para llamadas AJAX / API)
     */
    protected function json(array $data, int $statusCode = 200): void
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    /**
     * Redirige a otra URL
     */
    protected function redirect(string $url): void
    {
        header('Location: ' . SITE_URL . $url);
        exit;
    }
}
