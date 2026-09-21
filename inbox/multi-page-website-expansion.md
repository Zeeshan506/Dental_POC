# Intake Brief: Multi-Page Website Expansion (Part 1 — Scope & Architecture)

Expand the current Dental_POC from two landing-page concepts into two complete multi-page website variants.

Repository:
https://github.com/Zeeshan506/Dental_POC

The existing homepages establish the visual language, typography, spacing, components, motion and interaction style for each direction:
- Variant A — Expressive / 2D Cutout
- Variant B — Calm / Editorial

Do NOT redesign either direction. Every new page must feel like it was always part of its corresponding homepage.

---

## Core Architecture

Both variants must expose the SAME website structure and clinical content, while presenting it through their own design language.
The variant switcher must continue working across every page.

Examples:
- `/about?variant=a` | `/about?variant=b`
- `/services?variant=a` | `/services?variant=b`
- `/services/dental-implants?variant=a` | `/services/dental-implants?variant=b`

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

---

## Required Website Pages

Build the complete client-facing website structure:

1. **Home**: Existing implementation; only adjust navigation/integration where required.
2. **About Us**: Clinic story, philosophy of care, clinical values, patient experience philosophy, clinic environment, trust/credentials, CTA into consultation.
3. **Our Team**: Team listing, Clinical Director / Dr. Bhatti prominently featured, supporting doctors/team placeholders where real information is unavailable. Never invent credentials. Clear route into individual profiles.
4. **Team Member Detail** (`/team/dr-tariq-bhatti`): Portrait, role, credentials, biography, philosophy, areas of care, accreditations, consultation CTA.
5. **Services / Treatments**: Complete treatment overview, existing treatment categories, concise explanation of each, strong navigation into treatment detail pages.
6. **Service Detail** (`/services/dental-implants`): Reusable template driven by structured data. Include treatment name, concise intro, suitable patients, treatment process, benefits, technology/materials, FAQs, related treatments, consultation CTA. No medical guarantees.
7. **Patient Journey / New Patients**: What to expect, initial consultation, diagnostics, care planning, treatment, follow-up, comfort/reassurance, direct booking/contact path.
8. **Reviews / Patient Stories**: Google review presentation, rating/source treatment already established, placeholder reviews marked until supplied, links to Google review destinations, reuse review carousel/modal.
9. **Contact**: Address, map, clinic hours, telephone, WhatsApp, emergency-care info, contact/consultation form. Form is frontend-only (client-side validation and mock success state).
10. **FAQ**: General clinic questions, appointments, payments/insurance placeholders, treatment navigation, emergency/contact information.
11. **Legal / Footer Pages**: Privacy Policy placeholder, Terms / Website Terms placeholder. Internal notice that final legal copy requires client approval.

---

## Navigation Architecture

Create a proper site-wide navigation system:
- Primary IA: Home, About, Treatments, Team, Patient Journey, Reviews, Contact.
- Keep navigation concise; detail pages reached contextually.
- Desktop and mobile navigation must both be polished and accessible.
- Header and footer visually appropriate to each variant while sharing the same information architecture.
