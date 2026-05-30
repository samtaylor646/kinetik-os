# Kinetik-OS: Dynamic Theming Architecture

## Executive Summary
Kinetik-OS shifted from build-time Tailwind CSS compilation to runtime CSS Custom Properties (CSS Variables) for dynamic themes. This resolves the inherent conflict between a dynamic CMS (where users select colors and opacities at runtime) and Tailwind (which requires all class names to be known at build time).

By moving to defined CSS structures and server-generated dynamic stylesheets, the system achieves 100% dynamic theming, infinite scalability, and complete compliance with strict federal Content Security Policies (CSP).

---

## The Core Conflict (Pre-Update)
In previous versions, the architecture relied on Tailwind CSS. If a user changed a color profile or an overlay opacity in the Kirby Theme Panel, the system faced significant limitations:
- **Safelists:** The only way to ensure dynamic classes (like `bg-oceanic-dark/50`) rendered correctly was to hardcode hundreds of possible combinations into a Tailwind safelist within the PHP templates.
- **Rule #6 Violations:** Attempting to use sliders for arbitrary percentage values forced the use of inline styles (e.g., `style="opacity: 0.63"`), which violated strict internal rules.
- **CSP Failures:** Inline styles are universally blocked by strict enterprise and federal Content Security Policies (CSP) to prevent CSS injection attacks.

---

## The Solution: Server-Side Dynamic CSS

The architecture bridges the gap between the Kirby CMS runtime and the browser's CSS rendering engine without requiring *any* JavaScript build steps (Node/Vite) in production.

### Step 1: The Kirby Backend Hook
When a CMS editor adjusts a color slider or modifies a Theme Profile and clicks "Save", a Kirby `page.update:after` hook intercepts the event (`site/config/config.php`).

### Step 2: Physical File Generation
The server takes the user's hex codes and slider values and writes them directly into a physical CSS file on the server (`public/media/dynamic-theme.css`).

```css
/* Generated: public/media/dynamic-theme.css */
:root {
  --color-oceanic-dark: #005b6d;
}

.theme-profile-oceanic {
  --profile-bg: var(--color-oceanic-dark);
  background-color: var(--profile-bg);
  /* Text and CTA variables mapped here... */
}

/* Universal 10-step opacity engine */
.theme-bg-opacity-50 { 
  background-color: color-mix(in srgb, var(--profile-bg) 50%, transparent) !important; 
}
.overlay-opacity-50 { 
  background-color: rgb(0 0 0 / 0.5); 
}
```

### Step 3: Semantic Template Logic
The PHP Snippets (`hero-content.php` and `layouts/default.php`) are stripped of all Tailwind logic and safelists. They simply output context classes:
`<div class="theme-profile-oceanic theme-bg-opacity-50">`

### Step 4: CSP-Compliant Delivery
The global site `<head>` (`header.php`) links to this generated file using a cache-busting timestamp. 

```html
<link rel="stylesheet" href="/media/dynamic-theme.css?v=1715893021">
```

---

## Architectural Advantages

### 1. 100% CSP Compliance
Because the dynamic styles are delivered as a physical, external `.css` file originating from the same domain (`'self'`), the strict Content Security Policy allows it. No inline `style=""` attributes are used anywhere.

### 2. Strict Scale Precision
By generating a 10-step opacity engine (`100, 90, 70, 50, 30, 10, 0`), editors are provided with granular sliders (`step: 10`) for Overlays, while maintaining strict adherence to the overarching design system contrast guidelines.

### 3. Zero Build Step / Zero Safelists
Tailwind safelists are completely eliminated. Adding a new color token (e.g., `Neon Purple`) simply updates the generated variables. No Vite rebuilds or code changes are required.

### 4. High Performance
The browser caches the external CSS file, meaning the DOM remains clean and lightweight without massive inline styles attached to every block element.