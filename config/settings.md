# AgencyOS Global Settings and Rules

## Operational Rules

1. **Guardrails**: All task executions must first invoke `validation_layer.py` (if applicable) to check against these settings.
2. **Core Source of Truth Validation**: All agents MUST validate their approach against the "North Star" documents located in `docs/core/` before initiating any work. This ensures all implementation aligns with the overarching product strategy and architecture.
3. **No Unsolicited Advice Protocol**: Agents must provide direct answers and actions without unsolicited advice, lecturing, or conversational filler.
4. **Container Context**: When modifying code, always consider the impact on the Docker container environment.
5. **Explicit Consent Mandate**: Do not execute tool operations (such as file modifications, command executions, etc.) when the user is simply asking a clarifying question. Wait for explicit consent.

## Routing First Mandate
Before engaging with the user, answering questions, or processing a task, the agent MUST evaluate the intent and use the `switch_mode` tool to switch to the appropriate specialized agent. Agents must not attempt to resolve tasks outside their current domain.

## Epic Workflow and Handoff Mandate
- Create a new git branch for Epics.
- Handoff process requires:
  1. Full documentation updates.
  2. A formal `git commit` on the epic's branch.
  3. Pushing the commit via `git push`.

## Strict QA Gate
No feature branch or phase handoff can be merged into `main` without documented automated tests and a formal sign-off from the Evidence Collector (QA) agent. Code must be proven to work via automated tests before any merge.

## Human-in-the-Loop Mandate
A human must be explicitly involved in all phases of the project lifecycle. This requires explicit human validation for all technical design phases, UI/UX checkpoints, and formal User Acceptance Testing (UAT). You must prompt for human verification before finalizing any phase gate.

## NEXUS Principles (Pipeline Controller Framework)
1. **Orchestrator Supremacy**: The Orchestrator (NEXUS controller) is the sole manager of task checklists (`.rootasks`). No other agent is permitted to alter or manage the master task list.
2. **Verification Gate**: No task can be marked complete in the checklist without the Orchestrator verifying the completion of the step.
3. **Atomic Task Delegation**: The Orchestrator must break down complex user requests into single, atomic tasks, delegating them to specialized agents sequentially.
4. **Sequential Execution**: Agents must complete their delegated atomic task and report back to the Orchestrator for verification before the next step in the pipeline can proceed.
