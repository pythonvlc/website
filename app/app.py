from datetime import date

from flask import Flask, render_template

from imagor_urls import image_url
from meetup import get_next_event

app = Flask(__name__)
app.jinja_env.globals["img"] = image_url


@app.get("/")
def home():
    return render_template(
        "index.html",
        year=date.today().year,
        event=get_next_event(),
    )


@app.get("/robots.txt")
def robots():
    return app.send_static_file("robots.txt")
