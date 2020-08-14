# Contacts

A simple PHP contacts agenda

## Building with docker

Build the application with `docker-compose`
```console
$ docker-compose up -d
```
And then two containers will be launched. One for mysql and other for the web server.

To check the contacts app access `http://localhost:8000` on your browser.

To finalize the containers use
```console
$ docker-compose down
```
To reset your database, use `-v` option with `docker-compose down`.

## Development

To change database options and connection parameters, see `www/config.php`, and change environment variables in `docker-compose.yaml` accordingly