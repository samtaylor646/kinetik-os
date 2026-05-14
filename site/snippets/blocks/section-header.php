<?php
/**
 * Path: /site/snippets/blocks/section-header.php
 */
$themeClass = $block->theme()->toTheme();
$spacingClass = $block->airy_spacing()->toAiry();
$alignClass = $block->alignment()->value() === 'center' ? 'text-center mx-auto' : 'text-left';
?>
<header class="<?= $themeClass ?> <?= $spacingClass ?> section-header" data-gsap="section">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl <?= $alignClass ?>">
            <?php if ($block->eyebrow()->isNotEmpty()): ?>
                <span class="block text-label text-oceanic-accent mb-4">
                    <?= $block->eyebrow()->html() ?>
                </span>
            <?php endif; ?>
            
            <?php if ($block->heading()->isNotEmpty()): ?>
                <h2 class="display-text mb-6">
                    <?= $block->heading()->html() ?>
                </h2>
            <?php endif; ?>
            
            <?php if ($block->subheading()->isNotEmpty()): ?>
                <div class="text-xl opacity-70 max-w-2xl <?= $block->alignment()->value() === 'center' ? 'mx-auto' : '' ?> prose prose-lg">
                    <?= $block->subheading()->kt() ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>
