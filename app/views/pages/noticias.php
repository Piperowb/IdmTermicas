<!-- HERO -->
<section class="idm-page-hero">
    <div class="idm-page-hero-bg" style="background-image:url('<?= SITE_URL ?>/public/images/s2.4.jpg')"></div>
    <div class="idm-page-hero-overlay"></div>
    <div class="idm-page-hero-noise"></div>
    <div class="idm-page-hero-glow"></div>
    <div class="idm-page-hero-glow idm-page-hero-glow-2"></div>
    <div class="container" data-aos="fade-up">
        <span class="idm-page-hero-badge">
            <i class="bi bi-newspaper"></i> Actualidad Industrial
        </span>
        <h1 class="idm-page-title">
            <u>Noticias y</u>
            <b>Normativas</b>
        </h1>
        <p class="idm-page-hero-desc">
            Mantente informado sobre las últimas regulaciones, equipos y novedades del sector térmico colombiano.
        </p>
        <nav class="idm-breadcrumb">
            <a href="<?= SITE_URL ?>/">Inicio</a> / <span>Noticias</span>
        </nav>
    </div>
</section>

<!-- CONTENIDO -->
<section class="idm-section idm-page-bg-soft">
    <div class="container">
        <div class="idm-news-layout">
            
            <!-- Columna izquierda: artículo principal -->
            <article class="idm-news-card" data-aos="fade-right">
                <div class="idm-news-card-image">
                    <span class="idm-news-card-badge">
                        <i class="bi bi-patch-check-fill me-1"></i> Resolución 1857
                    </span>
                    <img src="<?= SITE_URL ?>/public/images/noti4.jpg" alt="Normativas IDM">
                </div>
                <div class="idm-news-card-body">
                    <h2>🔍 ¿Estás al día con las normativas?</h2>
                    <p>
                        Según la <strong>Resolución 1857 de 2024</strong>, los empleadores están obligados
                        a garantizar la <strong>inspección y el mantenimiento de calderas</strong> por
                        empresas autorizadas.
                    </p>
                    <p>En <strong>IDM TÉRMICAS</strong>, te ofrecemos:</p>

                    <ul class="idm-news-checklist">
                        <?php foreach ($noticia['beneficios'] as $b): ?>
                        <li>
                            <i class="bi bi-patch-check-fill"></i>
                            <span><?= htmlspecialchars($b) ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>

                    <div class="idm-news-contact-box">
                        <h4><i class="bi bi-exclamation-triangle-fill"></i> Evita riesgos y asegura el cumplimiento legal</h4>
                        <p><i class="bi bi-telephone-fill"></i> <a href="tel:+57<?= SITE_PHONE ?>"><?= SITE_PHONE ?></a> – <a href="tel:+57<?= SITE_PHONE_ALT ?>"><?= SITE_PHONE_ALT ?></a></p>
                        <p><i class="bi bi-envelope-fill"></i> <a href="mailto:<?= SITE_EMAIL ?>"><?= SITE_EMAIL ?></a></p>
                    </div>
                </div>
            </article>

            <!-- Columna derecha: equipo destacado -->
            <aside data-aos="fade-left" data-aos-delay="150">
                
                <div class="idm-equipment-image mb-4">
                    <img src="<?= SITE_URL ?>/public/images/Noti3.png" alt="<?= htmlspecialchars($noticia['equipo']['nombre']) ?>">
                </div>

                <div class="idm-equipment-card">
                    <h3><?= htmlspecialchars($noticia['equipo']['nombre']) ?></h3>
                    <ul class="idm-equipment-list list-unstyled">
                        <li><strong>Marca</strong><span><?= htmlspecialchars($noticia['equipo']['marca']) ?></span></li>
                        <li><strong>Capacidad</strong><span><?= htmlspecialchars($noticia['equipo']['capacidad']) ?></span></li>
                        <li><strong>Pasos</strong><span><?= htmlspecialchars($noticia['equipo']['pasos']) ?></span></li>
                        <li><strong>Presión</strong><span><?= htmlspecialchars($noticia['equipo']['presion']) ?></span></li>
                        <li><strong>Combustible</strong><span><?= htmlspecialchars($noticia['equipo']['combustible']) ?></span></li>
                        <li><strong>Quemador</strong><span><?= htmlspecialchars($noticia['equipo']['quemador']) ?></span></li>
                        <li><strong>Auxiliares</strong><span><?= htmlspecialchars($noticia['equipo']['auxiliares']) ?></span></li>
                        <li><strong>Aislamiento</strong><span><?= htmlspecialchars($noticia['equipo']['aislamiento']) ?></span></li>
                        <li><strong>Forro</strong><span><?= htmlspecialchars($noticia['equipo']['forro']) ?></span></li>
                    </ul>

                    <a href="https://wa.me/<?= SITE_WHATSAPP ?>?text=Hola%2C%20me%20interesa%20la%20<?= urlencode($noticia['equipo']['nombre']) ?>"
                       target="_blank" class="idm-btn idm-btn-red idm-btn-shine w-100 mt-4 justify-content-center">
                        <i class="bi bi-whatsapp"></i> Solicitar Cotización
                    </a>
                </div>

            </aside>

        </div>
    </div>
</section>