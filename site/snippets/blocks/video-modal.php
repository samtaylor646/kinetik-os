<?php
/**
 * Video Modal Block
 * Block 13
 * 
 * @var \Kirby\Cms\Block $block
 */
$thumbnail = $block->thumbnail()->toFile();
$type = $block->video_type()->value();
if (!$type && $block->content()->get('type')->value()) $type = $block->content()->get('type')->value();
if (!$type) $type = 'youtube'; // default

$url = $block->video_url()->value();
if (!$url) $url = $block->videourl()->value();
if (!$url) $url = $block->content()->get('videoUrl')->value();

$file = $block->video_file()->toFile();

// Extract video ID for embed
$embedUrl = '';
if ($type === 'youtube' && $url) {
    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i', $url, $match);
    $videoId = $match[1] ?? '';
    if ($videoId) {
        $embedUrl = "https://www.youtube-nocookie.com/embed/{$videoId}?autoplay=1&rel=0";
    }
} elseif ($type === 'vimeo' && $url) {
    preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)%i', $url, $match);
    $videoId = $match[3] ?? '';
    if ($videoId) {
        $embedUrl = "https://player.vimeo.com/video/{$videoId}?autoplay=1&title=0&byline=0&portrait=0";
    }
}
?>
<section class="<?= $block->airy_spacing()->toAiry() ?> px-4" x-data="{ modalOpen: false }">
    <div class="max-w-5xl mx-auto relative group cursor-pointer" @click="modalOpen = true" @keydown.enter="modalOpen = true" tabindex="0" role="button" aria-label="Play Video">
        
        <!-- Thumbnail -->
        <div class="relative  overflow-hidden bg-ink aspect-video ">
            <?php if ($thumbnail): ?>
                <img 
                    src="<?= $thumbnail->url() ?>" 
                    alt="<?= $thumbnail->alt()->or('Video thumbnail') ?>" 
                    class="w-full h-full object-cover opacity-80 group-hover:opacity-60 transition-opacity duration-500"
                    loading="lazy"
                >
            <?php else: ?>
                <div class="w-full h-full bg-ink"></div>
            <?php endif ?>

            <!-- Play Button -->
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="w-20 h-20 bg-oceanic-accent text-canvas  flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                </div>
            </div>
        </div>

        <?php if ($block->caption()->isNotEmpty()): ?>
            <p class="text-center text-sm text-ink/60 mt-4"><?= $block->caption()->html() ?></p>
        <?php endif ?>
    </div>

    <!-- Modal -->
    <template x-teleport="body">
        <div 
            x-show="modalOpen" 
            style="display: none;"
            class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6"
            @keydown.escape.window="modalOpen = false"
        >
            <!-- Backdrop -->
            <div 
                class="absolute inset-0 bg-ink/90 backdrop-blur-sm"
                x-show="modalOpen"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                @click="modalOpen = false"
            ></div>

            <!-- Video Container -->
            <div 
                class="relative w-full max-w-6xl aspect-video bg-black  overflow-hidden  ring-1 ring-white/10"
                x-show="modalOpen"
                x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
            >
                <button 
                    @click="modalOpen = false" 
                    class="absolute top-4 right-4 z-10 w-10 h-10 bg-black/50 hover:bg-black/80 text-white  flex items-center justify-center transition-colors focus:outline-none focus:ring-2 focus:ring-oceanic-accent"
                    aria-label="Close modal"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>

                <template x-if="modalOpen">
                    <div class="w-full h-full">
                        <?php if ($type === 'upload' && $file): ?>
                            <video 
                                src="<?= $file->url() ?>" 
                                class="w-full h-full object-contain"
                                controls 
                                autoplay 
                                playsinline
                            ></video>
                        <?php elseif ($embedUrl): ?>
                            <iframe 
                                src="<?= $embedUrl ?>" 
                                class="w-full h-full"
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen
                            ></iframe>
                        <?php else: ?>
                            <div class="w-full h-full flex items-center justify-center text-white">
                                <p>Video source not configured properly.</p>
                            </div>
                        <?php endif ?>
                    </div>
                </template>
            </div>
        </div>
    </template>
</section>
