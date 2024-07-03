<?php
/**
 * Perform automatic login.
 */
function technodemo_after_theme_setup() {
	if (isset($_POST['login'])) {
		$username = sanitize_text_field($_POST['username']);
		$password = $_POST['password'];
		$remember = isset($_POST['rememberMe']) ? true : false;
		$credentials = array(
			'user_login'    => $username,
			'user_password' => $password,
			'remember'      => $remember,
		);
		$user = wp_signon($credentials, false);
		if (is_wp_error($user)) {
			return $user->get_error_message();
		}else{
			wp_redirect(home_url());
			exit();
		}
	}

/**
 * @package technodemo HR managemant system
 * Page Create function for set 
 */
// Array of page titles and corresponding template names
$pages = array(
    'Registration' => 'template-emp-registration.php', 
    'General Overview' => 'template-general-overview.php',
    'Key News'      => 'template-key-news.php',
    'Latest Project' => 'template-latest-projects.php',
    'Assigned Projects' => 'template-assigned-projects.php'

);

// Loop through the array and create pages if they don't exist
foreach ($pages as $title => $template) {
    // Check if the page already exists
    $query = new WP_Query(array(
        'post_type' => 'page',
        'post_status' => 'any',
        'posts_per_page' => 1,
        'title' => $title,
    ));
    if (!$query->have_posts()) {
        // Create a new page
        $page_id = wp_insert_post(array(
            'post_title'    => $title,
            'post_content'  => '', // You can add content here if needed
            'post_status'   => 'publish',
            'post_type'     => 'page',
        ));
        // Assign template to the page
        if ($page_id && !is_wp_error($page_id)) {
            update_post_meta($page_id, '_wp_page_template', $template);
            // echo 'Page "' . $title . '" created successfully with custom template.<br>';
			// return;
        } else {
            echo 'Error creating page "' . $title . '".<br>';
        }
    } else {
        // echo 'Page "' . $title . '" already exists. Skipping creation.<br>';
		// return;
    }
    // Reset the query
    wp_reset_postdata();
}
}
// Run before the headers and cookies are sent.
add_action( 'after_setup_theme', 'technodemo_after_theme_setup' );

function tecthnodemo_custom_login_redirect($redirect_to, $request, $user) {
    // Is there a user to check?
	return home_url( '/' );
    // if (isset($user->roles) && is_array($user->roles)) {
    //     // check for admins
    //     if (in_array('employee', $user->roles)) {
    //         //Redirect them to the default place
    //         return home_url('/');
    //     }else{
    //         return $redirect_to;
    //     }


    // } else {
    //     return $redirect_to;
    // }
}
// add_filter('login_redirect', 'tecthnodemo_custom_login_redirect', 10, 3);

function technodemo_logout_redirect(){
	wp_redirect( home_url('/login'));
	exit();
}
// add_action('wp_logout', 'technodemo_logout_redirect');

function custom_login_url($login_url, $redirect, $force_reauth) {
    // Change 'custom-login' to the slug or path of your custom login page
    $custom_login_url = home_url('/login');

    // Use the custom login URL instead of the default one
    return add_query_arg('redirect_to', $redirect, $custom_login_url);
}