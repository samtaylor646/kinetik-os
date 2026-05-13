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
import Lenis from 'lenis';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

// Import styles
import './index.css';
import { sectionEntrance } from './motion.js';

// Register Alpine plugins
Alpine.plugin(intersect);
Alpine.plugin(collapse);
Alpine.plugin(morph);

// Global Alpine data components will be added in Week 3-4
// Placeholder for future component registration

// The Handshake (Alpine -> GSAP)
Alpine.directive('motion-entrance', (el) => {
  sectionEntrance(el);
});

window.sectionEntrance = sectionEntrance;

// Start Alpine
Alpine.start();

// Export for The Handshake (Motion-G will use in Week 5)
window.Alpine = Alpine;

// Initialize Lenis
const lenis = new Lenis({
  wrapper: document.querySelector('[data-lenis-container]'),
  content: document.querySelector('#main-content'),
  lerp: 0.1,
  duration: 1.2,
  smoothWheel: true,
});

lenis.on('scroll', ScrollTrigger.update);

gsap.ticker.add((time) => {
  lenis.raf(time * 1000);
});
gsap.ticker.lagSmoothing(0);

// Initialize Horizontal Scroll Sections
const initHorizontalScroll = () => {
  const horizontalSections = document.querySelectorAll('[data-horizontal-scroll]');
  
  horizontalSections.forEach((section) => {
    let ctx = gsap.context(() => {
      const track = section.querySelector('[data-horizontal-track]');
      if (!track) return;

      // The distance to scroll is the track's width minus the viewport width
      const scrollWidth = track.scrollWidth - window.innerWidth;

      gsap.to(track, {
        x: -scrollWidth,
        ease: "none",
        scrollTrigger: {
          trigger: section,
          pin: true,
          scrub: 1,
          end: () => "+=" + scrollWidth,
          invalidateOnRefresh: true
        }
      });
    }, section);
  });
};

// Run after Alpine initializes or DOM is ready
document.addEventListener("DOMContentLoaded", () => {
  initHorizontalScroll();
});

console.log('✅ Kinetik-OS v7.8.0 initialized');