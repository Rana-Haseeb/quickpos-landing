![CI/CD Pipeline](https://github.com/Rana-Haseeb/quickpos-landing/actions/workflows/ci.yml/badge.svg)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?logo=php&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-CDN-38BDF8?logo=tailwindcss&logoColor=white)
![License](https://img.shields.io/badge/license-Educational-lightgrey)

<div align="center">

# ⚡ QuickPOS Landing Page

**The Last POS System You'll Ever Need**

A single-page marketing site for a fictional Point-of-Sale SaaS product, built as a hands-on
**Software Project Management** course project demonstrating a full CI/CD pipeline —
from commit-message policy enforcement to automated testing and PHP syntax linting.

[Live Demo](#) · [Features](#-features) · [CI/CD Pipeline](#-cicd-pipeline) · [Testing](#-testing)

</div>

---

## 📖 About

QuickPOS is a responsive, conversion-focused landing page for a retail Point-of-Sale product.
It showcases a hero section, feature highlights, pricing tiers, and a contact form — all
styled with Tailwind CSS and served through a lightweight PHP backend.

Beyond the front-end, the real focus of this repository is the **DevOps workflow** wrapped
around it: every push and pull request is validated by a multi-stage GitHub Actions pipeline
that enforces Jira ticket references, lints PHP code, runs automated tests, and archives
test artifacts.

## ✨ Features

| Section | Description |
|---|---|
| 🏠 **Hero** | Bold call-to-action with "Get Started" and "View Demo" buttons |
| 📊 **Real-time Analytics** | Sales trends & employee performance reporting |
| 🛡️ **Smart Inventory** | Automated low-stock alerts |
| 📱 **Cloud Sync** | Cross-device access — phone, tablet, laptop |
| 💳 **Pricing Tiers** | Basic, Pro (highlighted), and Enterprise plans |
| ✉️ **Contact Form** | Name / email / message capture with server-side validation |

## 🧰 Tech Stack

- **Backend:** PHP 8.2
- **Styling:** [Tailwind CSS](https://tailwindcss.com/) (via CDN, no build step required)
- **Testing:** Custom lightweight PHP test runner (no external framework)
- **CI/CD:** GitHub Actions

## 📂 Project Structure

```
quickpos-landing/
├── index.php                     # Main landing page (markup + Tailwind classes)
├── tests/
│   └── ContactFormTest.php       # Automated tests for contact form validation
├── .github/
│   └── workflows/
│       └── ci.yml                # Multi-job CI/CD pipeline definition
└── README.md
```

## 🚀 Getting Started

### Prerequisites
- PHP 8.2+ installed locally

### Run locally

```bash
git clone https://github.com/Rana-Haseeb/quickpos-landing.git
cd quickpos-landing
php -S localhost:8000
```

Then open [http://localhost:8000](http://localhost:8000) in your browser.

> ⚠️ **Known issue:** [index.php](index.php) currently contains a deliberate broken
> statement (`<?php this_is_a_fatal_error; ?>`) at the end of the file, left over from a
> CI pipeline-failure demonstration. Remove that line before running the page for real use.

## ✅ Testing

The contact form's validation logic is covered by a self-contained PHP test suite (no
PHPUnit dependency) that checks required fields and email format:

```bash
php tests/ContactFormTest.php
```

**Test cases:**
1. Empty name → rejected
2. Empty email → rejected
3. Invalid email format → rejected
4. Empty message → rejected
5. Fully valid submission → accepted

A passing run writes a summary report to `build/test-report.txt`, which is uploaded as a
CI artifact.

## 🔄 CI/CD Pipeline

Defined in [.github/workflows/ci.yml](.github/workflows/ci.yml), the pipeline runs on pushes
to `feature/**` / `bugfix/**` branches and on pull requests targeting `main`. Three jobs run
**in parallel**:

| Job | Purpose |
|---|---|
| **Commit Validation** | Fails the build unless the triggering commit message contains a Jira ticket reference in the format `[SCRUM-###]` |
| **Code Quality & Syntax** | Runs `php -l` for syntax errors and `phpcs` (PSR-12 standard) for style checks |
| **Automated Testing & Artifacts** | Executes the contact form test suite and uploads `build/test-report.txt` as a downloadable artifact |

This mirrors a real-world trunk-based development workflow with ticket traceability, static
analysis, and automated regression testing gating every merge.

## 🤝 Contributing

This is a course project, but the workflow follows standard practice:

1. Branch from `main` using `feature/<name>` or `bugfix/<name>`
2. Commit with a Jira reference: `[SCRUM-XX] Your message`
3. Open a pull request into `main` — the CI pipeline must pass before merging

## 📄 License

Built for educational purposes as part of a Software Project Management course.

---

<div align="center">
<sub>Made with ☕ by <a href="https://github.com/Rana-Haseeb">Rana Haseeb</a></sub>
</div>
