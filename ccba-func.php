<?php
/*
Plugin Name: CCount
Plugin URI: http://wordpress.org/plugins/ccount/
Description: This plugin adds a widget showing the commenters and the number of their comments.
Version: 1.1
Author: Van Tien Bui
Author URI: http://tienbui.de
License: GPL2
*/


if ( is_admin() ) {
  load_plugin_textdomain('ccba', false, basename( dirname( __FILE__ ) ) . '/languages/' );

  add_action( 'wp_dashboard_setup', 'add_dashboard_ccba');

  function dashboard_output_ccba() {
    require plugin_dir_path(__FILE__).'magic.php';
  }

  function add_dashboard_ccba() {
    wp_add_dashboard_widget( 'dashboard_commenter_counter', __('Top Commenters', 'ccba'), 'dashboard_output_ccba', 'widget_control' );
  }

}

?>