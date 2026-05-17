<?php
declare(strict_types=1);

$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost:8000';
$url = $protocol . '://' . $host;

return [
    'debug' => true,
    'url' => $url,
    'thumbs' => [
        'format' => 'webp',
        'quality' => 80,
        'srcsets' => [
            'default' => [
                '600w'  => ['width' => 600, 'format' => 'webp'],
                '900w'  => ['width' => 900, 'format' => 'webp'],
                '1400w' => ['width' => 1400, 'format' => 'webp'],
                '1920w' => ['width' => 1920, 'format' => 'webp'],
                '3000w' => ['width' => 3000, 'format' => 'webp']
            ]
        ]
    ],
    'hooks' => [
        'file.create:after' => function ($file) {
            if ($file->isResizable() && ($file->width() > 3000 || $file->height() > 3000)) {
                try {
                    kirby()->thumb($file->root(), $file->root(), [
                        'width'  => 3000,
                        'height' => 3000,
                        'crop'   => false,
                        'format' => $file->extension()
                    ]);
                } catch (Exception $e) {
                    // Ignore thumb errors
                }
            }
        },
        'file.replace:after' => function ($newFile, $oldFile) {
            if ($newFile->isResizable() && ($newFile->width() > 3000 || $newFile->height() > 3000)) {
                try {
                    kirby()->thumb($newFile->root(), $newFile->root(), [
                        'width'  => 3000,
                        'height' => 3000,
                        'crop'   => false,
                        'format' => $newFile->extension()
                    ]);
                } catch (Exception $e) {
                    // Ignore thumb errors
                }
            }
        }
    ],
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
