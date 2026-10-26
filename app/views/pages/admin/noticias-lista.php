<?php if (isset($_GET['ok'])): ?>
<div class="alert alert-success alert-dismissible fade show mb-4">
    <i class="bi bi-check-circle-fill me-2"></i> Noticia guardada correctamente.
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>

<?php if (isset($_GET['deleted'])): ?>
<div class="alert alert-warning alert-dismissible fade show mb-4">
    <i class="bi bi-trash3-fill me-2"></i> Noticia eliminada.
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>

<div class="adm-card">
    <div class="adm-card-header">
        <h5 class="adm-card-title">
            <i class="bi bi-newspaper me-2 text-danger"></i>
            Noticias (<?= count($noticias) ?>)
        </h5>
        <a href="<?= SITE_URL ?>/admin/noticias/crear"
           class="btn btn-danger btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Nueva noticia
        </a>
    </div>
    <div class="adm-card-body p-0">
        <?php if (empty($noticias)): ?>
        <div class="text-center py-5 text-muted">
            <i class="bi bi-newspaper" style="font-size:2.5rem;opacity:.3;"></i>
            <p class="mt-3">No hay noticias aún. ¡Crea la primera!</p>
        </div>
        <?php else: ?>
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width:50px;">#</th>
                        <th>Título</th>
                        <th style="width:130px;">Tipo</th>
                        <th style="width:90px;">Estado</th>
                        <th style="width:110px;">Fecha</th>
                        <th style="width:140px;" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($noticias as $n): ?>
                    <tr>
                        <td class="text-muted"><?= $n['id'] ?></td>
                        <td>
                            <strong><?= htmlspecialchars($n['titulo']) ?></strong>
                            <?php if ($n['destacada']): ?>
                            <span class="badge bg-warning text-dark ms-1">
                                <i class="bi bi-star-fill"></i> Destacada
                            </span>
                            <?php endif; ?>
                            <?php if ($n['resumen']): ?>
                            <br><small class="text-muted">
                                <?= htmlspecialchars(mb_strimwidth($n['resumen'], 0, 80, '...')) ?>
                            </small>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php $t = $tipos[$n['tipo']] ?? null; ?>
                            <?php if ($t): ?>
                            <span class="adm-tipo-badge adm-tipo-<?= $n['tipo'] ?>">
                                <i class="bi <?= $t['icon'] ?>"></i>
                                <?= $t['label'] ?>
                            </span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($n['activa']): ?>
                            <span class="badge bg-success">Activa</span>
                            <?php else: ?>
                            <span class="badge bg-secondary">Inactiva</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-muted small">
                            <?= date('d/m/Y', strtotime($n['created_at'])) ?>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="<?= SITE_URL ?>/admin/noticias/editar?id=<?= $n['id'] ?>"
                                   class="btn btn-sm btn-outline-primary" title="Editar">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <a href="<?= SITE_URL ?>/admin/noticias/eliminar?id=<?= $n['id'] ?>"
                                   class="btn btn-sm btn-outline-danger"
                                   title="Eliminar"
                                   onclick="return confirm('¿Eliminar esta noticia?')">
                                    <i class="bi bi-trash3-fill"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>