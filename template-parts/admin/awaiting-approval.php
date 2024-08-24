<?php 
$args = array(
    'limit'   => -1, // Get all orders
    'orderby' => 'date',
    'order'   => 'DESC',
    'status'  =>  'tikslinti-telefon'
);
$order_statuses = wc_get_order_statuses();?>
    <table class="table" id="order_lists">
        <thead>
            <tr>
                <th><?php esc_html_e('Sl Nr','mei');?></th>
                <th><?php esc_html_e('Užsakymo Nr','mei');?></th>
                <th><?php esc_html_e('Pavadinimas','mei');?></th>
                <th><?php esc_html_e('Klientas','mei');?></th>
                <th><?php esc_html_e('Iš viso','mei');?></th>
                <th><?php esc_html_e('Būsena','mei');?></th>
				<th><?php esc_html_e('Data ir laikas','mei');?></th>
                <th><?php esc_html_e('Veiksmas','mei');?></th>
            </tr>
        </thead>
        <tbody>
<?php 
$orders = wc_get_orders($args);
// $orders = get_order_using_order_status('tikslinti-telefon');
$i = 1;
foreach ($orders as $order) {
    $order_id = $order->get_id();
    $customer_name = $order->get_formatted_billing_full_name();
    $order_total = $order->get_total();
    $order_status = wc_get_order_status_name($order->get_status());
    $modified_date = $order->get_date_modified(); 
    $formatted_modified_date = $modified_date ? date_i18n('Y-m-d H:i', $modified_date->getTimestamp()) : ''; // Format the date

    $product_titles = [];

    // Loop through the order items to get product titles
    foreach ($order->get_items() as $item) {
        $product_titles[] = $item->get_name();
    }
    $order_title = implode(', ', $product_titles);
    ?>
    <tr>
        <td><?= $i++ ?></td>
        <td><?= $order_id; ?></td>
        <td><?= $order_title; ?></td> <!-- Display the product titles here -->
        <td><?= $customer_name; ?></td>
        <td><?= $order_total; ?></td>
        <td><?= $order_status; ?></td>
        <td><?= $formatted_modified_date; ?></td> <!-- Display the formatted modified date here -->
        <td>
            <a id="admin-complete" data-id="<?= $order_id; ?>" class="badge badge-primary p-2" href="javascript:void(0)"><?php esc_html_e('Užbaigti','mei'); ?></a>
            <a id="admin-revision" data-id="<?= $order_id; ?>" class="badge badge-danger p-2" href="javascript:void(0)"><?php esc_html_e('Peržiūra','mei'); ?></a>
        </td>
    </tr>
<?php 
} 
?>


				</tbody>
        </table>

    </div>
</section>



<?php get_footer();



