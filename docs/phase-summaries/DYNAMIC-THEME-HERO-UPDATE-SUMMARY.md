# Dynamic Theme & Hero Content Update Summary

**Date:** 2026-05-16  
**Version:** v1.1.0

## Changelog
- **v1.1.0** (2026-05-16): Created summary detailing the integration of the dynamic Theme Panel with the Hero Content block and glassmorphism styling updates.

## Overview
Enhanced the Hero Content block to dynamically pull theme profiles directly from the global Theme page settings, rather than using hardcoded theme options. Also introduced a granular glassmorphism aesthetic for backdrop tints.

## Updates
- **`site/blueprints/blocks/hero-content.yml`**: 
  - Updated the `theme` select field to use a dynamic query (`kirby.page("theme").color_profiles.toStructure`), allowing editors to select from dynamically generated color profiles.
  - Refined `backdrop_tint` options to include multi-level glassmorphism settings (`glass-light-20`, `glass-dark-80`, etc.) and transparent light/dark text overrides.
- **`site/snippets/blocks/hero-content.php`**: 
  - Overhauled theme application logic to fetch the selected profile from the `theme` page.
  - Implemented dynamic inline CSS variables (`--hero-bg`, `--hero-text`, `--hero-cta-bg`, etc.) injected based on the selected theme profile.
  - Upgraded styling classes for improved typography scale, text-balance, and responsive layouts.
  - Updated CTA button styles for better hover states, scaling, and dynamic color inheritance from the theme panel.

## Status
Completed. The Hero Content block now fully utilizes the robust global Theme architecture.
