# Project Intake & Request Queue (`inbox.md`)

This file is the intake queue for raw feature ideas, copy adjustments, and design enhancements for the Prestigious Family Dental POC.

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

now we need to work on the final parts of the website, i recommend the skill for capturing the animation setting in both variant landing pages, and apply them to the rest of the website.

fix the navbar and overall responsiveness of the website. proper rendered views. remove the tags

Variant A • Expressive 2D Cutout
Variant B • Calm Editorial Direction
on both heros. then add the 2/3 color schemes given below.
also add the typography and add a switcher to visualize the changes.

the

### Palette 1 — Porcelain + Deep Teal

```text
Background        #F7F8F5
Surface           #EEF2EF
Elevated Surface  #E4EBE7
Border            #D1DBD6

Primary Text      #17201F
Secondary Text    #5F6C67
Muted Text        #82908A

Primary           #254E4A
Primary Hover     #1C3E3B
Secondary         #78978D
Soft Accent       #B8C9C2

Warm Accent       #B98252
Accent Soft       #E8D8C9
```

**Character:** clinical, calm, slightly more contemporary; works especially well with the editorial variant.

---

### Palette 2 — Ivory + Rosewood

```text
Background        #FBF8F4
Surface           #F3ECE6
Elevated Surface  #EBDED5
Border            #DCCEC4

Primary Text      #241E1B
Secondary Text    #6F615A
Muted Text        #95877F

Primary           #704A46
Primary Hover     #593936
Secondary         #A27B70
Soft Accent       #D3B9AC

Champagne Accent  #B69A69
Accent Soft       #EBE0CB
```

**Character:** warmer, premium, hospitality-oriented; very suitable for cosmetic/family dentistry and Variant A.

---

### Optional Palette 3 — Mineral Blue + Chalk

```text
Background        #F8FAFA
Surface           #EEF3F4
Elevated Surface  #E1EAEC
Border            #CDDADC

Primary Text      #182125
Secondary Text    #5E7077
Muted Text        #82949A

Primary           #365F69
Primary Hover     #294B53
Secondary         #7899A1
Soft Accent       #BDD0D4

Sand Accent       #B99B72
Accent Soft       #E8DFD1
```

**Character:** most conventionally medical of the three, but still muted enough to avoid the generic bright-blue clinic look.

---

### Additional Typography System

**Headlines / editorial:** `Newsreader`
**Body / UI / navigation:** `Manrope`

```text
Newsreader:
400 — large editorial headings
500 — section headings
600 — stronger Variant A headings
400 italic — quotations / philosophy / editorial emphasis

Manrope:
400 — body
500 — navigation / labels
600 — buttons / UI
700 — occasional compact emphasis
```

```css
--font-serif: "Newsreader", Georgia, serif;
--font-sans: "Manrope", system-ui, sans-serif;
```

**Alternative if you want a more classical/luxury look:**

```text
Cormorant Garamond + Manrope
```

Use `Cormorant Garamond` only for large headings/quotes; keep `Manrope` for everything functional.
