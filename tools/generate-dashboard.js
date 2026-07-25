#!/usr/bin/env node
// Generates index.html: an overview of every course, its lectures and its labs.
//
// Run from the repo root:  node tools/generate-dashboard.js
//
// The page is generated rather than hand-written so it cannot drift from what
// is actually on disk. Re-run it after adding or renaming coursework.

const fs = require('fs');
const path = require('path');

const ROOT = path.resolve(__dirname, '..');

// Subject names and stacks are the one thing not derivable from the tree.
const COURSES = [
  { dir: 'Bootstrap', subject: 'Bootstrap & WordPress', stack: 'Angular, WordPress' },
  { dir: 'HTML+CSS', subject: 'HTML & CSS', stack: 'HTML, CSS, JS' },
  { dir: 'JS', subject: 'JavaScript, jQuery, Angular', stack: 'Angular 22, PHP' },
  { dir: 'Lavarel', subject: 'Laravel', stack: 'Laravel 12, MySQL' },
  { dir: 'PHPCB', subject: 'PHP căn bản', stack: 'PHP, MySQL' },
  { dir: 'PHPNC', subject: 'PHP nâng cao', stack: 'PHP, MySQL' },
  { dir: 'ĐA', subject: 'Đồ án', stack: 'Laravel 12, MySQL' },
];

const ls = (d) => { try { return fs.readdirSync(d).sort(); } catch { return []; } };
const isDir = (p) => { try { return fs.statSync(p).isDirectory(); } catch { return false; } };
const exists = (p) => fs.existsSync(p);

const esc = (s) => String(s)
  .replaceAll('&', '&amp;').replaceAll('<', '&lt;').replaceAll('>', '&gt;')
  .replaceAll('"', '&quot;');

// Directory names include "+" and Vietnamese characters; encodeURI keeps path
// separators intact while escaping the rest.
const href = (p) => encodeURI(p);

// Where links to browsable source should point.
//
// Locally the page is opened from a clone, so relative paths are right. The
// Vercel build ships only index.html and the course PDFs — a directory of PHP
// cannot be served there and a .md would download rather than render — so CI
// passes --source-base and those links go to GitHub instead. PDFs stay
// relative either way, because they are shipped.
const stripTrailingSlashes = (s) => {
  let end = s.length;
  while (end > 0 && s[end - 1] === '/') end -= 1;
  return s.slice(0, end);
};
const baseArg = process.argv.indexOf('--source-base');
const SOURCE_BASE = baseArg !== -1 ? stripTrailingSlashes(process.argv[baseArg + 1] || '') : '';
const srcHref = (p) => (SOURCE_BASE ? SOURCE_BASE + '/' + encodeURI(p) : encodeURI(p));

const DEFAULT_REPO_SLUG = 'restom0/cce-hcmut';
const DEFAULT_REPO_URL = `https://github.com/${DEFAULT_REPO_SLUG}`;
const REPO_SLUG = process.env.GITHUB_REPOSITORY || DEFAULT_REPO_SLUG;
const REPO_URL = process.env.GITHUB_REPOSITORY && process.env.GITHUB_SERVER_URL
  ? `${stripTrailingSlashes(process.env.GITHUB_SERVER_URL)}/${REPO_SLUG}`
  : DEFAULT_REPO_URL;
const DASHBOARD_URL = process.env.DASHBOARD_URL || 'https://cce-hcmut.vercel.app/';
const GHCR_BASE = `ghcr.io/${REPO_SLUG}`;
const optionalUrl = (name) => process.env[name] || '';

const WORKFLOWS = {
  deploy: `${REPO_URL}/actions/workflows/deploy-vercel.yml`,
  packages: `${REPO_URL}/actions/workflows/package-projects.yml`,
  images: `${REPO_URL}/actions/workflows/publish-images.yml`,
  releases: `${REPO_URL}/releases`,
};

