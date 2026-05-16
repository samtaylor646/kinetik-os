<?php
/** @var \Kirby\Cms\Page $page */
?>
<?php snippet('header') ?>

<main class="sandbox-page w-full">
  <div class="px-4 md:px-16 max-w-[1600px] mx-auto py-8">
    <h1 class="text-4xl font-bold mb-12 border-b border-ink/10 pb-4">Sandbox - Block Testing Environment</h1>
  </div>
  
  <?php foreach ($page->layout()->toLayouts() as $layout): ?>
    <?php foreach ($layout->columns() as $column): ?>
      <?php foreach ($column->blocks() as $block): ?>
        <section class="w-full bg-canvas py-2 tech-border-b">
          <div class="px-4 md:px-16 mx-auto flex gap-4 text-xs font-mono text-ink/50 uppercase tracking-wider">
            <span><?= $block->type() ?></span>
            <?php if ($block->type() === 'hero-content'): ?>
              <span class="text-brand-accent">Align: <?= $block->alignment()->or('left') ?></span>
              <span class="text-brand-accent">Theme: <?= $block->theme()->or('transparent') ?></span>
              <span class="text-brand-accent">Tint: <?= $block->backdrop_tint()->or('transparent') ?></span>
            <?php endif ?>
          </div>
        </section>
      <?php endforeach ?>
    <?php endforeach ?>

    <?php
      $bgClass = 'bg-transparent text-ink';
      if ($bg = $layout->attrs()->row_bg()->value()) {
          $map = [
            'canvas' => 'bg-canvas text-ink',
            'ink' => 'bg-ink text-canvas',
            'oceanic' => 'bg-oceanic-dark text-canvas',
            'gold' => 'bg-warm-gold text-ink',
            'soft-smoke' => 'bg-soft-smoke text-ink',
            'brand-accent' => 'bg-(--color-brand-accent) text-canvas',
          ];
          $bgClass = $map[$bg] ?? 'bg-transparent text-ink';
      }
    ?>
    <section class="grid w-full <?= $bgClass ?> py-12" id="<?= $layout->id() ?>">
      <?php foreach ($layout->columns() as $column): ?>
        <div class="column w-full px-4 md:px-16" style="--span:<?= $column->span() ?>">
          <div class="blocks w-full space-y-24">
            <?php foreach ($column->blocks() as $block): ?>
              <div class="block-wrapper relative mt-12 mb-12 w-full">
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
