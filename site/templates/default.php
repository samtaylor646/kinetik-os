<?php
/** @var \Kirby\Cms\Page $page */
?>
<?php snippet('header') ?>

<main class="w-full">
  <?php snippet('layouts/default', ['layouts' => $page->layout()->toLayouts()]); ?>
</main>

<?php snippet('footer') ?>
