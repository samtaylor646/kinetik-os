<?php
/**
 * Bento Stat Cell Snippet
 */
?>
<div class="p-8 flex flex-col justify-center h-full text-center">
  <?php if ($block->stat()->isNotEmpty()): ?>
    <div class="text-5xl font-black text-brand mb-2"><?= $block->stat() ?></div>
  <?php endif ?>
  <?php if ($block->label()->isNotEmpty()): ?>
    <div class="text-lg font-bold uppercase tracking-wider mb-2"><?= $block->label() ?></div>
  <?php endif ?>
  <?php if ($block->text()->isNotEmpty()): ?>
    <p class="opacity-70 text-sm"><?= $block->text() ?></p>
  <?php endif ?>
</div>
