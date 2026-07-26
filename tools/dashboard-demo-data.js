'use strict';

module.exports = {
  uiDeploys: [
    {
      name: 'Demo dashboard',
      kind: 'Vercel static root',
      source: 'demo/dashboard',
      output: 'demo/index.html + sample PDFs',
      build: 'node tools/generate-dashboard.js',
      projectSecret: 'VERCEL_PROJECT_ID_DEMO_DASHBOARD',
      href: 'https://demo.example.test/dashboard',
    },
    {
      name: 'Student portal',
      kind: 'Angular browser bundle',
      source: 'demo/student-portal',
      output: 'dist/student-portal/browser',
      build: 'npm ci --ignore-scripts; npm run build',
      projectSecret: 'VERCEL_PROJECT_ID_DEMO_PORTAL',
      href: 'https://demo.example.test/student-portal',
    },
  ],
  packageArchives: [
    {
      name: 'enrollment-api',
      kind: 'Laravel archive',
      source: 'demo/enrollment-api',
      file: 'enrollment-api.zip',
    },
    {
      name: 'student-portal',
      kind: 'Static UI archive',
      source: 'demo/student-portal',
      file: 'student-portal.zip',
    },
  ],
  containerImages: [
    {
      name: 'enrollment-api',
      source: 'demo/enrollment-api',
      image: 'ghcr.io/restom0/cce-hcmut-demo/enrollment-api',
    },
    {
      name: 'catalog-worker',
      source: 'demo/catalog-worker',
      image: 'ghcr.io/restom0/cce-hcmut-demo/catalog-worker',
    },
  ],
  courses: [
    {
      dir: 'Demo Enrollment',
      subject: 'Student enrollment flow',
      stack: 'Laravel, MySQL, Angular',
      lectures: [
        {
          label: '01-intake',
          file: '01-intake.pdf',
          href: 'demo/enrollment/courses/01-intake.pdf',
        },
        {
          label: '02-review',
          file: '02-review.pdf',
          href: 'demo/enrollment/courses/02-review.pdf',
        },
      ],
      baitap: [
        {
          label: 'approval-checklist',
          file: 'approval-checklist.pdf',
          href: 'demo/enrollment/courses/BaiTap/approval-checklist.pdf',
        },
      ],
      labs: [
        {
          name: '01-intake-form',
          href: 'demo/enrollment/project/exercises/01-intake-form',
          count: 3,
          dirs: 0,
          sample: ['index.html', 'validation.js', 'README.md'],
        },
        {
          name: '02-review-queue',
          href: 'demo/enrollment/project/exercises/02-review-queue',
          count: 4,
          dirs: 0,
          sample: ['queue.component.ts', 'queue.component.html', 'queue.service.ts'],
        },
      ],
      apps: [
        {
          name: 'Student portal',
          href: 'demo/enrollment/project/student-portal',
        },
      ],
      project: {
        kind: 'Laravel app',
        port: '8080',
        href: 'demo/enrollment/project',
        compose: true,
      },
      hasReadme: true,
    },
    {
      dir: 'Demo Publishing',
      subject: 'Course publishing flow',
      stack: 'Static UI, GitHub Actions, GHCR',
      lectures: [
        {
          label: '01-build-package',
          file: '01-build-package.pdf',
          href: 'demo/publishing/courses/01-build-package.pdf',
        },
      ],
      baitap: [
        {
          label: 'release-runbook',
          file: 'release-runbook.pdf',
          href: 'demo/publishing/courses/BaiTap/release-runbook.pdf',
        },
      ],
      labs: [
        {
          name: '01-package-artifact',
          href: 'demo/publishing/project/exercises/01-package-artifact',
          count: 2,
          dirs: 1,
          sample: ['package.yml', 'release-notes.md', 'sample-output/'],
        },
      ],
      apps: [],
      project: {
        kind: 'Source only',
        port: null,
        href: 'demo/publishing/project',
        compose: false,
      },
      hasReadme: true,
    },
  ],
};
