# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
adhering strictly to Spec-Driven Development (SDD) principles with clean separation
between specification/planning changes and feature implementation.

---

## [Unreleased]

### 📋 Specification & Planning Changes
- **Phase 9 — Variant A Multi-Page Experience**: Completed and accepted the specification lifecycle for AC-1 through AC-7; synchronized its validation matrix and roadmap status to `Validated`.
- **Phase 6 — Cross-Variant Polish, Accessibility & Presentation Audit**: Established formal audit specification under `specs/2026-09-21-phase-6-cross-variant-polish-audit/` (AC-1 through AC-7) covering WCAG 2.1 AA contrast, reduced motion, touch targets, keyboard focus, viewport overflow, modularity, and client presentation documentation.
- **Phase 5 — Variant B Calm Editorial Motion**: Expanded the existing Phase 5 contract through AC-12 for the user-directed, original reference-informed composition; recorded the pre-code Playwright motion audit in [motion-audit.md](specs/2026-09-21-phase-5-variant-b-editorial-motion/motion-audit.md).

### 🚀 Feature Implementation & Code Changes
- **Phase 9 — Variant A Multi-Page Experience**: Added a Variant A-specific public-page renderer with expressive information, services, team, reviews, contact, FAQ, journey, and legal compositions; retained the shared content contracts and explicit placeholder provenance.
- **Phase 6: Cross-Variant Polish & Accessibility**:
  - Calibrated stone and brass color tokens in `resources/css/app.css` to achieve WCAG 2.1 AA compliance (>= 4.5:1 for normal text).
  - Suppressed hover/active transforms under `prefers-reduced-motion: reduce` in `resources/css/app.css`.
  - Implemented keyboard focus trap (`Tab`/`Shift+Tab`), instantaneous close under reduced motion, and `Escape` key dismissal in `resources/js/testimonials.js`.
  - Expanded interactive touch targets to >= 44x44px across header brand/phone links, footer links, review cards, and map links.
  - Remediated horizontal viewport overflow at 768px/1024px by refactoring footer grid to `md:grid-cols-2 lg:grid-cols-4` with `min-w-0` and truncation.
  - Authored comprehensive client presentation walkthrough in `docs/client-presentation-walkthrough.md`.
- **Phase 5: Variant B Motion**: Added Variant B’s full-bleed, manually controlled three-image hero using project-owned clinical imagery, plus an editorial shared shell, darker finale, slower profile-specific motion, preserved review controls, and responsive no-JavaScript/reduced-motion behavior.

### 🧪 Testing & Quality Assurance
- **Phase 9**: Added `VariantAMultiPageTest` and passed 62 tests / 976 assertions, Pint, production build, whitespace, and modularity checks. Independent QA returned `QA VERDICT: PASSED` across AC-1 through AC-7; stakeholder acceptance authorized the non-fast-forward merge to `main`.
- Added automated feature tests in `tests/Feature/CrossVariantPolishAuditTest.php` covering AC-1 through AC-6 (6 tests, 44 assertions). Full test suite passes: 46 tests, 629 assertions.
- Added `scripts/check-line-counts.mjs` (`pnpm check:line-counts`); 100% of tracked text and code files (219 files) strictly adhere to `<= 300` lines.
- Independent QA investigator re-audit passed with `QA VERDICT: PASSED` across AC-1 through AC-7 with zero failures.

### ⏳ Phase Status
- Phase 6 current work verified and checked off; kept pending in `In Progress (Partially Finished)` on branch `feat/phase-6-cross-variant-polish-audit` for subsequent feature additions before closing.

---

## [0.8.0] - 2026-09-21 - Phase 10: Variant B Multi-Page Experience

