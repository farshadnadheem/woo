<?php
/**
 * Plugin Name: Farshad's CSV Export Plugin
 * Description: This is the best plugin to export woocommerce orders to CSV
 * Version: 1.0
 * Author: Farshad Nadheem
 * Author URI: https://www.farshadnadheem.com
 */

/* Add phone number and export button to the order table */
add_filter( 'manage_edit-shop_order_columns', 'fsd_shop_order_columns' );
function fsd_shop_order_columns( $columns ){
  $new_columns = (is_array($columns)) ? $columns : array();

  $new_columns['phone'] = 'Phone';
  $new_columns['export'] = 'Export';

  return $new_columns;
}

add_action( 'manage_shop_order_posts_custom_column', 'fsd_shop_order_posts_custom_column' );
function fsd_shop_order_posts_custom_column( $column ){
  global $post, $the_order, $wp;

  $current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );

  if ( empty( $the_order ) || $the_order->get_id() != $post->ID ) {
      $the_order = wc_get_order( $post->ID );
  }

  $billing_address = $the_order->get_address();
  if ( $column == 'phone' ) {    
    echo ( isset( $billing_address['phone'] ) ? $billing_address['phone'] : '');
  }
  if ($column == 'export') {
  	echo '<a href="'.$current_url.'export=export_csv&_wpnonce='.wp_create_nonce( 'download_csv' ).'">Export</a>';
  	//nonces can be used to verify a user intends to perform an action
  }
}

if ( isset($_GET['export'] ) && $_GET['export'] == 'export_csv' )  {
	// Handle CSV Export
	add_action( 'admin_init', 'fsd_csv_export') ;
}
include 'fsd-functions.php';