const UI_DEPLOYS = [
  {
    name: 'Dashboard',
    kind: 'Vercel static root',
    source: 'index.html',
    output: 'index.html + course PDFs',
    build: 'node tools/generate-dashboard.js',
    projectSecret: 'VERCEL_PROJECT_ID_DASHBOARD',
    href: DASHBOARD_URL,
  },
  {
    name: 'HTML+CSS',
    kind: 'Vercel static UI',
    source: 'HTML+CSS/project',
    output: 'HTML+CSS/project',
    build: 'No build step',
    projectSecret: 'VERCEL_PROJECT_ID_HTML_CSS',
    href: optionalUrl('HTML_CSS_URL'),
  },
  {
    name: 'projectAngular',
    kind: 'Angular browser bundle',
    source: 'JS/project/projectAngular',
    output: 'dist/project-angular/browser',
    build: 'npm ci --ignore-scripts; npm run build',
    projectSecret: 'VERCEL_PROJECT_ID_PROJECT_ANGULAR',
    href: optionalUrl('PROJECT_ANGULAR_URL'),
  },
  {
    name: 'myproject1',
    kind: 'Angular browser bundle',
    source: 'JS/project/myproject1',
    output: 'dist/myproject1/browser',
    build: 'npm ci --ignore-scripts; npm run build',
    projectSecret: 'VERCEL_PROJECT_ID_MYPROJECT1',
    href: optionalUrl('MYPROJECT1_URL'),
  },
];

const PACKAGE_ARCHIVES = [
  { name: 'lavarel', kind: 'Laravel archive', source: 'Lavarel/project', file: 'lavarel.zip' },
  { name: 'da', kind: 'Laravel archive', source: 'ĐA/project', file: 'da.zip' },
  { name: 'phpnc', kind: 'PHP archive', source: 'PHPNC/project', file: 'phpnc.zip' },
  { name: 'phpcb', kind: 'PHP archive', source: 'PHPCB/project', file: 'phpcb.zip' },
  { name: 'bootstrap', kind: 'Source archive', source: 'Bootstrap/project', file: 'bootstrap.zip' },
];

const CONTAINER_IMAGES = [
  { name: 'lavarel', source: 'Lavarel/project', image: `${GHCR_BASE}/lavarel` },
  { name: 'da', source: 'ĐA/project', image: `${GHCR_BASE}/da` },
  { name: 'phpnc', source: 'PHPNC/project', image: `${GHCR_BASE}/phpnc` },
  { name: 'phpcb', source: 'PHPCB/project', image: `${GHCR_BASE}/phpcb` },
];

function readCourse(c) {
  const base = path.join(ROOT, c.dir);
  // Linked only when present: HTML+CSS has no README on every branch, and a
  // dashboard full of 404s is worse than one that omits a link.
  const rec = {
    ...c, lectures: [], baitap: [], labs: [], apps: [], project: null,
    hasReadme: exists(path.join(base, 'README.md')),
  };

  const cdir = path.join(base, 'courses');
  for (const f of ls(cdir)) {
    if (isDir(path.join(cdir, f))) continue;
    rec.lectures.push({ label: f.replace(/\.(pdf|pptx)$/i, ''), file: f, href: `${c.dir}/courses/${f}` });
  }
  for (const f of ls(path.join(cdir, 'BaiTap'))) {
    rec.baitap.push({ label: f.replace(/\.(pdf|pptx)$/i, ''), file: f, href: `${c.dir}/courses/BaiTap/${f}` });
  }

  const exdir = path.join(base, 'project', 'exercises');
  for (const lab of ls(exdir)) {
    const p = path.join(exdir, lab);
    if (!isDir(p)) continue;
    const entries = ls(p);
    const files = entries.filter((e) => !isDir(path.join(p, e)));
    const dirs = entries.filter((e) => isDir(path.join(p, e)));
    rec.labs.push({
      name: lab,
      href: `${c.dir}/project/exercises/${lab}`,
      count: files.length,
      dirs: dirs.length,
      // Some labs are a single folder (a template or a WordPress tree) with no
      // loose files; listing the folders is more use than saying "0 files".
      sample: files.length ? files.slice(0, 5) : dirs.slice(0, 5).map((d) => d + '/'),
    });
  }

  const pdir = path.join(base, 'project');
  if (isDir(pdir)) {
    const has = (f) => exists(path.join(pdir, f));
    let kind = 'Source only';
    if (has('artisan')) kind = 'Laravel app';
    else if (has('index.php')) kind = 'PHP app';
    else if (has('index.html')) kind = 'Static site';

    let port = null;
    if (has('docker-compose.yml')) {
      const m = fs.readFileSync(path.join(pdir, 'docker-compose.yml'), 'utf8').match(/-\s*"(\d+):80"/);
      if (m) port = m[1];
    }
    rec.project = { kind, port, href: `${c.dir}/project`, compose: has('docker-compose.yml') };
  }

  // The two Angular apps sit a level below JS/project.
  for (const a of ['projectAngular', 'myproject1']) {
    if (isDir(path.join(pdir, a))) rec.apps.push({ name: a, href: `${c.dir}/project/${a}` });
  }
  return rec;
}

