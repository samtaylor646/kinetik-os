<?php
/** @var \Kirby\Cms\Page $page */
?>
<?php snippet('header') ?>

<main class="py-airy-xl px-4 max-w-7xl mx-auto">
  <?php foreach ($page->layout()->toLayouts() as $layout): ?>
    <section class="grid" id="<?= $layout->id() ?>">
      <?php foreach ($layout->columns() as $column): ?>
        <div class="column" style="--span:<?= $column->span() ?>">
          <div class="blocks">
            <?= $column->blocks() ?>
          </div>
        </div>
      <?php endforeach ?>
    </section>
  <?php endforeach ?>
</main>

<?php snippet('footer') ?>
