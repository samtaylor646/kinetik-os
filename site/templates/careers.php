<?php snippet('header') ?>

<main class="main">
    <div class="container mx-auto px-4 py-12">
        <header class="mb-12">
            <h1 class="text-4xl font-bold mb-4"><?= $page->title()->html() ?></h1>
        </header>

        <div class="careers-list" x-data="{ departmentFilter: '', locationFilter: '' }">
            
            <?php if ($jobs->count() > 0): ?>
                
                <!-- Filters -->
                <div class="flex flex-col sm:flex-row gap-4 mb-8">
                    <?php if (count($departments) > 0): ?>
                        <div class="filter-group">
                            <label for="department-filter" class="block text-sm font-medium mb-1">Department</label>
                            <div class="relative w-full sm:w-64">
                                <select id="department-filter" x-model="departmentFilter" class="w-full p-2 pr-10 border rounded bg-white" style="-webkit-appearance: none; -moz-appearance: none; appearance: none; background-image: none;">
                                    <option value="">All Departments</option>
                                    <?php foreach ($departments as $department): ?>
                                        <option value="<?= esc($department, 'attr') ?>"><?= esc($department) ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>

                    <?php if (count($locations) > 0): ?>
                        <div class="filter-group">
                            <label for="location-filter" class="block text-sm font-medium mb-1">Location</label>
                            <div class="relative w-full sm:w-64">
                                <select id="location-filter" x-model="locationFilter" class="w-full p-2 pr-10 border rounded bg-white" style="-webkit-appearance: none; -moz-appearance: none; appearance: none; background-image: none;">
                                    <option value="">All Locations</option>
                                    <?php foreach ($locations as $location): ?>
                                        <option value="<?= esc($location, 'attr') ?>"><?= esc($location) ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                </div>

                <!-- Job List -->
                <div class="grid gap-4">
                    <?php foreach ($jobs as $job): ?>
                        <a href="<?= $job->url() ?>" 
                           class="job-card block p-6 bg-white border rounded-lg shadow-sm hover:shadow-md transition-shadow"
                           x-show="(departmentFilter === '' || departmentFilter === '<?= esc($job->department()->value(), 'attr') ?>') && (locationFilter === '' || locationFilter === '<?= esc($job->location()->value(), 'attr') ?>')"
                        >
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                <div>
                                    <h2 class="text-xl font-semibold text-primary mb-1"><?= $job->title()->html() ?></h2>
                                    <div class="flex flex-wrap gap-3 text-sm text-gray-600">
                                        <?php if ($job->department()->isNotEmpty()): ?>
                                            <span class="flex items-center gap-1">
                                                <span class="w-4 h-4 flex items-center justify-center [&>svg]:w-full [&>svg]:h-full">
                                                    <?= svg('assets/icons/briefcase-business.svg') ?>
                                                </span>
                                                <?= $job->department()->html() ?>
                                            </span>
                                        <?php endif ?>
                                        
                                        <?php if ($job->location()->isNotEmpty()): ?>
                                            <span class="flex items-center gap-1">
                                                <span class="w-4 h-4 flex items-center justify-center [&>svg]:w-full [&>svg]:h-full">
                                                    <?= svg('assets/icons/globe-2.svg') ?>
                                                </span>
                                                <?= $job->location()->html() ?>
                                            </span>
                                        <?php endif ?>

                                        <?php if ($job->employmentType()->isNotEmpty()): ?>
                                            <span class="flex items-center gap-1">
                                                <span class="w-4 h-4 flex items-center justify-center [&>svg]:w-full [&>svg]:h-full">
                                                    <?= svg('assets/icons/clock-9.svg') ?>
                                                </span>
                                                <?= Kirby\Toolkit\Str::ucfirst($job->employmentType()->value()) ?>
                                            </span>
                                        <?php endif ?>
                                    </div>
                                </div>
                                
                                <div class="hidden sm:flex text-primary w-6 h-6 items-center justify-center [&>svg]:w-full [&>svg]:h-full">
                                    <?= svg('assets/icons/arrow-right-square.svg') ?>
                                </div>
                            </div>
                        </a>
                    <?php endforeach ?>
                </div>

            <?php else: ?>
                
                <!-- Empty State -->
                <div class="empty-state p-12 text-center bg-gray-50 border border-dashed rounded-lg">
                    <p class="text-xl font-semibold text-gray-600"><?= $page->emptyMessage()->or('There are no open positions at this time.')->html() ?></p>
                </div>

            <?php endif ?>

        </div>
        
        <?php if ($page->layout()->isNotEmpty()): ?>
            <div class="mt-16">
                <?php snippet('layout/builder', ['layout' => $page->layout()]) ?>
            </div>
        <?php endif ?>
    </div>
</main>

<?php snippet('footer') ?>
