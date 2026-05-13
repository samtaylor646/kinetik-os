<?php 
/** @var \Kirby\Cms\Page $page */
snippet('header'); 
?>

<div class="flex min-h-screen bg-canvas text-ink w-full max-w-[1600px] mx-auto relative">

  <!-- Left Sidebar (Sticky) -->
  <aside class="w-64 border-r border-ink/10 shrink-0 sticky top-0 h-screen overflow-y-auto bg-canvas/80 backdrop-blur-md pt-32 pb-12 z-10">
    <div class="px-8">
      <div class="mb-12">
        <h3 class="mono text-xs font-bold uppercase tracking-[0.2em] text-ink/40 mb-6">Kinetik OS</h3>
        <h2 class="text-xl font-bold tracking-tight">Design System</h2>
      </div>

      <nav class="space-y-1">
        <?php 
          // Get the parent design system page to loop its children
          $designSystem = page('design-system');
          if($designSystem && $designSystem->children()->isNotEmpty()):
            foreach($designSystem->children()->listed() as $subpage): 
              $isActive = $subpage->isActive() ? 'bg-ink/5 text-ink font-bold border-l-2 border-oceanic-dark' : 'text-ink/60 hover:bg-ink/5 hover:text-ink border-l-2 border-transparent';
        ?>
          <a href="<?= $subpage->url() ?>" class="block px-4 py-2.5 text-sm transition-colors <?= $isActive ?>">
            <?= $subpage->title() ?>
          </a>
        <?php 
            endforeach;
          endif; 
        ?>
      </nav>
    </div>
  </aside>

  <!-- Main Content Area -->
  <main class="flex-grow py-32 px-8 md:px-16 min-h-screen">
    <header class="mb-24 border-b border-ink/10 pb-12">
      <h1 class="text-5xl md:text-7xl font-bold tracking-tight mb-6"><?= $page->title() ?></h1>
      <?php if($page->text()->isNotEmpty()): ?>
        <p class="text-xl opacity-70 max-w-3xl font-light leading-relaxed"><?= $page->text() ?></p>
      <?php endif ?>
    </header>

    <div class="content-area max-w-5xl">
      <?php
        // Dynamically load snippets based on the page slug if they exist
        // e.g. snippets/design-system/colors.php
        $snippetName = 'design-system/' . $page->slug();
        snippet($snippetName, ['page' => $page]);
      ?>
    </div>
  </main>

</div>

<?php snippet('footer') ?>