<?php /** @var \Kirby\Cms\Page $page */ ?>

<style>
  .color-row { 
    display: grid; 
    grid-template-columns: 80px 1fr 120px; 
    align-items: center; 
    gap: 2rem; 
    padding: 1.25rem 1.5rem; 
    background: var(--color-canvas); 
    border-radius: 0; 
    border: 1px solid rgba(15, 21, 27, 0.1); /* tech-border */
  }
  
  .preview-box { 
    height: 54px; 
    width: 100%; 
    border-radius: 0; 
    border: 1px solid rgba(15, 21, 27, 0.1); 
  }
</style>

<div class="space-y-16 mt-12 pb-32 max-w-4xl">

  <!-- 01. PRIMARY STRATEGY -->
  <section class="space-y-6">
      <h3 class="text-[11px] font-bold uppercase tracking-[0.25em] text-ink/40 border-b border-ink/10 pb-4">01. Primary Identity</h3>
      
      <div class="color-row">
          <div class="preview-box bg-oceanic-dark"></div>
          <div>
              <p class="text-[15px] font-bold text-ink">Oceanic Dark</p>
              <div class="flex gap-4 mt-2">
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded-none tech-border">bg-oceanic-dark</code>
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded-none tech-border">text-oceanic-dark</code>
              </div>
          </div>
          <p class="text-right text-[13px] font-mono font-medium text-ink/60">#005B6D</p>
      </div>

      <div class="color-row">
          <div class="preview-box bg-oceanic-accent"></div>
          <div>
              <p class="text-[15px] font-bold text-ink">Oceanic Accent</p>
              <div class="flex gap-4 mt-2">
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded-none tech-border">bg-oceanic-accent</code>
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded-none tech-border">text-oceanic-accent</code>
              </div>
          </div>
          <p class="text-right text-[13px] font-mono font-medium text-ink/60">#007489</p>
      </div>
      
      <div class="color-row">
          <div class="preview-box bg-oceanic-secondary"></div>
          <div>
              <p class="text-[15px] font-bold text-ink">Oceanic Secondary</p>
              <div class="flex gap-4 mt-2">
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded-none tech-border">bg-oceanic-secondary</code>
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded-none tech-border">text-oceanic-secondary</code>
              </div>
          </div>
          <p class="text-right text-[13px] font-mono font-medium text-ink/60">#218993</p>
      </div>
  </section>

  <!-- 02. SECONDARY / VERIFIED -->
  <section class="space-y-6">
      <h3 class="text-[11px] font-bold uppercase tracking-[0.25em] text-ink/40 border-b border-ink/10 pb-4">02. Accents</h3>
      
      <div class="color-row">
          <div class="preview-box bg-warm-gold"></div>
          <div>
              <p class="text-[15px] font-bold text-ink">Warm Gold</p>
              <div class="flex gap-4 mt-2">
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded-none tech-border">bg-warm-gold</code>
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded-none tech-border">text-warm-gold</code>
              </div>
          </div>
          <p class="text-right text-[13px] font-mono font-medium text-ink/60">#D4C19C</p>
      </div>

      <div class="color-row">
          <div class="preview-box bg-slate-teal"></div>
          <div>
              <p class="text-[15px] font-bold text-ink">Slate Teal</p>
              <div class="flex gap-4 mt-2">
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded-none tech-border">bg-slate-teal</code>
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded-none tech-border">text-slate-teal</code>
              </div>
          </div>
          <p class="text-right text-[13px] font-mono font-medium text-ink/60">#4A6163</p>
      </div>

      <div class="color-row">
          <div class="preview-box bg-liberty-blue"></div>
          <div>
              <p class="text-[15px] font-bold text-ink">Liberty Blue</p>
              <div class="flex gap-4 mt-2">
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded-none tech-border">bg-liberty-blue</code>
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded-none tech-border">text-liberty-blue</code>
              </div>
          </div>
          <p class="text-right text-[13px] font-mono font-medium text-ink/60">#2E4A62</p>
      </div>

      <div class="color-row">
          <div class="preview-box bg-heritage-red"></div>
          <div>
              <p class="text-[15px] font-bold text-ink">Heritage Red</p>
              <div class="flex gap-4 mt-2">
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded-none tech-border">bg-heritage-red</code>
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded-none tech-border">text-heritage-red</code>
              </div>
          </div>
          <p class="text-right text-[13px] font-mono font-medium text-ink/60">#8B3E2F</p>
      </div>

      <div class="color-row">
          <div class="preview-box bg-frost-mint"></div>
          <div>
              <p class="text-[15px] font-bold text-ink">Frost Mint</p>
              <div class="flex gap-4 mt-2">
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded-none tech-border">bg-frost-mint</code>
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded-none tech-border">text-frost-mint</code>
              </div>
          </div>
          <p class="text-right text-[13px] font-mono font-medium text-ink/60">#E2F0E9</p>
      </div>
  </section>

  <!-- 03. UI FOUNDATION -->
  <section class="space-y-6">
      <h3 class="text-[11px] font-bold uppercase tracking-[0.25em] text-ink/40 border-b border-ink/10 pb-4">03. Neutrals</h3>
      
      <div class="color-row">
          <div class="preview-box bg-ink"></div>
          <div>
              <p class="text-[15px] font-bold text-ink">Ink</p>
              <div class="flex gap-4 mt-2">
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded-none tech-border">bg-ink</code>
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded-none tech-border">text-ink</code>
              </div>
          </div>
          <p class="text-right text-[13px] font-mono font-medium text-ink/60">#0F151B</p>
      </div>

      <div class="color-row">
          <div class="preview-box bg-canvas"></div>
          <div>
              <p class="text-[15px] font-bold text-ink">Canvas</p>
              <div class="flex gap-4 mt-2">
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded-none tech-border">bg-canvas</code>
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded-none tech-border">text-canvas</code>
              </div>
          </div>
          <p class="text-right text-[13px] font-mono font-medium text-ink/60">#FAF9F6</p>
      </div>

      <div class="color-row">
          <div class="preview-box bg-soft-smoke"></div>
          <div>
              <p class="text-[15px] font-bold text-ink">Soft Smoke</p>
              <div class="flex gap-4 mt-2">
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded-none tech-border">bg-soft-smoke</code>
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded-none tech-border">text-soft-smoke</code>
              </div>
          </div>
          <p class="text-right text-[13px] font-mono font-medium text-ink/60">#F0F0F0</p>
      </div>
  </section>

  <!-- 04. DYNAMIC THEME COLORS -->
  <?php 
  $theme = page('theme');
  $themeColors = $theme ? $theme->theme_colors()->toStructure() : null;
  if ($themeColors && $themeColors->isNotEmpty()): 
  ?>
  <style>
  <?php foreach ($themeColors as $color): $varName = esc($color->color_name(), 'attr'); ?>
  .bg-dyn-<?= $varName ?> { background-color: var(--color-<?= $varName ?>) !important; }
  .text-dyn-<?= $varName ?> { color: var(--color-<?= $varName ?>) !important; }
  <?php endforeach; ?>
  </style>
  
  <section class="space-y-6">
      <h3 class="text-[11px] font-bold uppercase tracking-[0.25em] text-ink/40 border-b border-ink/10 pb-4">04. Custom Theme Colors</h3>
      
      <?php foreach ($themeColors as $color): 
          $varName = esc($color->color_name(), 'attr');
          $hex = $color->color_value()->value();
      ?>
      <div class="color-row">
          <div class="preview-box bg-dyn-<?= $varName ?>"></div>
          <div>
              <p class="text-[15px] font-bold text-ink"><?= esc($color->color_name()->html()) ?></p>
              <div class="flex gap-4 mt-2">
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded-none tech-border">bg-dyn-<?= $varName ?></code>
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded-none tech-border">text-dyn-<?= $varName ?></code>
              </div>
          </div>
          <p class="text-right text-[13px] font-mono font-medium text-ink/60"><?= $hex ?></p>
      </div>
      <?php endforeach; ?>
  </section>
  <?php endif; ?>

</div>