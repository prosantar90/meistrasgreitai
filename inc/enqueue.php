<?php
function mei_enqueue_styles() {
 	global $pages_list;
	if (is_page($pages_list)):
	wp_enqueue_style( 'bootstrap1', get_stylesheet_directory_uri() . '/assets/css/bootstrap1.min.css', false, 'MEI', 'all');
	wp_enqueue_style( 'themify', get_stylesheet_directory_uri() . '/assets/vendors/themefy_icon/themify-icons.css', false, 'MEI', 'all');
	wp_enqueue_style( 'select2', get_stylesheet_directory_uri() . '/assets/vendors/select2/css/select2.min.css', false, 'MEI', 'all');
	wp_enqueue_style( 'owl.carousel', get_stylesheet_directory_uri() . '/assets/vendors/owl_carousel/css/owl.carousel.css', false, 'MEI', 'all');
	wp_enqueue_style( 'gijgo', get_stylesheet_directory_uri() . '/assets/vendors/gijgo/gijgo.min.css', false, 'MEI', 'all');
	wp_enqueue_style( 'all.min', get_stylesheet_directory_uri() . '/assets/vendors/font_awesome/css/all.min.css', false, 'MEI', 'all');
	wp_enqueue_style( 'tagsinput', get_stylesheet_directory_uri() . '/assets/vendors/tagsinput/tagsinput.css', false, 'MEI', 'all');
	wp_enqueue_style( 'date-picker', get_stylesheet_directory_uri() . '/assets/vendors/datepicker/date-picker.css', false, 'MEI', 'all');
	wp_enqueue_style( 'vectormap', get_stylesheet_directory_uri() . '/assets/vendors/vectormap-home/vectormap-2.0.2.css', false, 'MEI', 'all');
	wp_enqueue_style( 'scrollable', get_stylesheet_directory_uri() . '/assets/vendors/scroll/scrollable.css', false, 'MEI', 'all');
	wp_enqueue_style( 'dataTables', get_stylesheet_directory_uri() . '/assets/vendors/datatable/css/dataTables.dataTables.min.css', false, 'MEI', 'all');
	// wp_enqueue_style( 'jquery.dataTables', get_stylesheet_directory_uri() . '/assets/vendors/datatable/css/jquery.dataTables.min.css', false, 'MEI', 'all');
	// wp_enqueue_style( 'responsive.dataTables', get_stylesheet_directory_uri() . '/assets/vendors/datatable/css/responsive.dataTables.min.css', false, 'MEI', 'all');
	// wp_enqueue_style( 'buttons.dataTable', get_stylesheet_directory_uri() . '/assets/vendors/datatable/css/buttons.dataTables.min.css', false, 'MEI', 'all');
	wp_enqueue_style( 'summernote', get_stylesheet_directory_uri() . '/assets/vendors/text_editor/summernote-bs4.css', false, 'MEI', 'all');
	wp_enqueue_style( 'morris', get_stylesheet_directory_uri() . '/assets/vendors/morris/morris.css', false, 'MEI', 'all');
	wp_enqueue_style( 'material-icons', get_stylesheet_directory_uri() . '/assets/vendors/material_icon/material-icons.css', false, 'MEI', 'all');
	wp_enqueue_style( 'sweetalert', get_stylesheet_directory_uri() . '/assets/vendors/sweetalert/css/sweetalert.css', false, 'MEI', 'all');
	wp_enqueue_style( 'metisMenu', get_stylesheet_directory_uri() . '/assets/css/metisMenu.css', false, 'MEI', 'all');
	wp_enqueue_style( 'style1', get_stylesheet_directory_uri() . '/assets/css/style1.css"', false, 'MEI', 'all');
	wp_enqueue_style( 'default', get_stylesheet_directory_uri() . '/assets/css/colors/default.css', false, 'MEI', 'all');

	/**
	 * Deregister Style files
	 **/ 
    $styles_to_dequeue = [
		// 'wp-emoji-styles',
        'dashicons-css',
        'elementor-frontend-css',
        'jet-elements',
        'elementor-post-7',
        'jet-elements-skin',
        'elementor-icons',
        'elementor-frontend',
        'jet-tabs-frontend',
		'jetpack-sharing-buttons-style',
		'global-styles',
		'swpm.common-css',
		'woocommerce-layout',
		'woocommerce-smallscreen',
		'woocommerce-general',
		'woocommerce-inline',
		'elementor-pro',
    ];
    foreach ( $styles_to_dequeue as $style ) {
        wp_dequeue_style( $style );
    }
/**
 * De-register scripts files
 */
$scripts_to_dequeue = [
	'sourcebuster-js',
	'lottie',
	'my-theme-script',
	'elementor-common',
];
foreach($scripts_to_dequeue as $script ){
	wp_dequeue_script( $script );
}

	/**
	 * enqueue Scripts
	 *  */ 
	wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/assets/js/jquery1-3.4.1.min.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'popper1', get_stylesheet_directory_uri() . '/assets/js/popper1.min.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'bootstrap1', get_stylesheet_directory_uri() . '/assets/js/bootstrap1.min.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'metisMenu', get_stylesheet_directory_uri() . '/assets/js/metisMenu.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'jquery.waypoints', get_stylesheet_directory_uri() . '/assets/vendors/count_up/jquery.waypoints.min.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'Chart.min', get_stylesheet_directory_uri() . '/assets/vendors/chartlist/Chart.min.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'jquery.counterup', get_stylesheet_directory_uri() . '/assets/vendors/count_up/jquery.counterup.min.js', array( 'jquery' ), 1.1, true );
	// wp_enqueue_script( 'jquery.nice', get_stylesheet_directory_uri() . '/assets/vendors/niceselect/js/jquery.nice-select.min.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'jquery.nice', get_stylesheet_directory_uri() . '/assets/vendors/select2/js/select2.min.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'owl.carousel', get_stylesheet_directory_uri() . '/assets/vendors/owl_carousel/js/owl.carousel.min.js', array( 'jquery' ), 1.1, true );
	// wp_enqueue_script( 'jquery.dataTables', get_stylesheet_directory_uri() . '/assets/vendors/datatable/js/jquery.dataTables.min.js', array( 'jquery' ), 1.1, true );
	// wp_enqueue_script( 'dataTables', get_stylesheet_directory_uri() . '/assets/vendors/datatable/js/dataTables.responsive.min.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'datatables.min', get_stylesheet_directory_uri() . '/assets/vendors/datatable/js/dataTables.min.js', array( 'jquery' ), 1.1, true );
	// wp_enqueue_script( 'dataTables.buttons', get_stylesheet_directory_uri() . '/assets/vendors/datatable/js/dataTables.buttons.min.js', array( 'jquery' ), 1.1, true );
	// wp_enqueue_script( 'buttons.flash', get_stylesheet_directory_uri() . '/assets/vendors/datatable/js/buttons.flash.min.js', array( 'jquery' ), 1.1, true );
	// wp_enqueue_script( 'jszip', get_stylesheet_directory_uri() . '/assets/vendors/datatable/js/jszip.min.js', array( 'jquery' ), 1.1, true );
	// wp_enqueue_script( 'pdfmake', get_stylesheet_directory_uri() . '/assets/vendors/datatable/js/pdfmake.min.js', array( 'jquery' ), 1.1, true );
	// wp_enqueue_script( 'vfs_fonts', get_stylesheet_directory_uri() . '/assets/vendors/datatable/js/vfs_fonts.js', array( 'jquery' ), 1.1, true );
	// wp_enqueue_script( 'buttons.html5', get_stylesheet_directory_uri() . '/assets/vendors/datatable/js/buttons.html5.min.js', array( 'jquery' ), 1.1, true );
	// wp_enqueue_script( 'buttons.print', get_stylesheet_directory_uri() . '/assets/vendors/datatable/js/buttons.print.min.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'datepicker', get_stylesheet_directory_uri() . '/assets/vendors/datepicker/datepicker.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'datepicker.en', get_stylesheet_directory_uri() . '/assets/vendors/datepicker/datepicker.en.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'datepicker.custom', get_stylesheet_directory_uri() . '/assets/vendors/datepicker/datepicker.custom.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'roundedBar', get_stylesheet_directory_uri() . '/assets/js/chart.min.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'jquery.barfiller', get_stylesheet_directory_uri() . '/assets/vendors/chartjs/roundedBar.min.js', array( 'jquery' ), 1.1, true );
	// wp_enqueue_script( 'jquery.barfiller', get_stylesheet_directory_uri() . '/assets/vendors/progressbar/jquery.barfiller.js', array( 'jquery' ), 1.1, true );
	// wp_enqueue_script( 'tagsinput', get_stylesheet_directory_uri() . '/assets/vendors/tagsinput/tagsinput.js', array( 'jquery' ), 1.1, true );
	// wp_enqueue_script( 'summernote', get_stylesheet_directory_uri() . '/assets/vendors/text_editor/summernote-bs4.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'amcharts', get_stylesheet_directory_uri() . '/assets/vendors/am_chart/amcharts.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'perfect-scrollbar', get_stylesheet_directory_uri() . '/assets/vendors/scroll/perfect-scrollbar.min.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'scrollable-custom', get_stylesheet_directory_uri() . '/assets/vendors/scroll/scrollable-custom.js"', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'scrvectormapipt', get_stylesheet_directory_uri() . '/assets/vendors/vectormap-home/vectormap-2.0.2.min.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'vectormap-world-mill-en', get_stylesheet_directory_uri() . '/assets/vendors/vectormap-home/vectormap-world-mill-en.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'apex-chart2', get_stylesheet_directory_uri() . '/assets/vendors/apex_chart/apex-chart2.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'apex_dashboard', get_stylesheet_directory_uri() . '/assets/vendors/apex_chart/apex_dashboard.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'core.js', get_stylesheet_directory_uri() . '/assets/vendors/chart_am/core.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'charts', get_stylesheet_directory_uri() . '/assets/vendors/chart_am/charts.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'animated', get_stylesheet_directory_uri() . '/assets/vendors/chart_am/animated.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'kelly', get_stylesheet_directory_uri() . '/assets/vendors/chart_am/kelly.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'sweetalert-js', get_stylesheet_directory_uri() . '/assets/vendors/sweetalert/js/sweetalert2.min.js', array( 'jquery' ), 1.1, true );

	wp_enqueue_script( 'chart-custom', get_stylesheet_directory_uri() . '/assets/vendors/chart_am/chart-custom.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'dashboard_init', get_stylesheet_directory_uri() . '/assets/js/dashboard_init.js', array( 'jquery' ), 1.1, true );

	wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), 1.1, true );
	 // Localize the script with data
    wp_localize_script('custom-js', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
	endif;
    // Default Color CSS
}
add_action('wp_enqueue_scripts', 'mei_enqueue_styles',100);

/**
 * Condition based css and js file load 
 *  */ 

 function condition_based_css_js(){
	if (is_page('partnerio-registracija')) {
	wp_enqueue_style( 'bootstrap1', get_stylesheet_directory_uri() . '/assets/css/bootstrap1.min.css', false, 'MEI', 'all');
	wp_enqueue_style( 'sweetalert', get_stylesheet_directory_uri() . '/assets/vendors/sweetalert/css/sweetalert.css', false, 'MEI', 'all');
	wp_enqueue_style( 'themify', get_stylesheet_directory_uri() . '/assets/vendors/themefy_icon/themify-icons.css', false, 'MEI', 'all');


	wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/assets/js/jquery1-3.4.1.min.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'popper1', get_stylesheet_directory_uri() . '/assets/js/popper1.min.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'bootstrap1', get_stylesheet_directory_uri() . '/assets/js/bootstrap1.min.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'sweetalert-js', get_stylesheet_directory_uri() . '/assets/vendors/sweetalert/js/sweetalert2.min.js', array( 'jquery' ), 1.1, true );

	wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), 1.1, true );
	 // Localize the script with data
    wp_localize_script('custom-js', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
	}
 }
 add_action('wp_enqueue_scripts', 'condition_based_css_js', 1001);