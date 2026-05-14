<?php
declare(strict_types=1);

/**
 * Path: /site/models/traits/BoutiqueBridge.php
 * Filename: BoutiqueBridge.php | Version: v7.8.0
 * Agent: Architect-K
 * Status: Production
 * Logic: Kirby field method extensions for Tailwind token interpolation
 */

namespace Site\Traits;

trait BoutiqueBridge
{
    /**
     * Convert spacing field to Tailwind airy utility
     * 
     * @return string Tailwind padding classes
     */
    public function toAiry(): string
    {
        $value = $this->value();
        if (empty($value)) {
            return 'py-airy-md'; // Default fallback
        }
        
        return "pt-airy-{$value} pb-airy-{$value}";
    }

    /**
     * Inject Lucide SVG icon
     * 
     * @return string Raw SVG markup
     */
    public function toIcon(): string
    {
                $iconName = $this->value();
        if (str_starts_with($iconName, '[')) {
            $decoded = json_decode($iconName, true);
            if (is_array($decoded) && count($decoded) > 0) {
                $iconName = $decoded[0];
            }
        }
        if (empty($iconName)) {
            return '';
        }
        
        // Load from lucide icon directory
                $iconFile = str_ends_with($iconName, '.svg') ? $iconName : $iconName . '.svg';
        $iconPath = kirby()->root('base') . '/assets' . "/icons/{$iconFile}";
        
        if (file_exists($iconPath)) {
            return file_get_contents($iconPath);
        }
        
        return "<!-- Icon not found: {$iconName} -->";
    }

    /**
     * Convert theme field to Tailwind flood classes
     * 
     * @return string Background and text color classes
     */
    public function toTheme(): string
    {
        $theme = $this->value();
        
        return match($theme) {
            'oceanic' => 'bg-[var(--color-oceanic-dark)] text-[var(--color-canvas)]',
            'gold' => 'bg-[var(--color-warm-gold)] text-[var(--color-ink)]',
            'light' => 'bg-[var(--color-canvas)] text-[var(--color-ink)]',
            'dark' => 'bg-[var(--color-ink)] text-[var(--color-canvas)]',
            'transparent' => 'bg-transparent',
            default => 'bg-transparent', // Default to transparent so layout handles color
        };
    }
}
