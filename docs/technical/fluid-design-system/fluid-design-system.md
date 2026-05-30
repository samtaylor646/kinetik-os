# Fluid Glass - Design System

This document provides all the foundational UI code extracted from the Fluid Glass website. You can drop these HTML, CSS, and JavaScript snippets directly into your new project to perfectly replicate the components and animations.

## 1. Global Setup (Colors & Fonts)

Add these custom properties to your global CSS stylesheet. Note that you will need to host the Aeonik fonts and update the `@font-face` paths if required.

```css
@font-face {
  font-display: swap;
  font-family: 'Aeonik Mono';
  font-style: normal;
  font-weight: 500;
  src: url('/fonts/AeonikMono-Medium.woff2') format("woff2");
}
@font-face {
  font-display: swap;
  font-family: 'Aeonik Pro';
  font-style: normal;
  font-weight: 400;
  src: url('/fonts/aeonik-regular.woff2') format("woff2");
}

:root {
  /* Fluid Glass Colors */
  --color-black: #000000;
  --color-white: #ffffff;
  --color-cream: #f4f4f0;
  --color-grey: #7a7a7a;
  --color-taupe: #b3a89e;

  /* Fonts */
  --font-f-aeonik-pro: 'Aeonik Pro', sans-serif;
  --font-f-aeonik-mono: 'Aeonik Mono', monospace;
  
  /* Animation Easing */
  --ease-in-out-quad: cubic-bezier(0.455, 0.03, 0.515, 0.955);
}
```

## 2. Typography Components

The signature subtitle component features a small rotated square icon.

**HTML:**
```html
<h3 class="base-title">Our Approach</h3>
```

**CSS:**
```css
.base-title {
  align-items: center;
  display: flex;
  font-family: var(--font-f-aeonik-mono);
  font-size: 1.4rem;
  font-style: normal;
  font-weight: 600;
  letter-spacing: .1em;
  line-height: 1.3;
  text-transform: uppercase;
  color: var(--color-black);
}

.base-title:before {
  background: currentcolor;
  content: "";
  display: block;
  height: .6rem;
  margin-right: 1.2rem;
  transform: rotate(45deg) translateY(-.2rem);
  width: .6rem;
}
```

## 3. Buttons

The primary interactive element. Use modifier classes like `.is-black`, `.is-alpha`, or `.is-white` for variations.

**HTML:**
```html
<!-- Primary Solid Black -->
<a href="#" class="base-button is-black">
  <span class="label">Primary Black</span>
</a>

<!-- Frosted Glass White -->
<a href="#" class="base-button is-white">
  <span class="label">View Collection</span>
</a>
```

**CSS:**
```css
.base-button {
  align-items: center;
  display: inline-flex;
  font-family: var(--font-f-aeonik-mono);
  font-size: 1.2rem;
  font-style: normal;
  font-weight: 500;
  justify-content: center;
  letter-spacing: .08em;
  line-height: 1rem;
  text-transform: uppercase;
  text-decoration: none;
  cursor: pointer;
  border: none;
}
.base-button .label {
  height: 1rem;
  overflow: hidden;
}

.base-button.is-black {
  background: var(--color-black);
  color: var(--color-white);
  padding: 1.5rem 2.4rem;
}

.base-button.is-white {
  background: color-mix(in srgb, var(--color-white) 20%, transparent);
  color: var(--color-white);
  padding: 1.5rem 2.4rem;
  backdrop-filter: blur(2rem);
  -webkit-backdrop-filter: blur(2rem);
}
```

## 4. Glassmorphism Custom Drag Cursor

A frosted glass UI element that follows the user's mouse over specific interactive containers (like image carousels).

**HTML:**
```html
<div class="interactive-container">
  <div class="cursor">Drag</div>
</div>
```

**CSS:**
```css
.interactive-container {
  position: relative;
  overflow: hidden;
  /* e.g. width/height/background image */
}

.cursor {
  align-items: center;
  -webkit-backdrop-filter: blur(2rem);
  backdrop-filter: blur(2rem);
  background: linear-gradient(180deg, #ffffff26, #fff3);
  color: var(--color-white);
  display: flex;
  justify-content: center;
  height: 4.4rem;
  width: 10rem;
  font-family: var(--font-f-aeonik-mono);
  text-transform: uppercase;
  letter-spacing: .08em;
  font-size: 1.2rem;
  pointer-events: none;
  transition: opacity 0.3s ease;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate3d(-50%, -50%, 0);
  border-radius: 4px;
}
```

**JavaScript:**
Make the cursor follow the mouse when hovering over the container.
```javascript
const cursor = document.querySelector('.cursor');
const container = document.querySelector('.interactive-container');

if(cursor && container) {
    container.addEventListener('mousemove', (e) => {
        const rect = container.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        
        cursor.style.transform = `translate3d(${x - 50}px, ${y - 22}px, 0)`;
        cursor.style.left = '0';
        cursor.style.top = '0';
    });
    
    container.addEventListener('mouseenter', () => {
        cursor.style.opacity = '1';
    });
    
    container.addEventListener('mouseleave', () => {
        cursor.style.opacity = '0';
        // Reset back to center when mouse leaves
        setTimeout(() => {
            cursor.style.transform = `translate3d(calc(50% - 50px), calc(50% - 22px), 0)`;
            cursor.style.opacity = '1';
        }, 300);
    });
}
```

