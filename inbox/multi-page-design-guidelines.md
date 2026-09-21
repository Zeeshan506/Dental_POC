# Intake Brief: Multi-Page Website Expansion (Part 2 — Design & Guidelines)

---

## Variant A — Expressive / 2D Cutout

Extend the exact language established by the current Variant A homepage:
- Warm architectural surfaces
- Layered compositions
- Selective photographic cutouts
- Stronger spatial depth
- Serif/sans hierarchy already established
- Brass/stone/charcoal palette
- Expressive but controlled motion

Do NOT fill every page with cutouts. Use approximately one strong visual composition per major chapter/page when it adds meaning.
- About: Layer clinic philosophy, photography and architectural/clinical visual material.
- Team: Portraits may behave as editorial cutouts or layered monographs.
- Services: Typographic cards/sections with occasional larger clinical compositions.
- Service detail: One strong treatment-specific visual system, then let typography carry the information.
- Contact: Functional map and consultation information should remain clean.

Variant A should remain: expressive, layered, memorable, premium, medical, not scrapbook-like.

---

## Variant B — Calm / Editorial

Extend the exact language established by the current Variant B homepage.
Continue using Dental Design SD as the experience reference:
https://www.dentaldesignsd.com/

Use it for: restraint, whitespace, editorial typography, image treatment, pacing, smooth transitions, section rhythm.
Do not copy its content or page layouts directly.

Variant B should rely on:
- Generous negative space
- Photography
- Hairline dividers
- Asymmetric editorial compositions
- Restrained serif typography
- Subtle metadata
- Calm section transitions

Do not introduce card-heavy SaaS layouts. Long-form pages such as About and Service Detail should feel almost like premium editorial features.

---

## Motion System

Extend the animation system already being developed across ALL new pages:
- Every significant heading, image, card/list, team profile, service item, FAQ group, review, form block, CTA, footer section should participate in the site's motion language.
- Variant A: More directional, layered and tactile.
- Variant B: Soft, fluid and restrained, informed by Dental Design SD.
- Reuse the existing Motion Mini / IntersectionObserver architecture. Do not create separate animation systems per page.
- No endless loops, bouncing arrows, flashy text splitting, large fly-ins, scroll hijacking, or unnecessary parallax.
- Respect `prefers-reduced-motion` throughout.

---

## Content & Component Architecture

Centralize content:
- Do not hardcode doctor/service/contact information into multiple Blade files.
- Expand structured clinic data into logical groups: clinic, team, services, FAQs, reviews, contact, navigation, SEO/page metadata.
- Reusable templates: service detail, team detail, FAQ item, testimonial, contact info.
- Shared: header, footer, navigation, variant switching, SEO/meta structure, shared clinic data.
- Variant-specific: page compositions, visual components, animation presentation.

---

## Responsive & Accessibility Standards

- Every page deliberately designed for mobile (320px+), tablet, and desktop.
- Maintain semantic heading hierarchy, proper labels, keyboard navigation, visible focus states, 44px+ interactive targets, sensible alt text, WCAG-compatible contrast, and reduced-motion support.
- Forms must expose proper labels/errors rather than relying only on placeholders.
- Provide unique page titles, meta descriptions, canonical-ready architecture, semantic H1, and sensible internal linking.
