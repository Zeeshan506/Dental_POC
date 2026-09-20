# Validation & Merge Readiness: Phase 7 — Global Animation Guidance Skill

## 1. Acceptance Criteria Verification Matrix

| AC ID | Description | Verification Method | Pass / Fail |
|---|---|---|---|
| AC-1 | Globally available skill created through the correct workflow | Skill discovery and installation check | [ ] |
| AC-2 | Inspect-first project/component analysis | Dry run against a real component | [ ] |
| AC-3 | Expressive Variant A profile selection | Variant A dry run | [ ] |
| AC-4 | Calm Variant B profile selection | Variant B dry run | [ ] |
| AC-5 | Ambiguity handled without guessing | Shared/ambiguous-component dry run | [ ] |
| AC-6 | Architecture, accessibility, and QA safeguards | Skill instruction review and dry runs | [ ] |

## 2. Automated / Tool Validation

- Use the `skill-creator` workflow to author and validate the installed skill.
- Run discovery plus three representative dry runs: Variant A, Variant B, and shared/ambiguous.
- No source-code test suite is required unless the skill validation changes project source.

## 3. Manual Verification Checklist

1. Confirm Phase 4–6 are validated before creating the skill.
2. Confirm the skill is discoverable globally in a new Codex task.
3. Check that it inspects existing motion architecture before advice or edits.
4. Check the two profiles remain distinct and that ambiguity leads to a question.
5. Check that reduced motion, progressive enhancement, central ownership, and Playwright verification are never skipped.

## 4. Merge Readiness

- [ ] All Phase 7 tasks are complete.
- [ ] AC-1 through AC-6 have passing evidence.
- [ ] The global skill is discoverable and dry-run behavior is compliant.
- [ ] No unsupported project source, dependency, or documentation changes were introduced.
