# Target Resolution & Specification Discovery

This reference defines how `/implement-spec` parses user inputs, normalizes identifiers, inspects `specs/roadmap.md`, selects implementation-ready specifications, and halts on ambiguity.

---

## 1. Supported Invocation Forms

The skill handles diverse invocation targets without requiring a single rigid syntax:

| Invocation Pattern | Target Type | Example | Resolution Target |
|---|---|---|---|
| `/implement-spec MT-005` | MT Issue ID | Defect / manual testing issue | Resolved via Section 5 of [roadmap.md](file:///home/zeshan6a/Projects/Payrol/specs/roadmap.md) to linked spec directory and ACs. |
| `/implement-spec REQ-024` | Requirement ID | Canonical roadmap requirement | Resolved via Section 2 or 3 of [roadmap.md](file:///home/zeshan6a/Projects/Payrol/specs/roadmap.md). |
| `/implement-spec loan-catalog-integrity` | Feature Slug / Name | Explicit feature moniker | Matches folder name under `specs/` or feature title in [roadmap.md](file:///home/zeshan6a/Projects/Payrol/specs/roadmap.md). |
| `/implement-spec reports-statutory` | Partial Directory Name | Substring of spec directory | Matched against directories in `specs/`. |
| `/implement-spec Reports Hub Modernization` | Roadmap Feature Title | Human-readable roadmap title | Matches feature title in [roadmap.md](file:///home/zeshan6a/Projects/Payrol/specs/roadmap.md). |
| `/implement-spec` | No argument | Automated discovery | Automatically selects the highest-priority unresolved, ready spec. |

---

## 2. Identifier Normalization Rules

Users often supply shorthand identifiers. Normalize obvious forms before resolution:

- **Shorthand MT IDs**: `MT-5` or `MT-05` → Normalize to `MT-005`.
- **Shorthand REQ IDs**: `REQ-6` or `REQ-06` → Normalize to `REQ-006`.
- **Case Insensitivity**: `mt-004` → `MT-004`, `req-024` → `REQ-024`.
- **Normalization Precondition**: Only normalize when an unambiguous roadmap or specification entry exists.

---

## 3. Ambiguity & Conflict Protocol

- **Never Guess**: If an invocation matches multiple candidate requirements or specification paths, the agent **MUST NOT GUESS**.
- **Ambiguity Halt**:
  1. Halt execution immediately without editing code or switching branches.
  2. Output a structured ambiguity report listing every matching candidate (ID, Title, Specification Path, Status).
  3. Prompt the user to clarify the intended target using an exact identifier.

---

## 4. Resolution Workflow When Target Is Supplied

1. **Read Roadmap**: Ingest [specs/roadmap.md](file:///home/zeshan6a/Projects/Payrol/specs/roadmap.md).
2. **Locate Target Entry**:
   - For `MT-xxx`: Inspect Section 5 (`Post-Initial-Testing Remediation & Defect Tracking`) and Section 3 mappings.
   - For `REQ-xxx`: Inspect Section 2 (`Requirement Traceability Matrix`) and Section 3.
   - For feature slugs: Match against table titles and specification links.
3. **Resolve Specification Directory**:
   - Extract the linked directory path under `specs/` (e.g. `specs/2026-09-09-reports-statutory-payroll-history/`).
   - Extract the specific Acceptance Criteria assigned to this issue (e.g. `AC-11` for `MT-005`).
4. **Read Specification Triad**:
   - [requirements.md](file:///home/zeshan6a/Projects/Payrol/specs/requirements.md): Scope, in-scope additions, non-goals, acceptance criteria.
   - [plan.md](file:///home/zeshan6a/Projects/Payrol/specs/plan.md): Planned task groups, code changes, and test steps.
   - [validation.md](file:///home/zeshan6a/Projects/Payrol/specs/validation.md): Verification matrix, test suite mappings, manual checks.
5. **Read Historical Context**:
   - Ingest [CHANGELOG.md](file:///home/zeshan6a/Projects/Payrol/CHANGELOG.md) to understand past decisions and avoid regressing previously accepted behaviors.
6. **Inspect Current Codebase Baseline on `main`**:
   - Inspect controllers, services, models, Blade templates, and existing tests on `main`.

> [!IMPORTANT]
> **Existing Remediation Mapping Guardrail**: For the remediation workflow, `/implement-spec MT-005` **MUST** resolve `MT-005` to its existing Reports Hub specification directory (`specs/2026-09-09-reports-statutory-payroll-history/`) and its specific AC mappings. It must never create a redundant or duplicate specification.

---

## 5. Automated Discovery Workflow When No Target Is Supplied

When invoked as `/implement-spec` without arguments, select the target deterministically:

1. **Read [specs/roadmap.md](file:///home/zeshan6a/Projects/Payrol/specs/roadmap.md)**:
   - Check Section 5 (Remediation items) following execution priority order (`MT-006 → MT-001 → MT-002 → MT-004 → MT-005 → MT-003`).
   - Then check Section 3 (Roadmap phases).
2. **Selection Criteria**:
   - Select the highest-priority entry meeting both conditions:
     - `Specification Status == Ready`
     - `Implementation Status == Not Started`
3. **Fallback to `specs/` Directory**:
   - If roadmap ordering is unavailable or inconclusive, inspect `specs/` and pick the most recently created specification folder whose implementation tasks in `plan.md` are incomplete.
4. **Strict Exclusions — Never Select**:
   - Features marked `Implementation Status: Implemented` or `Complete`.
   - Features marked `Validation Status: Validated`.
   - Features explicitly marked `On Hold` or `Deferred`.
   - Features requiring client clarification (`Specification Status != Ready`).
   - Features whose implementation already exists, unless the invocation explicitly requests reimplementation/review.
