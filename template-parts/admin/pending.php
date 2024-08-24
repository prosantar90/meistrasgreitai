<?php 
$args = array(
    'limit'   => -1, // Get all orders
    'orderby' => 'date',
    'order'   => 'DESC',
    'status'  =>  'processing'
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
				<th><?php esc_html_e('Data ir laikas','mei');?></th>
                <th><?php esc_html_e('Būsena','mei');?></th>
                <th><?php esc_html_e('Veiksmas','mei');?></th>
            </tr>
        </thead>
			<tbody>		
			<?php 
			$orders = wc_get_orders($args);
			// echo '<pre>';
			// print_r($orders);
			// exit();
			$i = 1;
			foreach ($orders as $order) {
				$order_id = $order->get_id();
				$customer_name = $order->get_formatted_billing_full_name();
				$order_total = $order->get_total();
	
				$order_date = $order->get_date_created(); // Get the order date as a WC_DateTime object
				$formatted_date = $order_date ? date_i18n('Y-m-d H:i', $order_date->getTimestamp()) : ''; // Format the date
				$order_status = wc_get_order_status_name($order->get_status());
				// Initialize an array to hold product titles
				$product_titles = [];
				// Loop through the order items to get product titles
				foreach ($order->get_items() as $item) {
					$product_titles[] = $item->get_name();
				}

				// Join the product titles into a single string
				$order_title = implode(', ', $product_titles);
				?>
				<tr>
					<td><?= $i++ ?></td>
					<td><?= $order_id; ?></td>
					<td><?= $order_title; ?></td> <!-- Display the product titles here -->
					<td><?= $customer_name; ?></td>
					<td><?= $order_total; ?></td>
					<td><?= $formatted_date; ?></td>
					<td><?= $order_status; ?></td>
					<td>
						<a id="assign" href="javascript:void(0)" data-id="<?= $order_id;?>" class="badge badge-primary p-2" data-bs-toggle="modal" data-bs-target="#assign_to_partner">
									<?php esc_html_e('Priskirti','mei')?>
								</a>
					</td>
				</tr>
			<?php 
			} 
			?>  
				</tbody>
        </table>

    </div>
</section>

<div class="modal fade" id="assign_to_partner" tabindex="-1" role="dialog" aria-labelledby="assign_to_partnerTitle" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="assign_to_partnerTitle"><?php esc_html_e('Pasirinkite galimą partnerį','mei');?></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="POST" id="assgin_partner">
					<input type="hidden" name="order_id" id="order_id" value="">
					<div class="modal-body">
						<h3></h3>
						<div class="form-group">
							<?php 
							 $prepared_query ="SELECT * FROM {$wpdb->prefix}partners";
							$results = $wpdb->get_results($prepared_query);
							if(!empty($results) ){
							?>
							<select class="form-control select2" name="select_partner" id="select_partner">
								<option value=""><?php esc_html_e('Pasirinkite vieną','mei');?></option>
								<?php 
								foreach ($results as $row) {?>
									<option value="<?= $row->ID;?>"><?= $row->vardas;?></option>
								<?php } ?>
								
							</select>
							<?php }else{ ?>
								<p><a href="<?= home_url('/registration')?>"><?php esc_html_e('Prašome užregistruoti partnerį','mei')?></a></p>
							<?php } ?>
						</div>
					</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php esc_html_e('Uždaryti','mei');?></button>
					<button id="order_assign" name="order_assign" class="btn btn-primary"><?php esc_html_e('Priskirti','mei');?></button>
				</div>
				</form>
			</div>
		</div>
	</div>


<?php get_footer();