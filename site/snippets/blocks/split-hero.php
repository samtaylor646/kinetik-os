<?php
/**
 * Path: /site/snippets/blocks/split-hero.php
 */
$themeClass = $block->theme()->toTheme();
$spacingClass = $block->airy_spacing()->toAiry();
$image = $block->image()->toFile();
?>
<section class="<?= $themeClass ?> <?= $spacingClass ?> split-hero" data-gsap="section">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row items-center gap-airy-sm lg:gap-airy-md">
            
            <!-- Text Content -->
            <div class="w-full lg:w-1/2">
                <?php if ($block->heading()->isNotEmpty()): ?>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6">
                        <?= $block->heading()->html() ?>
                    </h1>
                <?php endif; ?>
                
                <?php if ($block->subheading()->isNotEmpty()): ?>
                    <div class="text-lg sm:text-xl mb-8 opacity-90 prose prose-lg">
                        <?= $block->subheading()->kt() ?>
                    </div>
                <?php endif; ?>
                
                <?php if ($block->cta_text()->isNotEmpty() && $block->cta_link()->isNotEmpty()): ?>
                    <a href="<?= $block->cta_link()->toUrl() ?>" class="inline-flex items-center gap-2 px-6 py-3 bg-oceanic-accent text-white font-medium rounded hover:bg-oceanic-dark transition-colors focus:ring-2 focus:ring-offset-2 focus:ring-oceanic-accent">
                        <?= $block->cta_text()->html() ?>
                        <?= (new \Kirby\Cms\Field($page, 'icon', 'arrow-right'))->toIcon() ?>
                    </a>
                <?php endif; ?>
            </div>
            
            <!-- Image Content -->
            <div class="w-full lg:w-1/2">
                <?php if ($image): ?>
                    <figure class="relative w-full aspect-square sm:aspect-4/3 rounded-xl overflow-hidden shadow-xl">
                        <img 
                            src="<?= $image->url() ?>" 
                            alt="<?= $image->alt()->html() ?>" 
                            class="absolute inset-0 w-full h-full object-cover"
                            loading="eager"
                        >
                    </figure>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
