---
name: implement-spec
description: >-
  Use this skill to take an already-prepared specification, implement it completely, and invoke an independent QA investigator to audit the implementation against its source requirements. It resolves target specs (MT issues, REQ IDs, feature slugs), executes pre-implementation audits, enforces isolated branch workflows, writes focused code and regression tests, executes mandatory QA investigator remediation loops, updates SDD lifecycle states, and prepares code for manual acceptance without merging.
---

# Feature Specification Implementer (`implement-spec`)

This skill takes an approved, implementation-ready specification and executes it to completion. It handles deterministic target resolution, pre-implementation auditing, focused implementation and regression testing, mandatory independent QA auditing with a defect remediation loop, and SDD lifecycle status synchronization.

The skill **never creates requirements from scratch** and **never invents product scope**. Its primary pipeline is:

```
Resolve Target ──► Read Source Spec ──► Implement Code ──► Test & Verify ──► Independent QA ──► Remediate Findings ──► Prepare Acceptance
```

---

## 1. Invocation & Target Resolution

The skill supports diverse invocation inputs and normalizes shorthand identifiers:

| Invocation Form | Target Type | Action & Routing |
|---|---|---|
| `/implement-spec MT-005`<br>*(or `MT-5`, `MT-05`)* | MT Defect / Issue ID | Normalizes shorthand IDs. Resolves issue in [specs/roadmap.md](file:///home/zeshan6a/Projects/Payrol/specs/roadmap.md) Section 5 to linked spec directory and assigned Acceptance Criteria. |
| `/implement-spec REQ-024` | Roadmap Requirement | Resolves canonical requirement in [specs/roadmap.md](file:///home/zeshan6a/Projects/Payrol/specs/roadmap.md) Section 2 or 3. |
| `/implement-spec loan-catalog-integrity` | Feature Slug / Name | Matches spec directory name or feature title. |
| `/implement-spec reports-statutory` | Partial Directory Name | Matches unique substring under `specs/`. |
| `/implement-spec` | Automated Discovery | Selects highest-priority roadmap item with `Specification Status: Ready` and `Implementation Status: Not Started`. |

- **Ambiguity Guard**: If an invocation matches multiple candidate requirements or directories, do not guess. Halt and report all matching candidates.
- **Remediation Mapping Guard**: For the active remediation workflow, `/implement-spec MT-005` resolves `MT-005` to its existing Reports Hub specification (`specs/2026-09-09-reports-statutory-payroll-history/`) and AC mappings rather than creating a new specification.
- *Full target resolution rules: [references/target-resolution.md](./references/target-resolution.md)*

---

## 2. Source-of-Truth Hierarchy & Pre-Implementation Audit

Requirements are evaluated using a strict four-tier hierarchy:
1. **Priority 1 — Explicitly Attached Resources**: Client PDFs (`payroll_initial_manual_testing_issue_report.pdf`, `Payroll_Client_Changes_Audit_and_Manual_Test_Guide.pdf`), issue reports, screenshots, acceptance notes.
2. **Priority 2 — Existing Specification**: `requirements.md`, `plan.md`, `validation.md` under the resolved spec directory.
3. **Priority 3 — Roadmap Metadata**: Mappings, ACs, execution priority in [specs/roadmap.md](file:///home/zeshan6a/Projects/Payrol/specs/roadmap.md).
4. **Priority 4 — History & Existing Code**: [CHANGELOG.md](file:///home/zeshan6a/Projects/Payrol/CHANGELOG.md), established architecture, and existing test suites.

> [!CAUTION]
> **Source Conflict Halt**: If an attached client resource materially contradicts the specification, **do not guess**. Halt execution immediately and report `SOURCE CONFLICT — specification requires clarification` with the exact conflicting clauses.

### Pre-Implementation Audit & Branching:
- Audit base state on `main` and verify existing test baseline.
- Identify protected behaviors, multi-tenant scopes, and role permissions.
- Create dedicated branch: `git checkout -b fix/<issue-or-feature-name>`.
- **Never implement directly on `main`**. **Never merge to `main`**.
- *Full hierarchy & audit details: [references/source-priority-and-pre-audit.md](./references/source-priority-and-pre-audit.md)*

---

## 3. Implementation Rules & Automated Regression Coverage

- **Scope Boundary**: Implement strictly what the resolved specification and attached resources require. Avoid unrelated refactoring or speculative cleanups.
- **Strict Database Rule**: Strictly forbidden from independently creating or executing schema changes or migrations. If an alteration is required, halt and request human approval. Forward migrations only.
- **Modularity Cap**: Every file written or edited must stay strictly under **300 lines** (max 450 lines).
- **Regression Coverage**:
  - Add missing regression tests for every target Acceptance Criterion.
  - Reproduce actual failure paths; prefer browser/request integration tests for UI workflows.
  - Run focused tests, affected feature suites, multi-tenant/auth tests, and static/formatting checks.
  - Record exact test counts, assertion counts, pass/fail status, and commands.

---

## 4. Mandatory Independent QA Investigator & Remediation Loop

After implementation and local tests pass, spawn an isolated subagent via `invoke_subagent` to act as an independent QA investigator.

```
Implementation & Tests Passed ──► Spawn Independent QA ──► Findings? ──► NO ──► Advance to SDD Status
                                         ▲                     │
                                         │                    YES
                                         └── Fix & Re-test ────┘
```

- **Independent Inspection**: The investigator does not trust the implementation summary. It independently inspects diffs, source requirements, tenant boundaries, and runs test suites.
- **QA Verdicts**:
  - `QA VERDICT: PASSED`: Explicit evidence cited for every Acceptance Criterion.
  - `QA VERDICT: FAILED`: Concrete findings list with severity, affected AC, file/path, expected vs observed behavior, and required correction.
- **Mandatory Remediation Loop**:
  - Independent QA is **not advisory**. All confirmed defects must be fixed on the feature branch.
  - Add/strengthen regression tests for each defect.
  - Re-run test suites and commit fixes.
  - Spawn a fresh independent QA investigator with remediation history.
  - **Success Condition**: A feature is not complete until a fresh independent QA investigator returns `QA VERDICT: PASSED`.
- *Full QA protocol and handoff schemas: [references/qa-investigator-protocol.md](./references/qa-investigator-protocol.md)*

---

## 5. SDD Lifecycle Synchronization, Branching & Reporting

Once independent QA passes:
1. **SDD Lifecycle Updates**:
   - [specs/roadmap.md](file:///home/zeshan6a/Projects/Payrol/specs/roadmap.md): `Specification: Ready`, `Implementation: Implemented`, `Validation: Pending` *(unless manual testing passed)*.
   - `validation.md`: Record `Automated: PASS`, `Independent QA: PASS`, `Manual: Pending`.
   - **Never mark `Validated`** based solely on automated tests or QA subagent approval.
2. **Commit & Remote Push**:
   - Commit code, tests, and spec updates.
   - Push branch to remote under the same name: `git push origin fix/<name>`.
   - **Do not merge to `main`**.
3. **Structured Completion Report**: Output concise report covering Target, Implementation, Automated Verification, Independent QA & Remediation History, SDD Status, and Next Action (`READY FOR MANUAL ACCEPTANCE — DO NOT MERGE YET` or `IMPLEMENTATION AND VALIDATION COMPLETE — READY FOR MERGE APPROVAL`).
- *Full reporting templates: [references/lifecycle-and-reporting.md](./references/lifecycle-and-reporting.md)*

---

## 6. Separation of Responsibilities

- **`/feature-spec`** owns: Requirements authoring, scope definition, task planning, validation design, specification amendments.
- **`/implement-spec`** owns: Resolving existing specs, writing code & regression tests, running automated checks, spawning independent QA, remediating QA findings, updating implementation lifecycle.

---

## References
- [Target Resolution & Specification Discovery](./references/target-resolution.md)
- [Source Priority, Pre-Implementation Audit & Guardrails](./references/source-priority-and-pre-audit.md)
- [Independent QA Investigator & Remediation Protocol](./references/qa-investigator-protocol.md)
- [SDD Lifecycle, Git Protocol & Completion Reporting](./references/lifecycle-and-reporting.md)
