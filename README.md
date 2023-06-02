## How to run

1. Clone this repository
2. Install dependencies by running `composer install` and `npm install` (make sure you have installed composer and nodejs)
3. Copy `.env.example` to `.env` and fill these variable with your own value
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=root
DB_PASSWORD=

ADMIN_PASSWORD=
```
4. Generate application key by running `php artisan key:generate`
5. Run migration by running `php artisan migrate`
6. Run the application by running `npm run dev` and `php artisan serve` 
7. You can login as admin by using `admin@admin` as the email and password that you have set in `.env` file (or `password123` if you didn't set it)

