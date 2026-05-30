# Fluid.Glass Aesthetic Alignment & Motion Plan

## 1. Analysis of Fluid.Glass Inspiration
`fluid.glass` represents a high-end, brutalist-minimalist approach to digital product design. It relies heavily on stark contrasts, precise geometry, and extreme typographic hierarchy. 

**Core Paradigms to Adopt:**
- **Strict Geometry:** Zero border radius (`rounded-none`). All containers, buttons, and UI elements must have sharp, 90-degree corners.
- **Hairline Borders:** Borders should be exclusively 1px (`border`, `border-ink/10`) to establish a technical, blueprint-like grid aesthetic.
- **Massive Typography:** Hero sections should use oversized, tightly kerned typography (e.g., `text-7xl` or `text-8xl`, `tracking-tighter`, `leading-none`).
- **High-Contrast Monospace Details:** Secondary metadata, system statuses, and sub-labels must use monospaced fonts (`font-mono`) with uppercase styling and wide tracking (`uppercase tracking-[0.2em]`).
- **Pervasive Grid Alignment:** Layouts should feel like a rigid structural grid.

## 2. Advanced Motion & Transitions Strategy
Beyond static visuals, the aesthetic relies on high-end, cinematic physics.

**Core Motion Pillars:**
- **Momentum Scrolling:** Utilizing Lenis to create weight and inertia on page scroll.
- **Staggered Reveals:** Utilizing GSAP to reveal typography line-by-line using `overflow-hidden` wrappers, preventing layout shift while adding technical precision to content entry.
- **SVG Mask Transitions (Codrops Inspired):** Implementing advanced SVG clip-path/mask transitions triggered by GSAP `ScrollTrigger` between major block sections. This will create dynamic, non-linear section wipes that break the rigid grid momentarily during scroll, enhancing the high-tech feel.
- **Pixel Image Reveal Effect (On Hold):** A canvas/WebGL-based pixelation dissolve effect for media elements. *(Currently documented but paused to prioritize layout and SVG masks).*

## 3. Gaps in the Current Sandbox & UI Blocks
The current state of our UI blocks (e.g., `sandbox.php`, `cta-banner`, `accordion-group`) relies heavily on default Tailwind aesthetics, creating a disjointed experience compared to our strict `design-system.php` tokens.

**Specific Gaps:**
- **Rounded Corners:** Blocks currently use `rounded-xl` or `rounded-3xl`.
- **Soft Shadows:** Blocks use `shadow-md` or `shadow-xl`, which feel too soft and "floaty".
- **Color Inconsistency:** Blocks fallback to `bg-slate-50` or `text-slate-900` instead of our strict `bg-canvas`, `bg-ink`, `text-ink`, and `bg-oceanic-dark` tokens.
- **Typography:** Standard prose lacks the extreme scale and technical monospaced contrasts.
- **DOM Structure:** Missing wrapper `div`s required for GSAP to animate elements cleanly.

## 4. Phased Execution Plan

### Phase 1: Global Setup & Typography
- Overhaul `src/index.css` to enforce global `bg-canvas` and `text-ink`.
- Enforce the massive header / tight kerning / monospace metadata typography scale across the base layer.

### Phase 2: Block Snippet Overhaul (Geometry & Tokens)
- Iterate through every block in `site/snippets/blocks/*.php`.
- Strip all instances of `rounded-*` and soft `shadow-*`.
- Replace default Tailwind gray colors with exact Design System tokens.
- Apply `tech-border` (1px solid borders) to structural elements.

### Phase 3: Page Template Alignment
- Audit outer wrappers in `site/templates/default.php` and `sandbox.php` to ensure the core page grid strictly adheres to the geometry rules.

### Phase 4: Motion Preparation & SVG Masks
- **DOM Restructuring:** Wrap necessary text nodes and media elements in `overflow-hidden` containers to prepare for GSAP reveals.
- **SVG Mask Setup:** Inject reusable SVG mask definitions into the page layout to be referenced by ScrollTrigger.

### Phase 5: Advanced Motion Implementation
- Setup the global Lenis momentum scroll instance.
- Hook up GSAP ScrollTriggers to fire the SVG Mask Transitions sequentially as major sections enter the viewport.
- Stagger line-by-line typography reveals on block entry.