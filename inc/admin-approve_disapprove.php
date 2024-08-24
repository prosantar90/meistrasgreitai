<?php

/**
 * Admin approve 
 */

function handle_admin_order_action() {
    // Verify nonce for security (assuming you've added nonce verification in your AJAX request)
    if (!isset($_POST['admin_approve']) && !isset($_POST['review_order'])) {
        wp_send_json_error('Invalid request.');
    }

    // Get the order ID from the request
    $order_id = isset($_POST['admin_approve']) ? intval($_POST['admin_approve']) : intval($_POST['review_order']);
    
    if (!$order_id) {
        wp_send_json_error('Invalid order ID.');
    }

    // Load the order object
    $order = wc_get_order($order_id);

    if (!$order) {
        wp_send_json_error('Order not found.');
    }

    // Determine the action and update the order status accordingly
    if (isset($_POST['admin_approve'])) {
        $order->update_status('completed', 'Order approved by admin.');
        wp_send_json_success('Order status changed to Completed.');
    } elseif (isset($_POST['review_order'])) {
        $order->update_status('on-hold', 'Order sent for review by admin.');
        wp_send_json_success('Order status changed to On Hold.');
    }

    // Just in case the request is invalid
    wp_send_json_error('Invalid action.');
}
add_action('wp_ajax_handle_admin_order_action', 'handle_admin_order_action');
