<?php
/**
 * Bento Media Cell Snippet
 * @var \Kirby\Cms\Block $block
 */
$image = $block->image()->toFile();
?>
<?php if ($image): ?>
  <figure class="absolute inset-0 w-full h-full m-0 p-0 overflow-hidden">
    <img src="<?= $image->url() ?>" alt="<?= $image->alt() ?>" class="absolute inset-0 w-full h-full object-cover m-0 p-0">
  </figure>
<?php endif ?>
