---
trigger: always_on
---

## Executive Summary

The current implementation cycle focuses on establishing Spec-Driven Development (SDD) architecture for StackSmith Labs.
This entails:
1. Creating the repository constitution in `specs/` (`specs/mission.md`, `specs/tech-stack.md`, `specs/roadmap.md`).
2. Defining clear architectural boundaries, modularity constraints, and verified domain concepts.
3. Structuring roadmap phases for subsequent feature specifications (portfolio showcases, studio service taxonomy, enquiry workflows, and performance audits).

## Implementation Rule

Do not add ad-hoc or unverified features. Every feature or major enhancement must originate from a verified spec under `specs/`, adhere to the 300-line modularity rule, and validate against type checks, linting, and line-count audits.
