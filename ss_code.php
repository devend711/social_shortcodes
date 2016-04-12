<?php
/*
* Plugin Name: Social Shortcodes
* Description: Easily add simple share icons.
* Version: 1.0
* Author: Deven
* Author URI: devendayal.com
*/

/*
Shortcode Template Functions
*/

function twitter_share_shortcode( $atts, $label = 'Tweet' ) {
  $a = shortcode_atts( array(
    'url' => get_permalink(),
    'text' => null,
    'via' => null,
    'label' => 'Tweet'
  ), $atts );

  $twitter_params = 
    '?text=' . $a['text'] . '+-' .
    '&amp;url=' . $a['url'] . 
    ($a['via'] ? ('&amp;via=' . $a['via']) : null);

  $title = ($a['label'] ?: $label);

  $markup = '
    <div class="ss-code-social ss-code-social-twitter">
        <a class="twitter-button" 
          rel="external nofollow" 
          title="<?php $title ?>" 
          href="http://twitter.com/share' . $twitter_params . 
          '"target="_blank">' . 
          $title . 
          '</a>
    </div>';

  echo $markup;
}

/*
Setup Stuff
*/

function add_ss_code_plugin() {
  if ( !is_admin() ) {
    wp_enqueue_script( 'ss_code', plugins_url('js/ss_code.js', __FILE__), array() );
  }
}
add_action( 'init', 'add_ss_code_plugin' );

// add shortcodes
add_shortcode('twitter_share_custom', 'twitter_share_shortcode');

?>