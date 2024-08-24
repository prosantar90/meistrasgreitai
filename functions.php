<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementorChild
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */
function hello_elementor_child_enqueue_scripts() {
    wp_enqueue_style(
        'hello-elementor-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        [
            'hello-elementor-theme-style',
        ],
        '1.0.0'
    );
}

$inc_dir = get_stylesheet_directory() . '/inc/';
// Find all PHP files in the inc directory
$php_files = glob($inc_dir . '*.php');
// Include each PHP file found
foreach ($php_files as $php_file) {
    require_once $php_file;
}


$pages_list= array('partneriu-sarasas','general-overview','key-news','latest-projects','registration','assigned-projects','completed-works','pending-works',
                'signed-contracts','view-partner','contract-awaiting-approval',
);

function greetings_code(){
$current_time = current_time('mysql');
$time_only = date('H:i:s', strtotime($current_time));
$current_hour = date('G', strtotime($time_only));
if ($current_hour >= 5 && $current_hour < 12) {
    $greeting = 'Good morning';
} elseif ($current_hour >= 12 && $current_hour < 17) {
    $greeting = 'Good afternoon';
} elseif ($current_hour >= 17 && $current_hour < 20) {
    $greeting = 'Good evening';
} else {
    $greeting = 'Good night';
}
echo $greeting;
}
// add_action('greetings','greetings_code');



function checkInput($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlentities($data);
    return $data;
}

function get_current_user_role() {
    // Get the current user ID
    $user_id = get_current_user_id();

    if ($user_id) {
        // Get the user object
        $user = get_userdata($user_id);

        // Get the roles
        $roles = $user->roles;

        // Assuming the user has only one role, get the first one
        if (!empty($roles)) {
            return $roles[0];
        } else {
            return 'No roles assigned.';
        }
    } else {
        return 'No user is logged in.';
    }
}
/**
 * Get Order using order status
 */
function get_order_using_order_status($status){
     global $wpdb;
    // Prepare the SQL query
    $query = $wpdb->prepare("
        SELECT 
            oa.*, 
            p.*, 
            u.*, 
            posts.ID as order_id, 
            posts.post_date as order_date, 
            postmeta.meta_value as order_total, 
            woocommerce_order_items.order_item_name as item_title
        FROM 
            {$wpdb->prefix}order_assignments as oa
        LEFT JOIN 
            {$wpdb->prefix}partners as p ON oa.partner_id = p.ID
        LEFT JOIN 
            {$wpdb->users} as u ON p.user_id = u.ID
        LEFT JOIN 
            {$wpdb->posts} as posts ON oa.order_id = posts.ID AND posts.post_type = 'shop_order'
        LEFT JOIN 
            {$wpdb->postmeta} as postmeta ON posts.ID = postmeta.post_id AND postmeta.meta_key = '_order_total'
        LEFT JOIN 
            {$wpdb->prefix}woocommerce_order_items as woocommerce_order_items ON oa.order_id = woocommerce_order_items.order_id
        WHERE 
            oa.status = %s
    ", $status);

    // Execute the query
    $results = $wpdb->get_results($query);

    // Fetch formatted billing full name for each order
    foreach ($results as &$order) {
        $wc_order = wc_get_order($order->order_id);
        if ($wc_order) {
            $order->billing_full_name = $wc_order->get_formatted_billing_full_name();
        } else {
            $order->billing_full_name = 'N/A';
        }
    }

    return $results;
}


/**
 * contacts Waiting for approval
 */
function waiting_for_approval($status) {
    global $wpdb;
    // Sanitize the status to prevent SQL injection
    $status = sanitize_text_field($status);

     $query = $wpdb->prepare(
    "SELECT * FROM {$wpdb->prefix}order_assignments as oa 
    LEFT JOIN {$wpdb->prefix}posts AS O ON oa.order_id = O.ID
    LEFT JOIN  {$wpdb->prefix}woocommerce_order_items as woocommerce_order_items ON oa.order_id = woocommerce_order_items.order_id
    WHERE O.post_type = 'shop_order' AND O.post_status = %s",
    $status
);


    // Execute the query
    $results = $wpdb->get_results($query);

    // Fetch formatted billing full name for each order
    foreach ($results as &$order) {
        $wc_order = wc_get_order($order->ID);
        if ($wc_order) {
            $order->billing_full_name = $wc_order->get_formatted_billing_full_name();
        } else {
            $order->billing_full_name = 'N/A';
        }
    }

    return $results;
}
