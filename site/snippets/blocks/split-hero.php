<?php
/**
 * Path: /site/snippets/blocks/split-hero.php
 * @var \Kirby\Cms\Block $block
 * @var \Kirby\Cms\Page $page
 */
$themeClass = $block->theme()->toTheme();
$spacingClass = $block->airy_spacing()->toAiry();
$image = $block->image()->toFile();
$bgVideo = $block->background_video()->toFile();
$videoFit = $block->video_fit()->value() === 'contain' ? 'inset-0 w-full h-full object-contain bg-black' : 'inset-0 w-full h-full object-cover';
$bgWidth = $block->background_width()->value();

$overlayOpacity = $block->video_overlay_opacity()->isEmpty() ? 60 : $block->video_overlay_opacity()->toInt();
$videoOpacity = (100 - $overlayOpacity) / 100;
$blendMode = $overlayOpacity > 0 ? 'mix-blend-overlay' : 'mix-blend-normal';

// Determine wrapper classes based on width setting
$outerClass = $bgWidth === 'contained' ? '' : $themeClass;
$innerClass = $bgWidth === 'contained' ? $themeClass . ' tech-border' : '';
?>
<section class="<?= $outerClass ?> split-hero w-screen relative left-1/2 right-1/2 -mx-[50vw] p-0 max-w-none overflow-hidden" data-gsap="section">
    <?php if ($bgVideo && $bgWidth !== 'contained'): ?>
        <div class="absolute w-full h-full inset-0 z-0 overflow-hidden">
            <video autoplay loop muted playsinline class="absolute <?= $videoFit ?> <?= $blendMode ?> pointer-events-none" style="opacity: <?= $videoOpacity ?>;">
                <source src="<?= $bgVideo->url() ?>" type="<?= $bgVideo->mime() ?>">
            </video>
        </div>
    <?php endif; ?>

    <div class="w-full relative z-10 <?= $innerClass ?> overflow-hidden min-h-[85vh] lg:min-h-screen flex items-center <?= $spacingClass ?>">
        <?php if ($bgVideo && $bgWidth === 'contained'): ?>
            <div class="absolute w-full h-full inset-0 z-0 overflow-hidden">
                <video autoplay loop muted playsinline class="absolute <?= $videoFit ?> <?= $blendMode ?> pointer-events-none" style="opacity: <?= $videoOpacity ?>;">
                    <source src="<?= $bgVideo->url() ?>" type="<?= $bgVideo->mime() ?>">
                </video>
            </div>
        <?php endif; ?>
        
        <div class="flex flex-col lg:flex-row items-center gap-airy-sm lg:gap-airy-md w-full relative z-10 py-24 px-4 lg:px-12">
            
            <!-- Text Content -->
            <div class="w-full lg:w-1/2">
                <?php if ($block->heading()->isNotEmpty()): ?>
                    <h1 class="hero-title mb-8">
                        <?= $block->heading()->html() ?>
                    </h1>
                <?php endif; ?>
                
                <?php if ($block->subheading()->isNotEmpty()): ?>
                    <div class="display-text mb-12 opacity-80 max-w-2xl">
                        <?= $block->subheading()->kt() ?>
                    </div>
                <?php endif; ?>
                
                <?php if ($block->cta_text()->isNotEmpty() && $block->cta_link()->isNotEmpty()): ?>
                    <a href="<?= $block->cta_link()->toUrl() ?>" class="inline-flex items-center gap-4 px-8 py-5 bg-oceanic-accent text-white uppercase tracking-[0.2em] font-bold text-sm hover:bg-oceanic-dark transition-colors focus:ring-2 focus:ring-offset-2 focus:ring-oceanic-accent tech-border">
                        <?= $block->cta_text()->html() ?>
                        <?= (new \Kirby\Content\Field($page, 'icon', 'arrow-right'))->toIcon() ?>
                    </a>
                <?php endif; ?>
            </div>
            
            <!-- Image Content -->
            <div class="w-full lg:w-1/2">
                <?php if ($image): ?>
                    <figure class="relative w-full aspect-square sm:aspect-[4/3] overflow-hidden  tech-border group">
                        <img 
                            src="<?= $image->url() ?>" 
                            alt="<?= $image->alt()->html() ?>" 
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-[2s] group-hover:scale-105"
                            loading="eager"
                        >
                    </figure>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
