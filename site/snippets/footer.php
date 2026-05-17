<?php
declare(strict_types=1);

/**
 * Path: /site/snippets/footer.php
 * Filename: footer.php | Version: v7.8.0
 * Agent: Architect-K
 * Status: Production
 * Logic: Global footer component
 */
?>
</main>
</div>
<?php if ($theme = page('theme')): ?>
  <?php if ($theme->custom_footer()->isNotEmpty()): ?>
    <?= $theme->custom_footer() ?>
  <?php endif; ?>
<?php endif; ?>
</body>
</html>
