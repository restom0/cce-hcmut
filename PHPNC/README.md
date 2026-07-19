# PHPNC — PHP nâng cao

Advanced PHP: sessions and cookies, file handling, MySQL, and building an MVC
framework by hand rather than using one.

## Layout

```
courses/          Buoi_01.pptx, Buoi_02..09, Buoi_11   (10 lectures)
  BaiTap/         Buoi_01..08.pdf                      (8 practice sheets)
project/          ql_ban_sua — the MVC milk shop
  ban_hoa/        ql_ban_hoa — a second shop on the same skeleton
  exercises/      buoi-01..08, the weekly drills
```

Session 10 has no slides of its own: it is the week the milk shop grew from a
single controller into the app now in `project/`.

## The applications

Both are the same hand-rolled MVC: `index.php` is the only entry point, and it
dispatches on `?ctrl=` to a class in `Controllers/`, which loads a model from
`Models/` and renders a view through `layout.php`. `System/Model_system.php` is
the thin mysqli wrapper the models share.

| | `project/` | `project/ban_hoa/` |
|---|---|---|
| Database | `ql_ban_sua` | `ql_ban_hoa` |
| Schema | [ql_ban_sua.sql](project/ql_ban_sua.sql) | [ban_hoa/ql_ban_hoa.sql](project/ban_hoa/ql_ban_hoa.sql) |
| Controllers | hangsua, sanpham, trangchu | sanpham, loaihoa, khachhang, donhang |

### Running them

Create the database and import the schema, then point a PHP-capable server at
the app root:

```bash
mysql -u root -e "SOURCE project/ql_ban_sua.sql"
php -S localhost:8000 -t project
```

Credentials live in `System/Config.php` and default to `root` with no password,
matching a stock XAMPP install. `ROOT_URL` is derived from the front controller
at runtime, so the app works wherever it is served from without editing config.

## Exercises

| Week | Topic |
|---|---|
| buoi-01 | Functions, includes, first demos |
| buoi-02 | Reusable libraries (`thuvien.php`) |
| buoi-03 | Sessions and cookies — cart, login, ordering |
| buoi-05 | MySQL CRUD, the `ql_ban_sua` schema |
| buoi-06 | Reading and writing files |
| buoi-07 | File upload and image handling |
| buoi-08 | Queries against `ql_mon_an` |

Session 4 left only slides, and 9–11 are the MVC work that became `project/`.

## Known issues

`Controllers/trangchu.php` exists but `index.php` only dispatches `hangsua` and
`sanpham`, so the home controller is unreachable. Adding a branch for it would
be a behaviour change rather than a fix, so it was left alone.

The models build SQL by interpolating request values directly. That is what the
course taught, but none of it is safe against injection and none of it should be
copied into anything real.
