#!/usr/bin/env node
// Generates index.html: an overview of every course, its lectures and its labs.
//
// Run from the repo root:  node tools/generate-dashboard.js
//
// The page is generated rather than hand-written so it cannot drift from what
// is actually on disk. Re-run it after adding or renaming coursework.

const fs = require('node:fs');
const path = require('node:path');

const DEMO_DATA = require('./dashboard-demo-data');

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

const ls = (d) => {
  try {
    return fs.readdirSync(d).sort();
  } catch {
    return [];
  }
};
const isDir = (p) => {
  try {
    return fs.statSync(p).isDirectory();
  } catch {
    return false;
  }
};
const exists = (p) => fs.existsSync(p);

const esc = (s) =>
  String(s)
    .replaceAll('&', '&amp;')
    .replaceAll('<', '&lt;')
    .replaceAll('>', '&gt;')
    .replaceAll('"', '&quot;');

// Directory names include "+" and Vietnamese characters; encodeURI keeps path
// separators intact while escaping the rest.
const href = (p) => encodeURI(p);
const fileLabel = (f) => path.parse(f).name;

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
const sourceBaseArg = process.argv.findIndex((arg) => arg === '--source-base');
const SOURCE_BASE =
  sourceBaseArg !== -1 ? stripTrailingSlashes(process.argv[sourceBaseArg + 1] || '') : '';
const srcHref = (p) => (SOURCE_BASE ? SOURCE_BASE + '/' + encodeURI(p) : encodeURI(p));

const DEFAULT_REPO_SLUG = 'restom0/cce-hcmut';
const DEFAULT_REPO_URL = `https://github.com/${DEFAULT_REPO_SLUG}`;
const REPO_SLUG = process.env.GITHUB_REPOSITORY || DEFAULT_REPO_SLUG;
const REPO_URL =
  process.env.GITHUB_REPOSITORY && process.env.GITHUB_SERVER_URL
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

const courseFile = (course, basePath, file) => ({
  label: fileLabel(file),
  file,
  href: `${course.dir}/${basePath}/${file}`,
});

const readLectures = (course, coursesDir) =>
  ls(coursesDir)
    .filter((file) => !isDir(path.join(coursesDir, file)))
    .map((file) => courseFile(course, 'courses', file));

const readPractice = (course, coursesDir) =>
  ls(path.join(coursesDir, 'BaiTap')).map((file) => courseFile(course, 'courses/BaiTap', file));

const labSummary = (course, exercisesDir, lab) => {
  const labPath = path.join(exercisesDir, lab);
  const entries = ls(labPath);
  const files = entries.filter((entry) => !isDir(path.join(labPath, entry)));
  const dirs = entries.filter((entry) => isDir(path.join(labPath, entry)));
  const folderSamples = dirs.slice(0, 5).map((dir) => dir + '/');
  const sample = files.length ? files.slice(0, 5) : folderSamples;

  return {
    name: lab,
    href: `${course.dir}/project/exercises/${lab}`,
    count: files.length,
    dirs: dirs.length,
    sample,
  };
};

const readLabs = (course, base) => {
  const exercisesDir = path.join(base, 'project', 'exercises');

  return ls(exercisesDir)
    .filter((lab) => isDir(path.join(exercisesDir, lab)))
    .map((lab) => labSummary(course, exercisesDir, lab));
};

const detectProjectKind = (has) => {
  if (has('artisan')) return 'Laravel app';
  if (has('index.php')) return 'PHP app';
  if (has('index.html')) return 'Static site';
  return 'Source only';
};

