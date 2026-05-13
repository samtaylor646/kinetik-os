<?php
/**
 * Horizontal Scroll Carousel Block
 * 
 * Fluid.glass aesthetic block that maps vertical scrolling to horizontal motion.
 * The DOM is structured to support GSAP ScrollTrigger pinning and tracking.
 * 
 * @var \Kirby\Cms\Block $block
 */
$theme = $block->theme()->or('light');
?>
<section class="horizontal-scroll-section" data-horizontal-scroll data-theme="<?= esc($theme, 'attr') ?>" style="overflow: hidden; width: 100vw;">
    <div class="horizontal-scroll-section__track" data-horizontal-track style="display: flex; width: max-content; will-change: transform;">
        <?php foreach ($block->panels()->toBlocks() as $panel): ?>
            <div class="horizontal-scroll-section__panel" style="width: 100vw; flex: 0 0 100vw;">
                <?= $panel ?>
            </div>
        <?php endforeach ?>
    </div>
</section>
