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

// Boxed Layout
$isBoxed = $block->boxed_layout()->toBool(true);
$boxClasses = $isBoxed ? 'p-8 md:p-16 rounded-2xl shadow-2xl' : '';

// Theme Profile Logic
$themeId = $block->theme()->value();
$themePage = page('theme');
$siteThemeProfiles = $themePage ? $themePage->color_profiles()->toStructure() : new \Kirby\Cms\Structure();
$selectedProfile = $siteThemeProfiles->findBy('profile_id', $themeId);

$inlineStyles = [];
$bgClass = '';

if ($isBoxed) {
    if ($selectedProfile && $selectedProfile->isNotEmpty()) {
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
        
        // Fallbacks
        if (!$pCtaBg && $text) $inlineStyles[] = "--hero-cta-bg: var(--color-{$text})";
        if (!$pCtaText && $bg) $inlineStyles[] = "--hero-cta-text: var(--color-{$bg})";
    }

    // Opacity Logic
    $bgOpacity = $block->bg_opacity()->value();
    if ($bgOpacity === '') $bgOpacity = '100';

    if ($selectedProfile && $selectedProfile->isNotEmpty()) {
        // We have a theme
        if ($bgOpacity === '100') {
            $bgClass = 'bg-[var(--hero-bg)] text-[var(--hero-text)]';
        } elseif ($bgOpacity === '0') {
            $bgClass = 'bg-transparent text-[var(--hero-text)]';
        } else {
            // Use color-mix for opacity
            $inlineStyles[] = "background-color: color-mix(in srgb, var(--hero-bg) {$bgOpacity}%, transparent)";
            $bgClass = 'backdrop-blur-xl text-[var(--hero-text)]';
        }
    } else {
        // No theme selected, use default canvas/ink
        if ($bgOpacity === '100') {
            $bgClass = 'bg-canvas text-ink';
        } elseif ($bgOpacity === '0') {
            $bgClass = 'bg-transparent';
        } else {
            $inlineStyles[] = "background-color: color-mix(in srgb, var(--color-canvas) {$bgOpacity}%, transparent)";
            $bgClass = 'backdrop-blur-xl text-ink';
        }
    }
}

$styleAttr = !empty($inlineStyles) ? 'style="' . implode('; ', $inlineStyles) . '"' : '';

$finalContainerClass = trim("$boxClasses $bgClass");

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
                   style="<?= ($isBoxed && $selectedProfile && $selectedProfile->isNotEmpty()) ? 'background-color: var(--hero-cta-bg); color: var(--hero-cta-text);' : 'background-color: var(--color-ink); color: var(--color-canvas);' ?>">
                    <?= $block->primary_cta_text()->html() ?>
                </a>
            <?php endif; ?>

            <?php if ($block->secondary_cta_text()->isNotEmpty()): ?>
                <a href="<?= $block->secondary_cta_link()->toUrl() ?>" 
                   class="inline-flex items-center justify-center px-8 py-4 rounded-full font-bold text-lg border-2 transition-all duration-300 hover:scale-105"
                   style="<?= ($isBoxed && $selectedProfile && $selectedProfile->isNotEmpty()) ? 'border-color: var(--hero-scta-border, currentColor); color: var(--hero-scta-text, currentColor);' : 'border-color: currentColor; color: currentColor;' ?>">
                    <?= $block->secondary_cta_text()->html() ?>
                </a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

</div>