<?php snippet('header') ?>

<main class="main">
    <div class="container mx-auto px-4 py-12">
        <article class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-sm border">
            
            <header class="mb-8 pb-8 border-b">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6 mb-6">
                    <h1 class="text-4xl font-bold text-gray-900"><?= $page->title()->html() ?></h1>
                    
                    <?php if ($page->applyLink()->isNotEmpty()): ?>
                        <a href="<?= $page->applyLink()->url() ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center px-6 py-3 bg-primary text-white font-medium rounded-lg hover:bg-primary/90 transition-colors shrink-0">
                            Apply Now
                        </a>
                    <?php endif ?>
                </div>
                
                <div class="flex flex-wrap gap-4 text-sm text-gray-600">
                    <?php if ($page->department()->isNotEmpty()): ?>
                        <span class="flex items-center gap-2 bg-gray-100 px-3 py-1 rounded-full">
                            <i data-lucide="briefcase-business" class="w-4 h-4"></i>
                            <?= $page->department()->html() ?>
                        </span>
                    <?php endif ?>
                    
                    <?php if ($page->location()->isNotEmpty()): ?>
                        <span class="flex items-center gap-2 bg-gray-100 px-3 py-1 rounded-full">
                            <i data-lucide="globe-2" class="w-4 h-4"></i>
                            <?= $page->location()->html() ?>
                        </span>
                    <?php endif ?>

                    <?php if ($page->employmentType()->isNotEmpty()): ?>
                        <span class="flex items-center gap-2 bg-gray-100 px-3 py-1 rounded-full">
                            <i data-lucide="clock-9" class="w-4 h-4"></i>
                            <?= Kirby\Toolkit\Str::ucfirst($page->employmentType()->value()) ?>
                        </span>
                    <?php endif ?>
                </div>
            </header>

            <div class="prose max-w-none">
                <?= $page->description()->kt() ?>
            </div>

            <?php if ($page->applyLink()->isNotEmpty()): ?>
                <div class="mt-12 pt-8 border-t text-center sm:text-left">
                    <h3 class="text-xl font-semibold mb-4">Interested in this role?</h3>
                    <a href="<?= $page->applyLink()->url() ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center px-8 py-4 bg-primary text-white font-medium rounded-lg hover:bg-primary/90 transition-colors text-lg">
                        Apply for this position
                        <i data-lucide="arrow-right" class="ml-2 w-5 h-5"></i>
                    </a>
                </div>
            <?php endif ?>

        </article>
    </div>
</main>

<?php snippet('footer') ?>
