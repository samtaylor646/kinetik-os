<?php /** @var \Kirby\Cms\Page $page */ ?>

<style>
  .color-row { 
    display: grid; 
    grid-template-columns: 80px 1fr 120px; 
    align-items: center; 
    gap: 2rem; 
    padding: 1.25rem 1.5rem; 
    background: white; 
    border-radius: 12px; 
    border: 1px solid rgba(0,0,0,0.06);
    box-shadow: 0 1px 3px rgba(0,0,0,0.02);
  }
  
  .preview-box { 
    height: 54px; 
    width: 100%; 
    border-radius: 8px; 
    border: 1px solid rgba(0,0,0,0.08); 
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
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded">bg-oceanic-dark</code>
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded">text-oceanic-dark</code>
              </div>
          </div>
          <p class="text-right text-[13px] font-mono font-medium text-ink/60">#005B6D</p>
      </div>

      <div class="color-row">
          <div class="preview-box bg-oceanic-accent"></div>
          <div>
              <p class="text-[15px] font-bold text-ink">Oceanic Accent</p>
              <div class="flex gap-4 mt-2">
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded">bg-oceanic-accent</code>
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded">text-oceanic-accent</code>
              </div>
          </div>
          <p class="text-right text-[13px] font-mono font-medium text-ink/60">#007489</p>
      </div>
      
      <div class="color-row">
          <div class="preview-box bg-oceanic-secondary"></div>
          <div>
              <p class="text-[15px] font-bold text-ink">Oceanic Secondary</p>
              <div class="flex gap-4 mt-2">
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded">bg-oceanic-secondary</code>
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded">text-oceanic-secondary</code>
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
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded">bg-warm-gold</code>
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded">text-warm-gold</code>
              </div>
          </div>
          <p class="text-right text-[13px] font-mono font-medium text-ink/60">#D4C19C</p>
      </div>

      <div class="color-row">
          <div class="preview-box bg-slate-teal"></div>
          <div>
              <p class="text-[15px] font-bold text-ink">Slate Teal</p>
              <div class="flex gap-4 mt-2">
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded">bg-slate-teal</code>
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded">text-slate-teal</code>
              </div>
          </div>
          <p class="text-right text-[13px] font-mono font-medium text-ink/60">#4A6163</p>
      </div>

      <div class="color-row">
          <div class="preview-box bg-liberty-blue"></div>
          <div>
              <p class="text-[15px] font-bold text-ink">Liberty Blue</p>
              <div class="flex gap-4 mt-2">
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded">bg-liberty-blue</code>
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded">text-liberty-blue</code>
              </div>
          </div>
          <p class="text-right text-[13px] font-mono font-medium text-ink/60">#2E4A62</p>
      </div>

      <div class="color-row">
          <div class="preview-box bg-heritage-red"></div>
          <div>
              <p class="text-[15px] font-bold text-ink">Heritage Red</p>
              <div class="flex gap-4 mt-2">
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded">bg-heritage-red</code>
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded">text-heritage-red</code>
              </div>
          </div>
          <p class="text-right text-[13px] font-mono font-medium text-ink/60">#8B3E2F</p>
      </div>

      <div class="color-row">
          <div class="preview-box bg-frost-mint"></div>
          <div>
              <p class="text-[15px] font-bold text-ink">Frost Mint</p>
              <div class="flex gap-4 mt-2">
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded">bg-frost-mint</code>
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded">text-frost-mint</code>
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
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded">bg-ink</code>
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded">text-ink</code>
              </div>
          </div>
          <p class="text-right text-[13px] font-mono font-medium text-ink/60">#0F151B</p>
      </div>

      <div class="color-row">
          <div class="preview-box bg-canvas"></div>
          <div>
              <p class="text-[15px] font-bold text-ink">Canvas</p>
              <div class="flex gap-4 mt-2">
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded">bg-canvas</code>
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded">text-canvas</code>
              </div>
          </div>
          <p class="text-right text-[13px] font-mono font-medium text-ink/60">#FAF9F6</p>
      </div>

      <div class="color-row">
          <div class="preview-box bg-soft-smoke"></div>
          <div>
              <p class="text-[15px] font-bold text-ink">Soft Smoke</p>
              <div class="flex gap-4 mt-2">
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded">bg-soft-smoke</code>
                <code class="text-[11px] font-mono text-ink/60 bg-ink/5 px-2 py-1 rounded">text-soft-smoke</code>
              </div>
          </div>
          <p class="text-right text-[13px] font-mono font-medium text-ink/60">#F0F0F0</p>
      </div>
  </section>

</div>