# Atlassian-Style Design System Overhaul Plan

## Overview
The goal of this plan is to eventually upgrade the Kinetik-OS Design System to mirror the robust, user-friendly documentation style of enterprise systems like the Atlassian Design System. It will provide clear usage guidelines, interactive components, and comprehensive foundation rules.

## Objectives
- **Nested Architecture:** Move away from a single, long-scrolling page to a structured hierarchy with a persistent sidebar navigation.
- **Foundation Clarity:** Create dedicated pages for Colors, Typography, Spacing, and Motion, detailing usage rules, accessibility (contrast), and code implementation.
- **Component Library Documentation:** Build a comprehensive component section detailing Do's and Don'ts, interactive previews, and copy-paste code snippets.
- **Fluid.Glass Aesthetic Enforcement:** Ensure all documentation components strictly adhere to the project's brutalist/minimalist geometry (zero border radius, hairline borders, stark contrast).

## Proposed Architecture

```text
/design-system
├── Overview (Introduction, Principles)
├── Foundations
│   ├── Colors (Palettes, Contrast, Usage Contexts)
│   ├── Typography (Hierarchy, Font Families, Scale)
│   ├── Spacing (Federal Scale, Grid alignments)
│   ├── Motion (GSAP/Lenis principles, Timing functions)
│   └── Iconography (Usage, Scale, Stroke widths)
└── Components
    ├── Buttons & Links
    ├── Forms & Inputs
    ├── Cards & Panels (Bento Grids)
    ├── Accordions
    └── Layout Wrappers
```

## Execution Phases

### Phase 1: Structural Re-architecture
- Update Kirby blueprints to allow for parent/child relationships within the `design-system` section.
- Create a `design-system-index` template and controller to handle the sidebar routing and active states.
- Migrate existing flat snippets into the new hierarchical folder structure.

### Phase 2: Documentation UI Components
- Build a `Do/Don't` block snippet for visual rule enforcement.
- Build a `Color Swatch` block snippet that automatically calculates and displays WCAG contrast ratios.
- Build a `Code Sandbox` block snippet to display a UI component alongside its Tailwind/Alpine.js source code.

### Phase 3: Content Expansion
- **Colors:** Map all `@theme` variables with explicit usage scenarios.
- **Typography:** Document the strict separation between `Inter` (prose) and `JetBrains Mono` (metadata/technical).
- **Spacing:** Create a visual ruler component to demonstrate `--spacing-airy-*` tokens.

### Phase 4: Component Integration
- Migrate all current `site/snippets/blocks/*.php` into the documentation site.
- Write usage guidelines and properties/props tables for each block.