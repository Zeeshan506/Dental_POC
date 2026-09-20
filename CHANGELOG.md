# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
adhering strictly to Spec-Driven Development (SDD) principles with clean separation
between specification/planning changes and feature implementation.

---

## [Unreleased]

### 📋 Specification & Planning Changes
- **Phase 2 Specification (Variant B: Calm / Editorial Prototype)**: Established formal specification contract under [specs/2026-09-20-phase-2-variant-b-calm-editorial/](file:///home/zeshan6a/Projects/dental_clinic/specs/2026-09-20-phase-2-variant-b-calm-editorial/):
  - Defined business context, in-scope chapters, constraints, and acceptance criteria (AC-1 through AC-8) in `requirements.md`.
  - Structured 3 task groups (Component Architecture, View Orchestration & Animation Tokens, Automated Testing & Verification) in `plan.md`.
  - Created acceptance criteria verification matrix and manual verification checklist in `validation.md`.
  - Synchronized [specs/roadmap.md](file:///home/zeshan6a/Projects/dental_clinic/specs/roadmap.md) marking Phase 2 `Specification Status: Ready`, `Implementation Status: Not Started`, and `Validation Status: Pending`.

---

## [0.3.0] - 2026-09-20 - Phase 1: Variant A: Expressive / 2D Cutout Prototype

### 🚀 Feature Implementations
- **Chapter 1: 2D Cutout Hero Composition**: Created `resources/views/components/variant-a/hero-cutout.blade.php` featuring eyebrow badge ("Variant A • Expressive 2D Cutout"), headline, description from `config('clinic.description')`, primary WhatsApp CTA, secondary Treatments anchor link, 2D layered stone geometry, and settled entrance animation.
- **Chapter 2: Clinical Leadership & Philosophy**: Created `resources/views/components/variant-a/doctor-card.blade.php` rendering Dr. Tariq Bhatti's credentials (`DDS, FAGD, FICOI`), clinical director bio, philosophy quote with warm brass accent border, and 4 accreditation markers (`FAGD`, `FICOI`, `AACD`, `Faculty Clinical Advisor`).
- **Chapter 3: Treatments & Care Landscape**: Created `resources/views/components/variant-a/treatment-tile.blade.php` rendering 4 distinct treatment categories (Preventative, Cosmetic, Restorative, Pediatric) with taglines, descriptions, 16 procedural highlights, and subtle hover micro-elevations.
- **Chapter 4: The Patient Journey**: Created `resources/views/components/variant-a/journey-step.blade.php` presenting 5 sequential care steps (01 to 05) with numbered 2D stone badges, responsive connecting progression lines, and tailored trust indicators.
- **Chapter 5: Location, Hours & Booking Finale**: Created `resources/views/components/variant-a/booking-finale.blade.php` with Sutter St clinic address, Google Maps directions link, weekly operating schedule, 24/7 emergency protocol callout, WhatsApp booking CTA, and telephone concierge link.
- **Variant A Page Orchestration**: Refactored `resources/views/variants/a/index.blade.php` to cleanly compose all 5 chapters under 70 lines.
- **Motion & Reduced Motion Styling**: Added `@keyframes cutout-settle` and `.animate-cutout-settle` to `resources/css/app.css` with `@media (prefers-reduced-motion: reduce)` disabling motion.
- **Visual Refinement (Elimination of Scrapbook Stickers)**: Refined Variant A across all chapters to reduce photographic stickers in favor of large intentional compositions:
  - Hero: Retained dentist as sole photographic cutout; removed floating molar/tools cards; added subtle oversized vector anatomical line drawing.
  - Treatments: Removed all 4 mini photographic badges, returning cards to clean typography-led compositions with architectural sequence numerals.
  - Doctor/Philosophy: Differentiated portrait from hero by styling as an architectural Clinical Monograph & Anatomical Study Plate with callout crosshairs and integrated caption footer.
  - Patient Journey: Removed photographic cutout badges from each step, maintaining clean numbered 2D stone sequence badges and typographic tags.
  - Location: Retained real OpenStreetMap cartography map as functional content.

### 🧪 Automated Regression & Testing
- Created and updated `tests/Feature/VariantATest.php` covering AC-1 through AC-8 (9 tests, 143 assertions passing cleanly).
- Verified full test suite (`php artisan test`): 18 tests, 183 assertions passing.
- Verified asset compilation (`npm run build`) in 294ms.
- Verified code formatting (`vendor/bin/pint --format agent`).
- Verified zero git diff whitespace issues (`git diff --check`).

### 🔍 Independent QA Audit
- Independent QA Investigator (`abc2697f-d390-4bb7-b3c6-48917a6f1e2e`) audited branch diff, requirements, test suites, and line counts.
- Received **`QA VERDICT: PASSED`** with explicit evidence cited for all 8 Acceptance Criteria.

### 📋 Specification & Planning Changes
- Specified Phase 1 in [specs/2026-09-20-phase-1-variant-a-expressive-cutout/](file:///home/zeshan6a/Projects/dental_clinic/specs/2026-09-20-phase-1-variant-a-expressive-cutout/) (`requirements.md`, `plan.md`, `validation.md`).
- Confirmed manual stakeholder acceptance via `/finish-spec`.
- Synchronized [specs/roadmap.md](file:///home/zeshan6a/Projects/dental_clinic/specs/roadmap.md) to mark Phase 1 `Validation Status: Validated`.
- Merged `feat/phase-1-variant-a-expressive-cutout` into `main`.

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
