<?php
declare(strict_types=1);

$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost:8000';
$url = $protocol . '://' . $host;

return [
    'debug' => true,
    'url' => $url,
    'panel' => [
        'install' => true,
        'menu' => [
            'site',
            'theme' => [
                'icon'  => 'brush',
                'label' => 'Theme',
                'link'  => 'pages/theme'
            ],
            'media' => [
                'icon'  => 'images',
                'label' => 'Media',
                'link'  => 'pages/media'
            ],
            'users',
            'system'
        ]
    ]
];
