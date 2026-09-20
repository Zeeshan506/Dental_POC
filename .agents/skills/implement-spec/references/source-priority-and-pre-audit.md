# Source Priority, Pre-Implementation Audit & Guardrails

This reference defines the strict source-of-truth priority hierarchy, pre-implementation audit steps, branching protocols, and backend engineering guardrails for `/implement-spec`.

---

## 1. Source-of-Truth Hierarchy

When implementing behavior, determine exact requirements using the following strict hierarchy:

| Priority | Artifact / Source Type | Role & Authority | Handling Directives |
|---|---|---|---|
| **Priority 1** | **Explicitly Attached Resources** | Primary evidence of actual user/client intent | Includes client PDFs (e.g. `payroll_initial_manual_testing_issue_report.pdf`, `Payroll_Client_Changes_Audit_and_Manual_Test_Guide.pdf`), manual issue reports, screenshots, acceptance notes. Do not silently reinterpret or expand requirements beyond what these resources specify. |
| **Priority 2** | **Existing Specification** | Formal requirements contract | Consists of `requirements.md`, `plan.md`, and `validation.md` in the resolved feature directory. Defines ACs, architectural approach, and verification matrix. |
| **Priority 3** | **Roadmap Metadata** | System alignment & ordering | [specs/roadmap.md](file:///home/zeshan6a/Projects/Payrol/specs/roadmap.md) provides cross-issue mappings, AC allocations, execution priority, and status indicators. |
| **Priority 4** | **History & Existing Code** | Baseline regression protection | [CHANGELOG.md](file:///home/zeshan6a/Projects/Payrol/CHANGELOG.md), established code architecture, and regression tests. Use these to protect already delivered functionality. |

---

## 2. Handling Material Contradictions (Stop Gate)

If a material contradiction exists between an attached client resource (Priority 1) and the existing specification (Priority 2), **DO NOT GUESS OR ARBITRATE**.

1. Halt implementation immediately.
2. Output a structured conflict notification:
   ```markdown
   SOURCE CONFLICT — specification requires clarification

   - Conflicting Target: [MT-xxx / REQ-xxx]
   - Source 1 (Attached Resource): [Quote exact clause / screenshot reference]
   - Source 2 (Specification Artifact): [Quote exact AC / requirement line]
   - Conflict Summary: [Explain why these two requirements cannot both be satisfied]
   ```
3. Await explicit human or product clarification before writing code.

---

## 3. Pre-Implementation Audit

Before authoring code or creating tests, complete this audit:

1. **Verify Base State**:
   - Confirm local `main` is up to date with remote tracking: `git status`, `git pull origin main`.
   - Confirm `main` contains all previously merged work required by the roadmap.
2. **Inspect Application Code Paths**:
   - Trace controllers, form requests, Eloquent models, services, and Blade views touched by the resolved specification.
3. **Audit Existing Test Suites**:
   - Run existing feature and unit tests to ensure a green starting baseline.
4. **Map Protected Behaviors**:
   - Identify adjacent behaviors, multi-tenant scopes, and role permissions that must not regress.
5. **AC Gap Analysis**:
   - Evaluate the current codebase against each Acceptance Criterion (`AC-1` to `AC-N`) to identify what is missing or broken.

---

## 4. Branching Protocols

- **Branch Name Format**:
  ```bash
  git checkout -b fix/<issue-or-feature-name>
  ```
  *(e.g., `git checkout -b fix/mt-005-reports-hub` or `git checkout -b fix/loan-catalog-integrity`)*.
- **Dedicated Branching**: Every fix or feature must reside on its own dedicated branch branched from latest stable `main`.
- **Absolute Branching Guardrails**:
  - **NEVER** implement directly on `main`.
  - **NEVER** merge directly into `main`. Merges are reserved for explicit approval after all quality and acceptance gates pass.

---

## 5. Engineering & Modularity Guardrails

- **Strict Database Rule**: You are strictly forbidden from independently executing or generating major database schema changes, migrations, or destructive database operations. If an alteration is strictly necessary, halt execution, explain the need, and request explicit human approval before proceeding. Only forward migrations are permitted once approved.
- **Tenant Isolation**: Multi-tenant data structures, foreign tenant keys, and query scopes must never leak across tenant boundaries.
- **Authorization Boundaries**: Preserve role checks and privacy boundaries (e.g. HR salary privacy, reopen authorizations).
- **Modularity Constraint**: No file written or edited may exceed **300 lines** (absolute maximum 450 lines). If logic grows, modularize into dedicated action classes, sub-services, or view components.
- **Legacy Desktop UI Paradigms**: All Blade components and UI modifications must match existing desktop application layout conventions.
- **Plan Integrity**: Complete all applicable tasks in `plan.md`. If the plan is found to be technically impossible or incorrect, stop and report the conflict rather than silently altering requirements.
