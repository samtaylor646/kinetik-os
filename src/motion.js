import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import Lenis from 'lenis';

gsap.registerPlugin(ScrollTrigger);

const lenis = new Lenis({
  duration: 1.2,
  easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t))
});

lenis.on('scroll', ScrollTrigger.update);
gsap.ticker.add((time) => lenis.raf(time * 1000));
gsap.ticker.lagSmoothing(0);

export function sectionEntrance(target) {
  const duration = parseFloat(
    getComputedStyle(document.documentElement)
      .getPropertyValue('--kinetik-duration') || '1.2'
  );
  
  return gsap.timeline({
    scrollTrigger: {
      trigger: target,
      start: 'top 80%',
      toggleActions: 'play none none reverse'
    }
  }).from(target, {
    y: 60,
    opacity: 0,
    duration,
    ease: 'power3.out'
  });
}
