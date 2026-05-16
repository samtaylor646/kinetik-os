<?php
/**
 * Path: /site/snippets/blocks/hero-content.php
 * @var \Kirby\Cms\Block $block
 */

$align = $block->alignment()->value();
$alignClass = match($align) {
    'center' => 'text-center mx-auto items-center flex flex-col',
    'right'  => 'text-right ml-auto items-end flex flex-col',
    default  => 'text-left mr-auto items-start flex flex-col',
};

// Theme Profile Logic
$themeId = $block->theme()->value();
$themePage = page('theme');
$siteThemeProfiles = $themePage ? $themePage->color_profiles()->toStructure() : new \Kirby\Cms\Structure();
$selectedProfile = $siteThemeProfiles->findBy('profile_id', $themeId);

$inlineStyles = [];
$themeClass = '';

if ($selectedProfile && $selectedProfile->isNotEmpty()) {
    $themeClass = 'p-8 md:p-16 rounded-2xl shadow-2xl';
    
    $bg = $selectedProfile->bg_color()->value();
    $text = $selectedProfile->text_color()->value();
    $pCtaBg = $selectedProfile->primary_cta_bg()->value();
    $pCtaText = $selectedProfile->primary_cta_text()->value();
    $sCtaBorder = $selectedProfile->secondary_cta_border()->value();
    $sCtaText = $selectedProfile->secondary_cta_text()->value();

    if ($bg) $inlineStyles[] = "--hero-bg: var(--color-{$bg})";
    if ($text) $inlineStyles[] = "--hero-text: var(--color-{$text})";
    if ($pCtaBg) $inlineStyles[] = "--hero-cta-bg: var(--color-{$pCtaBg})";
    if ($pCtaText) $inlineStyles[] = "--hero-cta-text: var(--color-{$pCtaText})";
    if ($sCtaBorder) $inlineStyles[] = "--hero-scta-border: var(--color-{$sCtaBorder})";
    if ($sCtaText) $inlineStyles[] = "--hero-scta-text: var(--color-{$sCtaText})";
    
    // Fallbacks if some colors are missing from profile
    if (!$pCtaBg && $text) $inlineStyles[] = "--hero-cta-bg: var(--color-{$text})";
    if (!$pCtaText && $bg) $inlineStyles[] = "--hero-cta-text: var(--color-{$bg})";
}

$styleAttr = !empty($inlineStyles) ? 'style="' . implode('; ', $inlineStyles) . '"' : '';

$tint = $block->backdrop_tint()->value();

// Base classes for a boxed hero
$isBoxed = $selectedProfile || ($tint && !in_array($tint, ['transparent-light', 'transparent-dark']));
$boxClasses = $isBoxed ? 'p-8 md:p-16 rounded-2xl shadow-2xl' : '';

$tintBgClass = match($tint) {
    'glass-light-20' => 'bg-canvas/20 backdrop-blur-xl',
    'glass-light-50' => 'bg-canvas/50 backdrop-blur-xl',
    'glass-light-80' => 'bg-canvas/80 backdrop-blur-xl',
    'glass-dark-20'  => 'bg-ink/20 backdrop-blur-xl',
    'glass-dark-50'  => 'bg-ink/50 backdrop-blur-xl',
    'glass-dark-80'  => 'bg-ink/80 backdrop-blur-xl',
    'solid-canvas' => 'bg-canvas',
    'solid-ink'    => 'bg-ink',
    'transparent-light', 'transparent-dark' => '',
    default        => '', // Inherits from layout row or theme profile
};

$tintTextClass = match($tint) {
    'glass-light-20', 'glass-light-50', 'glass-light-80', 'solid-canvas', 'transparent-dark' => 'text-ink',
    'glass-dark-20', 'glass-dark-50', 'glass-dark-80', 'solid-ink', 'transparent-light'   => 'text-canvas',
    default => '',
};

// If a profile is applied, we'll use these custom properties for colors
// Otherwise we'll let it inherit from the parent container or tint
$themeBgClass = $selectedProfile ? 'bg-[var(--hero-bg)]' : '';
$themeTextClass = $selectedProfile ? 'text-[var(--hero-text)]' : '';

// Tint background overrides theme background, but theme text overrides tint text
$finalBgClass = $tintBgClass ?: $themeBgClass;
$finalTextClass = $themeTextClass ?: $tintTextClass;

$finalContainerClass = trim("$boxClasses $finalBgClass $finalTextClass");

// Button Alignment
$btnAlignClass = match($align) {
    'center' => 'justify-center',
    'right'  => 'justify-end',
    default  => 'justify-start',
};
?>
<div class="hero-content w-full max-w-5xl <?= $alignClass ?> <?= $finalContainerClass ?>" <?= $styleAttr ?> data-gsap="hero">
    
    <?php if ($block->eyebrow()->isNotEmpty()): ?>
        <span class="block text-sm md:text-base font-bold tracking-[0.2em] uppercase mb-4 md:mb-6 opacity-90">
            <?= $block->eyebrow()->html() ?>
        </span>
    <?php endif; ?>
    
    <?php if ($block->heading()->isNotEmpty()): ?>
        <h1 class="text-5xl md:text-6xl lg:text-7xl xl:text-8xl font-extrabold leading-[1.05] tracking-tight mb-6 md:mb-8 text-balance">
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
                <a href="<?= $block->primary_cta_link()->toUrl() ?>" 
                   class="inline-flex items-center justify-center px-8 py-4 rounded-full font-bold text-lg transition-all duration-300 hover:scale-105 shadow-xl hover:shadow-2xl"
                   style="<?= $selectedProfile ? 'background-color: var(--hero-cta-bg); color: var(--hero-cta-text);' : 'background-color: var(--color-ink); color: var(--color-canvas);' ?>">
                    <?= $block->primary_cta_text()->html() ?>
                </a>
            <?php endif; ?>

            <?php if ($block->secondary_cta_text()->isNotEmpty()): ?>
                <a href="<?= $block->secondary_cta_link()->toUrl() ?>" 
                   class="inline-flex items-center justify-center px-8 py-4 rounded-full font-bold text-lg border-2 transition-all duration-300 hover:scale-105"
                   style="<?= $selectedProfile ? 'border-color: var(--hero-scta-border, currentColor); color: var(--hero-scta-text, currentColor);' : 'border-color: currentColor; color: currentColor;' ?>">
                    <?= $block->secondary_cta_text()->html() ?>
                </a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

</div>