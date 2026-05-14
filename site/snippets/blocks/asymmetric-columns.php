<?php
/**
 * Path: /site/snippets/blocks/asymmetric-columns.php
 * @var \Kirby\Cms\Block $block
 */
$themeClass = $block->theme()->toTheme();
$spacingClass = $block->airy_spacing()->toAiry();
$alignment = $block->alignment()->value();

$flexDirection = $alignment === 'left' ? 'lg:flex-row' : 'lg:flex-row-reverse';
?>
<section class="<?= $themeClass ?> <?= $spacingClass ?> asymmetric-split relative" data-scroll-section>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="flex flex-col <?= $flexDirection ?> gap-8 lg:gap-16 items-start relative">
            
            <!-- Sticky Typography Column -->
            <div class="w-full lg:w-1/3 lg:sticky lg:top-24 lg:h-max" data-sticky-target>
                <div class="asymmetric-split__content">
                    <?php if ($block->heading()->isNotEmpty()): ?>
                        <h2 class="display-text mb-8"><?= $block->heading()->html() ?></h2>
                    <?php endif; ?>
                    
                    <?php if ($block->text()->isNotEmpty()): ?>
                        <div class="prose prose-xl opacity-80 font-light">
                            <?= $block->text()->html() ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Scrolling Media Column -->
            <div class="w-full lg:w-2/3 asymmetric-split__scroll-col flex flex-col gap-12 lg:gap-24">
                <?php foreach ($block->media_blocks()->toBlocks() as $mediaBlock): ?>
                    <div class="media-block">
                        <?= $mediaBlock ?>
                    </div>
                <?php endforeach; ?>
            </div>
            
        </div>
    </div>
</section>
