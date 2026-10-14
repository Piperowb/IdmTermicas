<?php
class HomeController extends Controller
{
    public function index(): void {
        $data = [
            'pageTitle'  => 'IDM TERMICAS - Fabricación, montaje, puesta a punto, operación y mantenimiento de calderas',
            'metaDesc'   => 'Líderes en diseño, fabricación, consultoría y mantenimiento de sistemas térmicos.',
            'activeMenu' => 'inicio',
            'heroServices' => ServiceModel::getHeroServices(),
            'services'   => ServiceModel::getAll(),
            'stats'      => ServiceModel::getStats(),
            'clientLogos' => ServiceModel::getClientLogos(),
        ];
        $this->render('home', $data);
    }

    public function nosotros(): void {
        $data = [
            'pageTitle'  => 'Sobre nosotros - IDM TERMICAS',
            'metaDesc'   => 'Empresa colombiana con amplia experiencia en cálculo, diseño y fabricación de calderas.',
            'activeMenu' => 'nosotros',
        ];
        $this->render('nosotros', $data);
    }

    public function noticias(): void {
        $data = [
            'pageTitle'  => 'Noticias - IDM TERMICAS',
            'metaDesc'   => 'Normativas, equipos y novedades del sector térmico.',
            'activeMenu' => 'noticias',
            'noticia'    => NewsModel::getDestacada(),
        ];
        $this->render('noticias', $data);
    }

    public function contacto(): void {
        $data = [
            'pageTitle'  => 'Contacto - IDM TERMICAS',
            'metaDesc'   => 'Contáctanos para solicitar cotización.',
            'activeMenu' => 'contacto',
            'success'    => $_GET['ok'] ?? null,
        ];
        $this->render('contacto', $data);
    }

    public function enviarContacto(): void
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        $this->redirect('/contacto');
        return;
    }

    // ── DEBUG TEMPORAL — quitar en producción ──
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    // ──────────────────────────────────────────

    $nombre  = trim(htmlspecialchars($_POST['nombre']  ?? ''));
    $email   = trim(htmlspecialchars($_POST['email']   ?? ''));
    $asunto  = trim(htmlspecialchars($_POST['asunto']  ?? ''));
    $mensaje = trim(htmlspecialchars($_POST['mensaje'] ?? ''));


    try {
        $pdo = Database::get();
        $stmt = $pdo->prepare('
            INSERT INTO idm_contactos (nombre, email, asunto, mensaje, ip)
            VALUES (:nombre, :email, :asunto, :mensaje, :ip)
        ');
        $stmt->execute([
            ':nombre'  => $nombre,
            ':email'   => $email,
            ':asunto'  => $asunto ?: null,
            ':mensaje' => $mensaje,
            ':ip'      => $_SERVER['REMOTE_ADDR'] ?? null,
        ]);

        // ── DEBUG: confirmar inserción ──
        die(json_encode(['ok' => true, 'id' => $pdo->lastInsertId()]));

    } catch (Exception $e) {
        // ── DEBUG: ver el error exacto ──
        die(json_encode(['error' => 'bd', 'mensaje' => $e->getMessage()]));
    }
}

    public function consultoria(): void {
        $data = [
            'pageTitle'  => 'Consultoría E Interventoría - IDM TERMICAS',
            'metaDesc'   => 'Asesorías en combustión, inspección y diagnóstico de equipos.',
            'activeMenu' => 'servicios',
            'imagenPrincipal' => 's1.jpg',
            'galeria'    => ['s2.jpg','s3.jpg','s4.jpg','s5.jpg'],
            'servicio'   => ServiceModel::getBySlug('consultoria'),
        ];
        $this->render('servicio-detalle', $data);
    }

    public function mantenimiento(): void {
        $data = [
            'pageTitle'  => 'Mantenimiento Y Calibración - IDM TERMICAS',
            'metaDesc'   => 'Equipo calificado en instrumentación, electricidad y soldadura.',
            'activeMenu' => 'servicios',
            'imagenPrincipal' => 's2.2.jpg',
            'galeria'    => ['s2.3.jpg','s2.4.jpg','s2.5.jpg','s2.6.jpg','s2.7.jpg','s2.8.jpg','s2.9.jpg','s3.1.jpg'],
            'servicio'   => ServiceModel::getBySlug('mantenimiento'),
        ];
        $this->render('servicio-detalle', $data);
    }

    public function diseno(): void {
        $data = [
            'pageTitle'  => 'Diseño Y Fabricación - IDM TERMICAS',
            'metaDesc'   => 'Calderas, intercambiadores y sistemas de captación bajo ASME y API.',
            'activeMenu' => 'servicios',
            'imagenPrincipal' => 'ss1.jpg',
            'galeria'    => ['ss2.jpg','ss3.jpg','ss4.jpg','ss5.jpg','ss7.jpg','ss8.jpg','ss9.jpg','ss10.jpg'],
            'servicio'   => ServiceModel::getBySlug('diseno'),
        ];
        $this->render('servicio-detalle', $data);
    }
}