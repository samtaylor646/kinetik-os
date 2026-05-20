# KINETIK-OS MASTER ORCHESTRATION KERNEL

You are an autonomous agent operating within the Kinetik-OS Multi-Agent Framework.

## 1. THE EXECUTION LOOP (SOP)
Before executing any code modification, you MUST process this loop silently:
1. **Context Check:** Read `.roo/memory/active_context.md` to understand current state.
2. **Deep-Dive Look Up:** If the active task requires specific component blueprints, fields, or historical requirements, read the corresponding canonical file in the `CANONICAL SPECIFICATIONS VAULT` (`/docs/core/`).
3. **Domain Check:** Am I the correct agent for this task? If not, switch roles.
4. **Constraint Check:** Does this violate any Terminal Rules?
5. **Execution:** Write the code.
6. **Memory Update:** Update `.roo/memory/active_context.md` and log any deviations in `.roo/memory/changelog.md`.

## 2. CANONICAL SPECIFICATIONS VAULT (COLD STORAGE)
When you require granular, deep-dive project constraints or historical definitions, cross-reference these local files on-demand. Do not pull them into hot context unless required for the active task:
* **Product Requirements (PRD):** `/docs/core/KINETIK-OS-PRODUCT-REQUIREMENTS-DOCUMENT.md` (Use for exact field schemas, block functionality requirements, and acceptance criteria).
* **Master Roadmap:** `/docs/core/KINETIK-OS-PROJECT-ROADMAP.md` (Use for checking baseline dependencies and original phase goals).
* **Core Rules Archive:** `/docs/core/KINETIK-OS-PROJECT-RULES.md` (Contains full implementations of validation tools and complete historical rule listings).
* **Unified Initialization:** `/docs/core/KINETIK-OS-V7.8.0-UNIFIED-MASTER-PROMPT.md` (The structural baseline for the entire framework setup).

## 3. TERMINAL CONSTRAINTS (HARD FAIL - DO NOT PROCEED)
* **RULE 1.1 (The Mandatory Header):** EVERY file created or modified MUST begin with a comment header containing: Path, Filename, Version, and Date.
* **RULE 1.2 (Zero-Database Law):** NO database code (MySQL, SQLite, PDO). Flat-file architecture only.
* **RULE 1.3 (Vault Sovereignty):** The `/public` directory is restricted to `index.php`, `.htaccess`, `/dist`, and `/media`. All other code is private.
* **RULE 3.7 (Task Archiving):** Keep only the 2 latest tasks in `.roo-tasks/tasks/`. Move older tasks to `.roo-tasks-archive/tasks/`.
* **RULE 3.8 (Responsive Images):** Direct `<img>` tags are prohibited for static templates. Use `snippet('image', ...)`.

## 4. AGENTIC PROTOCOLS
* **The Handshake:** When bridging UI state (Logic-A) and animations (Motion-G), Alpine.js MUST mount before GSAP initializes.
* **Token Sovereignty (DX-Curator):** ZERO inline styles. Use Tailwind 4 `@theme` variables exclusively.