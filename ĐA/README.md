# ĐA — Đồ án

The capstone project: an e-commerce site in Laravel, built from a supplied
front-end template.

## Layout

```
courses/          Buoi_01..09
project/          the Laravel 10 shop
  exercises/      buoi-01, buoi-02, buoi-06
```

## The application

`project/` is a storefront with an admin panel behind it. Two controllers carry
the whole app: `PageController` for the public side — product listing, detail,
cart, checkout, login, registration, search — and `Admincontroller` for
management of products, product types, bills, customers, users and slides.

The models map that directly: `Product`, `ProductType`, `Cart`, `Bill`,
`Bill_detail`, `Customer`, `Slide`, `User`.

### Running it

```bash
cd project
composer install
cp .env.example .env && php artisan key:generate
php artisan migrate
php artisan serve
```

`.env.example` points at MySQL with a database named `laravel`. The migrations
only create the framework tables — the shop's own tables come from
[exercises/buoi-01/db_banhang_data.sql](project/exercises/buoi-01/db_banhang_data.sql),
which carries both schema and seed data.

As in the other Laravel app, the `vite` scaffolding is present but unused: no
Blade template references `@vite()`.

## Exercises

| Week | What is kept |
|---|---|
| buoi-01 | The `Template/` front-end source the Blade views were built from, and `db_banhang_data.sql` |
| buoi-02 | `image.rar`, the product image set |
| buoi-06 | The admin theme, kept whole because the app ships only its compiled assets |

The other lesson folders held only slides, or assets already copied into
`project/public/`. `lesson-2/image` in particular was 67 files, every one
identical to a file already in the app, so it was dropped rather than kept twice.

## Known issues

`laravel/framework` is on 10.x, past security support. Four advisories against
it have no fix available in the 10 line; clearing them means Laravel 12.61+ or
13.12+, which is a skeleton migration. Every other composer dependency is
current. See the root README.

The bundled front-end libraries — Revolution Slider, nivo slider, bxslider,
CKEditor — carry known upstream findings. They are vendored third-party code and
are excluded from the scanners rather than patched in place, since editing them
would diverge from upstream and be undone by any re-download.
