<?php
/**
 * Bento Media Cell Snippet
 */
$image = $block->image()->toFile();
?>
<?php if ($image): ?>
  <figure class="w-full h-full min-h-[300px]">
    <img src="<?= $image->url() ?>" alt="<?= $image->alt() ?>" class="w-full h-full object-cover">
  </figure>
<?php endif ?>
