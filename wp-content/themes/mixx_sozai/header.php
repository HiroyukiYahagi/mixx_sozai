<!DOCTYPE html>
<html>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/style.css" />

  <title><?php
  /*
   * Print the <title> tag based on what is being viewed.
   */
  global $page, $paged;

  wp_title( '|', true, 'right' );

  // Add the blog name.
  bloginfo( 'name' );

  // Add the blog description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    echo " | $site_description";

  // Add a page number if necessary:
  if ( $paged >= 2 || $page >= 2 )
    echo ' | ' . sprintf( __( 'Page %s', '' ), max( $paged, $page ) );

  ?></title>

  <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>


  <div>
    <div class="uk-background-white uk-box-shadow-small">
      <header class="uk-container uk-container-small">
        <nav class="uk-navbar-container uk-navbar-transparent" uk-navbar>
          <div class="uk-navbar-left">
            <a href="<?= home_url() ?>" class="uk-navbar-item uk-logo uk-padding-small uk-padding-remove-horizontal">
              <img class="uk-width-small" src="<?= get_template_directory_uri() ?>/images/logo.svg" />
              <small>アフィリエイター様専用サイト</small>
            </a>
          </div>
        </nav>
      </header>
    </div>
  </div>