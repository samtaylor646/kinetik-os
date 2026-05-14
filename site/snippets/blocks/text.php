<?php
declare(strict_types=1);

/**
 * Path: /site/snippets/blocks/text.php
 * Filename: text.php | Version: v7.8.0
 * Agent: DX-Curator
 * Status: Production
 * Logic: Redefined core text block injecting Tailwind 4 prose classes
 *
 * @var \Kirby\Cms\Block $block
 */
?>
<div class="prose prose-lg prose-oceanic max-w-none py-airy-sm">
  <?= $block->text() ?>
</div>
