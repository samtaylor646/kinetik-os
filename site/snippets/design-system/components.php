<?php /** @var \Kirby\Cms\Page $page */ ?>

<div class="space-y-8 max-w-5xl mt-12">
  <div class="flex items-center justify-between mb-8 border-b border-ink/10 pb-6">
    <h2 class="text-sm font-bold uppercase tracking-[0.3em] text-ink/60">System Notifications</h2>
    <span class="mono text-xs text-ink/40">Strict Geometry</span>
  </div>

  <!-- Info Alert -->
  <div class="bg-white border border-ink/10 border-l-[6px] border-l-oceanic-dark p-8 flex items-start gap-8 shadow-sm rounded-xl">
    <div class="text-oceanic-dark mt-1 scale-125"><?= svg('assets/icons/info.svg') ?? 'i' ?></div>
    <div class="space-y-2">
      <h4 class="font-bold text-xl text-ink tracking-tight">System Update Available</h4>
      <p class="text-ink/60 text-base font-light leading-relaxed">Version 7.8 has been deployed successfully to the production environment. No downtime expected.</p>
    </div>
  </div>
  
  <!-- Success Alert -->
  <div class="bg-white border border-ink/10 border-l-[6px] border-l-slate-teal p-8 flex items-start gap-8 shadow-sm rounded-xl">
    <div class="text-slate-teal mt-1 scale-125"><?= svg('assets/icons/check.svg') ?? '✓' ?></div>
    <div class="space-y-2">
      <h4 class="font-bold text-xl text-ink tracking-tight">Migration Complete</h4>
      <p class="text-ink/60 text-base font-light leading-relaxed">The database has been successfully synchronized without errors across all nodes.</p>
    </div>
  </div>

  <!-- Warning Alert -->
  <div class="bg-white border border-ink/10 border-l-[6px] border-l-warm-gold p-8 flex items-start gap-8 shadow-sm rounded-xl">
    <div class="text-warm-gold mt-1 scale-125"><?= svg('assets/icons/alert-triangle.svg') ?? '!' ?></div>
    <div class="space-y-2">
      <h4 class="font-bold text-xl text-ink tracking-tight">Action Required</h4>
      <p class="text-ink/60 text-base font-light leading-relaxed">Please review the new compliance protocols before proceeding with the deployment sequence.</p>
    </div>
  </div>
</div>