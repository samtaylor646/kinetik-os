<?php
$theme = page('theme');
if (!$theme) return;
?>
<style>
:root {
<?php
// Inject Theme Colors dynamically
foreach ($theme->theme_colors()->toStructure() as $color) {
    if ($color->color_name()->isNotEmpty() && $color->color_value()->isNotEmpty()) {
        echo '  --color-' . esc($color->color_name(), 'attr') . ': ' . esc($color->color_value(), 'attr') . ';' . "\n";
    }
}

// Global Border Radius
$radius = $theme->border_radius()->value();
if ($radius === 'none') {
    echo "  --radius: 0px !important;\n";
    echo "  --radius-xs: 0px !important;\n";
    echo "  --radius-sm: 0px !important;\n";
    echo "  --radius-md: 0px !important;\n";
    echo "  --radius-lg: 0px !important;\n";
    echo "  --radius-xl: 0px !important;\n";
    echo "  --radius-2xl: 0px !important;\n";
    echo "  --radius-3xl: 0px !important;\n";
    echo "  --radius-4xl: 0px !important;\n";
    echo "  --radius-full: 0px !important;\n";
} elseif ($radius === 'sm') {
    echo "  --radius: 0.125rem !important;\n";
    echo "  --radius-xs: 0.125rem !important;\n";
    echo "  --radius-sm: 0.125rem !important;\n";
    echo "  --radius-md: 0.25rem !important;\n";
    echo "  --radius-lg: 0.375rem !important;\n";
    echo "  --radius-xl: 0.5rem !important;\n";
    echo "  --radius-2xl: 0.75rem !important;\n";
    echo "  --radius-3xl: 1rem !important;\n";
    echo "  --radius-4xl: 1.5rem !important;\n";
} elseif ($radius === 'md') {
    echo "  --radius: 0.375rem !important;\n";
    echo "  --radius-xs: 0.125rem !important;\n";
    echo "  --radius-sm: 0.25rem !important;\n";
    echo "  --radius-md: 0.375rem !important;\n";
    echo "  --radius-lg: 0.5rem !important;\n";
    echo "  --radius-xl: 0.75rem !important;\n";
    echo "  --radius-2xl: 1rem !important;\n";
    echo "  --radius-3xl: 1.5rem !important;\n";
    echo "  --radius-4xl: 2rem !important;\n";
} elseif ($radius === 'lg') {
    echo "  --radius: 0.5rem !important;\n";
    echo "  --radius-xs: 0.25rem !important;\n";
    echo "  --radius-sm: 0.375rem !important;\n";
    echo "  --radius-md: 0.5rem !important;\n";
    echo "  --radius-lg: 0.75rem !important;\n";
    echo "  --radius-xl: 1rem !important;\n";
    echo "  --radius-2xl: 1.5rem !important;\n";
    echo "  --radius-3xl: 2rem !important;\n";
    echo "  --radius-4xl: 3rem !important;\n";
} elseif ($radius === 'full') {
    echo "  --radius: 9999px !important;\n";
    echo "  --radius-xs: 9999px !important;\n";
    echo "  --radius-sm: 9999px !important;\n";
    echo "  --radius-md: 9999px !important;\n";
    echo "  --radius-lg: 9999px !important;\n";
    echo "  --radius-xl: 9999px !important;\n";
    echo "  --radius-2xl: 9999px !important;\n";
    echo "  --radius-3xl: 9999px !important;\n";
    echo "  --radius-4xl: 9999px !important;\n";
}

// Typography
if ($theme->base_font()->isNotEmpty()) {
    echo "  --font-sans: " . esc($theme->base_font(), 'attr') . " !important;\n";
}
if ($theme->heading_font()->isNotEmpty()) {
    echo "  --font-heading: " . esc($theme->heading_font(), 'attr') . " !important;\n";
}
?>
}
<?php if ($theme->custom_css()->isNotEmpty()): ?>
<?= $theme->custom_css() ?>
<?php endif; ?>
</style>

<?php if ($theme->font_url()->isNotEmpty()): ?>
<link rel="stylesheet" href="<?= esc($theme->font_url(), 'attr') ?>">
<?php endif; ?>

<?php if ($theme->custom_head()->isNotEmpty()): ?>
<?= $theme->custom_head() ?>
<?php endif; ?>
