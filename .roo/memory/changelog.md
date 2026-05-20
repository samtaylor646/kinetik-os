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