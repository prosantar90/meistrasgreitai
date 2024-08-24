<?php
/**
 * Template Name: Assigned Projects
 */
if(!is_user_logged_in()){
	wp_redirect(wp_login_url());
    exit;
}

$user = wp_get_current_user();
$roles = $user->roles;
get_header();
get_sidebar();
// Check if WooCommerce is active
if ( ! class_exists( 'WooCommerce' ) ) {
    exit('WooCommerce is not installed');
}
$user_id = get_current_user_id();


$partner_id= get_current_user_id();
// get_order_details_for_user();
?>
<section class="main_content dashboard_part large_header_bg">
  <div class="container-fluid g-0">
      <?php get_template_part('template-parts/topbar');?>
      <div class="main_content_iner overly_inner ">
          <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
             <div class="col-md-12">
                <div class="page_title_left">
                   <h3 class="mb-0"><?php esc_html_e('Paskirti projektai','mei')?></h3>
                   <!-- <p>Dashboard /Employee List</p> -->
                   <?php 
                    //  echo '<pre>';
                    //  print_r(get_order_details_for_user($partner_id));
                    //  die();
                   ?>
               </div>
           </div>  
       </div>
<?php 
  	if ( in_array( 'administrator', $roles, true ) ) {
		// Action for administrators
	 	get_template_part('template-parts/admin/assign');

	} elseif ( in_array( 'partners', $roles, true ) ) {
		// Action for editors
		get_template_part('template-parts/partners/assign');
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
                        <?php }?>
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