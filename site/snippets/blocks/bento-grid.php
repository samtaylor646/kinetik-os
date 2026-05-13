<?php
/**
 * Bento Grid Block Snippet
 * @var \Kirby\Cms\Block $block
 */
$layout = $block->layout_type()->value();
$theme = $block->theme()->value();

// Map layout types to Tailwind CSS grid classes (for outer container)
$gridClass = match($layout) {
    'hero_split' => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3',
    'quadrant' => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-2',
    'feature_showcase' => 'grid-cols-1 md:grid-cols-3 lg:grid-cols-4',
    default => 'grid-cols-1 md:grid-cols-3 lg:grid-cols-4'
};

// Map themes to Tailwind classes
$themeContainerClass = match($theme) {
    'oceanic' => 'bg-oceanic-dark dark text-white',
    'accent' => 'bg-oceanic-accent dark text-white',
    'dark' => 'bg-ink dark text-white',
    'slate' => 'bg-slate-teal dark text-white',
    'liberty' => 'bg-liberty-blue dark text-white',
    'heritage' => 'bg-heritage-red dark text-white',
    'gold' => 'bg-warm-gold text-ink',
    'frost' => 'bg-frost-mint text-ink',
    default => 'bg-canvas text-ink'
};

$themeCellClass = match($theme) {
    'oceanic', 'accent', 'dark', 'slate', 'liberty', 'heritage' => 'bg-white/10 tech-border shadow-xl',
    'gold', 'frost', 'light', '' => 'bg-white tech-border shadow-sm',
    default => 'bg-white tech-border shadow-sm'
};

// Fixed gap strategy per FLUID-GLASS-BENTO-SCHEMA.md
// Instead of margins or variable gaps, we enforce a strict --grid-gap.
?>
<style>
.bento-container[data-bento-grid] {
    display: grid;
    grid-auto-rows: 240px !important;
}
.bento-item {
    border-radius: 0 !important;
    overflow: hidden;
    position: relative;
}
.bento-content-wrapper {
    position: absolute;
    inset: 0;
    overflow: hidden;
    display: flex;
    flex-direction: column;
}
</style>

<section class="bento-container w-full transition-colors duration-500 <?= $themeContainerClass ?> <?= $gridClass ?> grid-flow-dense gap-4 md:gap-6 p-4 md:p-6" data-bento-grid>
    <?php foreach ($block->items()->toBlocks() as $index => $item): ?>
        <?php 
            $colSpanClass = 'col-span-1';
            $rowSpanClass = 'row-span-1'; 

            // True staggered masonry layout
            $pattern = $index % 7;
            
            if ($pattern === 0) {
                $colSpanClass = 'md:col-span-2 lg:col-span-2';
                $rowSpanClass = 'md:row-span-3 lg:row-span-3'; // Large, wide
            } elseif ($pattern === 1) {
                $colSpanClass = 'md:col-span-1 lg:col-span-1';
                $rowSpanClass = 'md:row-span-2 lg:row-span-2'; // Tall
            } elseif ($pattern === 2) {
                $colSpanClass = 'md:col-span-1 lg:col-span-1';
                $rowSpanClass = 'md:row-span-1 lg:row-span-1'; // Small
            } elseif ($pattern === 3) {
                $colSpanClass = 'md:col-span-1 lg:col-span-1';
                $rowSpanClass = 'md:row-span-2 lg:row-span-2'; // Tall
            } elseif ($pattern === 4) {
                $colSpanClass = 'md:col-span-2 lg:col-span-2';
                $rowSpanClass = 'md:row-span-2 lg:row-span-2'; // Wide
            } elseif ($pattern === 5) {
                $colSpanClass = 'md:col-span-1 lg:col-span-1';
                $rowSpanClass = 'md:row-span-3 lg:row-span-3'; // Very tall
            } elseif ($pattern === 6) {
                $colSpanClass = 'md:col-span-1 lg:col-span-1';
                $rowSpanClass = 'md:row-span-1 lg:row-span-1'; // Small
            }
        ?>
        <article class="bento-item bento-cell transition-all hover:scale-[1.01] <?= $themeCellClass ?> <?= $colSpanClass ?> <?= $rowSpanClass ?>">
            <div class="bento-content-wrapper h-full w-full">
                <?= snippet('blocks/bento-items/' . $item->type(), ['block' => $item, 'theme' => $theme]) ?>
            </div>
        </article>
    <?php endforeach ?>
</section>
