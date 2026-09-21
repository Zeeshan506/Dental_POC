# Validation & Merge Readiness: Phase 11 — Cross-Variant Motion, Navigation & Preferences

## 1. Acceptance Criteria Verification Matrix

| AC ID | Description | Verification Method | Pass / Fail |
|---|---|---|---|
| AC-1 | Variant A site-wide expressive choreography | Rendered-hook tests and desktop/mobile full-scroll audit | Automated: PASS; Manual: Pending |
| AC-2 | Variant B site-wide calm editorial choreography | Rendered-hook tests and desktop/mobile full-scroll audit | Automated: PASS; Manual: Pending |
| AC-3 | Reduced-motion and no-JS safety | Browser emulation and JavaScript-disabled route checks | Automated: PASS; Manual: Pending |
| AC-4 | Both named hero labels removed | Focused hero rendering tests | Automated: PASS; Manual: PASS (user, 2026-09-22) |
| AC-5 | Responsive rendered views and reachable controls | 320px, 375px, tablet, desktop browser audits | Automated: PASS; Manual: Pending |
| AC-6 | Mobile navigation disclosure accessibility | Keyboard/touch browser flow and rendered-markup tests | Automated: PASS; Manual: Pending |
| AC-7 | Four semantic color palettes | Preference tests, contrast audit, visual browser comparison | [ ] |
| AC-8 | Two typography systems | Font/rendering tests and viewport comparison | [ ] |
| AC-9 | Path-preserving preference switcher state | Feature query/session matrix and browser interaction flow | [ ] |

## 2. Automated Test Suite

- `tests/Feature/CrossVariantMotionTest.php`: Public-route motion-hook coverage, one-runtime guard, and reduced-motion/no-JS contracts for AC-1 through AC-3.
- `tests/Feature/ResponsiveNavigationTest.php`: Hero label removal, mobile navigation semantics, active state, and touch-target markup for AC-4 through AC-6.
- `tests/Feature/VisualPreferenceTest.php`: Palette/typeface defaults, valid/invalid query handling, session persistence, root attributes, and path/query preservation for AC-7 through AC-9.
- Existing multi-page, variant-resolution, testimonial, and consultation-form suites: rerun as regression coverage.

### Group 1 Automated Evidence — 2026-09-22

- `php artisan test --compact tests/Feature/CrossVariantMotionTest.php tests/Feature/VariantAMultiPageTest.php tests/Feature/VariantBMultiPageTest.php tests/Feature/VariantResolutionTest.php tests/Feature/TestimonialsCarouselTest.php tests/Feature/CrossVariantPolishAuditTest.php`: PASS — 38 tests, 919 assertions.
- `php artisan test --compact`: PASS — 75 tests, 1,482 assertions.
- `npm run build`: PASS.
- `npm run check:line-counts`: PASS — 261 tracked text/code files at or below 300 lines.
- `vendor/bin/pint --dirty --format agent`: PASS.
- Browser evidence is intentionally pending manual review before Group 2 begins.

### Group 2 Automated Evidence — 2026-09-22

- `php artisan test --compact tests/Feature/ResponsiveNavigationTest.php tests/Feature/VariantATest.php tests/Feature/VariantBTest.php`: PASS — 26 tests, 335 assertions.
- `php artisan test --compact`: PASS — 77 tests, 1,494 assertions.
- `npm run check:line-counts`: PASS — 265 tracked text/code files at or below 300 lines.
- `vendor/bin/pint --dirty --format agent`: PASS.
- Manual review: PASS (user, 2026-09-22).

### Group 3 Automated Evidence — 2026-09-22

- `php artisan test --compact tests/Feature/ResponsiveNavigationTest.php tests/Feature/VariantResolutionTest.php tests/Feature/VariantAMultiPageTest.php tests/Feature/VariantBMultiPageTest.php tests/Feature/TestimonialsCarouselTest.php`: PASS — 33 tests, 788 assertions.
- `php artisan test --compact`: PASS — 79 tests, 1,599 assertions.
- `npm run build`: PASS.
- `npm run check:line-counts`: PASS — 266 tracked text/code files at or below 300 lines.
- `vendor/bin/pint --dirty --format agent`: PASS.
- Browser viewport and interaction evidence is intentionally pending manual review before Group 4 begins.

### Group 3 Review Remediation — 2026-09-22

- Removed the decorative `Calm editorial foundation` page-header badge from every Variant B non-home page while preserving chapter labels and page headings.
- Reworked the narrow-screen variant switcher into compact 44px A/B controls, retaining descriptive accessible labels and full labels at `sm` and above.
- `php artisan test --compact tests/Feature/ResponsiveNavigationTest.php tests/Feature/VariantBMultiPageTest.php tests/Feature/MultiPageSharedFoundationTest.php tests/Feature/VariantResolutionTest.php`: PASS — 32 tests, 684 assertions.
- `php artisan test --compact`: PASS — 81 tests, 1,628 assertions.
- `npm run build`, `npm run check:line-counts`, and `vendor/bin/pint --dirty --format agent`: PASS.
- Updated browser/manual confirmation remains pending.

## 3. Manual Verification Checklist

1. Slowly scroll every route in both variants at desktop and mobile sizes; compare each sequence to its landing-page language and confirm once-only settling.
2. Emulate reduced motion and disable JavaScript; confirm immediate content/navigation visibility, no delayed or hidden controls, and no looping effects.
3. At 320px and 375px, open/close the primary menu with keyboard and touch, visit every primary link, use its contact CTA, and confirm no clipped header or fixed preference control.
4. Check services, team details, reviews/modal, contact form/map, FAQ, legal pages, and footer at tablet and desktop for overflow, focus visibility, and readable hierarchy.
5. Select all four palettes and both typography choices in both variants; confirm route/query persistence, selected-state clarity, readable contrast, no gradients, and stable layout.

## 4. Merge Readiness

- [ ] All four task groups in `plan.md` are complete.
- [ ] AC-1 through AC-9 pass in the matrix above.
- [ ] Focused and regression tests, production build, Pint, line-count, and whitespace checks pass.
- [ ] Browser evidence covers desktop, 320px, 375px, reduced motion, JavaScript-disabled, keyboard, and touch flows.
- [ ] No tracked file exceeds 300 lines.
