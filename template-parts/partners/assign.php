<?php 
$partner_id= get_current_user_id();
$status ='accepted';

if (get_current_user_role() =='partners') {?>
         <table class="table" id="order_lists">
    <thead>
<tr>
    <th><?php esc_html_e('Sl Nr','mei');?></th>
    <th><?php esc_html_e('Užsakymo Nr','mei');?></th>
    <th><?php esc_html_e('Pavadinimas','mei');?></th>
    <th><?php esc_html_e('Klientas','mei');?></th>
    <th><?php esc_html_e('Iš viso','mei');?></th>
    <th><?php esc_html_e('Būsena','mei');?></th>
    <th><?php esc_html_e('Sukurta','mei');?></th>
    <th><?php esc_html_e('Veiksmas','mei');?></th>
</tr>
</thead>

<tbody>
    <?php 
    
    $orders =get_order_details_for_user($partner_id,$status);
    $i= 1;
    foreach ($orders as $order) {
        $order_id = $order->order_id;
        $order_title = $order->item_title;
        $customer_name = $order->billing_full_name;
        $order_total = $order->order_total;
        $order_status = $order->status;
        $order_date = $order->order_date;
        ?>
        <tr>
            <td><?= $i++?></td>
            <td><?= $order_id;?></td>
            <td><?= $order_title;?></td>
            <td><?= $customer_name;?></td>
            <td><?= $order_total;?></td>
            <td><?= $order_status;?></td>
            <td><?= $order_date;?></td>
            <td>
                <a id="ass_complete" class="badge badge-success p-2" data-id=<?= $order_id; ?> partner-id=<?= $order->partner_id;?> href="javascript:void(0)"><?php esc_html_e('Užbaigti','mei')?></a>
            </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php 
}