const dockerComposePort = (projectDir) => {
  const composeFile = path.join(projectDir, 'docker-compose.yml');
  if (!exists(composeFile)) return null;

  const compose = fs.readFileSync(composeFile, 'utf8');
  const portLine = compose.split(/\r?\n/).find((line) => line.includes(':80"'));
  if (!portLine) return null;

  const portMatch = portLine.match(/(\d+):80"/);
  return portMatch ? portMatch[1] : null;
};

const readProject = (course, base) => {
  const projectDir = path.join(base, 'project');
  if (!isDir(projectDir)) return null;

  const has = (file) => exists(path.join(projectDir, file));
  return {
    kind: detectProjectKind(has),
    port: dockerComposePort(projectDir),
    href: `${course.dir}/project`,
    compose: has('docker-compose.yml'),
  };
};

const readApps = (course, base) => {
  const projectDir = path.join(base, 'project');

  return ['projectAngular', 'myproject1']
    .filter((app) => isDir(path.join(projectDir, app)))
    .map((app) => ({ name: app, href: `${course.dir}/project/${app}` }));
};

function readCourse(course) {
  const base = path.join(ROOT, course.dir);
  const coursesDir = path.join(base, 'courses');

  return {
    ...course,
    lectures: readLectures(course, coursesDir),
    baitap: readPractice(course, coursesDir),
    labs: readLabs(course, base),
    apps: readApps(course, base),
    project: readProject(course, base),
    hasReadme: exists(path.join(base, 'README.md')),
  };
}

const totalsFor = (courses) =>
  courses.reduce(
    (t, c) => ({
      lectures: t.lectures + c.lectures.length + c.baitap.length,
      labs: t.labs + c.labs.length,
    }),
    { lectures: 0, labs: 0 },
  );

const buildDashboardData = (courses, uiDeploys, packageArchives, containerImages) => ({
  courses,
  totals: totalsFor(courses),
  uiDeploys,
  packageArchives,
  containerImages,
});

const rawData = buildDashboardData(
  COURSES.map(readCourse),
  UI_DEPLOYS,
  PACKAGE_ARCHIVES,
  CONTAINER_IMAGES,
);
const demoData = buildDashboardData(
  DEMO_DATA.courses,
  DEMO_DATA.uiDeploys,
  DEMO_DATA.packageArchives,
  DEMO_DATA.containerImages,
);

const pathLine = (label, value, hrefValue = value) =>
  `<div><dt>${esc(label)}</dt>` +
  `<dd><a class="path" href="${srcHref(hrefValue)}">${esc(value)}</a></dd></div>`;

const textLine = (label, value) => `<div><dt>${esc(label)}</dt><dd>${esc(value)}</dd></div>`;

const workflowButton = (label, href, tone = '') =>
  `<a class="${esc(['button', tone].filter(Boolean).join(' '))}" href="${esc(href)}">${esc(label)}</a>`;

const uiDeployActions = (ui) =>
  [
    ui.href ? workflowButton('Open UI', ui.href, 'primary') : null,
    workflowButton('Source', srcHref(ui.source)),
    workflowButton('Deploy job', WORKFLOWS.deploy),
  ]
    .filter(Boolean)
    .join('\n    ');

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

const deployDashboard = (
  uiDeploys,
) => `<section class="deploy-section" aria-labelledby="deploy-title">
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
    ${uiDeploys.map(uiDeployCard).join('\n')}
  </div>
</section>`;

const packageDashboard = (
  packageArchives,
  containerImages,
) => `<section class="deploy-section" aria-labelledby="packages-title">
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
    ${packageArchives.map(archiveCard).join('\n')}
  </div>
  <div class="image-grid">
    ${containerImages.map(imageCard).join('\n')}
  </div>
</section>`;

const chipItem = (item, linkBuilder) =>
  `<li><a href="${linkBuilder(item)}" title="${esc(item.file || item.name)}">${esc(item.label || item.name)}</a></li>`;

const row = (title, count, listClass, items) =>
  `<div class="row"><h3>${esc(title)} <span class="n">${count}</span></h3><ul class="${esc(listClass)}">${items.join('')}</ul></div>`;

const appsRow = (apps) => {
  if (!apps.length) return '';
  const items = apps.map((app) => chipItem(app, (item) => srcHref(item.href)));
  return row('Apps', apps.length, 'chips', items);
};

const filesRow = (title, items, listClass) => {
  if (!items.length) return '';
  const links = items.map((item) => chipItem(item, (linkItem) => href(linkItem.href)));
  return row(title, items.length, listClass, links);
};

const plural = (count, singular) => {
  const suffix = count === 1 ? '' : 's';
  return `${count} ${singular}${suffix}`;
};

const labMeta = (lab) => {
  if (lab.count) return plural(lab.count, 'file');
  return plural(lab.dirs, 'folder');
};

const labSample = (lab) => {
  if (!lab.sample.length) return '';
  const more = lab.count > lab.sample.length ? ' ...' : '';
  return `<p class="lab-files">${esc(lab.sample.join(' · '))}${more}</p>`;
};

const labItem = (lab) =>
  `<li><a href="${srcHref(lab.href)}"><span class="lab-name">${esc(lab.name)}</span>` +
  `<span class="lab-meta">${esc(labMeta(lab))}</span></a>${labSample(lab)}</li>`;

const labsRow = (labs) => {
  if (!labs.length) return '<p class="empty">No labs recorded for this course.</p>';
  return row('Labs', labs.length, 'labs', labs.map(labItem));
};

const runLine = (course) => {
  if (!course.project?.compose) return '';
  const command = `cd ${course.dir}/project && docker compose up`;
  const port = course.project.port;
  const portLink = port
    ? ` <a class="port" href="http://localhost:${port}">localhost:${esc(port)}</a>`
    : '';
  return `<p class="run"><span class="run-label">Run</span> <code>${esc(command)}</code>${portLink}</p>`;
};

const courseFooter = (course) =>
  [
    course.hasReadme ? `<a href="${srcHref(course.dir + '/README.md')}">README</a>` : '',
    course.project ? `<a href="${srcHref(course.project.href)}">project/</a>` : '',
  ]
    .filter(Boolean)
    .join('');

const card = (c) => {
  const projectTag = c.project ? `<span class="tag muted">${esc(c.project.kind)}</span>` : '';
  const searchBlob = [
    c.dir,
    c.subject,
    c.stack,
    ...c.lectures.map((l) => l.label),
    ...c.baitap.map((l) => l.label),
    ...c.labs.map((l) => l.name + ' ' + l.sample.join(' ')),
  ]
    .join(' ')
    .toLowerCase();

  return `<article class="course" data-search="${esc(searchBlob)}">
  <header class="course-head">
    <div>
      <h2><a href="${srcHref(c.dir)}">${esc(c.dir)}</a></h2>
      <p class="subject">${esc(c.subject)}</p>
    </div>
    <div class="tags">
      <span class="tag">${esc(c.stack)}</span>
      ${projectTag}
    </div>
  </header>
  ${runLine(c)}
  ${appsRow(c.apps)}
  ${filesRow('Lectures', c.lectures, 'chips')}
  ${filesRow('Practice', c.baitap, 'chips alt')}
  ${labsRow(c.labs)}
  <footer class="course-foot">
    ${courseFooter(c)}
  </footer>
</article>`;
};

const stats = (dataset) => `<li><b>${dataset.courses.length}</b> courses</li>
      <li><b>${dataset.uiDeploys.length}</b> UI deploys</li>
      <li><b>${dataset.packageArchives.length}</b> archives</li>
      <li><b>${dataset.containerImages.length}</b> images</li>
      <li><b>${dataset.totals.lectures}</b> lectures &amp; sheets</li>
      <li><b>${dataset.totals.labs}</b> labs</li>`;

const dashboardBody = (dataset) => `${deployDashboard(dataset.uiDeploys)}
  ${packageDashboard(dataset.packageArchives, dataset.containerImages)}

  <div class="search" id="coursework">
    <label for="q" class="visually-hidden">Filter courses and labs</label>
    <input id="q" type="search" placeholder="Filter by course, lecture or lab..." autocomplete="off">
  </div>

  <main class="grid" id="grid">
${dataset.courses.map(card).join('\n')}
  </main>
  <p id="none">Nothing matches that filter.</p>`;

const note = () =>
  SOURCE_BASE
    ? `Lecture PDFs are served from this site. Labs, apps and READMEs are source,
         so they link to <a href="${esc(SOURCE_BASE)}">GitHub</a>. Deploy package cards point
         to Actions artifacts, releases and GHCR image references for the PHP apps.`
    : `Links are relative, so this page works from a clone: open <code>index.html</code>
         directly, or serve the repo root. Regenerate after changing coursework with
         <code>node tools/generate-dashboard.js</code>.`;

const jsonForScript = (value) => JSON.stringify(value).replaceAll('<', '\\u003c');

const clientDatasets = jsonForScript({
  raw: {
    body: dashboardBody(rawData),
    stats: stats(rawData),
    copy: 'Real repository data from the current coursework tree.',
  },
  demo: {
    body: dashboardBody(demoData),
    stats: stats(demoData),
    copy: 'Dummy demo data for showing the main publish flow without using raw coursework paths.',
  },
});

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
  .top-nav {
    display: flex; flex-wrap: wrap; align-items: center; gap: 8px;
    margin: 0 0 18px; padding: 0 0 14px; border-bottom: 1px solid var(--line);
  }
  .top-nav a { color: var(--fg); text-decoration: none; font-size: .82rem; }
  .top-nav a:not(.button) { padding: 5px 2px; }
  .top-nav a:hover { color: var(--accent); }
  .top-nav .mode { margin-left: auto; }
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
  .lab-files { margin: 2px 0 0; color: var(--muted); font-size: .78rem; overflow-wrap: anywhere; }
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
    <nav class="top-nav" aria-label="Dashboard">
      <a href="#deploy-title">Deploy UI</a>
      <a href="#packages-title">Packages</a>
      <a href="#coursework">Coursework</a>
      <a class="button primary mode" id="mode-toggle" href="?demo=1" aria-pressed="false">Demo mode</a>
    </nav>
    <h1>cce-hcmut deploy dashboard</h1>
    <p id="mode-copy">Real repository data from the current coursework tree.</p>
    <ul class="stats" id="stats">
      ${stats(rawData)}
    </ul>
  </header>

  <div id="dashboard-root">
  ${dashboardBody(rawData)}
  </div>

  <p class="note">
    ${note()}
  </p>
</div>

<script>
  var datasets = ${clientDatasets};
  var dashboardRoot = document.getElementById('dashboard-root');
  var statsList = document.getElementById('stats');
  var modeCopy = document.getElementById('mode-copy');
  var modeToggle = document.getElementById('mode-toggle');

  function bindSearch() {
    var q = document.getElementById('q');
    var cards = Array.prototype.slice.call(document.querySelectorAll('.course'));
    var none = document.getElementById('none');
    q.addEventListener('input', function () {
      var term = q.value.trim().toLowerCase();
      var shown = 0;
      cards.forEach(function (el) {
        var hit = !term || el.dataset.search.includes(term);
        el.hidden = !hit;
        if (hit) shown++;
      });
      none.style.display = shown ? 'none' : 'block';
    });
  }

  function replaceUrl(mode) {
    if (!window.history || !window.URLSearchParams) return;
    var params = new URLSearchParams(window.location.search);
    if (mode === 'demo') params.set('demo', '1');
    else params.delete('demo');
    var query = params.toString();
    var nextUrl = window.location.pathname + (query ? '?' + query : '') + window.location.hash;
    try {
      window.history.replaceState(null, '', nextUrl);
    } catch {
      return;
    }
  }

  function setMode(mode, shouldReplaceUrl) {
    var next = datasets[mode] ? mode : 'raw';
    document.body.dataset.mode = next;
    dashboardRoot.innerHTML = datasets[next].body;
    statsList.innerHTML = datasets[next].stats;
    modeCopy.textContent = datasets[next].copy;
    modeToggle.textContent = next === 'demo' ? 'Raw data' : 'Demo mode';
    modeToggle.href = next === 'demo' ? '?' : '?demo=1';
    modeToggle.setAttribute('aria-pressed', next === 'demo' ? 'true' : 'false');
    bindSearch();
    if (shouldReplaceUrl) replaceUrl(next);
  }

  modeToggle.addEventListener('click', function (event) {
    event.preventDefault();
    setMode(document.body.dataset.mode === 'demo' ? 'raw' : 'demo', true);
  });

  var initialMode =
    window.URLSearchParams && new URLSearchParams(window.location.search).get('demo') === '1'
      ? 'demo'
      : 'raw';
  setMode(initialMode, false);
</script>
</body>
</html>
`;

fs.writeFileSync(path.join(ROOT, 'index.html'), html, 'utf8');
console.log(
  `index.html written: ${rawData.courses.length} courses, ` +
    `${rawData.totals.lectures} lectures/sheets, ${rawData.totals.labs} labs`,
);
