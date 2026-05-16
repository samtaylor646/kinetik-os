<?php
require_once __DIR__ . '/../kirby/bootstrap.php';

$kirby = new Kirby();
$kirby->impersonate('kirby');

$pages = [
    [
        'slug'     => 'sb-homepage',
        'template' => 'sandbox',
        'content'  => [
            'title'  => 'Homepage (Sandbox)',
            'layout' => json_encode([
                [
                    'columns' => [['width' => '1/1', 'blocks' => [
                        ['type' => 'split-hero', 'content' => ['heading' => 'Homepage Hero', 'text' => 'Welcome to Kinetik OS', 'theme' => 'dark']],
                        ['type' => 'logo-cloud', 'content' => ['heading' => 'Trusted By']],
                        ['type' => 'section-header', 'content' => ['heading' => 'Features Overview']],
                        ['type' => 'feature-grid', 'content' => ['features' => []]],
                        ['type' => 'horizontal-scroll', 'content' => ['heading' => 'Scroll Showcase']], // ADDED
                        ['type' => 'cta-banner', 'content' => ['heading' => 'Get Started', 'button_text' => 'Join Now']]
                    ]]]
                ]
            ])
        ]
    ],
    [
        'slug'     => 'sb-services',
        'template' => 'sandbox',
        'content'  => [
            'title'  => 'Services (Sandbox)',
            'layout' => json_encode([
                [
                    'columns' => [['width' => '1/1', 'blocks' => [
                        ['type' => 'section-header', 'content' => ['heading' => 'Our Services', 'text' => 'What we offer.']],
                        ['type' => 'bento-grid', 'content' => ['layout' => '3-col']],
                        ['type' => 'accordion-group', 'content' => ['items' => []]],
                        ['type' => 'list', 'content' => ['text' => '- Service 1\n- Service 2\n- Service 3']], // ADDED
                        ['type' => 'cta-banner', 'content' => ['heading' => 'Ready to start?']]
                    ]]]
                ]
            ])
        ]
    ],
    [
        'slug'     => 'sb-about',
        'template' => 'sandbox',
        'content'  => [
            'title'  => 'About (Sandbox)',
            'layout' => json_encode([
                [
                    'columns' => [['width' => '1/1', 'blocks' => [
                        ['type' => 'section-header', 'content' => ['heading' => 'About Us']],
                        ['type' => 'statement-quote', 'content' => ['quote' => 'We build the future.']],
                        ['type' => 'asymmetric-columns', 'content' => ['heading' => 'Our Mission']],
                        ['type' => 'quote', 'content' => ['text' => 'An insightful secondary quote.', 'citation' => 'Jane Doe']], // ADDED
                        ['type' => 'data-table', 'content' => ['heading' => 'Company Stats']]
                    ]]]
                ]
            ])
        ]
    ],
    [
        'slug'     => 'sb-employment',
        'template' => 'sandbox',
        'content'  => [
            'title'  => 'Employment (Sandbox)',
            'layout' => json_encode([
                [
                    'columns' => [['width' => '1/1', 'blocks' => [
                        ['type' => 'section-header', 'content' => ['heading' => 'Join Our Team']],
                        ['type' => 'heading', 'content' => ['text' => 'Open Positions', 'level' => 'h2']], // ADDED
                        ['type' => 'tabbed-interface', 'content' => ['tabs' => []]],
                        ['type' => 'strategy-card', 'content' => ['heading' => 'Our Culture']]
                    ]]]
                ]
            ])
        ]
    ],
    [
        'slug'     => 'sb-contact',
        'template' => 'sandbox',
        'content'  => [
            'title'  => 'Contact (Sandbox)',
            'layout' => json_encode([
                [
                    'columns' => [['width' => '1/1', 'blocks' => [
                        ['type' => 'section-header', 'content' => ['heading' => 'Contact Us']],
                        ['type' => 'text', 'content' => ['text' => 'Reach out to our team at any time.']],
                        ['type' => 'video-modal', 'content' => ['heading' => 'Watch our location guide']]
                    ]]]
                ]
            ])
        ]
    ]
];

// First, delete existing ones
foreach ($pages as $pageData) {
    if ($existing = $kirby->page($pageData['slug'])) {
        $existing->delete(true);
    }
}

// Create them anew
foreach ($pages as $pageData) {
    try {
        $page = $kirby->site()->createChild($pageData);
        $page->changeStatus('unlisted');
        echo "Created page: " . $page->id() . "\n";
    } catch (Exception $e) {
        echo "Error creating " . $pageData['slug'] . ": " . $e->getMessage() . "\n";
    }
}
