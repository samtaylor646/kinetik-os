<?php
/**
 * Bento Grid Block Snippet
 * @var \Kirby\Cms\Block $block
 */
$layout = $block->layout_type()->value();
$theme = $block->theme()->value();
$spacing = $block->airy_spacing()->value();

// Map layout types to Tailwind CSS grid classes
$gridClass = match($layout) {
    '2-col' => 'grid-cols-1 md:grid-cols-2',
    '3-col' => 'grid-cols-1 md:grid-cols-3',
    'asymmetric' => 'grid-cols-1 md:grid-cols-4 lg:grid-cols-6',
    default => 'grid-cols-1 md:grid-cols-3'
};

// Map spacing to gap utility classes
$gapClass = match($spacing) {
    'sm' => 'gap-4',
    'md' => 'gap-8',
    'lg' => 'gap-12',
    'xl' => 'gap-16',
    default => 'gap-8'
};

// Map themes to Tailwind classes (using Design System colors)
$themeContainerClass = match($theme) {
    'oceanic' => 'bg-oceanic-dark dark text-white tech-border',
    'accent' => 'bg-oceanic-accent dark text-white tech-border',
    'dark' => 'bg-ink dark text-white tech-border',
    'slate' => 'bg-slate-teal dark text-white tech-border',
    'liberty' => 'bg-liberty-blue dark text-white tech-border',
    'heritage' => 'bg-heritage-red dark text-white tech-border',
    'gold' => 'bg-warm-gold text-ink tech-border',
    'frost' => 'bg-frost-mint text-ink tech-border',
    default => 'bg-canvas text-ink tech-border' // light
};

$themeCellClass = match($theme) {
    'oceanic' => 'bg-white/5 border-white/20 shadow-xl',
    'accent' => 'bg-white/5 border-white/20 shadow-xl',
    'dark' => 'bg-white/5 border-white/10 shadow-xl',
    'slate' => 'bg-white/5 border-white/20 shadow-xl',
    'liberty' => 'bg-white/5 border-white/20 shadow-xl',
    'heritage' => 'bg-white/5 border-white/20 shadow-xl',
    'gold' => 'bg-white tech-border shadow-sm',
    'frost' => 'bg-white tech-border shadow-sm',
    default => 'bg-white tech-border shadow-sm' // light
};
?>
<div class="bento-grid w-full p-6 md:p-12 transition-colors duration-500 <?= $themeContainerClass ?>">
  <div class="grid <?= $gridClass ?> <?= $gapClass ?>">
    <?php foreach ($block->items()->toBlocks() as $index => $item): ?>
      <?php 
        // Logic for asymmetric grid spanning
        $spanClass = '';
        if ($layout === 'asymmetric') {
           if ($index === 0) {
              $spanClass = 'md:col-span-2 lg:col-span-2 row-span-2'; // Tall cell
           } elseif ($index === 1) {
              $spanClass = 'md:col-span-2 lg:col-span-4 row-span-2'; // Wide/Hero cell
           } elseif ($index === 2) {
              $spanClass = 'md:col-span-2 lg:col-span-2'; // Square cell
           } elseif ($index === 3) {
              $spanClass = 'md:col-span-2 lg:col-span-2'; // Square cell
           } elseif ($index === 4) {
              $spanClass = 'md:col-span-2 lg:col-span-2'; // Square cell
           } elseif ($index === 5) {
              $spanClass = 'md:col-span-4 lg:col-span-3 row-span-2'; // Wide cell
           } else {
              $spanClass = 'md:col-span-2 lg:col-span-3'; // Default
           }
        }
      ?>
      <div class="bento-cell overflow-hidden transition-all hover:scale-[1.01] <?= $themeCellClass ?> <?= $spanClass ?>">
        <?= snippet('blocks/bento-items/' . $item->type(), ['block' => $item, 'theme' => $theme]) ?>
      </div>
    <?php endforeach ?>
  </div>
</div>
