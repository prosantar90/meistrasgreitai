<?php

function get_woocommerce_order_data() {
    $orders = wc_get_orders(array(
        'limit' => -1, // Get all orders
        'orderby' => 'date',
        'order' => 'DESC',
    ));


    $order_data = array();

    foreach ($orders as $order) {
        $order_data[] = array(
            'date' => $order->get_date_created()->date('Y-m-d'),
            'total' => $order->get_total(),
            'status' => $order->get_status(),
        );
    }
    // print_r($order_data);

    echo json_encode($order_data);
    exit();
}

add_action('wp_ajax_get_order_data', 'get_woocommerce_order_data');
add_action('wp_ajax_nopriv_get_order_data', 'get_woocommerce_order_data');