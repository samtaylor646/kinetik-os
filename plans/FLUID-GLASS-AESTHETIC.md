# Fluid.Glass Aesthetic Alignment Plan

## 1. Analysis of Fluid.Glass Inspiration
`fluid.glass` represents a high-end, brutalist-minimalist approach to digital product design. It relies heavily on stark contrasts, precise geometry, and extreme typographic hierarchy. 

**Core Paradigms to Adopt:**
- **Strict Geometry:** Zero border radius (`rounded-none`). All containers, buttons, and UI elements must have sharp, 90-degree corners.
- **Hairline Borders:** Borders should be exclusively 1px (`border`, `border-ink/10`) to establish a technical, blueprint-like grid aesthetic.
- **Massive Typography:** Hero sections should use oversized, tightly kerned typography (e.g., `text-7xl` or `text-8xl`, `tracking-tighter`, `leading-none`).
- **High-Contrast Monospace Details:** Secondary metadata, system statuses, and sub-labels must use monospaced fonts (`font-mono`) with uppercase styling and wide tracking (`uppercase tracking-[0.2em]`).
- **Pervasive Grid Alignment:** Layouts should feel like a rigid structural grid.
- **Cinematic Motion (Future Phase):** Transitions should not be standard CSS fades. They should be staggered, momentum-based reveals (GSAP) combined with smooth scrolling (Lenis).

## 2. Gaps in the Current Sandbox & UI Blocks
The current state of our UI blocks (e.g., `sandbox.php`, `cta-banner`, `accordion-group`) relies heavily on default Tailwind aesthetics, which creates a disjointed experience compared to our `design-system.php`.

**Specific Gaps:**
- **Rounded Corners:** Blocks currently use `rounded-xl` or `rounded-3xl`.
- **Soft Shadows:** Blocks use `shadow-md` or `shadow-xl`, which feel too soft and "floaty".
- **Color Inconsistency:** Blocks fallback to `bg-slate-50` or `text-slate-900` instead of our strict `bg-canvas`, `bg-ink`, `text-ink`, and `bg-oceanic-dark` tokens.
- **Typography:** Standard prose lacks the extreme scale and technical monospaced contrasts required by the aesthetic.

## 3. Action Plan (Execution Steps)

1. **Global CSS Reset (`src/index.css`):**
   - Override default base styles to enforce `bg-canvas` and `text-ink` universally.
   - Set up the global `font-mono` utilities.

2. **Block Snippet Overhaul:**
   - Iterate through every block in `site/snippets/blocks/*.php`.
   - Remove ALL instances of `rounded-*` classes.
   - Replace standard Tailwind gray colors (`bg-slate-*`, `text-slate-*`) with exact design system tokens.
   - Apply `tech-border` (1px solid borders) where appropriate to create the structured grid look.
   - Enforce the new typography scale on headings and metadata within blocks.

3. **Page Template Alignment:**
   - Audit `sandbox.php` and `default.php` to ensure the outer wrappers and grid containers perfectly match the new strict geometric style.

4. **Prepare for Motion Layer:**
   - Ensure DOM nodes have logical wrapper divs so that GSAP can target text lines (`overflow-hidden` wrappers) and images without breaking the rigid layout constraints.