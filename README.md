# Python Valencia Page

🇪🇸 Web del grupo local de Python Valencia. Es una aplicación Flask con dos partes dinámicas: el año del pie de página y la caja de "Próximo evento", que se alimenta del calendario ICS público de Meetup y solo aparece cuando hay un evento anunciado. Todas las fotos se sirven a través de [imagor](https://github.com/cshum/imagor) con URLs firmadas, así no hace falta optimizarlas a mano.

🇬🇧 Website of the Python Valencia local group. It is a Flask application with two dynamic parts: the footer year and the "Next event" box, fed from the public Meetup ICS calendar and only shown when an event is announced. Every photo is served through [imagor](https://github.com/cshum/imagor) with signed URLs, so there is no need to optimise them by hand.

## Run

1. Copy the environment file and adjust it (`PORT` is the only public port; set a long random `IMAGOR_SECRET`).

```sh
cp .env.example .env
```

2. Start everything with Docker Compose.

```sh
docker compose up --build
```

The site is served at `http://localhost:${PORT}`.

## Architecture

- `nginx`: single entry point. Routes `/img/` to imagor and everything else to Flask.
- `web`: Flask + gunicorn. Renders the page, reads the Meetup ICS feed (cached), and signs imagor URLs with `IMAGOR_SECRET` (HMAC-SHA256). The compiled CSS is built from SASS in the Docker image (dart-sass stage).
- `imagor`: processes and caches the images. Sources: the local `app/static/img` folder (read-only mount) and `secure.meetupstatic.com` for event covers.

## Tests

```sh
docker compose run --rm --entrypoint sh web -c "pip install pytest -q && pytest tests -q"
```

## Collaboration Guide

- Before adding new HTML or SASS, propose a graphic design that can be reviewed in a Merge Request. Don't forget to design both mobile and desktop.

- If you are going to do a SASS fix, check the existing classes in case you can reuse some of them. The whole project is modularised.
