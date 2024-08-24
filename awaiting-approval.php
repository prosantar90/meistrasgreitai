<?php 
/**
 * Template name: Awaiting Approval
 * 
 * */ 

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
$user = wp_get_current_user();
$roles = $user->roles;
// Fetch all orders

global $wpdb;

$partner_id = get_current_user_id();
$status ='';


?>
<section class="main_content dashboard_part large_header_bg">
		<div class="container-fluid g-0">
		<?php get_template_part('template-parts/topbar');?>
		<div class="main_content_iner overly_inner ">
		<div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
			<div class="col-md-12">
				<div class="page_title_left">
					<h3 class="mb-0"><?php esc_html_e('Laukiama', 'mei');?></h3>
				</div>
			</div>  
		</div>

		<?php 
  	if ( in_array( 'administrator', $roles, true ) ) {
		// Action for administrators
	 	get_template_part('template-parts/admin/awaiting-approval');
	} elseif ( in_array( 'partners', $roles, true ) ) {
		// Action for editors
		get_template_part('template-parts/partners/awaiting-approval');
	} elseif ( in_array( 'custom_role', $roles, true ) ) {
		// Action for custom role
		return 'You are in the custom role.';
	} else {
		// Action for other roles or no role
		return 'You have a different role or no role.';
	}

?>

    </div>
</section>
<?php get_footer();