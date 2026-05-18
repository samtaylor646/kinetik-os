<?php
/** @var \Kirby\Cms\Page $page */

$iconsDir = kirby()->root('base') . '/assets/icons';
$icons = [];

if (is_dir($iconsDir)) {
    $files = scandir($iconsDir);
    foreach ($files as $file) {
        if (pathinfo($file, PATHINFO_EXTENSION) === 'svg') {
            $name = pathinfo($file, PATHINFO_FILENAME);
            $icons[] = [
                'name' => $name,
                'path' => $iconsDir . '/' . $file
            ];
        }
    }
}
?>

<div class="mb-12">
    <div class="relative w-full mb-12">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute text-ink/40 pointer-events-none" style="margin: 25px 0 0 15px;">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
        <input type="text" id="icon-search" placeholder="Search icons..." class="w-full text-lg border-2 border-ink/10 rounded-none hover:border-ink/20 bg-transparent text-ink focus:outline-none focus:border-oceanic focus:ring-1 focus:ring-oceanic transition-colors" style="padding: 20px 20px 20px 50px;">
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-6" id="icon-grid">
        <?php foreach ($icons as $icon): ?>
            <div class="icon-card relative flex flex-col items-center justify-center p-6 border border-ink/10 rounded-none hover:border-ink/30 hover:bg-ink/5 transition-all cursor-pointer group" data-name="<?= esc($icon['name'], 'attr') ?>" title="Click to copy name: <?= esc($icon['name'], 'attr') ?>">
                <div class="w-8 h-8 mb-4 text-ink flex items-center justify-center transition-transform group-hover:scale-110">
                    <?= file_get_contents($icon['path']) ?>
                </div>
                <span class="text-xs font-mono text-ink/60 truncate w-full text-center group-hover:text-ink transition-colors">
                    <?= esc($icon['name']) ?>
                </span>
                
                <div class="absolute inset-0 flex items-center justify-center bg-canvas/90 opacity-0 group-hover:opacity-100 transition-opacity rounded-none backdrop-blur-sm">
                    <span class="copy-text text-xs font-bold text-oceanic px-3 py-1 border border-oceanic/30 rounded-none bg-oceanic/10">Copy</span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div id="no-icons-message" class="hidden text-center py-12 text-ink/50">
        No icons found matching your search.
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('icon-search');
    const iconCards = document.querySelectorAll('.icon-card');
    const noIconsMessage = document.getElementById('no-icons-message');

    searchInput.addEventListener('input', (e) => {
        const searchTerm = e.target.value.toLowerCase().trim();
        let visibleCount = 0;

        iconCards.forEach(card => {
            const name = card.getAttribute('data-name').toLowerCase();
            if (name.includes(searchTerm)) {
                card.style.display = 'flex';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        if (visibleCount === 0) {
            noIconsMessage.classList.remove('hidden');
        } else {
            noIconsMessage.classList.add('hidden');
        }
    });

    iconCards.forEach(card => {
        card.addEventListener('click', async () => {
            const name = card.getAttribute('data-name');
            try {
                await navigator.clipboard.writeText(name);
                const copyText = card.querySelector('.copy-text');
                const originalText = copyText.textContent;
                copyText.textContent = 'Copied!';
                copyText.classList.replace('text-oceanic', 'text-green-600');
                copyText.classList.replace('border-oceanic/30', 'border-green-600/30');
                copyText.classList.replace('bg-oceanic/10', 'bg-green-600/10');
                
                setTimeout(() => {
                    copyText.textContent = originalText;
                    copyText.classList.replace('text-green-600', 'text-oceanic');
                    copyText.classList.replace('border-green-600/30', 'border-oceanic/30');
                    copyText.classList.replace('bg-green-600/10', 'bg-oceanic/10');
                }, 1500);
            } catch (err) {
                console.error('Failed to copy text: ', err);
            }
        });
    });
});
</script>
