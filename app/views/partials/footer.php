<!-- ═══════════════════════════════════════════════════════════
     FOOTER PROFESIONAL IDM TÉRMICAS
     ═══════════════════════════════════════════════════════════ -->

<!-- CTA STRIP SUPERIOR (antes del footer) -->
<section class="idm-footer-cta">
    <div class="container">
        <div class="idm-footer-cta-inner" data-aos="fade-up">
            <div class="idm-footer-cta-content">
                <span class="idm-footer-cta-eyebrow">
                    <i class="bi bi-headset"></i> ¿Necesitas asesoría técnica?
                </span>
                <h3 class="idm-footer-cta-title">Hablemos de tu proyecto industrial</h3>
                <p class="idm-footer-cta-desc">Nuestro equipo de ingenieros está listo para ayudarte.</p>
            </div>
            <div class="idm-footer-cta-actions">
                <a href="tel:+57<?= SITE_PHONE ?>" class="idm-btn idm-btn-outline-light">
                    <i class="bi bi-telephone-fill"></i> <?= SITE_PHONE ?>
                </a>
                <a href="https://wa.me/<?= SITE_WHATSAPP ?>?text=Hola%20IDM%20T%C3%89RMICAS"
                   target="_blank" class="idm-btn idm-btn-whatsapp">
                    <i class="bi bi-whatsapp"></i> WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER PRINCIPAL -->
<footer class="idm-footer">
    <!-- Fondo decorativo -->
    <div class="idm-footer-bg">
        <div class="idm-footer-bg-circle idm-footer-bg-circle-1"></div>
        <div class="idm-footer-bg-circle idm-footer-bg-circle-2"></div>
        <div class="idm-footer-bg-grid"></div>
    </div>

    <div class="idm-footer-main">
        <div class="container">
            <div class="row g-5">

                <!-- Columna 1: Marca -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="idm-footer-brand">
                        <img src="<?= SITE_URL ?>/public/images/logoidm2.png"
                             alt="IDM TÉRMICAS"
                             class="idm-footer-logo">
                    </div>
                    <p class="idm-footer-about">
                        Empresa colombiana con amplia experiencia en el cálculo, diseño, fabricación,
                        montaje y mantenimiento de calderas bajo códigos internacionales ASME, TEMA y API.
                    </p>

                    <!-- Certificaciones -->
                    <div class="idm-footer-certs">
                        <span class="idm-cert-badge">ASME</span>
                        <span class="idm-cert-badge">TEMA</span>
                        <span class="idm-cert-badge">API</span>
                    </div>

                    <!-- Redes sociales -->
                   <div class="idm-footer-socials">
                        <a href="<?= SITE_FACEBOOK ?>" target="_blank" class="idm-social-btn idm-social-fb" aria-label="Facebook">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="<?= SITE_INSTAGRAM ?>" target="_blank" class="idm-social-btn idm-social-ig" aria-label="Instagram">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="<?= SITE_LINKEDIN ?>" target="_blank" class="idm-social-btn idm-social-li" aria-label="LinkedIn">
                            <i class="bi bi-linkedin"></i>
                        </a>
                        <a href="https://wa.me/<?= SITE_WHATSAPP ?>" target="_blank" class="idm-social-btn idm-social-wa" aria-label="WhatsApp">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                        <a href="mailto:<?= SITE_EMAIL ?>" class="idm-social-btn idm-social-mail" aria-label="Email">
                            <i class="bi bi-envelope-fill"></i>
                        </a>
                    </div>
                </div>

                <!-- Columna 2: Servicios -->
                <div class="col-lg-2 col-md-6 col-6" data-aos="fade-up" data-aos-delay="100">
                    <h5 class="idm-footer-heading">
                        <span class="idm-footer-heading-dash"></span>
                        Servicios
                    </h5>
                    <ul class="idm-footer-links">
                        <li>
                            <a href="<?= SITE_URL ?>/consultoria-e-interventoria">
                                <i class="bi bi-chevron-right"></i> Consultoría
                            </a>
                        </li>
                        <li>
                            <a href="<?= SITE_URL ?>/mantenimiento-y-calibracion">
                                <i class="bi bi-chevron-right"></i> Mantenimiento
                            </a>
                        </li>
                        <li>
                            <a href="<?= SITE_URL ?>/diseno-y-fabricacion">
                                <i class="bi bi-chevron-right"></i> Diseño y Fabricación
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Columna 3: Empresa -->
                <div class="col-lg-2 col-md-6 col-6" data-aos="fade-up" data-aos-delay="200">
                    <h5 class="idm-footer-heading">
                        <span class="idm-footer-heading-dash"></span>
                        Empresa
                    </h5>
                    <ul class="idm-footer-links">
                        <li>
                            <a href="<?= SITE_URL ?>/about-us">
                                <i class="bi bi-chevron-right"></i> Sobre nosotros
                            </a>
                        </li>
                        <li>
                            <a href="<?= SITE_URL ?>/noticias">
                                <i class="bi bi-chevron-right"></i> Noticias
                            </a>
                        </li>
                        <li>
                            <a href="<?= SITE_URL ?>/contacto">
                                <i class="bi bi-chevron-right"></i> Contacto
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Columna 4: Contacto -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <h5 class="idm-footer-heading">
                        <span class="idm-footer-heading-dash"></span>
                        Contáctanos
                    </h5>
                    <ul class="idm-footer-contact">
                        <li>
                            <div class="idm-footer-contact-icon"><i class="bi bi-telephone-fill"></i></div>
                            <div class="idm-footer-contact-body">
                                <span class="idm-footer-contact-label">Teléfonos</span>
                                <a href="tel:+57<?= SITE_PHONE ?>"><?= SITE_PHONE ?></a>
                                <a href="tel:+57<?= SITE_PHONE_ALT ?>"><?= SITE_PHONE_ALT ?></a>
                            </div>
                        </li>
                        <li>
                            <div class="idm-footer-contact-icon"><i class="bi bi-envelope-fill"></i></div>
                            <div class="idm-footer-contact-body">
                                <span class="idm-footer-contact-label">Correo electrónico</span>
                                <a href="mailto:<?= SITE_EMAIL ?>"><?= SITE_EMAIL ?></a>
                            </div>
                        </li>
                        <li>
                            <div class="idm-footer-contact-icon"><i class="bi bi-geo-alt-fill"></i></div>
                            <div class="idm-footer-contact-body">
                                <span class="idm-footer-contact-label">Dirección</span>
                                <a href="https://maps.google.com/?q=<?= urlencode(SITE_ADDRESS) ?>" target="_blank" rel="noopener noreferrer"><?= SITE_ADDRESS ?></a>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <!-- Línea de copyright -->
    <div class="idm-footer-bottom">
        <div class="container">
            <div class="idm-footer-bottom-inner">
                <div class="idm-footer-copy">
                    &copy; <?= date('Y') ?> <strong>IDM TÉRMICAS S.A.S</strong>. Todos los derechos reservados.
                </div>
                <div class="idm-footer-legal">
                    <a href="<?= SITE_URL ?>/about-us">Términos</a>
                    <span class="idm-footer-sep">·</span>
                    <a href="<?= SITE_URL ?>/contacto">Privacidad</a>
                    <span class="idm-footer-sep">·</span>
                    <span>Ingeniería y Diseño de Máquinas Térmicas</span>
                </div>
            </div>
        </div>
    </div>
</footer>