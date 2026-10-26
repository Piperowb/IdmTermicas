<?php
$tipo   = $noticia['tipo'] ?? 'normativa';
$meta   = $noticia['meta'] ?? [];
$heroIm = $noticia['imagen_hero'] ?: ($noticia['imagen'] ?: 'FONDO3.jpg');

$tipoInfo = [
    'normativa' => ['icon' => 'bi-file-earmark-text-fill', 'label' => 'Normativa / Artículo'],
    'equipo'    => ['icon' => 'bi-gear-wide-connected',    'label' => 'Ficha de Equipo'],
    'proyecto'  => ['icon' => 'bi-trophy-fill',             'label' => 'Caso de Éxito'],
][$tipo];
?>

<!-- HERO -->
<section class="idm-page-hero">
    <div class="idm-page-hero-bg" style="background-image:url('<?= SITE_URL ?>/public/images/<?= htmlspecialchars($heroIm) ?>')"></div>
    <div class="idm-page-hero-overlay"></div>
    <div class="idm-page-hero-noise"></div>
    <div class="idm-page-hero-glow"></div>
    <div class="idm-page-hero-glow idm-page-hero-glow-2"></div>
    <div class="container" data-aos="fade-up">
        <span class="idm-page-hero-badge">
            <i class="bi <?= $tipoInfo['icon'] ?>"></i> <?= $tipoInfo['label'] ?>
        </span>
        <h1 class="idm-page-title" style="font-size:clamp(1.6rem,3.5vw,2.6rem);">
            <?= htmlspecialchars($noticia['titulo']) ?>
        </h1>
        <?php if (!empty($noticia['resumen'])): ?>
        <p class="idm-page-hero-desc"><?= htmlspecialchars($noticia['resumen']) ?></p>
        <?php endif; ?>
        <nav class="idm-breadcrumb">
            <a href="<?= SITE_URL ?>/">Inicio</a> /
            <a href="<?= SITE_URL ?>/noticias">Noticias</a> /
            <span><?= htmlspecialchars(mb_strimwidth($noticia['titulo'], 0, 45, '...')) ?></span>
        </nav>
    </div>
</section>

