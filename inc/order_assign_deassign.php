<?php
defined('ABSPATH') || exit;
// echo '<pre>';
// print_r(wc_get_order_statuses()) ;
// die();
function order_assignTo_partner(){
    if (isset($_POST['action']) && $_POST['action'] =='order_assign') {
        global $wpdb;
        $table_name = $wpdb->prefix . 'order_assignments';
        $order_id = checkInput(sanitize_text_field($_POST['order_id']));
        $selected_partner = checkInput(sanitize_text_field($_POST['select_partner']));
         $run = $wpdb->insert(
            $table_name,
            array(
                'order_id' => $order_id,
                'partner_id' => $selected_partner,
                'status' => 'assigned'
            ),
            array(
                '%d',
                '%d',
                '%s'
            )
        );
        if($run){
        // echo 'ok';
         $order = wc_get_order($order_id);
        if ($order) {
            $order->update_status('wc-reikia-partnerio', 'Order assigned to partner.');
        }
        // exit();
              // Send a JSON response
        wp_send_json_success(array(
            'r'       => 'ok',
            'message' => 'Order assigned successfully.'
            )
        );
        }
       
    }


/**
 * Order accept Function 
 * 
 * */ 
if (isset($_POST['assign_id']) && isset($_POST['partnar_id'])) {
    global $wpdb;

    $assign_id = intval($_POST['assign_id']);
    $partner_id = intval($_POST['partnar_id']);

    // Update the status in the wp_order_assignments table
    $table_name = $wpdb->prefix . 'order_assignments';
    $updated = $wpdb->update(
        $table_name,
        array('status' => 'accepted'),
        array(
            'order_id' => $assign_id,
            'partner_id' => $partner_id
        ),
        array('%s'),
        array('%d', '%d')
    );

    if ($updated !== false) {
        // Change the WooCommerce order status to "processing"
        $order = wc_get_order($assign_id);
        if ($order) {
            $order->update_status('processing');
            echo json_encode(array('r' => 'ok', 'message' => 'Užsakymo būsena sėkmingai atnaujinta.'));
            exit();
        } else {
            echo json_encode(array('r' => false, 'message' => 'Order not found.'));
        }
    } else {
        echo json_encode(array('r' => false, 'message' => 'Failed to update the database.'));
    }
} 


if (isset($_POST['de_assign_id']) && isset($_POST['de_partnar_id'])) {
    global $wpdb;

    $de_assign_id = intval($_POST['de_assign_id']);
    $partner_id = intval($_POST['de_partnar_id']);

    // Update the status in the wp_order_assignments table
    $table_name = $wpdb->prefix . 'order_assignments';
    $updated = $wpdb->update(
        $table_name,
        array('status' => 'declined'),
        array(
            'order_id' => $de_assign_id,
            'partner_id' => $partner_id
        ),
        array('%s'),
        array('%d', '%d')
    );

    if ($updated !== false) {
        // Change the WooCommerce order status to "processing"
        $order = wc_get_order($de_assign_id);
        if ($order) {
            $order->update_status('reikia-partnerio');
            echo json_encode(array('r' => 'ok', 'message' => 'Jūs sėkmingai atsisakėte'));
            exit();
        } else {
            echo json_encode(array('r' => false, 'message' => 'Order not found.'));
        }
    } else {
        echo json_encode(array('r' => false, 'message' => 'Failed to update the database.'));
    }
} 




if (isset($_POST['com_assign_id']) && isset($_POST['com_partnar_id'])) {
    global $wpdb;

    $com_assign_id = intval($_POST['com_assign_id']);
    $partner_id = intval($_POST['com_partnar_id']);

    // Update the status in the wp_order_assignments table
    $table_name = $wpdb->prefix . 'order_assignments';
    $updated = $wpdb->update(
        $table_name,
        array('status' => 'completed'),
        array(
            'order_id' => $com_assign_id,
            'partner_id' => $partner_id
        ),
        array('%s'),
        array('%d', '%d')
    );

    if ($updated !== false) {
        // Change the WooCommerce order status to "processing"
        $order = wc_get_order($com_assign_id);
        if ($order) {
            $order->update_status('tikslinti-telefon');
            echo json_encode(array('r' => 'ok', 'message' => 'Jūs sėkmingai atsisakėte'));
            exit();
        } else {
            echo json_encode(array('r' => false, 'message' => 'Order not found.'));
        }
    } else {
        echo json_encode(array('r' => false, 'message' => 'Failed to update the database.'));
    }
} 



}
add_action('init','order_assignTo_partner');
