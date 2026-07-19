# Bootstrap — Bootstrap & WordPress

Bootstrap layout and components, a WordPress build-out, and a first pass at
Angular.

## Layout

```
courses/          Buoi_01, 02, 03, 05, 07
  BaiTap/         Slide_1..3.pptx   (WEB207 decks)
                  Phan_1..8.pdf     (parts of one WordPress assignment)
project/          Angular component source
  exercises/      buoi-01..04, buoi-08, baitap-1, baitap-2
```

`Phan_1..8` keep their original naming rather than being renumbered as sessions:
they are eight parts of a single assignment, not eight weeks.

## The application

`project/` holds the Angular source from session 8 — components for `baitap`
(baisao, thome), `cuonhinh`, `giays`, `phuongtien`, `thucdon`, `thucung` and
`trangchu`, plus an `api.service`.

**It is source only.** There is no `package.json` and no `angular.json`, so it
cannot be installed or built as it stands. Using it means generating a fresh
Angular workspace and copying these files into `src/app/`. This is the one
course directory whose `project/` is not a runnable application, which is why
CI packages it as an archive rather than building it.

## Exercises

| Folder | Topic |
|---|---|
| buoi-01 | First Bootstrap page, with the brief in `YeuCau.txt` |
| buoi-02 | Layout practice, plus a `ql_xem_truyen` schema |
| buoi-03 | Cards, carousels, image galleries in PHP |
| buoi-04 | CRUD screens — list, insert, update, delete |
| buoi-08 | The Angular write-up (`ANGUALR.docx`) |
| baitap-1 | The WEB207 exercise page |
| baitap-2 | The WordPress assignment |

`baitap-2/homework` is the WordPress tree: downloaded themes and plugins, the
Polylang plugin extracted, and a `MyWeb` site. It is third-party code, so it is
excluded from `php -l`, SonarCloud and CodeQL — 226 of the 235 PHP files under
`project/` are Polylang, and linting them buries the nine files that are
actually coursework.

## Known issues

Polylang's bundled JavaScript carries known upstream findings. It is vendored
third-party code and is excluded from analysis rather than patched, since edits
would diverge from upstream.

`baitap-2/homework` also holds a stack of `.zip` theme and plugin archives.
They are the assignment as delivered and are kept, but they are why this
directory is larger than its source suggests.
