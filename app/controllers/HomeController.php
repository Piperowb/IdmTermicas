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

        $nombre  = trim(htmlspecialchars($_POST['nombre']  ?? ''));
        $email   = trim(htmlspecialchars($_POST['email']   ?? ''));
        $asunto  = trim(htmlspecialchars($_POST['asunto']  ?? ''));
        $mensaje = trim(htmlspecialchars($_POST['mensaje'] ?? ''));

        if (!$nombre || !$email || !$mensaje || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->redirect('/contacto?error=campos');
            return;
        }

        try {
            $pdo  = Database::get();
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
        } catch (Exception $e) {
            error_log('IDM BD error: ' . $e->getMessage());
            $this->redirect('/contacto?error=servidor');
            return;
        }

        try {
        require_once ROOT . '/vendor/autoload.php';

            $mail = new PHPMailer\PHPMailer\PHPMailer(true);

            $mail->isSMTP();
            $mail->Host       = MAIL_HOST;
            $mail->SMTPAuth   = true;
            $mail->Username   = MAIL_USER;
            $mail->Password   = MAIL_PASS;
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = MAIL_PORT;
            $mail->CharSet    = 'UTF-8';

            $mail->setFrom(MAIL_FROM, MAIL_FROM_NAME);
            $mail->addAddress(SITE_EMAIL);   
            $mail->addReplyTo($email, $nombre);

            $mail->isHTML(true);
            $mail->Subject = $asunto
                ? "Contacto web: {$asunto}"
                : "Nuevo mensaje de {$nombre} — IDM Térmicas";

            $mail->Body = "
                <div style='font-family:Arial,sans-serif;max-width:600px;margin:0 auto;'>
                    <div style='background:#e1161b;padding:24px;text-align:center;'>
                        <h2 style='color:#fff;margin:0;'>Nuevo mensaje de contacto</h2>
                        <p style='color:rgba(255,255,255,.8);margin:6px 0 0;'>IDM Térmicas — Sitio Web</p>
                    </div>
                    <div style='padding:32px;background:#f9f9f9;border:1px solid #eee;'>
                        <table style='width:100%;border-collapse:collapse;'>
                            <tr>
                                <td style='padding:10px 0;color:#666;width:120px;'><strong>Nombre:</strong></td>
                                <td style='padding:10px 0;color:#222;'>{$nombre}</td>
                            </tr>
                            <tr style='background:#fff;'>
                                <td style='padding:10px 0;color:#666;'><strong>Email:</strong></td>
                                <td style='padding:10px 0;'>
                                    <a href='mailto:{$email}' style='color:#e1161b;'>{$email}</a>
                                </td>
                            </tr>
                            <tr>
                                <td style='padding:10px 0;color:#666;'><strong>Asunto:</strong></td>
                                <td style='padding:10px 0;color:#222;'>" . ($asunto ?: 'Sin asunto') . "</td>
                            </tr>
                        </table>
                        <div style='margin-top:20px;padding:20px;background:#fff;
                                    border-left:4px solid #e1161b;border-radius:4px;'>
                            <p style='color:#666;margin:0 0 8px;font-size:12px;
                                    text-transform:uppercase;letter-spacing:1px;'>
                                <strong>Mensaje:</strong>
                            </p>
                            <p style='color:#222;line-height:1.7;margin:0;'>
                                " . nl2br($mensaje) . "
                            </p>
                        </div>
                        <div style='margin-top:24px;padding:16px;background:#e8f4fd;
                                    border-radius:8px;text-align:center;'>
                            <p style='margin:0;color:#666;font-size:13px;'>
                                Para responder, haz clic en <strong>Responder</strong> en tu correo
                                — el mensaje llegará directo a <strong>{$email}</strong>
                            </p>
                        </div>
                    </div>
                    <div style='padding:16px;text-align:center;background:#222;'>
                        <p style='color:#888;font-size:12px;margin:0;'>
                            IDM Térmicas S.A.S — Cali, Colombia
                        </p>
                    </div>
                </div>
            ";

            $mail->AltBody = "Nombre: {$nombre}\nEmail: {$email}\nAsunto: {$asunto}\n\nMensaje:\n{$mensaje}";

            $mail->send();

        } catch (Exception $e) {
            error_log('IDM Mail error: ' . $e->getMessage());
        }

        $this->redirect('/contacto?ok=1');
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