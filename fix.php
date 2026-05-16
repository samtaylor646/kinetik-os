<?php
require 'kirby/bootstrap.php';
$kirby = new Kirby();
$kirby->impersonate('kirby');
$model = $kirby->page('theme');

try {
    $field = Kirby\Form\Field::factory('select', [
        'name'  => 'bg_color',
        'model' => $model,
        'options' => [
            'type' => 'query',
            'query' => 'page.theme_colors.toStructure',
            'text' => '{{ item.color_name }}',
            'value' => '{{ item.color_name }}'
        ]
    ]);
    print_r($field->options());
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
