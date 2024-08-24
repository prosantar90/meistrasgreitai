<?php
function my_custom_employee_page_styles() {
    global $pages_list;
    if (is_page($pages_list)) {
        echo '<style>
            .elementor.elementor-31.elementor-location-header {
                display: none !important;
            }
            .elementor.elementor-91.elementor-location-footer {
                display: none;
            }
        </style>';
    }
}
add_action('wp_head', 'my_custom_employee_page_styles');
