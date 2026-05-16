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
    <section class="grid w-full relative <?= $bgClass ?> py-12" id="<?= $layout->id() ?>">
      
      <?php // Background Image/Video Handling ?>
      <?php if ($file = $layout->attrs()->background_media()->toFile()): ?>
          <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
            <?php
              $mediaSize = $layout->attrs()->background_media_size()->value() ?: 'cover';
              $mediaPos = $layout->attrs()->background_media_position()->value() ?: 'center';
              $mediaClasses = "w-full h-full object-{$mediaSize} object-{$mediaPos}";
              
              $overlayOpacity = $layout->attrs()->background_overlay()->toInt() ?: 0;
            ?>
            
            <?php if ($file->type() === 'video'): ?>
              <video class="<?= $mediaClasses ?>" autoplay loop muted playsinline>
                <source src="<?= $file->url() ?>" type="<?= $file->mime() ?>">
              </video>
            <?php else: ?>
              <img src="<?= $file->url() ?>" alt="" class="<?= $mediaClasses ?>">
            <?php endif; ?>

            <?php if ($overlayOpacity > 0): ?>
              <div class="absolute inset-0 bg-ink" style="opacity: <?= $overlayOpacity / 100 ?>;"></div>
            <?php endif; ?>
          </div>
      <?php endif; ?>

      <div class="relative z-10 w-full flex flex-col">
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
      </div>
    </section>
  <?php endforeach ?>
</main>

<?php snippet('footer') ?>
