<?php
/**
 * Bento Standard Cell Snippet
 */
$image = $block->image()->toFile();
?>
<div class="flex flex-col h-full">
  <?php if ($image): ?>
    <figure class="w-full aspect-[4/3] overflow-hidden bg-black/5">
      <img src="<?= $image->url() ?>" alt="<?= $image->alt() ?>" class="w-full h-full object-cover">
    </figure>
  <?php endif ?>
  <div class="p-6 flex flex-col grow">
    <?php if ($block->title()->isNotEmpty()): ?>
      <h3 class="text-xl font-bold mb-2"><?= $block->title() ?></h3>
    <?php endif ?>
    <?php if ($block->text()->isNotEmpty()): ?>
      <div class="prose prose-sm opacity-80">
        <?= $block->text()->kt() ?>
      </div>
    <?php endif ?>
  </div>
</div>
