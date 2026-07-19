# JS — JavaScript, jQuery, Angular

Client-side scripting from plain JavaScript through jQuery to Angular.

## Layout

```
courses/          Buoi_01..07
  BaiTap/         Buoi_01, Buoi_06                (practice sheets)
project/
  projectAngular/ Angular 22, NgModule-based
  myproject1/     Angular 22 with SSR, standalone
  exercises/      buoi-01..06
```

The course ran two parallel folder series, `BT1..BT8` and `lesson-1..6`, covering
the same weeks from two angles. They shared no filenames, so each week is now a
single `exercises/buoi-NN/`.

## The applications

Two separate Angular apps, not two versions of one — they share nothing beyond
Angular's own scaffolding, so they sit side by side rather than nested.

| | `projectAngular` | `myproject1` |
|---|---|---|
| Angular | 22 | 22 |
| Structure | NgModule, `@angular/material` | standalone, no Material |
| Components | baiviet, login, rubik | baisao, bt6–bt9, register, shophoa, tho, truyencuoi |
| SSR | no | yes (`@angular/ssr`, express) |
| Build output | `dist/project-angular/browser` | `dist/myproject1/browser` |

### Running them

Angular 22 requires **Node 22.22.3+, 24.15+ or 26+**; anything older is rejected
outright.

```bash
cd project/projectAngular   # or project/myproject1
npm ci
npm start                   # dev server
npm run build               # production bundle
```

Both are deployed to Vercel by
[deploy-vercel.yml](../.github/workflows/deploy-vercel.yml). `myproject1` has SSR
configured but ships as a static site, so what gets published is its browser
bundle.

## Exercises

| Week | Topic |
|---|---|
| buoi-01 | First scripts, output, variables |
| buoi-02 | Conditionals, a calculator, currency conversion |
| buoi-03 | Loops and arrays |
| buoi-04 | Functions, countdown timer, popups |
| buoi-05 | Dates, text handling, tables |
| buoi-06 | jQuery — effects, calendars, an admin UI |

These are `.php` files because the course served them through XAMPP, but the
content is JavaScript. Any PHP-capable server will do:
`php -S localhost:8000 -t project/exercises`.

## Known issues

`myproject1`'s `AppComponent` sets `templateUrl` to
`Baitap/register/register.component.html` rather than its own template, so the
root component renders the registration form and no `<router-outlet>` is ever
placed. The routes in `app.routes.ts` therefore never take effect. That is how
the project was written; it was left alone rather than silently rewired.

Both projects carry one low-severity `esbuild` advisory, reached through the
`vite` that `@angular/build` pins. It cannot be resolved locally — it needs an
Angular release — and affects only the dev server on Windows.
