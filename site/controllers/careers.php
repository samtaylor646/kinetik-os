<?php

return function ($page) {
    // Get all listed jobs
    $jobs = $page->children()->listed();

    // Extract unique departments for filtering
    $departments = $jobs->pluck('department', ',', true);
    sort($departments);

    // Extract unique locations for filtering
    $locations = $jobs->pluck('location', ',', true);
    sort($locations);

    return [
        'jobs'        => $jobs,
        'departments' => $departments,
        'locations'   => $locations
    ];
};
