# Validation & Merge Readiness: Phase 8 — Multi-Page Shared Foundation

## 1. Acceptance Criteria Verification Matrix

| AC ID | Description | Verification Method | Pass / Fail |
|---|---|---|---|
| AC-1 | Equivalent routes and path-preserving variant switching | Feature route matrix plus Playwright route/switcher flows | [ ] |
| AC-2 | Safe invalid variants and not-found resources | Feature tests for invalid query, slug, and route | [ ] |
| AC-3 | Central shared content source | Config-shape and rendered-content feature tests | [ ] |
| AC-4 | Accessible desktop/mobile IA | Playwright keyboard, mobile menu, active-state, and target checks | [ ] |
| AC-5 | Page metadata and semantic page basics | Feature markup assertions for every public route | [ ] |
| AC-6 | Honest placeholder and approval handling | Config/render assertions plus manual content audit | [ ] |
| AC-7 | Client-only validated mock form | Browser validation and no-network-submission check | [ ] |
| AC-8 | No-JS/reduced-motion shared safety | Playwright JavaScript-disabled and reduced-motion flows | [ ] |

## 2. Automated Test Suite

- `tests/Feature/MultiPageRoutingTest.php`: Public route map, variant persistence, session fallback, resource slugs, and 404s.
- `tests/Feature/SharedSiteContentTest.php`: Central configuration, metadata, placeholder flags, legal approval notices, and shared navigation rendering.
- `tests/Feature/ConsultationFormTest.php`: Rendered labels/errors and frontend-only form contract.
- Existing variant-resolution, Variant A, Variant B, and testimonial suites: rerun to protect the existing homepages and carousel behavior.

## 3. Manual Verification Checklist

1. Visit every public route in each variant; switch variants from each page and confirm the pathname remains unchanged.
2. Exercise desktop and mobile navigation by keyboard and touch; confirm active links, focus, labels, and 44px controls.
3. Submit invalid and valid contact forms; observe accessible errors and POC-only mock success, then confirm no request or saved data.
4. Inspect team, reviews, FAQ, and legal pages for explicit placeholder/client-approval wording and no invented facts.
5. Disable JavaScript and emulate reduced motion; verify usable navigation, immediate content, no horizontal overflow, and no duplicate motion runtime.

## 4. Merge Readiness

- [ ] All Phase 8 tasks are complete.
- [ ] AC-1 through AC-8 have passing automated and manual evidence.
- [ ] Existing home, switcher, review, and motion regression tests pass.
- [ ] PHP is formatted with Pint; changed files are under 300 lines; whitespace and frontend build checks pass.
