<?php
declare(strict_types=1);

/**
 * Path: /site/snippets/header.php
 * Filename: header.php | Version: v7.8.0
 * Agent: Architect-K
 * Status: Production
 * Logic: Global header with Vite asset integration
 *
 * @var \Kirby\Cms\Page $page
 * @var \Kirby\Cms\Site $site
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $page->title() ?></title>
  <?= vite()->css('src/main.js') ?>
  <?= vite()->js('src/main.js') ?>
  <?php snippet('theme-variables') ?>
  <?php if ($themePage = page('theme')): ?>
    <link rel="stylesheet" href="<?= url('media/dynamic-theme.css') ?>?v=<?= $themePage->modified() ?>">
  <?php endif; ?>
</head>
<body class="bg-canvas text-ink antialiased">
<div id="lenis-wrapper" data-lenis-container>
<main id="main-content">