<!-- CONTENIDO -->
<section class="idm-section idm-page-bg-soft">
    <div class="container">

        <?php if ($tipo === 'normativa'): ?>
        <!-- ══════════ NORMATIVA ══════════ -->
        <div class="row g-5 justify-content-center">
            <div class="col-lg-8" data-aos="fade-up">
                <article class="idm-news-card">
                    <?php if (!empty($noticia['imagen'])): ?>
                    <div class="idm-news-card-image">
                        <img src="<?= SITE_URL ?>/public/images/<?= htmlspecialchars($noticia['imagen']) ?>"
                             alt="<?= htmlspecialchars($noticia['titulo']) ?>">
                    </div>
                    <?php endif; ?>
                    <div class="idm-news-card-body">
                        <?php if (!empty($noticia['cuerpo'])): ?>
                        <p><?= nl2br(htmlspecialchars($noticia['cuerpo'])) ?></p>
                        <?php endif; ?>

                        <?php if (!empty($meta['checklist'])): ?>
                        <h3 class="mt-4 mb-3">¿Qué incluye nuestro servicio?</h3>
                        <ul class="idm-news-checklist">
                            <?php foreach ($meta['checklist'] as $item): ?>
                            <li>
                                <i class="bi bi-patch-check-fill"></i>
                                <span><?= htmlspecialchars($item) ?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>

                        <div class="idm-news-contact-box mt-4">
                            <h4><i class="bi bi-exclamation-triangle-fill"></i> Evita riesgos y asegura el cumplimiento legal</h4>
                            <p><i class="bi bi-telephone-fill"></i>
                                <a href="tel:+57<?= SITE_PHONE ?>"><?= SITE_PHONE ?></a> -
                                <a href="tel:+57<?= SITE_PHONE_ALT ?>"><?= SITE_PHONE_ALT ?></a>
                            </p>
                            <p><i class="bi bi-envelope-fill"></i>
                                <a href="mailto:<?= SITE_EMAIL ?>"><?= SITE_EMAIL ?></a>
                            </p>
                            <a href="https://wa.me/<?= SITE_WHATSAPP ?>"
                               target="_blank"
                               class="idm-btn idm-btn-red mt-3">
                                <i class="bi bi-whatsapp"></i> Solicitar Cotización
                            </a>
                        </div>
                    </div>
                </article>
            </div>
        </div>

        <?php elseif ($tipo === 'equipo'): ?>
        <!-- ══════════ EQUIPO ══════════ -->
        <div class="row g-5">
            <div class="col-lg-7" data-aos="fade-right">
                <?php if (!empty($noticia['imagen'])): ?>
                <div class="idm-equipment-image mb-4">
                    <img src="<?= SITE_URL ?>/public/images/<?= htmlspecialchars($noticia['imagen']) ?>"
                         alt="<?= htmlspecialchars($noticia['titulo']) ?>">
                </div>
                <?php endif; ?>
                <div class="idm-news-card-body">
                    <h2><?= htmlspecialchars($noticia['titulo']) ?></h2>
                    <?php if (!empty($noticia['cuerpo'])): ?>
                    <p><?= nl2br(htmlspecialchars($noticia['cuerpo'])) ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <aside class="col-lg-5" data-aos="fade-left" data-aos-delay="150">
                <div class="idm-equipment-card">
                    <h3>Ficha Técnica</h3>
                    <ul class="idm-equipment-list list-unstyled">
                        <?php
                        $fields = [
                            'marca'       => 'Marca',
                            'capacidad'   => 'Capacidad',
                            'presion'     => 'Presión',
                            'combustible' => 'Combustible',
                            'quemador'    => 'Quemador',
                            'auxiliares'  => 'Auxiliares',
                            'aislamiento' => 'Aislamiento',
                            'forro'       => 'Forro',
                        ];
                        foreach ($fields as $key => $label):
                            if (!empty($meta[$key])):
                        ?>
                        <li>
                            <strong><?= $label ?></strong>
                            <span><?= htmlspecialchars($meta[$key]) ?></span>
                        </li>
                        <?php endif; endforeach; ?>
                    </ul>
                    <a href="https://wa.me/<?= SITE_WHATSAPP ?>?text=Hola%2C%20me%20interesa%20la%20<?= urlencode($noticia['titulo']) ?>"
                       target="_blank"
                       class="idm-btn idm-btn-red idm-btn-shine w-100 mt-4 justify-content-center">
                        <i class="bi bi-whatsapp"></i> Solicitar Cotización
                    </a>
                </div>
            </aside>
        </div>

        <?php else: ?>
        <!-- ══════════ PROYECTO / CASO DE ÉXITO ══════════ -->
        <div class="row g-5 justify-content-center">
            <div class="col-lg-9" data-aos="fade-up">
                <?php if (!empty($noticia['imagen'])): ?>
                <div class="idm-equipment-image mb-4" style="aspect-ratio:16/9;">
                    <img src="<?= SITE_URL ?>/public/images/<?= htmlspecialchars($noticia['imagen']) ?>"
                         alt="<?= htmlspecialchars($noticia['titulo']) ?>">
                </div>
                <?php endif; ?>

                <div class="idm-news-card-body">
                    <div class="d-flex flex-wrap gap-2 mb-3">
                        <?php if (!empty($meta['sector'])): ?>
                        <span class="idm-news-card-badge" style="position:static;background:#2d7599;">
                            <i class="bi bi-building me-1"></i> <?= htmlspecialchars($meta['sector']) ?>
                        </span>
                        <?php endif; ?>
                        <span class="idm-news-card-badge" style="position:static;background:#16a34a;">
                            <i class="bi bi-check-circle-fill me-1"></i> Completado
                        </span>
                    </div>

                    <h2><?= htmlspecialchars($noticia['titulo']) ?></h2>

                    <?php if (!empty($meta['cliente'])): ?>
                    <p class="text-muted mb-3">
                        <i class="bi bi-person-badge me-1"></i>
                        <strong>Cliente:</strong> <?= htmlspecialchars($meta['cliente']) ?>
                    </p>
                    <?php endif; ?>

                    <?php if (!empty($noticia['cuerpo'])): ?>
                    <p><?= nl2br(htmlspecialchars($noticia['cuerpo'])) ?></p>
                    <?php endif; ?>

                    <?php if (!empty($meta['reto'])): ?>
                    <div class="idm-news-contact-box mt-4" style="background:#fff5f5;border-left:4px solid #e1161b;">
                        <h4 style="color:#e1161b;">
                            <i class="bi bi-exclamation-triangle-fill"></i> El Reto
                        </h4>
                        <p style="color:#222;"><?= nl2br(htmlspecialchars($meta['reto'])) ?></p>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($meta['solucion'])): ?>
                    <div class="idm-news-contact-box mt-3" style="background:#f0fdf4;border-left:4px solid #16a34a;">
                        <h4 style="color:#16a34a;">
                            <i class="bi bi-check-circle-fill"></i> La Solución
                        </h4>
                        <p style="color:#222;"><?= nl2br(htmlspecialchars($meta['solucion'])) ?></p>
                    </div>
                    <?php endif; ?>

                    <a href="https://wa.me/<?= SITE_WHATSAPP ?>" target="_blank"
                       class="idm-btn idm-btn-red mt-4">
                        <i class="bi bi-whatsapp"></i> Quiero un proyecto similar
                    </a>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Botón volver -->
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="<?= SITE_URL ?>/noticias" class="idm-btn idm-btn-outline-dark">
                <i class="bi bi-arrow-left me-1"></i> Volver a Noticias
            </a>
        </div>

    </div>
</section>