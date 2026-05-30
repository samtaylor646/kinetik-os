---
Agent: Security Engineer
Context: Guide for configuring GitHub UI security settings
Last Modified: 2026-05-30
---

# GitHub Security Setup Guide

This guide outlines the manual steps required in the GitHub UI to enforce essential security guardrails for the AgencyOS repository.

## 1. Branch Protection Rules

Branch protection rules prevent unauthorized or untested changes from being merged into critical branches like `main`.

**Steps to configure:**
1. Navigate to your repository on GitHub.
2. Click on **Settings** in the top navigation bar.
3. In the left sidebar, click on **Branches**.
4. Under "Branch protection rules", click **Add rule** (or edit the existing rule for `main`).
5. Set the **Branch name pattern** to `main`.
6. Enable the following settings:
    - **Require a pull request before merging**: Ensure changes are reviewed.
        - **Require approvals**: Set the required number of approvals (e.g., 1 or 2).
    - **Require status checks to pass before merging**: Ensure CI/CD pipelines (like tests and CodeQL) pass before allowing merges.
        - Require branches to be up to date before merging.
    - **Do not allow bypassing the above settings**: Enforce these rules for all users, including administrators.
7. Click **Create** or **Save changes**.

## 2. Secret Scanning

Secret scanning protects your repository by searching for known types of secrets (like tokens, private keys) accidentally committed to the codebase.

**Steps to configure:**
1. Navigate to your repository on GitHub.
2. Click on **Settings** in the top navigation bar.
3. In the left sidebar, under the "Security" section, click on **Code security and analysis**.
4. Scroll down to the **Secret scanning** section.
5. Click **Enable** for Secret scanning.
6. (Optional but recommended) Enable **Push protection** to prevent secrets from being pushed to the repository in the first place.

Once these UI configurations are complete alongside the `.github` configurations (Dependabot and CodeQL), the core security guardrails for the repository will be fully active.