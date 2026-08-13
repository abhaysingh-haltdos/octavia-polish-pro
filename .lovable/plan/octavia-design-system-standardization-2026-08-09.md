# Octavia Design System Standardization

Goal: one cohesive visual system — Manrope typography, Heroicons, the five approved brand colours, the uploaded logo — applied through shared tokens and components rather than page-by-page patching. No content, route, SEO or functionality changes.

## What I found

- Colours are hard-coded hex everywhere: `#204669` (476x), `#D1B579` (404x), `#182B3A` (190x), `#E2E8F0` (123x), `#FBFBFA` (62x), plus off-brand purples (`#6c2bd9`, `#8b5cf6`, `#5015b0`, `#a78bfa`) and ~30 `purple-*` / `indigo-*` Tailwind classes across 11 files.
- 66 files import `lucide-react`; the logo is a hand-drawn inline SVG placeholder.
- `src/site/site.css` sets a system-ui font stack and its own `:root` variables that shadow the shadcn tokens in `src/styles.css`.
- Routes today: `/`, `/contact`, `/blog`, `/case-studies`, `/industries`, `/solutions`, `/services` (+ splat). There are no `/about`, `/careers`, `/leadership`, `/partners`, `/certifications`, `/reviews` routes — those are only mega-menu links today, so the audit will cover the routes that exist; creating new company pages is out of scope for this task.

## 1. Tokens (foundation)

Define the palette once in `src/styles.css` (`:root` + `@theme inline`) as oklch equivalents of:

```text
White  #FEFEFE   Azure #264868   Dark Blue #153758
Grey Blue #93A3B2   Gold #C1A972
```

Semantic mapping: `background`/`card`/`input` = White, `primary` = Azure, `primary-foreground` = White, `secondary`/dark surfaces = Dark Blue, `foreground` = Dark Blue, `muted-foreground`/`border` = Grey Blue tints, `accent` = Gold, `ring` = Azure. A restrained `destructive` stays for form validation only.

Rewrite the `:root` block in `src/site/site.css` so its legacy variables (`--darkazure`, `--greyorange`, `--text-*`, `--border*`, `--bg-*`) point at the new tokens — every component styled through the CSS file updates automatically.

## 2. Typography

Load Manrope (weights 400/500/600/700/800) via `<link>` in `src/routes/__root.tsx`, register `--font-sans: Manrope` in `@theme`, and set it on `body` in `site.css`, replacing the system stack. Normalise heading weights/tracking in one place so H1–H6, nav, buttons, forms, cards, modals, blog and all template sections inherit it. No second family.

## 3. Icons

Add `@heroicons/react` and migrate all 66 lucide files with a name-mapping pass (outline 24 for UI/nav/cards, solid for small filled indicators), keeping `w-*`/`h-*` sizes and `aria-label`s intact. `IconHelper.tsx` (service-template icon resolver) becomes the single Heroicons registry. Remove `lucide-react` once no imports remain.

## 4. Colour sweep

Replace every hard-coded hex and off-brand Tailwind colour class with token utilities (`bg-primary`, `text-foreground`, `border-border`, `text-accent`, …), chosen by semantic role:

- purple gradients/glows/blobs → Azure→Dark Blue or Dark Blue→Azure
- purple badges/icon chips → Azure or Gold depending on emphasis
- purple hover/active → Azure hover, Gold for active accents
- `#E2E8F0`, `#42474E`, `#5F6670`, `#C2C7CF` neutrals → Grey Blue / border tokens

Gradients kept only where they already exist, restricted to the approved palette.

## 5. Shared components

Create small primitives under `src/site/components/ui/` and adopt them across pages:

- `Button` — one radius scale, padding scale, weight, icon slot, focus ring; `primary` (Azure), `secondary` (White/Azure outline), `accent` (Gold detail), `ghost`.
- `Card` — one radius, border, shadow, padding, heading/body/icon treatment, hover lift.
- `Field`/form styles — one input height, border, radius, label weight, placeholder colour (Grey Blue), Azure focus ring, single error style.
- `Section` — consistent vertical rhythm, container width, eyebrow + heading hierarchy.

Header, MegaMenu, MobileNav, ConsultationModal, SearchModal and FooterSection are updated to these tokens/primitives so nav, mobile nav and modals match.

## 6. Hero sections

Align the homepage, service-template, listing and detail heroes to one recipe: Dark Blue base, Azure depth, one restrained Gold accent, shared eyebrow/H1/subhead/CTA scale — layouts and copy unchanged.

## 7. Logo

Use the uploaded `cropped-OCTAVIA-LOGO_1.png` as-is via a Lovable asset pointer, replacing the inline SVG in `Logo.tsx` with a fixed-aspect responsive `<img>` (explicit width/height, `h-9 sm:h-10 lg:h-11 w-auto`, alt text). Applied to desktop/sticky header, mobile nav and footer; the surrounding surfaces are adapted so the logo reads on both light and dark headers. A square padded copy becomes `public/favicon.png`, replacing `favicon.ico`, and any remaining Data Minds references are removed.

## 8. Verification

Typecheck + lint, then a Playwright pass over every existing route at 390 / 768 / 1280 px: screenshots for visual regressions, a grep gate proving zero `purple/violet/indigo` and zero unapproved hex remain, console-error check, and an axe re-run to confirm contrast still passes with the new palette (notably Grey Blue never used for body copy on white).

## Technical notes

- Tailwind v4 CSS-first: all tokens in `src/styles.css` `@theme inline`; no `tailwind.config.js`.
- Manrope loaded by `<link>` in `__root.tsx` head, never `@import` in CSS (Lightning CSS would break the build).
- Migration is mechanical + reviewed file-by-file; no route files, loaders, `head()` metadata or JSON-LD are touched.
