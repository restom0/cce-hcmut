# HTML+CSS

Static web pages: structure, styling, layout and forms. No frameworks, no build
step.

This subject shipped no lecture PDFs, so there is no `courses/` directory.

## Layout

```
project/                              the exam site
  index.html, style.css, js/
  img_kimcuong/                       product imagery
  full-width-slider.slider.standard/  the slider plugin
  thi_html.docx                       the exam brief
  exercises/                          buoi-01, 02, 05, 06, 07, 08
```

## The application

`project/` is the final exam deliverable — a diamond-jewellery storefront page
built from `index.html`, one stylesheet and a full-width slider plugin. There is
nothing to install and nothing to compile; open `index.html`, or serve the
directory:

```bash
npx serve project
```

It is the one project here that deploys to Vercel with no build step
([deploy-vercel.yml](../.github/workflows/deploy-vercel.yml)). A
[.vercelignore](project/.vercelignore) keeps `exercises/` and the exam brief out
of the published site, so only the storefront itself goes up.

## Exercises

| Week | Topic |
|---|---|
| buoi-01 | First page — headings, text, images |
| buoi-02 | Splitting structure from styling |
| buoi-05 | Homepage, login, signup and form pages |
| buoi-06 | A landing page with its own JavaScript |
| buoi-07 | Album and spinner layouts |
| buoi-08 | Two-column layout practice |

Sessions 3 and 4 left nothing tracked.

## Notes

`thi_html.docx` is the exam requirements sheet, kept beside the work it
describes rather than moved into a `courses/` folder that would otherwise hold
just one file.
