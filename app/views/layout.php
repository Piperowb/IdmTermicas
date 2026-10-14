<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?= htmlspecialchars($metaDesc ?? 'IDM TERMICAS') ?>">
<title><?= htmlspecialchars($pageTitle ?? 'IDM TERMICAS') ?></title>

<!-- Bootstrap 5.3 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

<!-- AOS - Animate On Scroll -->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Sarabun:wght@400;600;700;800&display=swap" rel="stylesheet">

<!-- CSS propios -->
<link rel="stylesheet" href="<?= SITE_URL ?>/public/css/animation.css">
<link rel="stylesheet" href="<?= SITE_URL ?>/public/css/main.css">
<link rel="icon" type="image/png" href="<?= SITE_URL ?>/public/images/logoidm2.png">
</head>
<body>

<?php require_once VIEWS_PATH . '/partials/header.php'; ?>

<main id="main-content">
    <?php require_once $content; ?>
</main>

<?php require_once VIEWS_PATH . '/partials/footer.php'; ?>

<!-- WhatsApp Float -->
<a href="https://wa.me/<?= SITE_WHATSAPP ?>?text=Hola%20IDM%20T%C3%89RMICAS%2C%20necesito%20m%C3%A1s%20informaci%C3%B3n"
   target="_blank" class="idm-whatsapp-float" aria-label="WhatsApp">
    <i class="bi bi-whatsapp"></i>
</a>

<!-- Scroll to Top -->
<button class="idm-scroll-top" id="scrollTop" aria-label="Scroll top">
    <i class="bi bi-arrow-up"></i>
</button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script src="<?= SITE_URL ?>/public/js/main.js"></script>
</body>
</html>