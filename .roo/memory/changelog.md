# ARCHITECTURAL DECISION LOG (EPISODIC MEMORY)

This ledger tracks intentional deviations from the core PRD and architectural adaptations made during live execution.

### [2026-05-20] - Week 3 Re-alignment & Functional Discovery
* **Event:** Paused strict 18-block progression to stabilize the first 7 core blocks.
* **Driver:** Unaccounted layout and logic intersections discovered during active building.
* **Resolution:** Kinetik-OS state machine updated to reflect functional discovery phase. Velocity metrics temporarily suspended in favor of component stability.

### [2026-05-20] - Memory Architecture Overhaul
* **Event:** Transitioned from monolithic `/docs/core/` to `.roo/memory/` state machine.
* **Driver:** Context window bloat and agent attention dilution.
* **Resolution:** Core PRD, Roadmap, and Rules moved to cold storage. Roo execution now governed by `system_prompt.md` execution loop.

### [2026-05-20] - Hero Block Conditional Links
* **Event:** Refactored Hero Content Block (`hero-content.yml` and `hero-content.php`) to use conditional fields for CTA links.
* **Driver:** Need for flexible link targeting (Internal Page, External URL, or On-page Anchor) via a unified UI.
* **Resolution:** Replaced basic URL fields with a `link_type` selector and conditional `when:` fields (`pages`, `url`, `text`) for precise routing and internal UUID tracking.