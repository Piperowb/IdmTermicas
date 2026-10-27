<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($pageTitle ?? 'Admin') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --idm-red: #e1161b;
            --idm-blue: #143749;
        }
        body { background: #f4f6f9; font-family: 'Segoe UI', sans-serif; overflow-x: hidden; }

        /* Sidebar */
        .adm-sidebar {
            width: 250px; min-height: 100vh;
            background: var(--idm-blue);
            position: fixed; top: 0; left: 0;
            display: flex; flex-direction: column;
            z-index: 1050;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease-in-out; 
        }
        
        /* Logo Original, Centrado y con fondo blanco */
        .adm-sidebar-brand {
            padding: 30px 20px;
            border-bottom: 1px solid rgba(255,255,255,.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: background 0.3s ease;
        }
        .adm-sidebar-brand:hover { background: rgba(255,255,255,.05); }
        
        .adm-sidebar-brand img { 
            height: 60px; 
            background-color: #ffffff;
            padding: 10px 20px;
            border-radius: 12px;
            transition: transform 0.3s ease, box-shadow 0.3s ease; 
            margin-bottom: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }
        .adm-sidebar-brand:hover img { 
            transform: scale(1.05); 
            box-shadow: 0 0 15px rgba(225, 22, 27, 0.5);
        }
        
        .adm-sidebar-brand span {
            display: block; color: rgba(255,255,255,.6);
            font-size: 11px; letter-spacing: 1px;
            text-transform: uppercase; text-align: center;
            font-weight: 600; transition: color 0.3s ease;
        }
        .adm-sidebar-brand:hover span { color: #fff; }

        /* Nav items */
        .adm-nav { padding: 16px 0; flex: 1; overflow-y: auto; }
        .adm-nav-item {
            display: flex; align-items: center; gap: 12px;
            padding: 12px 24px;
            color: rgba(255,255,255,.7);
            font-size: 14.5px; font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
            border-left: 4px solid transparent;
        }
        .adm-nav-item:hover, .adm-nav-item.active {
            background: rgba(255,255,255,.08);
            color: #fff;
            border-left-color: var(--idm-red);
            padding-left: 28px;
        }
        .adm-nav-item i { font-size: 18px; width: 22px; }
        .adm-nav-label {
            padding: 20px 24px 8px;
            color: rgba(255,255,255,.35);
            font-size: 10px; font-weight: 700;
            letter-spacing: 1.5px; text-transform: uppercase;
        }
        .adm-sidebar-footer {
            padding: 20px 24px;
            border-top: 1px solid rgba(255,255,255,.1);
        }
        .adm-sidebar-footer a {
            color: rgba(255,255,255,.5); font-size: 13px;
            text-decoration: none; display: flex; align-items: center; gap: 8px;
            transition: color 0.3s ease;
        }
        .adm-sidebar-footer a:hover { color: #fff; }

        /* Main Content */
        .adm-main {
            margin-left: 250px;
            min-height: 100vh;
            display: flex; flex-direction: column;
            transition: margin-left 0.3s ease-in-out;
        }
        
        .adm-fields-tipo { display: none; }
        .adm-fields-tipo.active { display: block; }
        
        /* Cinta azul con logo (Solo se ve en móvil) */
        .mobile-brand-bar {
            display: none; /* Oculto en PC */
            background: var(--idm-blue);
            padding: 10px 16px;
            align-items: center;
            justify-content: center;
            position: sticky;
            top: 0;
            z-index: 1020;
            transition: all 0.3s ease;
        }
        .mobile-brand-bar img {
            height: 35px;
            background: #fff;
            padding: 4px 10px;
            border-radius: 6px;
        }

        .adm-topbar {
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
            padding: 16px 32px;
            display: flex; align-items: center; justify-content: space-between;
            position: sticky; 
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
            transition: all 0.3s ease;
        }
        
        .adm-topbar-title { font-weight: 700; font-size: 18px; color: #111; margin: 0; }
        .adm-content { padding: 32px; flex: 1; }

        /* Botón Hamburguesa */
        .btn-menu-toggle {
            display: none;
            background: transparent;
            border: none;
            font-size: 28px; 
            color: var(--idm-blue);
            cursor: pointer;
            padding: 0;
            margin-right: 15px;
        }

        /* Overlay */
        .sidebar-overlay {
            display: none;
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.6); z-index: 1040;
            opacity: 0; transition: opacity 0.3s ease;
        }
        .sidebar-overlay.show { display: block; opacity: 1; }

        /* ── RESPONSIVE (MÓVILES) ── */
        @media (max-width: 991px) {
            /* Ocultar sidebar a la izquierda */
            .adm-sidebar { 
                transform: translateX(-100%); 
            }
            .adm-sidebar.show { 
                transform: translateX(0); 
            }
            .adm-main { 
                margin-left: 0; 
            }
            
            /* Mostrar la cinta azul superior */
            .mobile-brand-bar {
                display: flex;
            }

            /* Bajar la barra blanca para que quede debajo de la azul */
            .adm-topbar { 
                padding: 12px 16px; 
                top: 55px; 
            }
            
            .adm-content { padding: 16px; }
            .adm-topbar-title { font-size: 16px; }
            .btn-menu-toggle { display: block; }
            
            /* Ocultar el botón de "Ver noticias" en móvil */
            .adm-topbar .btn { display: none !important; }

            /* EFECTO: Ocultar la cinta superior cuando el menú está abierto */
            body.menu-open .mobile-brand-bar {
                opacity: 0;
                pointer-events: none;
                transform: translateY(-100%);
            }
        }
    </style>
</head>
<body>

<!-- Overlay de fondo -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<div class="adm-sidebar" id="sidebar">
    <a href="<?= SITE_URL ?>/admin" class="adm-sidebar-brand">
        <img src="<?= SITE_URL ?>/public/images/logoidm2.png" alt="IDM TÉRMICAS">
        <span>Panel de Administración</span>
    </a>
    
    <nav class="adm-nav">
        <div class="adm-nav-label">Principal</div>
        <a href="<?= SITE_URL ?>/admin" class="adm-nav-item <?= str_ends_with($_SERVER['REQUEST_URI'], '/admin') ? 'active' : '' ?>">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>

        <div class="adm-nav-label">Contenido</div>
        <a href="<?= SITE_URL ?>/admin/noticias" class="adm-nav-item <?= str_contains($_SERVER['REQUEST_URI'], 'noticias') ? 'active' : '' ?>">
            <i class="bi bi-newspaper"></i> Noticias
        </a>

        <div class="adm-nav-label">Próximamente</div>
        <a href="#" class="adm-nav-item" style="opacity:.4;cursor:not-allowed;"><i class="bi bi-sliders"></i> Configuración</a>
        <a href="#" class="adm-nav-item" style="opacity:.4;cursor:not-allowed;"><i class="bi bi-images"></i> Galería</a>
        <a href="#" class="adm-nav-item" style="opacity:.4;cursor:not-allowed;"><i class="bi bi-people-fill"></i> Contactos</a>
    </nav>
    
    <div class="adm-sidebar-footer">
        <a href="<?= SITE_URL ?>/" target="_blank"><i class="bi bi-box-arrow-up-right"></i> Ver sitio público</a>
    </div>
</div>

<div class="adm-main">
    
    <!-- CINTA AZUL SUPERIOR (Solo visible en móvil) -->
    <div class="mobile-brand-bar">
        <img src="<?= SITE_URL ?>/public/images/logoidm2.png" alt="IDM TÉRMICAS">
    </div>

    <div class="adm-topbar">
        <!-- Contenedor Izquierdo: Botón + Título -->
        <div class="d-flex align-items-center">
            <button class="btn-menu-toggle" id="menuToggle" aria-label="Abrir menú">
                <i class="bi bi-list"></i>
            </button>
            <h1 class="adm-topbar-title"><?= htmlspecialchars($pageTitle ?? 'Admin') ?></h1>
        </div>
        
        <a href="<?= SITE_URL ?>/noticias" target="_blank" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-eye me-1"></i> Ver noticias
        </a>
    </div>
    
    <div class="adm-content">
        <?php require_once $content; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');

        function toggleMenu() {
            sidebar.classList.toggle('show');
            overlay.classList.toggle('show');
            
            // Esta clase en el body oculta la cinta azul al abrir el menú
            document.body.classList.toggle('menu-open');
        }

        if(menuToggle) {
            menuToggle.addEventListener('click', toggleMenu);
        }
        if(overlay) {
            overlay.addEventListener('click', toggleMenu);
        }
    });
</script>
</body>
</html>