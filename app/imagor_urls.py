"""Signed imagor URL builder.

Only this application knows IMAGOR_SECRET, so every image URL served to
the browser is signed here and verified by the imagor container.
"""

import base64
import hashlib
import hmac
import os
from urllib.parse import quote

BASE_PATH = "/img"


def _secret() -> str:
    return os.environ.get("IMAGOR_SECRET", "")


def sign(path: str) -> str:
    digest = hmac.new(_secret().encode(), path.encode(), hashlib.sha256).digest()
    return base64.urlsafe_b64encode(digest).decode()


def image_url(
    source: str,
    size: str = "",
    smart: bool = False,
    quality: int = 80,
    fmt: str = "webp",
    grayscale: bool = False,
    external: bool = False,
) -> str:
    """Build a signed imagor URL.

    source: file name relative to the image dir, or a full URL when
    external is True.
    size: thumbor-style geometry, e.g. "800x600" (fill) or
    "fit-in/1920x0" (fit inside).
    """
    filters = [f"format({fmt})", f"quality({quality})"]
    if grayscale:
        filters.append("grayscale()")

    if external:
        source = source.removeprefix("https://").removeprefix("http://")

    parts = []
    if size:
        parts.append(size)
    if smart:
        parts.append("smart")
    parts.append("filters:" + ":".join(filters))
    parts.append(quote(source, safe="/"))

    path = "/".join(parts)
    return f"{BASE_PATH}/{sign(path)}/{path}"
