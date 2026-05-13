<?php
require_once __DIR__ . '/../kirby/bootstrap.php';

$kirby = new Kirby();
$kirby->impersonate('kirby');

$pagesToUpdate = [
    'sb-homepage',
    'sb-services',
    'sb-about',
    'sb-contact',
    'sb-employment',
    'sb-jobdetail'
];

$dummyLayout = '[{"attrs":[],"columns":[{"blocks":[{"content":{"text":"<p>Welcome to the Kinetik OS Sandbox. This page is built using the robust layout builder and utilizes the Fluid Glass design principles.</p>"},"id":"123","isHidden":false,"type":"text"}],"id":"col1","width":"1/1"}]}]';

foreach ($pagesToUpdate as $slug) {
    $page = $kirby->page($slug);
    if ($page) {
        $page->update([
            'layout' => $dummyLayout
        ]);
        echo "Updated layout for: " . $slug . "\n";
    }
}
echo "Content population complete.\n";
