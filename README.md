# mijikasa

This is a simple URL shortener. More features will be added soon!

**Mijikasa** (短さ, *shortness*) is a Japanese word
created from the adjective **mijikai** (短い, *short*)

## Features

- reCAPTCHA protection
- easy deployment on Heroku

## Installation

Mijikasa requires PHP 8 or greater.
You'll also need Composer and a database (I used PostgreSQL).

1. Install dependencies

`composer install`

2. Either create a `.env.local` file from `.env` template:

`cp .env .env.local`

or provide the environment variables manually.

**PLEASE** make sure that the `APP_ENV` variable
is set to either `dev` or `prod`!
Deploying on the `dev` environment poses a major security risk!

3. Now you can run the built-in PHP web server

`php -S localhost:8000 -t public`

or use a specialized one, such as nginx or Apache.
Make sure that you point it at the `public/` catalog!

## Tests

Running the test suite:

`php bin/phpunit`

reCAPTCHA is disabled in the `test` environment.

## License

Mijikasa is licensed under the `AGPL-3.0` license.