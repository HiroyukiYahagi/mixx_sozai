<?php
get_header();
?>

<?php
if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
?>

<div class="uk-position-relative uk-height-medium uk-background-cover uk-flex" uk-parallax="bgy: -200" style="background-image:url('<?= get_template_url(null) ?>/images/top.jpg');">
  <div class="uk-position-center uk-overlay uk-overlay-default">
    <h1>
      <?= $post->post_title ?>
    </h1>
  </div>
</div>

<section class="uk-section">
  <main class="uk-container uk-container-small" id="main">
<?php
    the_content();
?>
  </main>
</section>
<?php
  }
}
?>

<?php
get_footer();