### 📋 Specification & Planning Changes
- **Phase 10 Specification (Variant B Multi-Page Experience)**: Established formal specification contract under [specs/2026-09-21-phase-10-variant-b-multi-page-experience/](specs/2026-09-21-phase-10-variant-b-multi-page-experience/):
  - Defined business intent, calm editorial presentational layer, reusable detail templates, content honesty rules, and acceptance criteria (AC-1 through AC-7) in `requirements.md`.
  - Structured 4 task groups (Editorial & Utility Pages, Resource Experiences, Editorial Motion & Refinement, Verification) in `plan.md`.
  - Validated AC-1 through AC-7 in `validation.md` and synchronized [specs/roadmap.md](specs/roadmap.md) marking Phase 10 `Specification Status: Ready`, `Implementation Status: Implemented`, `Validation Status: Validated`.

### 🚀 Feature Implementations
- **Variant B Multi-Page Experience**:
  - Reusable Primitives: Created `<x-variant-b.page-header>` and `<x-variant-b.cta-section>` enforcing calm editorial typography, chapter indicators, eyebrow badges, and hairline rules.
  - Long-Form & Utility Views: Composed `about.blade.php`, `patient-journey.blade.php`, `faq.blade.php`, `contact.blade.php`, `privacy.blade.php`, and `terms.blade.php` under `resources/views/variants/b/`.
  - Resource Experiences: Built `services.blade.php` (restrained rows), `services-show.blade.php` (reusable detail template), `team.blade.php` (prominent Clinical Director feature & honest placeholders), `team-show.blade.php`, and `reviews.blade.php` (testimonials carousel & modal).
  - Public Routing & View Resolution: Added `PublicSite::view()` helper in `app/Support/PublicSite.php` resolving `variants.{$variant}.{$pageKey}` with fallback to `public.page`.
  - Content Honesty & Placeholders: Enforced Dr. Bhatti prominent credentials, unverified supporting team members as explicit approval-required placeholders, and transparent review placeholders without unapproved Google links.

### 🧪 Automated Verification & Quality Assurance
- **Feature Tests**: Added `tests/Feature/VariantBMultiPageTest.php` covering AC-1 through AC-7 (8 tests, 262 assertions). Full suite: 65 tests, 1129 assertions passing cleanly.
- **Modularity Audit**: `pnpm check:line-counts` verified 100% adherence to `<= 300` lines across 251 tracked files.
- **Independent QA Audit**: Completed by independent QA investigator (`QA VERDICT: PASSED` across AC-1 to AC-7).
- **Merge & Acceptance**: Explicit user confirmation received; merged `feat/phase-10-variant-b-multi-page-experience` into `main`.

---

## [0.7.0] - 2026-09-21 - Phase 7: Global Animation Guidance Skill

### 📋 Specification & Planning Changes
- **Phase 7 Specification (Global Animation Guidance Skill)**: Established formal specification contract under [specs/2026-09-21-phase-7-global-animation-guidance-skill/](specs/2026-09-21-phase-7-global-animation-guidance-skill/):
  - Defined business intent, inspect-first workflow, semantic profile parameters, architecture constraints, and acceptance criteria (AC-1 through AC-6) in `requirements.md`.
  - Structured 3 task groups (Evidence Intake & Scope, Skill Authoring, Skill Validation) in `plan.md`.
  - Created acceptance criteria verification matrix and dry-run checklist in `validation.md`.
  - Synchronized [specs/roadmap.md](specs/roadmap.md) marking Phase 7 `Specification Status: Ready`, `Implementation Status: Implemented`, `Validation Status: Validated`.

### 🚀 Feature Implementations & Skill Authoring
- **Globally Installed Codex Skill**: Created and installed `site-motion-guidance` at `/home/zeshan6a/.codex/skills/site-motion-guidance` using `skill-creator`, with UI metadata in `agents/openai.yaml`.
- **Repository-Tracked Skill**: Synchronized `.agents/skills/site-motion-guidance/`:
  - `SKILL.md`: Main entrypoint defining 4-step inspect-first workflow (centralized engine, component context, data hooks, active variant profile), profile summaries, safeguards, and verification protocol.
  - `references/profiles.md`: Exhaustive token values, timings, travel distances, easing, and interactive states for Expressive / 2D Cutout (Variant A) and Calm / Editorial (Variant B).
  - `references/architecture-and-safeguards.md`: Centralized engine contracts (`resources/js/app.js`, `resources/css/app.css`), progressive enhancement / no-JS safety, reduced-motion mandates, 44px touch targets, zero gradients, zero loops, and modularity caps.
  - `references/decision-tree.md`: Deterministic component routing, ambiguity resolution protocol with user escalation templates, and conflict handling.

