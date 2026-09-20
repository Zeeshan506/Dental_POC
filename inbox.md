# Project Feature & Task Inbox

## Instructions & Operating Rules

This inbox serves as the central staging area for all incoming feature requests, design enhancements, bug reports, and user ideas before they enter the Spec-Driven Development (SDD) lifecycle.

### 1. Intake & Entry Rules
- Add new requests, feedback, or backlog ideas under **📥 Unprocessed Items** using the standard entry template.
- Keep entries concise, focused, and actionable.
- Ensure every text or markdown file, including this inbox, strictly adheres to the repository **<= 300 lines** cap.

### 2. Review & Cross-Referencing
- Before acting on any item, cross-reference it against existing specifications in `specs/` (`specs/mission.md`, `specs/tech-stack.md`, `specs/roadmap.md`, and phase specs).
- If a request already exists, overlaps, or conflicts with established patterns or architectural constraints, halt and ask the user for clarification before proceeding.

### 3. Promotion to Specification
- Do **not** write production code directly from inbox items.
- Incorporate approved inbox items into formal specifications (`specs/<phase-or-feature>/`) and roadmap milestones (`specs/roadmap.md`) on a dedicated `replanning` branch using the `feature-spec` skill.

### 4. Lifecycle Removal (Definition of Cleared)
- When an inbox item has been formally incorporated into a specification, implemented, verified by QA, and merged to `main`, remove the corresponding entry from this file to keep the inbox lean and actionable.

---

## Standard Entry Template

When adding an item, use the following format:

```markdown
### [ITEM-ID] Short Descriptive Title
- **Date Added**: YYYY-MM-DD
- **Category**: [Feature | Enhancement | Bugfix | Design Polish | Performance]
- **Target Scope**: [Shared | Variant A | Variant B | Infrastructure]
- **Description**: Concise summary of what is requested and why.
- **Acceptance Signals**: Key indicators or criteria defining completion.
- **Reference / Context**: Relevant URLs, user quotes, or file links.
```

---

## 📥 Unprocessed Items

*No unprocessed items currently. New requests and ideas should be added here.*

---

## 📋 Staged for Specification

*Items reviewed and ready to be incorporated into roadmap phases on the `replanning` branch.*
