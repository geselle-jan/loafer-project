<?php
/**
 * Roots includes
 *
 * The $roots_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/roots/pull/1042
 */
$roots_includes = array(
  'lib/utils.php',           // Utility functions
  'lib/init.php',            // Initial theme setup and constants
  'lib/wrapper.php',         // Theme wrapper class
  'lib/sidebar.php',         // Sidebar class
  'lib/config.php',          // Configuration
  'lib/activation.php',      // Theme activation
  'lib/titles.php',          // Page titles
  'lib/nav.php',             // Custom nav modifications
  'lib/gallery.php',         // Custom [gallery] modifications
  'lib/scripts.php',         // Scripts and stylesheets
  'lib/extras.php',          // Custom functions
);

foreach ($roots_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'roots'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

wp_register_style(
    'syntaxhighlighter-theme-monokai',
    get_bloginfo('template_directory').'/assets/css/shThemeMonokai.css',
    array( 'syntaxhighlighter-core' ),
    '1.2.3'
);

add_filter( 'syntaxhighlighter_themes', 'monokaiTheme' );
 
function monokaiTheme( $themes ) {
    $themes['monokai'] = 'Monokai';
 
    return $themes;
}

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 500, 500 );
add_image_size ( 'photo', 1026, 1026, false );

function photos_init() {
    $args = array(
      'label' => 'Photos',
      'public' => true,
      'show_ui' => true,
      'capability_type' => 'post',
      'hierarchical' => false,
      'rewrite' => array('slug' => 'photos'),
      'query_var' => true,
      'menu_icon' => 'dashicons-camera',
      'supports' => array(
        'title',
        'editor',
        'thumbnail',
        'revisions'
      )
    );
    register_post_type( 'photos', $args );
    flush_rewrite_rules();
}

add_action( 'init', 'photos_init' );