### 🧪 Automated Verification & Quality Assurance
- **Tool Validation**: Ran `quick_validate.py` on both global and repo skill locations (`Skill is valid!`, exit code 0).
- **Modularity Audit**: `pnpm check:line-counts` verified 100% adherence to `<= 300` lines across 229 tracked files.
- **Independent QA Audit**: Completed by independent QA investigator (`QA VERDICT: PASSED` across AC-1 to AC-6).
- **Merge & Acceptance**: Explicit user confirmation received; merged `feat/phase-7-global-animation-guidance-skill` into `main`.

---

## [0.6.0] - 2026-09-21 - Phase 4: Motion Foundation & Variant A Site-Wide Choreography

### 📋 Specification & Planning Changes
- **Phase 4 Specification (Motion Foundation & Variant A Site-Wide Choreography)**: Established formal specification contract under [specs/2026-09-21-phase-4-motion-foundation-variant-a/](specs/2026-09-21-phase-4-motion-foundation-variant-a/):
  - Defined business intent, semantic observer hook contracts, expressive 2D choreography, and acceptance criteria (AC-1 through AC-8) in `requirements.md`.
  - Structured 3 task groups (Shared Motion Foundation, Variant A Page-Load & Section Choreography, Accessibility & Regression Tests) in `plan.md`.
  - Created acceptance criteria verification matrix in `validation.md`.
  - Synchronized [specs/roadmap.md](specs/roadmap.md) to update Phase 4 (`Specification Status: Ready`, `Implementation Status: Implemented`, `Validation Status: Validated`).

### 🚀 Feature Implementations
- **Motion Foundation (`motion` & `Motion Mini`)**:
  - Installed `motion` frontend dependency.
  - Implemented centralized semantic observer hook system in `resources/js/app.js` supporting `data-motion-enter`, `data-motion-group`, `data-motion-delay`, and `data-motion-stagger`.
  - Defined CSS motion primitives and timing tokens in `resources/css/app.css` with strict `@media (prefers-reduced-motion: reduce)` overrides.
  - Ensured progressive enhancement and no-JS safety (content remains fully visible if JavaScript fails or is disabled).
- **Variant A Site-Wide Choreography**:
  - Annotated header, hero composition, doctor philosophy, treatment landscape, patient journey, testimonials carousel, booking finale, footer, and switcher with ordered semantic hooks.
  - Directional, tactile entrance motion calibrated to settle cleanly without continuous looping or layout shift.

### 🧪 Automated Regression & Testing
- Extended `tests/Feature/VariantATest.php` with motion hook and accessibility assertions.
- Full suite passing cleanly: 35 tests, 549 assertions (`php artisan test`).
- Manual user acceptance confirmed via `/finish-spec`.

---

## [0.5.0] - 2026-09-21 - Phase 3: Dual-Variant Testimonials & Patient Reviews Carousel

### 📋 Specification & Planning Changes
- **Phase 3 Specification (Dual-Variant Testimonials & Patient Reviews Carousel)**: Established formal specification contract under [specs/2026-09-21-phase-3-testimonials-carousel/](specs/2026-09-21-phase-3-testimonials-carousel/):
  - Defined business intent, dual-variant visual treatment, desktop popover/mobile modal interaction, constraints, and acceptance criteria (AC-1 through AC-8) in `requirements.md`.
  - Structured 5 task groups (Review Data Architecture, Variant A 2D Cutout Carousel, Variant B Editorial Carousel, Interactive Popover & Mobile Modal Engine, View Orchestration & Regression Testing) in `plan.md`.
  - Created acceptance criteria verification matrix and manual verification checklist in `validation.md`.
  - Synchronized [specs/roadmap.md](specs/roadmap.md) to insert Phase 3 (`Specification Status: Ready`, `Implementation Status: Implemented`, `Validation Status: Validated`).

