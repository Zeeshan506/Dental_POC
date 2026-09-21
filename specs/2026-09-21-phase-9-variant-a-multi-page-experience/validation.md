# Validation & Merge Readiness: Phase 9 — Variant A Multi-Page Experience

## 1. Acceptance Criteria Verification Matrix

| AC ID | Description | Verification Method | Pass / Fail |
|---|---|---|---|
| AC-1 | Common routes with native Variant A presentation | Feature route rendering plus Playwright full-route audit | [ ] |
| AC-2 | Informational, contact, FAQ, and legal pages | Render tests plus mobile/manual content checks | [ ] |
| AC-3 | Reusable service overview/detail flow | Feature tests and service-to-contact Playwright journey | [ ] |
| AC-4 | Reusable honest team/detail flow | Feature tests and team-to-consultation Playwright journey | [ ] |
| AC-5 | Accessible review presentation and provenance | Existing/new review tests plus modal keyboard flow | [ ] |
| AC-6 | Expressive shared motion integration | Hook assertions and Playwright scroll observation | [ ] |
| AC-7 | Responsive and accessible safety | Playwright viewport, keyboard, reduced-motion, no-JS, and overflow checks | [ ] |

## 2. Automated Test Suite

- `tests/Feature/VariantAMultiPageTest.php`: All Variant A public pages, metadata/H1s, resource details, placeholder labels, and contextual links.
- Existing `VariantATest`, testimonials, routing, content, and consultation-form suites: rerun as regression coverage.

## 3. Manual Verification Checklist

1. Traverse Home → Services → Service Detail → Contact, Home → Team → Dr. Bhatti → Consultation, and Home → About → Reviews → Contact at desktop and mobile widths.
2. Switch to Variant B from every route and return to confirm the path is retained.
3. Open accordions, carousel controls, review modal, legal links, map/contact links, and form controls by keyboard and touch.
4. Inspect every unverified team/review/legal item for explicit placeholder or approval wording.
5. Scroll with reduced motion and JavaScript disabled; confirm immediate content, no overflow, and no looped or distracting motion.

## 4. Merge Readiness

- [ ] All Phase 9 tasks are complete.
- [ ] AC-1 through AC-7 have passing evidence.
- [ ] Focused and existing regression suites pass; Playwright journeys pass in required variants/viewports.
- [ ] Pint, build, line-count, and whitespace checks pass with no file over 300 lines.
