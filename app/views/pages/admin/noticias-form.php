<?php
$es_editar = !empty($noticia);
$meta      = $noticia['meta'] ?? [];
?>

<?php if (isset($_GET['error'])): ?>
<div class="alert alert-danger mb-4">
    <i class="bi bi-exclamation-triangle-fill me-2"></i>
    Por favor completa los campos obligatorios (título, tipo y cuerpo).
</div>
<?php endif; ?>

<form action="<?= SITE_URL ?>/admin/noticias/guardar"
      method="POST" enctype="multipart/form-data">

    <?php if ($es_editar): ?>
    <input type="hidden" name="id"          value="<?= $noticia['id'] ?>">
    <input type="hidden" name="imagen"      value="<?= $noticia['imagen'] ?? '' ?>">
    <input type="hidden" name="imagen_hero" value="<?= $noticia['imagen_hero'] ?? '' ?>">
    <?php endif; ?>

    <div class="row g-4">

        <!-- Columna principal -->
        <div class="col-lg-8">

            <!-- Datos generales -->
            <div class="adm-card mb-4">
                <div class="adm-card-header">
                    <h5 class="adm-card-title">Información general</h5>
                </div>
                <div class="adm-card-body">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Título <span class="text-danger">*</span></label>
                        <input type="text" name="titulo" class="form-control"
                               value="<?= htmlspecialchars($noticia['titulo'] ?? '') ?>"
                               placeholder="Ej: Resolución 1857 de 2024 — ¿Estás al día?" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Resumen <small class="text-muted">(se muestra en listado)</small></label>
                        <textarea name="resumen" class="form-control" rows="2"
                                  placeholder="Breve descripción de la noticia..."><?= htmlspecialchars($noticia['resumen'] ?? '') ?></textarea>
                    </div>

                    <div class="mb-0">
                        <label class="form-label fw-semibold">Cuerpo / Descripción principal <span class="text-danger">*</span></label>
                        <textarea name="cuerpo" class="form-control" rows="5"
                                  placeholder="Texto principal de la noticia..."><?= htmlspecialchars($noticia['cuerpo'] ?? '') ?></textarea>
                        <small class="text-muted">Puedes usar saltos de línea para párrafos.</small>
                    </div>
                </div>
            </div>

            <!-- Campos según tipo -->
            <div class="adm-card mb-4" id="camposTipo">
                <div class="adm-card-header">
                    <h5 class="adm-card-title">
                        <i class="bi bi-sliders me-2"></i>
                        Datos específicos del tipo
                    </h5>
                </div>
                <div class="adm-card-body">

                    <!-- NORMATIVA: checklist -->
                    <div class="adm-fields-tipo <?= ($noticia['tipo'] ?? '') === 'normativa' ? 'active' : '' ?>"
                         id="campos-normativa">
                        <label class="form-label fw-semibold">
                            Checklist de beneficios
                            <small class="text-muted">(uno por línea)</small>
                        </label>
                        <textarea name="checklist" class="form-control" rows="5"
                                  placeholder="Experiencia certificada en inspección.&#10;Cumplimiento de normativas vigentes.&#10;Diagnóstico sin costo adicional."><?php
                            $cl = $meta['checklist'] ?? [];
                            echo htmlspecialchars(implode("\n", $cl));
                        ?></textarea>
                    </div>

                    <!-- EQUIPO: ficha técnica -->
                    <div class="adm-fields-tipo <?= ($noticia['tipo'] ?? '') === 'equipo' ? 'active' : '' ?>"
                         id="campos-equipo">
                        <div class="row g-3">
                            <?php
                            $campos_eq = [
                                'eq_marca'       => 'Marca',
                                'eq_capacidad'   => 'Capacidad (BHP)',
                                'eq_presion'     => 'Presión (PSIG)',
                                'eq_combustible' => 'Combustible',
                                'eq_quemador'    => 'Quemador',
                                'eq_auxiliares'  => 'Auxiliares',
                                'eq_aislamiento' => 'Aislamiento',
                                'eq_forro'       => 'Forro',
                            ];
                            $keys_map = [
                                'eq_marca'=>'marca','eq_capacidad'=>'capacidad',
                                'eq_presion'=>'presion','eq_combustible'=>'combustible',
                                'eq_quemador'=>'quemador','eq_auxiliares'=>'auxiliares',
                                'eq_aislamiento'=>'aislamiento','eq_forro'=>'forro',
                            ];
                            foreach ($campos_eq as $field => $label):
                                $val = $meta[$keys_map[$field]] ?? '';
                            ?>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold"><?= $label ?></label>
                                <input type="text" name="<?= $field ?>" class="form-control"
                                       value="<?= htmlspecialchars($val) ?>">
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- PROYECTO: caso de éxito -->
                    <div class="adm-fields-tipo <?= ($noticia['tipo'] ?? '') === 'proyecto' ? 'active' : '' ?>"
                         id="campos-proyecto">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Cliente / Empresa</label>
                            <input type="text" name="proy_cliente" class="form-control"
                                   value="<?= htmlspecialchars($meta['cliente'] ?? '') ?>"
                                   placeholder="Ej: Textiles del Valle S.A.">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Sector Industrial</label>
                            <input type="text" name="proy_sector" class="form-control"
                                   value="<?= htmlspecialchars($meta['sector'] ?? '') ?>"
                                   placeholder="Ej: Textil, Alimenticio, Hospitalario...">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Reto / Problema</label>
                            <textarea name="proy_reto" class="form-control" rows="3"
                                      placeholder="¿Qué problema tenía el cliente?"><?= htmlspecialchars($meta['reto'] ?? '') ?></textarea>
                        </div>
                        <div class="mb-0">
                            <label class="form-label fw-semibold">Solución implementada</label>
                            <textarea name="proy_solucion" class="form-control" rows="3"
                                      placeholder="¿Cómo lo resolvió IDM Térmicas?"><?= htmlspecialchars($meta['solucion'] ?? '') ?></textarea>
                        </div>
                    </div>

                    <p class="text-muted small mt-3 mb-0" id="msg-sin-tipo"
                       style="<?= !empty($noticia['tipo']) ? 'display:none' : '' ?>">
                        <i class="bi bi-arrow-up me-1"></i>
                        Selecciona un tipo de noticia para ver los campos específicos.
                    </p>
                </div>
            </div>

        </div>

        <!-- Columna lateral -->
        <div class="col-lg-4">

            <!-- Tipo y estado -->
            <div class="adm-card mb-4">
                <div class="adm-card-header">
                    <h5 class="adm-card-title">Tipo y estado</h5>
                </div>
                <div class="adm-card-body">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tipo de noticia <span class="text-danger">*</span></label>
                        <select name="tipo" id="selectTipo" class="form-select" required>
                            <option value="">— Selecciona —</option>
                            <?php foreach ($tipos as $key => $t): ?>
                            <option value="<?= $key ?>"
                                <?= ($noticia['tipo'] ?? '') === $key ? 'selected' : '' ?>>
                                <?= $t['label'] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <!-- Descripción del tipo -->
                        <?php foreach ($tipos as $key => $t): ?>
                        <small class="text-muted tipo-desc tipo-desc-<?= $key ?>"
                               style="<?= ($noticia['tipo'] ?? '') === $key ? '' : 'display:none' ?>">
                            <i class="bi <?= $t['icon'] ?> me-1"></i>
                            <?= $t['descripcion'] ?>
                        </small>
                        <?php endforeach; ?>
                    </div>

                    <div class="mb-0">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox"
                                   name="destacada" id="chkDestacada" value="1"
                                   <?= ($noticia['destacada'] ?? 0) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="chkDestacada">
                                <i class="bi bi-star-fill text-warning me-1"></i>
                                Marcar como destacada
                            </label>
                        </div>
                        <small class="text-muted">
                            La noticia destacada aparece en la página principal.
                        </small>
                    </div>
                </div>
            </div>

            <!-- Imágenes -->
            <div class="adm-card mb-4">
                <div class="adm-card-header">
                    <h5 class="adm-card-title">Imágenes</h5>
                </div>
                <div class="adm-card-body">

                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            Imagen miniatura
                            <small class="text-muted">(listado / card)</small>
                        </label>
                        <?php if (!empty($noticia['imagen'])): ?>
                        <div class="mb-2">
                            <img src="<?= SITE_URL ?>/public/images/<?= htmlspecialchars($noticia['imagen']) ?>"
                                 style="width:100%;height:120px;object-fit:cover;border-radius:8px;">
                            <small class="text-muted d-block mt-1">Imagen actual</small>
                        </div>
                        <?php endif; ?>
                        <input type="file" name="imagen" class="form-control"
                               accept="image/jpg,image/jpeg,image/png,image/webp">
                        <small class="text-muted">JPG, PNG o WebP. Máx 5MB.</small>
                    </div>

                    <div class="mb-0">
                        <label class="form-label fw-semibold">
                            Imagen hero / grande
                            <small class="text-muted">(página de detalle)</small>
                        </label>
                        <?php if (!empty($noticia['imagen_hero'])): ?>
                        <div class="mb-2">
                            <img src="<?= SITE_URL ?>/public/images/<?= htmlspecialchars($noticia['imagen_hero']) ?>"
                                 style="width:100%;height:120px;object-fit:cover;border-radius:8px;">
                            <small class="text-muted d-block mt-1">Imagen actual</small>
                        </div>
                        <?php endif; ?>
                        <input type="file" name="imagen_hero" class="form-control"
                               accept="image/jpg,image/jpeg,image/png,image/webp">
                        <small class="text-muted">Recomendado: 1200×600px.</small>
                    </div>
                </div>
            </div>

            <!-- Previsualización -->
            <div class="adm-card mb-4">
                <div class="adm-card-header">
                    <h5 class="adm-card-title">
                        <i class="bi bi-eye me-2"></i>Vista previa del tipo
                    </h5>
                </div>
                <div class="adm-card-body p-3">
                    <div class="adm-preview" id="preview">
                        <p class="text-muted text-center small">
                            Selecciona un tipo para ver la previsualización
                        </p>
                    </div>
                </div>
            </div>

            <!-- Botones -->
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-danger btn-lg">
                    <i class="bi bi-check-lg me-2"></i>
                    <?= $es_editar ? 'Guardar cambios' : 'Publicar noticia' ?>
                </button>
                <a href="<?= SITE_URL ?>/admin/noticias"
                   class="btn btn-outline-secondary">
                    Cancelar
                </a>
            </div>

        </div>
    </div>
