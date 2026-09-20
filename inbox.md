# Project Intake & Request Queue (`inbox.md`)

This file is the intake queue for raw feature ideas, new team member additions, copy adjustments, and design enhancements for StackSmith Labs.

---

## Agent Intake Protocol

When processing this file, every agent must follow this protocol:

1. **Intake & Audit**: Read the entries below.
2. **Cross-Reference Existing Specs**: Check `specs/` (`specs/mission.md`, `specs/tech-stack.md`, `specs/roadmap.md`, and feature specs) to see if the feature or change already exists or conflicts with established decisions.
3. **Handle Duplicates or Conflicts**:
    - If the request **already exists** or **conflicts** with existing specs/patterns, **halt and ask the user for clarification** before taking action.
    - If the request is **new and non-conflicting**, translate it into the appropriate feature specification and update `specs/roadmap.md`.
4. **Implementation**: Only implement after the spec and roadmap phase are established.
5. **Clear Upon Merge Readiness**: Once a relevant part or feature has been implemented, validated, and confirmed ready to merge, clear those implemented points from this inbox, as they have already been translated into specifications and code.

---

## Pending Intake Items

<!-- Add raw requirements, team profiles, or notes below this line -->

Add a Testimonials / Patient Reviews section to BOTH design variants while preserving each variant's own visual language.

For now use clearly marked placeholder review content, but structure every review with:

- patient name,
- 1–5 star rating,
- short visible review excerpt,
- Google Reviews source/link,
- optional date.

Build it as a horizontally navigable carousel rather than a large static grid. Keep controls restrained and consistent with each design.

Long reviews must never increase card height or break the carousel layout. Clamp the visible excerpt to a fixed number of lines.

Desktop interaction:

- hovering or keyboard-focusing a truncated review opens a secondary review panel/popover containing the complete review;
- the panel must be independently hoverable so it does not disappear when the pointer moves from the card into it;
- long content inside that panel must scroll internally;
- keep the full-review panel within the viewport and avoid layout shift.

Mobile/touch:

- use tap to open the same full-review view since hover does not exist;
- provide an obvious close/back interaction.

Clicking the Google Reviews source should open the real review/reviews destination in a new tab once URLs are supplied.

Keep this frontend-only for now. Store placeholder reviews in structured project data rather than hardcoding individual cards into the Blade markup.
