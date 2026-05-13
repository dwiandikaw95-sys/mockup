# DAW FRESH - Grocery Website

Mobile-first grocery e-commerce application built with Laravel.

## Features

- User authentication (login/register)
- Product catalog with categories
- Shopping cart management
- Checkout flow
- Order history

## Tech Stack

- Laravel 13
- MySQL
- Blade templates + Vanilla CSS

## Quick Start

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Login credentials:
- Email: `admin@gmail.com`
- Password: `123`

## Repository

This project is hosted at: https://github.com/dwiandikaw95-sys/desain-figma-code-website

## Project Structure

```
app/
├── Http/Controllers/
│   ├── AuthController.php    # Login, register, logout
│   ├── ProductController.php # Product listing & detail
│   ├── CartController.php    # Cart operations
│   └── OrderController.php   # Checkout & orders
resources/views/
├── auth/       # Login & register pages
├── home/       # Product listing (index)
├── product/    # Product detail
├── cart/       # Shopping cart
└── layouts/    # Main layout
public/Image/  # Product images
```

## Testing

```bash
php artisan test
```

All tests: 8 passed (21 assertions)

## Status

✅ Login system (bcrypt-hashed passwords)
✅ All product images displaying correctly
✅ Cart & checkout flow functional
