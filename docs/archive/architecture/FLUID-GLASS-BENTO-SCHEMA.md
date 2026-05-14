# Fluid.glass Bento Grid & Layout Engine Schema

## 1. Core Philosophy: The Mathematical Canvas
The "fluid.glass" aesthetic relies on brutalist, high-end structural patterns where the grid acts as a flawless mathematical canvas. To achieve this, our layout engine must enforce **absolute uniformity and extreme gap precision**. Sub-pixel rendering issues or varying margins between components are unacceptable.

## 2. Re-engineering the Bento Grid

### Current State vs. Target State
Currently, blocks like `bento-grid.php` may rely on ad-hoc flexbox or loose CSS grid implementations that can lead to inconsistent gaps or alignment issues depending on content. The target state is a rigid CSS Grid framework where the grid defines the structure, and items conform to it perfectly.

### Blueprint Refactoring (`site/blueprints/blocks/bento-grid.yml`)
- Remove complex layout settings from the blueprint.
- Implement a simple span-based approach (e.g., `col-span-1`, `col-span-2`, `row-span-1`).
- Provide preset layout configurations (e.g., "Hero Split", "Quadrant", "Feature Showcase") rather than allowing arbitrary, hard-to-control dimensions.

### PHP Snippet Refactoring (`site/snippets/blocks/bento-grid.php`)
- **Structure:** The outer container must purely be the grid definition.
```php
<section class="bento-container" data-bento-grid>
    <?php foreach ($block->items()->toBlocks() as $item): ?>
        <article class="bento-item span-<?= $item->colSpan() ?> row-<?= $item->rowSpan() ?>">
            <div class="bento-content-wrapper">
                <!-- Content here -->
            </div>
        </article>
    <?php endphp ?>
</section>
```

### CSS Architecture
- Use `display: grid`.
- Define a strict `var(--grid-gap)` globally.
- Use `gap: var(--grid-gap)` exclusively. Never use margins for structural spacing within the bento grid.
- Ensure items have `overflow: hidden` and a consistent `border-radius` (e.g., `var(--bento-radius)`).
- Use `aspect-ratio` where appropriate to maintain perfect geometric shapes regardless of viewport size.

## 3. Advanced Structural Layouts

### Sticky Asymmetric Columns
This layout pattern involves pinning typographical content on one side while media content scrolls independently on the other.

**DOM Approach:**
```html
<section class="asymmetric-split" data-scroll-section>
    <div class="asymmetric-split__sticky-col" data-sticky-target>
        <div class="asymmetric-split__content">
            <!-- Pinned typography -->
        </div>
    </div>
    <div class="asymmetric-split__scroll-col">
        <!-- Scrolling media blocks -->
        <figure class="media-block">...</figure>
        <figure class="media-block">...</figure>
    </div>
</section>
```
**CSS Strategy:**
- Use CSS `position: sticky; top: 0;` (or calculated header offset) on the `.asymmetric-split__sticky-col`.
- Ensure the parent `.asymmetric-split` has relative positioning and spans the full height of the scrolling content to allow the sticky element to travel along it.

### Horizontal Scroll Sections
Mapping horizontal scrolling to vertical scrolling creates a cinematic, carousel-like experience.

**DOM Approach:**
```html
<section class="horizontal-scroll-section" data-horizontal-scroll>
    <div class="horizontal-scroll-section__track" data-horizontal-track>
        <div class="horizontal-scroll-section__panel">Panel 1</div>
        <div class="horizontal-scroll-section__panel">Panel 2</div>
        <div class="horizontal-scroll-section__panel">Panel 3</div>
    </div>
</section>
```
**CSS Strategy:**
- The `.horizontal-scroll-section` acts as a pin spacer (height is dynamically calculated by GSAP based on track width).
- `.horizontal-scroll-section__track` uses `display: flex` and width is `max-content` or `100vw * number of panels`.

## 4. Motion Layer: GSAP & Lenis Integration

To prepare the DOM for advanced scroll-driven animations and smooth scrolling:

### Lenis Smooth Scrolling Prep
- **Global Wrapper:** Ensure all content is wrapped in a smooth scroll container.
```html
<body>
    <div id="lenis-wrapper" data-lenis-container>
        <main id="main-content">
            <!-- All page content -->
        </main>
    </div>
</body>
```
- **CSS:** Prevent overscroll on body. `body { overscroll-behavior: none; }`.

### GSAP ScrollTrigger Prep
- **Data Attributes:** Use semantic data attributes (`data-scroll-section`, `data-animate-up`, `data-parallax`) instead of specific classes for GSAP targeting. This separates styling logic from animation logic.
- **Hardware Acceleration:** Ensure elements targeted for transforms (especially in the horizontal track or parallax elements) have `will-change: transform` applied via a utility class or GSAP's `force3D: true`.
- **Initialization Context:** When initializing GSAP, use `gsap.context()` bounded to the specific block or section to ensure easy cleanup and prevent memory leaks, especially important in SPA or dynamic routing contexts.

```javascript
// Example JS Initialization concept
let ctx = gsap.context(() => {
    // Horizontal Scroll Logic
    const track = document.querySelector('[data-horizontal-track]');
    gsap.to(track, {
        xPercent: -100,
        x: () => window.innerWidth,
        ease: "none",
        scrollTrigger: {
            trigger: "[data-horizontal-scroll]",
            pin: true,
            scrub: 1,
            end: () => "+=" + document.querySelector('[data-horizontal-track]').offsetWidth
        }
    });
}, sectionElement); // Bound to component