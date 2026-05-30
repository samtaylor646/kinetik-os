# Kinetik-OS Block Library

**Date:** May 14, 2026
**Status:** Canonical Reference

## Overview
This document serves as the canonical reference for the Kinetik-OS block library, reflecting the evolution from the original 13-block specification to the current 18-block architectural implementation. This expansion supports the `fluid.glass` aesthetic, advanced Bento grid layouts, and enhanced motion layers.

## Block Index

### Core Layout Blocks
1. **bento-grid.yml** - The primary recursive container for Bento-style layouts.
2. **asymmetric-columns.yml** - Floating/pinned architectural layouts (typically typography vs media).
3. **horizontal-scroll.yml** - GSAP-driven horizontal scroll sections tracking vertical scroll.

### Hero & Banner Blocks
4. **hero-content.yml** - Advanced hero composition block, typically utilized within specialized layout builders.
5. **cta-banner.yml** - Full-width conversion strips for primary calls to action.

### Bento Content Variants
6. **bento-feature.yml** - Bento block specifically structured for feature highlights with icons.
7. **bento-media.yml** - Strict media container for Bento layouts (images/videos).
8. **bento-standard.yml** - Standard mixed-content block for Bento grids.
9. **bento-stat.yml** - Data-focused Bento block for emphasizing statistics and metrics.

### Content & Typography
10. **section-header.yml** - Typography-focused page anchors (headings + overlines).
11. **statement-quote.yml** - High-contrast pull quotes with specific typographic weight.
12. **strategy-card.yml** - Data-dense feature boxes with Alpine.js expansion capabilities.
13. **feature-grid.yml** - Icon and description grid for listing multiple features.

### Interactive & State-Based
14. **accordion-group.yml** - Collapsible FAQ or technical information powered by Alpine.js.
15. **tabbed-interface.yml** - State-based content switching interface using Alpine.js.
16. **video-modal.yml** - Full-screen video overlay with GSAP entrance animations.

### Data & Branding
17. **data-table.yml** - Responsive technical specifications tables with mobile scrolling.
18. **logo-cloud.yml** - Partner/client logo displays with grayscale filters and hover states.

---
*Note: All blocks strictly adhere to the Westport design system token constraints, ensuring sharp geometry and robust color execution.*