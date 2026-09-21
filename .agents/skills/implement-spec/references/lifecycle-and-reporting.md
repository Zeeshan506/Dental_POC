# SDD Lifecycle, Git Protocol & Completion Reporting

This reference defines how `/implement-spec` synchronizes specification lifecycle statuses, enforces git pushing and non-merging rules, and formats final handoff reports.

---

## 1. SDD Lifecycle State Machine

After implementation is complete and independent QA returns `QA VERDICT: PASSED`, synchronize lifecycle statuses in both [specs/roadmap.md](file:///home/zeshan6a/Projects/Payrol/specs/roadmap.md) and the feature's `validation.md`:

| Attribute | Valid State | State Meaning & Governance |
|---|---|---|
| **Specification Status** | `Ready` | Contract is formally defined and locked. |
| **Implementation Status** | `Implemented` | Code implemented, regressions passing, and independent QA passed. |
| **Validation Status** | `Pending` *(default)*<br>`Validated` *(only after manual check)* | Automated & Independent QA passing does **not** equal manual acceptance. If manual testing is required and unperformed, keep `Pending`. |

### Status Sync in `validation.md`
Update the feature's `validation.md` status block:
```markdown
## Validation Status Breakdown
- **Automated Tests**: PASS
- **Independent QA Audit**: PASS
- **Manual User Acceptance**: Pending (Requires manual test verification)
- **Overall Feature Status**: Implemented (Pending Acceptance)
```

> [!CAUTION]
> **Strict Validation Guardrail**: **NEVER** mark a feature `Validated` simply because automated tests pass, an implementation commit exists, or the independent QA investigator passed. Only mark `Validated` after explicit manual verification has passed or when the specification is strictly automated-only.

---

## 2. Git Commit, Remote Push & Non-Merging Rules

1. **Commit All Changes**:
   - Include application code, regression tests, and spec updates (`roadmap.md`, `validation.md`).
   - Use a clear, conventional commit message citing the target ID and purpose:
     ```bash
     git commit -m "fix(reports): resolve MT-005 employee gross discrepancy and add regression suite"
     ```
2. **Push Dedicated Branch**:
   - Push to remote under the exact same branch name:
     ```bash
     git push origin fix/<issue-or-feature-name>
     ```
3. **Branch Delta Tracking**:
   - Record the full commit SHA and inspect ahead/behind commits:
     ```bash
     git rev-parse HEAD
     git rev-list --left-right --count main...HEAD
     ```
4. **Absolute Non-Merging Guardrail**:
   - **NEVER MERGE TO `main`**. Merging is strictly reserved for human stakeholders after acceptance.

---

## 3. Standard Completion Report Template

Every successful `/implement-spec` run must finish with this structured report:

```markdown
## Target
- **Identifier**: [e.g. MT-005 / REQ-024 / reports-statutory]
- **Specification Directory**: [file:///home/zeshan6a/Projects/Payrol/specs/.../]
- **Acceptance Criteria**: [AC-1, AC-2, ...]

## Implementation
- **Branch**: [fix/<branch-name>]
- **Commit SHA**: [Full 40-char SHA]
- **Ahead / Behind**: [e.g. 1 ahead, 0 behind main]
- **Materially Changed Files**:
  - `app/Services/...`
  - `tests/Feature/...`
- **Summary of Changes**: [Concise 2-3 sentence overview of implementation]

## Automated Verification
- **Test Commands**: `php artisan test --filter=...`
- **Results**: [X tests, Y assertions passed, 0 failures]
- **Protected Regression Suites**: [List suites executed without regressions]
- **Static Quality & Formatting**: [PSR-12 / Pint / Lint status]

## Independent QA Investigator
- **Final Verdict**: `QA VERDICT: PASSED`
- **QA Audit Scope**: [Initial comprehensive audit / targeted remediation audit for QA-F1, QA-F2]
- **QA Remediation History**:
  | Finding ID | Severity | Description | Action Taken | Rerun Verdict |
  |---|---|---|---|---|
  | QA-F1 | High | Missing null-check in export | Added null-safe check + test | PASSED |
- **AC Verification Evidence**: [Short mapping showing proof for each AC]

## SDD Lifecycle Status
- **Specification Status**: Ready
- **Implementation Status**: Implemented
- **Automated QA Status**: PASS
- **Manual Validation Status**: [Pending / Validated]

## Next Action
[State exactly one of the following two notices:]

READY FOR MANUAL ACCEPTANCE — DO NOT MERGE YET
<!-- OR, if specification has zero manual validation requirements: -->
IMPLEMENTATION AND VALIDATION COMPLETE — READY FOR MERGE APPROVAL
```

---

## 4. Separation of Responsibilities

| Skill | Primary Responsibilities & Scope | Prohibited Actions |
|---|---|---|
| **`/feature-spec`** | Requirements authoring, scope definition, planning task groups, validation matrices, spec amendments. | Writing implementation code, editing application PHP files, running feature fixes. |
| **`/implement-spec`** | Resolving existing specs, writing application code, regression tests, running automated checks, spawning independent QA, remediating QA findings, pushing branches. | Silently inventing new product requirements, redefining out-of-scope behaviors, altering DB schema without approval. |

If `/implement-spec` uncovers missing product intent or architectural contradiction, return the issue to `/feature-spec` or halt for clarification.
