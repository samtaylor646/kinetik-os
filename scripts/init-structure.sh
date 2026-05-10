#!/bin/bash

###############################################################################
# Path: /scripts/init-structure.sh
# Filename: init-structure.sh | Version: v7.8.0
# Agent: DevOps-V
# Status: Production
# Logic: Initialize Kinetik-OS directory structure with proper permissions
###############################################################################

set -e

echo "🏗️  Initializing Kinetik-OS V7.8.0 directory structure..."
echo ""

directories=(
    "site/blueprints/pages"
    "site/blueprints/blocks"
    "site/blueprints/fields"
    "site/config"
    "site/controllers"
    "site/models"
    "site/models/traits"
    "site/snippets"
    "site/snippets/blocks"
    "site/templates"
    "storage/cache"
    "storage/sessions"
    "storage/accounts"
    "storage/logs"
    "content"
    "public/media"
    "src/components"
    "scripts"
    "assets/icons"
    "docs"
)

for dir in "${directories[@]}"; do
    if [ ! -d "$dir" ]; then
        mkdir -p "$dir"
        echo "✓ Created: $dir"
    else
        echo "→ Exists:  $dir"
    fi
done

echo ""
echo "📝 Creating .gitkeep files..."
echo ""

gitkeep_dirs=(
    "storage/cache"
    "storage/sessions"
    "storage/accounts"
    "storage/logs"
    "public/media"
    "assets/icons"
)

for dir in "${gitkeep_dirs[@]}"; do
    touch "$dir/.gitkeep"
    echo "✓ Created: $dir/.gitkeep"
done

echo ""
echo "🔒 Setting permissions..."
echo ""

chmod -R 755 storage
chmod -R 755 content
chmod -R 755 public/media

echo "✓ Permissions set"
echo ""

if [ ! -f ".env.development" ]; then
    if [ -f ".env.example" ]; then
        cp .env.example .env.development
        echo "✓ Created .env.development from .env.example"
    fi
fi

echo ""
echo "✅ Directory structure initialized successfully!"
echo ""
echo "Next steps:"
echo "1. Install Kirby: composer create-project getkirby/plainkit temp && mv temp/kirby ./ && rm -rf temp"
echo "2. Run verification: ./scripts/verify-devcontainer.sh"
echo "3. Start development: See QUICK-START.md"
