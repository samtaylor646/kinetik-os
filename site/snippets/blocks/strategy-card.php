<?php
/**
 * Path: /site/snippets/blocks/strategy-card.php
 */
$themeClass = $block->theme()->toTheme();
?>
<div 
    class="strategy-card <?= $themeClass ?> rounded-xl p-6 sm:p-8 shadow-sm transition-all duration-300 hover:shadow-md"
    x-data="{ expanded: false }"
>
    <div class="flex items-start gap-4">
        <?php if ($block->icon()->isNotEmpty()): ?>
            <div class="shrink-0 w-12 h-12 rounded-full bg-oceanic-accent/10 flex items-center justify-center text-oceanic-accent">
                <?= $block->icon()->toIcon() ?>
            </div>
        <?php endif; ?>
        
        <div class="grow">
            <?php if ($block->title()->isNotEmpty()): ?>
                <h3 class="text-xl sm:text-2xl font-bold mb-2">
                    <?= $block->title()->html() ?>
                </h3>
            <?php endif; ?>
            
            <?php if ($block->summary()->isNotEmpty()): ?>
                <div class="text-base opacity-80 mb-4 prose">
                    <?= $block->summary()->kt() ?>
                </div>
            <?php endif; ?>
            
            <?php if ($block->details()->isNotEmpty()): ?>
                <div 
                    x-show="expanded" 
                    x-collapse
                    class="prose text-base opacity-90 mb-4 border-t border-current/10 pt-4 mt-4"
                    x-cloak
                >
                    <?= $block->details()->kt() ?>
                </div>
                
                <button 
                    @click="expanded = !expanded" 
                    class="inline-flex items-center gap-2 text-sm font-semibold text-oceanic-accent hover:opacity-80 transition-opacity focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-oceanic-accent rounded px-2 py-1 -ml-2"
                    :aria-expanded="expanded.toString()"
                >
                    <span x-text="expanded ? 'Show Less' : 'Read Full Strategy'">Read Full Strategy</span>
                    <span class="transform transition-transform duration-300" :class="{ 'rotate-180': expanded }">
                        <?= (new \Kirby\Cms\Field($page, 'icon', 'chevron-down'))->toIcon() ?>
                    </span>
                </button>
            <?php endif; ?>
        </div>
    </div>
</div>
