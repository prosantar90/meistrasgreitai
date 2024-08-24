<?php
/**
 * Template Name: General Overview
 */

 if(!is_user_logged_in()){
	wp_redirect(wp_login_url());
    exit;
 }
get_header();
get_sidebar();


// Check if WooCommerce is active
if ( ! class_exists( 'WooCommerce' ) ) {
    exit('WooCommerce is not installed');
}
$user_id = get_current_user_id();
// Fetch all orders
$args = array(
    'limit' => -1, // Get all orders
    'orderby' => 'date',
    'order' => 'DESC',
);
$order_statuses = wc_get_order_statuses();
global $wpdb;

$partner_id = get_current_user_id();

?>
<section class="main_content dashboard_part large_header_bg">
		<div class="container-fluid g-0">
		<?php get_template_part('template-parts/topbar');?>
	
<div class="main_content_iner overly_inner ">
			<div class="container-fluid p-0 ">
			<div class="row">
					<div class="col-12">
						<div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
							<div class="page_title_left">
								<h3 class="mb-0"><?php esc_html_e('Prietaisų skydelis','mei')?></h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row ">
					<div class="col-xl-12">
						<div class="white_card  mb_30">
							<div class="white_card_body anlite_table p-0">
								<div class="row">
									<div class="col-lg-3">
										<div class="single_analite_content">
											<h4><?php esc_html_e('Bendros pajamos','mei')?></h4>
											<h3><?= currency_symbol();?> <span class="counter"><?= total_amount();?></span> </h3>
											<!-- <div class="d-flex">
												<div>3.78 <i class="fa fa-caret-up"></i></div>
												<span>This year</span>
											</div> -->
										</div>
									</div>
									<div class="col-lg-3">
										<div class="single_analite_content">
											<h4><?php esc_html_e('Sesijos','mei')?></h4>
											<h3><span class="counter"><?= date('Y');?></span> </h3>
										</div>
									</div>
									<div class="col-lg-3">
										<div class="single_analite_content">
											<h4><?php esc_html_e(!is_partners() ? 'Bendras pardavimas' : 'Aktyvūs užsakymai', 'mei'); ?></h4>
											<h3><span class="counter"><?= count_total_sales();?></span> </h3>
											<!-- <div class="d-flex">
												<div>3.78 <i class="fa fa-caret-up"></i></div>
												<span>This month</span>
											</div> -->
										</div>
									</div>
									<?php if (!is_partners()) {?>
										<div class="col-lg-3">
										<div class="single_analite_content">
											<h4><?php esc_html_e('Klientų skaičius','mei')?></h4>
											<h3><span class="counter"><?= count_total_customers();?></span> </h3>
										</div>
									</div>
									<?php } ?>
									

									<?php 
									if(!is_partners()){?>
									<div class="col-lg-3">
										<div class="single_analite_content">
											<h4><?php esc_html_e('Iš viso partnerių','mei')?></h4>
											<h3><span class="counter"><?= total_partners();?></span> </h3>
											<!-- <div class="d-flex">
												<div>3.78 <i class="fa fa-caret-up"></i></div>
												<span>This month</span>
											</div> -->
										</div>
									</div>
									<?php } ?>
									<div class="col-lg-3">
										<div class="single_analite_content">
											<h4><?php esc_html_e('Laukiami darbai','mei')?></h4>
											<h3><span class="counter"><?= count_pending_orders();?></span> </h3>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
					<?php if (! is_partners()) {?>	
					<div class="col-12">
						<div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
							<div class="page_title_left mb_10">
								<h3 class="mb-0"><?php esc_html_e('Apžvalga','mei');?></h3>
								<p>Statistics, Predictive Analytics Data Visualization, Big Data Analytics, etc.</p>
							</div>
							<div class="page_title_right">
								<div class="dropdown CRM_dropdown  mr_5 mb_10">
									<button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<?php echo date("d F Y");?>
									</button>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<a class="dropdown-item" href="#">Today</a>
										<a class="dropdown-item" href="#">This Week</a>
										<a class="dropdown-item" href="#">Last week</a>
									</div>
								</div>
								<a href="#" class="white_btn mb_10">Export</a>
							</div>
						</div>
					</div>
					<div class="col-xl-8">
						<div class="white_card card_height_100 mb_30">
							<div class="white_card_header">
								<div class="box_header m-0 flex-wrap">
									<div class="main-title mb_10">
										<h3 class="m-0"><?= total_amount();?> <?= get_woocommerce_currency();?> </h3>
									</div>
									<div class="view_btns">
										<button  data-range="all" class="mr_5 mb_10  small_blue_btn active">All</button>
										<button  data-range="1-month" class="mr_5 mb_10  small_blue_btn">1M</button>
										<button  data-range="6-months" class="mr_5 mb_10  small_blue_btn">6M</button>
										<button  data-range="1-year" class="mr_5 mb_10  small_blue_btn">1Y</button>
										<button  data-range="all" class="mr_5 mb_10  small_blue_btn">YTD</button>
									</div>
								</div>
							</div>
							<div class="white_card_body">
								<div id="areaLine_chart1"></div>
							</div>
						</div>
					</div>
					<div class="col-xl-4">
						<div class="white_card card_height_100 mb_30">
							<div class="white_card_body">
								<div class="row justify-content-center mb_30  ">
									<div class="col-12 text-center">
										<h4 class="f_s_22 f_w_700 mb-0"><?= currency_symbol();?><?= total_amount();?></h4>
										<p class="f_s_11 f_w_400"><?php esc_html_e('Bendras likutis','mei');?></p>
									</div>
								</div>
								<!-- <div class="social_media_list">
									<div class="single_media d-flex justify-content-between align-items-center">
										<span class="mediaName"> <img src="img/currency/1.svg" alt> Bitcoin</span>
										<span class="earning_amount">
											<h4>0.000242 BTC</h4>
											<p>0.125 USD</p>
										</span>
									</div>
									<div class="single_media d-flex justify-content-between align-items-center">
										<span class="mediaName"> <img src="img/currency/2.svg" alt> Litecoin</span>
										<span class="earning_amount">
											<h4>0.000242 BTC</h4>
											<p>0.125 USD</p>
										</span>
									</div>
									<div class="single_media d-flex justify-content-between align-items-center">
										<span class="mediaName"> <img src="img/currency/3.svg" alt> Ripple</span>
										<span class="earning_amount">
											<h4>0.000242 BTC</h4>
											<p>0.125 USD</p>
										</span>
									</div>
								</div> -->
							</div>
						</div>
					</div>
					<?php }?>
			
				</div>
			</div>
		</div>
        




</section>

<div class="modal fade" id="assign_to_partner" tabindex="-1" role="dialog" aria-labelledby="assign_to_partnerTitle" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="assign_to_partnerTitle">Choose Available Partner</h5>
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
								<option value="">Choose One</option>
								<?php 
								foreach ($results as $row) {?>
									<option value="<?= $row->ID;?>"><?= $row->vardas;?></option>
								<?php } ?>
								
							</select>
							<?php }else{ ?>
								<p><a href="<?= home_url( '/registration' );?>"><?php esc_html_e('Prašome užregistruoti partnerį','mei');?></a></p>
							<?php } ?>
						</div>
					</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button id="order_assign" name="order_assign" class="btn btn-primary">Assign</button>
				</div>
				</form>
			</div>
		</div>
	</div>


<?php get_footer();