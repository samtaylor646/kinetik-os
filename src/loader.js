/**
 * Path: /src/loader.js
 * Filename: loader.js | Version: v1.2.0
 * Agent: Motion-G
 * Status: Production
 * Logic: Global loading screen animation matching fluid.glass sequence
 */

import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

export function initLoader() {
  const loader = document.getElementById('global-loader');
  const mainContent = document.querySelector('.layout-builder > section:first-child') || document.getElementById('main-content');
  if (!loader || !mainContent) return;

  const logo = loader.querySelector('.loader-logo');
  const monogramPaths = loader.querySelectorAll('.logo-monogram path');
  const letters = loader.querySelectorAll('.logo-text .letter');

  // Initial state for main content
  gsap.set(mainContent, {
    y: "100vh",
    scale: 0.75, // 75% size per user request
    transformOrigin: "center bottom"
  });

  // Setup monogram for line build (no fill)
  monogramPaths.forEach(path => {
    const length = path.getTotalLength();
    gsap.set(path, {
      strokeDasharray: length,
      strokeDashoffset: length,
      fill: "none",
      opacity: 1
    });
  });

  // Setup letters for fade in
  gsap.set(letters, {
    opacity: 0,
    y: 10
  });

  const tl = gsap.timeline();

  // 1. Reveal logo container
  tl.to(logo, {
    opacity: 1,
    duration: 0.5,
    ease: "power2.out"
  })
  // 2. Line build the top portion (monogram)
  .to(monogramPaths, {
    strokeDashoffset: 0,
    duration: 1.5, // 2x faster
    ease: "power3.inOut",
    stagger: 0.05 // tighter stagger
  }, "-=0.2")
  // 3. Assemble letters left to right
  .to(letters, {
    opacity: 1,
    y: 0,
    duration: 0.6, // 2x faster
    ease: "power3.out",
    stagger: 0.05 // faster stagger
  }, "-=0.5");

  window.addEventListener('load', () => {
    const hideLoader = () => {
      // Prepare main content to be on top and transparent
      gsap.set(mainContent, {
        position: "relative",
        zIndex: 10000,
        opacity: 0
      });

      const exitTl = gsap.timeline({
        onComplete: () => {
          loader.style.display = 'none';
          gsap.set(mainContent, { clearProps: "all" });
          
          // Force Lenis and ScrollTrigger to recalculate true dimensions
          // since the mainContent scale change ruins initial height calculations
          window.dispatchEvent(new Event('resize'));
          if (typeof ScrollTrigger !== 'undefined') {
            ScrollTrigger.refresh();
          }
          
          window.dispatchEvent(new CustomEvent('loaderComplete'));
        }
      });

      // Logo elements fade out first
      exitTl.to([logo, letters], {
        opacity: 0,
        duration: 0.6,
        ease: "power2.in"
      })
      // Home page fades in OVER the loading background while sliding/scaling
      .to(mainContent, {
        opacity: 1,
        y: "0vh",
        duration: 1.2,
        ease: "power3.inOut"
      }, "+=0.1")
      // Grows to 100% to fill the screen
      .to(mainContent, {
        scale: 1,
        duration: 1.2,
        ease: "power3.out"
      }, "-=0.4");
    };

    if (tl.isActive()) {
      tl.eventCallback("onComplete", hideLoader);
    } else {
      hideLoader();
    }
  });
}
