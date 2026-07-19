# PHPCB — PHP căn bản

Introductory PHP: syntax, forms, control flow, and a first database-backed site.

This subject shipped no lecture PDFs, so there is no `courses/` directory.

## Layout

```
project/          the exam site, built on the pluto-1.0.0 admin theme
  exercises/      buoi-01..04, buoi-06
```

## The application

`project/` is the final exam deliverable: a small admin site assembled from
`index.php`, `template.php`, `header.php` and `menuleft.php`, styled with the
bundled [pluto-1.0.0](project/pluto-1.0.0) theme.

Database access goes through `pdo_get_connection()` in
[connect.php](project/connect.php), which opens a PDO connection to **`banhkem`**
on localhost as `root` with no password.

```bash
php -S localhost:8000 -t project
```

Create the `banhkem` database first; the exam did not ship a schema dump, so the
tables have to be created by hand from what the queries reference.

## Exercises

| Week | Topic |
|---|---|
| buoi-01 | Requirements notes only (`bt.txt`) |
| buoi-02 | First script (`lab1.php`) |
| buoi-03 | Forms and a calculator with `switch` |
| buoi-04 | Includes and page composition |
| buoi-06 | Cake-shop admin: user and category CRUD against `banhkem` |

Session 5 was the pluto theme itself. Rather than keep a second identical copy,
it lives once at [project/pluto-1.0.0](project/pluto-1.0.0) — all 387 files were
byte-identical to the copy inside the exam site.

## Known issues

`project/pluto-1.0.0` and `project/exercises/buoi-06/pluto-1.0.0` are two copies
of the same theme, kept because each one is wired into its own page set. They
are excluded from linting and from both scanners; the duplication is why some
findings used to appear twice.

The theme's own JavaScript — bootstrap, bootstrap-select, Chart.bundle,
owl.carousel — carries known upstream findings. It is vendored third-party code,
so it is excluded from analysis rather than patched in place.
