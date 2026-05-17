<?php
/**
 * Path: /site/snippets/blocks/bento-items/bento-standard.php
 * Filename: bento-standard.php | Version: v7.8.0
 * Agent: Architect-K
 * Status: Production
 * Logic: Standard card for Bento Grid with WCAG compliant media handling
 * 
 * @var \Kirby\Cms\Block $block
 */

declare(strict_types=1);

$media = $block->image()->toFile();
$altText = '';

if ($media) {
    if ($block->alt_text()->isNotEmpty()) {
        $altText = $block->alt_text()->escape();
    } else {
        $altText = $media->alt()->isNotEmpty() ? $media->alt()->escape() : '';
    }
}
?>
<div class="flex flex-col h-full">
  <?php if ($media): ?>
    <figure class="w-full aspect-[4/3] overflow-hidden bg-black/5">
      <?php if ($media->type() === 'video'): ?>
        <?php if ($altText): ?>
          <video src="<?= $media->url() ?>" aria-label="<?= $altText ?>" class="w-full h-full object-cover" autoplay muted loop playsinline></video>
        <?php else: ?>
          <video src="<?= $media->url() ?>" aria-hidden="true" class="w-full h-full object-cover" autoplay muted loop playsinline></video>
        <?php endif ?>
      <?php else: ?>
        <?php snippet('image', ['file' => $media, 'alt' => $altText, 'class' => 'w-full h-full object-cover']) ?>
      <?php endif ?>
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
