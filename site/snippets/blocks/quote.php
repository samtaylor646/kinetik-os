<?php
declare(strict_types=1);

/**
 * Path: /site/snippets/blocks/quote.php
 * Filename: quote.php | Version: v7.8.0
 * Agent: DX-Curator
 * Status: Production
 * Logic: Redefined core quote block with "Boutique-Border" left-accent
 *
 * @var \Kirby\Cms\Block $block
 */
?>
<blockquote class="border-l-4 border-warm-gold pl-6 py-2 bg-canvas italic">
  <div class="text-2xl text-oceanic-dark">
    <?= $block->text() ?>
  </div>
  <?php if ($block->citation()->isNotEmpty()): ?>
  <footer class="mt-4 text-sm font-semibold text-oceanic-subtle uppercase tracking-wider">
    — <?= $block->citation() ?>
  </footer>
  <?php endif ?>
</blockquote>
