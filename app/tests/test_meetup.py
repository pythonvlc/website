from datetime import datetime
from zoneinfo import ZoneInfo

from meetup import parse_ics

TZ = ZoneInfo("Europe/Madrid")
NOW = datetime(2026, 7, 1, 12, 0, tzinfo=TZ)

EMPTY_ICS = """BEGIN:VCALENDAR
VERSION:2.0
NAME:Python Valencia
END:VCALENDAR
"""

ICS_WITH_EVENTS = """BEGIN:VCALENDAR
VERSION:2.0
BEGIN:VEVENT
DTSTAMP:20260601T000000Z
DTSTART;TZID=Europe/Madrid:20260510T183000
SUMMARY:Evento pasado
URL:https://www.meetup.com/python-valencia-meetup/events/1/
END:VEVENT
BEGIN:VEVENT
DTSTAMP:20260601T000000Z
DTSTART;TZID=Europe/Madrid:20261130T183000
SUMMARY:Principios básicos para hacer un buen diseño de visualización
  de datos
LOCATION:WayCO Cabanyal - Carrer de Marià Cuber\\, 17\\, València
URL:https://www.meetup.com/python-valencia-meetup/events/3/
END:VEVENT
BEGIN:VEVENT
DTSTAMP:20260601T000000Z
DTSTART:20260915T163000Z
SUMMARY:Taller de testing con pytest
URL:https://www.meetup.com/python-valencia-meetup/events/2/
END:VEVENT
END:VCALENDAR
"""


def test_calendar_without_events_returns_none():
    assert parse_ics(EMPTY_ICS, now=NOW) is None


def test_returns_earliest_upcoming_event_ignoring_past_ones():
    event = parse_ics(ICS_WITH_EVENTS, now=NOW)

    assert event["title"] == "Taller de testing con pytest"
    assert event["url"].endswith("/events/2/")


def test_utc_dtstart_is_shown_in_local_time():
    event = parse_ics(ICS_WITH_EVENTS, now=NOW)

    assert event["date"] == "15 de septiembre"
    assert event["time"] == "18:30h"


def test_kind_is_detected_from_the_title():
    event = parse_ics(ICS_WITH_EVENTS, now=NOW)

    assert event["kind"] == "Taller"


def test_folded_lines_and_escaped_commas_are_unescaped():
    only_talk = ICS_WITH_EVENTS.replace(
        "DTSTART:20260915T163000Z", "DTSTART:20270915T163000Z"
    )

    event = parse_ics(only_talk, now=NOW)

    assert event["title"].endswith("visualización de datos")
    assert event["location"] == "WayCO Cabanyal - Carrer de Marià Cuber, 17, València"
    assert event["kind"] == "Charla"
