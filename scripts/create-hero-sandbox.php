<?php
require_once __DIR__ . '/../kirby/bootstrap.php';

$kirby = new Kirby();
$kirby->impersonate('kirby');

$colors = [
    'oceanic' => 'Oceanic',
    'gold' => 'Warm Gold',
    'canvas' => 'Light (Canvas)',
    'ink' => 'Dark (Ink)',
    'soft-smoke' => 'Soft Smoke',
    'brand-accent' => 'Brand Accent',
    'transparent' => 'Transparent'
];

$tints = [
    'transparent' => 'Transparent (None)',
    'frost-light' => 'Frost Light',
    'frost-dark' => 'Frost Dark',
    'solid-canvas' => 'Solid Canvas',
    'solid-ink' => 'Solid Ink'
];

$layouts = [];

function generateUuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
        mt_rand( 0, 0xffff ),
        mt_rand( 0, 0x0fff ) | 0x4000,
        mt_rand( 0, 0x3fff ) | 0x8000,
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}

foreach ($colors as $themeKey => $themeLabel) {
    $bgImage = in_array($themeKey, ['ink', 'oceanic', 'brand-accent']) ? 'media/dark-hero-bg.jpg' : 'media/light-hero-bg.jpg';
    
    foreach ($tints as $tintKey => $tintLabel) {
        $layouts[] = [
            'id' => generateUuid(),
            'attrs' => [
                'row_bg' => 'transparent',
                'row_padding' => 'lg',
                'background_media' => [$bgImage]
            ],
            'columns' => [
                [
                    'id' => generateUuid(),
                    'width' => '1/1',
                    'blocks' => [
                        [
                            'id' => generateUuid(),
                            'isHidden' => false,
                            'type' => 'hero-content',
                            'content' => [
                                'eyebrow' => '',
                                'heading' => "$themeLabel & $tintLabel",
                                'subheading' => "This is a hero content block demonstrating the $themeLabel block-level theme color option with $tintLabel backdrop tint.",
                                'alignment' => 'left',
                                'theme' => $themeKey,
                                'backdrop_tint' => $tintKey,
                                'primary_cta_text' => 'Get Started',
                                'primary_cta_link' => '',
                                'secondary_cta_text' => 'Learn More',
                                'secondary_cta_link' => ''
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }
}

$pageData = [
    'slug'     => 'sb-hero',
    'template' => 'sandbox',
    'content'  => [
        'title'  => 'Hero Content Sandbox',
        'layout' => json_encode($layouts)
    ]
];

if ($existing = $kirby->page('sb-hero')) {
    $existing->delete(true);
} elseif ($draft = $kirby->site()->draft('sb-hero')) {
    $draft->delete(true);
}

try {
    $page = $kirby->site()->createChild($pageData);
    $page = $page->changeStatus('unlisted');
    echo "Created page: " . $page->id() . "\n";
} catch (Exception $e) {
    if (method_exists($e, 'errors')) {
        print_r($e->errors());
    }
    echo "Error creating " . $pageData['slug'] . ": " . $e->getMessage() . "\n";
}
