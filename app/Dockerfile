FROM node:22-alpine AS assets
WORKDIR /build
RUN npm install -g sass
COPY sass ./sass
RUN sass --style=compressed --no-source-map \
    sass/mobile.sass:out/mobile.css \
    sass/desktop.sass:out/desktop.css

FROM python:3.13-slim
WORKDIR /app
ENV PYTHONUNBUFFERED=1
COPY requirements.txt ./
RUN pip install --no-cache-dir -r requirements.txt
COPY app.py meetup.py imagor_urls.py ./
COPY templates ./templates
COPY static ./static
COPY tests ./tests
COPY --from=assets /build/out ./static/css
EXPOSE 8000
CMD ["gunicorn", "--bind", "0.0.0.0:8000", "--workers", "2", "app:app"]
