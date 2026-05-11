<?php
declare(strict_types=1);

/**
 * Path: /public/index.php
 * Filename: index.php | Version: v7.8.0
 * Agent: Architect-K
 * Status: Production
 * Logic: Kirby bootstrap with custom roots for public folder architecture
 */

require dirname(__DIR__) . '/kirby/bootstrap.php';

$kirby = new Kirby([
    'roots' => [
        'index'    => __DIR__,
        'base'     => dirname(__DIR__),
        'site'     => dirname(__DIR__) . '/site',
        'content'  => dirname(__DIR__) . '/content',
        'media'    => __DIR__ . '/media',
        'storage'  => dirname(__DIR__) . '/storage',
        'accounts' => dirname(__DIR__) . '/storage/accounts',
        'cache'    => dirname(__DIR__) . '/storage/cache',
        'sessions' => dirname(__DIR__) . '/storage/sessions',
        'logs'     => dirname(__DIR__) . '/storage/logs'
    ]
]);

echo $kirby->render();
