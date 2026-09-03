# JUVYRI

Juvyri is a Ghanaian fashion brand specializing in stylish, modest and contemporary ready-to-wear clothing for women.

This repo contains the JUVYRI marketing website: a single-page, mobile-first static site (no build step) with a warm, editorial aesthetic and a handful of scroll/hover/marquee animations.

## Structure

```
index.html        Page markup (hero, collection, story, lookbook, Instagram grid, testimonials, newsletter, footer)
css/style.css      Design tokens, layout, responsive breakpoints, animations, prefers-reduced-motion overrides
js/main.js         Mobile nav, scroll-reveal (IntersectionObserver), count-up stats, testimonial carousel, newsletter form, back-to-top
assets/favicon.svg Monogram favicon
```

## Running locally

No build tooling required — it's plain HTML/CSS/JS.

```bash
python3 -m http.server 8000
# then open http://localhost:8000
```

## Notes / things to swap in before launch

I couldn't verify a few inputs directly in this environment, so I approximated them — flagging that clearly rather than presenting guesses as final:

- **Logo**: The attached logo image was shared inline in chat and this sandbox has no way to save that inline image to disk, so I recreated the wordmark as styled text (`Ju`+`V`+`y`+`R`+`i` in the Bodoni Moda display serif, in `.logo-text`) rather than the real artwork. Please drop the actual logo file into `assets/` (e.g. `logo.svg`/`logo.png`) and swap it into the `.logo` anchor in `index.html` (header + footer) for pixel-accurate branding.
- **Instagram inspiration**: `instagram.com` is blocked by this environment's network egress, so I could not actually browse `@ju.vy.ri` to pull real photos, captions, or layout cues. The "Follow The Edit" grid and product/lookbook imagery use CSS gradient placeholders in warm, earthy tones as stand-ins for real photography, based on the brand description in this README and general conventions for modest/contemporary fashion brands — not on verified content from the live profile. Swap the `.swatch-*`/`.ig-tile` background gradients for real photos (as `<img>` or `background-image`) when available.
- **Copy**: product names, prices (GH₵), stats, and testimonials are placeholder content for layout purposes, not real catalog data.
- I also wasn't able to authenticate against the Claude Design MCP in this session (`/design-login` requires an interactive session), so the referenced `Juvyri Wireframes.dc.html` design file could not be imported/read here. The layout below was designed directly from the brief instead.

## Design

- Palette: warm cream/paper background, near-black ink, terracotta/rust accent, muted gold.
- Type: Bodoni Moda (display serif, headings/logo) + Jost (body), loaded from Google Fonts.
- Animations: header shrink-on-scroll, infinite marquee ticker, scroll-triggered fade/slide reveals, animated count-up stats, hover zoom on product/lookbook/Instagram tiles, auto-rotating testimonial carousel, mobile nav drawer with backdrop. Everything respects `prefers-reduced-motion`.
- Fully responsive: mobile nav drawer under 900px, grids collapse from 4 → 2 → 1 columns, fluid type via `clamp()`.
