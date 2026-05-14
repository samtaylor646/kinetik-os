/**
 * Path: /QUICK-START.md
 * Filename: QUICK-START.md | Version: v7.8.0
 * Agent: DevOps-V
 * Status: Production
 * Logic: Quick start guide for Kinetik-OS V7.8.0 development environment
 */

# Kinetik-OS V7.8.0 - Quick Start Guide

## Prerequisites

- **VS Code** (latest version)
- **Rancher Desktop** (or Docker Desktop as fallback)
- **Git** (for version control)

## Initial Setup (5 minutes)

### Step 1: Clone Repository

```bash
git clone [repository-url] kinetik-os
cd kinetik-os
```

### Step 2: Copy Configuration Files

Place all downloaded files in your project root:
- `.devcontainer/devcontainer.json`
- `docker/development/Dockerfile`
- `.dockerignore`
- `.editorconfig`
- `.gitignore`
- `.env.example`
- `scripts/verify-devcontainer.sh`
- `scripts/init-structure.sh`

### Step 3: Open in VS Code

```bash
code .
```

### Step 4: Reopen in Container

1. VS Code will prompt: **"Reopen in Container?"**
2. Click **"Reopen in Container"**
3. Wait for container to build (~5 minutes first time)

### Step 5: Verify Setup

```bash
chmod +x scripts/verify-devcontainer.sh
./scripts/verify-devcontainer.sh
```

---

## Daily Development

### Terminal 1: PHP Server

```bash
php -S 0.0.0.0:8000 kirby/router.php
```

Access: http://localhost:8000

### Terminal 2: Vite HMR

```bash
npm run dev
```

### Kirby Panel

Access: http://localhost:8000/panel

---

## Common Commands

```bash
# Install dependencies
composer require [package]
npm install [package]

# Clear cache
php kirby cache:clear

# Build for production
npm run build

# Run tests
npm test
```

---

## Troubleshooting

### Container won't start

```bash
# Rebuild container
Command Palette → Dev Containers: Rebuild Container
```

### HMR not working

```bash
# Restart Vite
Ctrl+C
npm run dev
```

### Port conflicts

```bash
# Find process using port
lsof -i :8000

# Kill process
kill -9 [PID]
```

---

## Next Steps

1. **Install Kirby** (Week 1, Day 3)
2. **Configure Vite** (Week 1, Day 4)
3. **Set up Tailwind 4** (Week 2, Day 1-2)

---

**Document Version:** v7.8.0  
**Agent:** DevOps-V
