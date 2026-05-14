<?php
/**
 * Logo Cloud Block
 * Block 12
 * 
 * @var \Kirby\Cms\Block $block
 */
$items = $block->logos()->toStructure();
$themeClass = $block->theme()->toTheme();
$isAnimated = $block->enable_animation()->toBool();
$animType = $block->animation_type()->value();
?>
<section class="<?= $block->airy_spacing()->toAiry() ?> <?= $themeClass ?> px-4 overflow-hidden">
    <div class="<?= $isAnimated ? 'max-w-[100vw]' : 'max-w-6xl' ?> mx-auto">
        <?php if ($block->heading()->isNotEmpty()): ?>
            <h3 class="text-center text-label mb-12">
                <?= $block->heading()->html() ?>
            </h3>
        <?php endif ?>

        <?php if ($items->count() > 0): ?>
            <?php if ($isAnimated && $animType === 'marquee'): ?>
                <div class="relative flex overflow-hidden group w-full">
                    <div class="animate-marquee flex whitespace-nowrap items-center shrink-0 group-hover:pause">
                        <?php foreach ($items as $item): ?>
                            <?php if ($logo = $item->image()->toFile()): ?>
                                <div class="px-8 md:px-16 flex items-center justify-center opacity-40 hover:opacity-100 grayscale hover:grayscale-0 transition-all duration-500 w-[180px] md:w-[240px]">
                                    <?php if ($item->link()->isNotEmpty()): ?>
                                        <a href="<?= $item->link()->toUrl() ?>" target="_blank" rel="noopener noreferrer" class="block w-full focus:outline-none focus-visible:ring-2 focus-visible:ring-oceanic-accent">
                                    <?php endif; ?>
                                    
                                    <img 
                                        src="<?= $logo->url() ?>" 
                                        alt="<?= $item->alt_text()->or($logo->alt())->or('Partner Logo')->html() ?>" 
                                        class="w-full h-auto max-h-[80px] object-contain"
                                        loading="lazy"
                                    >
                                    
                                    <?php if ($item->link()->isNotEmpty()): ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                    
                    <!-- Duplicate for seamless scroll -->
                    <div class="animate-marquee flex whitespace-nowrap items-center shrink-0 group-hover:pause" aria-hidden="true">
                        <?php foreach ($items as $item): ?>
                            <?php if ($logo = $item->image()->toFile()): ?>
                                <div class="px-8 md:px-16 flex items-center justify-center opacity-40 hover:opacity-100 grayscale hover:grayscale-0 transition-all duration-500 w-[180px] md:w-[240px]">
                                    <?php if ($item->link()->isNotEmpty()): ?>
                                        <a href="<?= $item->link()->toUrl() ?>" target="_blank" rel="noopener noreferrer" tabindex="-1" class="block w-full focus:outline-none">
                                    <?php endif; ?>
                                    
                                    <img 
                                        src="<?= $logo->url() ?>" 
                                        alt="<?= $item->alt_text()->or($logo->alt())->or('Partner Logo')->html() ?>" 
                                        class="w-full h-auto max-h-[80px] object-contain"
                                        loading="lazy"
                                    >
                                    
                                    <?php if ($item->link()->isNotEmpty()): ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="flex flex-wrap justify-center items-center gap-8 md:gap-24">
                    <?php foreach ($items as $item): ?>
                        <?php if ($logo = $item->image()->toFile()): ?>
                            <div class="w-32 md:w-48 flex items-center justify-center opacity-40 hover:opacity-100 grayscale hover:grayscale-0 transition-all duration-500">
                                <?php if ($item->link()->isNotEmpty()): ?>
                                    <a href="<?= $item->link()->toUrl() ?>" target="_blank" rel="noopener noreferrer" class="block w-full focus:outline-none focus-visible:ring-2 focus-visible:ring-oceanic-accent">
                                <?php endif; ?>
                                
                                <img 
                                    src="<?= $logo->url() ?>" 
                                    alt="<?= $item->alt_text()->or($logo->alt())->or('Partner Logo')->html() ?>" 
                                    class="w-full h-auto max-h-[80px] object-contain"
                                    loading="lazy"
                                >
                                
                                <?php if ($item->link()->isNotEmpty()): ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endif ?>
                    <?php endforeach ?>
                </div>
            <?php endif; ?>
        <?php endif ?>
    </div>
</section>

<?php if ($isAnimated && $animType === 'marquee'): ?>
<style>
@keyframes marquee {
  0% { transform: translateX(0%); }
  100% { transform: translateX(-100%); }
}

.animate-marquee {
  animation: marquee 30s linear infinite;
}

.group:hover .group-hover\:pause {
  animation-play-state: paused;
}
</style>
<?php endif; ?>

