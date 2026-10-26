<?php
class NewsModel
{
    /**
     * Todos los tipos disponibles con su configuración visual
     */
    public static function getTipos(): array
    {
        return [
            'normativa' => [
                'label'       => 'Normativa / Artículo',
                'icon'        => 'bi-file-earmark-text-fill',
                'color'       => '#e1161b',
                'descripcion' => 'Artículo sobre resoluciones, leyes o buenas prácticas. Incluye checklist de beneficios.',
            ],
            'equipo' => [
                'label'       => 'Ficha de Equipo',
                'icon'        => 'bi-gear-wide-connected',
                'color'       => '#225b7b',
                'descripcion' => 'Presentación técnica de un equipo: caldera, intercambiador, etc.',
            ],
            'proyecto' => [
                'label'       => 'Proyecto / Caso de Éxito',
                'icon'        => 'bi-trophy-fill',
                'color'       => '#2d7599',
                'descripcion' => 'Descripción de un proyecto completado con cliente, reto y solución.',
            ],
        ];
    }

    /**
     * Todas las noticias activas desde BD
     */
    public static function getAll(): array
    {
        try {
            $pdo  = Database::get();
            $stmt = $pdo->query('
                SELECT * FROM idm_noticias
                WHERE activa = 1
                ORDER BY destacada DESC, created_at DESC
            ');
            $rows = $stmt->fetchAll();
            foreach ($rows as &$row) {
                $row['meta'] = $row['meta_json'] ? json_decode($row['meta_json'], true) : [];
            }
            return $rows;
        } catch (Exception $e) {
            error_log('NewsModel::getAll — ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Noticia destacada (para home / página noticias)
     */
    public static function getDestacada(): ?array
    {
        try {
            $pdo  = Database::get();
            $stmt = $pdo->prepare('
                SELECT * FROM idm_noticias
                WHERE activa = 1 AND destacada = 1
                ORDER BY created_at DESC
                LIMIT 1
            ');
            $stmt->execute();
            $row = $stmt->fetch();
            if (!$row) return null;
            $row['meta'] = $row['meta_json'] ? json_decode($row['meta_json'], true) : [];
            return $row;
        } catch (Exception $e) {
            error_log('NewsModel::getDestacada — ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Una noticia por slug
     */
    public static function getBySlug(string $slug): ?array
    {
        try {
            $pdo  = Database::get();
            $stmt = $pdo->prepare('
                SELECT * FROM idm_noticias
                WHERE TRIM(slug) = :slug AND activa = 1
                LIMIT 1
            ');
            $stmt->execute([':slug' => trim($slug)]);
            $row = $stmt->fetch();
            
            if (!$row) return null;
            
            $row['meta'] = !empty($row['meta_json']) ? json_decode($row['meta_json'], true) : [];
            return $row;
        } catch (Exception $e) {
            return null;
        }
    }

    /**
     * Guardar o actualizar noticia (usado por el admin)
     */
        public static function save(array $data): int
    {
        $pdo = Database::get();

        $meta = [];

        // Construir meta_json según tipo
        if ($data['tipo'] === 'normativa') {
            $items = array_filter(array_map('trim', explode("\n", $data['checklist'] ?? '')));
            $meta  = ['checklist' => array_values($items)];
        } elseif ($data['tipo'] === 'equipo') {
            $meta = [
                'marca'       => trim($data['eq_marca']       ?? ''),
                'capacidad'   => trim($data['eq_capacidad']   ?? ''),
                'presion'     => trim($data['eq_presion']     ?? ''),
                'combustible' => trim($data['eq_combustible'] ?? ''),
                'quemador'    => trim($data['eq_quemador']    ?? ''),
                'auxiliares'  => trim($data['eq_auxiliares']  ?? ''),
                'aislamiento' => trim($data['eq_aislamiento'] ?? ''),
                'forro'       => trim($data['eq_forro']       ?? ''),
            ];
        } elseif ($data['tipo'] === 'proyecto') {
            $meta = [
                'cliente'  => trim($data['proy_cliente']  ?? ''),
                'sector'   => trim($data['proy_sector']   ?? ''),
                'reto'     => trim($data['proy_reto']     ?? ''),
                'solucion' => trim($data['proy_solucion'] ?? ''),
            ];
        }

        // Generar slug SOLO si es nueva noticia
        if (empty($data['id'])) {
            $data['slug'] = self::slugify($data['titulo']);
        } else {
            // Si es edición, conservar el slug que ya tenía en la BD
            $stmtSlug = $pdo->prepare('SELECT slug FROM idm_noticias WHERE id = :id');
            $stmtSlug->execute([':id' => $data['id']]);
            $slugExistente = $stmtSlug->fetchColumn();
            $data['slug'] = $slugExistente ?: self::slugify($data['titulo']);
        }

        if (!empty($data['id'])) {
            // UPDATE (Igual que lo tenías)
            $stmt = $pdo->prepare('
                UPDATE idm_noticias SET
                    tipo        = :tipo,
                    titulo      = :titulo,
                    slug        = :slug,
                    resumen     = :resumen,
                    cuerpo      = :cuerpo,
                    imagen      = :imagen,
                    imagen_hero = :imagen_hero,
                    meta_json   = :meta_json,
                    destacada   = :destacada,
                    activa      = :activa
                WHERE id = :id
            ');
            $stmt->execute([
                ':tipo'        => $data['tipo'],
                ':titulo'      => $data['titulo'],
                ':slug'        => $data['slug'],
                ':resumen'     => $data['resumen'] ?? null,
                ':cuerpo'      => $data['cuerpo'],
                ':imagen'      => $data['imagen'] ?? null,
                ':imagen_hero' => $data['imagen_hero'] ?? null,
                ':meta_json'   => json_encode($meta, JSON_UNESCAPED_UNICODE),
                ':destacada'   => (int)($data['destacada'] ?? 0),
                ':activa'      => (int)($data['activa'] ?? 1),
                ':id'          => $data['id'],
            ]);
            return (int)$data['id'];
        } else {
            // INSERT (Igual que lo tenías)
            $stmt = $pdo->prepare('
                INSERT INTO idm_noticias
                    (tipo, titulo, slug, resumen, cuerpo, imagen, imagen_hero, meta_json, destacada, activa)
                VALUES
                    (:tipo, :titulo, :slug, :resumen, :cuerpo, :imagen, :imagen_hero, :meta_json, :destacada, :activa)
            ');
            $stmt->execute([
                ':tipo'        => $data['tipo'],
                ':titulo'      => $data['titulo'],
                ':slug'        => $data['slug'],
                ':resumen'     => $data['resumen'] ?? null,
                ':cuerpo'      => $data['cuerpo'],
                ':imagen'      => $data['imagen'] ?? null,
                ':imagen_hero' => $data['imagen_hero'] ?? null,
                ':meta_json'   => json_encode($meta, JSON_UNESCAPED_UNICODE),
                ':destacada'   => (int)($data['destacada'] ?? 0),
                ':activa'      => (int)($data['activa'] ?? 1),
            ]);
            return (int)$pdo->lastInsertId();
        }
    }
    
    public static function delete(int $id): void
    {
        $pdo  = Database::get();
        $stmt = $pdo->prepare('DELETE FROM idm_noticias WHERE id = :id');
        $stmt->execute([':id' => $id]);
    }

    public static function slugify(string $text): string
    {
        $text = mb_strtolower($text, 'UTF-8');
        $map  = ['á'=>'a','é'=>'e','í'=>'i','ó'=>'o','ú'=>'u','ñ'=>'n','ü'=>'u'];
        $text = strtr($text, $map);
        $text = preg_replace('/[^a-z0-9\s-]/', '', $text);
        $text = preg_replace('/[\s-]+/', '-', trim($text));
        return $text . '-' . substr(uniqid(), -4);
    }
}