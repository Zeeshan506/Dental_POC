# Project Roadmap & Implementation Phases

## Phasing Strategy
The development of the Dr. Bhatti & Associates Dental Clinic POC follows a strict 4-phase Spec-Driven Development sequence. Each phase delivers an incremental, verified slice of functionality, prioritizing frontend architectural isolation, content equivalence, and client presentation readiness.

## Phase Overview

| Phase | Title | Specification Path | Acceptance Criteria | Specification Status | Implementation Status | Validation Status |
|---|---|---|---|---|---|---|
| Phase 0 | Foundation, Shared IA & Switcher Scaffolding | [Phase 0 Spec](file:///home/zeshan6a/Projects/dental_clinic/specs/2026-09-20-phase-0-foundation-ia-switcher/) | AC-1 to AC-6 | Ready | Implemented | Validated |
| Phase 1 | Variant A: Expressive / 2D Cutout Prototype | [Phase 1 Spec](file:///home/zeshan6a/Projects/dental_clinic/specs/2026-09-20-phase-1-variant-a-expressive-cutout/) | AC-1 to AC-8 | Ready | Implemented | Pending |
| Phase 2 | Variant B: Calm / Editorial Prototype | TBD | TBD | Pending | Not Started | Pending |
| Phase 3 | Cross-Variant Polish, Accessibility & Presentation Audit | TBD | TBD | Pending | Not Started | Pending |

---

### Phase 0: Foundation, Shared IA & Switcher Scaffolding
- **Specification**: [specs/2026-09-20-phase-0-foundation-ia-switcher/](file:///home/zeshan6a/Projects/dental_clinic/specs/2026-09-20-phase-0-foundation-ia-switcher/)
- **Acceptance Criteria**: AC-1 through AC-6
- **Status**: Specification: Ready | Implementation: Implemented | Validation: Validated
- [x] **Task 0.1**: Configure typography (Source Serif 4, Work Sans) and core color palette in Tailwind CSS v4 (`resources/css/app.css` & `vite.config.js`).
- [x] **Task 0.2**: Create central clinical content repository (`config/clinic.php`) containing all clinic copy, doctor credentials, treatment details, patient journey steps, contact info, and clinic hours.
- [x] **Task 0.3**: Create master layout shell (`resources/views/layouts/app.blade.php`) and persistent floating variant switcher (`resources/views/components/shared/variant-switcher.blade.php`) supporting `?variant=a|b` and session persistence.
- [x] **Task 0.4**: Implement web route in `routes/web.php` to resolve active variant and route to appropriate view.
- **Deliverable / Verification**: Navigating to `/?variant=a` and `/?variant=b` renders basic scaffolded layout shells with working switcher toolbar and shared header/footer.

---

### Phase 1: Variant A: Expressive / 2D Cutout Prototype
- **Specification**: [specs/2026-09-20-phase-1-variant-a-expressive-cutout/](file:///home/zeshan6a/Projects/dental_clinic/specs/2026-09-20-phase-1-variant-a-expressive-cutout/)
- **Acceptance Criteria**: AC-1 through AC-8
- **Status**: Specification: Ready | Implementation: Implemented | Validation: Pending
- [x] **Task 1.1**: Build full-width 2D cutout hero composition with clinic value proposition, primary CTAs, and entrance motion that settles cleanly.
- [x] **Task 1.2**: Implement Dr. Bhatti philosophy & credentials section utilizing layered warm stone cards and clinical accreditation markers.
- [x] **Task 1.3**: Implement Treatments & Care Landscape section featuring expressive 2D treatment cards with calm hover elevations.
- [x] **Task 1.4**: Implement The Patient Journey & Stories section with numbered sequence nodes and patient trust indicators.
- [x] **Task 1.5**: Implement Clinic Location, Hours, and Booking Finale with architectural map integration and direct WhatsApp/Phone CTAs.
- **Deliverable / Verification**: Variant A is fully interactive, responsive across all breakpoints, contains zero gradients, and all animations settle without looping.

---

### Phase 2: Variant B: Calm / Editorial Prototype
- [ ] **Task 2.1**: Build full-bleed architectural editorial hero composition inspired by `dentaldesignsd.com`, featuring serene photography and high-contrast typography.
- [ ] **Task 2.2**: Implement Dr. Bhatti editorial profile section pairing portraiture with clinical director ethos in an asymmetric grid.
- [ ] **Task 2.3**: Implement Treatments & Care Landscape using restrained hairline rows, subtle dividers, and minimal typographic emphasis.
- [ ] **Task 2.4**: Implement The Patient Journey & Stories using a quiet vertical timeline and architectural quote blocks.
- [ ] **Task 2.5**: Implement Clinic Location, Hours, and Editorial Booking Finale with understated consultation inquiry drawer and direct WhatsApp action.
- **Deliverable / Verification**: Variant B delivers a distinctly calmer, high-end editorial experience using identical clinical content to Variant A.

---

### Phase 3: Cross-Variant Polish, Accessibility & Presentation Audit
- [ ] **Task 3.1**: Validate strict `prefers-reduced-motion: reduce` behavior across both variants, verifying instantaneous or disabled animations.
- [ ] **Task 3.2**: Audit color contrast ratios to ensure WCAG AA/AAA compliance across all text and interactive buttons.
- [ ] **Task 3.3**: Verify responsive performance and touch targets (>= 44px) across mobile, tablet, and desktop viewports.
- [ ] **Task 3.4**: Ensure all tracked files strictly adhere to the <= 300-line modularity constraint.
- [ ] **Task 3.5**: Prepare client walkthrough documentation demonstrating key design differences and interaction principles.
- **Deliverable / Verification**: Both variants pass all accessibility, modularity, and responsiveness checks, ready for client review.
