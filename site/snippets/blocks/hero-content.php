<?php
/**
 * Path: /site/snippets/blocks/hero-content.php
 * @var \Kirby\Cms\Block $block
 */

$align = $block->alignment()->value();
$alignClass = match($align) {
    'center' => 'text-center mx-auto items-center',
    'right'  => 'text-right ml-auto items-end',
    default  => 'text-left mr-auto items-start',
};

// Backdrop Tint Logic
$tint = $block->backdrop_tint()->value();
$tintClass = match($tint) {
    'frost-light'  => 'bg-canvas/80 backdrop-blur-md p-6 md:p-12 text-ink shadow-lg',
    'frost-dark'   => 'bg-ink/80 backdrop-blur-md p-6 md:p-12 text-canvas shadow-lg',
    'solid-canvas' => 'bg-canvas p-6 md:p-12 text-ink shadow-xl',
    'solid-ink'    => 'bg-ink p-6 md:p-12 text-canvas shadow-xl',
    default        => 'bg-transparent p-0', // Inherits from layout row
};

// Button Alignment
$btnAlignClass = match($align) {
    'center' => 'justify-center',
    'right'  => 'justify-end',
    default  => 'justify-start',
};
?>
<div class="hero-content w-full max-w-4xl <?= $alignClass ?> <?= $tintClass ?>" data-gsap="hero">
    
    <?php if ($block->eyebrow()->isNotEmpty()): ?>
        <span class="block text-label font-bold text-oceanic-accent mb-4 tracking-widest uppercase">
            <?= $block->eyebrow()->html() ?>
        </span>
    <?php endif; ?>
    
    <?php if ($block->heading()->isNotEmpty()): ?>
        <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold leading-tight mb-6">
            <?= $block->heading()->html() ?>
        </h1>
    <?php endif; ?>
    
    <?php if ($block->subheading()->isNotEmpty()): ?>
        <div class="text-xl md:text-2xl opacity-80 max-w-2xl <?= $align === 'center' ? 'mx-auto' : '' ?> mb-8 leading-relaxed">
            <?= $block->subheading()->kt() ?>
        </div>
    <?php endif; ?>

    <?php if ($block->primary_cta_text()->isNotEmpty() || $block->secondary_cta_text()->isNotEmpty()): ?>
        <div class="flex flex-wrap gap-4 mt-8 <?= $btnAlignClass ?>">
            <?php if ($block->primary_cta_text()->isNotEmpty()): ?>
                <a href="<?= $block->primary_cta_link()->toUrl() ?>" class="inline-block bg-(--color-brand-accent) text-white px-8 py-4 rounded font-medium hover:bg-opacity-90 transition-all shadow-md">
                    <?= $block->primary_cta_text()->html() ?>
                </a>
            <?php endif; ?>

            <?php if ($block->secondary_cta_text()->isNotEmpty()): ?>
                <a href="<?= $block->secondary_cta_link()->toUrl() ?>" class="inline-block bg-transparent border-2 border-current px-8 py-4 rounded font-medium hover:bg-ink hover:text-canvas hover:border-ink transition-all">
                    <?= $block->secondary_cta_text()->html() ?>
                </a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

</div>