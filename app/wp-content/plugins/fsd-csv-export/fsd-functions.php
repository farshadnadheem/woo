<?php
function fsd_csv_export() {
	// Check for current user privileges 
  if( !current_user_can( 'manage_options' ) ){ return false; }

  // Check if we are in WP-Admin
  if( !is_admin() ){ return false; }

  // Nonce Check
  $nonce = isset( $_GET['_wpnonce'] ) ? $_GET['_wpnonce'] : '';
  if ( ! wp_verify_nonce( $nonce, 'download_csv' ) ) {
      die( 'Security check error' );
  }

  ob_start();
  $delimiter = ',';
  $filename = 'woo-orders-fsd-export-' . date('Y-m-d') . '.csv';

  $query_args = array(
    'fields' => 'ids',
    'post_type' => 'shop_order',
    'post_status' => 'any',
    'posts_per_page' => 999999999,
    'offset' => 0
  );

  $query = new WP_Query($query_args);
  $order_ids = $query->posts;

	foreach ($order_ids as $order_id) {
  	$row = array();   
    $data[] = fsd_get_orders_csv_row($order_id);
  }

  $header_row = array(
    'Order ID',
    'Order Date',
    'Name of Customer',
    'Status',
    'Amount'
  );

  $fh = @fopen( 'php://output', 'w' );
  fprintf( $fh, chr(0xEF) . chr(0xBB) . chr(0xBF) );
  header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
  header( 'Content-Description: File Transfer' );
  header( 'Content-type: text/csv' );
  header( "Content-Disposition: attachment; filename={$filename}" );
  header( 'Expires: 0' );
  header( 'Pragma: public' );
  fputcsv( $fh, $header_row );

  foreach ( $data as $data_row ) {
      fputcsv( $fh, $data_row );
  }
  fclose( $fh );
  
  ob_end_flush();
  
  die();
}

function fsd_get_orders_csv_row($order_id , $export_columns = NULL) {
  $order = wc_get_order($order_id);

  foreach ($order->get_items() as $item_id => $item) {
  	$product = (WC()->version < '4.4.0') ? $order->get_product_from_item($item) : $item->get_product();   //  get_product_from_item() deprecated since version 4.4.0 

  	if (!is_object($product)) {
      $product = new WC_Product(0);
    }

    $order_data = array(
      'order_number' => $order->get_order_number(),
      'order_date' => date('Y-m-d H:i:s', strtotime(get_post($order->get_id())->post_date)),
      'billing_first_name' => $order->get_billing_first_name() . $order->get_billing_last_name(),
      'status' => $order->get_status(),
      'order_total' => $order->get_currency().' '.@wc_format_decimal($order->get_total(), 2)
    );
  }
  return $order_data;
}
?>