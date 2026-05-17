<?php
/**
 * Responsive Image Snippet
 * 
 * @var \Kirby\Cms\File $file The image file object
 * @var string $class Optional CSS classes
 * @var string $alt Optional alt text override (defaults to file alt metadata)
 * @var string $srcset Optional srcset preset name from config (defaults to 'default')
 * @var string $sizes Optional sizes attribute
 */

if (!isset($file) || !$file) return;

$alt = $alt ?? $file->alt()->or('')->value();
$class = $class ?? '';
$srcsetPreset = $srcset ?? 'default';
$sizesAttr = $sizes ?? '100vw';

if ($file->extension() === 'svg') {
    echo '<img src="' . $file->url() . '" class="' . $class . '" alt="' . htmlspecialchars($alt) . '" width="' . $file->width() . '" height="' . $file->height() . '">';
    return;
}
?>
<picture>
    <source srcset="<?= $file->srcset($srcsetPreset) ?>" type="image/webp" sizes="<?= $sizesAttr ?>">
    <img 
        src="<?= $file->resize(1200)->url() ?>" 
        class="<?= $class ?>" 
        alt="<?= htmlspecialchars($alt) ?>" 
        width="<?= $file->width() ?>" 
        height="<?= $file->height() ?>" 
        loading="lazy"
    >
</picture>
