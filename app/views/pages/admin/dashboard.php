<?php
$totalNoticias  = count($noticias);
$destacadas     = count(array_filter($noticias, fn($n) => $n['destacada']));
$recientes      = array_slice($noticias, 0, 5);
?>

<div class="row g-4 mb-4">
    <!-- Tarjeta 1 -->
    <div class="col-12 col-md-4">
        <div class="adm-card h-100">
            <div class="adm-card-body text-center d-flex flex-column h-100 justify-content-center py-4">
                <i class="bi bi-newspaper mb-3" style="font-size:2.5rem;color:#e1161b;"></i>
                <h3 class="mb-1 fw-bold"><?= $totalNoticias ?></h3>
                <p class="text-muted mb-4">Noticias activas</p>
                <a href="<?= SITE_URL ?>/admin/noticias" class="btn btn-danger btn-sm mx-auto mt-auto" style="width: fit-content;">
                    Gestionar noticias
                </a>
            </div>
        </div>
    </div>
    
    <!-- Tarjeta 2 -->
    <div class="col-12 col-md-4">
        <div class="adm-card h-100">
            <div class="adm-card-body text-center d-flex flex-column h-100 justify-content-center py-4">
                <i class="bi bi-star-fill mb-3" style="font-size:2.5rem;color:#f59e0b;"></i>
                <h3 class="mb-1 fw-bold"><?= $destacadas ?></h3>
                <p class="text-muted mb-4">Noticias destacadas</p>
                <a href="<?= SITE_URL ?>/admin/noticias/crear" class="btn btn-outline-secondary btn-sm mx-auto mt-auto" style="width: fit-content;">
                    Crear nueva
                </a>
            </div>
        </div>
    </div>
    
    <!-- Tarjeta 3 -->
    <div class="col-12 col-md-4">
        <div class="adm-card h-100">
            <div class="adm-card-body text-center d-flex flex-column h-100 justify-content-center py-4">
                <i class="bi bi-globe2 mb-3" style="font-size:2.5rem;color:#225b7b;"></i>
                <!-- Ajustamos el texto para que no desborde en móvil -->
                <h5 class="mb-1 fw-bold text-truncate px-2" title="<?= SITE_URL ?>"><?= SITE_URL ?></h5>
                <p class="text-muted mb-4">Sitio público</p>
                <a href="<?= SITE_URL ?>/noticias" target="_blank" class="btn btn-outline-secondary btn-sm mx-auto mt-auto" style="width: fit-content;">
                    Ver noticias
                </a>
            </div>
        </div>
    </div>
</div>

<div class="adm-card">
    <div class="adm-card-header">
        <h5 class="adm-card-title">
            <i class="bi bi-clock-history me-2 text-danger"></i>
            Últimas noticias
        </h5>
        <a href="<?= SITE_URL ?>/admin/noticias" class="btn btn-sm btn-outline-secondary d-none d-sm-inline-block">
            Ver todas <i class="bi bi-arrow-right"></i>
        </a>
    </div>
    <div class="adm-card-body p-0">
        <?php if (empty($recientes)): ?>
        <div class="text-center py-4 text-muted">
            <p class="mb-0">Aún no hay noticias. <a href="<?= SITE_URL ?>/admin/noticias/crear">Crea la primera</a>.</p>
        </div>
        <?php else: ?>
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Título</th>
                        <th style="width:130px;">Tipo</th>
                        <th style="width:110px;">Estado</th>
                        <th style="width:80px;">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recientes as $n): ?>
                    <tr>
                        <td><strong><?= htmlspecialchars($n['titulo']) ?></strong></td>
                        <td>
                            <span class="adm-tipo-badge adm-tipo-<?= $n['tipo'] ?>">
                                <?= htmlspecialchars($n['tipo']) ?>
                            </span>
                        </td>
                        <td>
                            <?php if ($n['activa']): ?>
                            <span class="badge bg-success">Activa</span>
                            <?php else: ?>
                            <span class="badge bg-secondary">Inactiva</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?= SITE_URL ?>/admin/noticias/editar?id=<?= $n['id'] ?>" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>