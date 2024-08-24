<?php
$partner_id= get_current_user_id();
$status ='completed';?>
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
        
        $orders =get_order_details_for_user($partner_id,$status);
        $i= 1;
        foreach ($orders as $order) {
            $order_id = $order->order_id;
            $order_title = $order->item_title;
            $customer_name = $order->billing_full_name;
            $order_total = $order->order_total;
            $order_status = $order->status;
            
            ?>
            <tr>
                <td><?= $i++?></td>
                <td><?= $order_id;?></td>
                <td><?= $order_title;?></td>
                <td><?= $customer_name;?></td>
                <td><?= $order_total;?></td>
                <td><?= $order_status;?></td>
                <td>
                    <a id="complete" class="badge badge-secondary p-2" href="javascript:void(0);"><?php esc_html_e('Užbaigti','mei')?></a>
                </td>
                </tr>
            <?php } ?>
        </tbody>
</table>