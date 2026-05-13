<?php
/** @var \Kirby\Cms\Page $page */
?>
<?php snippet('header') ?>

<main class="w-full">
  <?php foreach ($page->layout()->toLayouts() as $layout): ?>
    <?php 
    // Check if this layout contains a block that should be full-bleed
    $isFullBleed = false;
    if ($layout->columns()->count() === 1) {
        $firstColumn = $layout->columns()->first();
        if ($firstColumn->blocks()->count() === 1) {
            $firstBlock = $firstColumn->blocks()->first();
            if (in_array($firstBlock->type(), ['split-hero', 'bento-grid'])) {
                $isFullBleed = true;
            }
        }
    }
    ?>
    
    <?php if ($isFullBleed): ?>
      <section class="w-full m-0 p-0" id="<?= $layout->id() ?>">
        <?php foreach ($layout->columns() as $column): ?>
          <div class="w-full">
            <?= $column->blocks() ?>
          </div>
        <?php endforeach ?>
      </section>
    <?php else: ?>
      <section class="grid w-full" id="<?= $layout->id() ?>">
        <?php foreach ($layout->columns() as $column): ?>
          <div class="column w-full" style="--span:<?= $column->span() ?>">
            <div class="blocks w-full">
              <?= $column->blocks() ?>
            </div>
          </div>
        <?php endforeach ?>
      </section>
    <?php endif ?>
  <?php endforeach ?>
</main>

<?php snippet('footer') ?>
