<?php snippet('header') ?>

<!-- High-Tech Minimalist Overrides -->
<style>
  .mono { font-family: 'JetBrains Mono', 'SF Mono', Consolas, monospace; }
  .pantone-chip {
    display: flex;
    flex-direction: column;
    background: #fff;
    border: 1px solid rgba(0,0,0,0.08);
    box-shadow: 0 4px 24px rgba(0,0,0,0.02);
    aspect-ratio: 3/4;
    transition: transform 0.3s ease;
  }
  .pantone-chip:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 32px rgba(0,0,0,0.06);
  }
  .chip-color { flex-grow: 1; width: 100%; }
  .chip-meta {
    height: 90px;
    padding: 1.25rem;
    background: #fff;
    color: #0F151B;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    border-top: 1px solid rgba(0,0,0,0.05);
  }
  .tech-border {
    border: 1px solid rgba(0,0,0,0.1);
  }
  .dark.tech-border {
    border: 1px solid rgba(255,255,255,0.1);
  }
</style>

<main class="py-32 md:py-48 px-6 md:px-16 max-w-400 mx-auto bg-canvas min-h-screen text-ink">
  
  <header class="mb-48 border-b border-ink/10 pb-24">
    <div class="flex items-center gap-6 mb-8">
      <div class="h-px w-16 bg-ink"></div>
      <span class="mono text-xs font-bold uppercase tracking-[0.4em] text-ink/50">System Architecture</span>
    </div>
    <h1 class="text-7xl font-bold tracking-tight mb-8">Design Tokens</h1>
    <p class="text-2xl opacity-70 max-w-3xl font-light leading-relaxed">Strict adherence to WCAG contrast requirements. Minimalist, high-tech structure utilizing sharp geometry and precise typography.</p>
  </header>

  <!-- 1. PANTONE CHIPS -->
  <section class="mb-48">
    <div class="flex items-center justify-between mb-16 border-b border-ink/10 pb-6">
      <h2 class="text-sm font-bold uppercase tracking-[0.3em] text-ink/60">01. Master Palette</h2>
      <span class="mono text-xs text-ink/40">src/index.css</span>
    </div>
    
    <div class="grid grid-cols-2 md:grid-cols-4 gap-x-12 gap-y-16">
      
      <!-- Oceanic Dark -->
      <div class="pantone-chip">
        <div class="chip-color bg-oceanic-dark"></div>
        <div class="chip-meta">
          <h4 class="font-bold text-base mb-3">Oceanic Dark</h4>
          <div class="flex justify-between items-end mono text-xs text-ink/50">
            <span>#005B6D</span>
            <span>bg-oceanic-dark</span>
          </div>
        </div>
      </div>

      <!-- Oceanic Accent -->
      <div class="pantone-chip">
        <div class="chip-color bg-oceanic-accent"></div>
        <div class="chip-meta">
          <h4 class="font-bold text-base mb-3">Oceanic Accent</h4>
          <div class="flex justify-between items-end mono text-xs text-ink/50">
            <span>#007489</span>
            <span>bg-oceanic-accent</span>
          </div>
        </div>
      </div>

      <!-- Warm Gold -->
      <div class="pantone-chip">
        <div class="chip-color bg-warm-gold"></div>
        <div class="chip-meta">
          <h4 class="font-bold text-base mb-3">Warm Gold</h4>
          <div class="flex justify-between items-end mono text-xs text-ink/50">
            <span>#D4C19C</span>
            <span>bg-warm-gold</span>
          </div>
        </div>
      </div>

      <!-- Slate Teal -->
      <div class="pantone-chip">
        <div class="chip-color bg-slate-teal"></div>
        <div class="chip-meta">
          <h4 class="font-bold text-base mb-3">Slate Teal</h4>
          <div class="flex justify-between items-end mono text-xs text-ink/50">
            <span>#4A6163</span>
            <span>bg-slate-teal</span>
          </div>
        </div>
      </div>

      <!-- Liberty Blue -->
      <div class="pantone-chip">
        <div class="chip-color bg-liberty-blue"></div>
        <div class="chip-meta">
          <h4 class="font-bold text-base mb-3">Liberty Blue</h4>
          <div class="flex justify-between items-end mono text-xs text-ink/50">
            <span>#2E4A62</span>
            <span>bg-liberty-blue</span>
          </div>
        </div>
      </div>

      <!-- Heritage Red -->
      <div class="pantone-chip">
        <div class="chip-color bg-heritage-red"></div>
        <div class="chip-meta">
          <h4 class="font-bold text-base mb-3">Heritage Red</h4>
          <div class="flex justify-between items-end mono text-xs text-ink/50">
            <span>#8B3E2F</span>
            <span>bg-heritage-red</span>
          </div>
        </div>
      </div>

      <!-- Frost Mint -->
      <div class="pantone-chip">
        <div class="chip-color bg-frost-mint border-b border-ink/5"></div>
        <div class="chip-meta">
          <h4 class="font-bold text-base mb-3">Frost Mint</h4>
          <div class="flex justify-between items-end mono text-xs text-ink/50">
            <span>#E2F0E9</span>
            <span>bg-frost-mint</span>
          </div>
        </div>
      </div>

      <!-- Ink -->
      <div class="pantone-chip">
        <div class="chip-color bg-ink"></div>
        <div class="chip-meta">
          <h4 class="font-bold text-base mb-3">Ink</h4>
          <div class="flex justify-between items-end mono text-xs text-ink/50">
            <span>#0F151B</span>
            <span>text-ink</span>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- 2. HIGH-TECH ALERTS -->
  <section class="mb-48">
    <div class="flex items-center justify-between mb-16 border-b border-ink/10 pb-6">
      <h2 class="text-sm font-bold uppercase tracking-[0.3em] text-ink/60">02. System Notifications</h2>
      <span class="mono text-xs text-ink/40">Strict Geometry</span>
    </div>
    
    <div class="space-y-8 max-w-5xl">
      <!-- Info Alert -->
      <div class="bg-white border border-ink/10 border-l-[6px] border-l-oceanic-dark p-8 flex items-start gap-8 shadow-sm">
        <div class="text-oceanic-dark mt-1 scale-125"><?= svg('assets/icons/play.svg') ?></div>
        <div class="space-y-2">
          <h4 class="font-bold text-xl text-ink tracking-tight">System Update Available</h4>
          <p class="text-ink/60 text-base font-light leading-relaxed">Version 7.8 has been deployed successfully to the production environment. No downtime expected.</p>
        </div>
      </div>
      
      <!-- Success Alert -->
      <div class="bg-white border border-ink/10 border-l-[6px] border-l-slate-teal p-8 flex items-start gap-8 shadow-sm">
        <div class="text-slate-teal mt-1 scale-125"><?= svg('assets/icons/check.svg') ?></div>
        <div class="space-y-2">
          <h4 class="font-bold text-xl text-ink tracking-tight">Migration Complete</h4>
          <p class="text-ink/60 text-base font-light leading-relaxed">The database has been successfully synchronized without errors across all nodes.</p>
        </div>
      </div>

      <!-- Warning Alert -->
      <div class="bg-white border border-ink/10 border-l-[6px] border-l-warm-gold p-8 flex items-start gap-8 shadow-sm">
        <div class="text-warm-gold mt-1 scale-125"><?= svg('assets/icons/arrow-right.svg') ?></div>
        <div class="space-y-2">
          <h4 class="font-bold text-xl text-ink tracking-tight">Action Required</h4>
          <p class="text-ink/60 text-base font-light leading-relaxed">Please review the new compliance protocols before proceeding with the deployment sequence.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- 3. COMPONENT THEMING -->
  <section class="mb-48">
    <div class="flex items-center justify-between mb-16 border-b border-ink/10 pb-6">
      <h2 class="text-sm font-bold uppercase tracking-[0.3em] text-ink/60">03. UI Blocks</h2>
      <span class="mono text-xs text-ink/40">WCAG AAA Contrast</span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
      
      <!-- Light / Canvas Block -->
      <div class="bg-white tech-border p-12 flex flex-col h-full shadow-sm">
        <div class="flex justify-between items-center border-b border-ink/10 pb-6 mb-10">
          <span class="mono text-xs uppercase tracking-[0.2em] text-ink/40">Theme: Light Canvas</span>
          <span class="h-3 w-3 bg-oceanic-dark"></span>
        </div>
        <h4 class="text-3xl font-bold text-ink tracking-tight mb-6">Data Telemetry</h4>
        <p class="text-ink/60 text-base font-light leading-loose mb-12 grow">Standard light interface utilizing strict borders and high-contrast Ink typography for optimal readability in brightly lit environments.</p>
        <div class="flex gap-6">
          <button class="bg-ink text-white px-10 py-4 text-xs font-bold uppercase tracking-[0.2em] hover:bg-oceanic-dark transition-colors">Execute</button>
          <button class="border border-ink/20 text-ink px-10 py-4 text-xs font-bold uppercase tracking-[0.2em] hover:border-ink transition-colors">Cancel</button>
        </div>
      </div>

      <!-- Dark / Ink Block -->
      <div class="bg-ink dark tech-border p-12 flex flex-col h-full text-white shadow-xl">
        <div class="flex justify-between items-center border-b border-white/10 pb-6 mb-10">
          <span class="mono text-xs uppercase tracking-[0.2em] text-white/40">Theme: Dark Ink</span>
          <span class="h-3 w-3 bg-warm-gold"></span>
        </div>
        <h4 class="text-3xl font-bold text-white tracking-tight mb-6">Secure Gateway</h4>
        <p class="text-white/60 text-base font-light leading-loose mb-12 grow">Dark mode presentation. Notice the pure white text on deep Ink background ensuring absolute WCAG compliance and minimal eye strain.</p>
        <div class="flex gap-6">
          <button class="bg-warm-gold text-ink px-10 py-4 text-xs font-bold uppercase tracking-[0.2em] hover:bg-white transition-colors">Authenticate</button>
        </div>
      </div>

      <!-- Oceanic Block -->
      <div class="bg-oceanic-dark dark tech-border p-12 flex flex-col h-full text-white shadow-xl">
        <div class="flex justify-between items-center border-b border-white/20 pb-6 mb-10">
          <span class="mono text-xs uppercase tracking-[0.2em] text-white/50">Theme: Oceanic Prime</span>
          <span class="h-3 w-3 bg-white"></span>
        </div>
        <h4 class="text-3xl font-bold text-white tracking-tight mb-6">Cloud Migration</h4>
        <p class="text-white/70 text-base font-light leading-loose mb-12 grow">Brand presentation. Text is absolute white on Oceanic Dark (Contrast Ratio: 7.1:1). Perfect readability without sacrificing brand identity.</p>
        <div class="flex gap-6">
          <button class="bg-white text-oceanic-dark px-10 py-4 text-xs font-bold uppercase tracking-[0.2em] hover:bg-warm-gold hover:text-ink transition-colors">Deploy</button>
        </div>
      </div>

      <!-- Oceanic Accent Block -->
      <div class="bg-oceanic-accent dark tech-border p-12 flex flex-col h-full text-white shadow-xl">
        <div class="flex justify-between items-center border-b border-white/20 pb-6 mb-10">
          <span class="mono text-xs uppercase tracking-[0.2em] text-white/50">Theme: Oceanic Accent</span>
          <span class="h-3 w-3 bg-white"></span>
        </div>
        <h4 class="text-3xl font-bold text-white tracking-tight mb-6">Active State</h4>
        <p class="text-white/70 text-base font-light leading-loose mb-12 grow">Used for primary interactions and active states. Maintains strong contrast while providing a lighter, more energetic tone than the primary brand color.</p>
        <div class="flex gap-6">
          <button class="bg-ink text-white px-10 py-4 text-xs font-bold uppercase tracking-[0.2em] hover:bg-white hover:text-ink transition-colors">Submit</button>
        </div>
      </div>

      <!-- Slate Teal Block -->
      <div class="bg-slate-teal dark tech-border p-12 flex flex-col h-full text-white shadow-xl">
        <div class="flex justify-between items-center border-b border-white/20 pb-6 mb-10">
          <span class="mono text-xs uppercase tracking-[0.2em] text-white/50">Theme: Slate Teal</span>
          <span class="h-3 w-3 bg-warm-gold"></span>
        </div>
        <h4 class="text-3xl font-bold text-white tracking-tight mb-6">Secondary Actions</h4>
        <p class="text-white/70 text-base font-light leading-loose mb-12 grow">A muted, sophisticated tone for secondary information architecture. Pairs exceptionally well with Warm Gold accents.</p>
        <div class="flex gap-6">
          <button class="bg-warm-gold text-ink px-10 py-4 text-xs font-bold uppercase tracking-[0.2em] hover:bg-white transition-colors">Configure</button>
        </div>
      </div>

      <!-- Liberty Blue Block -->
      <div class="bg-liberty-blue dark tech-border p-12 flex flex-col h-full text-white shadow-xl">
        <div class="flex justify-between items-center border-b border-white/20 pb-6 mb-10">
          <span class="mono text-xs uppercase tracking-[0.2em] text-white/50">Theme: Liberty Blue</span>
          <span class="h-3 w-3 bg-frost-mint"></span>
        </div>
        <h4 class="text-3xl font-bold text-white tracking-tight mb-6">Data Architecture</h4>
        <p class="text-white/70 text-base font-light leading-loose mb-12 grow">Deep, stable color designed for complex data tables and technical documentation interfaces.</p>
        <div class="flex gap-6">
          <button class="bg-frost-mint text-ink px-10 py-4 text-xs font-bold uppercase tracking-[0.2em] hover:bg-white transition-colors">Analyze</button>
        </div>
      </div>

      <!-- Heritage Red Block -->
      <div class="bg-heritage-red dark tech-border p-12 flex flex-col h-full text-white shadow-xl">
        <div class="flex justify-between items-center border-b border-white/20 pb-6 mb-10">
          <span class="mono text-xs uppercase tracking-[0.2em] text-white/50">Theme: Heritage Red</span>
          <span class="h-3 w-3 bg-white"></span>
        </div>
        <h4 class="text-3xl font-bold text-white tracking-tight mb-6">Critical Systems</h4>
        <p class="text-white/70 text-base font-light leading-loose mb-12 grow">Reserved for destructive actions, severe alerts, and critical system notifications. High visibility guaranteed.</p>
        <div class="flex gap-6">
          <button class="bg-white text-heritage-red px-10 py-4 text-xs font-bold uppercase tracking-[0.2em] hover:bg-ink hover:text-white transition-colors">Terminate</button>
        </div>
      </div>

      <!-- Warm Gold Block -->
      <div class="bg-warm-gold tech-border p-12 flex flex-col h-full shadow-sm">
        <div class="flex justify-between items-center border-b border-ink/10 pb-6 mb-10">
          <span class="mono text-xs uppercase tracking-[0.2em] text-ink/40">Theme: Warm Gold</span>
          <span class="h-3 w-3 bg-ink"></span>
        </div>
        <h4 class="text-3xl font-bold text-ink tracking-tight mb-6">Highlight State</h4>
        <p class="text-ink/60 text-base font-light leading-loose mb-12 grow">Used to draw attention without the severity of an alert. Black text ensures maximum readability on the bright background.</p>
        <div class="flex gap-6">
          <button class="bg-ink text-white px-10 py-4 text-xs font-bold uppercase tracking-[0.2em] hover:bg-oceanic-dark transition-colors">Review</button>
        </div>
      </div>

      <!-- Frost Mint Block -->
      <div class="bg-frost-mint tech-border p-12 flex flex-col h-full shadow-sm">
        <div class="flex justify-between items-center border-b border-ink/10 pb-6 mb-10">
          <span class="mono text-xs uppercase tracking-[0.2em] text-ink/40">Theme: Frost Mint</span>
          <span class="h-3 w-3 bg-slate-teal"></span>
        </div>
        <h4 class="text-3xl font-bold text-ink tracking-tight mb-6">Success Metrics</h4>
        <p class="text-ink/60 text-base font-light leading-loose mb-12 grow">A cool, positive tone used for successful operations, growth metrics, and confirmed state changes.</p>
        <div class="flex gap-6">
          <button class="bg-slate-teal text-white px-10 py-4 text-xs font-bold uppercase tracking-[0.2em] hover:bg-ink transition-colors">Confirm</button>
        </div>
      </div>

    </div>
  </section>

</main>

<style>
  /* SVG sizing for the minimal alerts */
  .lucide { width: 1.5rem; height: 1.5rem; stroke-width: 2; }
</style>

<?php snippet('footer') ?>
