<?php
// https://github.com/themehybrid/hybrid-breadcrumbs

// TODO: Figure out how to squelch title instead of hammering it with display: none
?>

<style>
  .breadcrumbs__title {
    display: none;
  }
</style>
<div class="container pt-md-6 pt-sm-3">
  <?php
  Hybrid\Breadcrumbs\Trail::display([
    'title' => '',
    'title_tag' => 'p',
    'item_class' => 'breadcrumb-item',
    'list_tag' => 'ol',
    'list_class' => 'breadcrumb bg-white'
  ]);
  ?>
</div>