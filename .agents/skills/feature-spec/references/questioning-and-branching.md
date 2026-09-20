# Decision, Branching & Inspection Protocols

This reference outlines rules for inspecting repository context, branching between existing-spec amendments and new-spec creation, formulating questions, and synchronizing `specs/roadmap.md`.

---

## 1. Inspection-First Protocol

Before making any specification changes:
1. **Examine `specs/roadmap.md`**:
   - Check Section 3 (Phase Overview) and Section 5 (Post-Initial-Testing Remediation & Defect Tracking).
   - Identify whether an existing requirement (`REQ-xxx`) or specification path covers the domain scope.
2. **Review `CHANGELOG.md` & Git History**:
   - Verify what was delivered in previous phases.
   - Confirm whether the issue is an incomplete requirement, regression, edge case, or a brand-new technical defect.
3. **Inspect Implementation Code**:
   - Inspect components, routes, data modules, styles, and utilities directly involved.
   - Do not speculate on system behavior when the code is readable.

---

## 2. Amendment vs. New-Spec Decision Matrix

| Criterion | Branch A: Existing-Spec Amendment | Branch B: New-Spec Creation |
|---|---|---|
| **Domain Scope** | Fits squarely within an existing completed phase or requirement. | Independent capability or defect not owned by an existing requirement. |
| **Target Directory** | Existing directory under `specs/`. | New dated directory `specs/YYYY-MM-DD-<name>/`. |
| **Modification Style** | Append focused criteria and new ACs. Preserve historical notes. | Scaffold full specification triad (`requirements.md`, `plan.md`, `validation.md`). |
| **Status Safeguard** | Set newly added criteria to `Implementation Status: Not Started`. | Set new spec to `Implementation Status: Not Started`. |

---

## 3. Git Branching & Specification Isolation

1. **Replanning Branch Isolation (`replanning`)**:
   - All changes to specifications (`specs/`), roadmap updates (`specs/roadmap.md`), and repository governance/rules (`.agents/`, root contracts) must be conducted on their own dedicated `replanning` branch.
   - Never mix specification or rule modifications into feature implementation branches.
2. **Feature Branches (Implementation Only)**:
   - For implementing approved specifications in source code, checkout a dedicated feature branch from stable `main`:
     ```bash
     git checkout -b feat/<feature-name>
     # or
     git checkout -b fix/<defect-name>
     ```
3. **No Build or Test Runs During Specification**:
   - While authoring specifications with this skill, modifying application source code is not an option.
   - There is NO need to run `pnpm build`, `pnpm lint`, `pnpm exec tsc --noEmit`, or any test suites.
   - Only line count checks (`pnpm check:line-counts`) and formatting hygiene (`git diff --check`) apply.
4. **Directory Naming (New Specs Only)**:
   - Pattern: `specs/YYYY-MM-DD-<feature-or-defect-name>/`
   - Example: `specs/2026-09-19-team-member-additions-grid-showcase/`

---

## 4. Roadmap Synchronization Protocol

After writing or amending specification files, immediately update `specs/roadmap.md`:
1. Locate the entry in Section 5 (`Post-Initial-Testing Remediation & Defect Tracking`) or Section 2 / 3.
2. Update the columns:
   - `Specification Path`: Clickable relative markdown link to the spec directory.
   - `Acceptance Criteria`: Specific AC identifiers (e.g. `AC-11`, `AC-1 through AC-5`).
   - `Specification Status`: Set to `Ready`.
   - `Implementation Status`: Set to `Not Started`.
   - `Validation Status`: Set to `Pending`.
3. Verify that the table remains aligned and consistent with governance rules.

---

## 5. Question Grouping & Clarification Protocols (`ask_question`)

### When `ask_question` Is Mandatory
- Unresolved product or design decisions with multiple viable approaches.
- Conflicting requirements between client feedback and existing system constraints.
- Undefined acceptance thresholds or missing mockups/specifications.

### When `ask_question` Should Be Bypassed
- When the defect report (e.g. `payroll_initial_manual_testing_issue_report.pdf`) already defines exact expected behavior.
- When existing repository architectural rules or schemas resolve the question deterministically.

### Formatting Inquiries
- Formulate questions in the user's direct first-person voice.
- Prefix recommended options with `(Recommended)`.
- Group related scope, implementation, and validation questions into a single interaction.
