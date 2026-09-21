# Implementation Plan: Phase 6 — Cross-Variant Polish, Accessibility & Presentation Audit

## Overview & Architecture Approach

This phase executes a rigorous cross-variant audit across accessibility, reduced-motion behavior, touch targets, color contrast, responsive layout integrity, file modularity, and client presentation documentation. It verifies both Variant A (Expressive / 2D Cutout) and Variant B (Calm / Editorial) against WCAG 2.1 AA standards and the project's constitutional constraints.

## Task Groups

### Group 1: Reduced-Motion & Keyboard Accessibility Audit (AC-1, AC-4)

- [x] Task 1.1: Audit and verify strict `prefers-reduced-motion: reduce` behavior across both `/?variant=a` and `/?variant=b` using Playwright: verify instantaneous reveals, 0s transitions, disabled transforms, and disabled stagger delays.
- [x] Task 1.2: Audit keyboard navigation order (`Tab` / `Shift+Tab`) across both variants; verify visible `:focus-visible` rings on all interactive elements (buttons, links, form inputs, carousel controls, modal triggers/close, switcher tabs).
- [x] Task 1.3: Verify modal and drawer keyboard interactions: focus trapping inside open dialogs, `Escape` key dismissal, and return of focus to triggering elements.

### Group 2: Color Contrast & Touch Target Audit (AC-2, AC-3)

- [x] Task 2.1: Audit color contrast ratios across both variants (including light surfaces, stone cards, and dark contrast bands) against WCAG 2.1 AA standards (>= 4.5:1 for body/subhead text, >= 3:1 for large headlines and interactive borders/buttons).
- [x] Task 2.2: Identify and adjust any failing contrast pairings in Tailwind CSS classes or CSS primitives.
- [x] Task 2.3: Audit all interactive elements on mobile viewports (320px to 414px) to ensure touch targets meet the >= 44x44px minimum bounding box with adequate tap spacing.
- [x] Task 2.4: Apply hit-area expansion (`p-2.5`, `min-h-[44px] min-w-[44px]`) to any controls with undersized physical bounding boxes.

### Group 3: Responsive Viewport & Overflow Audit (AC-5)

- [x] Task 3.1: Audit layout rendering across 320px, 375px, 768px, 1024px, 1280px, and 1440px viewports using Playwright; verify `scrollWidth <= clientWidth` (zero horizontal overflow) on both variants.
- [x] Task 3.2: Verify responsive behavior of carousels, popovers, modals, maps, and floating switcher across small and large screens.
- [x] Task 3.3: Verify fallback behavior when JavaScript is disabled: confirm all content is immediately readable, carousels/modals degrade gracefully, and no layout shifts occur.

### Group 4: Modularity Enforcement & Client Walkthrough Documentation (AC-6, AC-7)

- [x] Task 4.1: Run `pnpm check:line-counts` across 100% of tracked text and code files in the repository; decompose any files approaching or exceeding 300 lines.
- [x] Task 4.2: Author comprehensive client presentation walkthrough documentation (`docs/client-presentation-walkthrough.md`) comparing Variant A vs Variant B design philosophies, visual hierarchies, motion profiles, and audience positioning.
- [x] Task 4.3: Implement automated feature tests (`tests/Feature/CrossVariantPolishAuditTest.php`) covering accessibility markup, contrast contracts, touch target classes, and reduced-motion styling.
