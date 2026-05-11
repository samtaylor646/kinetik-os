<?php
declare(strict_types=1);

/**
 * Path: /site/templates/default.php
 * Filename: default.php | Version: v7.8.0
 * Agent: Architect-K
 * Status: Production
 * Logic: Default page template integrating global header/footer
 */
?>
<?php snippet('header') ?>

<main class="py-airy-xl px-4 max-w-7xl mx-auto">
  <h1 class="text-4xl font-bold text-oceanic-dark mb-4"><?= $page->title() ?></h1>
  <p class="text-lg">Kinetik-OS V7.8.0 Integration Successful!</p>
</main>

<?php snippet('footer') ?>
