<?php
/**
 * Tabbed Interface Block
 * Block 10
 * 
 * @var \Kirby\Cms\Block $block
 */
$tabs = $block->tabs()->toStructure();
?>
<section class="<?= $block->airy_spacing()->toAiry() ?> bg-canvas px-4">
    <div class="max-w-4xl mx-auto" x-data="{ activeTab: 0 }">
        <!-- Tab Buttons -->
        <div class="flex overflow-x-auto border-b border-ink/10 hide-scrollbar" role="tablist" aria-label="Tabs">
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
                    class="flex items-center gap-2 px-6 py-4 text-sm font-medium transition-colors whitespace-nowrap focus:outline-none focus-visible:ring-2 focus-visible:ring-oceanic-accent"
                    :class="activeTab === <?= $index ?> ? 'border-b-2 border-oceanic-accent text-oceanic-dark' : 'text-ink/60 hover:text-ink hover:border-ink/20'"
                >
                    <?php if ($tab->icon()->isNotEmpty()): ?>
                        <span class="w-4 h-4 inline-flex items-center justify-center">
                            <?= $tab->icon()->toIcon() ?>
                        </span>
                    <?php endif ?>
                    <?= $tab->title()->html() ?>
                </button>
            <?php endforeach ?>
        </div>

        <!-- Tab Panels -->
        <div class="mt-6">
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
                    class="prose prose-lg text-ink focus:outline-none focus-visible:ring-2 focus-visible:ring-oceanic-accent "
                >
                    <?= $tab->content()->kirbytext() ?>
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
</style>
