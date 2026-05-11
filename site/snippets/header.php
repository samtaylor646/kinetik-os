<?php
declare(strict_types=1);

/**
 * Path: /site/snippets/header.php
 * Filename: header.php | Version: v7.8.0
 * Agent: Architect-K
 * Status: Production
 * Logic: Global header with Vite asset integration
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $page->title() ?></title>
  <?= vite()->css('src/index.css') ?>
  <?= vite()->js('src/main.js') ?>
</head>
<body class="bg-canvas text-ink antialiased">
