<!-- HERO -->
<section class="idm-page-hero">
    <div class="container">
        <h1 class="idm-page-hero-title">Nuestros <span class="text-orange">Servicios</span></h1>
        <p class="idm-page-hero-sub">Soluciones integrales en ingeniería térmica para la industria colombiana</p>
    </div>
</section>

<!-- STATS -->
<section class="idm-stats-section">
    <div class="container">
        <div class="row g-0">
            <?php foreach ($stats as $i => $stat): ?>
            <div class="col-6 col-md-3">
                <div class="idm-stat-card">
                    <div class="idm-stat-number"><?= htmlspecialchars($stat['number']) ?></div>
                    <div class="idm-stat-label"><?= htmlspecialchars($stat['label']) ?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- SERVICIOS -->
<section class="idm-services-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="idm-section-badge">Catálogo completo</span>
            <h2 class="idm-section-title">¿Qué necesitas <span class="text-orange">hoy?</span></h2>
            <div class="idm-divider"><span></span><i class="bi bi-gear-fill"></i><span></span></div>
        </div>
        <div class="row g-4">
            <?php foreach ($services as $i => $service): ?>
            <div class="col-md-6 col-lg-4">
                <div class="idm-service-card">
                    <span class="idm-service-badge"><?= htmlspecialchars($service['badge']) ?></span>
                    <div class="idm-service-icon">
                        <i class="bi <?= $service['icon'] ?>"></i>
                    </div>
                    <h3 class="idm-service-title"><?= htmlspecialchars($service['title']) ?></h3>
                    <p class="idm-service-desc"><?= htmlspecialchars($service['description']) ?></p>
                    <ul class="idm-service-items">
                        <?php foreach ($service['items'] as $item): ?>
                        <li><i class="bi bi-check-circle-fill"></i><?= htmlspecialchars($item) ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="<?= SITE_URL ?>/<?= $service['slug'] ?>" class="idm-service-btn">
                        Ver más <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="idm-cta-section">
    <div class="container text-center position-relative">
        <h2 class="idm-cta-title">¿Necesitas una solución térmica?</h2>
        <p class="idm-cta-sub">Contáctanos y recibe asesoría especializada</p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="https://wa.me/<?= SITE_WHATSAPP ?>" target="_blank" class="btn idm-btn-whatsapp">
                <i class="bi bi-whatsapp"></i> WhatsApp
            </a>
            <a href="mailto:<?= SITE_EMAIL ?>" class="btn idm-btn-orange">
                <i class="bi bi-envelope-fill"></i> Enviar Email
            </a>
        </div>
    </div>
</section>