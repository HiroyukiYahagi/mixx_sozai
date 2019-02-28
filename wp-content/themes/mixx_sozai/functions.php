<?php


function register_post_types() {

  register_post_type( 'sozai',
    array(
      'label' => "広告用素材",
      'public' => false,
      'has_archive' => false,
      "show_ui" => true,
      "show_in_nav_menus" => true,
      "show_in_menu" => true,
      "show_in_admin_bar" => false,
      'menu_position' => 20,
      'query_var' => true,
      "hierarchical" => true,
      'supports' => ['title'],
    )
  );
}
add_action('init', 'register_post_types');


function get_template_url($attr){
  return get_template_directory_uri();
}
add_shortcode("template_url", "get_template_url");

function get_home_url_shortcode($attr){
  return get_template_directory_uri();
}
add_shortcode("url", "get_home_url_shortcode");


function get_page_list ($attr) {
  $posts = get_posts([
    'posts_per_page' => -1,
    "post_type" => "page",
    'orderby' => 'date',
    'order' => 'ASC',
  ]);
  ob_start();
?>
<div class="uk-margin-medium uk-grid-small" uk-grid>
  <?php foreach($posts as $post){ ?>
  <div class="uk-width-1-3@s">
    <a class="uk-button uk-button-large uk-button-primary uk-width-1-1 uk-padding-remove" href="<?= get_permalink($post) ?>">
      <?= $post->post_title ?>
    </a>
  </div>
  <?php } ?>
</div>
<?php
  $buffer = ob_get_contents();
  ob_end_clean();
  return $buffer;
}
add_shortcode("page_list", "get_page_list");


function get_sozai_list ($attr) {
  $posts = get_posts([
    'posts_per_page' => -1,
    "post_type" => "sozai",
    'orderby' => 'date',
    'order' => 'ASC',
  ]);
  ob_start();
  if( count($posts) > 0 ){
?>
<div class="uk-margin-medium uk-text-center">
  <a class="uk-button uk-button-primary uk-button-large uk-width-large@s" id="download_button">
    素材を全てダウンロード
  </a>
</div>
<div class="uk-margin-medium" uk-grid="masonry: true">
  <?php 
    foreach($posts as $post){ 
      $image_url = get_field("image", $post);
      $parsed = parse_url($image_url);
      $parsed = explode("/", $parsed["path"]);
      $parsed = $parsed[ count($parsed)-1 ];
  ?>
  <div class="uk-width-1-3@s">
    <div>
      <a class="download_file" href="<?= $image_url ?>" data-download-file="<?= $parsed ?>"></a>
      <div class="uk-margin-small">
        <img class="uk-width-1-1" src="<?= $image_url ?>" />
      </div>
      <h4 class="uk-margin-small">
      <?= $post->post_title ?>
      </h4>
      <p class="uk-margin-small">
        <small>
        <?= nl2br(get_field("description", $post)) ?>
        </small>
      </p>
    </div>
  </div>
  <?php } ?>
</div>
<?php
  }
  $buffer = ob_get_contents();
  ob_end_clean();
  return $buffer;
}
add_shortcode("sozai_list", "get_sozai_list");