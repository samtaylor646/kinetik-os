<?php
/**
 * Path: /site/snippets/blocks/hero-content.php
 * Filename: hero-content.php | Version: v7.8.0
 * Agent: Architect-K
 * Status: Production
 * Logic: Renders the Hero Content block with dynamic theming, boxed layouts, and CTAs.
 * @var \Kirby\Cms\Block $block
 */
declare(strict_types=1);

$align = $block->alignment()->value();
$alignClass = match($align) {
    'center' => 'text-center mx-auto items-center flex flex-col',
    'right'  => 'text-right ml-auto items-end flex flex-col',
    default  => 'text-left mr-auto items-start flex flex-col',
};

// Boxed Layout
$isBoxed = $block->boxed_layout()->toBool(true);
$hasShadow = $block->enable_shadow()->toBool(false);

$boxClasses = '';
if ($isBoxed) {
    $boxClasses = 'p-8 md:p-16 rounded-none';
    if ($hasShadow) {
        $boxClasses .= ' shadow-brutalist-glass border-none backdrop-saturate-150';
    } else {
        $boxClasses .= ' border border-ink/10';
    }
}

// Theme Profile Logic
$themeId = $block->theme()->value();

$containerClasses = [];
$bgOpacity = $block->bg_opacity()->value();
$bgTint = $block->bg_tint()->value();

$opacity = $bgOpacity !== '' ? $bgOpacity : ($bgTint !== '' ? $bgTint : '100');

// Map legacy values
if ($opacity === 'base' || $opacity === 'Solid (100%)') $opacity = '100';
elseif ($opacity === 'Transparent (0%)') $opacity = '0';
elseif (preg_match('/(\d+)/', $opacity, $matches)) {
    $opacity = $matches[1];
}

if ($isBoxed && $themeId) {
    $containerClasses[] = "theme-profile-{$themeId}";
    
    // Apply background opacity logic
    if ($opacity !== '100') {
        $containerClasses[] = "theme-bg-opacity-{$opacity}";
        if ($opacity !== '0') {
            $containerClasses[] = "backdrop-blur-xl";
        }
    }
}

$finalContainerClass = trim("$boxClasses " . implode(' ', $containerClasses ?? []));

// Button Alignment
$btnAlignClass = match($align) {
    'center' => 'justify-center',
    'right'  => 'justify-end',
    default  => 'justify-start',
};

// Primary CTA Href Logic
$primaryHref = '';
if ($block->primary_link_type()->value() === 'page' && $block->primary_cta_page()->isNotEmpty()) {
    $primaryHref = $block->primary_cta_page()->toPage()->url();
} elseif ($block->primary_link_type()->value() === 'anchor') {
    $primaryHref = $block->primary_cta_anchor()->value();
} else {
    $primaryHref = $block->primary_cta_link()->toUrl();
}

// Secondary CTA Href Logic
$secondaryHref = '';
if ($block->secondary_link_type()->value() === 'page' && $block->secondary_cta_page()->isNotEmpty()) {
    $secondaryHref = $block->secondary_cta_page()->toPage()->url();
} elseif ($block->secondary_link_type()->value() === 'anchor') {
    $secondaryHref = $block->secondary_cta_anchor()->value();
} else {
    $secondaryHref = $block->secondary_cta_link()->toUrl();
}
?>
<div class="hero-content w-full max-w-5xl <?= $alignClass ?> <?= $finalContainerClass ?>" data-gsap="hero">
    
    <?php if ($block->eyebrow()->isNotEmpty()): ?>
        <span class="block text-sm md:text-base font-bold tracking-[0.2em] uppercase mb-4 md:mb-6 text-(--profile-text-accent,inherit)">
            <?= $block->eyebrow()->html() ?>
        </span>
    <?php endif; ?>
    
    <?php if ($block->heading()->isNotEmpty()): ?>
        <h1 class="hero-title mb-6 md:mb-8 text-balance">
            <?= $block->heading()->html() ?>
        </h1>
    <?php endif; ?>
    
    <?php if ($block->subheading()->isNotEmpty()): ?>
        <div class="text-xl md:text-2xl lg:text-3xl font-medium opacity-80 max-w-3xl <?= $align === 'center' ? 'mx-auto' : '' ?> mb-8 md:mb-12 leading-snug text-balance">
            <?= $block->subheading()->kt() ?>
        </div>
    <?php endif; ?>

    <?php if ($block->primary_cta_text()->isNotEmpty() || $block->secondary_cta_text()->isNotEmpty()): ?>
        <div class="flex flex-col sm:flex-row flex-wrap gap-4 md:gap-6 mt-4 w-full sm:w-auto <?= $btnAlignClass ?>">
            <?php if ($block->primary_cta_text()->isNotEmpty()): ?>
                <a href="<?= $primaryHref ?>" 
                   class="inline-flex items-center justify-center px-8 py-4 rounded-none font-bold text-lg transition-all duration-300 hover:scale-105 bg-(--profile-pcta-bg,var(--color-ink)) text-(--profile-pcta-text,var(--color-canvas))">
                    <?= $block->primary_cta_text()->html() ?>
                </a>
            <?php endif; ?>

            <?php if ($block->secondary_cta_text()->isNotEmpty()): ?>
                <a href="<?= $secondaryHref ?>" 
                   class="inline-flex items-center justify-center px-8 py-4 rounded-none font-bold text-lg border transition-all duration-300 hover:scale-105 border-(--profile-scta-border,currentColor) text-(--profile-scta-text,currentColor)">
                    <?= $block->secondary_cta_text()->html() ?>
                </a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

</div>
