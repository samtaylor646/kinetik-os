/**
 * Path: /src/main.js
 * Filename: main.js | Version: v7.8.0
 * Agent: Logic-A
 * Status: Production
 * Logic: Alpine.js initialization and CSS import (GSAP deferred to Week 5)
 */

import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';
import collapse from '@alpinejs/collapse';
import morph from '@alpinejs/morph';

// Import styles
import './index.css';

// Register Alpine plugins
Alpine.plugin(intersect);
Alpine.plugin(collapse);
Alpine.plugin(morph);

// Global Alpine data components will be added in Week 3-4
// Placeholder for future component registration

// Start Alpine
Alpine.start();

// Export for The Handshake (Motion-G will use in Week 5)
window.Alpine = Alpine;

console.log('✅ Kinetik-OS v7.8.0 initialized');