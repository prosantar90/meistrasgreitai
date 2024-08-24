<?php 
/**
 * Get Order uising partner or user id and status
 */
function get_order_details_for_user($user_id, $status) {
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
            u.ID = %d AND oa.status = %s
    ", $user_id, $status);

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
 * Get Currency Symbole
 */
function currency_symbol(){
    $currency = get_woocommerce_currency();
    $currency_symbol = get_woocommerce_currency_symbol($currency);
    return $currency_symbol;
}

function get_processing_orders_total() {
    global $wpdb;
    $status = 'wc-processing'; // WooCommerce uses 'wc-' prefix for order statuses

    $query = "
       SELECT COUNT(*) FROM {$wpdb->prefix}posts WHERE post_type = 'shop_order' AND post_status = %s";
    $total = $wpdb->get_var($wpdb->prepare($query, $status));
    return $total ? $total : 0;
}

function get_completed_orders_total() {
    global $wpdb;

    $status = 'wc-completed'; // WooCommerce uses 'wc-' prefix for order statuses
    $query = "
       SELECT COUNT(*) FROM {$wpdb->prefix}posts WHERE post_type = 'shop_order' AND post_status = %s
    ";

    $total = $wpdb->get_var($wpdb->prepare($query, $status));

    return $total ? $total : 0;
}


function get_looking_for_partner_orders_total() {
    global $wpdb;

    $status = 'wc-reikia-partnerio'; // WooCommerce uses 'wc-' prefix for order statuses
    $query = "
       SELECT COUNT(*) FROM {$wpdb->prefix}posts WHERE post_type = 'shop_order' AND post_status = %s
    ";
    $total = $wpdb->get_var($wpdb->prepare($query, $status));

    return $total ? $total : 0;
}
function total_amount(){
    global $wpdb;
// SQL query to get the total amount of orders

if (is_partners()) {
    $user_ID = get_current_user_id();
    $status ='completed';
    $sql = $wpdb->prepare("
    SELECT 
        SUM(CAST(postmeta.meta_value AS DECIMAL(10,2))) AS total_amount
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
    WHERE 
        u.ID = %d AND oa.status = %s
", $user_ID, $status);
    $total_amount = $wpdb->get_var($sql);

}else{
$sql = "
    SELECT 
        SUM(meta_value) as total_amount 
    FROM 
        {$wpdb->prefix}postmeta 
    JOIN 
        {$wpdb->prefix}posts 
    ON 
        {$wpdb->prefix}postmeta.post_id = {$wpdb->prefix}posts.ID 
    WHERE 
        {$wpdb->prefix}posts.post_type = 'shop_order' 
        AND {$wpdb->prefix}postmeta.meta_key = '_order_total' 
        AND {$wpdb->prefix}posts.post_status IN ('wc-completed', 'wc-processing', 'wc-on-hold')
";
// Execute the query and get the total amount
$total_amount = $wpdb->get_var($sql);


}
return $total_amount;

}

function total_partners() {
    global $wpdb;
    // SQL query to count the total number of rows in the partners table
    $sql = "SELECT COUNT(ID) FROM {$wpdb->prefix}partners";
    // Execute the query and get the total count
    $r = $wpdb->get_var($sql);
    return $r;
}


function count_total_sales() {
    global $wpdb;
    if (is_partners()) {
    $user_ID = get_current_user_id();
    $status ='accepted';
     $sql = $wpdb->prepare("
        SELECT 
            COUNT(partner_id) AS total_amount
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
        WHERE 
            u.ID = %d AND oa.status = %s
    ", $user_ID, $status);
        $total_sales_count = $wpdb->get_var($sql);

    }else{
        $args = array(
        'post_type'      => 'shop_order',
        'post_status'    => array('wc-completed'),
        'posts_per_page' => -1,  // Get all orders
        'fields'         => 'ids',  // Return only the IDs
    );
    $orders = get_posts($args);
    $total_sales_count = count($orders);

    }
    
    return $total_sales_count;
}

function count_total_customers() {
    // Get the number of users with the role 'customer'
    $args = array(
        'role'    => 'customer',
        'fields'  => 'ID',  // We only need the IDs
    );

    $customers = get_users($args);

    // Count the number of customers
    $total_customers_count = count($customers);

    return $total_customers_count;
}

function count_pending_orders() {
    $args = array(
        'post_type'      => 'shop_order',
        'post_status'    => array('wc-processing'),
        'posts_per_page' => -1,  // Get all orders
        'fields'         => 'ids',  // Return only the IDs for efficiency
    );

    $orders = get_posts($args);
    $total_pending_count = count($orders);
    return $total_pending_count;
}
