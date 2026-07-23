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
  { dir: 'Lavarel', subject: 'Laravel', stack: 'Laravel 10, MySQL' },
  { dir: 'PHPCB', subject: 'PHP căn bản', stack: 'PHP, MySQL' },
  { dir: 'PHPNC', subject: 'PHP nâng cao', stack: 'PHP, MySQL' },
  { dir: 'ĐA', subject: 'Đồ án', stack: 'Laravel 10, MySQL' },
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
<title>cce-hcmut — coursework overview</title>
<style>
  :root {
    color-scheme: light dark;
    --bg: #f6f7f9; --card: #ffffff; --fg: #14161a; --muted: #5c6470;
    --line: #e2e5ea; --accent: #2f6fed; --chip: #eef2f9; --chip-alt: #fdf0e4;
    --radius: 10px;
  }
  @media (prefers-color-scheme: dark) {
    :root {
      --bg: #0f1115; --card: #171a20; --fg: #e7e9ee; --muted: #98a1b0;
      --line: #262b34; --accent: #6c9bff; --chip: #1e232c; --chip-alt: #2a2118;
    }
  }
  * { box-sizing: border-box; }
  body {
    margin: 0; background: var(--bg); color: var(--fg);
    font: 15px/1.55 system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
  }
  .wrap { max-width: 1100px; margin: 0 auto; padding: 32px 20px 64px; }
  header.top h1 { margin: 0 0 4px; font-size: 1.6rem; letter-spacing: -0.01em; }
  header.top p { margin: 0; color: var(--muted); }
  .stats { display: flex; gap: 18px; flex-wrap: wrap; margin: 18px 0 0; padding: 0; list-style: none; }
  .stats li { color: var(--muted); font-size: .9rem; }
  .stats b { color: var(--fg); font-size: 1.05rem; }
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
  .run-label { text-transform: uppercase; letter-spacing: .06em; font-size: .7rem; margin-right: 6px; }
  .run code { background: var(--chip); padding: 2px 6px; border-radius: 5px; color: var(--fg); }
  .port { margin-left: 8px; color: var(--accent); }
  .row { margin-top: 14px; }
  .row h3 {
    margin: 0 0 7px; font-size: .72rem; text-transform: uppercase;
    letter-spacing: .07em; color: var(--muted); font-weight: 600;
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
  a:focus-visible { outline: 2px solid var(--accent); outline-offset: 2px; border-radius: 4px; }
  @media (min-width: 860px) { .grid { grid-template-columns: repeat(2, 1fr); } }
</style>
</head>
<body>
<div class="wrap">
  <header class="top">
    <h1>cce-hcmut</h1>
    <p>Coursework across seven web-development subjects.</p>
    <ul class="stats">
      <li><b>${data.length}</b> courses</li>
      <li><b>${totals.lectures}</b> lectures &amp; sheets</li>
      <li><b>${totals.labs}</b> labs</li>
    </ul>
  </header>

  <div class="search">
    <label for="q" class="visually-hidden" style="position:absolute;left:-9999px">Filter courses and labs</label>
    <input id="q" type="search" placeholder="Filter by course, lecture or lab…" autocomplete="off">
  </div>

  <main class="grid" id="grid">
${data.map(card).join('\n')}
  </main>
  <p id="none">Nothing matches that filter.</p>

  <p class="note">
    ${SOURCE_BASE
      ? `Lecture PDFs are served from this site. Labs, apps and READMEs are source,
         so they link to <a href="${esc(SOURCE_BASE)}">GitHub</a> — the PHP ones need a
         server and a database, which this host does not provide.`
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
