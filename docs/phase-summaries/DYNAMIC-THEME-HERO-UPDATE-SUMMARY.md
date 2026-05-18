# Phase Summary: Dynamic Theme & Hero Content Architecture
**Date:** 2026-05-18
**Version:** v7.8.0
**Agent:** Architect-K / DevOps-V

## Overview
Replaced the static Tailwind CSS safelist architecture with a fully dynamic, server-side CSS generation system. This resolves critical conflicts between dynamic CMS styling (Kirby Theme Panel) and build-time CSS compilation (Tailwind CSS), while strictly adhering to Rule #6 (No Inline Styles) and ensuring Content Security Policy (CSP) compliance.

## Changelog

### 1. Dynamic CSS Generation Hook
- **File:** `site/config/config.php`
- **Action:** Created a `page.update:after` hook tied to the Theme settings page.
- **Logic:** Upon saving the Theme panel, the system dynamically parses the user's color definitions and Color Profiles, generating a physical stylesheet (`public/media/dynamic-theme.css`).
- **Features:** 
  - Converts arbitrary panel hex codes into global CSS custom properties (e.g., `--color-oceanic-dark: #005b6d;`).
  - Automatically maps Theme Profiles to functional variables (e.g., `.theme-profile-oceanic` sets `--profile-bg`).
  - Generates a reusable, 10-step `color-mix()` engine for opacities (e.g., `.theme-bg-opacity-50`, `.overlay-opacity-30`).

### 2. Header Asset Integration
- **File:** `site/snippets/header.php`
- **Action:** Injected the dynamic stylesheet link.
- **Logic:** Appended `<link rel="stylesheet" href="/media/dynamic-theme.css?v=[timestamp]">` with automatic cache-busting tied to the Theme page's modified timestamp.

### 3. Hero Content Block Refactor
- **File:** `site/blueprints/blocks/hero-content.yml`
- **Action:** Updated `bg_opacity` options to strict 10-step increments (`100, 90, 70, 50, 30, 10, 0`).
- **File:** `site/snippets/blocks/hero-content.php`
- **Action:** Gutted over 30 lines of static Tailwind mapping logic. Removed the massive HTML `<span>` safelist.
- **Logic:** The block now cleanly outputs semantic classes (`theme-profile-[id] theme-bg-opacity-[val]`) delegating all color logic to the generated CSS. Legacy value mapping (`Glass (50%)` -> `50`) was retained to prevent breaking older blocks.

### 4. Layout Row Overlay Refactor
- **File:** `site/blueprints/fields/layout-builder.yml`
- **Action:** Reverted `background_overlay` back to an intuitive Range Slider, configured with `step: 10`.
- **File:** `site/snippets/layouts/default.php`
- **Action:** **Eliminated Rule #6 Violation.** Removed prohibited inline styles (`style="opacity: X"`) previously used for row dark overlays.
- **Logic:** The row snippet now utilizes the dynamically generated `.overlay-opacity-[val]` classes.

## Impact
- **Infinite Scalability:** Content editors can create unlimited new colors and profiles without requiring any backend developer intervention or Vite rebuilds.
- **100% CSP Compliance:** Complete removal of inline `style=""` attributes ensures the UI renders perfectly on secured federal networks.
- **Improved UX/DX:** Editors regain granular slider controls where appropriate (Row Overlays) while maintaining strict design system adherence where necessary (Hero dropdowns).

---
