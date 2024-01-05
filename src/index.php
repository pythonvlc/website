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
            <a id="to-code-of-conduct" href="#codigo-de-conducta" class="text--link--highlight">Código de conducta</a>
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
      <section class="partners container">
        <h2 class="partners__title text--title--s text--align-center">Entidades que también colaboran con Python Vallencia</h2>
        <nav class="partners__list">
          <a href="https://idecrea.es/" target="_blank" class="partners__link">
            <img class="partners__image partners__image--idecrea" alt="Idecrea" src="assets/img/partners/idecrea.svg"/>
          </a>
          <a href="https://wayco.es" target="_blank" class="partners__link">
            <img class="partners__image partners__image--wayco" alt="WayCo" src="assets/img/partners/wayco.svg"/>
          </a>
        </nav>
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
      <!-- Código de conducta -->
      <section id="codigo-de-conducta" class="code-of-conduct">
        <div class="container">
          <h2 class="text--title--m">Código de conducta</h2>
          <p>Python Valencia es un grupo de entusiastas de Python dedicado a la organización de eventos de distintos tipos, que busca asegurar que todas las personas que participen en dichos eventos o comunicaciones tengan una experiencia positiva de aprendizaje, colaboración y ocio.</p>
          <p>La comunidad está formada por miembros con un conjunto diverso de habilidades, personalidades y experiencias. Es a través de estas diferencias que nuestra comunidad experimenta grandes éxitos y un crecimiento continuo.</p>
          <p>Cuando interactúe con miembros de la comunidad, este Código de conducta le ayudará a dirigir sus interacciones y a mantener a Python como una comunidad positiva, exitosa y en crecimiento. Para ello, se espera que quien participe en la comunidad muestre respeto y cortesía hacia el resto.</p>
        </div>
        <div
          id="conduct-content"
          class="container code-of-conduct__more-content"
          style="height: 0; overflow: hidden;"
        >
          <h3>Nuestra comunidad</h3>
          <p>Los miembros de la comunidad Python son <strong class="text--medium">abiertos, considerados y respetuosos</strong> . Los comportamientos que refuerzan estos valores contribuyen a un ambiente positivo e incluyen:</p>
          <ul>
            <li>
              <p><strong class="text--medium">Estar abierto.</strong></p>
              <p>Los miembros de la comunidad están abiertos a la colaboración a fin de hacer crecer nuestra comunidad. Toda ayuda es bienvenida y ninguna idea carece de valor.</p>
            </li>
            <li>
              <p><strong class="text--medium">Centrándose en lo que es mejor para la comunidad.</strong></p>
              <p>Somos respetuosos de los procesos establecidos en la comunidad y trabajamos dentro de ellos.</p>
            </li>
            <li>
              <p><strong class="text--medium">Reconociendo el tiempo y el esfuerzo.</strong></p>
              <p>Respetamos los esfuerzos voluntarios que impregnan la comunidad Python. Somos reflexivos al abordar los esfuerzos de los demás, teniendo en cuenta que muchas veces el trabajo se completó simplemente por el bien de la comunidad.</p>
            </li>
            <li>
              <p><strong class="text--medium">Ser respetuoso de los diferentes puntos de vista y experiencias.</strong></p>
              <p>Somos receptivos a comentarios y críticas constructivas, ya que las experiencias y habilidades de otros miembros contribuyen a todos nuestros esfuerzos.</p>
            </li>
            <li>
              <p><strong class="text--medium">Mostrar empatía hacia otros miembros de la comunidad.</strong></p>
              <p>Estamos atentos en nuestras comunicaciones, ya sea en persona o en línea, y tenemos tacto al abordar puntos de vista diferentes.</p>
            </li>
            <li>
              <p><strong class="text--medium">Ser considerado.</strong></p>
              <p>Los miembros de la comunidad son considerados con sus pares: otros usuarios de Python.</p>
            </li>
            <li>
              <p><strong class="text--medium">Ser respetuoso.</strong></p>
              <p>Respetamos a los demás, sus posiciones, sus habilidades, sus compromisos y sus esfuerzos.</p>
            </li>
            <li>
              <p><strong class="text--medium">Aceptar con gracia las críticas constructivas.</strong></p>
              <p>Cuando no estamos de acuerdo, somos corteses al plantear nuestros problemas.</p>
            </li>
            <li>
              <p><strong class="text--medium">Utilizar un lenguaje acogedor e inclusivo.</strong></p>
              <p>Aceptamos a todos los que deseen participar en nuestras actividades, fomentando un ambiente donde cualquiera puede participar y todos pueden marcar la diferencia.</p>
            </li>
          </ul>
          <h3 class="text--title--s">Alcance</h3>
          <p>Este código de conducta es aplicable a todas las personas que participen en espacios de la comunidad de Python Valencia, ya sean en línea o presenciales. También se aplica a espacios públicos donde una persona esté en representación de la comunidad. Ejemplos de esto último incluyen el uso de la cuenta oficial de correo electrónico, publicaciones a través de las redes sociales oficiales, o presentaciones con personas designadas en eventos en línea o no.</p>
          <h3 class="text--title--s">Nuestros estándares</h3>
          <p>Todo miembro de nuestra comunidad tiene derecho a que se respete su identidad. La comunidad Python Valencia se dedica a brindar una experiencia positiva para todos, independientemente de su edad, identidad y expresión de género, orientación sexual, discapacidad, apariencia física, tamaño corporal, origen étnico, nacionalidad, raza o religión (o falta de ella), educación o Estatus socioeconómico.</p>
          <h3 class="text--title--s">Comportamiento inapropiado</h3>
          <p>Ejemplos de comportamiento inaceptable por parte de los participantes incluyen:</p>
          <ul>
            <li>El uso de lenguaje o imágenes sexualizadas, y aproximaciones o atenciones sexuales de cualquier tipo</li>
            <li>Comentarios despectivos (<em>trolling</em>), insultantes o derogatorios, y ataques personales o políticos</li>
            <li>Bromas racistas, sexistas o excluyentes</li>
            <li>El acoso en público o privado</li>
            <li>Publicar información privada de otras personas, tales como direcciones físicas o de correo electrónico, sin su permiso explícito</li>
            <li>Otras conductas que puedan ser razonablemente consideradas como inapropiadas en un entorno profesional</li>
          </ul>
          <p>Por acoso se entiende comentarios ofensivos relacionados con género, orientación sexual, discapacidad, apariencia física, tamaño corporal, etnia o religión, pornografía en espacios públicos, intimidación deliberada, acecho, persecución, acoso por fotografías o grabaciones, constante interrupción de charlas u otros eventos, contacto físico inapropiado y atención sexual no deseada.</p>
          <p>Se espera que los miembros de la comunidad a los que se les pide que pongan fin a cualquier comportamiento inapropiado cumplan de inmediato.</p>
          <h3 class="text--title--s">Cumplimiento</h3>
          <p>La administración de la comunidad es responsable de aclarar y hacer cumplir este código de conducta; en caso de que se determine un comportamiento inadecuado, tomará las acciones que considere oportunas. Éstas van desde exigir el cese del comportamiento, hasta la expulsión de una persona de un evento o de la comunidad, sin derecho a reembolso/compensación de cualquier aportación. La administración de la comunidad tendrá el derecho y la responsabilidad de eliminar, editar o rechazar mensajes, comentarios, <em>commits</em>, código, ediciones de páginas de wiki, tickets y otras contribuciones que no se alineen con este código de conducta, y comunicará las razones para sus decisiones de moderación cuando sea apropiado.</p>
          <h3 class="text--title--s">Información del contacto</h3>
          <p>Si cree que alguien está violando el código de conducta o tiene alguna otra inquietud, comuníquese de inmediato enviando un correo electrónico a <a
            href="mailto:valencia@es.python.org"
            class="text--link--main"
          >valencia@es.python.org</a> o acuda a cualquier miembro organizador durante el transcurso de nuestros eventos.</p>
          <p>Todas las personas organizadoras de la comunidad están obligadas a respetar la privacidad y la seguridad de quienes denuncien incidentes.</p>
          <h3><strong class="text--title--s">Atribuciones</strong></h3>
          <p>Este código de conducta extiende del código de conducta de la <a
            href="https://www.python.org/psf/conduct/"
            target="_blank"
            class="text--link--main"
          >Python Software Foundation</a> y del de la asociación de <a
            href="https://github.com/python-spain/documentacion/blob/master/codigo-conducta.rst"
            target="_blank"
            class="text--link--main"
          >Python España</a>.</p>
        </div>
        <div class="container">
          <button
            id="conduct-read-more"
            type="button"
            class="text--body--m text--medium code-of-conduct__more-button text--link--highlight"
          >Leer más</button>
        </div>
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
            href="https://python-valencia.es"
            target="_blank"
            class="text--link--main"
          >Python Valencia</a>
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
