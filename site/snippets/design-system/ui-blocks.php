<?php /** @var \Kirby\Cms\Page $page */ ?>

<div class="grid grid-cols-1 md:grid-cols-2 gap-16 mt-12 pb-32">
  
  <!-- Light / Canvas Block -->
  <div class="bg-white tech-border p-12 flex flex-col h-full shadow-none">
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
  <div class="bg-ink dark tech-border p-12 flex flex-col h-full text-white shadow-none">
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
  <div class="bg-oceanic-dark dark tech-border p-12 flex flex-col h-full text-white shadow-none">
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
  <div class="bg-oceanic-accent dark tech-border p-12 flex flex-col h-full text-white shadow-none">
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
  <div class="bg-slate-teal dark tech-border p-12 flex flex-col h-full text-white shadow-none">
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
  <div class="bg-liberty-blue dark tech-border p-12 flex flex-col h-full text-white shadow-none">
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
  <div class="bg-heritage-red dark tech-border p-12 flex flex-col h-full text-white shadow-none">
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
  <div class="bg-warm-gold tech-border p-12 flex flex-col h-full shadow-none">
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
  <div class="bg-frost-mint tech-border p-12 flex flex-col h-full shadow-none">
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