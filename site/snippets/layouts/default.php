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

$groupIsOpen = false;
?>

<div class="layout-builder">
  <?php foreach ($layouts as $index => $layout): ?>
    <?php
      $attrs = $layout->attrs();
      
      // If we are NOT in an open group, this layout dictates the section wrapper
      if (!$groupIsOpen):
        // Determine Classes
        $classes = ['layout-row', 'relative', 'w-full'];
        $dataAttributes = [];

        // Background Color
        if ($bg = $attrs->row_bg()->value()) {
          $map = [
            'transparent' => 'bg-transparent',
            'canvas' => 'bg-canvas text-ink',
            'ink' => 'bg-ink text-canvas',
            'oceanic' => 'bg-oceanic-dark text-canvas',
            'gold' => 'bg-warm-gold text-ink',
            'soft-smoke' => 'bg-soft-smoke text-ink',
            'brand-accent' => 'bg-(--color-brand-accent) text-canvas',
          ];
          if (isset($map[$bg])) {
            $classes[] = $map[$bg];
          }
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
            <?php 
              $mediaSize = $attrs->background_media_size()->value() ?: 'cover';
              $mediaPos = $attrs->background_media_position()->value() ?: 'center';
              $mediaClasses = "w-full h-full object-{$mediaSize} object-{$mediaPos}";
            ?>
            <?php if ($file->type() === 'video'): ?>
               <video src="<?= $file->url() ?>" autoplay loop muted playsinline class="<?= $mediaClasses ?>"></video>
            <?php else: ?>
               <?php snippet('image', ['file' => $file, 'class' => $mediaClasses]) ?>
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

      <?php // Flex container for grouped rows to stack correctly ?>
      <div class="relative z-10 w-full flex flex-col h-full">

    <?php endif; // end section wrapper logic ?>

      <?php
        // The inner container logic runs for EVERY layout row, whether grouped or not
        $innerClasses = ['w-full', 'layout-inner', 'flex', 'flex-col'];
        
        // Min Height
        if ($minHeight = $attrs->min_height()->value()) {
          $map = [
            'vh-50' => 'min-h-[50vh]',
            'vh-75' => 'min-h-[75vh]',
            'vh-100' => 'min-h-screen',
            'auto' => 'h-auto'
          ];
          if (isset($map[$minHeight])) {
            $innerClasses[] = $map[$minHeight];
          }
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
          if (isset($map[$padding])) {
            $innerClasses[] = $map[$padding];
          }
        }

        // Vertical Alignment inside the row
        if ($vAlign = $attrs->vertical_align()->value()) {
          $alignMap = [
            'center' => 'justify-center', 
            'end' => 'justify-end'
          ];
          if (isset($alignMap[$vAlign])) {
            $innerClasses[] = $alignMap[$vAlign];
          }
        }
      ?>

      <div class="<?= implode(' ', $innerClasses) ?>">
        <?php // Container Width ?>
        <?php 
          $widthClass = $attrs->row_width()->value() === 'full' ? 'w-full px-4' : 'container mx-auto px-4 sm:px-6 lg:px-8';
        ?>

        <div class="<?= $widthClass ?> w-full">
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
                  // Fallbacks for Kirby 12-col fractions
                  '6/12' => 'col-span-12 md:col-span-6',
                  '4/12' => 'col-span-12 md:col-span-4',
                  '8/12' => 'col-span-12 md:col-span-8',
                  '3/12' => 'col-span-12 md:col-span-6 lg:col-span-3',
                  '9/12' => 'col-span-12 lg:col-span-9',
                  '12/12' => 'col-span-12',
                  // Fallbacks for raw integers
                  '6' => 'col-span-12 md:col-span-6',
                  '4' => 'col-span-12 md:col-span-4',
                  '8' => 'col-span-12 md:col-span-8',
                  '3' => 'col-span-12 md:col-span-6 lg:col-span-3',
                  '9' => 'col-span-12 lg:col-span-9',
                  '12' => 'col-span-12',
                ];
                $colClass = $spanMap[$span] ?? 'col-span-12';
              ?>
              <div class="<?= $colClass ?> layout-column" data-span="<?= $span ?>">
                <?php foreach ($column->blocks() as $block): ?>
                  <div class="block-wrapper mb-8 last:mb-0">
                     <?= $block ?>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

    <?php 
      // Grouping Logic check for the *next* iteration
      if ($attrs->merge_next()->isTrue()) {
        $groupIsOpen = true;
      } else {
        $groupIsOpen = false;
        // Close the wrappers if this is the end of the group (or just a normal row)
        echo '</div></section>';
      }
    ?>

  <?php endforeach; ?>
  
  <?php // Failsafe: if the last layout in the loop had merge_next true, we still need to close it! ?>
  <?php if ($groupIsOpen): ?>
    </div></section>
  <?php endif; ?>
</div>
