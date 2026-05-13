<?php

\Kirby\Cms\App::plugin('kinetik/icon-method', [
    'siteMethods' => [
        'iconOptions' => function () {
            $icons = [];
            $path = kirby()->root('base') . '/assets/icons';
            
            if (is_dir($path)) {
                $files = glob($path . '/*.svg');
                foreach ($files as $file) {
                    $name = basename($file, '.svg');
                    $label = ucwords(str_replace('-', ' ', $name));
                    $icons[] = [
                        'value' => $name,
                        'text'  => $label . ' (' . $name . ')'
                    ];
                }
            }
            
            usort($icons, function($a, $b) {
                return strcmp($a['text'], $b['text']);
            });
            
            return $icons;
        }
    ]
]);
