## How to run

1. Clone this repository
2. Install dependencies by running `composer install` (make sure you have installed composer)
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
6. Create 3 new directories named `carousel-images`, `product-images`, and `user-images` inside of `/public` directory
7. Create symbolic links for storage with `php artisan storage:link`
8. Run the application by running `php artisan serve` 
9. You can login as admin by using `admin@admin` as the email and password that you have set in `.env` file

