<?php
// TODO: Add styling
// TODO: Why is part of URL missing?

if (function_exists('yoast_breadcrumb')) {
?>
  <div class="container">
    <nav aria-label="breadcrumbs">
      <?php
      yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
      ?>
  </div>
  </nav>
<?php
}
?>