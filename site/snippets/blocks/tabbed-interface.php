<?php
/**
 * Path: site/snippets/blocks/tabbed-interface.php
 * Filename: tabbed-interface.php | Version: v1.0.0
 * Agent: Architect-K
 * Status: Production
 * Logic: Renders a tabbed interface block with Alpine.js
 * 
 * @var \Kirby\Cms\Block $block
 */
declare(strict_types=1);

$tabs = $block->tabs()->toStructure();
$themeClass = $block->theme()->toTheme();
?>
<section class="<?= $block->airy_spacing()->toAiry() ?> <?= $themeClass ?>">
    <div class="max-w-4xl mx-auto w-full" x-data="{ activeTab: 0 }">
        <!-- Tab Buttons -->
            <div class="flex overflow-x-auto border-b hide-scrollbar border-current/10" role="tablist" aria-label="Tabs" style="border-color: color-mix(in srgb, currentColor 10%, transparent);">
                <?php foreach ($tabs as $index => $tab): ?>
                    <button 
                        id="tab-<?= $index ?>"
                        role="tab"
                        :aria-selected="activeTab === <?= $index ?>"
                        :tabindex="activeTab === <?= $index ?> ? 0 : -1"
                        aria-controls="panel-<?= $index ?>"
                        @click="activeTab = <?= $index ?>"
                        @keydown.right.prevent="activeTab = activeTab === <?= $tabs->count() - 1 ?> ? 0 : activeTab + 1; $nextTick(() => { $refs['tab-' + activeTab].focus() })"
                        @keydown.left.prevent="activeTab = activeTab === 0 ? <?= $tabs->count() - 1 ?> : activeTab - 1; $nextTick(() => { $refs['tab-' + activeTab].focus() })"
                        :x-ref="'tab-' + <?= $index ?>"
                        class="flex items-center gap-2 px-6 py-4 text-sm font-medium transition-all whitespace-nowrap focus:outline-none focus-visible:ring-2 focus-visible:ring-current relative"
                        :class="activeTab === <?= $index ?> ? 'opacity-100 font-bold' : 'opacity-60 hover:opacity-100'"
                    >
                        <?php if ($tab->icon()->isNotEmpty()): ?>
                            <span class="w-4 h-4 inline-flex items-center justify-center">
                                <?= $tab->icon()->toIcon() ?>
                            </span>
                        <?php endif ?>
                        <?= $tab->title()->html() ?>
                        
                        <!-- Active indicator line -->
                        <div 
                            class="absolute bottom-0 left-0 w-full h-[2px] transition-opacity duration-300"
                            :class="activeTab === <?= $index ?> ? 'opacity-100' : 'opacity-0'"
                            style="background-color: var(--profile-pcta-bg, currentColor);"
                        ></div>
                    </button>
                <?php endforeach ?>
            </div>

            <!-- Tab Panels -->
            <div class="mt-8">
                <?php foreach ($tabs as $index => $tab): ?>
                    <div 
                        id="panel-<?= $index ?>"
                        role="tabpanel"
                        tabindex="0"
                        aria-labelledby="tab-<?= $index ?>"
                        x-show="activeTab === <?= $index ?>"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="prose prose-lg max-w-none focus:outline-none focus-visible:ring-2 focus-visible:ring-current"
                    >
                        <?= $tab->content()->get('content')->kirbytext() ?>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
</section>

<style>
.hide-scrollbar::-webkit-scrollbar {
    display: none;
}
.hide-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
/* Ensure prose inherits color correctly */
.prose {
    color: inherit;
}
.prose h1, .prose h2, .prose h3, .prose h4, .prose h5, .prose h6, .prose p, .prose ul, .prose ol, .prose strong, .prose b, .prose a {
    color: inherit;
}
</style>
