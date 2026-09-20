---
trigger: always_on
---

Strict file size constraint: Ensure no tracked text or code file exceeds the 300-line maximum cap.
If a component, module, or data manifest approaches this threshold, decompose it into smaller, cohesive modules with descriptive naming conventions.
This rule is strictly enforced by `pnpm check:line-counts` (`scripts/check-line-counts.mjs`).