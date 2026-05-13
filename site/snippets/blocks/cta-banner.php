<?php
/**
 * CTA Banner Block
 * Block 8
 * 
 * @var \Kirby\Cms\Block $block
 */
?>
<section class="<?= $block->airy_spacing()->toAiry() ?> <?= $block->theme()->toTheme() ?> flex flex-col items-center justify-center text-center px-4">
    <div class="max-w-3xl mx-auto space-y-airy-sm">
        <?php if ($block->heading()->isNotEmpty()): ?>
            <h2 class="text-3xl md:text-5xl font-bold"><?= $block->heading()->html() ?></h2>
        <?php endif ?>
        
        <?php if ($block->text()->isNotEmpty()): ?>
            <div class="text-lg md:text-xl opacity-90 max-w-2xl mx-auto prose prose-lg prose-invert">
                <?= $block->text()->kirbytext() ?>
            </div>
        <?php endif ?>

        <?php if ($block->buttons()->isNotEmpty()): ?>
            <div class="flex flex-wrap items-center justify-center gap-4 pt-4">
                <?php foreach ($block->buttons()->toStructure() as $btn): ?>
                    <?php 
                    $styleClass = match($btn->style()->value()) {
                        'primary' => 'bg-oceanic-accent text-canvas hover:bg-oceanic-dark border-2 border-oceanic-accent hover:border-oceanic-dark',
                        'secondary' => 'bg-canvas text-oceanic-dark hover:bg-ink/10 border-2 border-canvas',
                        'ghost' => 'bg-transparent text-current hover:bg-current hover:text-canvas border-2 border-current',
                        default => 'bg-oceanic-accent text-canvas hover:bg-oceanic-dark border-2 border-oceanic-accent hover:border-oceanic-dark'
                    };
                    ?>
                    <a href="<?= $btn->url() ?>" class="inline-flex items-center justify-center min-h-12 px-8 py-3  font-semibold transition-colors duration-300 <?= $styleClass ?>">
                        <?= $btn->label()->html() ?>
                    </a>
                <?php endforeach ?>
            </div>
        <?php endif ?>
    </div>
</section>
