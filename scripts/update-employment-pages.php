<?php
require_once __DIR__ . '/../kirby/bootstrap.php';

$kirby = new Kirby();
$kirby->impersonate('kirby');

$pages = [
    [
        'slug'     => 'sb-employment',
        'template' => 'sandbox',
        'content'  => [
            'title'  => 'Employment (Sandbox)',
            'layout' => json_encode([
                [
                    'columns' => [['width' => '1/1', 'blocks' => [
                        ['type' => 'section-header', 'content' => ['heading' => 'Join Our Team', 'text' => 'We are always looking for exceptional talent to join our federal design initiative.']],
                        ['type' => 'heading', 'content' => ['text' => 'Open Positions', 'level' => 'h2']],
                        // Using Data Table to simulate a job listing
                        ['type' => 'data-table', 'content' => [
                            'heading' => '',
                            'headers' => [
                                ['col1' => 'Role', 'col2' => 'Department', 'col3' => 'Location', 'col4' => 'Type']
                            ],
                            'table_data' => [
                                ['col1' => '<a href="/sb-jobdetail" class="underline hover:text-oceanic-accent">Senior Systems Architect</a>', 'col2' => 'Engineering', 'col3' => 'Remote / DC', 'col4' => 'Full-time'],
                                ['col1' => '<a href="/sb-jobdetail" class="underline hover:text-oceanic-accent">Frontend Developer (React/Vue)</a>', 'col2' => 'Engineering', 'col3' => 'New York', 'col4' => 'Full-time'],
                                ['col1' => '<a href="/sb-jobdetail" class="underline hover:text-oceanic-accent">Federal Compliance Specialist</a>', 'col2' => 'Operations', 'col3' => 'Washington DC', 'col4' => 'Contract']
                            ]
                        ]],
                        ['type' => 'cta-banner', 'content' => ['heading' => 'Don\'t see a fit?', 'text' => 'Send us your resume anyway. We are always hiring.', 'button_text' => 'General Application']]
                    ]]]
                ]
            ])
        ]
    ],
    [
        'slug'     => 'sb-jobdetail',
        'template' => 'sandbox',
        'content'  => [
            'title'  => 'Job Detail (Sandbox)',
            'layout' => json_encode([
                [
                    'columns' => [
                        // Left column for job description
                        ['width' => '2/3', 'blocks' => [
                            ['type' => 'section-header', 'content' => ['heading' => 'Senior Systems Architect', 'text' => 'Engineering • Remote / DC • Full-time']],
                            ['type' => 'text', 'content' => ['text' => '<p>As a Senior Systems Architect at Kinetik OS, you will lead the technical design and federal compliance integrations of our flagship platform.</p><h2>Responsibilities</h2><ul><li>Design brutalist-minimalist data structures</li><li>Ensure SOC2 and Federal Compliance</li><li>Lead a team of cross-functional engineers</li></ul><h2>Requirements</h2><ul><li>10+ years of system architecture</li><li>Experience with PHP, Vue, React, or similar</li><li>Secret Clearance preferred</li></ul>']],
                            ['type' => 'accordion-group', 'content' => [
                                'items' => [
                                    ['title' => 'Benefits & Perks', 'content' => json_encode([['type' => 'list', 'content' => ['text' => '- Full health coverage\n- 401k matching\n- Unlimited PTO']]])]
                                ]
                            ]]
                        ]],
                        // Right column for application CTA / Info
                        ['width' => '1/3', 'blocks' => [
                            ['type' => 'strategy-card', 'content' => ['heading' => 'Apply Now', 'text' => 'Submit your resume and cover letter to our hiring portal.', 'button_text' => 'Submit Application']],
                            ['type' => 'quote', 'content' => ['text' => 'This is the most challenging and rewarding work of my career.', 'citation' => 'Current Employee']]
                        ]]
                    ]
                ]
            ])
        ]
    ]
];

foreach ($pages as $pageData) {
    if ($existing = $kirby->page($pageData['slug'])) {
        $existing->delete(true);
    }
    try {
        $page = $kirby->site()->createChild($pageData);
        $page->changeStatus('unlisted');
        echo "Created page: " . $page->id() . "\n";
    } catch (Exception $e) {
        echo "Error creating " . $pageData['slug'] . ": " . $e->getMessage() . "\n";
    }
}