const data = COURSES.map(readCourse);

const totals = data.reduce((t, c) => ({
  lectures: t.lectures + c.lectures.length + c.baitap.length,
  labs: t.labs + c.labs.length,
}), { lectures: 0, labs: 0 });

const pathLine = (label, value, hrefValue = value) => `<div><dt>${esc(label)}</dt>` +
  `<dd><a class="path" href="${srcHref(hrefValue)}">${esc(value)}</a></dd></div>`;

const textLine = (label, value) => `<div><dt>${esc(label)}</dt><dd>${esc(value)}</dd></div>`;

const workflowButton = (label, href, tone = '') =>
  `<a class="${esc(['button', tone].filter(Boolean).join(' '))}" href="${esc(href)}">${esc(label)}</a>`;

const uiDeployActions = (ui) => [
  ui.href ? workflowButton('Open UI', ui.href, 'primary') : null,
  workflowButton('Source', srcHref(ui.source)),
  workflowButton('Deploy job', WORKFLOWS.deploy),
].filter(Boolean).join('\n    ');

const uiDeployCard = (ui) => `<article class="deploy-card">
  <header>
    <div>
      <h3>${esc(ui.name)}</h3>
      <p>${esc(ui.kind)}</p>
    </div>
    <span class="status">${ui.href ? 'Live' : 'Configured'}</span>
  </header>
  <dl class="kv">
    ${pathLine('Source', ui.source)}
    ${textLine('Output', ui.output)}
    ${textLine('Build', ui.build)}
    ${textLine('Secret', ui.projectSecret)}
  </dl>
  <footer class="card-actions">
    ${uiDeployActions(ui)}
  </footer>
</article>`;

const archiveCard = (pkg) => `<article class="package-card">
  <header>
    <h3>${esc(pkg.name)}</h3>
    <span>${esc(pkg.kind)}</span>
  </header>
  <dl class="kv compact">
    ${pathLine('Source', pkg.source)}
    ${textLine('Artifact', `${pkg.name}-package`)}
    ${textLine('Release', pkg.file)}
  </dl>
</article>`;

const imageCard = (img) => `<article class="image-card">
  <header>
    <h3>${esc(img.name)}</h3>
    <a href="${srcHref(img.source)}">source</a>
  </header>
  <code>${esc(img.image)}</code>
</article>`;

const deployDashboard = () => `<section class="deploy-section" aria-labelledby="deploy-title">
  <div class="section-head">
    <div>
      <p class="eyebrow">Deploy UI</p>
      <h2 id="deploy-title">Vercel surfaces</h2>
    </div>
    <div class="actions">
      ${workflowButton('Deploy workflow', WORKFLOWS.deploy, 'primary')}
      ${workflowButton('Repository', REPO_URL)}
    </div>
  </div>
  <div class="deploy-grid">
    ${UI_DEPLOYS.map(uiDeployCard).join('\n')}
  </div>
</section>`;

const packageDashboard = () => `<section class="deploy-section" aria-labelledby="packages-title">
  <div class="section-head">
    <div>
      <p class="eyebrow">Deploy packages</p>
      <h2 id="packages-title">Archives and container images</h2>
    </div>
    <div class="actions">
      ${workflowButton('Archive workflow', WORKFLOWS.packages, 'primary')}
      ${workflowButton('Image workflow', WORKFLOWS.images)}
      ${workflowButton('Releases', WORKFLOWS.releases)}
    </div>
  </div>
  <div class="package-grid">
    ${PACKAGE_ARCHIVES.map(archiveCard).join('\n')}
  </div>
  <div class="image-grid">
    ${CONTAINER_IMAGES.map(imageCard).join('\n')}
  </div>
</section>`;

