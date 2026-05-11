<?php
/**
 * Path: /site/snippets/blocks/bento-grid.php
 */
$themeClass = $block->theme()->toTheme();
$spacingClass = $block->airy_spacing()->toAiry();

$layout = $block->layout_type()->value();
$gridClass = match($layout) {
    '2-col' => 'md:grid-cols-2',
    '3-col' => 'md:grid-cols-2 lg:grid-cols-3',
    'asymmetric' => 'md:grid-cols-3 lg:grid-cols-4',
    default => 'md:grid-cols-2 lg:grid-cols-3'
};
?>
<section class="<?= $themeClass ?> <?= $spacingClass ?> bento-grid" data-gsap="section">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 <?= $gridClass ?> gap-airy-sm sm:gap-airy-md auto-rows-auto">
            <?php 
            $items = $block->items()->toBlocks();
            $index = 0;
            foreach ($items as $item): 
                // Asymmetric grid logic (e.g. spanning different columns based on index)
                $spanClass = '';
                if ($layout === 'asymmetric') {
                    if ($index % 5 === 0) {
                        $spanClass = 'md:col-span-2 lg:col-span-2 row-span-2';
                    } elseif ($index % 5 === 3) {
                        $spanClass = 'md:col-span-2 lg:col-span-2';
                    }
                }
            ?>
                <div class="bento-item rounded-2xl overflow-hidden bg-black/5 dark:bg-white/5 border border-black/10 dark:border-white/10 <?= $spanClass ?> flex flex-col">
                    <?= $item ?>
                </div>
            <?php 
                $index++;
            endforeach; 
            ?>
        </div>
    </div>
</section>
