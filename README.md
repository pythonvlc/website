# Python Valencia Page

🇪🇸 Esta página es un sitio estático para el grupo local de Python Valencia. El HTML se genera usando el motor de plantillas de PHP, mientras que el compilado de SASS junto a las optimizaciones las gestiona Parcel.

La web esta alojada en GitHub Pages, en este mismo repositorio.

Revisa la guia de colaboración antes de hacer Merge Request.

🇬🇧 This page is a static site for the local Python Valencia. The HTML is generated using the PHP template engine, while the SASS compilation and optimisations are handled by Parcel.

The website is hosted on GitHub Pages, in this repository.

Check the collaboration guide before making Merge Request.

## Install

1. Install `npm`.

Example in Debian/Ubuntu.

```sh
sudo apt install npm
```

2. Install the necessary node dependencies. It is used to compile SASS.

```sh
npm i
```

3. Install `xmlstarlet`. It is used to get dynamic data from the MeetUp and build the page.

Example in Debian/Ubuntu.

```sh
sudo apt install xmlstarlet
```

## Build

1. Sets the `MEETUP_COOKIES` environment variable with the cookies for a MeetUp session. It is used to access the RSS feed.

```sh
export MEETUP_COOKIES="MEETUP_BROWSER_ID=id=20d2693f-6..."
```

2. Create an image for the cover (Optional): `src/assets/talks/cover.webp`.

3. Generate `index.html`.

```sh
bash build.sh
```

The files needed to deploy will have been generated in `docs` folder.

## Collaboration Guide

- Before adding new HTML or SASS, propose a graphic design that can be reviewed in a Merge Request. Don't forget to design both mobile and desktop.

- If you are going to do a SASS fix, check the existing classes in case you can reuse some of them. The whole project is modularised.
