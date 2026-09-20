# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
adhering strictly to Spec-Driven Development (SDD) principles with clean separation
between specification/planning changes and feature implementation.

---

## [Unreleased]

### 📋 Specification & Planning Changes
- Specified Phase 1 (Variant A: Expressive / 2D Cutout Prototype) in [specs/2026-09-20-phase-1-variant-a-expressive-cutout/](file:///home/zeshan6a/Projects/dental_clinic/specs/2026-09-20-phase-1-variant-a-expressive-cutout/) (`requirements.md`, `plan.md`, `validation.md`).
- Defined 8 Acceptance Criteria (AC-1 through AC-8) covering 5 core chapters (Hero Cutout, Clinical Leadership & Accreditations, Treatments Landscape, Patient Journey, Location/Hours & Booking Finale), responsive behavior, zero gradients, and reduced motion.
- Formulated 3 implementation task groups across 10 granular tasks in `plan.md`.
- Synchronized [specs/roadmap.md](file:///home/zeshan6a/Projects/dental_clinic/specs/roadmap.md) marking Phase 1 `Specification Status: Ready`, `Implementation Status: Not Started`, and `Validation Status: Pending`.

---

## [0.2.0] - 2026-09-20 - Phase 0: Foundation, Shared IA & Switcher Scaffolding

### 🚀 Feature Implementations
- **Central Clinical Content Repository**: Created `config/clinic.php` with structured metadata, Dr. Bhatti profile, 4 treatment categories, 5 patient journey steps, clinic schedule, emergency protocol, and direct WhatsApp contact.
- **Master Layout & Shared Shells**: Created `resources/views/layouts/app.blade.php`, `resources/views/components/shared/header-shell.blade.php`, and `resources/views/components/shared/footer-shell.blade.php`.
- **Persistent Variant Switcher**: Created floating pill toolbar `resources/views/components/shared/variant-switcher.blade.php` supporting query parameters, session persistence, accessible touch targets (>= 44px), and `prefers-reduced-motion`.
- **Route Resolution & Session Persistence**: Updated `routes/web.php` to resolve `?variant=a|b`, manage session state, and render corresponding scaffolded views (`variants.a.index` and `variants.b.index`).
- **Typography & Theme Tokens**: Configured Bunny Fonts (`Source Serif 4` and `Work Sans`) in `vite.config.js` and warm stone design tokens in `resources/css/app.css` with zero gradients.

### 🧪 Automated Regression & Testing
- Created `tests/Feature/VariantResolutionTest.php` covering AC-1 through AC-6 (7 feature tests, 38 assertions passing cleanly).
- Executed full test suite (9 tests, 40 assertions passing).

### 📋 Specification & Planning Changes
- Specified Phase 0 in [specs/2026-09-20-phase-0-foundation-ia-switcher/](file:///home/zeshan6a/Projects/dental_clinic/specs/2026-09-20-phase-0-foundation-ia-switcher/) (`requirements.md`, `plan.md`, `validation.md`).
- Completed Independent QA Audit (`QA VERDICT: PASSED`).
- Validated and merged to `main` upon explicit stakeholder acceptance.
- Synchronized [specs/roadmap.md](file:///home/zeshan6a/Projects/dental_clinic/specs/roadmap.md) to mark Phase 0 `Validation Status: Validated`.

---

## [0.1.0] - 2026-09-20 - Project Baseline & Constitution

### 📋 Specification & Planning Changes
- Established initial project constitution and mission in [specs/mission.md](file:///home/zeshan6a/Projects/dental_clinic/specs/mission.md) for Dr. Bhatti & Associates (Prestigious Family Dental) frontend POC.
- Defined architectural constraints and tech stack in [specs/tech-stack.md](file:///home/zeshan6a/Projects/dental_clinic/specs/tech-stack.md) (Laravel 12, Blade components, Tailwind CSS v4, Vite 8, Source Serif 4 & Work Sans, zero database dependencies).
- Formulated 4-phase delivery roadmap in [specs/roadmap.md](file:///home/zeshan6a/Projects/dental_clinic/specs/roadmap.md) covering Phase 0 (Foundation & Switcher), Phase 1 (Variant A: 2D Cutout), Phase 2 (Variant B: Editorial), and Phase 3 (Cross-Variant Polish & Audit).

### ⚙️ Tooling & Infrastructure
- Initialized Laravel 12 application structure with PHP 8.3+ runtime and Vite 8 asset pipeline.
- Configured Tailwind CSS v4 via `@tailwindcss/vite`.
- Established agent guidelines and SDD workflow rules in [.agents/](file:///home/zeshan6a/Projects/dental_clinic/.agents/) and [AGENTS.md](file:///home/zeshan6a/Projects/dental_clinic/AGENTS.md).
- Initialized Git repository tracking baseline specifications, configurations, and application scaffolding.
