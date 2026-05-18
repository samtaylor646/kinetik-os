# Master Color System Architecture
**Status:** Production (v7.8 architecture)

## Overview
The Kinetik-OS color system is a fully dynamic, CMS-driven architecture that bridges backend Panel administration with frontend CSS Custom Properties (Variables). It ensures brand consistency while offering infinite scalability without code modification.

## 1. Defining Base Colors
All fundamental hex codes are defined natively within the Kirby CMS **Theme Panel** (`panel/pages/theme`). 
- A content editor adds a new color: `Variable Name: neon-purple` and `Color Value: #9B51E0`.
- Upon saving, the system hooks into the backend and automatically writes this variable into `public/media/dynamic-theme.css`:
  ```css
  :root {
    --color-neon-purple: #9B51E0;
  }
  ```

## 2. Building Color Profiles (Themes)
Instead of manually typing variables in every block, editors create "Color Profiles" in the Theme Panel. A profile (e.g., `Oceanic` or `Neon Night`) maps the Base Colors to specific functional UI roles.
- **Background Color:** maps to `--profile-bg`
- **Text Color (Base):** maps to `--profile-text`
- **Primary CTA Text:** maps to `--profile-pcta-text`

When the editor saves the Panel, the system dynamically generates a semantic CSS class for the profile:
```css
.theme-profile-oceanic {
  --profile-bg: var(--color-oceanic-dark);
  background-color: var(--profile-bg);
  /* Text and CTA variables mapped here... */
}
```

## 3. Frontend Block Application
UI Blocks (like Hero Content) or Layout Rows no longer use static Tailwind classes for backgrounds (`bg-oceanic-dark/50`). Instead, they assign the generic context class corresponding to the user's selected profile:
`<div class="theme-profile-oceanic">`

## 4. The `color-mix()` Opacity Engine
To handle Glass UI (opacities) dynamically without inline styles (enforcing Rule #6 / strict CSPs), the system generates a global, 10-step opacity engine using the native CSS `color-mix(in srgb)` function.

The system generates classes like `.theme-bg-opacity-50`. Because it uses `var(--profile-bg)`, it perfectly inherits whatever color the currently assigned `.theme-profile-[id]` class provides.

```css
.theme-bg-opacity-90 { background-color: color-mix(in srgb, var(--profile-bg) 90%, transparent) !important; }
.theme-bg-opacity-70 { background-color: color-mix(in srgb, var(--profile-bg) 70%, transparent) !important; }
/* Down to 10% */
```

## Adding a New Color (Workflow)
1. **Open the Theme Panel:** Go to `/panel/pages/theme` > "Colors" tab.
2. **Add Custom Color:** Enter the name and hex code.
3. **Assign to Profile:** Map the new color to a new or existing Color Profile.
4. **Save:** The `dynamic-theme.css` file is instantly regenerated and cache-busted globally. No Tailwind rebuilds required.