const card = (c) => {
  const runLine = c.project && c.project.compose
    ? `<p class="run"><span class="run-label">Run</span> <code>cd ${esc(c.dir)}/project &amp;&amp; docker compose up</code>${c.project.port ? ` <a class="port" href="http://localhost:${c.project.port}">localhost:${c.project.port}</a>` : ''}</p>`
    : '';

  const apps = c.apps.length
    ? `<div class="row"><h3>Apps</h3><ul class="chips">${c.apps.map((a) =>
        `<li><a href="${srcHref(a.href)}">${esc(a.name)}</a></li>`).join('')}</ul></div>`
    : '';

  const lectures = c.lectures.length
    ? `<div class="row"><h3>Lectures <span class="n">${c.lectures.length}</span></h3><ul class="chips">${c.lectures.map((l) =>
        `<li><a href="${href(l.href)}" title="${esc(l.file)}">${esc(l.label)}</a></li>`).join('')}</ul></div>`
    : '';

  const baitap = c.baitap.length
    ? `<div class="row"><h3>Practice <span class="n">${c.baitap.length}</span></h3><ul class="chips alt">${c.baitap.map((l) =>
        `<li><a href="${href(l.href)}" title="${esc(l.file)}">${esc(l.label)}</a></li>`).join('')}</ul></div>`
    : '';

  const labs = c.labs.length
    ? `<div class="row"><h3>Labs <span class="n">${c.labs.length}</span></h3><ul class="labs">${c.labs.map((l) =>
        `<li><a href="${srcHref(l.href)}"><span class="lab-name">${esc(l.name)}</span>` +
        `<span class="lab-meta">${l.count
            ? `${l.count} file${l.count === 1 ? '' : 's'}`
            : `${l.dirs} folder${l.dirs === 1 ? '' : 's'}`}</span></a>` +
        (l.sample.length ? `<p class="lab-files">${esc(l.sample.join(' · '))}${l.count > l.sample.length ? ' …' : ''}</p>` : '') +
        `</li>`).join('')}</ul></div>`
    : '<p class="empty">No labs recorded for this course.</p>';

  const searchBlob = [c.dir, c.subject, c.stack,
    ...c.lectures.map((l) => l.label), ...c.baitap.map((l) => l.label),
    ...c.labs.map((l) => l.name + ' ' + l.sample.join(' '))].join(' ').toLowerCase();

  return `<article class="course" data-search="${esc(searchBlob)}">
  <header class="course-head">
    <div>
      <h2><a href="${srcHref(c.dir)}">${esc(c.dir)}</a></h2>
      <p class="subject">${esc(c.subject)}</p>
    </div>
    <div class="tags">
      <span class="tag">${esc(c.stack)}</span>
      ${c.project ? `<span class="tag muted">${esc(c.project.kind)}</span>` : ''}
    </div>
  </header>
  ${runLine}
  ${apps}
  ${lectures}
  ${baitap}
  ${labs}
  <footer class="course-foot">
    ${c.hasReadme ? `<a href="${srcHref(c.dir + '/README.md')}">README</a>` : ''}
    ${c.project ? `<a href="${srcHref(c.project.href)}">project/</a>` : ''}
  </footer>
</article>`;
};

