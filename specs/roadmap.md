# Project Roadmap & Implementation Phases

## Phasing Strategy
The development of the Dr. Bhatti & Associates Dental Clinic POC follows a strict 4-phase Spec-Driven Development sequence. Each phase delivers an incremental, verified slice of functionality, prioritizing frontend architectural isolation, content equivalence, and client presentation readiness.

## Phase Overview

| Phase | Title | Objective | Status |
|---|---|---|---|
| Phase 0 | Foundation, Shared IA & Switcher Scaffolding | Establish design tokens, shared clinical content store, layout shells, and persistent variant switcher | Pending |
| Phase 1 | Variant A: Expressive / 2D Cutout Prototype | Implement full page experience with layered 2D cutouts, warm stone palette, and settled entrance motion | Pending |
| Phase 2 | Variant B: Calm / Editorial Prototype | Implement full page experience with architectural typography, generous whitespace, and fluid transitions | Pending |
| Phase 3 | Cross-Variant Polish, Accessibility & Presentation Audit | Conduct accessibility audits, performance checks, responsive fine-tuning, and client handoff walkthrough | Pending |

---

### Phase 0: Foundation, Shared IA & Switcher Scaffolding
- [ ] **Task 0.1**: Configure typography (Source Serif 4, Work Sans) and core color palette in Tailwind CSS v4 (`resources/css/app.css` & `vite.config.js`).
- [ ] **Task 0.2**: Create central clinical content repository (`config/clinic.php` or `app/Support/ClinicContent.php`) containing all clinic copy, doctor credentials, treatment details, patient journey steps, contact info, and clinic hours.
- [ ] **Task 0.3**: Create master layout shell (`resources/views/layouts/app.blade.php`) and persistent floating variant switcher (`resources/views/components/shared/variant-switcher.blade.php`) supporting `?variant=a|b` and session persistence.
- [ ] **Task 0.4**: Implement web route in `routes/web.php` to resolve active variant and route to appropriate view.
- **Deliverable / Verification**: Navigating to `/?variant=a` and `/?variant=b` renders basic scaffolded layout shells with working switcher toolbar and shared header/footer.

---

### Phase 1: Variant A: Expressive / 2D Cutout Prototype
- [ ] **Task 1.1**: Build full-width 2D cutout hero composition with clinic value proposition, primary CTAs, and entrance motion that settles cleanly.
- [ ] **Task 1.2**: Implement Dr. Bhatti philosophy & credentials section utilizing layered warm stone cards and clinical accreditation markers.
- [ ] **Task 1.3**: Implement Treatments & Care Landscape section featuring expressive 2D treatment cards with calm hover elevations.
- [ ] **Task 1.4**: Implement The Patient Journey & Stories section with numbered sequence nodes and patient trust indicators.
- [ ] **Task 1.5**: Implement Clinic Location, Hours, and Booking Finale with architectural map integration and direct WhatsApp/Phone CTAs.
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
