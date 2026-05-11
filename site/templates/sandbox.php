<?php
/** @var \Kirby\Cms\Page $page */
?>
<?php snippet('layout', slots: true) ?>

<div class="sandbox-page p-8 max-w-7xl mx-auto space-y-16">
  <h1 class="text-4xl font-bold mb-12 border-b pb-4">Sandbox - Block Testing Environment</h1>
  
  <?php foreach ($page->layout()->toLayouts() as $layout): ?>
    <section class="grid" id="<?= $layout->id() ?>">
      <?php foreach ($layout->columns() as $column): ?>
        <div class="column" style="--span:<?= $column->span() ?>">
          <div class="blocks space-y-24">
            <?php foreach ($column->blocks() as $block): ?>
              <div class="block-wrapper border border-gray-200 dark:border-gray-800 p-8 rounded-xl relative">
                <div class="absolute -top-3 left-4 bg-white dark:bg-gray-900 px-2 text-xs font-mono text-gray-500 uppercase tracking-wider">
                  <?= $block->type() ?>
                </div>
                <?= $block ?>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      <?php endforeach ?>
    </section>
  <?php endforeach ?>
</div>

<?php endsnippet() ?>