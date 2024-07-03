<?php
// Function to check if a table exists in the WordPress database
function check_custom_table_exists() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'partners';
    $query = $wpdb->prepare("SHOW TABLES LIKE %s", $table_name);
    $table_exists = $wpdb->get_var($query);
    if ($table_exists != $table_name) {
        // Create table if it doesn't exist
   $sql = "CREATE TABLE $table_name (
        ID mediumint(9) NOT NULL AUTO_INCREMENT,
        vardas varchar(255) NOT NULL,
        pavarde varchar(255) NOT NULL,
        imones varchar(255) DEFAULT '' NOT NULL,
        pvm varchar(255) DEFAULT '' NOT NULL,
        el varchar(255) NOT NULL,
        telifono varchar(255) DEFAULT '' NOT NULL,
        darbu text NOT NULL,
        vietove varchar(255) DEFAULT '' NOT NULL,
        darbuoto varchar(255) DEFAULT '' NOT NULL,
        galimos varchar(255) DEFAULT '' NOT NULL,
        statybose varchar(255) DEFAULT '' NOT NULL,
        paslaug text NOT NULL,
        jums text NOT NULL,
        netimkami text NOT NULL,
        papildoma text NOT NULL,
        nuotrau varchar(255) DEFAULT '' NOT NULL,
        brezin varchar(255) DEFAULT '' NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}
// Hook the function to run after the theme has been set up
add_action('after_setup_theme', 'check_custom_table_exists');
