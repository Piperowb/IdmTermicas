<!-- TOP BAR -->
<div class="idm-topbar">
    <div class="container">
        <div class="d-none d-md-flex align-items-center gap-4">
            <span><i class="bi bi-clock-fill"></i> <strong>Lunes a Viernes</strong> 8AM - 9PM</span>
            <span><i class="bi bi-geo-alt-fill"></i> <strong>Cali</strong> Calle 56 número 4b-145</span>
        </div>
        <div class="d-flex d-md-none align-items-center">
            <span><i class="bi bi-telephone-fill"></i> <?= SITE_PHONE ?></span>
        </div>
        <div class="idm-topbar-social">
            <span class="d-none d-lg-inline">Visita nuestras redes:</span>
            <a href="<?= SITE_FACEBOOK ?>" target="_blank" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
            <a href="<?= SITE_INSTAGRAM ?>" target="_blank" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
            <a href="<?= SITE_LINKEDIN ?>" target="_blank" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
        </div>
    </div>
</div>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg idm-navbar" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="<?= SITE_URL ?>/">
            <img src="<?= SITE_URL ?>/public/images/logoidm2.png" alt="IDM TERMICAS" class="idm-logo">
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#navMenu"
                aria-controls="navMenu" aria-expanded="false">
            <i class="bi bi-list"></i>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link <?= ($activeMenu ?? '') === 'inicio' ? 'active' : '' ?>"
                       href="<?= SITE_URL ?>/">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($activeMenu ?? '') === 'nosotros' ? 'active' : '' ?>"
                       href="<?= SITE_URL ?>/about-us">Sobre nosotros</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= ($activeMenu ?? '') === 'servicios' ? 'active' : '' ?>"
                       href="#" role="button" data-bs-toggle="dropdown">Servicios</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= SITE_URL ?>/consultoria-e-interventoria">Consultoría E Interventoría</a></li>
                        <li><a class="dropdown-item" href="<?= SITE_URL ?>/mantenimiento-y-calibracion">Mantenimiento Y Calibración</a></li>
                        <li><a class="dropdown-item" href="<?= SITE_URL ?>/diseno-y-fabricacion">Diseño Y Fabricación</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($activeMenu ?? '') === 'noticias' ? 'active' : '' ?>"
                       href="<?= SITE_URL ?>/noticias">Noticias</a>
                </li>
                <li class="nav-item">
                    <a href="<?= SITE_URL ?>/contacto" class="idm-nav-phone idm-nav-contact">
                        <i class="bi bi-envelope-fill idm-nav-contact-icon"></i>
                        <span class="idm-nav-contact-text">Contáctanos</span>
                        <i class="bi bi-arrow-right idm-nav-contact-arrow"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>