<table class="table" id="order_lists">
        <thead>
        <tr>
            <th><?php esc_html_e('Sl Nr','mei');?></th>
            <th><?php esc_html_e('Užsakymo Nr','mei');?></th>
            <th><?php esc_html_e('Pavadinimas','mei');?></th>
            <th><?php esc_html_e('Klientas','mei');?></th>
            <th><?php esc_html_e('Iš viso','mei');?></th>
            <th><?php esc_html_e('Data ir laikas','mei');?></th>
            <th><?php esc_html_e('Būsena','mei');?></th>
            <th><?php esc_html_e('Partnerio vardas','mei');?></th>
            <th><?php esc_html_e('Veiksmas','mei');?></th>
        </tr>
    </thead>
    <tbody>
    <?php 
    global $wpdb;
    $prefix = $wpdb->prefix;
    $sql ="SELECT 
    {$wpdb->prefix}order_assignments.*, 
    {$wpdb->prefix}partners.*, 
    {$wpdb->prefix}woocommerce_order_items.*, 
    CONCAT(billing_firstname.meta_value, ' ', billing_lastname.meta_value) AS customer_name,
    order_total.meta_value AS order_total
FROM 
    {$wpdb->prefix}order_assignments 
LEFT JOIN 
    {$wpdb->prefix}partners ON {$wpdb->prefix}order_assignments.partner_id = {$wpdb->prefix}partners.ID
LEFT JOIN 
    {$wpdb->prefix}woocommerce_order_items ON {$wpdb->prefix}order_assignments.order_id = {$wpdb->prefix}woocommerce_order_items.order_id
LEFT JOIN 
    {$wpdb->prefix}postmeta AS billing_firstname ON {$wpdb->prefix}order_assignments.order_id = billing_firstname.post_id 
    AND billing_firstname.meta_key = '_billing_first_name'
LEFT JOIN 
    {$wpdb->prefix}postmeta AS billing_lastname ON {$wpdb->prefix}order_assignments.order_id = billing_lastname.post_id 
    AND billing_lastname.meta_key = '_billing_last_name'
LEFT JOIN 
    {$wpdb->prefix}postmeta AS order_total ON {$wpdb->prefix}order_assignments.order_id = order_total.post_id 
    AND order_total.meta_key = '_order_total'
WHERE 
    {$wpdb->prefix}order_assignments.status IN ('completed', 'pending', 'assigned')
        ";
    $results = $wpdb->get_results($sql);
    $i = 1;
    foreach ($results as $row) {?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= $row->order_id;?></td>
            <td><?= $row->order_item_name;?></td>
            <td><?= $row->customer_name;?></td>
            <td><?= $row->order_total;?></td>
            <td><?= $row->created;?></td>
            <td><?= $row->status;?></td>
            <td><?= $row->vardas. ' '. $row->pavarde;?></td>
            <td>
                <a id="de-assign" href="javascript:void(0)" data-id="<?= $order_id;?>" partner-id="<?= $row->partner_id;?>" class="badge badge-primary p-2">
									<?php esc_html_e('De-Priskyrimas','mei')?>
								</a>
            </td>
        </tr>
    <?php } ?>
       
    </tbody>
</table>