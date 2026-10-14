<!-- ═══════════════ HERO SLIDER ═══════════════ -->
<section class="idm-hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($heroServices as $i => $slide): ?>
            <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>"
                 style="background-image:url('<?= SITE_URL ?>/public/images/<?= $slide['bg'] ?>')">
                <div class="container idm-hero-content">
                    <div class="row">
                        <div class="col-lg-8 col-xl-7">
                            <span class="idm-hero-badge"><?= htmlspecialchars($slide['badge']) ?></span>
                            <h1 class="idm-hero-title">
                                <u><?= htmlspecialchars($slide['title_line1']) ?></u>
                                <b><?= htmlspecialchars($slide['title_line2']) ?></b>
                            </h1>
                            <p class="idm-hero-desc"><?= htmlspecialchars($slide['description']) ?></p>
                            <div class="idm-hero-btns">
                                <a href="<?= SITE_URL . $slide['link'] ?>" class="idm-btn idm-btn-red">
                                    Más información <i class="bi bi-arrow-right"></i>
                                </a>
                                <a href="<?= SITE_URL ?>/contacto" class="idm-btn idm-btn-outline">
                                    Contáctanos
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Indicadores personalizados -->
        <div class="idm-hero-controls">
            <div class="idm-hero-progress">
                <?php foreach ($heroServices as $i => $s): ?>
                    <button type="button" 
                            data-bs-target="#heroCarousel"
                            data-bs-slide-to="<?= $i ?>"
                            class="idm-hero-dot <?= $i === 0 ? 'active' : '' ?>"
                            aria-label="Ir al slide <?= $i + 1 ?>"></button>
                <?php endforeach; ?>
            </div>
            <div class="idm-hero-counter">
                <span class="current">01</span>
                <span class="separator">/</span>
                <span class="total">0<?= count($heroServices) ?></span>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════ SECCIÓN CARDS FLOTANTES ═══════════════ -->
<div class="idm-cards-section-wrapper">
    <div class="idm-cards-overlap">
        <div class="container">
            <div class="row g-4">
                <?php
                $cardMeta = [
                    ['num' => '01', 'icon' => 'bi-fire'],
                    ['num' => '02', 'icon' => 'bi-gear-wide-connected'],
                    ['num' => '03', 'icon' => 'bi-square'],
                ];

                foreach ($services as $i => $s):
                    $meta = $cardMeta[$i] ?? ['num' => '0' . ($i + 1), 'icon' => 'bi-box'];
                    $url = SITE_URL . '/' . (
                        $s['slug'] === 'consultoria'    ? 'consultoria-e-interventoria' :
                        ($s['slug'] === 'mantenimiento' ? 'mantenimiento-y-calibracion' :
                                                          'diseno-y-fabricacion')
                    );
                ?>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="<?= $i * 150 ?>">
                    <a href="<?= $url ?>" class="idm-service-card text-decoration-none"
                        style="background-image: url('<?= SITE_URL ?>/public/images/<?= $s['bg'] ?>');">

                            <div class="idm-service-card-header-overlay"></div>

                            <span class="idm-service-card-number">
                                <?= htmlspecialchars($meta['num']) ?>
                                <span class="dot"></span>
                                Certificado
                            </span>

                            <i class="bi <?= htmlspecialchars($meta['icon']) ?> idm-service-card-icon"></i>

                            <span class="idm-service-card-arrow">
                                <i class="bi bi-arrow-up-right"></i>
                            </span>

                            <div class="idm-service-card-body">
                                <h4 class="idm-service-card-title"><?= htmlspecialchars($s['title']) ?></h4>
                                <p class="idm-service-card-desc"><?= htmlspecialchars($s['description']) ?></p>
                                <span class="idm-service-card-link">Ver ficha técnica</span>
                            </div>

                        </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!-- ═══════════════ SOLUCIONES INTEGRALES ═══════════════ -->
