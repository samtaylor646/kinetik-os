<?php
declare(strict_types=1);

$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost:8000';
$url = $protocol . '://' . $host;

// Helper to generate dynamic CSS
function generateDynamicThemeCSS($themePage) {
    if (!$themePage) return;

    $css = "/* DYNAMIC THEME CSS - AUTO GENERATED */\n\n";
    $css .= ":root {\n";
    
    $colors = $themePage->theme_colors()->toStructure();
    foreach ($colors as $color) {
        $name = preg_replace('/[^a-zA-Z0-9-]/', '', $color->color_name()->value());
        $val = preg_replace('/[^a-zA-Z0-9#,\(\)\.% ]/', '', $color->color_value()->value());
        if ($name && $val) {
            $css .= "  --color-{$name}: {$val};\n";
        }
    }
    $css .= "}\n\n";

    // Generate Profile Classes
    $profiles = $themePage->color_profiles()->toStructure();
    foreach ($profiles as $profile) {
        $id = preg_replace('/[^a-zA-Z0-9-]/', '', $profile->profile_id()->value());

        if (!$id) continue;
        
        $bg = $profile->bg_color()->value();
        $text = $profile->text_color()->value();
        $textAccent = $profile->text_color_accent()->value();
        $pCtaBg = $profile->primary_cta_bg()->value();
        $pCtaText = $profile->primary_cta_text()->value();
        $sCtaBorder = $profile->secondary_cta_border()->value();
        $sCtaText = $profile->secondary_cta_text()->value();

        $css .= ".theme-profile-{$id} {\n";
        if ($bg) $css .= "  --profile-bg: var(--color-{$bg});\n  background-color: var(--profile-bg);\n";
        if ($text) $css .= "  --profile-text: var(--color-{$text});\n  color: var(--profile-text);\n";
        if ($textAccent) $css .= "  --profile-text-accent: var(--color-{$textAccent});\n";
        if ($pCtaBg) $css .= "  --profile-pcta-bg: var(--color-{$pCtaBg});\n";
        if ($pCtaText) $css .= "  --profile-pcta-text: var(--color-{$pCtaText});\n";
        if ($sCtaBorder) $css .= "  --profile-scta-border: var(--color-{$sCtaBorder});\n";
        if ($sCtaText) $css .= "  --profile-scta-text: var(--color-{$sCtaText});\n";
        $css .= "}\n\n";
    }

    // Generic Opacity Modifiers (Reusable for any theme block)
    $steps = [100, 90, 70, 50, 30, 10, 0];
    foreach ($steps as $step) {
        if ($step === 100) {
            $css .= ".theme-bg-opacity-100 { background-color: var(--profile-bg) !important; }\n";
            $css .= ".overlay-opacity-100 { background-color: rgb(0 0 0 / 1); }\n";
        } elseif ($step === 0) {
            $css .= ".theme-bg-opacity-0 { background-color: transparent !important; }\n";
            $css .= ".overlay-opacity-0 { background-color: transparent; }\n";
        } else {
            $css .= ".theme-bg-opacity-{$step} { background-color: color-mix(in srgb, var(--profile-bg) {$step}%, transparent) !important; }\n";
            $css .= ".overlay-opacity-{$step} { background-color: rgb(0 0 0 / " . ($step / 100) . "); }\n";
        }
    }

    // Custom CSS from panel
    if ($customCss = $themePage->custom_css()->value()) {
        $css .= "\n/* Custom CSS */\n{$customCss}\n";
    }

    $mediaDir = kirby()->root('media') ?? kirby()->root('index') . '/public/media';
    if (!is_dir($mediaDir)) mkdir($mediaDir, 0755, true);
    
    file_put_contents($mediaDir . '/dynamic-theme.css', $css);
}

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
        'page.update:after' => function ($newPage, $oldPage) {
            if ($newPage->id() === 'theme') {
                generateDynamicThemeCSS($newPage);
            }
        },
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
        'css' => 'assets/css/panel.css',
        'menu' => [
            'dashboard' => [
                'icon'  => 'home',
                'label' => 'Site Settings',
                'link'  => 'site',
                'current' => function (string $current): bool {
                    $path = kirby()->request()->path()->toString();
                    return $path === 'panel/site' || $path === 'panel';
                }
            ],
            'theme' => [
                'icon'  => 'brush',
                'label' => 'Theme',
                'link'  => 'pages/theme',
                'current' => function (string $current): bool {
                    return str_contains(kirby()->request()->path()->toString(), 'pages/theme');
                }
            ],
            'media' => [
                'icon'  => 'images',
                'label' => 'Media',
                'link'  => 'pages/media',
                'current' => function (string $current): bool {
                    return str_contains(kirby()->request()->path()->toString(), 'pages/media');
                }
            ],
            'users',
            'system'
        ]
    ]
];
