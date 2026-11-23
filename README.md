# GameHub POS

GameHub POS is a simple point-of-sale system for a game store. It was made as a student project using Laravel and MySQL.

## What the system can do

- Staff login and logout
- Manage products
- Search and filter products by name, price, and stock
- Record sales
- Manage customers
- Manage staff accounts
- Upload product images and staff avatars
- View sales history and dashboard information

## Technologies used

- Laravel 12
- PHP
- MySQL
- Blade templates
- HTML and CSS

## How to run the project

1. Put the project inside the XAMPP `htdocs` folder.
2. Start Apache and MySQL using XAMPP.
3. Create a MySQL database named `finals_pos`.
4. Import `finals_pos.sql` into the database.
5. Check the database details in the `.env` file.
6. Open the project folder in a terminal and run:

```cmd/terminal
composer install
php artisan serve
```

7. Open the local URL shown in the terminal.
8. Log in using a staff account from the database.

## Upload folders

- Product images are saved in `storage/app/public/products`.
- Staff avatars are saved in `public/images/avatars`.

## Notes

This project uses the existing database structure. The database should be imported before using the system. It is mainly intended for local use and school demonstration.
