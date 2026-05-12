<?php
$file = 'content/_drafts/sandbox/sandbox.txt';
$content = file_get_contents($file);

$parts = explode('----', $content);
$json = '';
$layoutPartIndex = -1;

foreach ($parts as $i => $part) {
    if (strpos($part, 'Layout:') !== false) {
        $json = trim(str_replace('Layout:', '', $part));
        $layoutPartIndex = $i;
        break;
    }
}

if (!$json) {
    echo "Could not find layout field.\n";
    exit;
}

$layouts = json_decode($json, true);

foreach ($layouts as &$layout) {
    foreach ($layout['columns'] as &$column) {
        foreach ($column['blocks'] as &$block) {
            if ($block['type'] === 'bento-grid') {
                if (isset($block['content']['items']) && is_array($block['content']['items'])) {
                    foreach ($block['content']['items'] as &$item) {
                        if (!isset($item['type'])) {
                            $item['type'] = 'text'; // Fallback
                        }
                    }
                }
            }
        }
    }
}

$newJson = json_encode($layouts);
$parts[$layoutPartIndex] = "\nLayout: " . $newJson . "\n\n";

file_put_contents($file, implode('----', $parts));
echo "Updated sandbox.txt\n";
