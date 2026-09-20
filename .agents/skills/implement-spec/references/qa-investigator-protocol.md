# Independent QA Investigator & Remediation Protocol

This reference governs the mandatory Independent QA Investigator subagent, its briefing protocol, verification criteria, structured verdict output, and the cyclic QA remediation loop.

---

## 1. Independence Principle & Role Separation

- **Strict Independence**: The QA investigator must be spawned as an isolated subagent using `invoke_subagent`. It must never operate as a mere continuation of the implementation agent's reasoning.
- **Direct Repository Inspection**: The investigator must not accept the implementation agent's summaries or claims. It must independently inspect git diffs, codebase files, test suites, and source resources.

---

## 2. Investigator Briefing Payload

When invoking the independent QA investigator, pass a complete briefing:

```markdown
### QA Investigation Request
- Target Identifier: [MT-xxx / REQ-xxx / Feature Name]
- Feature Branch: [fix/...]
- Base Branch / Commit: [main / commit SHA]
- Head Commit / Diff: [git diff main...HEAD]
- Primary Attached Resources: [File paths to client PDFs, issue reports, screenshots]
- Resolved Specification Directory: [specs/YYYY-MM-DD-.../]
- Roadmap Entry: [Section & Title in specs/roadmap.md]
- Target Acceptance Criteria: [List of AC-1 through AC-N]
- Implementation Agent Test Summary: [Commands executed, pass/fail counts]
```

---

## 3. Independent QA Audit Checklist

The QA investigator executes the following inspections:

1. **Source Requirements Ingestion**: Read the attached client resources (Priority 1) and specification files (`requirements.md`, `plan.md`, `validation.md`) directly.
2. **Diff & Scope Inspection**: Inspect the full branch diff (`git diff main...HEAD`). Ensure every modified file is strictly relevant. Detect and flag unrelated refactoring or speculative edits.
3. **Acceptance Criteria Verification**: Verify that every target AC is implemented in code and backed by focused regression tests.
4. **Edge Case & Failure Path Scrutiny**: Verify boundary handling, nullability, missing records, zero totals, and unexpected payloads.
5. **Security & Tenant Isolation**: Verify Eloquent query scopes, foreign key checks, and authorization rules (e.g. HR privacy, reopen gates).
6. **UI / Contract Consistency**: Verify that Blade templates, form submissions, and API contracts match desktop layout conventions and spec expectations.
7. **Test Genuineness**: Scrutinize test assertions. Ensure tests genuinely reproduce the user failure scenario and cannot pass trivially or tautologically.
8. **Engineering & Modularity Compliance**: Verify no file exceeds the **300-line** modularity constraint (strict cap 450 lines).

---

## 4. Structured Verdict Schema

The QA investigator must conclude with either `QA VERDICT: PASSED` or `QA VERDICT: FAILED`.

### Format for `QA VERDICT: PASSED`
```markdown
# QA VERDICT: PASSED

## Acceptance Criteria Evidence
- **AC-1**: [Evidence - cited files, line numbers, test methods]
- **AC-2**: [Evidence - cited files, line numbers, test methods]

## Security & Tenant Boundary Check
- [Evidence of isolation and authorization checks]

## Automated Test Verification
- Executed / Verified: [Test count, assertions, duration]
- Regression Suite Status: [Clean pass]
```

### Format for `QA VERDICT: FAILED`
```markdown
# QA VERDICT: FAILED

## Summary of Findings
Found [N] defect(s) preventing acceptance.

### Finding 1
- **Severity**: [Critical / High / Medium / Low]
- **Affected AC**: [AC-X]
- **Affected File / Code Path**: [file_path:line_number]
- **Expected Behavior**: [What should happen based on spec & attached resources]
- **Observed Problem**: [What the code or test actually does]
- **Required Correction**: [Exact corrective action needed]
```

---

## 5. Mandatory QA Failure & Remediation Loop

The independent QA report is **not advisory**. All findings must be addressed:

```
┌────────────────────────┐
│ Implementation & Tests │
└───────────┬────────────┘
            │
            ▼
┌────────────────────────┐
│ Independent QA Review  │◄─────────────────────────┐
└───────────┬────────────┘                          │
            │                                       │
     Verdict PASSED?                                │
      ├── YES ──► Advance to SDD Lifecycle          │
      └── NO                                        │
           │                                        │
           ▼                                        │
┌────────────────────────┐                          │
│ Parse & Remediate Each │                          │
│ Finding on Feature Br. │                          │
└───────────┬────────────┘                          │
            │                                       │
            ▼                                       │
┌────────────────────────┐                          │
│ Strengthen Regressions │                          │
│ Re-test & Commit       │──────────────────────────┘
└────────────────────────┘ (Fresh Independent QA Subagent)
```

### Main Agent Remediation Directives:
1. **Parse Findings Individually**: Map every finding to its severity, affected AC, file path, and required correction.
2. **Direct Code Inspection**: Inspect the referenced implementation directly rather than accepting QA text blindly.
3. **Apply Corrections**: Fix the confirmed defects directly on the dedicated feature branch.
4. **Strengthen Regression Coverage**: Add or update automated regression tests specifically reproducing the failure path identified by QA.
5. **Re-run Test Suites**: Run focused tests and affected regression suites.
6. **Commit Fixes**: Author a descriptive remediation commit on the feature branch.
7. **Spawn Fresh Independent QA**: Invoke a new independent QA investigator. Pass the remediation history, new commit diff, and updated tests.

### Prohibitions:
- **DO NOT** ignore a finding because local tests pass.
- **DO NOT** merely document a defect without fixing it.
- **DO NOT** dismiss a finding without hard repository evidence.
- **DO NOT** ask the same investigator subagent to reconsider without changes.
- **DO NOT** mark the feature implemented while QA findings remain open.

### Disputed Findings Protocol:
If the implementation agent has clear evidence that a QA finding is invalid against the source requirements or spec:
1. Verify against Priority 1 resources and specification contracts.
2. Document the rejection rationale with exact line citations.
3. Pass the rationale to the fresh QA investigator in the next review cycle.

### Final Success Condition:
> [!CAUTION]
> A feature is **NOT** considered implementation-complete until the agent has acted on all confirmed QA findings and a fresh independent QA investigator returns **`QA VERDICT: PASSED`**.