### 🚀 Feature Implementations
- **Phase 3: Dual-Variant Testimonials & Patient Reviews Carousel**:
  - **Clinical Reviews Data Architecture**: Configured 5 structured placeholder reviews in `config/clinic.php` spanning preventative, cosmetic, restorative, and pediatric care with `id`, `patient_name`, `rating` (1–5), `excerpt`, `full_text`, `source` ("Google Reviews"), `source_url`, `date`, and `treatment`.
  - **ClinicReviews Support Service**: Created `app/Support/ClinicReviews.php` providing normalized review access (`all()`, `find()`) and robust null-safe defaults.
  - **Reusable Star Rating Component**: Created `resources/views/components/shared/star-rating.blade.php` rendering accessible SVG star ratings across custom sizes.
  - **Variant A Expressive 2D Testimonials Carousel**: Created `resources/views/components/variant-a/testimonials-carousel.blade.php` and `review-card.blade.php` featuring 2D cutout warm stone card elevation (`bg-stone-warm-50`, `border-stone-warm-200`), tactile star ratings, line-clamped excerpts (`line-clamp-3`), and restrained 2D stone navigation controls (>= 44px touch targets).
  - **Variant B Calm Editorial Testimonials Carousel**: Created `resources/views/components/variant-b/testimonials-carousel.blade.php` and `review-card.blade.php` featuring understated editorial framing (`04 / Perspectives`), hairline borders (`border-stone-warm-200`), subtle star ratings, line-clamped excerpts, and circular hairline navigation buttons.
  - **Standard Review Modal Dialog**: Created `resources/views/components/shared/review-modal.blade.php` and `resources/js/testimonials.js`:
    - Standard centered modal dialog (`fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6`) with backdrop scroll lock and explicit close button (`×`).
    - Fixed and centered without drifting across sections during page scroll.
    - Full patient narrative with internal scrolling (`max-h-64 sm:max-h-80 overflow-y-auto`).
    - External Links: Google Reviews source links open destination in new tab (`target="_blank" rel="noopener noreferrer"`).
  - **View Orchestration**: Integrated carousels into `resources/views/variants/a/index.blade.php` and `resources/views/variants/b/index.blade.php` between Patient Journey and Booking Finale.

### 🧪 Automated Regression & Testing
- Created `tests/Feature/TestimonialsCarouselTest.php` covering AC-1 through AC-8 (7 tests, 216 assertions passing cleanly).
- Full test suite passing with 33 tests and 537 assertions.
- Independent QA investigator audit completed with verdict `QA VERDICT: PASSED`.
- Manual user acceptance confirmed via `/finish-spec`.

---

## [0.4.0] - 2026-09-21 - Phase 2: Variant B: Calm / Editorial Prototype

