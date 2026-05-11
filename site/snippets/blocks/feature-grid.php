<?php
/**
 * Path: /site/snippets/blocks/feature-grid.php
 */
$themeClass = $block->theme()->toTheme();
$spacingClass = $block->airy_spacing()->toAiry();

$columns = $block->columns()->value();
$gridClass = match($columns) {
    '2' => 'md:grid-cols-2',
    '4' => 'md:grid-cols-2 lg:grid-cols-4',
    default => 'md:grid-cols-2 lg:grid-cols-3'
};
?>
<section class="<?= $themeClass ?> <?= $spacingClass ?> feature-grid" data-gsap="section">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 <?= $gridClass ?> gap-airy-sm sm:gap-airy-md">
            <?php foreach ($block->features()->toStructure() as $feature): ?>
                <div class="feature-item p-6 rounded-xl bg-black/5 dark:bg-white/5 transition-transform hover:-translate-y-1">
                    <?php if ($feature->icon()->isNotEmpty()): ?>
                        <div class="w-12 h-12 mb-6 rounded-lg bg-oceanic-accent text-white flex items-center justify-center">
                            <?= $feature->icon()->toIcon() ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($feature->title()->isNotEmpty()): ?>
                        <h3 class="text-xl font-bold mb-3">
                            <?= $feature->title()->html() ?>
                        </h3>
                    <?php endif; ?>
                    
                    <?php if ($feature->description()->isNotEmpty()): ?>
                        <div class="text-base opacity-80 prose">
                            <?= $feature->description()->kt() ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
