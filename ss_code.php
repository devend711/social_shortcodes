<?php
/*
* Plugin Name: Social Shortcodes
* Description: Bare-bones social sharing links.
* Version: 1.0
* Author: devend711
* Author URI: https://github.com/devend711/social_shortcodes
*/

/*
Shortcode Template Functions
*/

function twitter_share_shortcode( $atts, $inner = null ) {
  $a = shortcode_atts( array(
    'url' => get_permalink(),
    'text' => null,
    'via' => null,
    'title' => 'Share this on Twitter',
    'text-separator' => ' -'
  ), $atts );

  $a = array_map('urlencode', $a);

  $text = ($a['text'] ? ($a['text'] . $a['text-separator']) : null);

  $twitter_params = 
    '?text=' . $text .
    '&amp;url=' . $a['url'] . 
    ($a['via'] ? ('&amp;via=' . $a['via']) : null);

  $twitter_params = ltrim($twitter_params);

  $markup = '
    <div class="ss-code-social-container ss-code-social-twitter">
      <a class="twitter-button ss-code-social-link" 
        rel="external nofollow" title="' . $a['title'] .
        '"href="http://twitter.com/share' . $twitter_params . 
        '"target="_blank">' . 
        $inner . 
      '</a>
    </div>';

  return $markup;
}

function fb_share_shortcode( $atts, $inner = null ) {
  $a = shortcode_atts( array(
    'url' => get_permalink(),
    'label' => 'Share on Facebook',
  ), $atts );

  $a = array_map('urlencode', $a);

  $fb_params = '?u=' . $a['url'];

  $markup = '
    <div class="ss-code-social-container ss-code-social-facebook">
      <a class="ss-code-social-link" rel="external nofollow" 
        title="' . $a['label'] .
        '"href="https://www.facebook.com/sharer/sharer.php' . $fb_params . 
        '"target="_blank">' . 
        $inner . 
      '</a>
    </div>';

  return $markup;
}

/*
Setup Stuff
*/

function add_ss_code_plugin() {
  if ( !is_admin() ) {
    // enqueue in footer
    wp_enqueue_script( 'ss_code', plugins_url('js/ss_code.js', __FILE__), array(), false, true);
  }
}
add_action( 'init', 'add_ss_code_plugin' );

// add shortcodes
add_shortcode( 'twitter_share_custom', 'twitter_share_shortcode' );
add_shortcode( 'fb_share_custom', 'fb_share_shortcode' );

?>