### 🚀 Feature Implementations
- **Chapter 1: Full-Bleed Architectural Editorial Hero Composition**: Created `resources/views/components/variant-b/hero-editorial.blade.php` featuring eyebrow badge ("Variant B • Calm Editorial Direction"), headline, description from `config('clinic.description')`, primary WhatsApp CTA ("Begin Consultation Dialogue"), secondary Treatments anchor link ("View Clinical Disciplines"), serene architectural imagery framing, and `.animate-editorial-settle` entrance transition.
- **Chapter 2: Clinical Director & Ethos Section**: Created `resources/views/components/variant-b/doctor-portrait.blade.php` rendering Dr. Tariq Bhatti's credentials (`DDS, FAGD, FICOI`), leadership title, prominent philosophy quote block with delicate hairline border, bio, and 4 accreditation markers (`FAGD`, `FICOI`, `AACD`, `Faculty Clinical Advisor`) in an asymmetric 12-column editorial grid.
- **Chapter 3: Treatments & Care Landscape Section**: Created `resources/views/components/variant-b/treatment-row.blade.php` rendering 4 distinct treatment categories (Preventative, Cosmetic, Restorative, Pediatric) as restrained hairline rows with taglines, descriptions, 16 procedural highlights, and quiet hover interactions without heavy drop shadows.
- **Chapter 4: The Patient Journey & Stories Section**: Created `resources/views/components/variant-b/journey-timeline.blade.php` presenting 5 sequential care steps (01 to 05) along a quiet vertical timeline with hairline connectors, architectural sequence numerals, and reassuring clinical protocol callouts.
- **Chapter 5: Clinic Location, Hours & Editorial Booking Finale**: Created `resources/views/components/variant-b/booking-finale.blade.php` with Sutter St clinic location card, OpenStreetMap cartography map container, directions link, complete weekly operating schedule, 24/7 emergency care protocol notice, and consultation inquiry dialogue with direct WhatsApp and telephone concierge links.
- **Variant B Page Orchestration**: Refactored `resources/views/variants/b/index.blade.php` to cleanly orchestrate all 5 components in under 30 lines.
- **Motion & Reduced Motion Styling**: Added `@keyframes editorial-settle` and `.animate-editorial-settle` to `resources/css/app.css` with `@media (prefers-reduced-motion: reduce)` disabling motion.
- **Variant B Editorial Refinement (Pacing, Whitespace & Reference Calibration)**: Refined Variant B referencing `dentaldesignsd.com`:
  - Removed right-side split card and pseudo-technical coordinates in `hero-editorial.blade.php`, adopting a full-width, centered, spacious composition with generous vertical padding and unaggressive CTAs.
  - Cleaned `doctor-portrait.blade.php` of artificial plate numbers and badges, focusing on authentic portraiture, credentials, philosophy, and accreditations.
  - Cleaned `treatment-row.blade.php` of boxed highlight cards, integrating procedural highlights into an airy, understated editorial list.
  - Cleaned `booking-finale.blade.php` of artificial badges, ensuring a serene, grounded location and booking presentation.
  - Calibrated `.animate-editorial-settle` to a subtle 8px reveal over 750ms with `cubic-bezier(0.2, 0.8, 0.2, 1)` easing.

### 🧪 Automated Regression & Testing
- Created `tests/Feature/VariantBTest.php` covering AC-1 through AC-8 (8 tests, 132 assertions passing cleanly).
- Verified full test suite (`php artisan test`): 26 tests, 315 assertions passing with zero regressions.
- Verified asset compilation (`npm run build`) in 218ms.
- Verified code formatting (`vendor/bin/pint --dirty --format agent`).
- Verified zero git diff whitespace issues (`git diff --check`).

### 🔍 Independent QA Audit
- Independent QA Investigator (`8fe89906-3894-42a9-911c-a2c21a64ffaa`) audited branch diff, requirements, test suites, and line counts.
- Received **`QA VERDICT: PASSED`** with explicit evidence cited for all 8 Acceptance Criteria.

### 📋 Specification & Planning Changes
- **Phase 2 Specification (Variant B: Calm / Editorial Prototype)**: Established formal specification contract under [specs/2026-09-20-phase-2-variant-b-calm-editorial/](specs/2026-09-20-phase-2-variant-b-calm-editorial/):
  - Defined business context, in-scope chapters, constraints, and acceptance criteria (AC-1 through AC-8) in `requirements.md`.
  - Structured 3 task groups (Component Architecture, View Orchestration & Animation Tokens, Automated Testing & Verification) in `plan.md`.
  - Created acceptance criteria verification matrix and manual verification checklist in `validation.md`.
- Confirmed manual stakeholder acceptance via `/finish-spec`.
- Synchronized [specs/roadmap.md](specs/roadmap.md) to mark Phase 2 `Validation Status: Validated`.
- Merged `feat/phase-2-variant-b-calm-editorial` into `main`.

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
