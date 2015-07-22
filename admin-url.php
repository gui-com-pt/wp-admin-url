<?php
/**
 * Plugin Name: Admin URL
 * Plugin URI: http://volupio.com
 * Description: This plugin changes the URL from WP-Admin
 * Version: 0.0.1
 * Author: Guilherme Cardoso
 * Author URI: http://volupio.com
 * License: GPL2
 */

add_filter('site_url',  'wpadmin_filter', 10, 3);  

function wpadmin_filter( $url, $path, $orig_scheme ) {  
    $old  = array( "/(wp-admin)/");  
    $admin_dir = WP_ADMIN_DIR;  
    $new  = array($admin_dir);  
    return preg_replace( $old, $new, $url, 1);  
}

add_action('admin_menu', 'admin_url_menu');

function admin_url_menu() {
	add_menu_page('Admin URL', 'Admin URL', 'administrator', 'admin-url-settings', 'admin_url_settings_page', 'dashicons-admin-generic');
}

function admin_url_settings_page() {
  echo "<h2>Configure Admin-URL</h2>";
  echo "<p>This plugin rename the default wp-admin url to a custom one. You've to define it both in wp-config.php and .htaccess</p>";
  echo "<h4>wp-config.php</h4>";
  echo "<p>define('WP_ADMIN_DIR', 'secret-folder');<br>";
  echo "<p>define('ADMIN_COOKIE_PATH', SITECOOKIEPATH . WP_ADMIN_DIR);</p>";
  echo "<h4>.htaccess</h4>";
  echo '<p>Define the bellow rule on top of .htaccess, before the Wordpress related config.</p>';
  echo "<p>RewriteRule ^secret-folder/(.*) wp-admin/$1?%{QUERY_STRING} [L]</p>";
}