<?php
declare(strict_types=1);

/**
 * Path: /site/snippets/loading-screen.php
 * Filename: loading-screen.php | Version: v1.5.0
 * Agent: Motion-G
 * Status: Production
 * Logic: Global loading overlay matching width and specific oceanic theme
 */
?>
<div id="global-loader" class="fixed inset-0 z-[9999] bg-oceanic-dark flex flex-col items-center justify-center">
  <div class="loader-logo w-[60vw] md:w-[42vw] max-w-[700px] flex flex-col items-center justify-center opacity-0">
    <!-- Monogram Portion -->
    <svg width="1008" height="258" viewBox="0 0 1008 258" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto text-canvas logo-monogram mb-2 md:mb-3">
      <path d="M465.776 1.54212L660.478 120.689L686.632 106.158L820.308 143.937L846.463 146.842L1003.39 255.818H5.17407L465.776 1.54212Z" stroke="currentColor" stroke-width="4" stroke-miterlimit="10"/>
      <path d="M272.082 255.818L465.776 1.54212" stroke="currentColor" stroke-width="4" stroke-miterlimit="10"/>
      <path d="M624.072 255.818L465.776 1.54212" stroke="currentColor" stroke-width="4" stroke-miterlimit="10"/>
      <path d="M660.478 120.689L573.662 174.844" stroke="currentColor" stroke-width="4" stroke-miterlimit="10"/>
      <path d="M204.611 147.766L272.082 255.818" stroke="currentColor" stroke-width="4" stroke-miterlimit="10"/>
      <path d="M204.611 147.766L368.928 128.679" stroke="currentColor" stroke-width="4" stroke-miterlimit="10"/>
      <path d="M204.611 147.766L122.275 255.818" stroke="currentColor" stroke-width="4" stroke-miterlimit="10"/>
      <path d="M418.996 27.3662L310.431 135.474" stroke="currentColor" stroke-width="4" stroke-miterlimit="10"/>
      <path d="M349.632 96.4395L423.142 57.5102" stroke="currentColor" stroke-width="4" stroke-miterlimit="10"/>
      <path d="M321.082 81.4208L349.632 96.4395" stroke="currentColor" stroke-width="4" stroke-miterlimit="10"/>
      <path d="M491.883 43.542L573.883 68.0637V174.542" stroke="currentColor" stroke-width="4" stroke-miterlimit="10"/>
      <path d="M544.925 128.679L573.662 67.5621" stroke="currentColor" stroke-width="4" stroke-miterlimit="10"/>
      <path d="M686.633 106.158L624.073 255.818" stroke="currentColor" stroke-width="4" stroke-miterlimit="10"/>
      <path d="M751.303 255.818L686.633 106.158" stroke="currentColor" stroke-width="4" stroke-miterlimit="10"/>
      <path d="M819.164 143.613L751.303 255.818" stroke="currentColor" stroke-width="4" stroke-miterlimit="10"/>
    </svg>

    <!-- Text Portion (HTML) -->
    <div class="logo-text w-full flex justify-between font-display font-extralight text-canvas uppercase text-sm sm:text-xl md:text-3xl lg:text-4xl mt-1 md:mt-2">
      <?php 
        $text = "WESTPORT PARTNERS";
        foreach(str_split($text) as $char): 
          if ($char === ' ') {
            echo '<span class="letter w-2 md:w-4 inline-block opacity-0"></span>';
          } else {
            echo '<span class="letter inline-block">' . $char . '</span>';
          }
        endforeach; 
      ?>
    </div>
  </div>
</div>
