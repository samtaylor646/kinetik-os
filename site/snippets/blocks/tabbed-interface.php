<?php
/**
 * Path: site/snippets/blocks/tabbed-interface.php
 * Filename: tabbed-interface.php | Version: v1.1.5
 * Agent: Architect-K
 * Status: Production
 * Logic: Renders an unconventional horizontal tabbed interface block with Alpine.js
 * 
 * @var \Kirby\Cms\Block $block
 */
declare(strict_types=1);

$tabs = $block->tabs()->toStructure();
$themeClass = $block->theme()->toTheme();

// Map vertical_align to Tailwind classes
$verticalAlignMap = [
    'top'    => 'items-start',
    'center' => 'items-center',
    'end'    => 'items-end'
];
$alignClass = $verticalAlignMap[$block->vertical_align()->value()] ?? 'items-start';

// Helper to convert fractions to col-span classes
$getColClass = function($span) {
    $spanMap = [
        '1/1' => 'col-span-12',
        '1/2' => 'col-span-12 md:col-span-6',
        '1/3' => 'col-span-12 md:col-span-4',
        '2/3' => 'col-span-12 md:col-span-8',
        '1/4' => 'col-span-12 md:col-span-6 lg:col-span-3',
        '3/4' => 'col-span-12 lg:col-span-9',
        '3/5' => 'col-span-12 lg:col-span-7',
        '2/5' => 'col-span-12 lg:col-span-5',
        '1/5' => 'col-span-12 md:col-span-4 lg:col-span-2',
        '1/6' => 'col-span-12 md:col-span-4 lg:col-span-2',
        '5/12' => 'col-span-12 lg:col-span-5',
        '1/12' => 'col-span-12 lg:col-span-1',
        '6/12' => 'col-span-12 md:col-span-6',
        '4/12' => 'col-span-12 md:col-span-4',
        '8/12' => 'col-span-12 md:col-span-8',
        '3/12' => 'col-span-12 md:col-span-6 lg:col-span-3',
        '9/12' => 'col-span-12 lg:col-span-9',
        '12/12' => 'col-span-12',
        '6' => 'col-span-12 md:col-span-6',
        '4' => 'col-span-12 md:col-span-4',
        '8' => 'col-span-12 md:col-span-8',
        '3' => 'col-span-12 md:col-span-6 lg:col-span-3',
        '9' => 'col-span-12 lg:col-span-9',
        '12' => 'col-span-12',
    ];
    return $spanMap[$span] ?? 'col-span-12';
};
?>
<section class="<?= $block->airy_spacing()->toAiry() ?> <?= $themeClass ?>">
    <div class="w-full max-w-6xl mx-auto" x-data="{ activeTab: 0 }" x-cloak>
        <!-- Tab Buttons (Cruip Horizontal Style) -->
        <div class="flex flex-col sm:flex-row gap-0 border-b border-current/10 mb-8" role="tablist" aria-label="Tabs">
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
                    class="group relative flex items-center justify-center gap-3 px-8 py-5 transition-all duration-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-current font-bold"
                    :class="activeTab === <?= $index ?> ? 'text-current' : 'opacity-60 hover:opacity-100 hover:bg-current/5'"
                >
                    <?php if ($tab->icon()->isNotEmpty()): ?>
                        <span class="w-5 h-5 flex-shrink-0 inline-flex items-center justify-center transition-colors">
                            <?= $tab->icon()->toIcon() ?>
                        </span>
                    <?php endif ?>
                    <span class="text-lg whitespace-nowrap">
                        <?= $tab->title()->html() ?>
                    </span>
                    
                    <!-- Active Indicator Line -->
                    <div 
                        class="absolute bottom-0 left-0 w-full h-[3px] transition-all duration-300"
                        :class="activeTab === <?= $index ?> ? 'opacity-100 scale-x-100' : 'opacity-0 scale-x-0'"
                        style="background-color: var(--profile-pcta-bg, currentColor); transform-origin: center;"
                    ></div>
                </button>
            <?php endforeach ?>
        </div>

        <!-- Tab Panels -->
        <div class="relative grid">
            <?php foreach ($tabs as $index => $tab): ?>
                <div 
                    id="panel-<?= $index ?>"
                    role="tabpanel"
                    tabindex="0"
                    aria-labelledby="tab-<?= $index ?>"
                    x-show="activeTab === <?= $index ?>"
                    x-transition:enter="transition ease-out duration-500 delay-100"
                    x-transition:enter-start="opacity-0 translate-y-4"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    style="grid-area: 1 / 1;"
                    class="w-full focus:outline-none focus-visible:ring-2 focus-visible:ring-current"
                >
                    <div class="w-full">
                        <?php 
                            $innerLayouts = $tab->content()->get('content')->toLayouts();
                            foreach ($innerLayouts as $layout): 
                        ?>
                            <div class="grid grid-cols-12 gap-6 lg:gap-8 <?= $alignClass ?>">
                                <?php foreach ($layout->columns() as $column): ?>
                                    <div class="<?= $getColClass($column->span()) ?> flex flex-col gap-6">
                                        <?php foreach ($column->blocks() as $innerBlock): ?>
                                            <?= $innerBlock ?>
                                        <?php endforeach ?>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>

<style>
/* Prevent flicker before Alpine initializes */
[x-cloak] { display: none !important; }
</style>
