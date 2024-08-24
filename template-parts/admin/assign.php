<?php 
// Fetch all orders
$args = array(
    'limit' => -1, // Get all orders
    'orderby' => 'date',
    'order' => 'DESC',
    'status' => 'wc-reikia-partnerio'
);

?>
<table class="table" id="order_lists">
        <thead>
            <tr>
                <th><?php esc_html_e('Sl No','mei');?></th>
                <th><?php esc_html_e('Order No','mei');?></th>
                <th><?php esc_html_e('Title','mei');?></th>
                <th><?php esc_html_e('Customer','mei');?></th>
                <th><?php esc_html_e('Total','mei');?></th>
                <th><?php esc_html_e('Status','mei');?></th>
                <th><?php esc_html_e('Action','mei');?></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $orders =wc_get_orders($args);
            $i= 1;
            foreach ($orders as $order) {
                $order_id = $order->get_id();
                $order_title = get_the_title($order_id);
                $customer_name = $order->get_formatted_billing_full_name();
                $order_total = $order->get_total();
                $order_status = wc_get_order_status_name($order->get_status());
                $items = $order->get_items();
                foreach ($items as $item) {
                    $product = $item->get_product();
                    $product->get_name();
                }
                ?>
                <tr>
                    <td><?= $i++?></td>
                    <td><?= $order_id;?></td>
                    <td><?= $product->get_name();?></td>
                    <td><?= $customer_name;?></td>
                    <td><?= $order_total;?></td>
                    <td><?= $order_status;?></td>
                    <td>
                    <a id="de-assign" href="javascript:void(0)" data-id="<?= $order_id;?>" class="badge badge-danger p-2">
                        De-Assign
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
