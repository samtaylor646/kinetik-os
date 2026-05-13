<?php /** @var \Kirby\Cms\Page $page */ ?>

<div class="prose prose-lg max-w-none text-ink/70 font-light leading-relaxed">
  <p>Our motion language is deliberate and mechanical. We avoid bouncy or overly smooth easing in favor of precise, snappy transitions that feel like physical mechanisms snapping into place.</p>
  
  <h3 class="text-2xl font-bold text-ink mt-12 mb-6">GSAP Standards</h3>
  <ul class="list-disc pl-6 space-y-3">
    <li><strong>Duration:</strong> Standard transitions use `1.2s`. Fast micro-interactions use `0.3s`.</li>
    <li><strong>Easing:</strong> The primary ease is `power3.out` or `expo.out`. No elastic or bounce easing is permitted.</li>
    <li><strong>Staggers:</strong> Use `0.05s` to `0.1s` staggers for list items to create a rapid, sequential reveal.</li>
  </ul>
</div>