<?php
/** @var \Kirby\Cms\Page $page */
?>
<?php snippet('header') ?>

<main class="sandbox-page w-full">
  <div class="px-4 md:px-16 max-w-[1600px] mx-auto py-8">
    <h1 class="text-4xl font-bold mb-12 border-b border-ink/10 pb-4">Sandbox - Block Testing Environment</h1>
  </div>
  
  <?php foreach ($page->layout()->toLayouts() as $layout): ?>
    <section class="grid w-full" id="<?= $layout->id() ?>">
      <?php foreach ($layout->columns() as $column): ?>
        <div class="column w-full" style="--span:<?= $column->span() ?>">
          <div class="blocks w-full space-y-24">
            <?php foreach ($column->blocks() as $block): ?>
              <div class="block-wrapper relative mt-12 mb-12 w-full">
                <div class="absolute -top-6 left-4 md:left-16 z-50 bg-canvas px-2 text-xs font-mono text-ink/50 uppercase tracking-wider tech-border">
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
</main>

<?php snippet('footer') ?>
