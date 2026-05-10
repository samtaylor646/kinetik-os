#!/bin/bash

###############################################################################
# Path: /scripts/verify-devcontainer.sh
# Filename: verify-devcontainer.sh | Version: v7.8.0
# Agent: DevOps-V
# Status: Production
# Logic: Automated verification script for DevContainer setup validation
###############################################################################

set -e

echo "🔍 Kinetik-OS V7.8.0 DevContainer Verification"
echo "=============================================="
echo ""

GREEN='\033[0;32m'
RED='\033[0;31m'
NC='\033[0m'

PASSED=0
FAILED=0

verify() {
    local check_name="$1"
    local command="$2"
    
    echo -n "Checking $check_name... "
    
    if eval "$command" > /dev/null 2>&1; then
        echo -e "${GREEN}✓ PASS${NC}"
        ((PASSED++))
        return 0
    else
        echo -e "${RED}✗ FAIL${NC}"
        ((FAILED++))
        return 1
    fi
}

verify_version() {
    local name="$1"
    local command="$2"
    local expected_pattern="$3"
    
    echo -n "Checking $name version... "
    
    version=$($command 2>&1)
    
    if echo "$version" | grep -qE "$expected_pattern"; then
        echo -e "${GREEN}✓ PASS${NC} ($version)"
        ((PASSED++))
        return 0
    else
        echo -e "${RED}✗ FAIL${NC}"
        ((FAILED++))
        return 1
    fi
}

echo "1. Core Runtime Verification"
echo "----------------------------"

verify_version "PHP" "php -v | head -n 1" "8\.4\."
verify_version "Node.js" "node -v" "v24\."
verify_version "npm" "npm -v" "[0-9]+\.[0-9]+\.[0-9]+"
verify_version "Composer" "composer -V | cut -d' ' -f3" "2\."

echo ""
echo "2. PHP Extensions"
echo "-----------------"

extensions=("gd" "mbstring" "opcache" "zip" "intl" "exif" "pdo" "curl" "dom" "fileinfo" "xdebug")

for ext in "${extensions[@]}"; do
    verify "PHP Extension: $ext" "php -m | grep -i '^$ext$'"
done

echo ""
echo "3. Opcache JIT"
echo "--------------"

verify "Opcache enabled" "php -i | grep -q 'opcache.enable.*On'"
verify "JIT enabled" "php -i | grep -q 'opcache.jit.*tracing'"

echo ""
echo "=============================================="
echo "Verification Summary"
echo "=============================================="
echo -e "Passed: ${GREEN}$PASSED${NC}"
echo -e "Failed: ${RED}$FAILED${NC}"
echo ""

if [ $FAILED -eq 0 ]; then
    echo -e "${GREEN}✓ All checks passed! DevContainer is ready.${NC}"
    exit 0
else
    echo -e "${RED}✗ Some checks failed.${NC}"
    exit 1
fi
