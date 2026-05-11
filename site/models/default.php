<?php
declare(strict_types=1);

/**
 * Path: /site/models/default.php
 * Filename: default.php | Version: v7.8.0
 * Agent: Architect-K
 * Status: Production
 * Logic: Default page model with bridge methods
 */

use Kirby\Cms\Page;
use Site\Traits\BoutiqueBridge;

class DefaultPage extends Page
{
    use BoutiqueBridge;

    /**
     * Logic gate: Check if page needs GSAP
     */
    public function needsGsap(): bool
    {
        $blocks = $this->blocks()->toBlocks();
        
        foreach ($blocks as $block) {
            if (in_array($block->type(), ['split-hero', 'video-modal', 'asymmetric-image'])) {
                return true;
            }
        }
        
        return false;
    }
}
