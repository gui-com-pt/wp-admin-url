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
  include 'admin-page.php';
}