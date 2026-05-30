# HERO LAYOUT BUILDER & COMPOSITION OVERHAUL SUMMARY

**Date:** May 13, 2026
**Agent:** Roo (Architect / Code)
**Version:** 1.1.0

## Changelog
- **v1.1.0 (May 20, 2026)**: Added conditional Link Type selection (URL, Page, Anchor) to the Hero Content Block (`hero-content.yml` and `hero-content.php`).

## Overview
We successfully transitioned from monolithic, rigid Hero blocks to a highly flexible, compositional **Layout Builder** approach. This aligns with the "Boutique Federal Design System" PRD requirements and mirrors advanced visual builders like Zero One.

## Key Accomplishments

### 1. Enhanced Layout Builder (`layout-builder.yml`)
- Transformed the standard Kirby layout field into an advanced row-level configuration drawer.
- Implemented correctly structured tabs (`dimensions`, `background`, `advanced`).
- Added robust Hero-specific dimension settings: `min_height` (e.g., `100vh`), `vertical_align`, and `row_padding` (Airy spacing).
- Added `background_media` file uploads allowing both Images (`.jpg`, `.webp`) and Videos (`.mp4`, `.webm`).
- Converted the dark overlay setting into a granular percentage slider (`0%` to `100%`).
- Included full Kinetik-OS design system colors (`Canvas`, `Ink`, `Oceanic`, `Gold`, `Soft Smoke`, `Brand Accent`).

### 2. Layout Render Snippet (`layouts/default.php`)
- Wrote the PHP logic to iterate through the layout blocks and output strict Tailwind 4 utility classes based on the blueprint settings.
- Handled automatic color inheritance (e.g., setting text to Canvas/white when the row background is set to Ink/Oceanic).
- Added dynamic rendering logic to output a `<video autoplay loop>` tag or an `<img>` tag depending on the uploaded file's MIME type.

### 3. Template Integration Fixes
- Updated `site/templates/default.php` to correctly delegate rendering to the layout snippet instead of using a hardcoded unstyled grid. 
- Updated `site.yml`, `default.yml`, and `sandbox.yml` blueprints to properly expose the layout builder settings and "Add Page / Drafts" functionality.

### 4. Hero Content Block
- Created a brand-new `hero-content` block specifically engineered to sit inside the Layout Builder columns.
- Removed the need for hacking `section-header` blocks by providing dedicated fields for: Eyebrow, H1 Heading, Subheading, Primary CTA, and Secondary CTA.
- Introduced a **Backdrop Tint (Glass Effect)** setting utilizing Tailwind's `backdrop-blur-md` and `bg-opacity` to make text perfectly legible over complex background videos without requiring a solid color block.
- Implemented unified alignment controls that align both the text and the buttons simultaneously.

### 5. Subgrid Block (Nested Layouts)
- Developed a `subgrid` block that acts as a container for nested layouts, achieving "Zero One" style complexity natively.
- By dropping the Subgrid block inside a primary layout row, editors can create 3-column splits (or other fractional subdivisions) that seamlessly inherit the master row's background video/image.
- Resolved panel UI bugs by ensuring `preview: fields` is stripped, allowing Kirby's native layout UI to handle nested column manipulation beautifully.

### 6. Documentation
- Authored `docs/architecture/HERO-COMPOSITION-GUIDE.md` to instruct the DX-Curator on how to combine Layout Rows + the Hero Content Block + Subgrids to generate Centered, Split, and Minimalist Heroes.

## Next Steps
- Implement the GSAP "Motion-G" logic to tie into the `data-motion="reveal"` tags added to the layout rows.
- Continue expanding the block library based on the 18-block PRD specification.