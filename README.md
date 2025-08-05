# Translation Management API

## Setup Instructions

1. Clone the repository
2. Run `composer install`
3. Copy `.env.example` to `.env` and configure DB
4. Run `php artisan key:generate`
5. Run `php artisan migrate --seed`
6. Run `php artisan serve`

## Features

- Token-based Authentication (Sanctum)
- Translations CRUD
- Locale and tag-based filtering
- JSON export for frontend apps
- Docker setup for local dev
- Swagger API documentation
