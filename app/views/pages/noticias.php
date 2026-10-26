<?php
$tipoFeatured = $noticia['tipo'] ?? 'normativa';
$tipoMeta = [
    'normativa' => ['icon' => 'bi-file-earmark-text-fill', 'label' => 'Normativa', 'color' => '#e1161b'],
    'equipo'    => ['icon' => 'bi-gear-wide-connected',   'label' => 'Ficha de Equipo', 'color' => '#225b7b'],
    'proyecto'  => ['icon' => 'bi-trophy-fill',            'label' => 'Caso de Éxito', 'color' => '#2d7599'],
];
$feat = $tipoMeta[$tipoFeatured] ?? $tipoMeta['normativa'];
?>

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

        <?php if (!empty($noticia)): ?>
        <!-- ═══ NOTICIA DESTACADA (Diseño Editorial) ═══ -->
                <!-- ═══ NOTICIA DESTACADA (Diseño Premium) ═══ -->
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-11" data-aos="fade-up">
                <!-- Sombra profunda y borde superior para resaltar -->
                <article class="idm-news-card overflow-hidden border-0" style="border-radius: 16px; box-shadow: 0 20px 40px rgba(0,0,0,0.12); border-top: 6px solid <?= $feat['color'] ?> !important;">
                    <div class="row g-0">
                        <!-- Imagen -->
                        <div class="col-md-5 position-relative">
                            <img src="<?= SITE_URL ?>/public/images/<?= htmlspecialchars($noticia['imagen'] ?: 'noti4.jpg') ?>"
                                 alt="<?= htmlspecialchars($noticia['titulo']) ?>"
                                 style="width: 100%; height: 100%; object-fit: cover; min-height: 500px;">
                        </div>

                        <!-- Texto (Fondo ligeramente gris para contrastar) -->
                        <div class="col-md-7 bg-light">
                            <div class="p-4 p-lg-5 h-100 d-flex flex-column justify-content-center">
                                
                                <!-- Etiqueta de Destacada imponente -->
                                <div class="mb-3 d-flex align-items-center gap-2">
                                    <span class="badge px-3 py-2 text-uppercase" style="background: <?= $feat['color'] ?>; letter-spacing: 1.5px; font-size: 0.75rem; box-shadow: 0 4px 10px rgba(225,22,27,0.3);">
                                        <i class="bi <?= $feat['icon'] ?> me-1"></i> <?= $feat['label'] ?>
                                    </span>
                                    <span class="badge bg-dark px-3 py-2 text-uppercase" style="letter-spacing: 1.5px; font-size: 0.75rem;">
                                        ★ Destacada
                                    </span>
                                </div>

                                <h1 class="fw-bold mb-3" style="font-size: 2.8rem; line-height: 1.15; color: #111; letter-spacing: -0.5px;">
                                    <?= htmlspecialchars($noticia['titulo']) ?>
                                </h1>
                                
                                <?php if (!empty($noticia['resumen'])): ?>
                                    <p class="mb-4 text-dark" style="font-size: 1.25rem; line-height: 1.5; font-weight: 500;">
                                        <?= htmlspecialchars($noticia['resumen']) ?>
                                    </p>
                                <?php endif; ?>

                                <!-- Separador de color -->
                                <hr style="border-top: 3px solid <?= $feat['color'] ?>; width: 60px; opacity: 1; margin: 0 0 1.5rem 0;">

                                <div class="mb-4" style="font-size: 1.05rem; color: #555; line-height: 1.8;">
                                    <?= nl2br(htmlspecialchars($noticia['cuerpo'])) ?>
                                </div>

                                <!-- Renderizado de datos -->
                                <?php $m = $noticia['meta'] ?? []; ?>
                                
                                <?php if ($noticia['tipo'] === 'normativa' && !empty($m['checklist'])): ?>
                                    <div class="mt-2 p-4 bg-white rounded shadow-sm border">
                                        <h6 class="fw-bold mb-3 text-uppercase" style="letter-spacing: 1px; font-size: 0.85rem; color: <?= $feat['color'] ?>;">Puntos Clave</h6>
                                        <ul class="list-unstyled mb-0 d-flex flex-column gap-3">
                                            <?php foreach ($m['checklist'] as $item): ?>
                                                <li class="d-flex align-items-start gap-3">
                                                    <i class="bi bi-check-circle-fill mt-1" style="color: <?= $feat['color'] ?>; font-size: 1.1rem;"></i> 
                                                    <span style="font-size: 1.05rem; font-weight: 500; color: #222;"><?= htmlspecialchars($item) ?></span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php elseif ($noticia['tipo'] === 'equipo' && !empty($m)): ?>
                                    <div class="mt-3 p-4 bg-white rounded shadow-sm border">
                                        <h6 class="fw-bold mb-3 text-uppercase" style="letter-spacing: 1px; font-size: 0.85rem; color: <?= $feat['color'] ?>;">Ficha Técnica</h6>
                                        <ul class="list-unstyled mb-0 row g-3">
                                            <?php foreach (['marca'=>'Marca','capacidad'=>'Capacidad','presion'=>'Presión','combustible'=>'Combustible'] as $k=>$l): if(!empty($m[$k])): ?>
                                                <li class="col-sm-6 d-flex justify-content-between border-bottom pb-2">
                                                    <span class="text-muted fw-semibold" style="font-size: 0.95rem;"><?= $l ?></span>
                                                    <strong style="font-size: 1rem; color: #111;"><?= htmlspecialchars($m[$k]) ?></strong>
                                                </li>
                                            <?php endif; endforeach; ?>
                                        </ul>
                                    </div>
                                <?php elseif ($noticia['tipo'] === 'proyecto' && !empty($m)): ?>
                                    <div class="row g-3 mt-2">
                                        <?php if(!empty($m['reto'])): ?>
                                            <div class="col-sm-6">
                                                <div class="p-4 rounded bg-white shadow-sm h-100" style="border-left: 4px solid #e1161b;">
                                                    <strong class="d-block mb-2 text-danger" style="font-size: 0.85rem; letter-spacing: 1px;">EL RETO</strong>
                                                    <span style="font-size: 1rem; color: #444;"><?= nl2br(htmlspecialchars($m['reto'])) ?></span>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(!empty($m['solucion'])): ?>
                                            <div class="col-sm-6">
                                                <div class="p-4 rounded bg-white shadow-sm h-100" style="border-left: 4px solid #16a34a;">
                                                    <strong class="d-block mb-2 text-success" style="font-size: 0.85rem; letter-spacing: 1px;">LA SOLUCIÓN</strong>
                                                    <span style="font-size: 1rem; color: #444;"><?= nl2br(htmlspecialchars($m['solucion'])) ?></span>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
        <?php endif; ?>

        <!-- ═══ GRID DE NOTICIAS (CENTRADAS) ═══ -->
        <?php
        $otras = array_filter($noticias ?? [], fn($n) => $n['id'] != ($noticia['id'] ?? 0));
        if (!empty($otras)):
        ?>
        <div class="idm-section-head text-center mb-4 mt-5" data-aos="fade-up">
            <span class="idm-eyebrow text-center">Todas las publicaciones</span>
            <h2 class="idm-h2 text-center">Últimas <b>Noticias</b></h2>
        </div>
        
        <!-- Aquí está la clase justify-content-center para que se centren -->
        <div class="row g-4 justify-content-center">
            <?php foreach ($otras as $i => $n):
                $t = $tipoMeta[$n['tipo']] ?? $tipoMeta['normativa'];
                $nm = $n['meta'] ?? [];
            ?>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 100 ?>">
                <div class="h-100">
                    <article class="idm-news-card h-100">
                        <div class="idm-news-card-image">
                            <span class="idm-news-card-badge" style="background:<?= $t['color'] ?>;">
                                <i class="bi <?= $t['icon'] ?> me-1"></i> <?= $t['label'] ?>
                            </span>
                            <img src="<?= SITE_URL ?>/public/images/<?= htmlspecialchars($n['imagen'] ?: 'noti4.jpg') ?>"
                                 alt="<?= htmlspecialchars($n['titulo']) ?>">
                        </div>
                        <div class="idm-news-card-body">
                            <h3 style="font-size:1.15rem;"><?= htmlspecialchars($n['titulo']) ?></h3>
                            
                            <?php if (!empty($n['resumen'])): ?>
                            <p class="mb-2" style="font-size:.92rem; font-weight: 600; color: #444;">
                                <?= htmlspecialchars($n['resumen']) ?>
                            </p>
                            <?php endif; ?>

                            <div style="font-size: .88rem; color: #666;" class="mb-3">
                                <?= nl2br(htmlspecialchars($n['cuerpo'])) ?>
                            </div>

                            <?php if ($n['tipo'] === 'normativa' && !empty($nm['checklist'])): ?>
                                <ul class="idm-news-checklist" style="font-size: 0.85rem;">
                                    <?php foreach ($nm['checklist'] as $item): ?>
                                        <li><i class="bi bi-patch-check-fill"></i> <span><?= htmlspecialchars($item) ?></span></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php elseif ($n['tipo'] === 'equipo' && !empty($nm)): ?>
                                <div class="idm-equipment-card" style="box-shadow: none; border: 1px solid #eee;">
                                    <ul class="idm-equipment-list list-unstyled mb-0" style="font-size: 0.85rem;">
                                        <?php foreach (['marca'=>'Marca','capacidad'=>'Capacidad','presion'=>'Presión','combustible'=>'Combustible'] as $k=>$l): if(!empty($nm[$k])): ?>
                                            <li><strong><?= $l ?></strong><span><?= htmlspecialchars($nm[$k]) ?></span></li>
                                        <?php endif; endforeach; ?>
                                    </ul>
                                </div>
                            <?php elseif ($n['tipo'] === 'proyecto' && !empty($nm)): ?>
                                <div class="mt-2 p-3 bg-light rounded" style="font-size: 0.85rem;">
                                    <?php if(!empty($nm['reto'])): ?><p style="margin-bottom: 6px;"><strong>Reto:</strong> <?= htmlspecialchars($nm['reto']) ?></p><?php endif; ?>
                                    <?php if(!empty($nm['solucion'])): ?><p style="margin-bottom: 0;"><strong>Solución:</strong> <?= htmlspecialchars($nm['solucion']) ?></p><?php endif; ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    </article>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
            <?php if (empty($noticia)): ?>
            <div class="text-center py-5 text-muted">
                <i class="bi bi-newspaper" style="font-size:3rem;opacity:.3;"></i>
                <p class="mt-3">Aún no hay noticias publicadas.</p>
            </div>
            <?php endif; ?>
        <?php endif; ?>

    </div>
</section>