## 5. Intro Loading Cube Animation

The 3D isometric spinning cube used during page transitions and loading screens.

**HTML:**
```html
<div class="cube">
  <div class="shape rotate">
    <div class="face face-front"></div>
    <div class="face face-back"></div>
    <div class="face face-right"></div>
    <div class="face face-left"></div>
    <div class="face face-top"></div>
    <div class="face face-bottom"></div>
  </div>
</div>
```

**CSS:**
```css
.cube {
  align-items: center;
  display: flex;
  justify-content: center;
  perspective: 1000px;
  perspective-origin: 50% 50%;
  position: relative;
  width: 100px;
  height: 100px;
}
.shape {
  height: 3rem;
  position: relative;
  transform-style: preserve-3d;
  width: 3rem;
  will-change: transform;
}
.shape.rotate {
  animation: cube-rotate 1.5s var(--ease-in-out-quad) infinite alternate;
}
.face {
  backface-visibility: visible;
  background: var(--color-black);
  height: 3rem;
  position: absolute;
  width: 3rem;
  border: 1px solid rgba(255,255,255,0.2);
}
.face-front  { transform: translateZ(1.5rem); }
.face-back   { transform: rotateY(180deg) translateZ(1.5rem); }
.face-right  { transform: rotateY(90deg) translateZ(1.5rem); }
.face-left   { transform: rotateY(-90deg) translateZ(1.5rem); }
.face-top    { transform: rotateX(90deg) translateZ(1.5rem); }
.face-bottom { transform: rotateX(-90deg) translateZ(1.5rem); }

@keyframes cube-rotate {
  0% { transform: rotateX(-30deg) rotateY(0) rotate(0) scaleY(.78); }
  100% { transform: rotateX(-30deg) rotateY(-315deg) rotate(0) scaleY(.78); }
}

## 6. Forms

Input fields featuring the brand's floating label design pattern.

**HTML:**
```html
<div class="form-group">
  <input type="text" class="input" placeholder=" ">
  <label class="input-label">Email Address</label>
</div>
```

**CSS:**
```css
.form-group {
  position: relative;
  width: 100%;
  max-width: 400px;
  margin-bottom: 2rem;
}

.input {
  border: 1px solid color-mix(in srgb, var(--color-grey) 20%, transparent);
  font-family: var(--font-f-aeonik-pro);
  font-size: 1.4rem;
  font-weight: 400;
  height: 6rem;
  padding: 2.5rem 2rem 1rem;
  width: 100%;
  box-sizing: border-box;
  background: var(--color-white);
  color: var(--color-black);
  outline: none;
  transition: border-color 0.2s ease;
}

.input:focus {
  border-color: var(--color-black);
}

.input-label {
  position: absolute;
  left: 2rem;
  top: 2rem;
  font-family: var(--font-f-aeonik-mono);
  font-size: 1rem;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: var(--color-grey);
  pointer-events: none;
  transition: all 0.2s ease;
}

.input:focus ~ .input-label,
.input:not(:placeholder-shown) ~ .input-label {
  top: 1rem;
  font-size: 0.8rem;
}
```

## 7. Accordion / FAQ

Expandable content panels used for FAQs and detail lists.

**HTML:**
```html
<div class="accordion">
  <div class="accordion-item">
    <button class="accordion-header">
      What is structural glazing?
      <div class="accordion-icon"></div>
    </button>
    <div class="accordion-body">
      Structural glazing is a system of bonding glass...
    </div>
  </div>
</div>
```

**CSS:**
```css
.accordion {
  width: 100%;
  max-width: 800px;
  border-top: 1px solid #e0e0e0;
}

.accordion-item {
  border-bottom: 1px solid #e0e0e0;
  overflow: hidden;
}

.accordion-header {
  width: 100%;
  text-align: left;
  background: none;
  border: none;
  padding: 2rem 0;
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-family: var(--font-f-aeonik-pro);
  font-size: 1.6rem;
  font-weight: 400;
  color: var(--color-black);
  cursor: pointer;
}

.accordion-icon {
  width: 2rem;
  height: 2rem;
  position: relative;
  transition: transform 0.3s ease;
}

.accordion-icon::before,
.accordion-icon::after {
  content: '';
  position: absolute;
  background-color: var(--color-black);
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.accordion-icon::before {
  width: 100%;
  height: 2px;
}

.accordion-icon::after {
  height: 100%;
  width: 2px;
}

.accordion-item.is-active .accordion-icon {
  transform: rotate(45deg);
}

.accordion-body {
  max-height: 0;
  opacity: 0;
  transition: all 0.3s ease;
  font-family: var(--font-f-aeonik-pro);
  font-size: 1.2rem;
  color: var(--color-grey);
  line-height: 1.6;
}

.accordion-item.is-active .accordion-body {
  max-height: 500px;
  opacity: 1;
  padding-bottom: 2rem;
}
```

**JavaScript:**
```javascript
document.querySelectorAll('.accordion-header').forEach(button => {
  button.addEventListener('click', () => {
    const item = button.parentElement;
    item.classList.toggle('is-active');
  });
});
```
