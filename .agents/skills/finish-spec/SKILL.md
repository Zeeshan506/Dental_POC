---
name: finish-spec
description: >-
  Use this skill to finalize an implemented and verified specification. It updates feature and global specs (validation.md, roadmap.md, CHANGELOG.md), merges the feature branch into main, and pushes all changes to origin.
---

# Feature Specification Finalizer (`finish-spec`)

This skill finalizes an implemented, QA-verified specification after stakeholder or manual acceptance. It synchronizes both feature-level and global SDD specification artifacts, merges the feature branch into `main`, and pushes all changes to remote `origin`.

---

## 1. When to Use

- **Post-Acceptance Completion**: When a feature specification has been implemented, all automated tests pass, independent QA has returned `QA VERDICT: PASSED`, and the user confirms merge readiness.
- **SDD Lifecycle Closure**: To transition a feature from `Implementation: Implemented` to `Validation: Validated` across all specification artifacts and git branches.

---

## 2. Invocations & Target Resolution

The skill supports flexible invocation targets:

| Invocation Form | Target Resolution |
|---|---|
| `/finish-spec` | Resolves from current git branch (e.g. `feat/phase-0-...` maps to `specs/*phase-0*`). |
| `/finish-spec <spec-folder>` | Matches exact or partial directory under `specs/` (e.g. `/finish-spec 2026-09-20-phase-0-foundation-ia-switcher`). |
| `/finish-spec <phase-or-feature>` | Matches phase or feature title in `specs/roadmap.md` (e.g. `/finish-spec Phase 0`). |

If ambiguity exists between multiple specifications, halt and prompt for clarification.

---

## 3. Pre-Merge Verification Gate

Before executing the merge, the skill verifies that all quality gates are satisfied:

1. **Working Tree Cleanliness**: Confirm working tree has no unstaged/untracked application errors.
2. **Automated Test Baseline**: Run `php artisan test` to confirm all unit and feature tests pass.
3. **Static Analysis & Formatting**: Run `vendor/bin/pint --format agent` to verify clean PHP code style.
4. **Asset Compilation**: Run `npm run build` (or `pnpm build`) to verify frontend assets compile cleanly.
5. **Git Hygiene**: Run `git diff --check` to ensure no trailing whitespace or unresolved conflict markers exist.
6. **Explicit User Approval**: Verify that the user has explicitly requested or approved merging to `main`. Never merge autonomously without user confirmation.

---

## 4. Specification & Documentation Synchronization

Synchronize all feature-level and global specification artifacts:

### A. Feature Specification (`specs/<target-spec>/validation.md`)
- Update `Validation Status Breakdown`:
  - `Manual User Acceptance: Passed (User explicit merge instruction)`
  - `Overall Feature Status: Validated & Merged`
- Ensure all Acceptance Criteria in `Acceptance Criteria Verification Matrix` are checked (`[x] PASS`).
- Ensure all checklist items under `Merge Readiness (Definition of Done)` are checked `[x]`.

### B. Global Roadmap (`specs/roadmap.md`)
- Update the Phase/Feature overview table row:
  - Set `Validation Status: Validated`.
- Update the detailed phase/feature section header:
  - Set `Status: Specification: Ready | Implementation: Implemented | Validation: Validated`.

### C. Changelog (`CHANGELOG.md`)
- Under the corresponding version/phase release entry, document:
  - Independent QA approval verdict.
  - Validation and merge to `main`.
  - Roadmap status synchronization.

### D. Walkthrough (`.agents/walkthrough.md`)
- Document the merge completion, final commit SHAs, and branch sync status.

---

## 5. Git Merge & Remote Push Protocol

Execute the merge and push sequence strictly in order:

```bash
# 1. Commit all final spec and documentation updates on the feature branch
git add specs/ CHANGELOG.md .agents/walkthrough.md
git commit -m "docs(spec): finalize <feature-name> validation and roadmap status for merge"

# 2. Push the completed feature branch to remote origin
git push origin <feature-branch>

# 3. Checkout main and ensure it is up to date
git checkout main
git pull origin main

# 4. Merge feature branch into main with a non-fast-forward merge commit
git merge --no-ff <feature-branch> -m "feat(<scope>): merge <feature-branch> into main"

# 5. Push updated main to remote origin
git push origin main
```

---

## 6. Modularity & Guardrails

- **Strict File Modularity**: Ensure all modified or created files remain strictly under **300 lines**.
- **No Fast-Forward Merges**: Always use `--no-ff` to preserve clear branch history and auditability.
- **No Force Pushes**: Never force push to `main` or release branches.
- **Reporting**: Conclude with a structured summary reporting the merged branch, commit SHAs, updated specifications, and remote status.
