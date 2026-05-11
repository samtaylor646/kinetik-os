<?php
declare(strict_types=1);

/**
 * Path: /site/snippets/blocks/heading.php
 * Filename: heading.php | Version: v7.8.0
 * Agent: DX-Curator
 * Status: Production
 * Logic: Redefined core heading block with typographic tokens
 */

$level = $block->level()->or('h2');
$text  = $block->text();

// Typography scale mapping
$classMap = [
    'h1' => 'text-5xl font-bold text-oceanic-dark mb-airy-md',
    'h2' => 'text-4xl font-semibold text-oceanic-dark mb-airy-sm mt-airy-md',
    'h3' => 'text-3xl font-medium text-oceanic-dark mb-airy-sm mt-airy-md',
    'h4' => 'text-2xl font-medium text-oceanic-accent mb-airy-sm mt-airy-sm',
    'h5' => 'text-xl font-medium text-oceanic-secondary mb-2 mt-4',
    'h6' => 'text-lg font-medium text-oceanic-subtle mb-2 mt-4',
];

$classes = $classMap[(string)$level] ?? $classMap['h2'];
?>
<<?= $level ?> class="<?= $classes ?>"><?= $text ?></<?= $level ?>>
