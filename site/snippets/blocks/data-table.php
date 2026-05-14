<?php
/**
 * Data Table Block
 * Block 9
 * 
 * @var \Kirby\Cms\Block $block
 */
$rows = $block->table_data()->toStructure();
$headers = $block->headers()->toStructure()->first();
?>
<section class="<?= $block->airy_spacing()->toAiry() ?> bg-canvas px-4">
    <div class="max-w-5xl mx-auto">
        <?php if ($block->heading()->isNotEmpty()): ?>
            <h3 class="display-text mb-8 text-ink"><?= $block->heading()->html() ?></h3>
        <?php endif ?>

        <div class="relative tech-border" x-data="{ scrolled: false }">
            <!-- Scroll Indicator -->
            <div 
                class="absolute right-0 top-0 bottom-0 w-8 bg-linear-to-l from-canvas to-transparent pointer-events-none transition-opacity duration-300 z-10 md:hidden"
                x-show="!scrolled"
            ></div>

            <div class="overflow-x-auto min-w-full" @scroll.passive="scrolled = $el.scrollLeft > 20">
                <table class="w-full text-left border-collapse text-ink">
                    <?php if ($headers): ?>
                        <thead class="bg-ink/5 tech-border sticky top-0 z-10">
                            <tr>
                                <?php foreach (['col1', 'col2', 'col3', 'col4'] as $col): ?>
                                    <?php if ($headers->$col()->isNotEmpty()): ?>
                                        <th class="px-8 py-6 text-label text-oceanic-dark whitespace-nowrap">
                                            <?= $headers->$col()->html() ?>
                                        </th>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </tr>
                        </thead>
                    <?php endif ?>
                    
                    <tbody class="divide-y divide-ink/10">
                        <?php foreach ($rows as $row): ?>
                            <tr class="hover:bg-ink/5 transition-colors">
                                <?php foreach (['col1', 'col2', 'col3', 'col4'] as $col): ?>
                                    <?php if ($headers && $headers->$col()->isNotEmpty()): ?>
                                        <td class="px-8 py-6 whitespace-nowrap text-lg font-light">
                                            <?= $row->$col()->html() ?>
                                        </td>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            
            <!-- Mobile Swipe Hint -->
            <div class="text-center py-4 text-label text-ink/60 md:hidden flex items-center justify-center gap-2 tech-border border-t">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-horizontal"><polyline points="18 8 22 12 18 16"/><polyline points="6 8 2 12 6 16"/><line x1="2" x2="22" y1="12" y2="12"/></svg>
                Swipe to see more
            </div>
        </div>
    </div>
</section>
