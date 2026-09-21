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

Expand the current Dental_POC from two landing-page concepts into two complete multi-page website variants.

Repository:
https://github.com/Zeeshan506/Dental_POC

The existing homepages establish the visual language, typography, spacing, components, motion and interaction style for each direction:

- Variant A — Expressive / 2D Cutout
- Variant B — Calm / Editorial

Do NOT redesign either direction.

Every new page must feel like it was always part of its corresponding homepage.

==================================================
CORE ARCHITECTURE
==================================================

Both variants must expose the SAME website structure and clinical content, while presenting it through their own design language.

The variant switcher must continue working across every page.

Example:

/about?variant=a
/about?variant=b

/services?variant=a
/services?variant=b

/services/dental-implants?variant=a
/services/dental-implants?variant=b

Switching variants must preserve the current page whenever an equivalent page exists.

Keep this frontend-only for now.

Do NOT add:

- database
- Eloquent models
- migrations
- authentication
- CMS
- form persistence
- booking backend

Use structured Laravel config/data files for editable content rather than duplicating copy throughout Blade templates.

==================================================
REQUIRED WEBSITE PAGES
==================================================

Build the complete client-facing website structure:

1. Home
    - existing implementation
    - only adjust navigation/integration where required

2. About Us
    - clinic story
    - philosophy of care
    - clinical values
    - patient experience philosophy
    - clinic environment / approach
    - trust/credentials
    - CTA into consultation

3. Our Team
    - team listing
    - Clinical Director / Dr. Bhatti prominently featured
    - supporting doctors/team placeholders where real information is unavailable
    - never invent credentials or factual claims
    - clear route into individual profiles

4. Team Member Detail
   Example:
   /team/dr-tariq-bhatti

    Include:
    - portrait
    - role
    - credentials
    - biography
    - philosophy
    - areas of care
    - accreditations
    - consultation CTA

5. Services / Treatments
    - complete treatment overview
    - existing treatment categories
    - concise explanation of each
    - strong navigation into treatment detail pages

6. Service Detail
   Example:
   /services/dental-implants

    Reusable template driven by structured data.

    Include where relevant:
    - treatment name
    - concise introduction
    - what the treatment is
    - who it may be suitable for
    - treatment/process overview
    - benefits
    - relevant technology/materials
    - FAQs
    - related treatments
    - consultation CTA

    Do not make medical guarantees or invent clinical claims.

7. Patient Journey / New Patients
    - what to expect
    - initial consultation
    - diagnostics
    - care planning
    - treatment
    - follow-up
    - comfort/reassurance information
    - direct booking/contact path

8. Reviews / Patient Stories
    - Google review presentation
    - rating/source treatment already established
    - placeholder reviews clearly marked until actual reviews are supplied
    - links prepared for real Google review destinations
    - reuse the existing review interaction/carousel language

9. Contact
    - address
    - map
    - clinic hours
    - telephone
    - WhatsApp
    - emergency-care information
    - contact/consultation form

    The form is frontend-only:
    validate fields client-side and provide a polished mock success state.
    Do not persist or send submissions yet.

10. FAQ

- general clinic questions
- appointments
- payments/insurance placeholders only where facts are not yet known
- treatment navigation
- emergency/contact information

11. Necessary legal/footer pages

- Privacy Policy placeholder
- Terms / Website Terms placeholder

Make it obvious internally that final legal copy requires client approval.

==================================================
NAVIGATION
==================================================

Create a proper site-wide navigation system.

Suggested primary IA:

Home
About
Treatments
Team
Patient Journey
Reviews
Contact

Keep navigation concise.

Treatment and Team detail pages should be reached contextually rather than cluttering primary navigation.

Desktop and mobile navigation must both be polished and accessible.

The header/footer should remain visually appropriate to each variant while sharing the same information architecture.

==================================================
VARIANT A — EXPRESSIVE / 2D CUTOUT
==================================================

Extend the exact language established by the current Variant A homepage.

Use:

- warm architectural surfaces
- layered compositions
- selective photographic cutouts
- stronger spatial depth
- serif/sans hierarchy already established
- brass/stone/charcoal palette
- expressive but controlled motion

Do NOT fill every page with cutouts.

Use approximately one strong visual composition per major chapter/page when it adds meaning.

Examples:

About:
layer clinic philosophy, photography and architectural/clinical visual material.

Team:
portraits may behave as editorial cutouts or layered monographs.

Services:
typographic cards/sections with occasional larger clinical compositions.

