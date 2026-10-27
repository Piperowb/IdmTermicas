<!-- HERO -->
<section class="idm-page-hero">
    <div class="idm-page-hero-bg" style="background-image:url('<?= SITE_URL ?>/public/images/<?= htmlspecialchars($servicio['hero'] ?? 's2.jpg') ?>')"></div>
    <div class="idm-page-hero-overlay"></div>
    <div class="idm-page-hero-noise"></div>
    <div class="idm-page-hero-glow"></div>
    <div class="idm-page-hero-glow idm-page-hero-glow-2"></div>
    <div class="container" data-aos="fade-up">
        <span class="idm-page-hero-badge">
            <i class="bi bi-grid-fill"></i> IDM TÉRMICAS
        </span>
        <h1 class="idm-page-title">
            <u><?= htmlspecialchars(explode(' Y ', $servicio['title'])[0]) ?></u>
            <b>Y <?= htmlspecialchars(explode(' Y ', $servicio['title'])[1] ?? '') ?></b>
        </h1>
        <p class="idm-page-hero-desc"><?= htmlspecialchars($servicio['description']) ?></p>
        <nav class="idm-breadcrumb">
            <a href="<?= SITE_URL ?>/">Inicio</a> /
            <span><?= htmlspecialchars($servicio['title']) ?></span>
        </nav>
    </div>
</section>

<!-- CONTENIDO -->
<section class="idm-section idm-page-bg-soft">
    <div class="container">

        <div class="row g-5 align-items-start">
            <!-- Columna izquierda: bloque con lista -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="idm-service-block">
                    <div class="idm-service-block-header">
                        <h2 class="idm-service-block-title"><?= htmlspecialchars($servicio['title']) ?></h2>
                    </div>

                    <?php if (count($servicio['items']) === 1): ?>
                        <p class="idm-lead"><?= htmlspecialchars($servicio['items'][0]) ?></p>
                    <?php else: ?>
                        <ul class="idm-service-list">
                            <?php foreach ($servicio['items'] as $item): ?>
                                <li><?= htmlspecialchars($item) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <a href="https://wa.me/<?= SITE_WHATSAPP ?>?text=Hola%2C%20me%20interesa%20el%20servicio%20de%20<?= urlencode($servicio['title']) ?>"
                       target="_blank" class="idm-btn idm-btn-red idm-btn-shine mt-4">
                        <i class="bi bi-whatsapp"></i> Solicitar Información
                    </a>
                </div>
            </div>

            <!-- Columna derecha: imagen principal -->
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="150">
                <div class="idm-equipment-image" style="aspect-ratio: 4/5;">
                    <img src="<?= SITE_URL ?>/public/images/<?= $imagenPrincipal ?>" alt="<?= htmlspecialchars($servicio['title']) ?>">
                </div>
            </div>
        </div>

        <!-- Galería de imágenes -->
        <?php if (!empty($galeria)): ?>
        <div class="idm-section-head text-center mt-5 mb-4" data-aos="fade-up">
            <span class="idm-eyebrow text-center">Galería</span>
            <h2 class="idm-h2 text-center">Nuestros <b>Proyectos</b></h2>
        </div>

        <?php
        $galeriaLoop = array_merge($galeria, $galeria, $galeria, $galeria);
        ?>
        <div class="idm-gallery-marquee" data-aos="fade-up" data-aos-delay="100">
            <div class="idm-gallery-track">
                <?php foreach ($galeriaLoop as $img): ?>
                    <div class="idm-gallery-slide">
                        <img src="<?= SITE_URL ?>/public/images/<?= htmlspecialchars($img) ?>"
                            alt="IDM Proyecto" loading="lazy">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

    </div>
</section>