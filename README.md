# shipping-check

A Laravel shipping-selection interface with province, city, and courier data.

[Repository](https://github.com/MirzaAlbab/shipping-check)

## Features

- Province and courier lookup for the shipping view
- Cities filtered by province
- City search responses for selection widgets

## Technology

`php` ^8.2 · `laravel/framework` ^12.0 · `laravel/tinker` ^2.10.1

## Getting started

Install PHP compatible with `composer.json`, Composer, Node.js, and a database supported by the application.

```bash
git clone https://github.com/MirzaAlbab/shipping-check.git
cd shipping-check
```

```bash
composer install
cp .env.example .env
php artisan key:generate
```

Set `APP_URL` and the `DB_*` values in `.env` for your local database. Configure any mail, payment, or other external service used by this project.

```bash
php artisan migrate
npm install
npm run build
php artisan serve
```

Open the URL printed by Artisan. For ongoing frontend development, run `npm run dev` in another terminal.

## Development and checks

```bash
php artisan test
```

Review `tests/` for the current test scope. A configured test runner does not imply coverage of every business workflow.

## Project structure

- `app/` — Application source
- `config/` — Application configuration
- `database/` — Migrations, factories, and seeders
- `public/` — Public web assets and entry points
- `resources/` — Frontend templates and assets
- `routes/` — HTTP route definitions
- `tests/` — Test suite and support files

## Project notes

Populate the local database with the province, city, and courier records required by the interface. The reviewed ShippingController implements location lookup; it does not establish a complete live shipping-rate integration. Uses Laravel 12.

## Framework

Built with [Laravel](https://laravel.com/docs). Framework packages and third-party dependencies retain their own licenses.

## License

Original project code is available under the [MIT License](LICENSE). Third-party libraries, templates, datasets, and assets retain their own terms and attribution.
