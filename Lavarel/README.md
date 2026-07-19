# Lavarel — Laravel

Laravel from routing and Blade through Eloquent, migrations, authentication and
a full admin panel. (The directory name keeps the original spelling.)

## Layout

```
courses/          Buoi_01..13, with 12 split as Buoi_12a / Buoi_12b
  BaiTap/         Buoi_02.pdf
project/          the Laravel 10 application
  exercises/      buoi-02, 03, 04, 06, 08
```

Session 12 was delivered in two parts, hence `12a`/`12b`. The file filed under
session 13 is labelled `B12_new` by the lecturer; it is numbered here by the
folder it came from.

## The application

`project/` is a news site with a public front end and an admin panel, built up
week by week across the whole course. Blade views live under
`resources/views/`, grouped by the session that introduced them (`Buoi02/` …
`Buoi09/`, plus `admin/`).

The Eloquent models cover two overlapping subjects: the news site proper
(`TinTuc`, `Theloai`, `Loaitin`, `Slide`, `Comment`, `User`) and the course-
management exercises that ran alongside it (`Monhoc`, `Lophoc`, `Sinhvien`,
`Khoa`, `Ketqua`).

### Running it

```bash
cd project
composer install
cp .env.example .env && php artisan key:generate
php artisan migrate
php artisan serve
```

`.env.example` points at MySQL and a database named `laravel`. The migrations
only cover the framework tables plus `monhoc`; the news-site tables come from
the dumps in `exercises/` or have to be created by hand.

The `vite` setup is stock Laravel scaffolding and is not actually used — no
Blade template references `@vite()`. It still builds if you want it.

## Exercises

| Week | What is kept |
|---|---|
| buoi-02 | `routes/web.php` as it stood that week |
| buoi-03 | ditto |
| buoi-04 | ditto, plus an earlier 93-line `Buoi04Controller` |
| buoi-06 | ditto, plus the `ql_sinhvien` schema |
| buoi-08 | ditto, plus `laravel_demo` schema and the `GiaoDien_Front` template |

Only these five weeks left anything the application does not already contain.
Every other lesson folder held files byte-identical to what is in `project/`,
so they were folded in rather than duplicated.

## Known issues

Several things in this app were never finished, and are left as they were
rather than invented:

- The seven `Buoi09` views extend `front.layout.master` and include
  `front.layout.slide`. Neither exists — there is no `front/` directory — so
  those pages error when rendered.
- Nine route names are called from Blade but defined nowhere: `danhsach_tl`,
  `register`, `sua_ds_tt`, `them_ds_tt`, `xlnguoidung`, `xoa_tt`, `xoatl`,
  `xulythemlt`, `xulyxoalt`.
- `Buoi05Controller` and `AjaxController` were never written; their routes are
  commented out in `routes/web.php` with a note.
- `laravel/framework` is on 10.x, which is past security support. Four
  advisories against it have no fix in the 10 line — see the root README.
