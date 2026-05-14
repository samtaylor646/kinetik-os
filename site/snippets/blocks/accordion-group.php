<?php
/**
 * Path: /site/snippets/blocks/accordion-group.php
 */
$themeClass = $block->theme()->toTheme();
$spacingClass = $block->airy_spacing()->toAiry();
$allowMultiple = $block->allow_multiple()->toBool() ? 'true' : 'false';
?>
<section class="<?= $themeClass ?> <?= $spacingClass ?> accordion-group" data-gsap="section">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto" 
             x-data="{ 
                 activeItem: null, 
                 allowMultiple: <?= $allowMultiple ?>,
                 toggle(id) {
                     if (this.allowMultiple) {
                         this[id] = !this[id];
                     } else {
                         this.activeItem = this.activeItem === id ? null : id;
                     }
                 }
             }">
            
            <?php 
            $items = $block->items()->toStructure();
            $index = 0;
            foreach ($items as $item): 
                $id = 'accordion_' . $block->id() . '_' . $index;
            ?>
                <div class="tech-border border-b border-t-0 border-l-0 border-r-0 last:border-b-0"
                     <?php if ($allowMultiple === 'true'): ?>
                     x-data="{ <?= $id ?>: false }"
                     <?php endif; ?>
                >
                    <h3>
                        <button 
                            type="button"
                            class="flex w-full items-center justify-between py-6 text-left font-medium text-2xl hover:text-oceanic-accent transition-colors focus:outline-none focus:ring-2 focus:ring-inset focus:ring-oceanic-accent"
                            <?php if ($allowMultiple === 'true'): ?>
                            @click="toggle('<?= $id ?>')"
                            :aria-expanded="<?= $id ?>.toString()"
                            <?php else: ?>
                            @click="toggle('<?= $id ?>')"
                            :aria-expanded="(activeItem === '<?= $id ?>').toString()"
                            <?php endif; ?>
                            aria-controls="<?= $id ?>_content"
                        >
                            <span><?= $item->title()->html() ?></span>
                            <span class="ml-6 flex h-7 items-center">
                                <span class="transform transition-transform duration-300"
                                      <?php if ($allowMultiple === 'true'): ?>
                                      :class="{ 'rotate-180': <?= $id ?> }"
                                      <?php else: ?>
                                      :class="{ 'rotate-180': activeItem === '<?= $id ?>' }"
                                      <?php endif; ?>
                                >
                                    <?= (new \Kirby\Cms\Field($page, 'icon', 'chevron-down'))->toIcon() ?>
                                </span>
                            </span>
                        </button>
                    </h3>
                    
                    <div 
                        id="<?= $id ?>_content"
                        class="prose max-w-none text-base opacity-90 pb-5"
                        <?php if ($allowMultiple === 'true'): ?>
                        x-show="<?= $id ?>"
                        <?php else: ?>
                        x-show="activeItem === '<?= $id ?>'"
                        <?php endif; ?>
                        x-collapse
                        x-cloak
                    >
                        <?= $item->content()->toBlocks() ?>
                    </div>
                </div>
            <?php 
                $index++;
            endforeach; 
            ?>
        </div>
    </div>
</section>
