# Sandbox Page Structure & Layout Builder Update

**Date**: 2026-05-11

## Overview
Built a complete Sandbox environment and updated default layout configurations for the Boutique Federal Design System.

## Completed Tasks
1. **Sandbox Template & Blueprint**:
   - Created `site/templates/sandbox.php` to render dynamic layout blocks cleanly with UI debug labels for block types.
   - Built `site/blueprints/pages/sandbox.yml` with a comprehensive layout field.
2. **Layout Configurations**:
   - Implemented an extensive set of column fractions spanning Standard and Advanced combinations in both `sandbox.yml` and `default.yml` blueprints.
   - Organized layout `fieldsets` into two distinct groups (`custom_blocks` for the 13 custom Boutique Blocks, and `standard_blocks` for built-in Kirby blocks) to fix field-loading issues ("This drawer has no fields") while preserving the standard Kirby features.
3. **Dummy Content Scripting**:
   - Generated the initial `content/sandbox/sandbox.txt` using a PHP script, populating a default 1/1 grid layout with dummy JSON data for all 13 custom blocks to provide an immediate visual testing environment.
4. **Schema Validation Fixes**:
   - Added the `blueprint: page` property to the root of both `default.yml` and `sandbox.yml` to satisfy the VS Code `kirby-schema` JSON validation extension, resolving missing property errors.

## Layout Options Added
**Standard**:
- `1/1`
- `1/2, 1/2`
- `1/3, 1/3, 1/3`
- `2/3, 1/3`
- `1/3, 2/3`
- `1/4, 1/2, 1/4`

**Advanced**:
- `3/5, 2/5`
- `2/5, 3/5`
- `1/6, 2/3, 1/6`
- `1/4, 3/4`
- `1/2, 1/4, 1/4`
- `1/12, 5/12, 5/12, 1/12`
- `1/5, 1/5, 1/5, 1/5, 1/5`