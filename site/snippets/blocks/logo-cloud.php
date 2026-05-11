<?php
/**
 * Logo Cloud Block
 * Block 12
 * 
 * @var \Kirby\Cms\Block $block
 */
$logos = $block->logos()->toFiles();
?>
<section class="<?= $block->airy_spacing()->toAiry() ?> bg-canvas text-ink px-4">
    <div class="max-w-6xl mx-auto">
        <?php if ($block->heading()->isNotEmpty()): ?>
            <h3 class="text-center text-sm uppercase tracking-wider text-oceanic-dark mb-8 font-semibold">
                <?= $block->heading()->html() ?>
            </h3>
        <?php endif ?>

        <?php if ($logos->count() > 0): ?>
            <div class="flex flex-wrap justify-center items-center gap-8 md:gap-16">
                <?php foreach ($logos as $logo): ?>
                    <div class="w-32 md:w-40 flex items-center justify-center opacity-60 hover:opacity-100 grayscale hover:grayscale-0 transition-all duration-300">
                        <img 
                            src="<?= $logo->url() ?>" 
                            alt="<?= $logo->alt()->or('Logo') ?>" 
                            class="max-w-full h-auto object-contain"
                            loading="lazy"
                        >
                    </div>
                <?php endforeach ?>
            </div>
        <?php endif ?>
    </div>
</section>
