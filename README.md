# cce-hcmut

Coursework for seven web-development subjects, one directory each.

Every directory follows the same layout:

```
<Course>/
  courses/            lecture slides, Buoi_NN.pdf, numbered by session
    BaiTap/           practice sheets, a parallel series
  project/            the course's application
    exercises/
      buoi-NN/        that week's standalone drills
```

`courses/` is numbered by the session the material belongs to rather than by
whatever the lecturer named the file, because those disagreed often enough to
collide. `HTML+CSS` and `PHPCB` have no `courses/` at all — neither subject
shipped a single PDF.

## The courses

| Directory | Subject | Application in `project/` | Stack |
|---|---|---|---|
| [Bootstrap](Bootstrap) | Bootstrap & WordPress | Angular component source (not buildable on its own) | Angular, WordPress |
| [HTML+CSS](HTML+CSS) | HTML & CSS | Static exam site | plain HTML/CSS/JS |
| [JS](JS) | JavaScript, jQuery, Angular | Two Angular 22 apps | Angular 22, PHP drills |
| [Lavarel](Lavarel) | Laravel | News site with admin | Laravel 10, MySQL |
| [PHPCB](PHPCB) | PHP căn bản | Exam site on the pluto theme | plain PHP, MySQL |
| [PHPNC](PHPNC) | PHP nâng cao | Two hand-rolled MVC shops | plain PHP, MySQL |
| [ĐA](ĐA) | Đồ án | E-commerce site with admin | Laravel 10, MySQL |

## Running things locally

The three JavaScript projects need **Node 22.22.3+, 24.15+ or 26+** — Angular 22
rejects anything older. `npm ci && npm run build` in the project directory.

The four PHP projects need **PHP 8.1+ and MySQL**, plus a web server pointed at
the project root. Each one expects a database to exist first; the schema lives
beside the code as a `.sql` file, and the per-course README says which. The two
Laravel apps additionally need `composer install` and a `.env` copied from
`.env.example`.

Nothing here is deployed. These are local coursework applications.

## CI

| Workflow | Does what |
|---|---|
| [deploy-vercel.yml](.github/workflows/deploy-vercel.yml) | Builds and deploys the three projects Vercel can serve: `HTML+CSS`, and both Angular apps |
| [package-projects.yml](.github/workflows/package-projects.yml) | `php -l` over the PHP projects, then publishes each as a downloadable archive |
| [sonar.yml](.github/workflows/sonar.yml) | SonarCloud scan of the whole repo |
| [codeql.yml](.github/workflows/codeql.yml) | CodeQL over the JavaScript, excluding vendored libraries |

Vercel can't run PHP, and all four PHP apps need a MySQL database besides, so
they are packaged as installable archives rather than deployed.

Both scanners skip the vendored third-party trees — bower_components, CKEditor,
the pluto theme, Polylang and the WordPress assignment tree. Those are libraries
that were committed rather than installed, and analysing them buries the actual
coursework under thousands of upstream findings.

### Before CI will run

Six repository secrets: `VERCEL_TOKEN`, `VERCEL_ORG_ID`,
`VERCEL_PROJECT_ID_HTML_CSS`, `VERCEL_PROJECT_ID_PROJECT_ANGULAR`,
`VERCEL_PROJECT_ID_MYPROJECT1`, and `SONAR_TOKEN`. Without them the deploy and
scan steps warn and skip rather than fail.

CodeQL additionally needs default setup turned off (Settings → Code security →
CodeQL analysis → Advanced), otherwise GitHub rejects the workflow's results.

## Known gaps

`laravel/framework` is on 10.x in both Laravel apps, which left security support
in February 2025. Four advisories against it have no fix in the 10 line, so
clearing them means moving to Laravel 12.61+ or 13.12+ — a skeleton migration,
not a dependency bump. Every other composer package is current.

Individual applications have their own rough edges; each course README lists
them.
