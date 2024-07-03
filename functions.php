<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementorChild
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */
function hello_elementor_child_enqueue_scripts() {
    wp_enqueue_style(
        'hello-elementor-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        [
            'hello-elementor-theme-style',
        ],
        '1.0.0'
    );
}

$inc_dir = get_stylesheet_directory() . '/inc/';
// Find all PHP files in the inc directory
$php_files = glob($inc_dir . '*.php');
// Include each PHP file found
foreach ($php_files as $php_file) {
    require_once $php_file;
}


function greetings_code(){
$current_time = current_time('mysql');
$time_only = date('H:i:s', strtotime($current_time));
$current_hour = date('G', strtotime($time_only));
if ($current_hour >= 5 && $current_hour < 12) {
    $greeting = 'Good morning';
} elseif ($current_hour >= 12 && $current_hour < 17) {
    $greeting = 'Good afternoon';
} elseif ($current_hour >= 17 && $current_hour < 20) {
    $greeting = 'Good evening';
} else {
    $greeting = 'Good night';
}
echo $greeting;
}
// add_action('greetings','greetings_code');


// function tech_get_userdata(){
//     $user_ID = $current_user->ID;
// 	$userData= get_userdata( $user_ID );
// 	$firstName = get_user_meta( $user_ID, 'first_name', true);
// 	$lastName = get_user_meta( $user_ID, 'last_name', true);
// 	$user_roles = $userData->roles;
// 	// $user_roles = get_user_meta($user_ID, 'wp_capabilities', true);
// }
function checkInput($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlentities($data);
    return $data;
}

//   function technodemo_manage_role(){
// 	add_role( 'shop_manager', __( 'Shop Manager' ), array(
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
// add_action('init', 'technodemo_manage_role');


add_action('init','partner_register');
function partner_register(){
if (isset($_POST['register_partner'])) {
    global $wpdb;
        $table_name = $wpdb->prefix . 'partners';
        // Sanitize and validate form data
        $vardas = sanitize_text_field($_POST['vardas']);
        $pavarde = sanitize_text_field($_POST['pavarde']);
        $imones = sanitize_text_field($_POST['imones']);
        $pvm = sanitize_text_field($_POST['pvm']);
        $el = sanitize_email($_POST['el']);
        $telifono = sanitize_text_field($_POST['telifono']);
        $darbu = sanitize_textarea_field($_POST['darbu']);
        $vietove = sanitize_text_field($_POST['vietove']);
        $darbuoto = sanitize_text_field($_POST['darbuoto']);
        $galimos = sanitize_text_field($_POST['galimos']);
        $statybose = sanitize_text_field($_POST['statybose']);
        $paslaug = sanitize_textarea_field($_POST['paslaug']);
        $jums = sanitize_textarea_field($_POST['jums']);
        $netimkami = sanitize_textarea_field($_POST['netimkami']);
        $papildoma = sanitize_textarea_field($_POST['papildoma']);

        // Handle file uploads
        $upload_dir = wp_upload_dir();
        $nuotrau_url = '';
        $brezin_url = '';

        if (!empty($_FILES['nuotrau']['name'])) {
            $nuotrau_url = handle_file_upload($_FILES['nuotrau'], $upload_dir['path']);
        }
        if (!empty($_FILES['brezin']['name'])) {
            $brezin_url = handle_file_upload($_FILES['brezin'], $upload_dir['path']);
        }

        // Insert data into the custom table
        $wpdb->insert(
            $table_name,
            [
                'vardas' => $vardas,
                'pavarde' => $pavarde,
                'imones' => $imones,
                'pvm' => $pvm,
                'el' => $el,
                'telifono' => $telifono,
                'darbu' => $darbu,
                'vietove' => $vietove,
                'darbuoto' => $darbuoto,
                'galimos' => $galimos,
                'statybose' => $statybose,
                'paslaug' => $paslaug,
                'jums' => $jums,
                'netimkami' => $netimkami,
                'papildoma' => $papildoma,
                'nuotrau' => $nuotrau_url,
                'brezin' => $brezin_url
            ]
        );
        // if (false === $result) {
        //     error_log('Database insertion failed: ' . $wpdb->last_error);
        // } else {
        //     // Redirect or display a success message
        //     wp_redirect(home_url('employee'));
        //     exit;
        // }

}
}

function handle_file_upload($file, $upload_dir) {
    $uploadedfile = $file;
    $upload_overrides = ['test_form' => false];
    $movefile = wp_handle_upload($uploadedfile, $upload_overrides);

    if ($movefile && !isset($movefile['error'])) {
        return $movefile['url'];
    } else {
        // Handle the error
        return false;
    }
}

function meis_errors(){
    static $wp_error;
    return isset($wp_error) ? $wp_error : ($wp_error =new WP_Error(null, null, null));

}