</form>

<script>
const previews = {
    normativa: `
        <div class="adm-preview-title" style="color:#e1161b;">
            <i class="bi bi-file-earmark-text-fill"></i> NORMATIVA / ARTÍCULO
        </div>
        <div style="background:#fff;border-radius:8px;padding:14px;border:1px solid #f0f0f0;">
            <h6 style="color:#111;font-size:14px;margin-bottom:10px;">📋 Título del artículo</h6>
            <p style="font-size:12px;color:#666;margin-bottom:10px;">Texto principal con descripción de la normativa...</p>
            <div style="border-left:3px solid #e1161b;padding:8px 12px;background:#fff5f5;border-radius:0 6px 6px 0;font-size:12px;">
                <div style="color:#e1161b;font-weight:700;margin-bottom:6px;">✔ Beneficio 1</div>
                <div style="color:#e1161b;font-weight:700;">✔ Beneficio 2</div>
            </div>
        </div>`,

    equipo: `
        <div class="adm-preview-title" style="color:#225b7b;">
            <i class="bi bi-gear-wide-connected"></i> FICHA DE EQUIPO
        </div>
        <div style="background:#fff;border-radius:8px;padding:14px;border:1px solid #f0f0f0;">
            <h6 style="color:#111;font-size:13px;margin-bottom:10px;">⚙ CALDERA 100 BHP</h6>
            <table style="font-size:11.5px;width:100%;border-collapse:collapse;">
                <tr><td style="color:#888;padding:3px 0;width:45%;">Marca</td><td style="font-weight:600;">Continental</td></tr>
                <tr><td style="color:#888;padding:3px 0;">Capacidad</td><td style="font-weight:600;">100 BHP</td></tr>
                <tr><td style="color:#888;padding:3px 0;">Presión</td><td style="font-weight:600;">150 PSIG</td></tr>
                <tr><td style="color:#888;padding:3px 0;">Combustible</td><td style="font-weight:600;">Gas – ACPM</td></tr>
            </table>
            <div style="margin-top:10px;background:#225b7b;color:#fff;text-align:center;padding:6px;border-radius:6px;font-size:11px;font-weight:700;">
                SOLICITAR COTIZACIÓN
            </div>
        </div>`,

    proyecto: `
        <div class="adm-preview-title" style="color:#2d7599;">
            <i class="bi bi-trophy-fill"></i> PROYECTO / CASO DE ÉXITO
        </div>
        <div style="background:#fff;border-radius:8px;padding:14px;border:1px solid #f0f0f0;">
            <div style="display:flex;gap:8px;margin-bottom:10px;">
                <span style="background:#e8f4fd;color:#2d7599;font-size:10px;font-weight:700;padding:3px 8px;border-radius:100px;">SECTOR TEXTIL</span>
                <span style="background:#f0fdf4;color:#16a34a;font-size:10px;font-weight:700;padding:3px 8px;border-radius:100px;">COMPLETADO</span>
            </div>
            <h6 style="font-size:13px;color:#111;margin-bottom:6px;">Cliente: Textiles del Valle</h6>
            <p style="font-size:11.5px;color:#666;margin-bottom:6px;"><strong>Reto:</strong> Caldera con pérdida de eficiencia del 40%</p>
            <p style="font-size:11.5px;color:#666;margin:0;"><strong>Solución:</strong> Mantenimiento correctivo + calibración</p>
        </div>`
};

const selectTipo = document.getElementById('selectTipo');
const preview    = document.getElementById('preview');

function actualizarTipo(tipo) {
    // Campos específicos
    document.querySelectorAll('.adm-fields-tipo').forEach(el => el.classList.remove('active'));
    const campos = document.getElementById('campos-' + tipo);
    if (campos) campos.classList.add('active');

    // Descripción del tipo
    document.querySelectorAll('.tipo-desc').forEach(el => el.style.display = 'none');
    const desc = document.querySelector('.tipo-desc-' + tipo);
    if (desc) desc.style.display = '';

    // Preview
    if (previews[tipo]) {
        preview.innerHTML = previews[tipo];
    } else {
        preview.innerHTML = '<p class="text-muted text-center small">Selecciona un tipo</p>';
    }

    // Ocultar mensaje sin tipo
    const msg = document.getElementById('msg-sin-tipo');
    if (msg) msg.style.display = tipo ? 'none' : '';
}

selectTipo.addEventListener('change', () => actualizarTipo(selectTipo.value));

// Inicializar si hay tipo ya seleccionado (edición)
if (selectTipo.value) actualizarTipo(selectTipo.value);
</script>