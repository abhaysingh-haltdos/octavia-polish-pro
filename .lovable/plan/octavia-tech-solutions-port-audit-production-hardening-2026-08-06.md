# Octavia Tech Solutions — Port, Audit & Production Hardening

## What the upload actually is

The archive is an AI Studio Vite SPA, not a routed website. Key findings from reading the source:

- **No router.** `App.tsx` fakes navigation with `useState('/')` plus string matching on `currentPath`. Every page renders at `/`. Nothing is server-rendered, no URL changes, no deep links, no back button.
- **~150 placeholder pages.** Every file under `src/pages/services/*`, `src/pages/seo-landing-pages/*`, `src/pages/industries/*` (the lowercase folders), `src/pages/company/*` and `src/pages/solutions/*` is a 340-byte stub: one H1 and one sentence. They are not imported anywhere.
- **Real, substantial pages exist** for: home (13 sections), contact, blog listing + detail, case studies listing + detail, industry detail, solution detail, and a full 17-component service template driven by `serviceCategoriesData.ts` / `serviceTemplateData.ts`.
- **Zero SEO surface.** One static `<title>Data Minds Technologies</title>`, no description, no canonical, no OG/Twitter, no schema, no robots.txt, no sitemap.
- **Branding mismatch.** Title says "Data Minds Technologies", metadata says "Octavia Technologies", CSS uses a `dmt-` prefix.
- **Typography.** The brand palette (#204669 azure, #182B3A dark, #D1B579 gold, #FBFBFA light) is intact, but Avenir Next Arabic is never loaded — the CSS falls back to a system stack.

Because of this, "audit the existing site" and "port it to a real website" are the same job. A pure audit of an unrouted single page cannot deliver the SEO, URL, canonical, sitemap, or redirect outcomes you asked for.

## Decisions locked in

- Brand: **Octavia Tech Solutions**
- Domain: **https://octaviatechnologies.com**
- Typography: keep the current system font stack (rendering unchanged)
- Placeholder pages: build them out for real using the existing service template + data pattern

## Approach

### Phase 1 — Port to real routes (foundation)

- Move all components, pages, data, and styles into this TanStack Start project, preserving the design system CSS verbatim.
- Replace the `useState` pseudo-router with file-based routes:
  - `/`, `/contact`, `/about`, `/careers`, `/leadership`, `/partners`, `/certifications`, `/reviews`
  - `/blog`, `/blog/$slug`
  - `/case-studies`, `/case-studies/$slug`
  - `/industries`, `/industries/$slug`
  - `/solutions`, `/solutions/$slug`
  - `/services/$category`, `/services/$category/$service`
  - `/$slug` for the SEO landing pages (e.g. `/ai-development-company`)
- Convert every `handleLinkClick` / `<a href>` to `<Link>`; keep the header, mega menu, mobile nav, consultation modal and search modal behaviour identical.
- Remove the dead `alert`-style `activeLinkAlert` banner and the unused `@google/genai`, `express`, `bootstrap`, `dotenv` dependencies.

### Phase 2 — Content build-out for the 150 stubs

Drive each stub page from the existing template data model rather than hand-writing 150 one-off pages:

- Extend `serviceCategoriesData.ts` so every `/services/*` path resolves to a full record (hero, overview, challenges, features, process, tech stack, industries, FAQ, case studies, CTA).
- Give SEO landing pages their own data file feeding the same template, each with a distinct H1, intro, service grid, FAQ block, and CTA.
- Fill out the company pages with real section layouts using existing components.
- Copy is written in the current tone of voice and reuses existing messaging; existing real content is not rewritten.

### Phase 3 — SEO layer

- Per-route `head()`: unique title (<60 chars), description (<160), og:title/description/type/url, twitter:card, self-referencing canonical.
- JSON-LD: Organization + WebSite on root; Service on service pages; Article on blog posts; BreadcrumbList on all nested routes; FAQPage wherever a FAQ block renders.
- `robots.txt` with the sitemap directive, and a generated `/sitemap.xml` server route enumerating every static route plus every blog, case study, industry, solution, service and landing-page slug.
- URL hygiene: lowercase hyphenated slugs, no trailing slashes, 301s from the legacy singular aliases the old code accepted (`/blogs`, `/case-study/*`, `/industry/*`, `/solution/*`) to the canonical plural paths.
- One H1 per page, correct H2/H3 nesting, descriptive alt text on every image, internal links between related services, industries and case studies.

### Phase 4 — Responsive, UI/UX and accessibility

- Audit every route at mobile / tablet / laptop / desktop widths using the browser tool; fix overflow, header/mega-menu behaviour, grid collapse, spacing and font scaling.
- Normalise button, card, hover, focus and loading states across the reused components.
- Accessibility: keyboard-navigable mega menu and modals with focus trap and Escape, visible focus rings, `aria-label` on icon-only buttons, labelled form fields with inline validation, contrast fixes on gold-on-light and muted text, semantic landmarks with a single `<main>`.

### Phase 5 — Performance and code quality

- Route-level code splitting (automatic with file routes), lazy-loading below-the-fold sections and images, `width`/`height` on images to stop layout shift, preload for the hero image only.
- Trim unused CSS and dead components, de-duplicate repeated card/section markup into shared components, fix TypeScript and console warnings, remove `console.log`s.
- Final pass: crawl every route, verify no broken links, no console errors, no missing metadata.

## Technical notes

- Target stack is TanStack Start + React 19 + Tailwind v4 (already configured here). The upload's Tailwind v4 setup transfers cleanly; `src/styles/index.css` becomes the project's `src/styles.css` with the brand tokens registered in `@theme inline`.
- Pages become SSR-rendered, which is what makes the SEO work meaningful — the current build ships an empty `<div id="root">` to crawlers.
- The contact and consultation forms are currently UI-only. This plan keeps them client-side; wiring real submission and storage would need Lovable Cloud and is out of scope unless you want it added.
- Blog, case study, industry and solution content stays in the existing TypeScript data files (no CMS/database), matching the current architecture.

## Sequencing

Phase 1 lands first and is verifiable on its own (every URL resolves and renders). Phases 2–5 follow in order. Phase 2 is the largest by volume; I will build it category by category so you can review the first category's tone before the rest is generated.
