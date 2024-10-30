<?php
// Source: https://developer.wordpress.org/plugins/plugin-basics/uninstall-methods/

// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}
 
$option_name = 'wporg_option';
 
delete_option($option_name);
 
?>