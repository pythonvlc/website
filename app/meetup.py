"""Next upcoming event from the Meetup public ICS feed.

No authentication is needed: https://www.meetup.com/<group>/events/ical/
returns a calendar with one VEVENT per announced event, empty when the
group has nothing scheduled.
"""

import re
import os
import time
from datetime import datetime, timezone
from zoneinfo import ZoneInfo

import requests

DEFAULT_ICS_URL = "https://www.meetup.com/python-valencia-meetup/events/ical/"
ICS_URL = os.environ.get("MEETUP_ICS_URL") or DEFAULT_ICS_URL
CACHE_TTL = int(os.environ.get("MEETUP_CACHE_TTL", "600"))
REQUEST_HEADERS = {"User-Agent": "Mozilla/5.0 (compatible; PythonValenciaWeb/1.0)"}
LOCAL_TZ = ZoneInfo("Europe/Madrid")
MONTHS_ES = [
    "enero",
    "febrero",
    "marzo",
    "abril",
    "mayo",
    "junio",
    "julio",
    "agosto",
    "septiembre",
    "octubre",
    "noviembre",
    "diciembre",
]

_cache = {"expires": 0.0, "event": None}


def _unfold(text: str) -> str:
    """Join ICS folded lines (continuation lines start with a space)."""
    return text.replace("\r\n", "\n").replace("\n ", "").replace("\n\t", "")


def _prop(block: str, name: str) -> str:
    match = re.search(rf"^{name}(?:;[^:]*)?:(.*)$", block, re.M)
    if not match:
        return ""
    value = match.group(1).strip()
    return value.replace("\\n", " ").replace("\\,", ",").replace("\\;", ";")


def _parse_dtstart(block: str) -> datetime | None:
    match = re.search(r"^DTSTART(?:;[^:]*)?:(\d{8}T\d{6})(Z?)$", block, re.M)
    if not match:
        return None
    naive = datetime.strptime(match.group(1), "%Y%m%dT%H%M%S")
    if match.group(2) == "Z":
        return naive.replace(tzinfo=timezone.utc).astimezone(LOCAL_TZ)
    return naive.replace(tzinfo=LOCAL_TZ)


def _event_kind(title: str) -> str:
    return "Taller" if "taller" in title.lower() else "Charla"


def parse_ics(text: str, now: datetime | None = None) -> dict | None:
    """Return the earliest upcoming event of an ICS text, or None."""
    now = now or datetime.now(LOCAL_TZ)
    upcoming = []
    for block in re.findall(r"BEGIN:VEVENT(.*?)END:VEVENT", _unfold(text), re.S):
        start = _parse_dtstart(block)
        title = _prop(block, "SUMMARY")
        if not start or not title or start < now:
            continue
        upcoming.append((start, block, title))

    if not upcoming:
        return None

    start, block, title = min(upcoming, key=lambda item: item[0])
    return {
        "title": title,
        "url": _prop(block, "URL"),
        "location": _prop(block, "LOCATION"),
        "date": f"{start.day} de {MONTHS_ES[start.month - 1]}",
        "time": f"{start:%H:%M}h",
        "kind": _event_kind(title),
        "image": None,
    }


def _fetch_og_image(url: str) -> str | None:
    """Best effort: the event page cover from its og:image meta tag."""
    try:
        response = requests.get(url, headers=REQUEST_HEADERS, timeout=6)
        response.raise_for_status()
        match = re.search(r'property="og:image"\s+content="([^"]+)"', response.text)
        return match.group(1) if match else None
    except requests.RequestException:
        return None


def get_next_event() -> dict | None:
    """Next event, cached so Meetup is not hit on every request."""
    if time.time() < _cache["expires"]:
        return _cache["event"]

    event = None
    try:
        response = requests.get(ICS_URL, headers=REQUEST_HEADERS, timeout=6)
        response.raise_for_status()
        event = parse_ics(response.text)
        if event and event["url"]:
            event["image"] = _fetch_og_image(event["url"])
    except requests.RequestException:
        event = None

    _cache["event"] = event
    _cache["expires"] = time.time() + CACHE_TTL
    return event
