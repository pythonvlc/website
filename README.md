# Python Valencia website

This page is a static site that is generated with PHP for the template system and Parcel for the static ones.

## Install

1. Install the necessary node dependencies. It is used to compile SASS.

```sh
npm i
```

2. Add install `xmlstarlet`. It is used to get dynamic data from the MeetUp and build the page.

```sh
sudo apt install xmlstarlet
```

3. Sets the `MEETUP_COOKIES` environment variable with the cookies for a MeetUp session. It is used to access the RSS feed.

```sh
export MEETUP_COOKIES="MEETUP_BROWSER_ID=id=20d2693f-6..."
```

## Development

To start the local server run:

```
npm run start
```

To observe the changes run:

```
npm run watch
```

## Production

1. Create an image for the cover (Optional): `src/assets/talks/cover.webp`.

2. Create `index.html` with the latest MeetUp event information and generates the final `index.html` with compiled SASS and other optimisations.

```sh
bash build.sh
```
