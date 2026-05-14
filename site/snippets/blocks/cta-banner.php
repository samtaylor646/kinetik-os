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
            <h2 class="display-text"><?= $block->heading()->html() ?></h2>
        <?php endif ?>
        
        <?php if ($block->text()->isNotEmpty()): ?>
            <div class="text-xl md:text-2xl opacity-90 max-w-2xl mx-auto font-light">
                <?= $block->text()->kirbytext() ?>
            </div>
        <?php endif ?>

        <?php if ($block->buttons()->isNotEmpty()): ?>
            <div class="flex flex-wrap items-center justify-center gap-4 pt-4">
                <?php foreach ($block->buttons()->toStructure() as $btn): ?>
                    <?php 
                    $styleClass = match($btn->style()->value()) {
                        'primary' => 'bg-oceanic-accent text-white hover:bg-oceanic-dark tech-border',
                        'secondary' => 'bg-transparent text-current hover:bg-ink/5 tech-border',
                        'ghost' => 'bg-transparent text-current hover:bg-current hover:text-canvas tech-border',
                        default => 'bg-oceanic-accent text-white hover:bg-oceanic-dark tech-border'
                    };
                    ?>
                    <a href="<?= $btn->url() ?>" class="inline-flex items-center justify-center px-8 py-5 text-label transition-colors duration-300 <?= $styleClass ?>">
                        <?= $btn->label()->html() ?>
                    </a>
                <?php endforeach ?>
            </div>
        <?php endif ?>
    </div>
</section>
