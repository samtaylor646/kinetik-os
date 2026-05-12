<?php

$content = file_get_contents('content/sandbox/sandbox.txt');
preg_match('/Layout: \n\n(.*)\n\n----/s', $content, $matches);
$json = $matches[1];
$layouts = json_decode($json, true);

foreach ($layouts as $layout) {
    foreach ($layout['columns'] as $column) {
        foreach ($column['blocks'] as $block) {
            if (!isset($block['type']) || empty($block['type'])) {
                echo "Missing type in block: " . json_encode($block) . "\n";
            } else {
                echo "Found type: " . $block['type'] . "\n";
            }
        }
    }
}
