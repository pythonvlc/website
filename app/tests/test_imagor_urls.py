import base64
import hashlib
import hmac

import imagor_urls


def _expected_signature(secret, path):
    digest = hmac.new(secret.encode(), path.encode(), hashlib.sha256).digest()
    return base64.urlsafe_b64encode(digest).decode()


def test_url_is_signed_with_the_secret(monkeypatch):
    monkeypatch.setenv("IMAGOR_SECRET", "top-secret")

    url = imagor_urls.image_url("hero.jpg", size="fit-in/1920x0")

    path = "fit-in/1920x0/filters:format(webp):quality(80)/hero.jpg"
    assert url == f"/img/{_expected_signature('top-secret', path)}/{path}"


def test_grayscale_and_smart_are_added_to_the_path(monkeypatch):
    monkeypatch.setenv("IMAGOR_SECRET", "top-secret")

    url = imagor_urls.image_url(
        "evento-fallback.jpg", size="820x730", smart=True, grayscale=True
    )

    assert "/820x730/smart/filters:format(webp):quality(80):grayscale()/" in url


def test_external_sources_lose_the_scheme(monkeypatch):
    monkeypatch.setenv("IMAGOR_SECRET", "top-secret")

    url = imagor_urls.image_url(
        "https://secure.meetupstatic.com/photos/event/1.jpeg",
        size="820x730",
        external=True,
    )

    assert "https://" not in url
    assert url.endswith("/secure.meetupstatic.com/photos/event/1.jpeg")
