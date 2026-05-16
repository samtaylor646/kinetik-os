# Documentation Consolidation and Architecture Alignment Summary

## Overview
This update focuses on cleaning up the project's documentation structure and strictly aligning the Layout Builder and Sandbox components with the established 18-block UI architecture.

## Key Git Commits

- **`d934603` docs: consolidate and archive documentation structure**
  - Moved outdated strategy, legacy color, and older architecture files into an `archive` directory.
  - Streamlined the main `/docs` directory to contain only active `core`, `architecture`, and `phase-summaries` files.

- **`15e4d6b` fix: Align layout builder and sandbox content with 18-block architecture**
  - Updated `site/blueprints/pages/sandbox.yml` and related templates.
  - Refactored layout definitions to ensure only the 18 approved design blocks are available for page composition.
  - Removed outdated nested layouts and invalid block references that were causing rendering errors.

- **`0a24d32` docs: Update block library documentation and remove redundant blocks**
  - Updated `docs/architecture/block-library.md` to serve as the definitive source of truth.
  - Documented the exact block limits and properties for the `LayoutBuilder` ecosystem.

## Outcomes
- **Cleaner Repo:** The documentation structure is now strictly organized into core definitions, active architecture, and historical archives.
- **Consistent UI Building:** Content creators are constrained to the official 18 blocks, preventing broken layouts and maintaining the Fluid.Glass design aesthetic.