<section class="idm-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-8" data-aos="fade-right">
                <span class="idm-eyebrow">IDM TERMICAS</span>
                <h2 class="idm-h2">
                    <u>Soluciones Integrales</u><br>
                    <b>en Ingeniería Térmica</b>
                </h2>
                <p class="idm-lead">
                    En IDM Térmicas, somos líderes en el diseño, fabricación, consultoría y mantenimiento
                    de sistemas térmicos, ofreciendo una gama completa de servicios que abarcan desde
                    calderas y equipos de transferencia de calor hasta sistemas de control ambiental.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <?php
            $items = [
                ['icon' => 'bi-fire',                'title' => 'Cálculo y Diseño de Calderas',        'desc' => 'Aplicamos técnicas avanzadas de cálculo, como el método de elementos finitos, para diseñar calderas pirotubulares, acuotubulares y mixtas que maximizan la eficiencia energética y cumplen con estándares internacionales.'],
                ['icon' => 'bi-lightning-charge',    'title' => 'Consultoría en Combustión',           'desc' => 'Ofrecemos asesoría especializada en combustión y normativas ambientales, ayudando a las industrias a optimizar sus procesos y a cumplir con las regulaciones colombianas vigentes.'],
                ['icon' => 'bi-gear-wide-connected', 'title' => 'Fabricación de Intercambiadores',     'desc' => 'Diseñamos y fabricamos intercambiadores de calor de alta eficiencia bajo los códigos ASME y TEMA, asegurando un rendimiento óptimo y una larga vida útil para sus operaciones industriales.'],
                ['icon' => 'bi-clipboard-check',     'title' => 'Inspección y Diagnóstico de Equipos', 'desc' => 'Realizamos inspecciones detalladas de calderas y equipos generadores de vapor, diagnosticando su estado y ofreciendo soluciones para mejorar la seguridad y el rendimiento.'],
                ['icon' => 'bi-tree-fill',           'title' => 'Sistemas de Control Ambiental',       'desc' => 'Desarrollamos sistemas de captación de particulado, ciclones y filtros de mangas, que ayudan a las empresas a cumplir con la normativa ambiental, reduciendo su impacto ecológico.'],
                ['icon' => 'bi-rocket-takeoff',      'title' => 'Arranque y Optimización de Calderas', 'desc' => 'Proveemos servicios de pruebas de arranque de calderas, asegurando su operación óptima y eficiente desde el inicio, y ayudando a alcanzar un desempeño superior en sus procesos térmicos.'],
            ];
            foreach ($items as $i => $item): ?>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 100 ?>">
                <div class="idm-solution-card">
                    <div class="idm-solution-icon">
                        <i class="bi <?= $item['icon'] ?>"></i>
                    </div>
                    <h5 class="idm-solution-title"><?= $item['title'] ?></h5>
                    <p class="idm-solution-desc"><?= $item['desc'] ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ═══════════════ CTA CONSULTORÍA + STATS ═══════════════ -->
<section class="idm-section idm-cta">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-7" data-aos="fade-right">
                <span class="idm-eyebrow">SOLICITA UNA CONSULTORÍA</span>
                <h2 class="idm-h2">
                    <u>Lleva tu Empresa</u><br>
                    <b>al Siguiente Nivel</b>
                </h2>
                <p class="idm-lead mb-3">
                    En IDM Térmicas, entendemos la importancia de contar con soluciones energéticas eficientes y sostenibles. 
                    Nuestro equipo de expertos está listo para proporcionarte asesoría personalizada en el diseño, fabricación y mantenimiento de calderas e intercambiadores de calor, 
                    garantizando que tu empresa cumpla con las normativas internacionales y ambientales más exigentes.
                </p>
                <p class="idm-lead">
                    ¡Déjanos ayudarte a optimizar tus procesos industriales!
                </p>
                <a href="<?= SITE_URL ?>/contacto" class="idm-btn idm-btn-red mt-3">
                    Solicita una Consultoría <i class="bi bi-arrow-right"></i>
                </a>

                <div class="idm-divider"></div>

                <div class="idm-stats">
                    <?php foreach ($stats as $i => $stat): ?>
                    <div class="idm-stat-item" data-aos="zoom-in" data-aos-delay="<?= $i * 150 ?>">
                        <div class="idm-stat-number"><?= htmlspecialchars($stat['number']) ?></div>
                        <p class="idm-stat-label"><?= htmlspecialchars($stat['label']) ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="col-lg-5 d-none d-lg-block" data-aos="fade-left">
                <img src="<?= SITE_URL ?>/public/images/img-callback.png"
                     alt="IDM Térmicas" class="idm-cta-img">
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════ SLIDER CLIENTES ═══════════════ -->
<section class="idm-clientes">
    <div class="idm-clientes-track">
        <?php foreach (array_merge($clientLogos, $clientLogos) as $logo): ?>
            <div class="idm-cliente-logo">
                <img src="<?= SITE_URL ?>/public/images/<?= $logo ?>" alt="Cliente IDM">
            </div>
        <?php endforeach; ?>
    </div>
</section>