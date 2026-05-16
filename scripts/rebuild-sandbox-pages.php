<?php
require_once __DIR__ . '/../kirby/bootstrap.php';

$kirby = new Kirby();
$kirby->impersonate('kirby');

$sourceFiles = [
    __DIR__ . '/../content/1_home/croagh-2.mp4' => 'croagh-2.mp4',
    __DIR__ . '/../content/1_home/croagh-mobile.png' => 'croagh-mobile.png',
    __DIR__ . '/../content/1_home/croagh.mp4' => 'croagh.mp4',
    __DIR__ . '/../content/1_home/gettyimages-963131214-170667a.webp' => 'getty-image.webp',
    __DIR__ . '/../content/1_home/unsplash-image-oalh2mojuuk.webp' => 'unsplash-1.webp',
    __DIR__ . '/../content/1_home/unsplash-image-pyypechonnc.webp' => 'unsplash-2.webp',
];

$pages = [
    [
        'slug'     => 'sb-homepage',
        'template' => 'sandbox',
        'content'  => [
            'title'  => 'Homepage (Sandbox)',
            'layout' => json_encode([
                [
                    'columns' => [['width' => '1/1', 'blocks' => [
                        [
                            'type' => 'split-hero',
                            'content' => [
                                'heading' => 'Elevating Digital Experiences',
                                'subheading' => 'We design and develop scalable, high-performance systems for the modern web.',
                                'image' => ['unsplash-1.webp'],
                                'background_video' => ['croagh.mp4'],
                                'video_fit' => 'cover',
                                'video_overlay_opacity' => '50',
                                'cta_text' => 'Discover Our Work',
                                'cta_link' => 'https://example.com/services',
                                'theme' => 'oceanic',
                                'airy_spacing' => 'lg'
                            ]
                        ],
                        [
                            'type' => 'logo-cloud',
                            'content' => [
                                'heading' => 'Trusted by Industry Leaders',
                                'logos' => [
                                    ['image' => ['unsplash-2.webp'], 'alt_text' => 'First Partner', 'link' => 'https://example.com'],
                                    ['image' => ['unsplash-2.webp'], 'alt_text' => 'Second Partner', 'link' => 'https://example.com'],
                                    ['image' => ['unsplash-2.webp'], 'alt_text' => 'Third Partner', 'link' => 'https://example.com'],
                                    ['image' => ['unsplash-2.webp'], 'alt_text' => 'Fourth Partner', 'link' => 'https://example.com'],
                                    ['image' => ['unsplash-2.webp'], 'alt_text' => 'Fifth Partner', 'link' => 'https://example.com']
                                ],
                                'theme' => 'light',
                                'airy_spacing' => 'md'
                            ]
                        ],
                        [
                            'type' => 'section-header',
                            'content' => [
                                'eyebrow' => 'Capabilities',
                                'heading' => 'What We Do',
                                'subheading' => 'A full spectrum of engineering and design services.',
                                'alignment' => 'center',
                                'theme' => 'light',
                                'airy_spacing' => 'sm'
                            ]
                        ],
                        [
                            'type' => 'feature-grid',
                            'content' => [
                                'columns' => '3',
                                'theme' => 'light',
                                'airy_spacing' => 'md',
                                'features' => [
                                    ['icon' => 'laptop-minimal-check', 'title' => 'Web Development', 'description' => 'Fast, secure, and modern web applications built on cutting-edge stacks.'],
                                    ['icon' => 'move-down', 'title' => 'UX/UI Design', 'description' => 'User-centric interfaces that drive engagement and conversions.'],
                                    ['icon' => 'database', 'title' => 'System Architecture', 'description' => 'Robust backends engineered for massive scale and reliability.']
                                ]
                            ]
                        ],
                        [
                            'type' => 'horizontal-scroll',
                            'content' => [
                                'theme' => 'oceanic',
                                'panels' => [
                                    ['type' => 'text', 'content' => ['text' => 'Panel 1: Innovation at scale.']],
                                    ['type' => 'text', 'content' => ['text' => 'Panel 2: Security by design.']],
                                    ['type' => 'text', 'content' => ['text' => 'Panel 3: Performance optimized.']]
                                ]
                            ]
                        ],
                        [
                            'type' => 'cta-banner',
                            'content' => [
                                'heading' => 'Ready to Transform Your Business?',
                                'text' => 'Get in touch with our team of experts today and start your journey.',
                                'buttons' => [
                                    ['label' => 'Contact Us', 'url' => 'https://example.com/contact', 'style' => 'primary']
                                ],
                                'theme' => 'oceanic',
                                'airy_spacing' => 'lg'
                            ]
                        ]
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
                        [
                            'type' => 'section-header',
                            'content' => [
                                'eyebrow' => 'Our Offerings',
                                'heading' => 'Comprehensive Solutions',
                                'subheading' => 'Tailored services to meet the demands of modern enterprises.',
                                'alignment' => 'left',
                                'theme' => 'dark',
                                'airy_spacing' => 'md'
                            ]
                        ],
                        [
                            'type' => 'bento-grid',
                            'content' => [
                                'layout_type' => 'feature_showcase',
                                'theme' => 'light',
                                'items' => [
                                    ['type' => 'bento-standard', 'content' => ['title' => 'Cloud Migration', 'text' => 'Seamlessly move to the cloud.']],
                                    ['type' => 'bento-stat', 'content' => ['value' => '99.9%', 'label' => 'Uptime Guarantee']],
                                    ['type' => 'bento-media', 'content' => ['image' => ['unsplash-2.webp'], 'caption' => 'Global Infrastructure']]
                                ]
                            ]
                        ],
                        [
                            'type' => 'data-table',
                            'content' => [
                                'heading' => 'Service Tiers',
                                'headers' => ['col1' => 'Plan', 'col2' => 'Features', 'col3' => 'Support', 'col4' => 'Price'],
                                'table_data' => [
                                    ['col1' => 'Basic', 'col2' => 'Core CMS', 'col3' => 'Email', 'col4' => '$500/mo'],
                                    ['col1' => 'Pro', 'col2' => 'E-Commerce', 'col3' => 'Priority', 'col4' => '$1500/mo'],
                                    ['col1' => 'Enterprise', 'col2' => 'Custom SLA', 'col3' => '24/7 Phone', 'col4' => 'Custom']
                                ],
                                'airy_spacing' => 'md'
                            ]
                        ],
                        [
                            'type' => 'accordion-group',
                            'content' => [
                                'allow_multiple' => 'true',
                                'theme' => 'light',
                                'airy_spacing' => 'lg',
                                'items' => [
                                    ['title' => 'How long does a project take?', 'content' => [['type' => 'text', 'content' => ['text' => 'Typically 4-8 weeks depending on scope.']]]],
                                    ['title' => 'Do you offer ongoing support?', 'content' => [['type' => 'text', 'content' => ['text' => 'Yes, we have custom retainer plans.']]]]
                                ]
                            ]
                        ]
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
                        [
                            'type' => 'section-header',
                            'content' => [
                                'eyebrow' => 'Our Story',
                                'heading' => 'Building the Future',
                                'subheading' => 'We are a collective of passionate creators.',
                                'alignment' => 'center',
                                'theme' => 'light',
                                'airy_spacing' => 'md'
                            ]
                        ],
                        [
                            'type' => 'statement-quote',
                            'content' => [
                                'quote' => 'Design is not just what it looks like and feels like. Design is how it works.',
                                'author' => 'Steve Jobs',
                                'role' => 'Visionary',
                                'theme' => 'oceanic',
                                'airy_spacing' => 'lg'
                            ]
                        ],
                        [
                            'type' => 'asymmetric-columns',
                            'content' => [
                                'heading' => 'Our Core Values',
                                'text' => '<p>We believe in transparency, innovation, and relentless execution.</p>',
                                'alignment' => 'left',
                                'theme' => 'light',
                                'airy_spacing' => 'lg',
                                'media_blocks' => [
                                    ['type' => 'image', 'content' => ['image' => ['unsplash-1.webp']]],
                                    ['type' => 'image', 'content' => ['image' => ['getty-image.webp']]]
                                ]
                            ]
                        ],
                        [
                            'type' => 'strategy-card',
                            'content' => [
                                'icon' => 'globe-2',
                                'title' => 'Global Reach',
                                'summary' => 'Our products are used by millions worldwide.',
                                'details' => 'From local startups to Fortune 500s, our digital solutions scale across borders and languages.',
                                'theme' => 'light'
                            ]
                        ]
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
                        [
                            'type' => 'split-hero',
                            'content' => [
                                'heading' => 'Join Our Team',
                                'subheading' => 'Work with the brightest minds in the industry.',
                                'image' => ['unsplash-2.webp'],
                                'video_fit' => 'cover',
                                'video_overlay_opacity' => '0',
                                'cta_text' => 'View Openings',
                                'cta_link' => 'https://example.com/openings',
                                'theme' => 'dark',
                                'airy_spacing' => 'md'
                            ]
                        ],
                        [
                            'type' => 'tabbed-interface',
                            'content' => [
                                'airy_spacing' => 'md',
                                'tabs' => [
                                    ['title' => 'Engineering', 'content' => 'We are looking for full-stack developers fluent in Vue, PHP, and Rust.', 'icon' => 'code'],
                                    ['title' => 'Design', 'content' => 'UI/UX designers who understand systems and human psychology.', 'icon' => 'pen-tool'],
                                    ['title' => 'Marketing', 'content' => 'Growth hackers and content creators.', 'icon' => 'megaphone']
                                ]
                            ]
                        ],
                        [
                            'type' => 'video-modal',
                            'content' => [
                                'thumbnail' => ['unsplash-1.webp'],
                                'video_type' => 'upload',
                                'video_file' => ['croagh-2.mp4'],
                                'caption' => 'A look inside our headquarters.',
                                'airy_spacing' => 'lg'
                            ]
                        ]
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
                        [
                            'type' => 'section-header',
                            'content' => [
                                'eyebrow' => 'Get In Touch',
                                'heading' => 'Let\'s Talk',
                                'subheading' => 'We\'d love to hear from you. Drop us a line.',
                                'alignment' => 'left',
                                'theme' => 'light',
                                'airy_spacing' => 'sm'
                            ]
                        ],
                        [
                            'type' => 'bento-grid',
                            'content' => [
                                'layout_type' => 'quadrant',
                                'theme' => 'dark',
                                'items' => [
                                    ['type' => 'bento-standard', 'content' => ['title' => 'New York', 'text' => '123 Broadway St.\nNY, NY 10001']],
                                    ['type' => 'bento-standard', 'content' => ['title' => 'London', 'text' => '45 High Holborn\nLondon, UK']],
                                    ['type' => 'bento-standard', 'content' => ['title' => 'Email', 'text' => 'hello@kinetikos.com']],
                                    ['type' => 'bento-standard', 'content' => ['title' => 'Phone', 'text' => '+1 (555) 123-4567']]
                                ]
                            ]
                        ]
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

// Create them anew and copy files
foreach ($pages as $pageData) {
    try {
        $page = $kirby->site()->createChild($pageData);
        
        // Copy files
        foreach ($sourceFiles as $source => $destName) {
            if (file_exists($source)) {
                $destPath = $page->root() . '/' . $destName;
                copy($source, $destPath);
            }
        }

        $page = $page->changeStatus('unlisted');
        echo "Created page: " . $page->id() . "\n";
    } catch (Exception $e) {
        echo "Error creating " . $pageData['slug'] . ": " . $e->getMessage() . "\n";
        if (method_exists($e, 'getDetails')) {
            print_r($e->getDetails());
        }
    }
}
echo "Done.\n";
