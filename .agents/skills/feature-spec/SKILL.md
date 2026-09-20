---
name: feature-spec
description: >-
  Use this skill to plan new roadmap phases or remediate defects in a Spec-Driven Development (SDD) project. It inspects the roadmap and codebase first, handles both existing-spec amendments and new-spec creation, synchronizes requirements, plans, and validations under specs/, and updates specs/roadmap.md while enforcing strict separation between specification and implementation.
---

# Feature & Remediation Specification (`feature-spec`)

This skill converts high-level roadmap phases or post-acceptance defects into detailed, reviewable contracts before implementation begins. It ensures developers and agents have explicit, unambiguous alignment on scope, task breakdown, and verification proof.

---

## 1. When to Use & Invocation Query Handling

Invoke this skill whenever a roadmap milestone, regression, or manual-testing defect needs formal specification or amendment:

| Invocation Query Pattern | Target Behavior & Routing |
|---|---|
| `/feature-spec <Issue ID>`<br>(e.g. `/feature-spec MT-006`) | 1. Looks up `<Issue ID>` in `specs/roadmap.md`.<br>2. If mapped to an existing requirement/phase, executes **Branch A (Existing-Spec Amendment)**.<br>3. If independent or unmapped, executes **Branch B (New-Spec Creation)**. |
| `/feature-spec next unresolved remediation` | 1. Inspects `specs/roadmap.md` Section 5 (`Post-Initial-Testing Remediation & Defect Tracking`).<br>2. Checks for remediation items where `Specification Status != Ready`.<br>3. If found, selects highest-priority item to specify.<br>4. If **all** items are `Specification Status: Ready`, explicitly reports that all remediation specifications are complete, identifies the next item where `Implementation Status = Not Started` in execution priority (`MT-006 → MT-001 → MT-002 → MT-004 → MT-005 → MT-003`), and **halts execution without writing implementation code**. |
| `/feature-spec <Req ID> regression`<br>(e.g. `/feature-spec REQ-006 regression`) | 1. Locates requirement in `specs/roadmap.md` and discovers linked remediation items (e.g. `MT-003`).<br>2. Inspects `CHANGELOG.md` and existing code.<br>3. Executes **Branch A (Existing-Spec Amendment)** against its existing specification path. |
| `/feature-spec next roadmap item` | 1. Inspects `specs/roadmap.md` for the next incomplete phase in Section 3, or the next unstarted remediation item in Section 5.<br>2. Follows the inspection-first workflow to prepare the specification contract. |

---

## 2. Inspection-First Decision Workflow

Before authoring or modifying any specification files, always execute the following inspection:

```
                  ┌───────────────────────────────┐
                  │ Inspect specs/roadmap.md      │
                  │ Check CHANGELOG.md & codebase │
                  └───────────────┬───────────────┘
                                  │
                 Does an existing requirement/spec
                 own this domain scope?
                                  │
                    ┌─────────────┴─────────────┐
                   YES                          NO
                    │                            │
           ┌────────┴────────┐          ┌────────┴────────┐
           │ Branch A:       │          │ Branch B:       │
           │ Existing-Spec   │          │ New-Spec        │
           │ Amendment       │          │ Creation        │
           └─────────────────┘          └─────────────────┘
```

### Step 1: Repository & Roadmap Ingestion
1. **Read Roadmap**: Ingest `specs/roadmap.md` to identify requirement IDs (`REQ-xxx`), defect IDs (`MT-xxx`), existing specification paths, and statuses.
2. **Inspect History**: Ingest `CHANGELOG.md` and git commits to understand what has already been delivered.
3. **Inspect Codebase**: Inspect relevant routes, components, data manifests, styles, and utilities to confirm current system behavior. Do **not** assume behavior without reading code.

### Step 2: Branch Decision Logic
- **Branch A: Existing-Spec Amendment**
  - **Condition**: An existing specification folder already owns the functional domain or requirement.
  - **Action**: Perform **narrow additions** directly within the existing directory across `requirements.md`, `plan.md`, and `validation.md`. Preserve historical context and existing client intent.
  - **Status Guard**: Set or verify that newly added criteria are recorded as `Specification Status: Ready`, `Implementation Status: Not Started`, and `Validation Status: Pending`.
- **Branch B: New-Spec Creation**
  - **Condition**: No existing requirement owns the behavior, or folding the issue into an existing spec would distort its scope or engineering boundaries.
  - **Action**: Create a new directory `specs/YYYY-MM-DD-<name>/` with synchronized `requirements.md`, `plan.md`, and `validation.md`.
- **Branch C: Already Implemented or Validated**
  - **Condition**: Inspection shows the requirement, code change, and automated tests already exist and pass.
  - **Action**: Audit alignment, verify test proof, and confirm statuses without redundant edits.

---

## 3. Core Specification Execution

### Phase 1: Clarification & Alignment (`ask_question`)
- **When to Ask**: If there are genuine ambiguities in scope, edge cases, or verification criteria not answered in the issue report, codebase, or constitution, invoke `ask_question` before modifying files.
- **When NOT to Ask**: Do not ask about information already established in issue reports, repository code, or architecture docs.

### Phase 2: Synchronized Artifact Creation / Amendment
Always maintain strict 1-to-1 parity across the three artifacts:
1. `requirements.md`: Context, in-scope additions, non-goals, and explicit Acceptance Criteria (`AC-x`).
2. `plan.md`: Discrete numbered task groups mapping directly to the new criteria.
3. `validation.md`: Acceptance criteria verification matrix, automated test targets, and manual verification steps.

### Phase 3: Roadmap Synchronization (`specs/roadmap.md`)
Whenever a spec is created or amended, immediately update `specs/roadmap.md`:
- Record exact `Specification Path` and `Acceptance Criteria`.
- Ensure `Specification Status: Ready`.
- Ensure `Implementation Status: Not Started`.
- Ensure `Validation Status: Pending`.

---

## 4. Critical Guardrails & Constraints

- **STRICT IMPLEMENTATION GUARDRAIL**: "Specification Ready" does **NOT** mean implemented. A specification being `Ready` strictly means the requirements contract is locked and approved for development.
- **NO PHANTOM IMPLEMENTATION**: An issue cannot transition to `Implementation Status: Implemented` without an authored code commit on a feature branch, nor to `Validation Status: Validated` without passing automated test runs and manual test checks.
- **ZERO CODE CHANGES DURING SPECIFICATION**: Modifying application source code (Next.js App Router, React components, styles, data, utilities) is strictly forbidden during `/feature-spec`. Specification work produces only markdown contracts under `specs/`.
- **NO BUILD OR TEST EXECUTION**: While feature specing using this skill, there is NO need to run `pnpm build`, `pnpm lint`, `pnpm exec tsc --noEmit`, or any kind of test suites unless there is a change to source code—which is not even an option during feature specing. Only file length audits (`pnpm check:line-counts`) and formatting hygiene (`git diff --check`) apply.
- **REPLANNING BRANCH ISOLATION**: All specification authoring, roadmap updates, and repository rule updates must be performed on their own dedicated `replanning` branch, completely decoupled from feature implementation branches.
- **MODULARITY RULE**: Every edited or created file MUST remain under **300 lines** (enforced by `pnpm check:line-counts`).

---

## References
- [Decision & Branching Protocols](./references/questioning-and-branching.md)
- [Specification Templates & Amendment Format](./references/feature-templates.md)
