# Validation & Merge Readiness: Phase 6 — Cross-Variant Polish, Accessibility & Presentation Audit

## 1. Acceptance Criteria Verification Matrix

| AC ID | Description | Verification Method | Pass / Fail |
|---|---|---|---|
| AC-1 | Strict `prefers-reduced-motion: reduce` compliance across both variants | Playwright emulation test at desktop & mobile | [ ] Pending |
| AC-2 | WCAG 2.1 AA color contrast compliance (>= 4.5:1 text, >= 3:1 UI) | Automated contrast audit / axe-core check | [ ] Pending |
| AC-3 | Mobile touch targets >= 44x44px for all interactive elements | Playwright bounding box check at 375px & 320px | [ ] Pending |
| AC-4 | Keyboard navigation and visible `:focus-visible` focus rings | Playwright tab-through navigation & screenshot check | [ ] Pending |
| AC-5 | Zero horizontal overflow across 320px to 1440px viewports | Playwright `scrollWidth <= clientWidth` assertion | [ ] Pending |
| AC-6 | 100% adherence to <= 300-line modularity constraint | `pnpm check:line-counts` script execution | [ ] Pending |
| AC-7 | Client presentation walkthrough guide authored | Review `docs/client-presentation-walkthrough.md` | [ ] Pending |

## 2. Automated Test Suite

- `tests/Feature/CrossVariantPolishAuditTest.php`: Automated Laravel feature tests validating accessible attributes, contrast contracts, touch target utility classes, and reduced-motion stylesheet rules.
- Playwright verification suite: Headless browser checks for reduced-motion timing, touch target bounding boxes, keyboard focus navigation, and horizontal scroll overflow.
- `pnpm check:line-counts`: Line count verification script ensuring zero files exceed 300 lines.

## 3. Manual Verification Checklist

1. Visit `/?variant=a` and `/?variant=b` with `prefers-reduced-motion: reduce` active: verify animations are instantaneous with zero movement or stagger.
2. Inspect color contrast across light text, dark contrast bands, and stone cards using browser DevTools color picker to confirm >= 4.5:1 ratio.
3. On a 375px mobile viewport, inspect all interactive buttons, links, carousel navigation, and switcher tabs to verify touch target bounding boxes >= 44x44px.
4. Tab through the entire page on both variants: verify every interactive element has a high-contrast `:focus-visible` ring with no focus traps.
5. Resize viewport from 320px to 1440px+: verify horizontal scrollbar never appears and content wraps cleanly.
6. Review `docs/client-presentation-walkthrough.md` to confirm thorough coverage of design principles, component comparisons, and clinical brand positioning.

## 4. Merge Readiness (Definition of Done)

- [ ] All task groups in `plan.md` marked complete.
- [ ] All ACs in `requirements.md` verified in matrix above.
- [ ] Automated tests in `tests/Feature/CrossVariantPolishAuditTest.php` pass without errors.
- [ ] Playwright accessibility, overflow, and touch-target checks pass.
- [ ] `pnpm check:line-counts` passes with zero violations.
- [ ] Client walkthrough documentation is complete and reviewed.

## 5. Validation Status Breakdown

- **Automated Tests**: Pending
- **Independent QA Audit**: Pending
- **Manual User Acceptance**: Pending
- **Overall Feature Status**: Pending
