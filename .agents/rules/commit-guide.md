---
trigger: always_on
---

## Branching Strategy
- Replanning Branch (`replanning`): Any changes to specifications (`specs/`) or repository rules/skills (`.agents/`, `AGENTS.md`) must not be associated with any feature branch. They must be executed on their own dedicated `replanning` branch and pushed to remote.
- Feature Branches (`feat/`, `fix/`, `chore/`, `refactor/`): Created from the latest stable `main` strictly for implementing verified specifications. Immediately push the branch to remote under the same name. Implement only the scoped task without mixing unrelated changes.

## Validation Before Committing
- For code implementation tasks: Ensure all project validations pass before committing:
  - `pnpm check:line-counts` (strictly <= 300 lines per file)
  - `pnpm lint`
  - `pnpm exec tsc --noEmit`
  - `pnpm build` (when network/external fonts allow)
  - `git diff --check`
- For specification authoring (`feature-spec`) & repo rules: Modifying application source code is not an option during feature specing; there is no need to run builds, linters, type checks, or test suites unless source code is changed. Only `pnpm check:line-counts` and `git diff --check` are required before committing.

## Commit & Push
Commit with a descriptive message adhering to conventional commit style.
Push the branch to remote. Do not merge to `main` without explicit user confirmation in a message.
Document the branch name, commit hash, changed files, test results, and notes in `.agents/walkthrough.md`.