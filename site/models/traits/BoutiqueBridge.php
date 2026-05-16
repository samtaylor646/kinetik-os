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
            return 'pt-airy-md pb-airy-md'; // Default fallback
        }
        
        return match($value) {
            'sm' => 'pt-airy-sm pb-airy-sm',
            'md' => 'pt-airy-md pb-airy-md',
            'lg' => 'pt-airy-lg pb-airy-lg',
            'xl' => 'pt-airy-xl pb-airy-xl',
            '2xl' => 'pt-airy-2xl pb-airy-2xl',
            'massive' => 'pt-airy-massive pb-airy-massive',
            default => "pt-airy-{$value} pb-airy-{$value}"
        };
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
            'oceanic' => 'bg-oceanic-dark text-canvas',
            'gold' => 'bg-warm-gold text-ink',
            'light' => 'bg-canvas text-ink',
            'dark' => 'bg-ink text-canvas',
            'transparent' => 'bg-transparent',
            default => 'bg-transparent', // Default to transparent so layout handles color
        };
    }
}
