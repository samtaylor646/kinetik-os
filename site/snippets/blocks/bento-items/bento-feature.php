<?php
/**
 * Bento Feature Cell Snippet
 * @var \Kirby\Cms\Block $block
 */
?>
<div class="p-8 flex flex-col h-full justify-center">
  <?php if ($block->icon()->isNotEmpty()): ?>
    <div class="w-12 h-12 bg-black/5 rounded-xl flex items-center justify-center mb-6">
      <?php 
        $iconPath = kirby()->root('base') . '/assets/icons/' . $block->icon() . '.svg';
        if(\Kirby\Filesystem\F::exists($iconPath)) {
            // Read SVG and apply Tailwind classes directly to the svg tag
            $svg = \Kirby\Filesystem\F::read($iconPath);
            echo str_replace('<svg', '<svg class="w-6 h-6 fill-current"', $svg);
        }
      ?>
    </div>
  <?php endif ?>
  <?php if ($block->title()->isNotEmpty()): ?>
    <h3 class="text-2xl font-bold mb-4"><?= $block->title() ?></h3>
  <?php endif ?>
  <?php if ($block->text()->isNotEmpty()): ?>
    <div class="prose prose-sm opacity-80">
      <?= $block->text()->kt() ?>
    </div>
  <?php endif ?>
</div>
