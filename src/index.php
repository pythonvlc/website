<?php
  // Get arguments from command line
  parse_str($argv[2], $event);
?>
<!DOCTYPE html>
<html lang="es">
	<head>
    <meta charset="utf-8">
    <title>Python Valencia</title>
    <link rel="icon" type="image/png" href="assets/img/favicons/favicon.webp">
    <link rel="apple-touch-icon" href="assets/img/favicons/touch-icon-iphone.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicons/touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="167x167" href="assets/img/favicons/touch-icon-ipad-retina.png">
    <meta name="theme-color" content="#FFFFFF">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="author" content="CCSTech.io">
    <meta name="keywords" content="python">
    <meta name="description" content="¡Hola Valencia! Grupo local de Python donde entusiastas del lenguaje nos reunimos para compartir nuestros conocimientos en charlas y talleres. Es gratis, como el buen código.">
    <meta name="twitter:card" content="Python Valencia">
    <meta name="twitter:site" content="@python_vlc">
    <meta property="og:image" content="assets/img/python-valencia-rrss.jpg">
    <meta property="og:title" content="Python Valencia">
    <meta property="og:type" content="website">
    <meta property="og:image:type" content="image/jpg">
    <meta property="og:image:width" content="400">
    <meta property="og:image:height" content="300">
    <meta property="og:image:alt" content="Logo de Python Valencia">
    <link rel="stylesheet" type="text/css" media="all and (min-width: 901px)" href="assets/sass/desktop.sass">
    <link rel="stylesheet" type="text/css" media="all and (max-width: 900px)" href="assets/sass/mobile.sass">
    <script type="module" src="assets/js/main.js"></script>
  </head>
	<body>
    <header id="header" class="header container">
      <!-- Navegador -->
      <div class="header__main">
        <!-- Boton cerrar -->
        <button id="menu-button" class="header__main--button mobile-view" aria-label="Abrir/cerrar menú">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </button>
        <!-- Logo python menu -->
        <nav class="header__main--link">
          <a href="#inicio" class="desktop-view to-start">
            <img src="assets/img/logo-python-valencia.webp" alt="Inicio">
          </a>
          <a href="#contacto" class="mobile-view header__contact to-contact">Contacto</a>
        </nav>
      </div>
      <!-- Menu -->
      <nav id="menu" class="header__nav">
        <a href="#inicio" class="mobile-view header__nav--logo to-start">
          <img src="assets/img/logo-python-valencia.webp" alt="botón inicio" class="logo__home">
        </a>
        <ul class="header__nav--list text--body--m">
          <li>
            <a id="to-event" href="#proximos-eventos" class="text--link--highlight">Eventos</a>
          </li>
          <li>
            <a id="to-about" href="#quienes-somos" class="text--link--highlight">Quiénes somos</a>
          </li>
          <li>
            <a id="to-faqs" href="#preguntas-frecuentes" class="text--link--highlight">Preguntas frecuentes</a>
          </li>
          <li>
            <a href="#contacto" class="header__contact text--medium to-contact">Contacto</a>
          </li>
        </ul>
      </nav>
    </header>
    <main>
      <!-- Hero -->
      <section id="inicio" class="hero home--hero">
        <div class="container home--hero__heading">
          <img
            src="assets/img/logo-python-valencia.webp"
            alt="Comunidad Python Valencia"
            class="home--hero__heading--logo"
          >
          <h1 class="text--title--l">
            Python<br>
            Valencia
          </h1>
          <p class="home--hero__heading--subtitle text--body--l">
            La comunidad de Python Valencia es un grupo de entusiastas que se dedican a compartir sus conocimientos sobre Python
          </p>
        </div>
      </section>
      <!-- Próximos eventos -->
      <?php if ($event['title'] != ''):  ?>
        <?php require_once "_active-event.php" ?>
      <?php else: ?>
        <?php require_once "_inactive-event.php" ?>
      <?php endif; ?>
      <!-- Comunidad -->
      <section class="community container scroll-to">
        <span id="quienes-somos" class="scroll-to__element" aria-hidden="true"></span>
        <article class="grid-layout--with-photo right">
          <figure class="grid-layout--with-photo__photo">
            <img src="assets/img/foto-comunidad.webp" alt="miembros de la comunidad Python Valencia" class="community__photo-members">
          </figure>
          <section class="grid-layout--with-photo__info">
            <h3 class="text--title--s">Quiénes somos</h3>
            <h2 class="text--title--m">La comunidad de Python Valencia</h2>
            <p>Es un grupo de enamorados de la programación, buenas prácticas y arquitecturas que se dedican a compartir sus conocimientos sobre el lenguaje de la pitón que más nos gusta.</p>
          </section>
        </article>
      </section>
      <!--¿Conoces Python?-->
      <section class="python container">
        <div class="python__definition text--align-center">
          <h2 class="text--title--m">¿Conoces Python?</h2>
          <p class="text--title--s">Por si aún no lo conoces, Python es un lenguaje de programación interpretado cuya filosofía hace hincapié en la legibilidad de su código. Se trata de un lenguaje de programación <strong class="text--orange">multiparadigma,
          </strong> ya que soporta orientación a objetos, programación imperativa y, en menor medida, programación funcional. Es un lenguaje dinámico y forzado a tipos débiles.</p>
        </div>
      </section>
      <!-- Colaboradores -->
      <section class="partners">
        <div class="container">
          <h2 class="partners__title text--title--s text--align-center">Conoce nuestros colaboradores</h2>
          <ul class="partners__list">
            <li class="partners__item">
              <a href="https://ccstech.io/" target="_blank" class="partners__link">
                <img class="partners__image partners__image--ccstechio" alt="CCSTech.io" src="assets/img/partners/ccstech.svg"/>
              </a>
            </li>
            <li class="partners__item">
              <a href="https://idecrea.es/" target="_blank" class="partners__link">
                <img class="partners__image partners__image--idecrea" alt="Idecrea" src="assets/img/partners/idecrea.svg"/>
              </a>
            </li>
            <li class="partners__item">
              <a href="https://wayco.es" target="_blank" class="partners__link">
                <img class="partners__image partners__image--wayco" alt="WayCo" src="assets/img/partners/wayco.svg"/>
              </a>
            </li>
          </ul>
        </div>
      </section>
      <!-- Ventajas de pertenecer a la comunidad -->
      <section class="pros">
        <article class="pros__all container grid-layout--with-photo">
          <section class="grid-layout--with-photo__info">
            <h2 class="text--title--m">Ventajas de pertenecer a la comunidad</h2>
            <p>Al estar en contacto directo con otros miembros de la comunidad, se pueden obtener numerosas ventajas.</p>
            <ol class="pros__list">
              <li>
                <p class="text--title--l">1_</p>
                <p>Se puede aprender mucho sobre el lenguaje y cómo aplicarlo a diversos proyectos.</p>
              </li>
              <li>
                <p class="text--title--l">2_</p>
                <p>También te ayudará a conocer las últimas tendencias en el desarrollo de Python.</p>
              </li>
              <li>
                <p class="text--title--l">3_</p>
                <p>Estar al tanto de los últimos lanzamientos de la plataforma.</p>
              </li>
            </ol>
          </section>
          <figure class="pros__photo grid-layout--with-photo__photo">
            <img src="assets/img/ventajas.webp" alt="comunidad Python Valencia" class="pros__img">
          </figure>
        </article>
      </section>
      <!-- Preguntas frecuentes -->
      <section class="faqs container scroll-to">
        <span id="preguntas-frecuentes" class="scroll-to__element" aria-hidden="true"></span>
        <div class="faqs__all grid-layout--with-photo right">
          <h2 class="text--title--m">Preguntas frecuentes</h2>
          <div class="faqs__all--questions">
            <details class="faqs__all--questions__item">
              <summary class="text--body--l">
                ¿Debo pagar una cuota?
                <span class="icon-open"></span>
              </summary>
              <p>No es necesario, con tu asistencia y ganas de colaborar ya estás aportando mucho.</p>
            </details>
            <details class="faqs__all--questions__item">
              <summary class="text--body--l">
                ¿Cómo puedo participar?
                <span class="icon-open"></span>
              </summary>
              <p>Asistiendo a las charlas o proponiendo una ponencia. Estaremos encantados de escucharte, sea de Python u otra tecnología igual de alucinante.</p>
            </details>
            <details class="faqs__all--questions__item">
              <summary class="text--body--l">
                ¿El proyecto tiene algún costo?
                <span class="icon-open"></span>
              </summary>
              <p>No, como el buen software.</p>
            </details>
            <details class="faqs__all--questions__item">
              <summary class="text--body--l">
                ¿Estáis abiertos a nuevos colaboradores?
                <span class="icon-open"></span>
              </summary>
              <p>Cuantas más manos, más grande serán nuestros logros. Te asignaremos un grupo de trabajo que más se ajuste a tus habilidades.</p>
            </details>
            <details class="faqs__all--questions__item">
              <summary class="text--body--l">
                ¿Cómo puedo ponerme en contacto?
                <span class="icon-open"></span>
              </summary>
              <p>En cualquiera de nuestras redes sociales.</p>
            </details>
          </div>
        </div>
      </section>
      <!-- Newsletter -->
      <section class="newsletter container" id="newsletter">
        <a
          href="https://buttondown.email/python-valencia"
          target="_blank"
          class="newsletter__content"
        >
          <h2 class="text--title--m">Newsletter</h2>
          <h3 class="text--title--s">¿Quieres estar al tanto de las novedades y próximos eventos?</h3>
          <p>Suscríbete para recibir una vez al mes toda la información.</p>
          <p class="newsletter__content--button label white">Suscribirme <i class="icon-right-arrow"></i></p>
        </a>
      </section>
      <!-- Contacta -->
      <nav class="contact scroll-to" id="contact">
        <span id="contacto" class="scroll-to__element" aria-hidden="true"></span>
        <div id="contact-title-container" class="contact__title"><h2 id="contact-title" class="text--title--l">Contacta con nosotros.</h2></div>
        <ul class="contact__social-media">
          <li class="contact__social-media--item">
            <a href="https://t.me/python_vlc" target="_blank" class="contact__social-media--item__link">
              <i class="icon-telegram"></i>
              <span class="text--body--l">Telegram</span>
              <i class="icon-right-arrow"></i>
            </a>
          </li>
          <li class="contact__social-media--item">
            <a href="https://twitter.com/python_vlc" target="_blank" class="contact__social-media--item__link">
              <i class="icon-twitter"></i>
              <span class="text--body--l">Twitter</span>
              <i class="icon-right-arrow"></i>
            </a>
          </li>
          <li class="contact__social-media--item">
            <a href="http://vlctechhub.slack.com" target="_blank" class="contact__social-media--item__link">
              <i class="icon-slack"></i>
              <span class="text--body--l">Slack</span>
              <i class="icon-right-arrow"></i>
            </a>
          </li>
        </ul>
        <div class="contact__email">
          <i class="icon-mail"></i>
        </div>
      </nav>
    </main>

    <footer class="footer">
      <section class="container">
        <figure class="footer__logo">
          <img src="assets/img/logo-python-valencia.webp" alt="logo python">
          <figcaption class="text--body--l">
            Python Valencia
          </figcaption>
        </figure>
        <p class="text--body--s">&copy; 2023  Todos los derechos reservados</p>
        <p class="text--body--s">
          Desarrollado por
          <a
            href="https://ccstech.io"
            target="_blank"
            class="text--link--main"
          >CCSTech.io</a>
          - Alojado por
          <a
            href="https://ccsolutions.io"
            target="_blank"
            class="text--link--main"
          >CCSolutions.io</a>
          - Con la ayuda de
          <a
            href="https://idecrea.es"
            target="_blank"
            class="text--link--main"
          >Idecrea</a>
        </p>
      </section>
    </footer>
	</body>
</html>
