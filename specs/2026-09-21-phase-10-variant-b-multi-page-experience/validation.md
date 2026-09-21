# Validation & Merge Readiness: Phase 10 — Variant B Multi-Page Experience

## 1. Acceptance Criteria Verification Matrix

| AC ID | Description | Verification Method | Pass / Fail |
|---|---|---|---|
| AC-1 | Common routes with native Variant B presentation | Feature route rendering plus Playwright full-route audit | [ ] |
| AC-2 | Editorial informational, contact, FAQ, and legal pages | Render tests plus mobile/manual content checks | [ ] |
| AC-3 | Reusable service overview/detail flow | Feature tests and service-to-contact Playwright journey | [ ] |
| AC-4 | Reusable honest team/detail flow | Feature tests and team-to-consultation Playwright journey | [ ] |
| AC-5 | Accessible review presentation and provenance | Existing/new review tests plus modal keyboard flow | [ ] |
| AC-6 | Calm editorial shared motion integration | Hook assertions and Playwright scroll observation | [ ] |
| AC-7 | Responsive and accessible safety | Playwright viewport, keyboard, reduced-motion, no-JS, and overflow checks | [ ] |

## 2. Automated Test Suite

- `tests/Feature/VariantBMultiPageTest.php`: All Variant B public pages, metadata/H1s, resource details, placeholder labels, and contextual links.
- Existing `VariantBTest`, testimonials, routing, content, and consultation-form suites: rerun as regression coverage.

## 3. Manual Verification Checklist

1. Traverse Home → Services → Service Detail → Contact, Home → Team → Dr. Bhatti → Consultation, and Home → About → Reviews → Contact at desktop and mobile widths.
2. Switch to Variant A from every route and return to confirm the path is retained.
3. Exercise mobile/desktop navigation, accordions, review controls/modal, legal links, map/contact links, and form controls with keyboard and touch.
4. Confirm long-form pages remain original, calm, text-led, and spacious without copying the external reference or turning into card-heavy layouts.
5. Check unverified team/review/legal records, reduced motion, disabled JavaScript, focus, target sizes, and no-overflow behavior.

## 4. Merge Readiness

- [ ] All Phase 10 tasks are complete.
- [ ] AC-1 through AC-7 have passing evidence.
- [ ] Focused and existing regression suites pass; Playwright journeys pass in required variants/viewports.
- [ ] Pint, build, line-count, and whitespace checks pass with no file over 300 lines.
