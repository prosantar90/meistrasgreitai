<?php
if (isset($_POST['com_orderID']) && isset($_POST['com_partnerID'])) {
    global $wpdb;
    $com_orderID = intval($_POST['com_orderID']);
  
    $com_partnerID = intval($_POST['com_partnerID']);
    $table_name = $wpdb->prefix . 'order_assignments';
    $updated = $wpdb->update(
        $table_name,
        array('status' => 'completed'),
        array(
            'order_id' => $com_orderID,
            'partner_id' => $partner_id
        ),
        array('%s'),
        array('%d', '%d')
    );
    if ($updated !== false) {
    // Change the WooCommerce order status to "processing"
    $order = wc_get_order($com_orderID);
    if ($order) {
        $order->update_status('samata-laukiama');
        echo json_encode(array('r' => 'ok', 'message' => 'Užsakymo būsena sėkmingai atnaujinta.'));
        exit();
    } else {
        echo json_encode(array('r' => false, 'message' => 'Order not found.'));
    }
    } else {
        echo json_encode(array('r' => false, 'message' => 'Failed to update the database.'));
    }

}