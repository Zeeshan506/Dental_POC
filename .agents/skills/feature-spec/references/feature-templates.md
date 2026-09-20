# Feature Specification Templates & Amendment Format

This reference contains standard templates for new specifications and formatting patterns for amending existing specifications.

---

## 1. `requirements.md` Template (New Spec)

```markdown
# Feature Requirements: [Feature Name]

## 1. Context & Business Intent
<!-- Connect this feature to specs/mission.md. Why are we building this now? -->

## 2. Scope
### In-Scope
- [ ] Requirement 1: ...
- [ ] Requirement 2: ...

### Out-of-Scope (Non-Goals)
- Non-goal 1: ...

## 3. Constraints & Dependencies
<!-- Specific constraints from specs/tech-stack.md, existing code, or external APIs. -->

## 4. Acceptance Criteria
- [ ] **AC-1**: Given [context], when [action], then [expected result].
- [ ] **AC-2**: Given [context], when [action], then [expected result].

## 5. Edge Cases & Error Handling
```

---

## 2. `plan.md` Template (New Spec)

```markdown
# Implementation Plan: [Feature Name]

## Overview & Architecture Approach

## Task Groups

### Group 1: Data Model & Schema (or Foundation)
- [ ] Task 1.1: Define schema / types.
- [ ] Task 1.2: Implement database migrations / repository methods.

### Group 2: Business Logic & Core Services
- [ ] Task 2.1: Implement domain services and validation rules.
- [ ] Task 2.2: Add unit tests for business logic.

### Group 3: API & User Interface
- [ ] Task 3.1: Build API endpoints / route handlers.
- [ ] Task 3.2: Implement frontend components / views.

### Group 4: Integration & Automated Testing
- [ ] Task 4.1: Add end-to-end or integration tests mapping to ACs.
- [ ] Task 4.2: Verify modularity constraints (files <= 300 lines).
```

---

## 3. `validation.md` Template (New Spec)

```markdown
# Validation & Merge Readiness: [Feature Name]

## 1. Acceptance Criteria Verification Matrix

| AC ID | Description | Verification Method | Pass / Fail |
|---|---|---|---|
| AC-1 | ... | Automated Test / Manual Check | [ ] |
| AC-2 | ... | Automated Test / Manual Check | [ ] |

## 2. Automated Test Suite
- `path/to/test_file`: Tests AC-1 and AC-2.

## 3. Manual Verification Checklist
1. Step 1: ...
2. Step 2: ...

## 4. Merge Readiness (Definition of Done)
- [ ] All task groups in `plan.md` marked complete.
- [ ] All ACs in `requirements.md` verified in matrix above.
- [ ] Automated tests pass without errors.
- [ ] No file exceeds 300 lines limit.
```

---

## 4. Existing-Specification Amendment Format (Branch A)

When amending an existing specification directory (e.g. for `MT-001`, `MT-003`, `MT-004`, `MT-005`, `MT-006`), **never overwrite** existing sections. Instead, append a clearly demarcated remediation block:

### A. In `requirements.md`:
```markdown
## Remediation Additions (MT-xxx: Short Title)

### Context & Defect Analysis
<!-- Brief explanation of the gap discovered in manual testing -->

### In-Scope Remediation
- [ ] Scope Item 1...

### Out-of-Scope Remediation
- Non-goal...

### New Acceptance Criteria
- [ ] **AC-N**: Given [context], when [action], then [expected result].
```

### B. In `plan.md`:
```markdown
### Group N: Remediation Tasks (MT-xxx)
- [ ] Task N.1: Specific code fix / view adjustment.
- [ ] Task N.2: Verification test addition.
```

### C. In `validation.md`:
Append new rows to the existing `Acceptance Criteria Verification Matrix`:
```markdown
| AC-N | [Remediation Description] | [Test / Manual Check] | [ ] |
```
And append any new test suites or manual verification steps under dedicated subheadings.
Existing completed tasks and ACs remain checked `[x]`, while new remediation items start unchecked `[ ]`.
