<?php
/**
 * Path: /site/snippets/blocks/asymmetric-image.php
 */
$themeClass = $block->theme()->toTheme();
$spacingClass = $block->airy_spacing()->toAiry();
$image = $block->image()->toFile();
$alignment = $block->alignment()->value();

$flexDirection = $alignment === 'left' ? 'lg:flex-row-reverse' : 'lg:flex-row';
?>
<section class="<?= $themeClass ?> <?= $spacingClass ?> asymmetric-image" data-gsap="section">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col <?= $flexDirection ?> gap-8 lg:gap-16 items-center">
            
            <!-- Empty column or text content later -->
            <div class="w-full lg:w-1/3">
                <?php if ($block->caption()->isNotEmpty()): ?>
                    <p class="text-sm uppercase tracking-widest opacity-80 border-l-2 border-oceanic-accent pl-4 mt-4 lg:mt-0 lg:max-w-xs">
                        <?= $block->caption()->html() ?>
                    </p>
                <?php endif; ?>
            </div>
            
            <!-- Image Column with Parallax -->
            <div class="w-full lg:w-2/3">
                <?php if ($image): ?>
                    <figure class="relative w-full overflow-hidden rounded-2xl shadow-2xl" data-gsap="parallax-container">
                        <!-- Intentionally taller image for parallax scrolling -->
                        <div class="aspect-4/5 sm:aspect-video lg:aspect-4/3 w-full relative">
                            <img 
                                src="<?= $image->url() ?>" 
                                alt="<?= $image->alt()->html() ?>" 
                                class="absolute top-[-10%] left-0 w-full h-[120%] object-cover will-change-transform"
                                data-gsap="parallax-image"
                                loading="lazy"
                            >
                        </div>
                    </figure>
                <?php endif; ?>
            </div>
            
        </div>
    </div>
</section>
