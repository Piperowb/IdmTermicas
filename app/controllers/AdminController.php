<?php
class AdminController extends Controller
{
    // ── Dashboard ──
    public function index(): void
    {
        $data = [
            'pageTitle'  => 'Admin — IDM Térmicas',
            'activeMenu' => '',
            'noticias'   => NewsModel::getAll(),
        ];
        $this->renderAdmin('admin/dashboard', $data);
    }

    // ── Listado de noticias ──
    public function noticias(): void
    {
        $data = [
            'pageTitle' => 'Noticias — Admin',
            'noticias'  => NewsModel::getAll(),
            'tipos'     => NewsModel::getTipos(),
        ];
        $this->renderAdmin('admin/noticias-lista', $data);
    }

    // ── Formulario nueva noticia ──
    public function crearNoticia(): void
    {
        $data = [
            'pageTitle' => 'Nueva Noticia — Admin',
            'noticia'   => null,
            'tipos'     => NewsModel::getTipos(),
            'error'     => $_GET['error'] ?? null,
        ];
        $this->renderAdmin('admin/noticias-form', $data);
    }

    // ── Formulario editar ──
    public function editarNoticia(): void
    {
        $id      = (int)($_GET['id'] ?? 0);
        $pdo     = Database::get();
        $stmt    = $pdo->prepare('SELECT * FROM idm_noticias WHERE id = :id');
        $stmt->execute([':id' => $id]);
        $noticia = $stmt->fetch();

        if (!$noticia) {
            $this->redirect('/admin/noticias');
            return;
        }

        $noticia['meta'] = $noticia['meta_json']
            ? json_decode($noticia['meta_json'], true)
            : [];

        $data = [
            'pageTitle' => 'Editar Noticia — Admin',
            'noticia'   => $noticia,
            'tipos'     => NewsModel::getTipos(),
            'error'     => $_GET['error'] ?? null,
        ];
        $this->renderAdmin('admin/noticias-form', $data);
    }

    // ── Guardar (POST) ──
    public function guardarNoticia(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/admin/noticias');
            return;
        }

        $data = $_POST;

        // Subir imagen principal
        if (!empty($_FILES['imagen']['name'])) {
            $ruta = $this->subirArchivoImagen($_FILES['imagen'], 'noticias');
            if ($ruta) $data['imagen'] = $ruta;
        }

        // Subir imagen hero
        if (!empty($_FILES['imagen_hero']['name'])) {
            $ruta = $this->subirArchivoImagen($_FILES['imagen_hero'], 'noticias');
            if ($ruta) $data['imagen_hero'] = $ruta;
        }

        // Validar campos mínimos
        if (empty($data['titulo']) || empty($data['cuerpo']) || empty($data['tipo'])) {
            $dest = !empty($data['id'])
                ? '/admin/noticias/editar?id=' . $data['id'] . '&error=campos'
                : '/admin/noticias/crear?error=campos';
            $this->redirect($dest);
            return;
        }

        NewsModel::save($data);
        $this->redirect('/admin/noticias?ok=1');
    }

    // ── Eliminar ──
    public function eliminarNoticia(): void
    {
        $id = (int)($_GET['id'] ?? 0);
        if ($id) NewsModel::delete($id);
        $this->redirect('/admin/noticias?deleted=1');
    }

    // ── Helper: subir imagen al servidor ──
    private function subirArchivoImagen(array $file, string $carpeta = 'noticias'): ?string
    {
        $dir = PUBLIC_PATH . '/images/' . $carpeta . '/';
        if (!is_dir($dir)) mkdir($dir, 0755, true);

        $ext       = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $permitidos = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

        if (!in_array($ext, $permitidos)) return null;
        if ($file['size'] > 5 * 1024 * 1024) return null; // 5MB máx

        $nombre = uniqid('idm_') . '.' . $ext;
        $destino = $dir . $nombre;

        if (move_uploaded_file($file['tmp_name'], $destino)) {
            return $carpeta . '/' . $nombre; // ruta relativa desde public/images/
        }
        return null;
    }

    // ── Render con layout de admin ──
    protected function renderAdmin(string $view, array $data = []): void
    {
        extract($data);
        $viewFile = VIEWS_PATH . '/pages/' . $view . '.php';
        if (!file_exists($viewFile)) {
            throw new Exception("Vista admin no encontrada: {$view}");
        }
        $content = $viewFile;
        require_once VIEWS_PATH . '/admin-layout.php';
    }
}