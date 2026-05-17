# Responsive Image Optimization Summary

**Date:** 2026-05-17  
**Version:** v1.0.0

## Changelog
- **v1.0.1** (2026-05-17): Fixed bug in auto-downsizing hooks where global WebP conversion unintentionally converted original files to WebP. Hooks now explicitly retain original file formats (`'format' => $file->extension()`).
- **v1.0.0** (2026-05-17): Initial summary created detailing the implementation of Kirby's native image features for automatic WebP conversion and responsive resizing.

## Overview
To improve frontend performance, reduce bandwidth, and ensure content editors cannot upload dangerously large files, we implemented a robust, native image processing pipeline using Kirby's built-in hooks and `srcset` generation.

### 1. Upload Restrictions
- Added `maxsize: 5242880` (5MB) to `site/blueprints/files/image.yml`.
- This ensures any standard image payload over 5MB is naturally rejected by the Panel before taxing the server.

### 2. Auto-Downsizing Hooks
- Configured `file.create:after` and `file.replace:after` hooks in `site/config/config.php`.
- Any uploaded image that exceeds 3000px in width or height is immediately scaled down to 3000px while retaining its original file extension (JPG/PNG).
- This prevents "File Not Found" errors in the Kirby Panel while aggressively controlling disk usage.

### 3. Responsive WebP Output
- Defined a `default` `srcset` in `site/config/config.php` using breakpoints: `600w, 900w, 1400w, 1920w, 3000w`.
- Enforced `'format' => 'webp'` globally via the `thumbs` configuration.
- Any image processed via Kirby's thumb engine will automatically be converted to optimized WebP.

### 4. The Image Snippet
- Created a standard snippet (`site/snippets/image.php`) that encapsulates the `<picture>` element and `<source srcset="...webp">` logic.
- Refactored `default.php` layout builder, Bento items, Logo Cloud, and Video Modal to utilize `snippet('image', ...)` in place of hardcoded `<img>` elements.
- This ensures universal compliance with the responsive WebP strategy moving forward.