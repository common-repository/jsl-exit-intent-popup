<?php
/*
Plugin Name:  JSL Exit Intent Popup
Plugin URI:   https://www.marketingoveporadenstvo.sk/plugins/jsl-exit-intent-popup/
Description:  Fully Customizable Exit Intent Popup
Tags:         exit intent, popup, fully customizable, exit-intent
Version:      1.0
Author:       Jan Sliacky
Author URI:   https://www.marketingoveporadenstvo.sk
*/

/* Avoid direct plugin access */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* Enqueue script for the plugin */
function jsl_load_scripts() {
  $jsl_eit_js  = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'js/bioep.min.js' ));
  wp_enqueue_script( 'bioep_js', plugins_url( 'js/bioep.min.js', __FILE__ ), array(), $jsl_eit_js );
};
add_action('wp_enqueue_scripts', 'jsl_load_scripts');

/* Gets customizer settings */
require_once dirname(__FILE__) . '/jsl_customizer_settings.php'; 

/* Settings for bioep js */
function jsl_addScriptIntoHeader() {    
 
 // variables from customizer with default fallback 
  $popup_cookies = (get_option('jsl_cookies' )) ?: 0;
  $box_body = (get_option('jsl_message')) ?: '<h1>This is the dummy message</h1>';
  $box_css = (get_option('jsl_css')) ?: '#bio_ep {background-color: aliceblue; text-align: center;}';
  $box_height = (get_option('jsl_box_height' )) ?: 200; 
  $box_width = (get_option('jsl_box_width' )) ?: 400; 
  $enable_popup = get_option( 'jsl_enable_popup' );

 // check if popup is enabled
 if(!isset($enable_popup) || !$enable_popup) {
  printf('Switch on the EIT in customizer!');
  return;
}
 
  // gets css and html into js 
  ?>
      <script type="text/javascript">
        bioEp.init({
          html: '<div><?php echo trim(preg_replace('/\r|\n/', '', $box_body )); ?></div>',
            
          css: '#bio_ep {width: <?php printf($box_width) ?>px !important;} <?php echo trim(preg_replace('/\r|\n/', '', $box_css)); ?>',     
          cookieExp: <?php printf($popup_cookies); ?>,
          height: <?php printf($box_height); ?>,         
      });
      </script>
    <?php	  
};
add_action ('wp_head', 'jsl_addScriptIntoHeader');