const html = `<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>cce-hcmut — deploy dashboard</title>
<style>
  :root {
    color-scheme: light dark;
    --bg: #f6f7f9; --card: #ffffff; --fg: #14161a; --muted: #5c6470;
    --line: #e2e5ea; --accent: #2f6fed; --chip: #eef2f9; --chip-alt: #fdf0e4;
    --ok-bg: #e9f8ef; --ok-fg: #17643a; --radius: 8px;
  }
  @media (prefers-color-scheme: dark) {
    :root {
      --bg: #0f1115; --card: #171a20; --fg: #e7e9ee; --muted: #98a1b0;
      --line: #262b34; --accent: #6c9bff; --chip: #1e232c; --chip-alt: #2a2118;
      --ok-bg: #13291d; --ok-fg: #72d79b;
    }
  }
  * { box-sizing: border-box; }
  body {
    margin: 0; background: var(--bg); color: var(--fg);
    font: 15px/1.55 system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
  }
  .wrap { max-width: 1100px; margin: 0 auto; padding: 32px 20px 64px; }
  header.top h1 { margin: 0 0 4px; font-size: 1.6rem; letter-spacing: 0; }
  header.top p { margin: 0; color: var(--muted); }
  .stats { display: flex; gap: 18px; flex-wrap: wrap; margin: 18px 0 0; padding: 0; list-style: none; }
  .stats li { color: var(--muted); font-size: .9rem; }
  .stats b { color: var(--fg); font-size: 1.05rem; }
  .deploy-section { margin-top: 26px; }
  .section-head { display: flex; gap: 14px; justify-content: space-between; flex-wrap: wrap; align-items: end; }
  .section-head h2 { margin: 0; font-size: 1.05rem; }
  .eyebrow {
    margin: 0 0 2px; color: var(--muted); font-size: .72rem;
    text-transform: uppercase; letter-spacing: 0; font-weight: 700;
  }
  .actions, .card-actions { display: flex; gap: 8px; flex-wrap: wrap; }
  .button {
    display: inline-flex; align-items: center; justify-content: center; min-height: 31px;
    border: 1px solid var(--line); border-radius: 6px; padding: 5px 10px;
    color: var(--fg); background: var(--card); text-decoration: none; font-size: .82rem;
  }
  .button.primary { background: var(--fg); color: var(--bg); border-color: var(--fg); }
  .button:hover { border-color: var(--accent); }
  .deploy-grid, .package-grid, .image-grid { display: grid; gap: 12px; margin-top: 12px; }
  .deploy-card, .package-card, .image-card {
    background: var(--card); border: 1px solid var(--line); border-radius: var(--radius); padding: 14px;
  }
  .deploy-card header, .package-card header, .image-card header {
    display: flex; justify-content: space-between; gap: 10px; align-items: start;
  }
  .deploy-card h3, .package-card h3, .image-card h3 { margin: 0; font-size: .98rem; }
  .deploy-card header p, .package-card header span { margin: 2px 0 0; color: var(--muted); font-size: .8rem; }
  .status {
    display: inline-flex; align-items: center; min-height: 24px; padding: 2px 8px;
    border-radius: 999px; color: var(--ok-fg); background: var(--ok-bg); font-size: .75rem;
  }
  .kv { display: grid; gap: 7px; margin: 12px 0 0; }
  .kv.compact { gap: 5px; }
  .kv div { display: grid; grid-template-columns: 70px minmax(0, 1fr); gap: 10px; align-items: baseline; }
  .kv dt { color: var(--muted); font-size: .75rem; }
  .kv dd { margin: 0; min-width: 0; color: var(--fg); font-size: .8rem; overflow-wrap: anywhere; }
  .path, .image-card code {
    color: var(--fg); font: .78rem/1.4 ui-monospace, SFMono-Regular, Consolas, "Liberation Mono", monospace;
    overflow-wrap: anywhere;
  }
  .image-grid { grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); }
  .image-card header a { color: var(--accent); text-decoration: none; font-size: .78rem; }
  .image-card header a:hover { text-decoration: underline; }
  .image-card code { display: block; margin-top: 8px; background: var(--chip); border-radius: 6px; padding: 7px; }
  .search { margin: 24px 0 8px; }
  .search input {
    width: 100%; padding: 10px 12px; font: inherit; color: inherit;
    background: var(--card); border: 1px solid var(--line); border-radius: var(--radius);
  }
  .search input:focus-visible { outline: 2px solid var(--accent); outline-offset: 1px; }
  .grid { display: grid; gap: 18px; margin-top: 18px; }
  .course {
    background: var(--card); border: 1px solid var(--line);
    border-radius: var(--radius); padding: 18px 18px 14px;
  }
  .course[hidden] { display: none; }
  .course-head { display: flex; gap: 12px; justify-content: space-between; flex-wrap: wrap; align-items: start; }
  .course-head h2 { margin: 0; font-size: 1.15rem; }
  .course-head h2 a { color: inherit; text-decoration: none; }
  .course-head h2 a:hover { text-decoration: underline; }
  .subject { margin: 2px 0 0; color: var(--muted); font-size: .9rem; }
  .tags { display: flex; gap: 6px; flex-wrap: wrap; }
  .tag {
    font-size: .75rem; padding: 3px 8px; border-radius: 999px;
    background: var(--chip); color: var(--muted); white-space: nowrap;
  }
  .tag.muted { opacity: .8; }
  .run { margin: 12px 0 0; font-size: .85rem; color: var(--muted); }
  .run-label { text-transform: uppercase; letter-spacing: 0; font-size: .7rem; margin-right: 6px; }
  .run code { background: var(--chip); padding: 2px 6px; border-radius: 5px; color: var(--fg); }
  .port { margin-left: 8px; color: var(--accent); }
  .row { margin-top: 14px; }
  .row h3 {
    margin: 0 0 7px; font-size: .72rem; text-transform: uppercase;
    letter-spacing: 0; color: var(--muted); font-weight: 600;
  }
  .row h3 .n { opacity: .65; margin-left: 4px; }
  ul.chips { display: flex; flex-wrap: wrap; gap: 6px; margin: 0; padding: 0; list-style: none; }
  ul.chips a {
    display: inline-block; padding: 4px 9px; border-radius: 6px;
    background: var(--chip); color: var(--fg); text-decoration: none; font-size: .82rem;
  }
  ul.chips.alt a { background: var(--chip-alt); }
  ul.chips a:hover { outline: 1px solid var(--accent); }
  ul.labs { margin: 0; padding: 0; list-style: none; display: grid; gap: 8px; }
  ul.labs > li { border-left: 2px solid var(--line); padding-left: 10px; }
  ul.labs a { display: flex; gap: 10px; align-items: baseline; text-decoration: none; color: var(--fg); }
  ul.labs a:hover .lab-name { text-decoration: underline; }
  .lab-name { font-weight: 600; font-size: .9rem; }
  .lab-meta { color: var(--muted); font-size: .78rem; }
  .lab-files { margin: 2px 0 0; color: var(--muted); font-size: .78rem; word-break: break-word; }
  .empty { color: var(--muted); font-size: .85rem; font-style: italic; }
  .course-foot { margin-top: 14px; padding-top: 10px; border-top: 1px solid var(--line); display: flex; gap: 14px; }
  .course-foot a { color: var(--accent); text-decoration: none; font-size: .82rem; }
  .course-foot a:hover { text-decoration: underline; }
  .note { margin-top: 28px; color: var(--muted); font-size: .82rem; }
  .note code { background: var(--chip); padding: 1px 5px; border-radius: 4px; }
  #none { color: var(--muted); display: none; }
  .visually-hidden { position: absolute; inline-size: 1px; block-size: 1px; overflow: hidden; clip-path: inset(50%); white-space: nowrap; }
  a:focus-visible { outline: 2px solid var(--accent); outline-offset: 2px; border-radius: 4px; }
  @media (min-width: 720px) {
    .deploy-grid { grid-template-columns: repeat(2, 1fr); }
    .package-grid { grid-template-columns: repeat(3, 1fr); }
  }
  @media (min-width: 860px) { .grid { grid-template-columns: repeat(2, 1fr); } }
</style>
</head>
<body>
<div class="wrap">
  <header class="top">
    <h1>cce-hcmut deploy dashboard</h1>
    <p>One place for the live Vercel UI targets, downloadable deploy packages, container images, and coursework catalog.</p>
    <ul class="stats">
      <li><b>${data.length}</b> courses</li>
      <li><b>${UI_DEPLOYS.length}</b> UI deploys</li>
      <li><b>${PACKAGE_ARCHIVES.length}</b> archives</li>
      <li><b>${CONTAINER_IMAGES.length}</b> images</li>
      <li><b>${totals.lectures}</b> lectures &amp; sheets</li>
      <li><b>${totals.labs}</b> labs</li>
    </ul>
  </header>

  ${deployDashboard()}
  ${packageDashboard()}

  <div class="search">
    <label for="q" class="visually-hidden">Filter courses and labs</label>
    <input id="q" type="search" placeholder="Filter by course, lecture or lab…" autocomplete="off">
  </div>

  <main class="grid" id="grid">
${data.map(card).join('\n')}
  </main>
  <p id="none">Nothing matches that filter.</p>

  <p class="note">
    ${SOURCE_BASE
      ? `Lecture PDFs are served from this site. Labs, apps and READMEs are source,
         so they link to <a href="${esc(SOURCE_BASE)}">GitHub</a>. Deploy package cards point
         to Actions artifacts, releases and GHCR image references for the PHP apps.`
      : `Links are relative, so this page works from a clone: open <code>index.html</code>
         directly, or serve the repo root. Regenerate after changing coursework with
         <code>node tools/generate-dashboard.js</code>.`}
  </p>
</div>

<script>
  var q = document.getElementById('q');
  var cards = Array.prototype.slice.call(document.querySelectorAll('.course'));
  var none = document.getElementById('none');
  q.addEventListener('input', function () {
    var term = q.value.trim().toLowerCase();
    var shown = 0;
    cards.forEach(function (el) {
      var hit = !term || el.dataset.search.indexOf(term) !== -1;
      el.hidden = !hit;
      if (hit) shown++;
    });
    none.style.display = shown ? 'none' : 'block';
  });
</script>
</body>
</html>
`;

fs.writeFileSync(path.join(ROOT, 'index.html'), html, 'utf8');
console.log(`index.html written: ${data.length} courses, ${totals.lectures} lectures/sheets, ${totals.labs} labs`);
