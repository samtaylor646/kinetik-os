<?php

use Kirby\Cms\App as Kirby;
use Site\Traits\BoutiqueBridge;

// Create a dummy class to access the trait methods
class BoutiqueBridgeHelper {
    use BoutiqueBridge;
    
    private $field;
    
    public function __construct($field) {
        $this->field = $field;
    }
    
    public function value() {
        return $this->field->value();
    }
}

Kirby::plugin('westport/boutique-bridge', [
    'fieldMethods' => [
        'toAiry' => function ($field) {
            $helper = new BoutiqueBridgeHelper($field);
            return $helper->toAiry();
        },
        'toIcon' => function ($field) {
            $helper = new BoutiqueBridgeHelper($field);
            return $helper->toIcon();
        },
        'toTheme' => function ($field) {
            $helper = new BoutiqueBridgeHelper($field);
            return $helper->toTheme();
        }
    ]
]);
