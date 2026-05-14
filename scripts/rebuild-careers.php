<?php
require_once __DIR__ . '/../kirby/bootstrap.php';

$kirby = new Kirby();
$kirby->impersonate('kirby');

$sourceFiles = [
    __DIR__ . '/../content/1_home/croagh-2.mp4' => 'croagh-2.mp4',
    __DIR__ . '/../content/1_home/unsplash-image-oalh2mojuuk.webp' => 'unsplash-1.webp',
    __DIR__ . '/../content/1_home/unsplash-image-pyypechonnc.webp' => 'unsplash-2.webp',
];

$pages = [
    [
        'slug'     => 'sb-employment',
        'template' => 'sandbox',
        'content'  => [
            'title'  => 'Careers',
            'layout' => json_encode([
                [
                    'columns' => [['width' => '1/1', 'blocks' => [
                        [
                            'type' => 'split-hero',
                            'content' => [
                                'heading' => 'Empower Your Career',
                                'subheading' => 'Join our team of innovators building scalable, sustainable digital infrastructure for the future. We are driven by purpose and fueled by passion.',
                                'image' => ['unsplash-1.webp'],
                                'background_video' => ['croagh-2.mp4'],
                                'video_fit' => 'cover',
                                'video_overlay_opacity' => '40',
                                'cta_text' => 'See Open Roles',
                                'cta_link' => 'https://example.com/roles',
                                'theme' => 'oceanic',
                                'airy_spacing' => 'xl'
                            ]
                        ],
                        [
                            'type' => 'bento-grid',
                            'content' => [
                                'layout_type' => 'feature_showcase',
                                'theme' => 'light',
                                'items' => [
                                    ['type' => 'bento-stat', 'content' => ['value' => '50+', 'label' => 'Countries Reached']],
                                    ['type' => 'bento-stat', 'content' => ['value' => '1M+', 'label' => 'Active Users']],
                                    ['type' => 'bento-media', 'content' => ['image' => ['unsplash-2.webp'], 'caption' => 'Our Global Headquarters']]
                                ]
                            ]
                        ],
                        [
                            'type' => 'asymmetric-columns',
                            'content' => [
                                'heading' => 'Our Mission & Culture',
                                'text' => '<p>We are dedicated to ensuring that transformative technologies are aligned with human values and accessible to all.</p><p>We believe in transparency, continuous learning, and fostering a collaborative environment where every voice is heard.</p>',
                                'alignment' => 'left',
                                'theme' => 'light',
                                'airy_spacing' => 'lg',
                                'media_blocks' => [
                                    ['type' => 'image', 'content' => ['image' => ['unsplash-1.webp']]]
                                ]
                            ]
                        ],
                        [
                            'type' => 'statement-quote',
                            'content' => [
                                'quote' => 'Working here means being at the forefront of innovation. The culture is incredibly supportive, and every day brings a new, exciting challenge that pushes me to grow.',
                                'author' => 'Sarah Jenkins',
                                'role' => 'Lead Engineer',
                                'theme' => 'oceanic',
                                'airy_spacing' => 'lg'
                            ]
                        ],
                        [
                            'type' => 'section-header',
                            'content' => [
                                'heading' => 'Perks & Benefits',
                                'subheading' => 'We take care of our team so they can focus on doing their best work.',
                                'alignment' => 'center',
                                'theme' => 'light',
                                'airy_spacing' => 'md'
                            ]
                        ],
                        [
                            'type' => 'feature-grid',
                            'content' => [
                                'columns' => '3',
                                'theme' => 'light',
                                'airy_spacing' => 'md',
                                'features' => [
                                    ['icon' => 'globe-2', 'title' => 'Remote-First Flexibility', 'description' => 'Work from anywhere in the world. We support flexible schedules and async work.'],
                                    ['icon' => 'heart', 'title' => 'Comprehensive Health', 'description' => 'Top-tier medical, dental, and vision coverage for you and your family.'],
                                    ['icon' => 'book-open', 'title' => 'Continuous Learning', 'description' => 'Generous stipends for conferences, courses, books, and home office setup.'],
                                    ['icon' => 'party-popper', 'title' => 'Team Retreats', 'description' => 'Annual offsites in beautiful locations to connect with colleagues in person.'],
                                    ['icon' => 'leaf', 'title' => 'Wellness Programs', 'description' => 'Access to mental health resources, gym memberships, and wellness days.'],
                                    ['icon' => 'users', 'title' => 'Parental Leave', 'description' => 'Fully paid, generous parental leave for all new parents.']
                                ]
                            ]
                        ],
                        [
                            'type' => 'horizontal-scroll',
                            'content' => [
                                'theme' => 'oceanic',
                                'panels' => [
                                    ['type' => 'image', 'content' => ['image' => ['unsplash-1.webp']]],
                                    ['type' => 'image', 'content' => ['image' => ['unsplash-2.webp']]],
                                    ['type' => 'text', 'content' => ['text' => '<h1>Life at the Company</h1><p>Experience the vibrant culture and dynamic environment.</p>']]
                                ]
                            ]
                        ],
                        [
                            'type' => 'section-header',
                            'content' => [
                                'heading' => 'Open Roles',
                                'subheading' => 'Find your next big opportunity and help us build the future.',
                                'alignment' => 'left',
                                'theme' => 'light',
                                'airy_spacing' => 'lg'
                            ]
                        ],
                        [
                            'type' => 'data-table',
                            'content' => [
                                'heading' => 'Engineering & Research',
                                'headers' => ['col1' => 'Role', 'col2' => 'Location', 'col3' => 'Type', 'col4' => 'Link'],
                                'table_data' => [
                                    ['col1' => 'Senior Research Scientist', 'col2' => 'Remote (Global)', 'col3' => 'Full-time', 'col4' => '/sb-jobdetail'],
                                    ['col1' => 'Machine Learning Engineer', 'col2' => 'London / Remote', 'col3' => 'Full-time', 'col4' => '/sb-jobdetail'],
                                    ['col1' => 'Safety Researcher', 'col2' => 'Remote', 'col3' => 'Full-time', 'col4' => '/sb-jobdetail']
                                ],
                                'airy_spacing' => 'md'
                            ]
                        ]
                    ]]]
                ]
            ])
        ]
    ],
    [
        'slug'     => 'sb-jobdetail',
        'template' => 'sandbox',
        'content'  => [
            'title'  => 'Senior Research Scientist',
            'layout' => json_encode([
                [
                    'columns' => [['width' => '1/1', 'blocks' => [
                        [
                            'type' => 'section-header',
                            'content' => [
                                'eyebrow' => 'Engineering & Research • Remote (Global) • Full-time',
                                'heading' => 'Senior Research Scientist',
                                'subheading' => 'Lead cutting-edge research in AI safety and alignment.',
                                'alignment' => 'left',
                                'theme' => 'light',
                                'airy_spacing' => 'md'
                            ]
                        ],
                        [
                            'type' => 'cta-banner',
                            'content' => [
                                'heading' => 'Ready to apply?',
                                'text' => '',
                                'buttons' => [
                                    ['label' => 'Apply for this job', 'url' => 'https://example.com/apply', 'style' => 'primary']
                                ],
                                'theme' => 'light',
                                'airy_spacing' => 'sm'
                            ]
                        ],
                        [
                            'type' => 'asymmetric-columns',
                            'content' => [
                                'heading' => 'About the Role',
                                'text' => '<p>As a Senior Research Scientist, you will be responsible for defining and executing long-term research agendas aimed at making advanced AI systems safer and more reliable.</p>
                                <h3>What you will do</h3>
                                <ul>
                                    <li>Design and run experiments to evaluate model robustness and interpretability.</li>
                                    <li>Collaborate with engineers to scale up promising methods.</li>
                                    <li>Publish findings in top-tier venues (NeurIPS, ICLR, ICML).</li>
                                    <li>Mentor junior researchers and contribute to a culture of rigorous inquiry.</li>
                                </ul>
                                <h3>Requirements</h3>
                                <ul>
                                    <li>Ph.D. in Computer Science, Machine Learning, or a related field (or equivalent experience).</li>
                                    <li>Strong track record of publications in machine learning.</li>
                                    <li>Proficiency in Python and deep learning frameworks (PyTorch or JAX).</li>
                                    <li>Deeply analytical mindset and ability to formalize ambiguous problems.</li>
                                </ul>
                                <h3>Benefits</h3>
                                <ul>
                                    <li>Highly competitive salary and equity package.</li>
                                    <li>Comprehensive health insurance.</li>
                                    <li>Unlimited PTO and generous parental leave.</li>
                                    <li>Annual offsites in global locations.</li>
                                </ul>',
                                'alignment' => 'left',
                                'theme' => 'light',
                                'airy_spacing' => 'lg',
                                'media_blocks' => []
                            ]
                        ],
                        [
                            'type' => 'cta-banner',
                            'content' => [
                                'heading' => 'Join our mission',
                                'text' => 'Help us build safe, aligned AI.',
                                'buttons' => [
                                    ['label' => 'Apply Now', 'url' => 'https://example.com/apply', 'style' => 'primary']
                                ],
                                'theme' => 'oceanic',
                                'airy_spacing' => 'lg'
                            ]
                        ]
                    ]]]
                ]
            ])
        ]
    ]
];

// Delete existing
foreach (['sb-employment', 'sb-jobdetail'] as $slug) {
    if ($existing = $kirby->page($slug)) {
        $existing->delete(true);
    }
}

// Create new
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

        $page = $page->changeStatus('listed');
        echo "Created page: " . $page->id() . "\n";
    } catch (Exception $e) {
        echo "Error creating " . $pageData['slug'] . ": " . $e->getMessage() . "\n";
        if (method_exists($e, 'getDetails')) {
            print_r($e->getDetails());
        }
    }
}
echo "Done.\n";
