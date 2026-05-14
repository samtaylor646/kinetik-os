<?php
/**
 * Layout Builder Snippet
 * 
 * Iterates through a layout field and applies dynamic styling based on
 * the layout-builder.yml blueprint settings.
 * 
 * @var \Kirby\Cms\Layouts $layouts
 */

$page = page(); // Ensure page object is available for image queries
if ($layouts->isEmpty()) return;
?>

<div class="layout-builder">
  <?php foreach ($layouts as $layout): ?>
    <?php
      $attrs = $layout->attrs();
      
      // Determine Classes
      $classes = ['layout-row', 'relative', 'w-full'];
      $styles = [];
      $dataAttributes = [];

      // Min Height (Hero settings)
      if ($minHeight = $attrs->min_height()->value()) {
        $map = [
          'vh-50' => 'min-h-[50vh]',
          'vh-75' => 'min-h-[75vh]',
          'vh-100' => 'min-h-screen',
          'auto' => 'h-auto'
        ];
        $classes[] = $map[$minHeight] ?? 'h-auto';
        $classes[] = 'flex flex-col justify-center'; // Ensures vertical alignment works
      }

      // Padding
      if ($padding = $attrs->row_padding()->value()) {
        $map = [
          'none' => 'py-0',
          'sm' => 'py-8 md:py-12',
          'md' => 'py-12 md:py-20',
          'lg' => 'py-16 md:py-24',
          'xl' => 'py-24 md:py-32',
        ];
        $classes[] = $map[$padding] ?? 'py-12 md:py-20';
      }

      // Background Color
      if ($bg = $attrs->row_bg()->value()) {
        $map = [
          'transparent' => 'bg-transparent',
          'canvas' => 'bg-[var(--color-canvas)] text-[var(--color-ink)]',
          'ink' => 'bg-[var(--color-ink)] text-[var(--color-canvas)]',
          'oceanic' => 'bg-[var(--color-oceanic-dark)] text-[var(--color-canvas)]',
          'gold' => 'bg-[var(--color-warm-gold)] text-[var(--color-ink)]',
          'soft-smoke' => 'bg-[var(--color-soft-smoke)] text-[var(--color-ink)]',
          'brand-accent' => 'bg-[var(--color-brand-accent)] text-[var(--color-canvas)]',
        ];
        $classes[] = $map[$bg] ?? 'bg-transparent';
      }

      // Custom Class
      if ($customClass = $attrs->custom_class()->value()) {
        $classes[] = $customClass;
      }

      // GSAP Motion
      if ($attrs->gsap_reveal()->isTrue()) {
        $dataAttributes[] = 'data-motion="reveal"';
      }
      
      // Custom ID
      $idAttr = $attrs->custom_id()->isNotEmpty() ? 'id="' . esc($attrs->custom_id(), 'attr') . '"' : '';
    ?>

    <section <?= $idAttr ?> class="<?= implode(' ', $classes) ?>" <?= implode(' ', $dataAttributes) ?>>
      
      <?php // Background Image/Video Handling ?>
      <?php if ($file = $attrs->background_media()->toFile()): ?>
          <div class="absolute inset-0 z-0 overflow-hidden">
            <?php if ($file->type() === 'video'): ?>
               <video src="<?= $file->url() ?>" autoplay loop muted playsinline class="w-full h-full object-cover"></video>
            <?php else: ?>
               <img src="<?= $file->url() ?>" alt="" class="w-full h-full object-cover" />
            <?php endif; ?>
            
            <?php // Dark Overlay ?>
            <?php 
              $overlayValue = (int)$attrs->background_overlay()->value();
              if ($overlayValue > 0): 
                $opacity = $overlayValue / 100;
            ?>
              <div class="absolute inset-0 bg-black" style="opacity: <?= $opacity ?>;"></div>
            <?php endif; ?>
          </div>
      <?php endif; ?>

      <?php // Container Width ?>
      <?php 
        $widthClass = $attrs->row_width()->value() === 'full' ? 'w-full px-4' : 'container mx-auto px-4 sm:px-6 lg:px-8';
        
        // Vertical Alignment inside the container
        $alignClass = '';
        if ($attrs->min_height()->value() !== 'auto') {
           $alignMap = ['start' => 'mt-0 mb-auto', 'center' => 'my-auto', 'end' => 'mt-auto mb-0'];
           $vAlign = $attrs->vertical_align()->value();
           $vAlign = $vAlign ?: 'start';
           $alignClass = $alignMap[$vAlign] ?? 'mt-0 mb-auto';
        }
      ?>

      <div class="<?= $widthClass ?> <?= $alignClass ?> relative z-10 w-full">
        <div class="grid grid-cols-12 gap-6 lg:gap-8">
          <?php foreach ($layout->columns() as $column): ?>
            <?php 
              // Convert span fractions to Tailwind column classes (1/2 -> col-span-12 md:col-span-6)
              $span = $column->span();
              $spanMap = [
                '1/1' => 'col-span-12',
                '1/2' => 'col-span-12 md:col-span-6',
                '1/3' => 'col-span-12 md:col-span-4',
                '2/3' => 'col-span-12 md:col-span-8',
                '1/4' => 'col-span-12 md:col-span-6 lg:col-span-3',
                '3/4' => 'col-span-12 lg:col-span-9',
                '3/5' => 'col-span-12 lg:col-span-7', // Approximate for 12-col grid
                '2/5' => 'col-span-12 lg:col-span-5',
                '1/5' => 'col-span-12 md:col-span-4 lg:col-span-2', // Custom logic often needed here
                '1/6' => 'col-span-12 md:col-span-4 lg:col-span-2',
                '5/12' => 'col-span-12 lg:col-span-5',
                '1/12' => 'col-span-12 lg:col-span-1',
              ];
              $colClass = $spanMap[$span] ?? 'col-span-12';
            ?>
            <div class="<?= $colClass ?> layout-column">
              <?php foreach ($column->blocks() as $block): ?>
                <div class="block-wrapper mb-8 last:mb-0">
                   <?= $block ?>
                </div>
              <?php endforeach; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  <?php endforeach; ?>
</div>