Service detail:
one strong treatment-specific visual system, then let typography carry the information.

Contact:
functional map and consultation information should remain clean.

Variant A should remain:
expressive,
layered,
memorable,
premium,
medical,
not scrapbook-like.

==================================================
VARIANT B — CALM / EDITORIAL
==================================================

Extend the exact language established by the current Variant B homepage.

Continue using Dental Design SD as the experience reference:

https://www.dentaldesignsd.com/

Use it for:

- restraint
- whitespace
- editorial typography
- image treatment
- pacing
- smooth transitions
- section rhythm

Do not copy its content or page layouts directly.

Variant B should rely on:

- generous negative space
- photography
- hairline dividers
- asymmetric editorial compositions
- restrained serif typography
- subtle metadata
- calm section transitions

Do not introduce card-heavy SaaS layouts.

Long-form pages such as About and Service Detail should feel almost like premium editorial features.

==================================================
MOTION
==================================================

Extend the animation system already being developed across ALL new pages.

Every significant:

- page heading
- section heading
- image
- card/list
- team profile
- service item
- FAQ group
- review
- form block
- CTA
- footer section

should participate in the site's motion language.

Variant A:
more directional, layered and tactile.

Variant B:
soft, fluid and restrained, informed by Dental Design SD.

Reuse the existing Motion Mini / IntersectionObserver architecture.

Do not create separate animation systems per page.

No:

- endless loops
- bouncing arrows
- flashy text splitting
- large fly-ins
- scroll hijacking
- unnecessary parallax

Respect prefers-reduced-motion throughout.

==================================================
CONTENT ARCHITECTURE
==================================================

Centralize content.

Do not hardcode the same doctor/service/contact information into multiple Blade files.

Expand the current structured clinic data into logical groups such as:

clinic
team
services
FAQs
reviews
contact
navigation
SEO/page metadata

Service/detail pages should be generated from reusable structured content.

Likewise team profiles should share one reusable template.

==================================================
REUSABILITY
==================================================

Do not create duplicate standalone pages where reusable components/layouts make sense.

Aim for:

shared:

- header
- footer
- navigation
- variant switching
- SEO/meta structure
- shared clinic data

variant-specific:

- page compositions
- visual components
- animation presentation

reusable resource templates:

- service detail
- team detail
- FAQ item
- testimonial
- contact information

Preserve clear Variant A / Variant B component boundaries.

==================================================
RESPONSIVE DESIGN
==================================================

Every page must be deliberately designed for:

- mobile 320px+
- tablet
- desktop

Do not simply stack desktop columns on mobile without reviewing composition.

Simplify complex Variant A layering on small screens.

Let Variant B retain generous spacing without creating excessive empty mobile screens.

Navigation, forms, carousels and CTAs must remain touch-friendly.

==================================================
ACCESSIBILITY
==================================================

Maintain:

- semantic heading hierarchy
- proper labels
- keyboard navigation
- visible focus states
- 44px+ interactive targets
- sensible alt text
- WCAG-compatible contrast
- reduced-motion support

Forms must expose proper labels/errors rather than relying only on placeholders.

==================================================
SEO / PAGE BASICS
==================================================

Even though this is still a POC, structure every page properly now.

Provide:

- unique page title
- meta description
- canonical-ready architecture
- semantic H1
- sensible internal linking
- service/team slug structure
- placeholder Open Graph metadata architecture where appropriate

Do not overengineer SEO infrastructure.

==================================================
IMPLEMENTATION PROCESS
==================================================

Before implementation:

1. audit the existing repository and established components;
2. identify what can be shared;
3. define final route/IA structure;
4. extend structured content;
5. implement reusable templates;
6. build both variants page-by-page.

Use Playwright on the local Laravel server throughout.

Test the complete journeys in BOTH variants:

Home
→ Services
→ Service Detail
→ Contact

Home
→ Team
→ Doctor Profile
→ Consultation

Home
→ About
→ Reviews
→ Contact

Verify switching A ↔ B from every route preserves the corresponding page.

==================================================
FINAL EXPECTATION
==================================================

The result should no longer look like two isolated homepage POCs.

It should feel like two complete interpretations of the SAME professional dental clinic website.

Variant A must remain recognizably descended from the current expressive homepage.

Variant B must remain recognizably descended from the current calm editorial homepage.

Do not homogenize them as the site expands.

Same clinic.
Same information.
Same routes.
Two genuinely distinct design systems.
