<?php
/**
 * Path: /site/snippets/blocks/statement-quote.php
 */
$themeClass = $block->theme()->toTheme();
$spacingClass = $block->airy_spacing()->toAiry();
?>
<section class="<?= $themeClass ?> <?= $spacingClass ?> statement-quote" data-gsap="section">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center relative">
            <span class="absolute top-0 left-0 -ml-4 sm:-ml-8 -mt-6 sm:-mt-10 text-6xl sm:text-8xl text-warm-gold opacity-50" aria-hidden="true">&ldquo;</span>
            
            <blockquote class="relative z-10">
                <p class="text-2xl sm:text-3xl lg:text-4xl font-serif font-medium leading-relaxed mb-8">
                    <?= $block->quote()->html() ?>
                </p>
                
                <?php if ($block->author()->isNotEmpty() || $block->role()->isNotEmpty()): ?>
                    <footer class="flex flex-col items-center justify-center">
                        <?php if ($block->author()->isNotEmpty()): ?>
                            <cite class="font-bold text-lg not-italic text-oceanic-accent">
                                <?= $block->author()->html() ?>
                            </cite>
                        <?php endif; ?>
                        
                        <?php if ($block->role()->isNotEmpty()): ?>
                            <span class="text-sm uppercase tracking-wider opacity-70 mt-1">
                                <?= $block->role()->html() ?>
                            </span>
                        <?php endif; ?>
                    </footer>
                <?php endif; ?>
            </blockquote>
        </div>
    </div>
</section>
