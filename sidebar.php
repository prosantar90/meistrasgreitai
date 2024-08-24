<?php 
if ( is_user_logged_in() ) {
	$user = wp_get_current_user();
	$roles = $user->roles;
	
	if ( in_array( 'administrator', $roles, true ) ) {
		// Action for administrators
	 	get_template_part('template-parts/sidebar/admin-sidebar');

	} elseif ( in_array( 'partners', $roles, true ) ) {
		// Action for editors
		get_template_part('template-parts/sidebar/part-sidebar');
	} elseif ( in_array( 'custom_role', $roles, true ) ) {
		// Action for custom role
		return 'You are in the custom role.';
	} else {
		// Action for other roles or no role
		return 'You have a different role or no role.';
	}
} else {
	return 'You are not logged in.';
}
