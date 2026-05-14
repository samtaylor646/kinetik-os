<?php
/**
 * Path: /site/snippets/blocks/subgrid.php
 * @var \Kirby\Cms\Block $block
 */
$layouts = $block->sublayout()->toLayouts();
if ($layouts->isEmpty()) return;
?>
<div class="subgrid-block w-full">
  <?php foreach ($layouts as $layout): ?>
    <div class="grid grid-cols-12 gap-6 lg:gap-8 mb-8 last:mb-0 w-full">
      <?php foreach ($layout->columns() as $column): ?>
        <?php 
          // Convert span fractions to Tailwind column classes
          $span = $column->span();
          $spanMap = [
            '1/1' => 'col-span-12',
            '1/2' => 'col-span-12 md:col-span-6',
            '1/3' => 'col-span-12 md:col-span-4',
            '2/3' => 'col-span-12 md:col-span-8',
            '1/4' => 'col-span-12 md:col-span-6 lg:col-span-3',
            '3/4' => 'col-span-12 lg:col-span-9',
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
        <div class="<?= $colClass ?> subgrid-column flex flex-col gap-6" data-span="<?= $span ?>">
          <?php foreach ($column->blocks() as $childBlock): ?>
            <div class="block-wrapper">
               <?= $childBlock ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>
</div>