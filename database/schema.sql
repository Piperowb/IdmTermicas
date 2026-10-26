-- ============================================================
-- IDM TÉRMICAS — Script de tablas
-- Base: idmtermi_db
-- Prefijo: idm_
-- ============================================================

SET NAMES utf8mb4;
SET time_zone = '-05:00'; -- Colombia UTC-5

-- ────────────────────────────────────────────────────────────
-- 1. MENSAJES DE CONTACTO
--    Guarda cada envío del formulario /contacto
-- ────────────────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS idm_contactos (
    id          INT UNSIGNED    NOT NULL AUTO_INCREMENT,
    nombre      VARCHAR(150)    NOT NULL,
    email       VARCHAR(255)    NOT NULL,
    asunto      VARCHAR(255)        NULL DEFAULT NULL,
    mensaje     TEXT            NOT NULL,
    ip          VARCHAR(45)         NULL DEFAULT NULL COMMENT 'IPv4 o IPv6 del remitente',
    leido       TINYINT(1)      NOT NULL DEFAULT 0    COMMENT '0=no leído, 1=leído',
    created_at  TIMESTAMP       NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at  TIMESTAMP       NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    INDEX idx_leido     (leido),
    INDEX idx_email     (email),
    INDEX idx_created   (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- ────────────────────────────────────────────────────────────
-- 2. NOTICIAS / PUBLICACIONES
--    Para gestionar las noticias del sitio desde BD
--    (actualmente hardcoded en NewsModel)
-- ────────────────────────────────────────────────────────────
CREATE TABLE idm_noticias (
    id           INT UNSIGNED    NOT NULL AUTO_INCREMENT,
    tipo         VARCHAR(20)     NOT NULL DEFAULT 'normativa'
                                 COMMENT 'normativa | equipo | proyecto',
    titulo       VARCHAR(255)    NOT NULL,
    slug         VARCHAR(255)    NOT NULL UNIQUE,
    resumen      TEXT                NULL,
    cuerpo       LONGTEXT        NOT NULL,
    imagen       VARCHAR(255)        NULL COMMENT 'Imagen miniatura / listado',
    imagen_hero  VARCHAR(255)        NULL COMMENT 'Imagen grande del hero',
    meta_json    JSON                NULL COMMENT 'Checklist, ficha técnica, etc.',
    destacada    TINYINT(1)      NOT NULL DEFAULT 0,
    activa       TINYINT(1)      NOT NULL DEFAULT 1,
    created_at   TIMESTAMP       NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at   TIMESTAMP       NOT NULL DEFAULT CURRENT_TIMESTAMP
                                 ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY  (id),
    UNIQUE KEY   uk_slug      (slug),
    INDEX        idx_tipo      (tipo),
    INDEX        idx_destacada (destacada),
    INDEX        idx_activa    (activa)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- ────────────────────────────────────────────────────────────
-- 3. SUSCRIPTORES DE NEWSLETTER
--    Por si en el futuro se agrega un campo de suscripción
-- ────────────────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS idm_suscriptores (
    id          INT UNSIGNED    NOT NULL AUTO_INCREMENT,
    email       VARCHAR(255)    NOT NULL,
    activo      TINYINT(1)      NOT NULL DEFAULT 1,
    created_at  TIMESTAMP       NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at  TIMESTAMP       NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY  uk_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- ────────────────────────────────────────────────────────────
-- 4. CLIENTES / LOGOS
--    Para gestionar el slider de logos desde BD
--    (actualmente hardcoded en ServiceModel::getClientLogos)
-- ────────────────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS idm_clientes (
    id          INT UNSIGNED    NOT NULL AUTO_INCREMENT,
    nombre      VARCHAR(150)    NOT NULL,
    logo        VARCHAR(255)    NOT NULL COMMENT 'Nombre del archivo en public/images/',
    url         VARCHAR(255)        NULL DEFAULT NULL COMMENT 'Sitio web del cliente (opcional)',
    orden       SMALLINT        NOT NULL DEFAULT 0   COMMENT 'Orden en el slider',
    activo      TINYINT(1)      NOT NULL DEFAULT 1,
    created_at  TIMESTAMP       NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at  TIMESTAMP       NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    INDEX idx_orden  (orden),
    INDEX idx_activo (activo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;