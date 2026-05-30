# AgencyOS Standard Upgrade Tasks

- [x] Step 4: Enforce QA and Human-in-the-Loop Gates
  - [x] Create QA sign-off template in docs/qa/
  - [x] Update Strict QA Gate & Human-in-the-Loop Mandate in config/settings.md
- [ ] Step 4: Core Documentation Migration
- [ ] Step 5: Test Automation Integration
- [ ] Step 6: Security and Compliance Checks
- [ ] Step 7: Final End-to-End Walkthrough

## Current Context: Integrity Deep Dive Protocol
- **Status**: Completed
- **Details**: The "Integrity Deep Dive" has been successfully completed. Unauthorized UI/CSS changes were reverted, and structural integrity has been verified across both the backend and frontend.

## Global Verification Steps (For Every Epic/Phase)
- [ ] Automated Test Execution & Evidence Collector Sign-off
- [ ] Technical Design Phase Human Validation
- [ ] UI/UX Checkpoint Human Validation
- [ ] Formal UAT Human Sign-off

## Security & Transition Requirements (Public Repository)
- [ ] Enforce branch protection on `main`: require pull request reviews before merging, and require status checks to pass.
- [ ] Enable GitHub Dependabot for automated dependency updates and alerts.
- [ ] Enable GitHub CodeQL (Advanced Security) for static code analysis.
- [ ] Enable GitHub Secret Scanning to prevent accidental commits of sensitive tokens.
