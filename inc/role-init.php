<?php
/**
 * Manage Role
 */
// function technodemo_manage_role(){
// 	add_role( 'customhrs', __( 'HR' ), array(
// 		'read' => true, // Allows a user to read
// 		'create_posts' => true, // Allows user to create new posts
// 		// 'manage_sub_pages'=> true,
// 		'edit_posts' => true, // Allows user to edit their own posts
// 		'manage_categories' => true,
// 		'edit_others_posts '=> true,
// 		'manage_hr_options' => true,
// 		) ); 

// 	add_role('employee', __('Employee'), array(
// 		'read' => true,
// 	));
// }
// // add_action('init', 'technodemo_manage_role');
// // Register custom capability
// function custom_theme_register_caps() {
//     $role = get_role( 'customhrs' ); // Choose the role to assign the capability to, e.g., 'editor'
//     if ( ! empty( $role ) ) {
//         // Add custom capability to the role
//         $role->add_cap( 'manage_hr_options' );
//     }
// }
// add_action( 'init', 'custom_theme_register_caps' );
/**
 * Get User Role
 */
function technodemo_current_user_role_name() {
	global $wp_roles;
	if( is_user_logged_in() ) {
	   $user = wp_get_current_user();
	   $roles = ( array ) $user->roles;
	   $role = $roles[0]; 
	   return translate_user_role($wp_roles->roles[$role]['name']);
	} else {
	   return array();
	}
}
