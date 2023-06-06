<?php
$pathCover = 'src/assets/img/talks/cover.webp';
?>
<section class="events container scroll-to">
  <span id="proximos-eventos" class="scroll-to__element" aria-hidden="true"></span>
  <a
    href="<?= $event['link'] ?>"
    target="_blank"
    class="events__all grid-layout--with-photo"
  >
    <section class="events__all--info grid-layout--with-photo__info">
      <h2 class="events__all--info__title text--title--m">Próximo evento</h2>
      <h3 class="events__all--info__subtitle text--title--s"><?= $event['title'] ?></h3>
      <p class="events__all--info__description"><?= $event['description'] ?></p>
      <time datetime="<?= str_replace(" ", "T", $event['datetime']) ?>" class="events__all--info__date label white"><?= $event['date_format'] ?></time>
      <time aria-hidden="true" datetime="<?= $event['hour_format'] ?>" class="events__all--info__time label white"><?= $event['hour_format'] ?>h</time>
      <p class="events__all--info__location label white">WayCo Ruzafa - Carrer de l'Almirall Cadarso, 26, 46005 València, Valencia</p>
    </section>
    <figure class="events__all--photo grid-layout--with-photo__photo">
      <img src="<?= $event['url_image'] ?>" alt="Conferenciante" class="events__img">
      <figcaption class="label black">Charla</figcaption>
    </figure>
  </a>
</section>
