<!-- HERO -->
<section class="idm-page-hero">
    <div class="idm-page-hero-bg" style="background-image:url('<?= SITE_URL ?>/public/images/equipo.jpg')"></div>
    <div class="idm-page-hero-overlay"></div>
    <div class="idm-page-hero-noise"></div>
    <div class="idm-page-hero-glow"></div>
    <div class="idm-page-hero-glow idm-page-hero-glow-2"></div>
    <div class="container" data-aos="fade-up">
        <span class="idm-page-hero-badge">
            <i class="bi bi-chat-dots-fill"></i> Hablemos
        </span>
        <h1 class="idm-page-title">
            <u>Ponte en Contacto</u>
            <b>con Nosotros</b>
        </h1>
        <p class="idm-page-hero-desc">
            ¿Tienes preguntas o necesitas más información sobre cómo podemos ayudarte con nuestras soluciones térmicas? Estamos aquí para ti.
        </p>
        <nav class="idm-breadcrumb">
            <a href="<?= SITE_URL ?>/">Inicio</a> / <span>Contacto</span>
        </nav>
    </div>
</section>

<!-- CONTACTO -->
<section class="idm-section idm-page-bg-soft">
    <div class="container">

        <div class="idm-contact-grid">
            <div class="idm-contact-card" data-aos="fade-up" data-aos-delay="0">
                <div class="idm-contact-card-icon"><i class="bi bi-geo-alt-fill"></i></div>
                <h5>Dirección</h5>
                <p><?= SITE_ADDRESS ?></p>
            </div>
            <div class="idm-contact-card" data-aos="fade-up" data-aos-delay="100">
                <div class="idm-contact-card-icon"><i class="bi bi-telephone-fill"></i></div>
                <h5>Celulares</h5>
                <p>
                    <a href="tel:+57<?= SITE_PHONE ?>"><?= SITE_PHONE ?></a><br>
                    <a href="tel:+57<?= SITE_PHONE_ALT ?>"><?= SITE_PHONE_ALT ?></a>
                </p>
            </div>
            <div class="idm-contact-card" data-aos="fade-up" data-aos-delay="200">
                <div class="idm-contact-card-icon"><i class="bi bi-envelope-fill"></i></div>
                <h5>Email</h5>
                <p><a href="mailto:<?= SITE_EMAIL ?>"><?= SITE_EMAIL ?></a></p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="idm-form-wrapper" data-aos="fade-up" data-aos-delay="300">

                    <h2 class="idm-form-title">Envíanos un mensaje</h2>
                    <p class="idm-form-subtitle">
                        Completa el formulario y nuestro equipo te responderá en menos de 24 horas.
                        Los campos marcados con <span style="color:#e1161b;">*</span> son obligatorios.
                    </p>

                    <?php if (isset($success)): ?>
                    <div class="alert alert-success mb-4" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        ¡Mensaje enviado! Te responderemos en menos de 24 horas.
                    </div>
                    <?php endif; ?>

                    <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger mb-4" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <?= $_GET['error'] === 'campos'
                            ? 'Por favor completa todos los campos correctamente.'
                            : 'Ocurrió un error. Inténtalo de nuevo.' ?>
                    </div>
                    <?php endif; ?>

                    <form action="<?= SITE_URL ?>/contacto/enviar" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="idm-form-row">
                                    <label class="idm-form-label">Nombre completo <span>*</span></label>
                                    <input type="text" name="nombre" class="idm-form-control"
                                           placeholder="Ingrese su nombre completo" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="idm-form-row">
                                    <label class="idm-form-label">Email <span>*</span></label>
                                    <input type="email" name="email" class="idm-form-control"
                                           placeholder="Ingrese su email" required>
                                </div>
                            </div>
                        </div>

                        <div class="idm-form-row">
                            <label class="idm-form-label">Asunto</label>
                            <input type="text" name="asunto" class="idm-form-control"
                                   placeholder="Motivo de tu mensaje">
                        </div>

                        <div class="idm-form-row">
                            <label class="idm-form-label">Mensaje <span>*</span></label>
                            <textarea name="mensaje" class="idm-form-control"
                                      placeholder="Cuéntanos tu necesidad..." required></textarea>
                        </div>

                        <button type="submit" class="idm-form-submit">
                            <i class="bi bi-send-fill"></i> Enviar Mensaje
                        </button>
                    </form>

                </div>
            </div>
        </div>

    </div>
</section>