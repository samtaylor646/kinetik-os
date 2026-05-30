# Vite Manifest Fix Summary

## Issue
The site encountered a `kirby-vite` error: "`src/index.css` is not a manifest entry."
This occurred because `vite()->css('src/index.css')` was being called in `site/snippets/header.php`, but `src/index.css` was not explicitly listed as an entry point in `vite.config.js`.

## Solution
1. **Identified Entry Points**: Checked `vite.config.js` and confirmed that `src/main.js` is the configured entry point. `src/main.js` naturally imports `src/index.css`.
2. **Updated Snippet**: Modified `site/snippets/header.php` to use `vite()->css('src/main.js')` and `vite()->js('src/main.js')`. This allows `kirby-vite` to look up the `src/main.js` entry in `.vite/manifest.json` and automatically resolve the associated CSS file.
3. **Rebuilt Assets**: Ran `npm run build` to generate a fresh `.vite/manifest.json` in the `public/dist` folder.

## Next Steps
- Verify the site styling is loading correctly across all pages in the local environment.
- Continue to build out other frontend components (Alpine/GSAP features).