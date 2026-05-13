<?php
/** @var \Kirby\Cms\Page $page */
if ($page->children()->isNotEmpty()) {
    go($page->children()->first()->url());
} else {
    go('error');
}
?>
