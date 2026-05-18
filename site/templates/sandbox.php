<?php
/** @var \Kirby\Cms\Page $page */
?>
<?php snippet('header') ?>

<main class="sandbox-page w-full">
  <div class="px-4 md:px-16 max-w-[1600px] mx-auto py-8">
    <div class="flex items-center justify-between border-b border-ink/10 pb-4 mb-12">
      <h1 class="text-4xl font-bold">Sandbox - Block Testing Environment</h1>
      <button onclick="exportSandboxToCSV()" class="flex items-center gap-2 text-sm font-bold tracking-wider uppercase text-brand-accent hover:text-ink transition-colors cursor-pointer bg-brand-accent/10 hover:bg-ink/5 px-4 py-2 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
        EXPORT TO CSV
      </button>
    </div>
  </div>
  
  <script>
    function exportSandboxToCSV() {
      let csvRows = []; // Removed "Type,Settings" header
      
      // Select only the settings bars (the flex containers with the text-xs font-mono classes)
      const rows = document.querySelectorAll('section > div.flex.gap-4.text-xs.font-mono');
      rows.forEach(row => {
        const spans = Array.from(row.querySelectorAll('span:not(.text-ink\\/30)'));
        if (spans.length > 0) {
          const type = spans[0].innerText.trim();
          const settings = spans.slice(1).map(s => s.innerText.trim()).join(', ');
          
          csvRows.push([
            `"${type.replace(/"/g, '""')}"`,
            `"${settings.replace(/"/g, '""')}"`
          ]);
        }
      });
      
      const csvContent = csvRows.map(e => e.join(",")).join("\n");
      const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
      const link = document.createElement("a");
      const url = URL.createObjectURL(blob);
      link.setAttribute("href", url);
      link.setAttribute("download", "sandbox_settings.csv");
      link.style.visibility = 'hidden';
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    }
  </script>

  <?php foreach ($page->layout()->toLayouts() as $layout): ?>
    <section class="w-full bg-soft-smoke py-2 tech-border-b border-t border-t-ink/20">
      <div class="px-4 md:px-16 mx-auto flex gap-4 text-xs font-mono text-ink/70 uppercase tracking-wider flex-wrap items-center">
        <span class="font-bold text-ink">ROW SETTINGS</span>
        <span class="text-ink/30">|</span>
        <span class="text-brand-accent">Bg: <?= ucfirst($layout->attrs()->row_bg()->or('default')->value()) ?></span>
        <span class="text-ink/30">|</span>
        <span class="text-brand-accent">Height: <?= $layout->attrs()->min_height()->or('auto') ?></span>
        <span class="text-ink/30">|</span>
        <span class="text-brand-accent">Width: <?= ucfirst($layout->attrs()->row_width()->or('contained')->value()) ?></span>
        <span class="text-ink/30">|</span>
        <span class="text-brand-accent">Pad: <?= ucfirst($layout->attrs()->row_padding()->or('default')->value()) ?></span>
        <span class="text-ink/30">|</span>
        <span class="text-brand-accent">Align: <?= ucfirst($layout->attrs()->vertical_align()->or('default')->value()) ?></span>
        <span class="text-ink/30">|</span>
        <span class="text-brand-accent">Media: <?= $layout->attrs()->background_media()->isNotEmpty() ? 'Yes' : 'No' ?></span>
        <span class="text-ink/30">|</span>
        <span class="text-brand-accent">Overlay: <?= $layout->attrs()->background_overlay()->or('0') ?>%</span>
        <span class="text-ink/30">|</span>
        <span class="text-brand-accent">Merge: <?= $layout->attrs()->merge_next()->toBool() ? 'Yes' : 'No' ?></span>
        <span class="text-ink/30">|</span>
        <span class="text-brand-accent">Motion: <?= $layout->attrs()->gsap_reveal()->toBool() ? 'On' : 'Off' ?></span>
        <button onclick="navigator.clipboard.writeText(Array.from(this.parentElement.querySelectorAll('span:not(.text-ink\\/30)')).map(s => s.innerText.trim()).join(', ')); alert('Row Settings copied to clipboard!');" class="ml-auto text-brand-accent hover:text-ink transition-colors cursor-pointer font-bold shrink-0 flex items-center gap-1">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="14" height="14" x="8" y="8" rx="2" ry="2"/><path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/></svg>
          COPY
        </button>
      </div>
    </section>
    
    <?php foreach ($layout->columns() as $column): ?>
      <?php foreach ($column->blocks() as $block): ?>
        <section class="w-full bg-canvas py-2 tech-border-b">
          <div class="px-4 md:px-16 mx-auto flex gap-4 text-xs font-mono text-ink/50 uppercase tracking-wider items-center flex-wrap">
            <span class="font-bold text-ink"><?= $block->type() ?></span>
            <?php if ($block->type() === 'hero-content'): ?>
              <?php 
                $opacityMap = [
                  '100' => 'Solid (100%)',
                  '80' => 'Glass (80%)',
                  '50' => 'Glass (50%)',
                  '20' => 'Glass (20%)',
                  '0' => 'Transparent (0%)',
                ];
                $bgOpacityVal = $block->bg_opacity()->value();
                if (preg_match('/(\d+)/', $bgOpacityVal, $matches)) {
                    $bgOpacityVal = $matches[1];
                }
                $bgOpacity = $opacityMap[$bgOpacityVal] ?? 'Solid (100%)';
              ?>
              <span class="text-ink/30">|</span>
              <span class="text-brand-accent">Content Alignment: <?= ucfirst($block->alignment()->or('left')->value()) ?></span>
              <span class="text-ink/30">|</span>
              <span class="text-brand-accent">Box Layout: <?= $block->boxed_layout()->toBool() ? 'On' : 'Off' ?></span>
              <span class="text-ink/30">|</span>
              <span class="text-brand-accent">Box Shadow: <?= $block->enable_shadow()->toBool() ? 'On' : 'Off' ?></span>
              <span class="text-ink/30">|</span>
              <span class="text-brand-accent">Color Profile: <?= ucfirst($block->theme()->or('inherit')->value()) ?></span>
              <span class="text-ink/30">|</span>
              <span class="text-brand-accent">Background Opacity: <?= $bgOpacity ?></span>
            <?php endif ?>
            <button onclick="navigator.clipboard.writeText(Array.from(this.parentElement.querySelectorAll('span:not(.text-ink\\/30)')).map(s => s.innerText.trim()).join(', ')); alert('Block Settings copied to clipboard!');" class="ml-auto text-brand-accent hover:text-ink transition-colors cursor-pointer font-bold shrink-0 flex items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="14" height="14" x="8" y="8" rx="2" ry="2"/><path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/></svg>
              COPY
            </button>
          </div>
        </section>
      <?php endforeach ?>
    <?php endforeach ?>
  <?php endforeach ?>

  <div class="sandbox-layout-wrapper mt-12 border-t-4 border-ink/10">
    <?php snippet('layouts/default', ['layouts' => $page->layout()->toLayouts()]) ?>
  </div>
</main>

<?php snippet('footer') ?>
