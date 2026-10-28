<!-- TOP BAR -->
<div class="idm-topbar">
    <div class="container">
        <div class="d-none d-md-flex align-items-center gap-4">
            <span class="idm-topbar-left-item">
                <i class="bi bi-clock-fill idm-icon-clock"></i>
                <strong>Lunes a Viernes</strong> 8AM - 9PM
            </span>
            <a href="https://maps.google.com/?q=<?= urlencode(SITE_ADDRESS) ?>"
               target="_blank" rel="noopener noreferrer"
               class="idm-topbar-left-item"
               style="color:inherit;text-decoration:none;">
                <i class="bi bi-geo-alt-fill idm-icon-location"></i>
                <strong>Cali</strong> <?= SITE_ADDRESS ?>
            </a>
        </div>
        <!-- Mobile: teléfono + redes en la misma fila -->
        <div class="d-flex d-md-none align-items-center gap-3">
            <a href="tel:+57<?= SITE_PHONE ?>"
               style="color:#fff;text-decoration:none;font-size:13px;">
                <i class="bi bi-telephone-fill" style="color:var(--idm-red);margin-right:5px;"></i>
                <?= SITE_PHONE ?>
            </a>
        </div>
        <div class="idm-topbar-social">
            <span class="d-none d-lg-inline">Visita nuestras redes:</span>
            <a href="<?= SITE_FACEBOOK ?>" target="_blank" aria-label="Facebook">
                <i class="bi bi-facebook"></i>
            </a>
            <a href="<?= SITE_INSTAGRAM ?>" target="_blank" aria-label="Instagram">
                <i class="bi bi-instagram"></i>
            </a>
            <a href="<?= SITE_LINKEDIN ?>" target="_blank" aria-label="LinkedIn">
                <i class="bi bi-linkedin"></i>
            </a>
        </div>
    </div>
</div>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg idm-navbar" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="<?= SITE_URL ?>/">
            <img src="<?= SITE_URL ?>/public/images/logoidm2.png"
                 alt="IDM TERMICAS" class="idm-logo">
        </a>

        <!-- Mobile: botón contacto visible siempre + toggler -->
        <div class="d-flex d-lg-none align-items-center gap-2">
            <a href="<?= SITE_URL ?>/contacto"
               class="idm-nav-phone idm-nav-mobile-cta">
                <i class="bi bi-envelope-fill"></i>
            </a>
            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navMenu"
                    aria-controls="navMenu" aria-expanded="false">
                <i class="bi bi-list"></i>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link <?= ($activeMenu ?? '') === 'inicio' ? 'active' : '' ?>"
                       href="<?= SITE_URL ?>/">
                        <i class="bi bi-house-fill d-lg-none me-2"></i>Inicio
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($activeMenu ?? '') === 'nosotros' ? 'active' : '' ?>"
                       href="<?= SITE_URL ?>/about-us">
                        <i class="bi bi-people-fill d-lg-none me-2"></i>Sobre nosotros
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= ($activeMenu ?? '') === 'servicios' ? 'active' : '' ?>"
                       href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-grid-fill d-lg-none me-2"></i>Servicios
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= SITE_URL ?>/consultoria-e-interventoria">
                            <i class="bi bi-clipboard-check me-2 text-danger"></i>Consultoría E Interventoría
                        </a></li>
                        <li><a class="dropdown-item" href="<?= SITE_URL ?>/mantenimiento-y-calibracion">
                            <i class="bi bi-tools me-2 text-danger"></i>Mantenimiento Y Calibración
                        </a></li>
                        <li><a class="dropdown-item" href="<?= SITE_URL ?>/diseno-y-fabricacion">
                            <i class="bi bi-gear-wide-connected me-2 text-danger"></i>Diseño Y Fabricación
                        </a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($activeMenu ?? '') === 'noticias' ? 'active' : '' ?>"
                       href="<?= SITE_URL ?>/noticias">
                        <i class="bi bi-newspaper d-lg-none me-2"></i>Noticias
                    </a>
                </li>
                <!-- Botón contacto — solo visible en desktop -->
                <li class="nav-item d-none d-lg-block">
                    <a href="<?= SITE_URL ?>/contacto" class="idm-nav-phone idm-nav-contact">
                        <i class="bi bi-envelope-fill idm-nav-contact-icon"></i>
                        <span class="idm-nav-contact-text">Contáctanos</span>
                        <i class="bi bi-arrow-right idm-nav-contact-arrow"></i>
                    </a>
                </li>
                <!-- Botón contacto completo — solo en mobile dentro del menú -->
                <li class="nav-item d-lg-none mt-2">
                    <a href="<?= SITE_URL ?>/contacto"
                       class="idm-btn idm-btn-red w-100 text-center justify-content-center">
                        <i class="bi bi-envelope-fill me-2"></i>Contáctanos
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>